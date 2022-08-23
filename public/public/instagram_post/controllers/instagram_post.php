<?php
class instagram_post extends MY_Controller {
	
	public $tb_account_manager = "sp_account_manager";

	public function __construct(){
		parent::__construct();
		_permission(get_class($this)."_enable");
		$this->load->model(get_class($this).'_model', 'model');

		//
		$this->module_name = get_module_config( $this, 'name' );
		$this->module_icon = get_module_config( $this, 'icon' );
		$this->module_color = get_module_config( $this, 'color' );
		//
	}

	public function index($page = "", $ids = "")
	{



		$post_types = [
			[
				"id" => "media",
				"name" => __("Media"),
				"icon" => "fas fa-photo-video"
			],
			[
				"id" => "story",
				"name" => __("Story"),
				"icon" => "far fa-image"
			],
			[
				"id" => "igtv",
				"name" => __("IGTV"),
				"icon" => "fas fa-tv"
			],
			[
				"id" => "carousel",
				"name" => __("Carousel"),
				"icon" => "fas fa-layer-group"
			]
		];

		$block_post_type = Modules::run("post/block_post_type", $post_types);
		$block_file_media = Modules::run("file_manager/block_file", "single", "all", "upload_media");
		$block_file_story = Modules::run("file_manager/block_file", "single", "all", "upload_story");
		$block_file_igtv = Modules::run("file_manager/block_file", "single", "video", "upload_igtv");
		$block_file_carousel = Modules::run("file_manager/block_file", "multi", "all", "upload_carousel");
		$block_group = Modules::run("group_manager/block_group");
		$block_preview = Modules::run("post/block_preview", [get_class($this)]);
		$block_accounts = Modules::run("post/block_accounts", "instagram");
		$block_link = Modules::run("post/block_link");
		$block_caption = Modules::run("post/block_caption");
		$block_schedule = Modules::run("post/block_schedule");
		Modules::run(get_class($this)."/block");

		$views = [
			"subheader" => view( 'main/subheader', [ 'module_name' => $this->module_name, 'module_icon' => $this->module_icon, 'module_color' => $this->module_color ], true ),
			"column_one" => $block_accounts,
			"column_two" => view("pages/general", [ 'file_manager_media' => $block_file_media, 'file_manager_story' => $block_file_story, 'file_manager_igtv' => $block_file_igtv, 'file_manager_carousel' => $block_file_carousel, 'block_post_type' => $block_post_type, 'block_link' => $block_link, 'block_caption' => $block_caption, 'block_schedule' => $block_schedule ] ,true), 
			"column_three" => $block_preview, 
		];
		
		views( [
			"title" => $this->module_name,
			"fragment" => "fragment_three",
			"views" => $views
		] );
	}

	public function block(){}

	public function location(){
		$keyword = post("keyword");
		//$locations = $this->model->location_official($keyword);
		$locations = $this->model->location($keyword);
		view( "pages/location", ["locations" => $locations], false );
	}

}