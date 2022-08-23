<div class="watermark-content row">
    <div class="watermark-option col-md-8">
    	<div class="row">
            <div class="col-md-5 col-sm-5 m-b-25">
            	<input type="text" name="ids" class="d-none watermark-ids" value="<?php _e($result->ids) ?>">
                <div class="watermark-image">
                    <img class="watermark-bg" src="<?php _e( get_module_path($this, "assets/img/bg-watermark.jpg") )?>" >
                    <?php if( $result->watermark_mask != ""){?>
                    	<img class="watermark-mask" src="<?php _e( get_url($result->watermark_mask) )?>">
                    <?php }else{?>
                    	<img class="watermark-mask" src="<?php _e( get_module_path($this, "assets/img/watermark.png") )?>">
                    <?php }?>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 m-b-25">
                <div class="form-group">
                    <span><?php _e("Position")?></span>
                    <div class="watermark-positions">
                        <div class="watermark-position-item pos-lt <?php _e( $result->watermark_position=="lt"?"active":"" )?>" data-direction="lt"></div>
                        <div class="watermark-position-item pos-ct <?php _e( $result->watermark_position=="ct"?"active":"" )?>" data-direction="ct"></div>
                        <div class="watermark-position-item pos-rt <?php _e( $result->watermark_position=="rt"?"active":"" )?>" data-direction="rt"></div>
                        <div class="watermark-position-item pos-lc <?php _e( $result->watermark_position=="lc"?"active":"" )?>" data-direction="lc"></div>
                        <div class="watermark-position-item pos-cc <?php _e( $result->watermark_position=="cc"?"active":"" )?>" data-direction="cc"></div>
                        <div class="watermark-position-item pos-rc <?php _e( $result->watermark_position=="rc"?"active":"" )?>" data-direction="rc"></div>
                        <div class="watermark-position-item pos-lb <?php _e( $result->watermark_position=="lb"?"active":"" )?>" data-direction="lb"></div>
                        <div class="watermark-position-item pos-cb <?php _e( $result->watermark_position=="cb"?"active":"" )?>" data-direction="cb"></div>
                        <div class="watermark-position-item pos-rb <?php _e( $result->watermark_position=="rb"?"active":"" )?>" data-direction="rb"></div>
                        <input type="hidden" class="watermark-position form-control" name="position" value="<?php _e( $result->watermark_position)?>">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <span><?php _e("Size")?></span>
                    <input type="range" name="size" class="rangeslider d-none watermark-size" min="0" max="100" step="1" value="<?php _e($result->watermark_size) ?>" data-rangeslider data-orientation="vertical" >
                </div>
                <div class="form-group m-b-25">
                    <span><?php _e("Transparent")?></span>
                    <input type="range" name="opacity" class="rangeslider d-none watermark-transparent" min="0" max="100" step="1" value="<?php _e($result->watermark_opacity)?>" data-orientation="vertical" >
                </div> 

                <div class="wrap-m">
		        	<div class=" wrap-c">
		        		<div class="btn-group" role="group">
						    <button type="button" class="btn btn-label-info fileinput-button" >
			        			<i class="fas fa-upload"></i> <?php _e('Upload')?>
			        			<input id="watermark_upload" type="file" name="files[]">
			        		</button>
						    <a href="<?php _e( get_module_url("delete") )?>" data-confirm="Are you sure to delete this items?" data-id="<?php _e( $result->ids )?>" class="btn btn-label-danger actionItem" data-redirect=""><i class="far fa-trash-alt"></i> <?php _e("Delete")?></a>
						</div>
		        	</div>
		            <div class=" wrap-c">
		            	<button type="submit" class="btn btn-info btn-upload-watermark"> <?php _e("Save")?></button>
		            </div>
		        </div>
            </div>
        </div>
    </div>
</div>
