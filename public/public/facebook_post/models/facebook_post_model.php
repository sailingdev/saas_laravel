<?php
class facebook_post_model extends MY_Model {
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

		$app_id = get_option('facebook_client_id', '');
        $app_secret = get_option('facebook_client_secret', '');
        $app_version = get_option('facebook_app_version', 'v7.0');

        if($app_id != "" && $app_secret != "" && $app_version != ""){
			$this->fb = new \Facebook\Facebook([
	            'app_id' => $app_id,
	            'app_secret' => $app_secret,
	            'default_graph_version' => $app_version,
	        ]);
        }

	}

	public function block_permissions($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'position' => 9000,
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
			'tab' => 'facebook',
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
		$caption = spintax( $data["caption"] );
		$is_schedule = $data["is_schedule"];
		$endpoint = "/".$account->pid."/";
		$params = [];

		if($post_type == "photo" || $post_type == "video")
		{
			$post_type = "media";
		}

		if($is_schedule)
		{	
			return [
            	"status" => "success",
            	"message" => __('Success'),
            	"type" => $post_type
            ];
		}

		switch ($post_type)
		{
			case 'media':
				
				if(count($medias) == 1)
				{
                    if(is_photo($medias[0]))
                  	{
                  		$medias[0] = watermark($medias[0], $account->team_id, $account->id);
                		$endpoint .= "photos";
                		$params = [
                			'message' => $caption,
                            'url' => $medias[0]
                		];
                    }
                    else
                    {

                    	$endpoint .= "videos";
                    	$params = [
                            'description' => $caption,
                            'file_url' => $medias[0]
                        ];
                    }
                }
                else
                {

                	$media_ids = [];
                	$success_count = 0;
                	foreach ($medias as $key => $media)
                    {   
                        if(is_photo($media))
                        {
                        	$media = watermark($media, $account->team_id, $account->id);
                        	$medias[$key] = $media;
                    		$upload_params = [
                                'url' => $media,
                                'published' => false
                            ];

                        	try
                        	{
	                        	$upload = $this->fb->post( $endpoint.'photos', $upload_params, $account->token)->getDecodedBody();
	                        	$media_ids['attached_media['.$success_count.']'] = '{"media_fbid":"'.$upload['id'].'"}';
	                            $success_count++;
	                        }
	                        catch (Exception $e) {
	                        }

                        }
                        else
                        {	
                        	//Pages not support post multi media with videos.
                        	if($account->category != "page"){

	                        	$upload_params = [
	                                'file_url' => $media,
	                                'published' => false
	                            ];

	                        	try
	                        	{
		                        	$upload = $this->fb->post( $endpoint.'videos', $upload_params, $account->token)->getDecodedBody();
		                        	$media_ids['attached_media['.$success_count.']'] = '{"media_fbid":"'.$upload['id'].'"}';
		                            $success_count++;
		                        } 
		                        catch (Exception $e) {}

                        	}
                        }
                    } 

                    $endpoint .= "feed";
                    $params = ['message' => $caption];

                    $params += $media_ids;
                }

				break;

			case 'link':
				
				$endpoint .= "feed";
				$params = [
                    'message' => $caption,
                    'link' => $link
                ];

				break;

			case 'text':
				
				$endpoint .= "feed";
				$params = ['message' => $caption];

				break;
			
		}

		try
		{
            $response = $this->fb->post($endpoint, $params, $account->token)->getDecodedBody();
            $post_id =  $response['id'];
            unlink_watermark($medias);
            return [
            	"status" => "success",
            	"message" => __('Success'),
            	"id" => $post_id,
            	"url" => "https://fb.com/".$post_id,
            	"type" => $post_type
            ]; 
        } catch(Exception $e) {
        	if($e->getCode() == 190){
            	$this->model->update($this->tb_account_manager, [ "status" => 0 ], [ "id" => $account->id ] );
            }
            unlink_watermark($medias);
            return [
            	"status" => "error",
            	"message" => __( $e->getMessage() ),
            	"type" => $post_type
            ];
        }

	}
}
