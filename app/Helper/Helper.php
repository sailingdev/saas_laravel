<?php

namespace App\Helper;

use App\AccountManager;
use App\Option;
use App\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use function JBZoo\Data\json;

class Helper
{
    static function get_option($key, $value = ""){
        $option = Option::where('name', $key)->first();
        if ($option == null){
            Option::insert(['name' => $key, "value" => $value]);
            return $value;
        }else{
            return $option->value;
        }
    }

    function get_module_paths(){
        $CI =& get_instance();
        $configs = array();
        $folders = array(
            SYSTEM_PATH,
            PUBLIC_PATH,
            PLUGIN_PATH,
        );

        $module_paths = array();

        foreach ( $folders as $folder )
        {
            $directories = glob( $folder . '*' );
            if ( !empty( $directories ) )
            {
                foreach ( $directories as $directory )
                {
                    $module_paths[] = $directory;
                }
            }
        }
        return $module_paths;
    }

    function find_modules($module_name){
        $module_paths = $this->get_module_paths();
        if(!empty($module_paths))
        {
            foreach ($module_paths as $module_path)
            {

                $models = $module_path.'/models/*.php';
                $models = glob($models);
                if(empty($models)) continue;
                foreach ($models as $model)
                {
                    //Get Directory
                    $dir = str_replace(DIR_ROOT, "", $model);
                    $dir = explode("/", $dir);
                    $dir = $dir[0]."/";

                    //Get file name
                    $file_tmp = str_replace(".php", "", $model);
                    $file_tmp = explode("/", $file_tmp);
                    $file_name = end($file_tmp);

                    //Get folder name
                    $folder_name = str_replace("_model", "", $file_name);

                    if($folder_name == $module_name)
                    {
                        return DIR_ROOT.$dir.$folder_name."/";
                    }
                }
            }
        }
        return false;
    }


    static function get_data($data, $field, $type = '', $value = '', $class = 'active'){
        if( is_array($data) ){
            if(!empty($data) && isset($data[$field]) ){
                switch ($type) {
                    case 'radio':
                    case 'checkbox':
                        if($data[$field] == $value){
                            return 'checked';
                        }
                        break;

                    case 'select':
                        if($data[$field] == $value){
                            return 'selected';
                        }
                        break;

                    case 'class':
                        if($data[$field] == $value){
                            return $class;
                        }
                        break;

                    default:
                        return $data[$field];
                }
            }
        }else{
            if(!empty($data) && isset($data->$field) ){
                switch ($type) {
                    case 'radio':
                    case 'checkbox':
                        if($data->$field == $value){
                            return 'checked';
                        }
                        break;

                    case 'select':
                        if($data->$field == $value){
                            return 'selected';
                        }
                        break;

                    case 'class':
                        if($data->$field == $value){
                            return $class;
                        }
                        break;

                    default:
                        return $data->$field;
                }
            }
        }

        return false;
    }


    static function date_show($data){
        if($data != ""){
            if(!is_numeric($data)){
                $data = strtotime($data);
            }
            if(Helper::get_option('format_date', 'd/m/Y') == 'd/m/Y' ){
                return date( "d-m-Y" , $data);
            }else{
                return date( Helper::get_option('format_date', 'd/m/Y') , $data);
            }
        }else{
            return false;
        }
    }

    static function cut_text($text, $n = 280){
        if(strlen($text) <= $n){
            return $text;
        }

        $text= substr($text, 0, $n);
        if($text[$n-1] == ' '){
            return trim($text)."...";
        }

        $x  = explode(" ", $text);
        $sz = sizeof($x);

        if($sz <= 1){
            return $text."...";
        }

        $x[$sz-1] = '';

        return trim(implode(" ", $x))."...";
    }


    static function timeAgo($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }


    static function tz_list() {
        $zones_array = array();
        $timestamp = time();
        foreach(timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['time'] = '(UTC ' . date('P', $timestamp).") ".$zone;
            $zones_array[$key]['sort'] = date('P', $timestamp);
        }
        usort($zones_array, function($a, $b) {
            return strcmp($a["sort"], $b["sort"]);
        });

        $timezones = array();
        foreach ($zones_array as $value) {
            $timezones[$value['zone']] = $value['time'];
        }
        return $timezones;
    }

    static function date_show_js(){
        $format = Helper::get_option('format_date', 'd/m/Y');

        switch ($format) {
            case 'd M, Y':
                return "d M, yy";
            case 'm/d/Y':
                return "mm/dd/yy";
            case 'Y-m-d':
                return "yy-mm-dd";
            default:
                return "dd/mm/yy";
        }
    }


    static function datetime_show_js(){
        $format = Helper::get_option('format_datetime', 'd/m/Y g:i A');

        switch ($format) {
            case "m/d/Y g:i A":
                return '["mm/dd/yy", "hh:mm TT"]';

            case "d/m/Y H:i":
                return '["dd/mm/yy", "HH:mm"]';

            case "m/d/Y H:i":
                return '["mm/dd/yy", "HH:mm"]';

            case "Y-m-d g:i A":
                return '["yy-mm-dd", "hh:mm TT"]';

            case "Y-m-d H:i":
                return '["yy-mm-dd", "HH:mm"]';

            default:
                return '["dd/mm/yy", "hh:mm TT"]';
        }
    }

    static function segment($index){
        return Request::segment($index);
    }


    static  function get_url($module=""){
        return url($module);
    }

    static function _t( $field = "ids", $tid = 0){
        if($tid == 0){
            $tid = Helper::_s('team_id');
        }else{
            $tid = Team::select(['ids'])->where('id', $tid)->get();
        }

        $user = Team::where('ids', $tid)->get();

        if($user && isset($user->$field)){
            return $user->$field;
        }
        return false;
    }

    static function _s($input){
        return Auth::user()->$input;
    }


    static function get_reports_list(){
        $tab_groups = json_decode(file_get_contents(asset('sidebar.json')), true);



        $menu_groups = [];
        foreach ($tab_groups as $tab => $data) {

            foreach ($data as $main => $row) {

                if( isset( $row['sub_menu'] ) ){
                    usort( $row['sub_menu'] , function($a, $b) {
                        return $a['position'] <=> $b['position'];
                    });

                    $menu_groups[$tab][$main] = $row;
                }else{
                    $menu_groups[$tab][$main] = $row;
                }

            }

        }


        return $menu_groups[2];

    }


    static function class_main($index){
        return str_replace('_', '-', Helper::segment(1));
    }

    static function _gt($key, $value = "", $team_id = 0){
        if(Helper::_s("team_id")){
            $team_id = _t("id");
        }
        if($team_id != 0){
            $data = Team::where('id', $team_id)->first()->data;
            $option = json_decode($data);
            if(is_array($option) || is_object($option)){
                $option = (array)$option;

                if( isset($option[$key]) ){
                    return $option[$key];
                }else{
                    $option[$key] = $value;
                    Team::update(['data' => json_encode($option), 'id' => $team_id]);
                    return $value;
                }
            }else{
                $option = json_encode(array($key => $value));
                Team::update(['data' => $option, 'id' => $team_id]);
                return $value;
            }
        }
    }


    static function _gm($key, $value = "", $account_id = 0){

        if($account_id != 0){
            $data = AccountManager::where('id', $account_id)->first()->data;
            $option = json_decode($data);

            if(is_array($option) || is_object($option)){
                $option = (array)$option;

                if( isset($option[$key]) ){
                    return $option[$key];
                }else{
                    $option[$key] = $value;
                    AccountManager::update(['data' => json_encode($option), 'id' =>$account_id ]);
                    return $value;
                }
            }else{
                $option = json_encode(array($key => $value));
                AccountManager::update(['data' => $option, "id" => $account_id]);
                return $value;
            }
        }
    }



}
