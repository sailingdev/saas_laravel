<?php

namespace App\Helper;

use App\Option;

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


    function get_data($data, $field, $type = '', $value = '', $class = 'active'){
        if( is_array($data) ){
            if(!empty($data) && isset($data[$field]) ){
                switch ($type) {
                    case 'checkbox':
                        if($data[$field] == $value){
                            return 'checked';
                        }
                        break;

                    case 'radio':
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
                        break;
                }
            }
        }else{
            if(!empty($data) && isset($data->$field) ){
                switch ($type) {
                    case 'checkbox':
                        if($data->$field == $value){
                            return 'checked';
                        }
                        break;

                    case 'radio':
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
                        break;
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

}
