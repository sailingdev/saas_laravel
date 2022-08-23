<?php
if(!function_exists("schedule_report")){
	function schedule_report($social_network, $category, $status){
		$CI = &get_instance();
		$team_id = _t("id");
		$value_string = "";
		$date_string = "";

		$date_list = array();
		$date = strtotime(date('Y-m-d', strtotime(NOW)));
		for ($i=29; $i >= 0; $i--) { 
			$left_date = $date - 86400 * $i;
			$date_list[date('Y-m-d', $left_date)] = 0;
		}

		if($category == "all"){
			$query = $CI->db->query("SELECT COUNT(status) as count, DATE(FROM_UNIXTIME(time_post)) as time_post FROM sp_posts WHERE status = '{$status}' AND team_id = '".$team_id."' AND FROM_UNIXTIME(time_post) > NOW() - INTERVAL 30 DAY GROUP BY DATE(FROM_UNIXTIME(time_post));");
		}else{
			$query = $CI->db->query("SELECT COUNT(status) as count, DATE(FROM_UNIXTIME(time_post)) as time_post FROM sp_posts WHERE social_network = '".$social_network."' AND category = '{$category}' AND status = '{$status}' AND team_id = '".$team_id."' AND FROM_UNIXTIME(time_post) > NOW() - INTERVAL 30 DAY GROUP BY DATE(FROM_UNIXTIME(time_post));");
		}
		
		if($query->result()){
			
			foreach ($query->result() as $key => $value) {
				if(isset($date_list[$value->time_post])){
					$date_list[$value->time_post] = $value->count;
				}
			}
		}

		foreach ($date_list as $date => $value) {
			$value_string .= "{$value},";
			$date_string .= "'{$date}',";
		}

		$value_string = "[".substr($value_string, 0, -1)."]";
		$date_string  = "[".substr($date_string, 0, -1)."]";

		return (object)array(
			"value" => $value_string,
			"date" => $date_string
		);
	}
}