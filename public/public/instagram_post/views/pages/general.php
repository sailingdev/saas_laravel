<div class="post post-create">
	
	<?php _e( $block_post_type, false) ?>

	<div class="post-content m-b-15">
		
		<div class="item-post-type" data-type="media">
			<?php _e( $file_manager_media, false) ?>
		</div>

		<div class="item-post-type" data-type="story">
			<?php _e( $file_manager_story, false) ?>
		</div>

		<div class="item-post-type" data-type="igtv">
			<div class="form-group">
				<input type="text" class="form-control" name="advance[title]" placeholder="<?php _e("Enter your title")?>">
			</div>
			<?php _e( $file_manager_igtv, false) ?>
		</div>

		<div class="item-post-type  m-t-15" data-type="carousel">
			<?php _e( $file_manager_carousel, false) ?>
		</div>

		<div class="instagram-post-caption-box">
			<?php _e( $block_caption, false)?>
		</div>

		<div class="post-advance m-t-15">
			<ul class="nav nav-tabs">
			  	<li class="nav-item">
			    	<a class="nav-link active" href="#"><i class="fas fa-magic text-info"></i> <?php _e("Advance option")?> <span class="arrow"><i class="ft-chevron-down"></i></span></a>
			  	</li>
			</ul>
			<div class="advance-content">
				<div class="alert alert-solid-brand" role="alert">
					<?php _e("Advance options just support for Instagram accounts login by medthod: Username and Password")?>
				</div>
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

				<div class="caption m-t-15 m-b-15">
					<textarea name="advance[comment]" class="form-control post-comment" placeholder="<?php _e('Add a first comment on your post')?>"></textarea>
					<div class="caption-toolbar">
						<div class="item">
							<div class="count-word"><i class="fas fa-text-width"></i> <span>0</span></div>			
						</div>
					</div>
				</div>

				<div class="item-post-type" data-type="story">
					<div class="form-group">
						<div class="input-group">
						  	<span class="input-group-prepend">
						  		<span class="input-group-text"><i class="fas fa-link"></i></span>
							</span>
						  	<input class="form-control" type="text" name="advance[link_story]" placeholder="<?php _e("Enter link for story")?>">
						</div>
					</div>
					<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-b-15">
						<input type="checkbox" name="advance[close_friends_story]" value="1"><?php _e('Close friends story')?>
						<span></span>
					</label>
				</div>
			</div>
		</div>

	</div>

	<?php _e( $block_schedule, false)?>

</div>