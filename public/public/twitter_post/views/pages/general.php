<div class="post post-create">
	
	<?php _e( $block_post_type, false) ?>

	<div class="post-content m-b-15">
		
		<div class="item-post-type" data-type="photo">
			<?php _e( $file_manager_photo, false) ?>
		</div>

		<div class="item-post-type" data-type="video">
			<?php _e( $file_manager_video, false) ?>
		</div>

		<div class="item-post-type  m-t-15" data-type="link">
			<?php _e( $block_link, false)?>
		</div>

		<?php _e( $block_caption, false)?>

		<div class="post-advance m-t-15">
			<ul class="nav nav-tabs">
			  	<li class="nav-item">
			    	<a class="nav-link active" href="#"><i class="fas fa-magic text-info"></i> <?php _e("Advance option")?> <span class="arrow"><i class="ft-chevron-down"></i></span></a>
			  	</li>
			</ul>
			<div class="advance-content">
				<div class="form-group widget-location">
					<div class="input-group">
					  	<span class="input-group-prepend">
					  		<span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
						</span>
					  	<input class="form-control search-location" data-action="<?php _e( get_module_url('location') )?>" data-hide-overplay="false" data-result="html" data-content="load-location" type="text" autocomplete="off" placeholder="<?php _e("Enter location")?>">
					</div>
				  	<div class="small loading"><?php _e('Searching...')?></div>

					<div class="load-location"></div>
				</div>
			</div>
		</div>

	</div>

	<?php _e( $block_schedule, false)?>

</div>