<?php
/*Proxy*/
if(!function_exists('add_proxy')){
    function add_proxy($social_network){
        $CI = &get_instance();
        $package = _u("package"); 

        $query = $CI->db->query("
            SELECT a.*, b.username, b.social_network
            FROM sp_proxy_manager as a
            LEFT JOIN sp_account_manager as b ON a.id = b.proxy 
            WHERE ( b.social_network LIKE '%{$social_network}%' ESCAPE '!' AND a.status LIKE '%1%' ESCAPE '!' AND  a.packages LIKE '%\"{$package}\"%' ESCAPE '!' )
            OR ( b.social_network IS NULL AND a.status LIKE '%1%' ESCAPE '!' AND  a.packages LIKE '%\"{$package}\"%' ESCAPE '!' )
            OR ( b.social_network = '{$social_network}' AND a.status = 1 AND a.packages IS NULL )
            OR ( b.social_network IS NULL AND a.status = 1 AND a.packages IS NULL )
        ");

        $proxies = $query->result();

        if(!empty($proxies)){

            $proxies_arr = [];

            foreach ($proxies as $proxy) {
                if(isset($proxies_arr[$proxy->address]) && $proxy->username != "" && $proxy->social_network != ""){
                    $proxies_arr[$proxy->address] += 1;
                }else{
                    $proxies_arr[$proxy->address] = 1;
                }
            }

            $keep_proxies = [];
            foreach ($proxies as $proxy) {
                if($proxies_arr[$proxy->address] < (int)$proxy->limit || $proxy->limit == ""){
                    if( !isset($keep_proxies[$proxy->address]) ){
                        $proxy->count = $proxies_arr[$proxy->address];
                        $keep_proxies[$proxy->address] = $proxy;
                    }
                }
            }

            if(!empty($keep_proxies)){
                $index = array_rand($keep_proxies);

                return (object)[
                    "id" => $keep_proxies[$index]->id,
                    "proxy" => $keep_proxies[$index]->address
                ];
            }
        }

        return (object)[
            "id" => "",
            "proxy" => ""
        ];
    }
}

if(!function_exists('get_proxy')){
    function get_proxy($proxy){
        if($proxy != ""){
            if( is_numeric($proxy) ){
                $CI = &get_instance();

                if( get_option('system_proxy', 1) ){
                    $item = $CI->main_model->get("*", "sp_proxy_manager", "id = '{$proxy}' AND status = 1");
                    if($item){
                        return $item->address;
                    }else{
                        return "";
                    }
                }

            }else{
                if(get_option('user_proxy', 1)){
                    return $proxy;
                }else{
                    return "";
                }
            }
        }else{
            return "";
        }
    }
}
/*End proxy*/