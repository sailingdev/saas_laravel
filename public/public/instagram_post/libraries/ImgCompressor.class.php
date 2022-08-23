<?php
use Grafika\Grafika;
if(!class_exists("ImgCompressor")){
	class ImgCompressor {	
		
		function __construct($setting) {
			$this->setting = $setting;
		}
		
		public function run($image, $c_type, $level = 0) {

			$im_info = getImageSize($image);
			$name = basename($image);
			$type = $im_info['mime'];

			$im_name = time().$name;
			$im_output = $this->setting['directory'].'/'.$im_name;
			
			$editor = Grafika::createEditor();
			$editor->open( $image, $image );

			$width = $im_info[0];
			$height = $im_info[1];
			$max = 800;
			if($width > $max || $height > $max){

			    if ($width > $height) {
			        $newwidth = $max;
			        $divisor = $width / $max;
			        $newheight = floor( $height / $divisor);
			    } else {
			        $newheight = $max;
			        $divisor = $height / $max;
			        $newwidth = floor( $width / $divisor );
			    }

			    $editor->resizeExact( $image, $newwidth, $newheight );
			}

			$editor->save( $image, $im_output, null, 100 );

			return $im_output;
		}
		
	}
}