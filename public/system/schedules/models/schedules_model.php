<?php
class schedules_model extends MY_Model {
	public $tb_account_manager = "sp_account_manager";
	public $tb_posts = "sp_posts";

	public function __construct(){
		parent::__construct();
		$module_path = get_module_directory(__DIR__);

		//
		$this->module_name = get_module_config( $module_path, 'name' );
		$this->module_icon = get_module_config( $module_path, 'icon' );
		$this->module_color = get_module_config( $module_path, 'color' );
		//
	}

	public function block_permissions($path = ""){
		$dir = get_directory_block(__DIR__, get_class($this));
		return [
			'position' => 1000,
			'name' => $this->module_name,
			'color' => $this->module_color,
			'icon' => $this->module_icon, 
			'id' => str_replace("_model", "", get_class($this)),
			'html' => view( $dir.'pages/block_permissions', ['path' => $path], true, $this ),
		];
	}

	public function category()
	{
		$this->db->select("category");
		$this->db->from($this->tb_posts);
		$this->db->group_by("category");
		$this->db->order_by("category", "ASC");
		$query = $this->db->get();

		if($query->result())
		{
			$result = $query->result();
			foreach ($result as $key => $row) {

				$module_path = find_modules( $row->category );

				if( !_p($row->category."_enable") ){
					unset( $result[$key] );
					continue;
				}

				if($module_path)
				{
					$result[$key]->module_name = get_module_config( $module_path, 'name' );
					$result[$key]->module_icon = get_module_config( $module_path, 'icon' );
					$result[$key]->module_color = get_module_config( $module_path, 'color' );

				}else{
					$result[$key]->module_name = "";
					$result[$key]->module_icon = "";
					$result[$key]->module_color = "";
				}

			}
			return $result;
		}

		return false;
	}

	public function calendar($type, $category)
	{
		switch ($type) {
			case 'published':
				$status = 3;
				break;

			case 'unpublished':
				$status = 4;
				break;
			
			default:
				$status = 1;
				break;
		}

		$team_id = _t("id");
		$timezone = _u('timezone');
		$timezone_number =  tz_list_number($timezone);
		$this->db->query(" SET time_zone = '{$timezone_number}' ");

		$this->db->select("from_unixtime(time_post,'%Y-%m-%d') as time_posts, from_unixtime(repost_until,'%Y-%m-%d') as repost_untils, social_network, COUNT(time_post) as total, category");
		$this->db->from($this->tb_posts);
		$this->db->where("status = '{$status}' AND team_id = '{$team_id}'");

		if(strip_tags($category) != "all"){
			$this->db->where("category = '".$category."'");
		}

		$this->db->group_by("time_posts,repost_untils,social_network,category");
		$this->db->order_by("repost_untils", "DESC");
		$query = $this->db->get();

		if($query->result())
		{	
			$result = $query->result();
			foreach ($result as $key => $row) {

				if( !_p($row->category."_enable") ){
					unset( $result[$key] );
					continue;
				}
			}
			return $result;
		}

		return false;
	}

	public function list($type, $category, $time)
	{	
		$time_check = explode("-", $time);
		
		if( count($time_check) != 3 || !checkdate( (int)$time_check[1], (int)$time_check[2], (int)$time_check[0]) ) return false;

		switch ($type) {
			case 'published':
				$status = 3;
				break;

			case 'unpublished':
				$status = 4;
				break;
			
			default:
				$status = 1;
				break;
		}

		$team_id = _t("id");
		$timezone = _u('timezone');
		$timezone_number =  tz_list_number($timezone);

		$date_start = $time . " 00:00:00";
		$date_end = $time . " 23:59:59";
		$this->db->query(" SET time_zone = '{$timezone_number}' ");

		$this->db->select("
			from_unixtime(a.time_post,'%Y-%m-%d %H:%i:%s') as time_posts, 
			from_unixtime(a.repost_until,'%Y-%m-%d %H:%i:%s') as repost_untils, 
			a.time_post, 
			a.repost_until, 
			a.team_id, 
			a.social_network, 
			a.category,
			a.type,
			a.id,
			a.ids,
			a.data,
			a.status,
			a.result,
			b.name,
			b.username,
			b.url
		");
		$this->db->from($this->tb_posts." as a");
		$this->db->join($this->tb_account_manager." as b", "a.account_id = b.id");

		$cate = "";
		if(strip_tags($category) != "all"){
			$cate = " a.category = '{$category}' AND ";
		}

		$this->db->having(" ( {$cate} a.status = '{$status}' AND from_unixtime(a.time_post,'%Y-%m-%d %H:%i:%s') >= '{$date_start}' AND from_unixtime(a.time_post,'%Y-%m-%d %H:%i:%s') <= '{$date_end}' AND a.repost_until IS NULL AND a.team_id = '{$team_id}' ) ");
		$this->db->or_having(" ( {$cate} a.status = '{$status}' AND from_unixtime(a.time_post,'%Y-%m-%d 00:00:00') <= '{$date_end}' AND from_unixtime(a.repost_until,'%Y-%m-%d 23:59:59') >= '{$date_start}' AND a.team_id = '{$team_id}' ) ");
		
		$this->db->order_by("a.time_post ASC");
		$query = $this->db->get();

		if( $query->result() ){
			$result = $query->result();
			foreach ($result as $key => $row) {

				$module_path = find_modules( $row->category );

				if( !_p($row->category."_enable") ){
					unset( $result[$key] );
					continue;
				}

				if($module_path)
				{
					$result[$key]->module_name = get_module_config( $module_path, 'name' );
					$result[$key]->module_icon = get_module_config( $module_path, 'icon' );
					$result[$key]->module_color = get_module_config( $module_path, 'color' );

				}else{

					$result[$key]->module_name = "";
					$result[$key]->module_icon = "";
					$result[$key]->module_color = "";
				}

			}
			return $result;
		}

		return false;
	}
}