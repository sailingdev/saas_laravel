<div class="post post-create">
	
	<?php _e( $block_post_type, false) ?>

	<div class="post-content m-b-15">
		
		<div class="item-post-type" data-type="photo">
			<?php _e( $file_manager_photo, false) ?>
		</div>

		<div class="item-post-type" data-type="video">
			<?php _e( $file_manager_video, false) ?>
		</div>

		<div class="item-post-type" data-type="link">
			<label class="text-uppercase"><?php _e('Link url')?></label>
			<?php _e( $block_link, false)?>
			<label class="text-uppercase"><?php _e('Thumbnail')?></label>
			<?php _e( $file_manager_link, false) ?>
		</div>

		<?php _e( $block_caption, false)?>

	</div>

	<?php _e( $block_schedule, false)?>

</div>