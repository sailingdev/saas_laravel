<?php 
$module_name = "instagram_post";
$successed = schedule_report(segment(3), $module_name, 3);
$failed = schedule_report(segment(3), $module_name, 4);
?>
<div class="row">
	<div class="col-lg-8 col-sm-12 m-b-25">
		<div class="card rounded">
			<div class="card-header wrap-m">
				<div class="card-title wrap-c text-info"><i class="fas fa-caret-right p-r-5"></i> <?php _e("Last 30 days")?></div>
			</div>
            <div class="card-body h-300">
            	<canvas id="line-stacked-area" height="300"></canvas>
            </div>
            <script type="text/javascript">
            	$(function(){
            		setTimeout(function(){
						Core.lineChart(
							"line-stacked-area",
							<?=$successed->date?>, 
							[
								<?=$successed->value?>,
								<?=$failed->value?>
							],
							[
								"<?php _e('Successed')?>",
								"<?php _e('Failed')?>"
							]
						);
					}, 300);
            	});
    		</script>
        </div>
    </div>
	<div class="col-lg-4 col-sm-12 m-b-25">
		<div class="card rounded">
			<div class="card-header wrap-m">
				<div class="card-title wrap-c text-info"><i class="fas fa-caret-right p-r-5"></i> <?php _e("Post type")?></div>
			</div>
			<div class="card-body h-300">
				<div class="w-250 m-auto">
	            	<canvas id="chart-area" height="300"></canvas>
				</div>
			</div>
            <script type="text/javascript">
            	$(function(){
	    			setTimeout(function(){
	    				Core.pieChart(
		    				"chart-area",
		    				["<?php _e('Media')?>", "<?php _e('Story')?>", "<?php _e('IG TV')?>", "<?php _e('Carousel')?>"], 
		    				[
		    					<?php _e( _gt($module_name."_media_count", 0) )?>,
		    					<?php _e( _gt($module_name."_story_count", 0) )?>,
		    					<?php _e( _gt($module_name."_igtv_count", 0) )?>,
		    					<?php _e( _gt($module_name."_carousel_count", 0) )?>
		    				]
		    			);
	    			}, 300);
	    		});
            </script>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-4 m-b-25">
		<div class="p-25 bg-solid-info rounded">
            <div class="wrap-m">
                <div>
                    <h3 class="success w-100"><?php _e( _gt($module_name."_success_count", 0))?></h3>
                    <div><?php _e('Successed')?></div>
                </div>
                <div class="wrap-c">
                    <i class="fas fa-paper-plane float-right text-info fs-45"></i>
                </div>
            </div>
        </div>
	</div>
	<div class="col-md-4 m-b-25">
		<div class="p-25 bg-solid-warning rounded">
            <div class="wrap-m">
                <div>
                    <h3 class="danger"><?php _e( _gt($module_name."_error_count", 0))?></h3>
                    <span><?php _e('Failed')?></span>
                </div>
                <div class="wrap-c">
                    <i class="fas fa-exclamation-triangle float-right text-warning fs-45"></i>
                </div>
            </div>
        </div>
	</div>
	<div class="col-md-4 m-b-25">
		<div class="p-25 bg-solid-success rounded">
            <div class="wrap-m">
                <div>
                    <h3 class="primary"><?php _e( _gt($module_name."_error_count", 0) + _gt($module_name."_success_count", 0) )?></h3>
                    <span><?php _e('Total')?></span>
                </div>
                <div class="wrap-c">
                    <i class="fas fa-calendar-check float-right text-success fs-45"></i>
                </div>
            </div>
        </div>
	</div>
</div>