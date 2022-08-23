<?php
use Abraham\TwitterOAuth\TwitterOAuth;

class twitter_profiles extends MY_Controller {
	
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

        $this->consumer_key = get_option('twitter_consumer_key', '') ;
        $this->consumer_secret = get_option('twitter_consumer_secret', '');

        if($this->consumer_key == "" || $this->consumer_secret == ""){
            redirect( get_url("social_network_configuration/index/twitter") );
        }

        $this->callback_url = get_module_url();
	}

	public function index($page = "", $ids = "")
	{
		//
        try {

            if(!_s("twitter_access_token")){
                $oauth_token = _s("twitter_oauth_token");
                $oauth_token_secret = _s("twitter_oauth_token_secret");
                _us("twitter_oauth_token");
                _us("twitter_oauth_token_secret");

                $connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $oauth_token, $oauth_token_secret);
                $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => post("oauth_verifier")]);
                _ss("twitter_access_token", $access_token);
            }else{
                $connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
                $access_token = _s("twitter_access_token");
            }

            $access_token = (object)$access_token;
            $connection->setOauthToken($access_token->oauth_token, $access_token->oauth_token_secret);
            $profile = $connection->get("account/verify_credentials");

            $result = [];
            $result[] = (object)[
                'id' => $profile->id,
                'name' => $profile->name,
                'avatar' => $profile->profile_image_url_https,
                'desc' => $profile->screen_name
            ];

            $data = [
                "status" => "success",
                "result" => $result
            ];

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
		$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $this->callback_url));

        _ss("twitter_oauth_token", $request_token['oauth_token']);
        _ss("twitter_oauth_token_secret", $request_token['oauth_token_secret']);

        $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        redirect($url);
	}

	public function save()
	{
		try {
            $ids = post('id');
            $team_id = _t("id");

            validate('empty', __('Please select a profile to add'), $ids);

            $connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
            $access_token = _s("twitter_access_token");
            $accessToken = (object)$access_token;
            $connection->setOauthToken($accessToken->oauth_token, $accessToken->oauth_token_secret);

            //
            $profile = $connection->get("account/verify_credentials");

            if($ids[0] == $profile->id){
                $item = $this->model->get('*', $this->tb_account_manager, "social_network = 'twitter' AND team_id = '{$team_id}' AND pid = '{$profile->id}'");
                $avatar = save_img( $profile->profile_image_url_https, TMP_PATH.'avatar/' );

                if(!$item){
                    $data = [
                        'ids' => ids(),
                        'social_network' => 'twitter',
                        'category' => 'profile',
                        'login_type' => 1,
                        'can_post' => 1,
                        'team_id' => $team_id,
                        'pid' => $profile->id,
                        'name' => $profile->name,
                        'username' => $profile->screen_name,
                        'token' => json_encode($access_token),
                        'avatar' => $avatar,
                        'url' => 'https://twitter.com/'.$profile->screen_name,
                        'data' => NULL,
                        'status' => 1,
                        'changed' => now(),
                        'created' => now()
                    ];

                    check_number_account("twitter", "profile");

                    $this->model->insert($this->tb_account_manager, $data);
                }else{
                    @unlink($item->avatar);

                    $data = [
                        'social_network' => 'twitter',
                        'category' => 'profile',
                        'login_type' => 1,
                        'can_post' => 1,
                        'team_id' => $team_id,
                        'pid' => $profile->id,
                        'name' => $profile->name,
                        'username' => $profile->screen_name,
                        'token' => json_encode($access_token),
                        'avatar' => $avatar,
                        'url' => 'https://twitter.com/'.$profile->screen_name,
                        'status' => 1,
                        'changed' => now(),
                    ];

                    $this->model->update($this->tb_account_manager, $data, ['id' => $item->id]);
                }

                _us('twitter_access_token');
                
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
        } catch (Exception $e) {
            ms([
                "status" => "error",
                "message" => $e->getMessage()
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