<?php
class watermark extends MY_Controller {
	
	public $tb_account_manager = "sp_account_manager";

	public function __construct(){
		parent::__construct();
		_permission(get_class($this)."_enable");
		$this->load->model(get_class($this).'_model', 'model');

		//
		$this->module_name = get_module_config( $this, 'name' );
		$this->module_icon = get_module_config( $this, 'icon' );
		//
	}

	public function index($ids = "")
	{
		$result = [
			"ids" => "",
			"watermark_size" => _gt("watermark_size", 30),
			"watermark_opacity" => _gt("watermark_opacity", 70),
			"watermark_position" => _gt("watermark_position", "lb"),
			"watermark_mask" => _gt("watermark_mask", "")
		];

		if($ids != ""){

			$account = $this->model->get("*", $this->tb_account_manager, "ids = '{$ids}'");

			if(empty($account)) redirect( get_module_url() );

			$watermark_size = _gm("watermark_size", "", $account->id)?_gm("watermark_size", "", $account->id):_gt("watermark_size", 30);
			$watermark_opacity = _gm("watermark_opacity", "", $account->id)?_gm("watermark_opacity", "", $account->id):_gt("watermark_opacity", 70);
			$watermark_position = _gm("watermark_position", "", $account->id)?_gm("watermark_position", "", $account->id):_gt("watermark_position", "lb");
			$watermark_mask = _gm("watermark_mask", "", $account->id)?_gm("watermark_mask", "", $account->id):_gt("watermark_mask", "");

			$result = [
				"ids" => $account->ids,
				"watermark_size" => $watermark_size,
				"watermark_opacity" => $watermark_opacity,
				"watermark_position" => $watermark_position,
				"watermark_mask" => $watermark_mask
			];
	
		}

		//
		$team_id = _t("id");
		$data = [ "result" => (object)$result ];
		$page = page($this, "pages", "general", "general", $data);
		//

		$accounts = $this->model->fetch('*', $this->tb_account_manager, " team_id = '{$team_id}' ", "social_network, category", "ASC");

		if( !is_ajax() ){

			$views = [
				"subheader" => view( 'main/subheader', [ 'module_name' => $this->module_name, 'module_icon' => $this->module_icon ], true ),
				"column_one" => view("main/sidebar", [ "accounts" => $accounts ], true ),
				"column_two" => view("main/content", [ 'view' => $page ] ,true), 
			];
			
			views( [
				"title" => $this->module_name,
				"fragment" => "fragment_two",
				"views" => $views
			] );

		}else{
			_e( $page, false );
		}
	}

	public function upload($id = ""){
		$ids = post("ids");
		$size = post("size");
		$opacity = post("opacity");
		$position = post("position");
		$max_size = 5*1024;
		$mask = "";

		create_upload_folder();
		$types = 'jpg|jpeg|png';

		$config['upload_path']          = get_upload_path();
        $config['allowed_types']        = $types;
        $config['max_size']             = $max_size;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']         	= TRUE;
        $config['encrypt_name']         = TRUE;
        $config['file_ext_tolower']     = TRUE;

        $this->load->library('upload', $config);
        if(!empty($_FILES) && is_array($_FILES['files']['name'])){
	        $files = $_FILES;
	        $count = $_FILES['files']['name'];
		    for($i = 0; $i < count($count); $i++){  
		        $_FILES['files']['name']= $files['files']['name'][$i];
		        $_FILES['files']['type']= $files['files']['type'][$i];
		        $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
		        $_FILES['files']['error']= $files['files']['error'][$i];
		        $_FILES['files']['size']= $files['files']['size'][$i];
		        
		        $this->upload->initialize($config);

		        if (!$this->upload->do_upload("files"))
		        {
	                ms([
	                	"status"  => "error",
	                	"message" => $this->upload->display_errors()
	                ]);
		        }
		        else
		        {
		        	$info = (object)$this->upload->data();
		        	$mask = get_upload_path($info->file_name);
		        }
		    }
        }

		if(!$ids || $ids == ""){
			_ut("watermark_size", $size);
			_ut("watermark_opacity", $opacity);
			_ut("watermark_position", $position);
			if($mask != ""){
				@unlink( _gt("watermark_mask", "") );
				_ut("watermark_mask", $mask);
			}

		}else{

			$account = $this->model->get("*", $this->tb_account_manager, "ids = '{$ids}'");

			if(!$account){
				ms([
                	"status"  => "error",
                	"message" => __("Cannot find the profile")
                ]);
			}

			_um("watermark_size", $size, $account->id);
			_um("watermark_opacity", $opacity, $account->id);
			_um("watermark_position", $position, $account->id);
			
			if($mask != ""){
				if( _gm("watermark_mask", "", $account->id) ){
					@unlink( _gm("watermark_mask", "", $account->id) );
				}

				_um("watermark_mask", $mask, $account->id);
			}

		}

		ms([
			"status" => "success",
			"message" => __("Success")
		]);
	}

	public function delete(){
		$ids = post("id");
		if(!$ids || $ids == ""){
			_ut("watermark_size", 30);
			_ut("watermark_opacity", 70);
			_ut("watermark_position", "lb");
			@unlink( _gt("watermark_mask", "") );
			_ut("watermark_mask", "");
		}else{
			$account = $this->model->get("*", $this->tb_account_manager, "ids = '{$ids}'");

			if(!$account){
				ms([
                	"status"  => "error",
                	"message" => __("Cannot find the profile")
                ]);
			}

			_um("watermark_size", "", $account->id);
			_um("watermark_opacity", "", $account->id);
			_um("watermark_position", "", $account->id);

			if( _gm("watermark_mask", "", $account->id) ){
				@unlink( _gm("watermark_mask", "", $account->id) );
			}

			_um("watermark_mask", "", $account->id);
		}

		ms([
			"status" => "success",
			"message" => __("Success")
		]);
	}
}