<?php
use JBZoo\Image\Image;
use JBZoo\Image\Filter;
use JBZoo\Image\Exception;
if(!class_exists("watermark_lib")){
class watermark_lib {
	
	public function __construct(){
		if(!function_exists("imagecreatetruecolor")){
			if(!function_exists("imagecreate")){
				throw new Exception("You do not have the GD library loaded in PHP");
			}
		}
	}

	private function getFunction($name, $action = 'open') {
		if(preg_match("/^(.*)\.(jpeg|jpg)$/", $name)){
			if($action == "open")
				return "imagecreatefromjpeg";
			else
				return "imagejpeg";
		}elseif(preg_match("/^(.*)\.(png)$/", $name)){
			if($action == "open")
				return "imagecreatefrompng";
			else
				return "imagepng";
		}elseif(preg_match("/^(.*)\.(gif)$/", $name)){
			if($action == "open")
				return "imagecreatefromgif";
			else
				return "imagegif";
		}else{
			throw new Exception('Image an not be found, try another image.');
		}
	}

	public function getImgSizes($img){
		return array('width' => imagesx($img), 'height' => imagesy($img));
	}

	public function apply($imgSource, $imgTarget,  $imgWatermark, $position = "lb", $size= 30, $opacity = 0.7){
		try {
			if(file_exists($imgWatermark)){
				$functionSource = $this->getFunction($imgSource, 'open');
				$this->imgSource = $functionSource($imgSource);

				$functionWatermark = $this->getFunction($imgWatermark, 'open');
				$this->imgWatermark = $functionWatermark($imgWatermark);

				$sizesSource = $this->getImgSizes($this->imgSource);
				$sizesWatermark = $this->getImgSizes($this->imgWatermark);

				$width = $size/100*$sizesSource['width'];
				$height = ($width/$sizesWatermark['width'])*$sizesWatermark['height'];

				$imgWatermark_tmp = APPPATH."../assets/tmp/".md5(time()).".png";
				$resize = new ResizeImage($imgWatermark);
				$resize->resizeTo($width, $height, 'exact');
				$resize->saveImage($imgWatermark_tmp);

				switch ($position) {
					case 'lt':
						$pos = "top left";
						break;

					case 'ct':
						$pos = "top";
						break;

					case 'rt':
						$pos = "top right";
						break;

					case 'lc':
						$pos = "left";
						break;

					case 'cc':
						$pos = "center";
						break;

					case 'rc':
						$pos = "right";
						break;

					case 'rb':
						$pos = "bottom right";
						break;

					case 'cb':
						$pos = "bottom";
						break;
					
					default:
						$pos = "bottom left";
						break;
				}

		    	$img = new Image($imgSource);
		        $img->overlay($imgWatermark_tmp, $pos, $opacity, 0, 0);
		        $img->setQuality(100);
		        $img->saveAs($imgTarget, 100);

		        if(file_exists($imgWatermark_tmp)){
		        	unlink($imgWatermark_tmp);
		        }
		    }
		} catch(Exception $e) {
		    
		}
	}
}

class ResizeImage
{
	private $ext;
	private $image;
	private $newImage;
	private $origWidth;
	private $origHeight;
	private $resizeWidth;
	private $resizeHeight;

	public function __construct( $filename )
	{
		if(file_exists($filename))
		{
			$this->setImage( $filename );
		} else {
			throw new Exception('Image ' . $filename . ' can not be found, try another image.');
		}
	}

	private function setImage( $filename )
	{
		$size = getimagesize($filename);
		$this->ext = $size['mime'];

		switch($this->ext)
	    {
	        case 'image/jpg':
	        case 'image/jpeg':
	            $this->image = imagecreatefromjpeg($filename);
	            break;

	        case 'image/gif':
	            $this->image = @imagecreatefromgif($filename);
	            break;

	        case 'image/png':
	            $this->image = @imagecreatefrompng($filename);
	            break;

	        default:
	            throw new Exception("File is not an image, please use another file type.", 1);
	    }

	    $this->origWidth = imagesx($this->image);
	    $this->origHeight = imagesy($this->image);
	}

	public function saveImage($savePath, $imageQuality="100", $download = false)
	{
	    switch($this->ext)
	    {
	        case 'image/jpg':
	        case 'image/jpeg':
	            if (imagetypes() & IMG_JPG) {
	                imagejpeg($this->newImage, $savePath, $imageQuality);
	            }
	            break;

	        case 'image/gif':
	            if (imagetypes() & IMG_GIF) {
	                imagegif($this->newImage, $savePath);
	            }
	            break;

	        case 'image/png':
	            $invertScaleQuality = 9 - round(($imageQuality/100) * 9);
	            if (imagetypes() & IMG_PNG) {
	                imagepng($this->newImage, $savePath, $invertScaleQuality);
	            }
	            break;
	    }

	    if($download)
	    {
	    	header('Content-Description: File Transfer');
			header("Content-type: application/octet-stream");
			header("Content-disposition: attachment; filename= ".$savePath."");
			readfile($savePath);
	    }

	    imagedestroy($this->newImage);
	}

	public function resizeTo( $width, $height, $resizeOption = 'default' )
	{
		switch(strtolower($resizeOption))
		{
			case 'exact':
				$this->resizeWidth = $width;
				$this->resizeHeight = $height;
			break;

			case 'maxwidth':
				$this->resizeWidth  = $width;
				$this->resizeHeight = $this->resizeHeightByWidth($width);
			break;

			case 'maxheight':
				$this->resizeWidth  = $this->resizeWidthByHeight($height);
				$this->resizeHeight = $height;
			break;

			default:
				if($this->origWidth > $width || $this->origHeight > $height)
				{
					if ( $this->origWidth > $this->origHeight ) {
				    	 $this->resizeHeight = $this->resizeHeightByWidth($width);
			  			 $this->resizeWidth  = $width;
					} else if( $this->origWidth < $this->origHeight ) {
						$this->resizeWidth  = $this->resizeWidthByHeight($height);
						$this->resizeHeight = $height;
					}
				} else {
		            $this->resizeWidth = $width;
		            $this->resizeHeight = $height;
		        }
			break;
		}

		$this->newImage = imagecreatetruecolor($this->resizeWidth, $this->resizeHeight);

 		imagealphablending($this->newImage, false);
	 	imagesavealpha($this->newImage,true);
		$transparent = imagecolorallocatealpha($this->newImage, 255, 255, 255, 127);
		imagefilledrectangle($this->newImage, 0, 0, $this->resizeWidth, $this->resizeHeight, $transparent);

    	imagecopyresampled($this->newImage, $this->image, 0, 0, 0, 0, $this->resizeWidth, $this->resizeHeight, $this->origWidth, $this->origHeight);
	}

	private function resizeHeightByWidth($width)
	{
		return floor(($this->origHeight/$this->origWidth)*$width);
	}

	private function resizeWidthByHeight($height)
	{
		return floor(($this->origWidth/$this->origHeight)*$height);
	}
}
}