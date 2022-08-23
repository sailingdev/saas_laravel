<?php
class facebook_groups extends MY_Controller {
	
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
        try {
    		$callback_url = get_module_url();
            $helper = $this->fb->getRedirectLoginHelper();
            $accessToken = $helper->getAccessToken($callback_url);
            if($accessToken){
                $accessToken = $accessToken->getValue();
                _ss('accessToken', $accessToken);
            }

            $response = $this->get('/me/groups?fields=id,icon,name,description,email,privacy,cover&admin_only=true&limit=10000', $accessToken);
            if(is_string($response)){
                $response = $this->get('/me/groups?fields=id,icon,name,description,email,privacy,cover&admin_only=true&limit=3', $accessToken);
            }

            if(!is_string($response)){
            	if(isset($response->data) && !empty($response->data)){
            		$result = [];
            		foreach ($response->data as $row) {
            			$result[] = (object)[
            				'id' => $row->id,
            				'name' => $row->name,
            				'avatar' => $row->icon,
            				'desc' => $row->privacy
            			];
            		}

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

        $data['module_name'] = $this->module_name;
        $data['module_icon'] = $this->module_icon;
        $data['module_color'] = $this->module_color;
		
		$views = [
			"subheader" => view( 'main/subheader', [ 'module_name' => $this->module_name, 'module_icon' => $this->module_icon, 'module_color' => $this->module_color ], true ),
			"column_one" => page($this, "pages", "general", $page, $data)
		];
		
		views( [
			"title" => $this->module_name,
			"fragment" => "fragment_one",
			"views" => $views
		] );
	}

	public function oauth()
	{
		
		$helper = $this->fb->getRedirectLoginHelper();
        $permissions = [ get_option('facebook_group_permissions', 'publish_to_groups') ]; // Optional permissions
        $login_url = $helper->getLoginUrl( get_module_url() , $permissions);
        redirect($login_url);

	}

	public function save()
	{
		$ids = post('id');
        $team_id = _t("id");
		$accessToken = _s('accessToken');

		validate('empty', __('Please select a profile to add'), $ids);

		$response = $this->get('/me/groups?fields=id,icon,name,description,email,privacy,cover&admin_only=true&limit=10000', $accessToken);
        if(is_string($response)){
            $response = $this->get('/me/groups?fields=id,icon,name,description,email,privacy,cover&admin_only=true&limit=3', $accessToken);
        }

		_us('accessToken');

        if(!is_string($response)){
        	if(isset($response->data) && !empty($response->data)){
        		foreach ($response->data as $row) {

        			if(in_array($row->id, $ids, true)){

        				$avatar = save_img( $row->icon, TMP_PATH.'avatar/' );

        				$item = $this->model->get('*', $this->tb_account_manager, "social_network = 'facebook' AND team_id = '{$team_id}' AND pid = '{$row->id}'");
        				if(!$item){
        					$data = [
        						'ids' => ids(),
        						'social_network' => 'facebook',
        						'category' => 'group',
        						'login_type' => 1,
                                'can_post' => 1,
        						'team_id' => $team_id,
        						'pid' => $row->id,
        						'name' => $row->name,
        						'username' => $row->name,
        						'token' => $accessToken,
        						'avatar' => $avatar,
        						'url' => 'https://fb.com/'.$row->id,
        						'data' => NULL,
        						'status' => 1,
        						'changed' => now(),
        						'created' => now()
        					];

                            check_number_account("facebook", "group");

        					$this->model->insert($this->tb_account_manager, $data);
        				}else{
        					@unlink($item->avatar);

        					$data = [
        						'social_network' => 'facebook',
        						'category' => 'group',
        						'login_type' => 1,
                                'can_post' => 1,
        						'team_id' => $team_id,
        						'pid' => $row->id,
        						'name' => $row->name,
        						'username' => $row->name,
        						'token' => $accessToken,
        						'avatar' => $avatar,
        						'url' => 'https://fb.com/'.$row->id,
        						'status' => 1,
        						'changed' => now(),
        					];

        					$this->model->update($this->tb_account_manager, $data, ['id' => $item->id]);
        				}
        			}
        		}

        		ms([
            		"status" => "success",
            		"message" => __("Success")
            	]);
        	}else{
        		ms([
	           		"status" => "error",
	           		"message" => __('No profile to add')
	           	]);
        	}
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