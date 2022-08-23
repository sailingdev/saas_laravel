<?php if(!empty( $result )){?>
<div class="post">
	<div class="row lg">
		
		<div class="col p-0">
			<div class="post-preview">
				
				<div class="tab nav nav-tabs">
					<?php foreach ($result as $key => $row): ?>
						<a href="#preview-tab-<?php _e($key)?>" class="<?php _e( $key==0?'active':'' )?>" data-toggle="tab" aria-expanded="true"><i class="<?php _e( $row['icon'] )?>" style="color: <?php _e( $row['color'] )?>"></i></a>
					<?php endforeach ?>
			    </div>

			    <div class="row justify-content-md-center m-t-30">
			    	<div class="col-md-8 col-sm-12 tab-content">
						<?php foreach ($result as $key => $row): ?>
							<div class="tab-pane fade <?php _e( $key==0?'active show':'' )?>" id="preview-tab-<?php _e($key)?>">
								<?php _e( $row['preview'], false)?>
							</div>
						<?php endforeach ?>
			        </div>
			    </div>

			</div>
		</div>	

	</div>
</div>
<?php }else{?>
<div class="wrap-m h-100">
	<div class="empty wrap-c">
		<div class="icon"></div>
	</div>
</div>
<?php }?>