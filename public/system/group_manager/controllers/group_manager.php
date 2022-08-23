<?php
class group_manager extends MY_Controller {
	
	public $tb_group_manager = "sp_group_manager";
	public $tb_account_manager = "sp_account_manager";
	public $module_name;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		//
		$this->module_name = get_module_config( $this, 'name' );
		$this->module_icon = get_module_config( $this, 'icon' );
		//
	}

	public function index($page = "", $ids = "")
	{
		_permission(get_class($this)."_enable");
		$team_id = _t('id');
		$result = $this->model->fetch("*", $this->tb_group_manager, "team_id = '{$team_id}'");
		$page_type = is_ajax()?false:true;

		//
		$data = [];
		switch ($page) {
			case 'update':
				$accounts = $this->model->fetch("*", $this->tb_account_manager, "team_id = '{$team_id}'");
				$group = $this->model->get("*", $this->tb_group_manager, "ids = '{$ids}' AND team_id = '{$team_id}'");
				$data['group'] = $group;
				$data['accounts'] = $accounts;
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
		_permission(get_class($this)."_enable");
		$ids = post('ids');
		$name = post('name');
		$groups = post('group');
		$team_id = _t('id');

		$item = $this->model->get("*", $this->tb_group_manager, "ids = '{$ids}' AND team_id = '{$team_id}'");
		if(!$item){
			validate('null', __('Name'), $name);
			validate('empty', __('Please select less than a profile'), $groups);

			$this->model->insert($this->tb_group_manager , [
				"ids" => ids(),
				"team_id" => $team_id,
				"name" => $name,
				"data" => json_encode($groups),
				"created" => now()
			]);
		}else{
			validate('null', __('Name'), $name);
			validate('empty', __('Please select less than a profile'), $groups);

			$this->model->update(
				$this->tb_group_manager, 
				[
					"name" => $name,
					"data" => json_encode($groups),
					"created" => now()
				], 
				array("ids" => $ids)
			);
		}

		ms([
			"status" => "success",
			"message" => __('Success')
		]);

	}

	public function block_group(){
		$data = [];
		$team_id = _t('id');
		$dir = get_directory_block( __DIR__, get_class($this));
		if(_p(get_class($this)."_enable")){
			$groups = $this->model->fetch("*", $this->tb_group_manager, "team_id = '{$team_id}'");
		}else{
			$groups = false;
		}

		view($dir."pages/block_group", [ "groups" => $groups ], false, $this);
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
				$this->model->delete($this->tb_group_manager, ['ids' => $id]);
			}
		}
		elseif( is_string($ids) )
		{
			$this->model->delete($this->tb_group_manager, ['ids' => $ids]);
		}

		ms([
			"status" => "success",
			"message" => __('Success')
		]);
	}
}