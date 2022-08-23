<?php
use Abraham\TwitterOAuth\TwitterOAuth;
class twitter_post_model extends MY_Model {
	public $tb_account_manager = "sp_account_manager";

	public function __construct(){
		parent::__construct();
		$module_path = get_module_directory(__DIR__);
		include $module_path.'libraries/vendor/autoload.php';

		//
		$this->module_name = get_module_config( $module_path, 'name' );
		$this->module_icon = get_module_config( $module_path, 'icon' );
		$this->module_color = get_module_config( $module_path, 'color' );
		//
		
		$this->consumer_key = get_option('twitter_consumer_key', '') ;
        $this->consumer_secret = get_option('twitter_consumer_secret', '');

        $this->twitter = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
	}

	public function block_permissions($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'position' => 8800,
			'name' => $this->module_name,
			'color' => $this->module_color,
			'icon' => $this->module_icon, 
			'id' => str_replace("_model", "", get_class($this)),
			'html' => view( $dir.'pages/block_permissions', ['path' => $path], true, $this ),
		];
	}

	public function block_report($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'tab' => 'twitter',
			'position' => 1000,
			'name' => $this->module_name,
			'color' => $this->module_color,
			'icon' => $this->module_icon, 
			'id' => str_replace("_model", "", get_class($this)),
			'html' => view( $dir.'pages/block_report', ['path' => $path], true, $this ),
		];
	}

	public function block_post_preview($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'position' => 1000,
			'name' => $this->module_name,
			'color' => $this->module_color,
			'icon' => $this->module_icon, 
			'id' => str_replace("_model", "", get_class($this)),
			'preview' => view( $dir.'pages/preview', ['path' => $path], true, $this ),
		];
	}

	public function post( $data ){
		$post_type = $data["post_type"];
		$account = $data["account"];
		$medias = $data["medias"];
		$link = $data["link"];
		$advance = $data["advance"];
		$caption = $this->cut_text( spintax( $data["caption"] ) );
		$is_schedule = $data["is_schedule"];
		$endpoint = "statuses/update";
		
		if($is_schedule)
		{	
			return [
            	"status" => "success",
            	"message" => __('Success'),
            	"type" => $post_type
            ];
		}
		
		$access_token = json_decode($account->token);
		$this->twitter->setOauthToken($access_token->oauth_token, $access_token->oauth_token_secret);

		$params = [];

		switch ($post_type)
		{
			case 'photo':
				
				$this->twitter->setTimeouts(10,60);
                $media_ids = array();
                $medias = array_chunk($medias, 4);
                foreach ($medias[0] as $media) {
                	$media = watermark($media, $account->team_id, $account->id);
                    $image_info = @getimagesize( get_file_path($media) );
                    if(!empty($image_info)){
                        $upload = $this->twitter->upload( 'media/upload', array('media' => get_file_path($media) ));
                        unlink_watermark([$media]);
                        if( isset($upload->media_id_string)){
                        	$media_ids[] = $upload->media_id_string;
                        }
                    }
                }

                $params = [
                    'status' => $caption,
                	'media_ids' => implode(',', $media_ids)
                ];

				break;

			case 'video':

				$this->twitter->setTimeouts(10,60);
                $upload = $this->twitter->upload('media/upload', [
                    'media' => get_file_path($medias[0]),
                    'media_type' => 'video/mp4',
                    'media_category' => 'tweet_video',
                ], true);

                $media_id = $upload->media_id_string;

                if(isset($upload->processing_info)) {
				    $info = $upload->processing_info;
				    if($info->state != 'succeeded') {
				        $attempts = 0;
				        $check_after_secs = $info->check_after_secs;
				        $success = false;
				        do {
				            $attempts++;
				            sleep($check_after_secs);
				            $upload = $this->twitter->mediaStatus($media_id);
				            $processing_info = $upload->processing_info;
				            if($processing_info->state == 'succeeded' || $processing_info->state == 'failed') {
				                break;
				            }
				            $check_after_secs = $processing_info->check_after_secs;
				        } while($attempts <= 10);
				    }
				}

     			$params = [
                    'status' => $caption,
                	'media_ids' => $upload->media_id_string
                ];
                
				break;

			case 'link':
				
				$params = [
                    'status' => $caption." ".$link,
                ];

				break;

			case 'text':

				$params = ['status' => $caption];

				break;
			
		}

        try {
        	if(isset($advance['location'])){
    			$params['place_id'] = (string)$advance['location'];
        	}

        	$response = $this->twitter->post($endpoint, $params);


	        if(isset($response->id)){
	            $post_id =  $response->id;
	            return [
	            	"status" => "success",
	            	"message" => __('Success'),
	            	"id" => $post_id,
	            	"url" => "https://twitter.com/".$response->user->screen_name."/status/".$response->id_str,
	            	"type" => $post_type
	            ]; 
	        }else{
	            return [
	            	"status" => "error",
	            	"message" => __( $response->errors[0]->message ),
	            	"type" => $post_type
	            ];
	        }
        } catch (Exception $e) {
        	return [
            	"status" => "error",
            	"message" => __( $e->getMessage() ),
            	"type" => $post_type
            ];
        }
	}

	public function location($keyword = ""){
		$team_id = _t('id');
		$account = $this->model->get("*", $this->tb_account_manager, "social_network = 'twitter' AND status = 1 AND team_id = '{$team_id}'", "id", "RANDOM");
		if($account){

			$access_token = json_decode($account->token);
			$this->twitter->setOauthToken($access_token->oauth_token, $access_token->oauth_token_secret);
			$response = $this->twitter->get("geo/search", ["query" => $keyword]);

			if(isset($response->result)){
				return $response->result->places;
			}
		}
		
		return false;
	}
	
	public function cut_text($text, $n = 280){ 
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
