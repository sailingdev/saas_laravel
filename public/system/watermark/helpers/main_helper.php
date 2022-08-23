<?php
if (!function_exists('watermark')) {
	function watermark($path_image, $team_id = false, $account_id = false){
		if( _pc("watermark_enable", $team_id) ){
			$save_image =  TMP_PATH.uniqid().".jpg";
			$module_path = get_module_directory(__DIR__);
			include $module_path.'/../libraries/vendor/autoload.php';
			include $module_path.'/../libraries/watermark.lib.php';

			if(!$team_id){
				$team_id = _t("id");
			}

			$watermark_mask = _gm("watermark_mask", "", $account_id);
			$watermark_size = _gm("watermark_size", 30, $account_id);
			$watermark_opacity = _gm("watermark_opacity", 70, $account_id);
			$watermark_position = _gm("watermark_position", "lb", $account_id);

			if(!$watermark_mask || !$watermark_size || !$watermark_opacity || !$watermark_position){
				$watermark_mask = _gt("watermark_mask", "", $team_id);
			    $watermark_size = _gt("watermark_size", 30, $team_id);
			    $watermark_opacity = _gt("watermark_opacity", 70, $team_id);
			    $watermark_position = _gt("watermark_position", "lb", $team_id);
			}

			if(file_exists($watermark_mask)){
			    $watermark = new Watermark_lib();

			    $path_image = get_file_path($path_image);
			    $save_image = get_file_path($save_image);

			    if($save_image == ""){
					$save_image = $path_image;
				}

			    $watermark->apply($path_image, $save_image, $watermark_mask, $watermark_position, $watermark_size, $watermark_opacity/100);

			    return BASE.$save_image;
			}else{
				return $path_image;
			}
		}

		return $path_image;
	}
}

if(!function_exists("unlink_watermark")){
	function unlink_watermark($image_paths){
		if(!empty($image_paths)){
			foreach ($image_paths as $image_path) {
				if( stripos($image_path, TMP_PATH) !== FALSE ){
					$image_path = str_replace(BASE, "", $image_path);
					@unlink($image_path);
				}
			}
		}
	};
}