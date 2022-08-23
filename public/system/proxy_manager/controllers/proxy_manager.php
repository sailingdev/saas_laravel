<?php
class proxy_manager extends MY_Controller {
	
	public $tb_proxy_manager = "sp_proxy_manager";
	public $module_name;

	public function __construct(){
		parent::__construct();
		_permission(get_class($this)."_enable");
		$this->load->model(get_class($this).'_model', 'model');

		//
		$this->module_name = get_module_config( $this, 'name' );
		$this->module_icon = get_module_config( $this, 'icon' );
		//
	}

	public function index($page = "", $ids = "")
	{	
		$result = $this->model->fetch("*", $this->tb_proxy_manager);
		$page_type = is_ajax()?false:true;

		//
		$data = [];
		switch ($page) {
			case 'update':
				$item = $this->model->get("*", $this->tb_proxy_manager, "ids = '{$ids}'");
				$data['result'] = $item;
				break;
		}

		$page = page($this, "pages", "general", $page, $data, $page_type);
		//

		if( !is_ajax() ){

			$views = [
				"subheader" => view( 'main/subheader', [ 'result' => $result, 'module_name' => $this->module_name, 'module_icon' => $this->module_icon ], true ),
				"column_one" => view("main/sidebar", [ 'result' => $result, 'module_name' => $this->module_name, 'module_icon' => $this->module_icon ], true ),
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

	public function save($ids = "")
	{
		$status = post('status');
		$proxy = post('proxy');
		$location = post('location');

		$item = $this->model->get("*", $this->tb_proxy_manager, "ids = '{$ids}'");
		if(!$item){
			$item = $this->model->get("*", $this->tb_proxy_manager, "address = '{$proxy}'");
			validate('null', __('Proxy'), $proxy);
			validate('null', __('Location'), $location);
			validate('not_empty', __('This proxy already exists'), $item);

			$this->model->insert($this->tb_proxy_manager , [
				"ids" => ids(),
				"address" => $proxy,
				"location" => $location,
				"status" => $status,
				"changed" => now(),
				"created" => now()
			]);
		}else{
			$item = $this->model->get("*", $this->tb_proxy_manager, "ids != '{$ids}' AND address = '{$proxy}'");
			validate('null', __('Proxy'), $proxy);
			validate('null', __('Location'), $location);
			validate('not_empty', __('This proxy already exists'), $item);

			$this->model->update(
				$this->tb_proxy_manager, 
				[
					"address" => $proxy,
					"location" => $location,
					"status" => $status,
					"changed" => now()
				], 
				array("ids" => $ids)
			);
		}

		ms([
			"status" => "success",
			"message" => __('Success')
		]);

	}

	public function proxy_info(){

		$ip = "";
		$proxy = post("proxy");
		$proxy_parse = explode("@", $proxy);

        if(count($proxy_parse) > 1){
            $ipport = explode(":", $proxy_parse[1]);
            if(count($ipport) == 2){
                $ip = $ipport[0];
            }
        }else{
            $ipport = explode(":", $proxy_parse[0]);
            if(count($ipport) == 2){
                $ip = $ipport[0];
            }
        }

        if($ip == ""){
        	ms([
        		"status" => "error",
        		"message" => __("Invalid or bad proxy")
        	]);
        }

		$result = get_curl("http://ip-api.com/json/".$ip);
		$result = json_decode($result);

		if($result->status == 'success'){
			ms([
				'status' => 'success',
				'code' => $result->countryCode
			]);
		}

		ms([
			'status' => 'error'
		]);
	}

	public function export(){
		export_csv($this->tb_proxy_manager);
	}

	public function delete(){
		$ids = post('id');

		if( empty($ids) ){
			ms([
				"status" => "error",
				"message" => __('Please select an item to delete')
			]);
		}

		if( is_array($ids) ){
			foreach ($ids as $id) {
				$this->model->delete($this->tb_proxy_manager, ['ids' => $id]);
			}
		}
		elseif( is_string($ids) )
		{
			$this->model->delete($this->tb_proxy_manager, ['ids' => $ids]);
		}

		ms([
			"status" => "success",
			"message" => __('Success')
		]);
	}
}