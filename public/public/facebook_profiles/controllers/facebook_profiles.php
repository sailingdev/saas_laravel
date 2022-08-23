<?php
class facebook_profiles extends MY_Controller {
	
	public $tb_account_manager = "sp_account_manager";
	public $module_name;

	public function __construct(){
		parent::__construct();
		_permission("account_manager_enable");
		$this->load->model(get_class($this).'_model', 'model');
		include get_module_path($this, 'libraries/vendor/autoload.php', true);

		//
		$this->module_name = get_module_config( $this, 'name' );
		$this->module_icon = get_module_config( $this, 'icon' );
		$this->module_color = get_module_config( $this, 'color' );
		//

        $app_id = get_option('facebook_client_id', '');
        $app_secret = get_option('facebook_client_secret', '');
        $app_version = get_option('facebook_app_version', 'v10.0');

        if($app_id == "" || $app_secret == "" || $app_version == ""){
            redirect( get_url("social_network_configuration/index/facebook") );
        }

        $fb = new \Facebook\Facebook([
            'app_id' => $app_id,
            'app_secret' => $app_secret,
            'default_graph_version' => $app_version,
        ]);

        $this->fb = $fb;
	}

	public function index($page = "", $ids = "")
	{
		//
		$callback_url = get_module_url();
        $helper = $this->fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken($callback_url);
            $accessToken = $accessToken->getValue();
            _ss('accessToken', $accessToken);

            $response = $this->get('/me?fields=id,name,picture', $accessToken);

            if(!is_string($response)){
        		$result = [];
            		$result[] = (object)[
                    'id' => $response->id,
                    'name' => $response->name,
                    'avatar' => $response->picture->data->url,
                    'desc' => $response->name
                ];

        		$data = [
            		"status" => "success",
            		"result" => $result
            	];
            }else{
            	$data = [
	           		"status" => "error",
	           		"message" => $response
	           	];
            }
        } catch (Exception $e) {
           	$data = [
           		"status" => "error",
           		"message" => $e->getMessage()
           	];
        }

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

	public function block()
	{}

	public function popup()
	{}

	public function oauth()
	{
		
		$helper = $this->fb->getRedirectLoginHelper();
        $permissions = [ get_option('facebook_profile_permissions', '') ];
        $login_url = $helper->getLoginUrl( get_module_url() , $permissions);
        redirect($login_url);

	}

	public function save()
	{
		$ids = post('id');
        $team_id = _t("id");
		$accessToken = _s('accessToken');

		validate('empty', __('Please select a profile to add'), $ids);

		$response = $this->get('/me?fields=id,name,picture', $accessToken);

		_us('accessToken');

        if(!is_string($response)){

			if(in_array($response->id, $ids, true)){

				$avatar = save_img( $response->picture->data->url, TMP_PATH.'avatar/' );

				$item = $this->model->get('*', $this->tb_account_manager, "social_network = 'facebook' AND team_id = 1 AND pid = '{$response->id}'");
				if(!$item){
					$data = [
						'ids' => ids(),
						'social_network' => 'facebook',
						'category' => 'profile',
						'login_type' => 1,
                        'can_post' => 0,
						'team_id' => $team_id,
						'pid' => $response->id,
						'name' => $response->name,
						'username' => $response->name,
						'token' => $accessToken,
						'avatar' => $avatar,
						'url' => 'https://fb.com/'.$response->id,
						'data' => NULL,
						'status' => 1,
						'changed' => now(),
						'created' => now()
					];

					$this->model->insert($this->tb_account_manager, $data);
				}else{
					@unlink($item->avatar);

					$data = [
						'social_network' => 'facebook',
						'category' => 'profile',
						'login_type' => 1,
                        'can_post' => 0,
						'team_id' => $team_id,
						'pid' => $response->id,
						'name' => $response->name,
						'username' => $response->name,
						'token' => $accessToken,
						'avatar' => $avatar,
						'url' => 'https://fb.com/'.$response->id,
						'status' => 1,
						'changed' => now(),
					];

					$this->model->update($this->tb_account_manager, $data, ['id' => $item->id]);
				}
			}

    		ms([
        		"status" => "success",
        		"message" => __("Success")
        	]);
   
        }else{
        	ms([
           		"status" => "error",
           		"message" => $response
           	]);
        }
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

}