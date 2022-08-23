<?php
class instagram_post_model extends MY_Model {
	public $tb_account_manager = "sp_account_manager";

	public function __construct(){
		parent::__construct();
		$module_path = get_module_directory(__DIR__);
		include $module_path.'libraries/vendor/autoload.php';
		include $module_path.'libraries/grafika/src/autoloader.php';
		include $module_path.'libraries/ImgCompressor.class.php';

		//
		$this->module_name = get_module_config( $module_path, 'name' );
		$this->module_icon = get_module_config( $module_path, 'icon' );
		$this->module_color = get_module_config( $module_path, 'color' );
		//
		
		$this->ig = new \InstagramAPI\Instagram(false, false, [
            'storage'    => 'mysql',
            'dbhost'     => DB_HOST,
            'dbname'     => DB_NAME,
            'dbusername' => DB_USER,
            'dbpassword' => DB_PASS,
            'dbtablename'=> "sp_instagram_sessions"
        ]);

        $this->ig->setVerifySSL(false);

        $this->app_id = get_option('instagram_app_id', '');
        $this->app_secret = get_option('instagram_app_secret', '');
        $this->app_version = get_option('instagram_app_version', 'v9.0');

        if( get_option('instagram_login_button', 0) && $this->app_id && $this->app_secret && $this->app_version){
            $fb = new \Facebook\Facebook([
                'app_id' => $this->app_id,
                'app_secret' => $this->app_secret,
                'default_graph_version' => $this->app_version,
            ]);

            $this->fb = $fb;
        }
	}

	public function block_permissions($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'position' => 8900,
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
			'tab' => 'instagram',
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

	public function post_validator($data){
		$errors = array();
		if( !empty($data['accounts']) ){
			foreach ($data['accounts'] as $key => $value) {
				if( strpos( $value, "instagram__" ) !== false ){

					$account_id = explode("__", $value);

					if( count($account_id) == 2 ){

						$account_id = $account_id[1];
						$account = $this->model->get("login_type", $this->tb_account_manager, "ids = '{$account_id}' AND login_type = 1");

						if(!empty($account)){
							if($data['post_type'] != "media" && $data['post_type'] != "photo" && $data['post_type'] != "link"){
								if( isset($data['advance']) ){
									ms([
						            	"status" => "error",
						            	"message" => __("Instagram API Official just support post with Photo type")
						            ]);
								}else{
									$errors[] = __("Instagram API Official just support post with Photo type");
								}
							}

							/*if( $data['post_type'] == "media" && isset($data['medias']) && !empty($data['medias']) ){
								if(!is_photo($data['medias'][0])){
									ms([
						            	"status" => "error",
						            	"message" => __("Instagram API Official just support post with Photo type")
						            ]);
								}
							}*/
						}

					}
				}
			}
		}

		switch ($data['post_type']) {
			case 'text':
				$errors[] = __("Instagram requires an image or video");

				break;

			case 'link':
				if(empty($data['medias'])){
					$errors[] = __("Instagram requires an image or video");
				}
				break;

			case 'igtv':
				if(!isset($data['advance']['title']) || $data['advance']['title'] == ""){
					ms([
		            	"status" => "error",
		            	"message" => __("Instagram requires title for IGTV")
		            ]);
				}
				break;
		}

		return $errors;
	}

	public function post( $data ){
		$post_type = $data["post_type"];
		$account = $data["account"];
		$medias = $data["medias"];
		$link = $data["link"];
		$advance = $data["advance"];
		$caption = $this->create_caption( spintax( $data["caption"]. "\n\n". $link ) );
		$is_schedule = $data["is_schedule"];
		$endpoint = "statuses/update";
		$proxy = get_proxy($account->proxy);
		$params = ['caption' => $caption];

		$post_type_accept = ["photo", "video", "link"];	
        if(in_array($post_type, $post_type_accept)){
        	$post_type = "media";
        }

        if( count($medias) > 1 ){
        	$post_type = "carousel";
        }

        if($is_schedule)
		{	
			return [
            	"status" => "success",
            	"message" => __('Success'),
            	"type" => $post_type
            ];
		}

		if($proxy != ""){
			$this->ig->setProxy($proxy);
		}

		try{
			if($account->login_type == 1){

				if(is_photo($medias[0])){
					$upload_endpoint = "/".$account->pid."/media";

					$image = $this->instagram_image_handlers($medias[0], "photo", $account->team_id, $account->id);

					if( stripos($image, "http") === false ){
						$image = BASE. $image;
					}else{
						$image = $image;
					}

					$upload_params = [
	                    'image_url' => $image,
	                    'caption' => $caption,

	                ];

					$upload_response = $this->fb->post( $upload_endpoint, $upload_params, $account->token)->getDecodedBody();

					//Publish
					$endpoint = "/".$account->pid."/media_publish";
					$params = [
	                    'creation_id' => $upload_response['id'],
	                ];

					$response = $this->fb->post( $endpoint, $params, $account->token)->getDecodedBody();

					$media_response = $this->fb->get( "/". $response["id"]."?fields=shortcode", $account->token)->getDecodedBody();

					return [
		            	"status" => "success",
		            	"message" => __('Success'),
		            	"id" => $response["id"],
		            	"url" => "https://www.instagram.com/p/".$media_response['shortcode'],
		            	"type" => $post_type
		            ]; 
		        }else{
		        	$upload_endpoint = "/".$account->pid."/media";
					$upload_params = [
						'media_type' => "VIDEO",
	                    'video_url' => $medias[0],
	                    'caption' => $caption,

	                ];
					$upload_response = $this->fb->post( $upload_endpoint, $upload_params, $account->token)->getDecodedBody();

					$attempts = 0;
		            do {
			            $attempts++;
			            sleep(2);
			            try {
			            	//Publish
							$endpoint = "/".$account->pid."/media_publish";
							$params = [
			                    'creation_id' => $upload_response['id'],
			                ];

							$response = $this->fb->post( $endpoint, $params, $account->token)->getDecodedBody();

							if(isset($response["id"])){
								$media_response = $this->fb->get( "/". $response["id"]."?fields=shortcode", $account->token)->getDecodedBody();
								return [
					            	"status" => "success",
					            	"message" => __('Success'),
					            	"id" => $response["id"],
					            	"url" => "https://www.instagram.com/p/".$media_response['shortcode'],
					            	"type" => $post_type
					            ]; 
							}
			            } catch (Exception $e) {}
			        } while($attempts <= 30);

					return [
		            	"status" => "error",
		            	"message" => __('The media is not ready for publishing, please wait for a moment'),
		            ]; 
		        }
			}else{

	        	try {
		           	$this->ig->login($account->username, encrypt_decode($account->token));
		        } catch (InstagramAPI\Exception\InstagramException $e) {
		            // Couldn't login to Instagram account
		           	$this->model->update($this->tb_account_manager, [ "status" => 0 ], [ "id" => $account->id ] );

		            return [
		            	"status" => "error",
		            	"message" => __( $e->getMessage() ),
		            	"type" => $post_type
		            ];
		        } catch (\Exception $e) {

		            return [
		            	"status" => "error",
		            	"message" => __( $e->getMessage() ),
		            	"type" => $post_type
		            ];
		        }         
	            
		        if(isset($advance['location'])){
		        	$location = $advance['location'];
	                $location = @unserialize($location);
	                if ($location && ($location instanceof \InstagramAPI\Response\Model\Location)) {
	                    $params['location'] = $location;
	                }
		        }

	            switch ($post_type) {
	            	case 'media':
	            		
	            		if(is_photo($medias[0])){
	            			$medias[0] = $this->instagram_image_handlers($medias[0], "photo", $account->team_id, $account->id);

	            			$file_path = get_file_path($medias[0]);

	            			$img = new \InstagramAPI\Media\Photo\InstagramPhoto($file_path, [
		                        "targetFeed" => \InstagramAPI\Constants::FEED_TIMELINE,
		                        "operation" => \InstagramAPI\Media\InstagramMedia::CROP
		                    ]);

	            			$response = $this->ig->timeline->uploadPhoto( $img->getFile(), $params );
	            			unlink_watermark($medias);
	            		}else{
	            			if(!$this->check_post_video()){
	                            return [
	                                "status"  => "error",
	                                "message" => __("The system does not support video posting"),
	                                "type" => $post_type
	                            ];
	                        }

	            			$response = $this->ig->timeline->uploadVideo(get_file_path($medias[0]), $params);
	            		}

	        			if(isset($advance['comment']) && $advance['comment'] != ""){
	                    	$comment = $this->create_caption( $advance['comment'] );
	                        $this->ig->media->comment($response->getMedia()->getPk(), $comment);
	                    }

			            return [
			            	"status" => "success",
			            	"message" => __('Success'),
			            	"id" => $response->getMedia()->getId(),
			            	"url" => "https://www.instagram.com/p/".$response->getMedia()->getCode(),
			            	"type" => $post_type
			            ]; 
	            		break;

	            	case 'story':

	            		if(isset($advance['link_story']) && filter_var($advance['link_story'], FILTER_VALIDATE_URL)){
	            			$params['link'] = $advance['link_story'];
	            		}

	            		if(is_photo($medias[0])){
	            			$medias[0] = $this->instagram_image_handlers($medias[0], "story", $account->team_id, $account->id);
	            			$file_path = get_file_path($medias[0]);

	            			$img = new \InstagramAPI\Media\Photo\InstagramPhoto($file_path, [
		                        "targetFeed" => \InstagramAPI\Constants::FEED_STORY,
		                        "operation" => \InstagramAPI\Media\InstagramMedia::CROP
		                    ]);

	            			if(!isset($advance['close_friends_story'])){
	            				$response = $this->ig->story->uploadPhoto($img->getFile(), $params);
	            			}else{
	            				$response = $this->ig->story->uploadCloseFriendsPhoto($img->getFile(), $params);
	            			}
	            			unlink_watermark($medias);
	            		}else{
	            			if(!$this->check_post_video()){
	                            return [
	                                "status"  => "error",
	                                "message" => __("The system does not support video posting"),
	                                "type" => $post_type
	                            ];
	                        }

	                        if(!isset($advance['close_friends_story'])){
		                        $response = $this->ig->story->uploadVideo(get_file_path($medias[0]), $params);
		                    }else{
		                    	$response = $this->ig->story->uploadCloseFriendsVideo(get_file_path($medias[0]), $params);
		                    }
	            		}

	                    if(isset($advance['comment']) && $advance['comment'] != ""){
	                    	$comment = $this->create_caption( $advance['comment'] );
	                        $this->ig->media->comment($response->getMedia()->getPk(), $comment);
	                    }

	                    return [
			            	"status" => "success",
			            	"message" => __('Success'),
			            	"id" => $response->getMedia()->getId(),
			            	"url" => "https://www.instagram.com/stories/".$response->getMedia()->getUser()->getUsername(),
			            	"type" => $post_type
			            ]; 
	            		break;

	            	case 'igtv':
	            		if(!$this->check_post_video()){
	                        return [
	                            "status"  => "error",
	                            "message" => __("The system does not support video posting"),
	                            "type" => $post_type
	                        ];
	                    }

	                    if(!isset($advance['title']) || $advance['title'] == ""){
							return [
				            	"status" => "error",
				            	"message" => __("Instagram requires title for IGTV"),
				            	"type" => $post_type
				            ];
						}

						$params['title'] = $advance['title'];

	                    $response = $this->ig->tv->uploadVideo(get_file_path($medias[0]), $params);

	                 	if(isset($advance['comment']) && $advance['comment'] != ""){
	                    	$comment = $this->create_caption( $advance['comment'] );
	                        $this->ig->media->comment($response->getMedia()->getPk(), $comment);
	                    }

	                    return [
			            	"status" => "success",
			            	"message" => __('Success'),
			            	"id" => $response->getMedia()->getId(),
			            	"url" => "https://www.instagram.com/stories/".$response->getMedia()->getUser()->getUsername(),
			            	"type" => $post_type
			            ]; 
	            		break;

	            	case 'carousel':
	            		$carousels = array();
	                    $medias = array_chunk($medias , 10);

	                    foreach ($medias[0] as $key => $media) {
	                    	if(is_photo($media)){
	                    		$media = $this->instagram_image_handlers($media, "carousel", $account->team_id, $account->id);
	                    		$medias[$key] = $media; 

	                    		$carousels[] = [
	                                'type' => 'photo',
	                                'file' => get_file_path($media)
	                            ];
	                    	}else{
	                    		if(!$this->check_post_video()){
			                        return [
			                            "status"  => "error",
			                            "message" => __("The system does not support video posting"),
			                            "type" => $post_type
			                        ];
			                    }

	                    		$carousels[] = [
	                                'type' => 'video',
	                                'file' => get_file_path($media)
	                            ];
	                    	}
	                    }

	                    $response = $this->ig->timeline->uploadAlbum($carousels, $params);

	                    unlink_watermark($medias);
	            		
	                    if(isset($advance['comment']) && $advance['comment'] != ""){
	                    	$comment = $this->create_caption( $advance['comment'] );
	                        $this->ig->media->comment($response->getMedia()->getPk(), $comment);
	                    }
	                    
	            		return [
			            	"status" => "success",
			            	"message" => __('Success'),
			            	"id" => $response->getMedia()->getPk(),
			            	"url" => "https://www.instagram.com/p/".$response->getMedia()->getCode(),
			            	"type" => $post_type
			            ]; 
	            		break;
	            	
	            }

			}

        }catch (Exception $e){
        	unlink_watermark($medias);
        	return [
            	"status" => "error",
            	"message" => __( $e->getMessage() ),
            	"type" => $post_type
            ];
        }
	}

	public function instagram_image_handlers($file_path, $type, $team_id, $account_id){
        $file_path = get_file_path($file_path);

        if(stripos($file_path, "https://") !== FALSE){
        	$file_data = file_get_contents($file_path);
        	$file_path = TMP_PATH.uniqid().".jpg";
        	file_put_contents($file_path, $file_data);
        }

        if(get_option('enable_ig_optimize_option', 0)==1){
            // setting
            $setting = array('directory' => TMP_PATH);
            if(file_exists($file_path)){
                $ImgCompressor = new ImgCompressor($setting);
                $result = $ImgCompressor->run($file_path, 'jpg', 4); 
                $file_path = $result;
            }
        }
        
        switch ($type) {
            case 'photo':
                $img = new \InstagramAPI\Media\Photo\InstagramPhoto($file_path, [
                    "targetFeed" => \InstagramAPI\Constants::FEED_TIMELINE,
                    "operation" => \InstagramAPI\Media\InstagramMedia::CROP
                ]);
                break;

            case 'story':
                $img = new \InstagramAPI\Media\Photo\InstagramPhoto($file_path, [
                    "targetFeed" => \InstagramAPI\Constants::FEED_STORY,
                    "operation" => \InstagramAPI\Media\InstagramMedia::CROP
                ]);
                break;

            case 'carousel':
                $img = new \InstagramAPI\Media\Photo\InstagramPhoto($file_path, [
                    "targetFeed" => \InstagramAPI\Constants::FEED_TIMELINE_ALBUM,
                    "operation" => \InstagramAPI\Media\InstagramMedia::CROP,
                ]);
                break;
        }

        $img_tmp = TMP_PATH.uniqid().".jpg";
        $img_data = file_get_contents($img->getFile());
        file_put_contents($img_tmp, $img_data);
        @unlink($result);


        $img = watermark($img_tmp, $team_id, $account_id);
        if($img != $img_tmp){
        	@unlink($img_tmp);
        }

        return $img;
    }

	public function location($keyword){
		$team_id = _t('id');
		$account = $this->model->get("*", $this->tb_account_manager, "social_network = 'instagram' and login_type = 2 AND status = 1 AND team_id = '{$team_id}'", "id", "RANDOM");
		if($account){
			try {
	           	$this->ig->login($account->username, $account->token);
	           	$locations = $this->ig->location->search('-37.8173234', '144.95373', $keyword);
	           	$locations = $locations->getVenues();
	           	return $locations;
	        } catch (InstagramAPI\Exception\InstagramException $e) {
	            // Couldn't login to Instagram account
	           	$this->model->update($this->tb_account_manager, [ "status" => 0 ], [ "id" => $account->id ] );
	        } catch (\Exception $e) {}
		}

		return false;
	}

	public function location_official($keyword){
		$team_id = _t('id');
		$account = $this->model->get("*", $this->tb_account_manager, "social_network = 'instagram' and login_type = 1 AND status = 1 AND team_id = '{$team_id}'", "id", "RANDOM");
		if($account){
           	$locations = $this->fb->get( "/pages/search?q={$keyword}&fields=location", $account->token)->getDecodedBody();
           	pr($locations,1);
           	return $locations;
			try {
	        } catch (\Exception $e) {
	            // Couldn't login to Instagram account
	           	$this->model->update($this->tb_account_manager, [ "status" => 0 ], [ "id" => $account->id ] );
	        } catch (\Exception $e) {}
		}

		return false;
	}

	public function check_post_video(){
		$FFmpeg = get_option('instagram_ffmpeg_path', "");
		$FFFprobe = get_option('instagram_ffprobe_path', "");
	    \InstagramAPI\Utils::$ffmpegBin = $FFmpeg==""?NULL:$FFmpeg;
	    \InstagramAPI\Utils::$ffprobeBin = $FFFprobe==""?NULL:$FFFprobe;
	    
	    if (\InstagramAPI\Utils::checkFFPROBE()) {
	        try {
	            InstagramAPI\Media\Video\FFmpeg::factory();
	            return true;
	        } catch (\Exception $e) {
	            return false;
	        }
	    }
	    return false;
	}

	public function getInstagramUrlFromMediaId($instagram_id = "") {
		$url_prefix = "https://www.instagram.com/p/";

	    if(!empty(strpos($instagram_id, '_'))){
	        $parts = explode('_', $instagram_id);
	        $instagram_id = $parts[0];
	        $userid = $parts[1];
	    }

	    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';
	    $url_suffix = '';
	    while($instagram_id > 0){

	        $remainder = $instagram_id % 64;
	        $instagram_id = ($instagram_id-$remainder) / 64;
	        $url_suffix = $alphabet{$remainder} . $url_suffix;

	    };

	    return $url_prefix.$url_suffix;
	}

	function create_caption($caption){
		$caption = preg_replace("/\r\n\r\n/", "?.??.?", $caption);
		$caption = preg_replace("/\r\n/", "?.?", $caption);
		$caption = str_replace("?.? ?.?", "?.?", $caption);
		$caption = str_replace(" ?.?", "?.?", $caption);
		$caption = str_replace("?.? ", "?.?", $caption);
		$caption = str_replace("?.??.?", "\n\n", $caption);
		$caption = str_replace("?.?", "\n", $caption);
		return $caption;
	}

	public function get_message($message){
		$message = explode(": ", $message);
		if(count($message) == 2){
			return $message[1];
		}else if(count($message) > 2){
			return $message[2];
		}else{
			return $message[0];
		}
	}
}
