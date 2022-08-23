<?php
class schedules extends MY_Controller {
	
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

	public function index($type = "", $category = "", $time = "")
	{	
		if(!in_array($type, ["queue", "published", "unpublished"]) || $category == "") redirect( get_module_url("index/queue/all") );

		$categories = $this->model->category();
		$result = $this->model->list($type, $category, $time);

		if(!is_ajax()){
			$views = [
				"subheader" => view( 'main/subheader', [ 'module_name' => $this->module_name, 'module_icon' => $this->module_icon ], true ),
				"column_one" => view( 'main/sidebar', [ "categories" => $categories ], true ),
				"column_two" => view("pages/general", [] ,true), 
				"column_three" => view("pages/list", [ "result" => $result ] ,true), 
			];
			
			views( [
				"title" => $this->module_name,
				"fragment" => "fragment_three",
				"views" => $views
			] );
		}else{
			view("pages/list", [ "result" => $result ] , false);
		}
	}

	public function get($type = "", $category = "")
	{
		$posts = $this->model->calendar($type, $category);

		if($posts)
		{
			$data = [];
			foreach ($posts as $key => $post)
			{
				$social_network = ucfirst( __( str_replace("_", " ", $post->social_network) ) )." ".__( $post->category );

				$module_path = find_modules( $post->category );

				if($module_path)
				{
					$module_name = get_module_config( $module_path, 'name' );
					$module_icon = get_module_config( $module_path, 'icon' );
					$module_color = get_module_config( $module_path, 'color' );

					$data[] = [
						"id" => 1,
						"name" => "<i class='{$module_icon}'></i> {$module_name} ({$post->total})",
						"startdate" => $post->time_posts,
						"enddate" => $post->repost_untils,
						"color" => "{$module_color}",
					];

				}

			}

			$data = [
				"monthly" => $data
			];

			echo json_encode($data);

		}
		else
		{
			echo json_encode([ 'monthly' => [] ]);
		}

	}

	public function delete($type ="single"){
		$team_id = _t("id");
		switch ($type) {
			case 'multi':
				
				$type = post("type");
				$category = post("category");

				switch ($type) {
					case 'queue':
						$status = 1;
						break;

					case 'published':
						$status = 3;
						break;

					case 'unpublished':
						$status = 4;
						break;
					
					default:
						ms([
							"status" => "error",
							"message" => __("Delete failed")
						]);
						break;
				}

				$data = [ "team_id" => $team_id, "status" => $status ];
				if($category != "all"){
					$data["category"] = $category;
				}
				$this->model->delete( $this->tb_posts, $data );

				ms([
					"status" => "success",
					"message" => __("Success")
				]);
				break;
			
			default:
				$ids = post("id");
				$this->model->delete( $this->tb_posts,  [ "ids" => $ids, "team_id" => $team_id ]);
				ms([
					"status" => "success",
					"message" => __("Success")
				]);
				break;
		}

	}

}