<?php
class post extends MY_Controller {
	
	public $tb_account_manager = "sp_account_manager";
	public $tb_posts = "sp_posts";

	public function __construct(){
		parent::__construct();

		_permission(get_class($this)."_enable");
		$this->load->model(get_class($this).'_model', 'model');

		//
		$this->module_name = get_module_config( $this, 'name' );
		$this->module_icon = get_module_config( $this, 'icon' );
		$this->module_color = get_module_config( $this, 'color' );
		$this->dir = get_directory_block(__DIR__, get_class($this));
	}

	public function index($page = "", $ids = "")
	{
		$post_types = [
			[
				"id" => "photo",
				"name" => __("Photo"),
				"icon" => "far fa-images"
			],
			[
				"id" => "video",
				"name" => __("Video"),
				"icon" => "fas fa-video"
			],
			[
				"id" => "link",
				"name" => __("Link"),
				"icon" => "fas fa-link"
			],
			[
				"id" => "text",
				"name" => __("Text"),
				"icon" => "far fa-file-alt"
			]
		];

		$block_file_photo = Modules::run("file_manager/block_file", "multi", "image", "upload_photo");
		$block_file_video = Modules::run("file_manager/block_file", "single", "video", "upload_video");
		$block_file_link = Modules::run("file_manager/block_file", "single", "image", "upload_link");
		$block_post_type = Modules::run("post/block_post_type", $post_types);
		$block_preview = Modules::run("post/block_preview");
		$block_accounts = Modules::run("post/block_accounts");
		$block_link = Modules::run("post/block_link");
		$block_caption = Modules::run("post/block_caption");
		$block_schedule = Modules::run("post/block_schedule");

		$views = [
			"subheader" => view( 'main/subheader', [ 'module_name' => $this->module_name, 'module_icon' => $this->module_icon ], true ),
			"column_one" => $block_accounts,
			"column_two" => view("pages/general", [ 
				'file_manager_photo' => $block_file_photo, 
				'file_manager_video' => $block_file_video, 
				'file_manager_link' => $block_file_link, 
				'block_post_type' => $block_post_type, 
				'block_link' => $block_link, 
				'block_caption' => $block_caption, 
				'block_schedule' => $block_schedule 
			] ,true), 
			"column_three" => $block_preview, 
		];
		
		views( [
			"title" => $this->module_name,
			"fragment" => "fragment_three",
			"views" => $views
		] );
	}

	public function block(){}

	public function save($skip_validate = false){

		$post_type = post("post_type");
		$accounts = post("account");
		$medias = post("media");
		$link = post("link");
		$caption = post("caption");
		$time_post = timestamp_sql(post("time_post"));
		$is_schedule = post("is_schedule");
		$interval_per_post = (int)post("interval_per_post");
		$repost_frequency = (int)post("repost_frequency");
		$repost_until = timestamp_sql(post("repost_until"));
		$advance = post("advance");

		validate('empty', __('Please select at least a profile'), $accounts);

		switch ($post_type) {
			case 'media':
				validate('empty', __('Please select at least one media'), $medias);
				break;

			case 'photo':
				validate('empty', __('Please select at least one image'), $medias);
				break;

			case 'video':
				validate('empty', __('Please select at least one video'), $medias);
				break;

			case 'link':
				validate('null', __('Link'), $link);
				validate('link', '', $link);
				break;

			case 'igtv':
				validate('empty', __('Please select at least one video'), $medias);
				break;

			case 'story':
				validate('empty', __('Please select at least one media'), $medias);
				break;

			case 'carousel':
				if(count($medias) <= 1){
					ms([
						"status" => "error",
						"message" => __('Please select at least 2 medias')
					]);
				}
				break;
			
			default:
				validate('null', __('Post type'), $post_type);
				break;
		}

		if($post_type != "story"){
			validate('null', __('Caption'), $caption);
		}
		validate('null', __('Time post'), $time_post);
		validate('repost_frequency', __('Repost frequency'), $repost_frequency, 0);
		validate('min_number', __('Interval per post'), $interval_per_post, 1);

		if($repost_frequency > 0)
		{
			validate('null', __('Repost until'), $repost_until);
		}

		if($repost_frequency > 0 && $time_post > $repost_until){
			ms([
				"status" => "error",
				"message" => __("Time post must be smaller than repost until")
			]);
		}

		$data = [
			"post_type" => $post_type,
			"accounts" => $accounts,
			"medias" => $medias,
			"link" => $link,
			"caption" => $caption,
			"time_post" => $time_post,
			"is_schedule" => $is_schedule,
			"interval_per_post" => $interval_per_post,
			"repost_frequency" => $repost_frequency,
			"repost_until" => $repost_until,
			"advance" => $advance
		];

		$validator = $this->model->post_validator($data);

		$social_can_post = json_decode($validator["can_post"]);
		if( ($skip_validate && !empty($social_can_post)) || $validator["status"] == "success" ){
			$result = $this->model->post($data, $social_can_post);
			ms($result);
		}

		ms($validator);
	}

	public function block_post_type($post_types = [])
	{
		return view($this->dir."pages/block_post_type", [ "post_types" => $post_types ], true);
	}

	public function block_preview($social_networks = [])
	{
		$CI = &get_instance();
		$module_paths = get_module_paths();
		$preview_data = array();
		$general = "";
		

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

		        	$model_content = file_get_contents($model);
		        	if(_p($folder_name."_enable")){
			        	if (preg_match("/block_post_preview/i", $model_content))
						{	
							$path = '../../'.DIR_ROOT.$dir.$folder_name.'/models/'.strtolower($file_name);
							$key = md5($path);
							
							if(!empty($social_networks)){
								
								if(in_array($folder_name, $social_networks, true)){
									$CI->load->model($path, $key);
									$preview_data[$key] = $CI->$key->block_post_preview($key);
								}

							}else{
								$CI->load->model($path, $key);
								$preview_data[$key] = $CI->$key->block_post_preview($key);
							}
						}
					}

		        }

		    }
		}

		if( !empty($preview_data)){
			usort($preview_data, function($a, $b) {
	            return $a['position'] <=> $b['position'];
	        });
		}

		return view($this->dir."pages/block_preview", [ 'result' => $preview_data ], true, $this);
	}

	public function block_link()
	{
		return view($this->dir."pages/block_link", [], true, $this);
	}

	public function block_caption()
	{
		return view($this->dir."pages/block_caption", [], true, $this);
	}

	public function block_schedule()
	{
		$ids = addslashes(post("edit"));
		$post = $this->model->get("*", $this->tb_posts, "ids = '{$ids}'");
		return view($this->dir."pages/block_schedule", ["post" => $post], true, $this);
	}

	public function block_accounts($social_network = "", $where = ""){
		$block_group = Modules::run("group_manager/block_group");
		Modules::run(get_class($this)."/block");

		$team_id = _t("id");
		if( $social_network != "" ){
			$where = "AND social_network = '".$social_network."'";
		}

		$result = $this->model->fetch('*', $this->tb_account_manager, " status = '1' AND team_id = '{$team_id}' AND can_post = 1 ".$where, "social_network, category", "ASC");
		$result_final = [];

		$ids = addslashes(post("edit"));
		$post = $this->model->get("*", $this->tb_posts, "ids = '{$ids}'");

		if($result){
			foreach ($result as $row) {
				$social_network = $row->social_network;
				if(_p($social_network."_post_enable")){
					$result_final[] = $row;
				}
			}
		}

		return $this->load->view($this->dir."main/sidebar", [ 'post' => $post, 'result' => $result_final, 'block_group' => $block_group, 'module_name' => $this->module_name, 'module_icon' => $this->module_icon ], true, $this);
	}

	public function get_link()
	{
		$url = post("url");
		validate('link', '', $url);
		$data = get_link_info($url);
		$data['status'] = "success";
		ms($data);
	}

	public function cron(  )
	{

		$posts = $this->model->get_posts();
		if(!$posts){ 
			_e("Empty schedule");
			exit(0);
		}

		foreach ($posts as $post) {
			
			$accounts = [
				$post->social_network."__".$post->account_ids
			];

			$data_posts = json_decode($post->data);

			$id = $post->id;
			$ids = $post->ids;
			$team_id = $post->team_id;
			$account_id = $post->account_id;
			$category = $post->cate;
			$social_network = $post->social_network;
			$type = $post->type;
			$data = $post->data;
			$medias = $data_posts->medias;
			$link = $data_posts->link;
			$caption = $data_posts->caption;
			$advance = json_decode($data_posts->advance, true);
			$time_post = $post->time_post;
			$time_delete = $post->time_delete;
			$delay = $post->delay;
			$repost_frequency = $post->repost_frequency;
			$repost_until = $post->repost_until;
			$status = $post->status;
			$changed = $post->changed;
			$created = $post->created;
			
			$result = $this->model->post([
				"id" => $id,
				"team_id" => $team_id,
				"post_type" => $type,
				"accounts" => $accounts,
				"medias" => $medias,
				"link" => $link,
				"caption" => $caption,
				"time_post" => $time_post,
				"is_schedule" => false,
				"interval_per_post" => $delay,
				"repost_frequency" => $repost_frequency,
				"repost_until" => $repost_until,
				"advance" => $advance
			] );

			//Repost
			if($repost_frequency != 0){
				$next_time = $repost_frequency*86400;

				$result_data = $this->model->get("result", $this->tb_posts, "id = '{$id}'")->result;
				$this->model->update( $this->tb_posts, [
					"ids" => ids(),
					"team_id" => $team_id,
					"account_id" => $account_id,
					"social_network" => $social_network,
					"category" => $category,
					"type" => $type,
					"data" => $data,
					"time_post" => $time_post,
					"time_delete" => $time_delete,
					"delay" => $delay,
					"repost_frequency" => 0,
					"repost_until" => NULL,
					"result" => $result_data,
					"status" => $result['status']=="success"?3:4,
					"changed" => now(),
					"created" => $created,
				], [ "id" => $id ]);

				if($time_post < $repost_until){
					$time_post += $next_time;

					$this->model->insert( $this->tb_posts, [
						"ids" => $ids,
						"team_id" => $team_id,
						"account_id" => $account_id,
						"social_network" => $social_network,
						"category" => $category,
						"type" => $type,
						"data" => $data,
						"time_post" => $time_post,
						"time_delete" => $time_delete,
						"delay" => $delay,
						"repost_frequency" => $repost_frequency,
						"repost_until" => $repost_frequency? $repost_until :NULL,
						"status" => 1,
						"changed" => $changed,
						"created" => $created
					]);
				}
			}

			_e( strtoupper( __( ucfirst($result['status']) ) ).": ".__( $result['message']) . "<br/>" , false);
		}

	}

}