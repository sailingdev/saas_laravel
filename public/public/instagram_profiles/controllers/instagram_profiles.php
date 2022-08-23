<?php
class instagram_profiles extends MY_Controller {
    
    public $tb_account_manager = "sp_account_manager";
    public $module_name;
    public $ig;
    public $username;
    public $password;
    public $proxy;
    public $security_code;
    public $verification_code;
    public $choice;

    public function __construct(){
        parent::__construct();
        _permission("account_manager_enable");
        $this->load->model(get_class($this).'_model', 'model');
        include get_module_path($this, 'libraries/vendor/autoload.php', true);

        $this->choice = get_option('instagram_choice', 0);

        //
        $this->module_name = get_module_config( $this, 'name' );
        $this->module_icon = get_module_config( $this, 'icon' );
        $this->module_color = get_module_config( $this, 'color' );
        //

        $this->app_id = get_option('instagram_app_id', '');
        $this->app_secret = get_option('instagram_app_secret', '');
        $this->app_version = get_option('instagram_app_version', 'v10.0');

        if( get_option('instagram_login_button', 0) && $this->app_id && $this->app_secret && $this->app_version){
            $fb = new \Facebook\Facebook([
                'app_id' => $this->app_id,
                'app_secret' => $this->app_secret,
                'default_graph_version' => $this->app_version,
            ]);

            $this->fb = $fb;
        }
    }

    public function index($page = "", $ids = "")
    {
        if( get_option('instagram_login_button', 0) && $this->app_id && $this->app_secret && $this->app_version){
            try {
                if(!_s('accessToken') || post("code")){
                    $callback_url = get_module_url();
                    $helper = $this->fb->getRedirectLoginHelper();
                    $accessToken = $helper->getAccessToken($callback_url);
                    if($accessToken){
                        $accessToken = $accessToken->getValue();
                        _ss('accessToken', $accessToken);
                        redirect( get_module_url("index/add") );
                    }
                }else{
                    $accessToken = _s('accessToken');
                }

                $response = $this->get('/me/accounts?fields=instagram_business_account,id,name,username,fan_count,link,is_verified,picture,access_token,category&limit=10000', $accessToken);
                if(is_string($response)){
                    $response = $this->get('/me/accounts?fields=instagram_business_account,id,name,username,fan_count,link,is_verified,picture,access_token,category&limit=3', $accessToken);
                }

                $page_ids = [];
                if(isset($response->data) && !empty($response->data)){
                    foreach ($response->data as $row) {
                        if(isset($row->instagram_business_account)){
                            $page_ids[] = $row->instagram_business_account->id;
                        }
                    }
                }

                $result = [];
                if(!empty($page_ids)){
                    foreach ($page_ids as $key => $page_id) {
                        $profile = $this->get('/'.$page_id.'?fields=id,name,username,profile_picture_url,ig_id', $accessToken);
                        $result[] = [
                            'id' => $profile->id,
                            'name' => $profile->username,
                            'avatar' => $profile->profile_picture_url,
                            'desc' => $profile->name
                        ];
                    }
                }

                _ss("instagram_profiles", json_encode($result));

                if(empty($profiles)){
                    $data = [
                        "status" => "success",
                        "result" => $result
                    ];
                }else{
                    $data = [
                        "status" => "error",
                        "message" => __('No profile to add')
                    ];
                }
            } catch (Exception $e) {
                $data = [
                    "status" => "error",
                    "message" => $e->getMessage()
                ];
            }
        }

        $data['module_name'] = $this->module_name;
        $data['module_icon'] = $this->module_icon;
        $data['module_color'] = $this->module_color;

        $views = [
            "subheader" => view( 'main/subheader', [ 'module_name' => $this->module_name, 'module_icon' => $this->module_icon, 'module_color' => $this->module_color ], true ),
            "column_one" => page($this, "pages", "general", $page, $data), 
        ];
        
        views( [
            "title" => $this->module_name,
            "fragment" => "fragment_one",
            "views" => $views
        ] );
    }

    public function oauth()
    {
        redirect(  get_module_url("index/oauth") );   
    }
    
    public function oauth_button(){
        $app_id = get_option('instagram_app_id', '');
        $app_secret = get_option('instagram_app_secret', '');
        $app_version = get_option('instagram_app_version', 'v4.0');

        if($app_id == "" || $app_secret == "" || $app_version == ""){
            redirect( get_url("social_network_configuration/index/instagram") );
        }

        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = [ get_option('instagram_api_permissions', 'instagram_basic,instagram_content_publish,pages_read_engagement') ]; // Optional permissions
        $login_url = $helper->getLoginUrl( get_module_url() , $permissions);
        redirect($login_url);
    }

    public function get($params, $accessToken){

        try {
            $response = $this->fb->get($params, $accessToken);
            return json_decode($response->getBody()); 
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            return $e->getMessage();
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            return $e->getMessage();
        }

    }

    public function save_button(){
        $ids = post('id');
        $team_id = _t("id");

        validate('empty', __('Please select a profile to add'), $ids);

        $profiles = _s("instagram_profiles");
        $profiles = json_decode($profiles);

        $result = [];
        $count_profile = 0;
        if(!empty($profiles)){

            foreach ($profiles as $profile) {
                $profile = (object)$profile;
                if( in_array($profile->id, $ids) ){
                    $item = $this->model->get('*', $this->tb_account_manager, "social_network = 'instagram' AND team_id = '{$team_id}' AND pid = '{$profile->id}'");
                    $avatar = save_img( $profile->avatar, TMP_PATH.'avatar/' );
                    $access_token = _s("accessToken");

                    if(!$item){
                        $data = [
                            'ids' => ids(),
                            'social_network' => 'instagram',
                            'category' => 'profile',
                            'login_type' => 1,
                            'can_post' => 1,
                            'team_id' => $team_id,
                            'pid' => $profile->id,
                            'name' => $profile->desc,
                            'username' => $profile->name,
                            'token' => $access_token,
                            'avatar' => $avatar,
                            'url' => 'https://www.instagram.com/'.$profile->name,
                            'data' => NULL,
                            'status' => 1,
                            'changed' => now(),
                            'created' => now()
                        ];

                        check_number_account("instagram", "profile");

                        $this->model->insert($this->tb_account_manager, $data);
                    }else{
                        @unlink($item->avatar);

                        $data = [
                            'social_network' => 'instagram',
                            'category' => 'profile',
                            'login_type' => 1,
                            'can_post' => 1,
                            'team_id' => $team_id,
                            'pid' => $profile->id,
                            'name' => $profile->desc?$profile->desc:$profile->name,
                            'username' => $profile->name,
                            'token' => $access_token,
                            'avatar' => $avatar,
                            'url' => 'https://www.instagram.com/'.$profile->name,
                            'status' => 1,
                            'changed' => now(),
                        ];

                        $this->model->update($this->tb_account_manager, $data, ['id' => $item->id]);
                    }
                }

                $count_profile++;
            }
        }

        _us('accessToken');

        if($count_profile == 0){
            ms([
                "status" => "error",
                "message" => __('No profile to add')
            ]);
        }else{
            ms([
                "status" => "success",
                "message" => __("Success")
            ]);
        }
    }

    public function save()
    {
        $team_id = _t("id");
        $this->username = addslashes(post("username"));
        $this->password = addslashes(post("password"));
        $this->proxy = post("proxy");
        $this->security_code = post("security_code");
        $this->verification_code = post("verification_code");

        $account = $this->model->get("*", $this->tb_account_manager, "social_network = 'instagram' AND team_id = '{$team_id}' AND username = '{$this->username}'");
        if(!$account){
            $proxy = post("proxy");
            if($proxy == "" || !$proxy){
                $system_proxy = add_proxy("instagram");
                $this->proxy = $system_proxy->proxy;
                $proxy = $system_proxy->id;
            }
        }else{
            $proxy = post("proxy");
            if($proxy == "" || !$proxy){
                $this->proxy = get_proxy($account->proxy);
            }
        }

        validate("null", __("Username"), $this->username);
        validate("null", __("Password"), $this->password);

        if (filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
            ms([
                "status" => "error",
                "message" => __("Please enter Instagram username instead of email address")
            ]);
        }

        $this->connect();
        $response = $this->login();
        
        if($response['status'] == "success"){

            try {
                $user = $this->ig->account->getCurrentUser()->getUser();

                $avatar = save_img( $user->getProfilePicUrl(), TMP_PATH.'avatar/' );
                $item = $this->model->get('*', $this->tb_account_manager, "social_network = 'instagram' AND team_id = '{$team_id}' AND pid = '{$user->getPk()}'");

                if(!$item){

                    $data = [
                        'ids' => ids(),
                        'social_network' => 'instagram',
                        'category' => 'profile',
                        'login_type' => 2,
                        'can_post' => 1,
                        'team_id' => $team_id,
                        'pid' => $user->getPk(),
                        'name' => $user->getFullName()?$user->getFullName():$user->getUsername(),
                        'username' => $user->getUsername(),
                        'token' => encrypt_encode($this->password),
                        'avatar' => $avatar,
                        'url' => 'https://instagram.com/'.$user->getUsername(),
                        'data' => NULL,
                        'proxy' => $proxy,
                        'status' => 1,
                        'changed' => now(),
                        'created' => now()
                    ];

                    check_number_account("instagram", "profile");

                    $this->model->insert($this->tb_account_manager, $data);

                }else{

                    @unlink($item->avatar);
                    $data = [
                        'social_network' => 'instagram',
                        'category' => 'profile',
                        'login_type' => 2,
                        'can_post' => 1,
                        'team_id' => $team_id,
                        'pid' => $user->getPk(),
                        'name' => $user->getFullName()?$user->getFullName():$user->getUsername(),
                        'username' => $user->getUsername(),
                        'token' => encrypt_encode($this->password),
                        'avatar' => $avatar,
                        'url' => 'https://instagram.com/'.$user->getUsername(),
                        'status' => 1,
                        'changed' => now()
                    ];

                    $this->model->update($this->tb_account_manager, $data, ['id' => $item->id]);
                }

            } catch (Exception $e) {
                $response = [
                    "status" => "error",
                    "message" => __("Please login on instagram to pass checkpoint")
                ];
            }
        }
        
        echo json_encode($response);
    }

    public function re_save(){
        $this->connect();
        $response = $this->login();

        if($response['status'] == "success"){

            try {
                $user = $this->ig->account->getCurrentUser()->getUser();

                $avatar = save_img( $user->getProfilePicUrl(), TMP_PATH.'avatar/' );
                $item = $this->model->get('*', $this->tb_account_manager, "social_network = 'instagram' AND team_id = '{$team_id}' AND pid = '{$user->getPk()}'");

                if(!$item){

                    $data = [
                        'ids' => ids(),
                        'social_network' => 'instagram',
                        'category' => 'profile',
                        'login_type' => 2,
                        'can_post' => 1,
                        'team_id' => $team_id,
                        'pid' => $user->getPk(),
                        'name' => $user->getFullName()?$user->getFullName():$user->getUsername(),
                        'username' => $user->getUsername(),
                        'token' => encrypt_encode($this->password),
                        'avatar' => $avatar,
                        'url' => 'https://instagram.com/'.$user->getUsername(),
                        'data' => NULL,
                        'proxy' => $proxy,
                        'status' => 1,
                        'changed' => now(),
                        'created' => now()
                    ];

                    $this->model->insert($this->tb_account_manager, $data);

                }else{

                    @unlink($item->avatar);
                    $data = [
                        'social_network' => 'instagram',
                        'category' => 'profile',
                        'login_type' => 2,
                        'can_post' => 1,
                        'team_id' => $team_id,
                        'pid' => $user->getPk(),
                        'name' => $user->getFullName()?$user->getFullName():$user->getUsername(),
                        'username' => $user->getUsername(),
                        'token' => encrypt_encode($this->password),
                        'avatar' => $avatar,
                        'url' => 'https://instagram.com/'.$user->getUsername(),
                        'status' => 1,
                        'changed' => now()
                    ];

                    $this->model->update($this->tb_account_manager, $data, ['id' => $item->id]);
                }

            } catch (Exception $e) {
                $response = [
                    "status" => "error",
                    "message" => __("Please login on instagram to pass checkpoint")
                ];
            }
        }
    }

    public function connect(){
        $this->ig = new \InstagramAPI\Instagram(false, false, [
            'storage'    => 'mysql',
            'dbhost'     => DB_HOST,
            'dbname'     => DB_NAME,
            'dbusername' => DB_USER,
            'dbpassword' => DB_PASS,
            'dbtablename'=> "sp_instagram_sessions"
        ]);

        $this->ig->setVerifySSL(false);

        if($this->proxy != ""){
            $this->ig->setProxy($this->proxy);
        }
    }

    public function login(){
        
        if(_s($this->username."_twofa")){
            return $this->confirm_2fa();
        }
        
        try {
          
            $response = $this->ig->login($this->username, $this->password);
            
            return $this->check_2fa($response);

        } catch (InstagramAPI\Exception\ChallengeRequiredException $e) {
            $challenge = $e->getResponse()->getChallenge();
            if(is_array($challenge)){
                $apiPath = $challenge['api_path'];
            }else{
                $apiPath = $challenge->getApiPath();
            }
            return $this->confirm_security_code($apiPath);

        } catch (InstagramAPI\Exception\CheckpointRequiredException $e) {
            $this->clear_cookie();
            return [
                "status" => "error",
                "message" => __("Please login on instagram to pass checkpoint")
            ];

        } catch (InstagramAPI\Exception\AccountDisabledException $e) {

            return [
                "status" => "error",
                "message" => __("Your account has been disabled for violating instagram terms")
            ];

        } catch (InstagramAPI\Exception\SentryBlockException $e) {
            return [
                "status" => "error",
                "message" => __("Your account has been banned from instagram api for spam behaviour or otherwise abusing")
            ];

        } catch (InstagramAPI\Exception\IncorrectPasswordException $e) {

            return [
                "status" => "error",
                "message" => __("The password you entered is incorrect please try again")
            ];

        } catch (InstagramAPI\Exception\InstagramException $e) {
            if ($e->hasResponse()) {
                if($e->getResponse()->getMessage() == "consent_required"){
                    $this->clear_cookie();
                    return [
                        "status" => "error",
                        "message" => __("Go to instagram.com login with this account and then try to add this account again")
                    ];
                }
                
                return [
                    "status" => "error",
                    "message" => $e->getResponse()->getMessage()
                ];

            } else {
                
                $message = explode(":", $e->getMessage(), 2);
                $message = explode(" (", end($message));

                return [
                    "status" => "error",
                    "message" => $message[0]
                ];
            }

        } catch (\Exception $e) {

            return [
                "status" => "error",
                "message" => __("Oops, something went wrong please try again later")
            ];

        }
    }

    public function check_2fa($response){
        if (!is_null($response) && $response->isTwoFactorRequired()) {
            $phone_number = $response->getTwoFactorInfo()->getObfuscatedPhoneNumber();
            $twofa = $response->getTwoFactorInfo()->getTwoFactorIdentifier();
            _ss($this->username."_twofa", $twofa);
            
            return [
                "status"   => "error",
                "message"  => sprintf( __("Enter the 6 digit code we sent to the number ending in %s"), $phone_number),
                "callback" => '<script type="text/javascript">Instagram_profiles.open_verification_form();</script>'
            ];  

        }

        return [
            "status" => "success",
            "message" => __("Success")
        ];
    }

    public function confirm_2fa(){
        $twofa = _s($this->username."_twofa");
        _us($this->username."_twofa");
        try {
            
            $this->ig->finishTwoFactorLogin($this->username, $this->password,  $twofa, $this->verification_code);

            return [
                "status" => "success",
                "message" => __("Success")
            ];

        } catch (InstagramAPI\Exception\ChallengeRequiredException $e) {

            $apiPath = $e->getResponse()->getChallenge()->getApiPath();
            return $this->confirm_security_code($apiPath);

        } catch (InstagramAPI\Exception\CheckpointRequiredException $e) {
            $this->clear_cookie();
            return [
                "status" => "error",
                "message" => __("Please login on instagram to pass checkpoint")
            ];

        } catch (InstagramAPI\Exception\AccountDisabledException $e) {

            return [
                "status" => "error",
                "message" => __("Your account has been disabled for violating instagram terms")
            ];

        } catch (InstagramAPI\Exception\SentryBlockException $e) {

            return [
                "status" => "error",
                "message" => __("Your account has been banned from instagram api for spam behaviour or otherwise abusing")
            ];

        } catch (InstagramAPI\Exception\IncorrectPasswordException $e) {

            return [
                "status" => "error",
                "message" => __("The password you entered is incorrect, please try again")
            ];

        } catch (InstagramAPI\Exception\InstagramException $e) {

            if ($e->hasResponse()) {

                if($e->getResponse()->getMessage() == "consent_required"){
                    $this->clear_cookie();
                    return [
                        "status" => "error",
                        "message" => __("Go to instagram.com login with this account and then try to add this account again")
                    ];
                }
                
                return [
                    "status" => "error",
                    "message" => $e->getResponse()->getMessage()
                ];

            } else {

                $message = explode(":", $e->getMessage(), 2);
                return [
                    "status" => "error",
                    "message" => end($message)
                ];
            }

        } catch (\Exception $e) {

            return [
                "status" => "error",
                "message" => __("Oops, something went wrong please try again later")
            ];

        }
    }

    public function send_security_code($apiPath){
        try {
            $response = $this->ig->checkpoint->send_security_code($apiPath, $this->choice);

            if(empty($response) || is_null($response)){
                return [
                    "status" => "error",
                    "message" => __("Could not send verification code please try again later")
                ];
            }

            if(isset($response->message) && strpos($response->message, "is not one of the available choices") !== false){
                $new_choice = $this->choice==1?0:1;
                $response = $this->ig->checkpoint->send_security_code($apiPath, $new_choice);
            }

            if($response->status != "ok"){
                if($response->message == "This field is required."){
                    return $this->resend_security_code($apiPath);
                }

                return [
                    "status" => "error",
                    "message" => __("Could not send verification code please try again later")
                ];
            }

            if($response->step_name == "verify_email"){
                return [
                    "status" => "error",
                    "message" => sprintf(__("Enter the 6 digit code we sent to the email address %s"), $response->step_data->contact_point),
                    "callback" => '<script type="text/javascript">Instagram_profiles.open_security_form();</script>'
                ];
            }else{
                return [
                    "status" => "error",
                    "message" => sprintf(__("Enter the 6 digit code we sent to the number ending in %s"), $response->step_data->contact_point),
                    "callback" => '<script type="text/javascript">Instagram_profiles.open_security_form();</script>'
                ];
            }

        } catch (InvalidArgumentException $e) {

            return [
                "status" => "error",
                "message" => $e->getMessage()
            ];

        }
    }

    public function confirm_security_code($apiPath){
        try {

            $response = $this->ig->checkpoint->confirm_security_code($this->username, $this->password, $apiPath, $this->security_code);
            return $this->check_2fa($response);

        } catch (InvalidArgumentException $e) {

            return [
                "status" => "error",
                "message" => $e->getMessage()
            ];

        } catch (Exception $e) {
                
            if(empty($e)){
                return [
                    "status" => "error",
                    "message" => __("Could not verification code please try again later")
                ];
            }

            $response = $e->getResponse();
            if(is_object($response) && $response->getStatus() != "ok"){
                try {
                    if($response->getMessage() == "This field is required."){
                        return $this->send_security_code($apiPath);
                    }

                    return $this->resend_security_code($apiPath);
                } catch (Exception $e) {
                    
                    return [
                        "status" => "error",
                        "message" => $e->getMessage()
                    ];

                }
            }else{
                return [
                    "status" => "success",
                    "message" => __("Success")
                ];
            }
        }
    }

    public function resend_security_code($apiPath){
        try {
            $response = $this->ig->checkpoint->resend_security_code($this->username, $apiPath, $this->choice);
            
            if(empty($response) || is_null($response)){
                return [
                    "status" => "error",
                    "message" => __("Could not send verification code please try again later")
                ];
            }

            if(isset($response->message) && strpos($response->message, "is not one of the available choices") !== false){
                $new_choice = $this->choice==1?0:1;
                $response = $this->ig->checkpoint->resend_security_code($this->username, $apiPath, $new_choice);
            }

            if($response->status != "ok"){
                return [
                    "status" => "error",
                    "message" => __("Could not send verification code please try again later")
                ];
            }

            if($response->status == "ok" && isset($response->action)  && $response->action == "close"){
                $this->login();
            }

            if(isset($response->step_name)){
                if($response->step_name == "verify_email"){
                    return [
                        "status" => "error",
                        "message" => sprintf(__("Enter the 6 digit code we sent to the email address %s"), $response->step_data->contact_point),
                        "callback" => '<script type="text/javascript">Instagram_profiles.open_security_form();</script>'
                    ];
                }else{
                    return [
                        "status" => "error",
                        "message" => sprintf(__("Enter the 6 digit code we sent to the number ending in %s"), $response->step_data->contact_point),
                        "callback" => '<script type="text/javascript">Instagram_profiles.open_security_form();</script>'
                    ];
                }
            }else{
                $this->re_save();
            }

        } catch (Exception $e) {
            return [
                "status" => "error",
                "message" => $e->getMessage()
            ];
        }
    }

    public function clear_cookie(){
        $this->db->delete("sp_instagram_sessions", ["username" => $this->username]);
    }
}