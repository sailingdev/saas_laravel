<?php 
$report_list = get_ci_value("reports_list");
$module_name = "facebook_post";
$successed = schedule_report(segment(3), "all", 3);
$failed = schedule_report(segment(3), "all", 4);

$success_total = 0;
$error_total = 0;
if(!empty($report_list)){
	foreach ($report_list as $report) {
		if( isset($report['sub_menu']) && !empty($report['sub_menu']) ){
			foreach ($report['sub_menu'] as $key => $module_name) {
				if(isset($module_name["id"])){
					$success_total += _gt($module_name["id"]."_success_count", 0);
					$error_total += _gt($module_name["id"]."_error_count", 0);
				}
			}
		}
	}
}
?>
<div class="row">
	<div class="col-lg-12 col-sm-12 m-b-25">
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
</div>

<div class="row">
	<div class="col-md-4 m-b-25">
		<div class="p-25 bg-solid-info rounded">
            <div class="wrap-m">
                <div>
                    <h3 class="success w-100"><?php _e( $success_total )?></h3>
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
                    <h3 class="danger"><?php _e( $error_total )?></h3>
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
                    <h3 class="primary"><?php _e( $error_total + $success_total )?></h3>
                    <span><?php _e('Total')?></span>
                </div>
                <div class="wrap-c">
                    <i class="fas fa-calendar-check float-right text-success fs-45"></i>
                </div>
            </div>
        </div>
	</div>
</div>