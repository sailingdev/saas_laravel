<div class="post-schedule m-b-15 <?php _e( $post?"active":"" )?>">
	<?php if(!$post){?>
	<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-b-15">
		<input type="checkbox" name="is_schedule" value="1" > <?php _e('Schedule')?>
		<span></span>
	</label>
	<?php }else{?>
		<input type="hidden" name="is_schedule" value="1" >
	<?php }?>

	<div class="post-schedule-content">
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label><?php _e('Time post')?></label>
					<input type="text" class="form-control datetime" autocomplete="off" name="time_post" value="">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label><?php _e('Interval per post (minute)')?></label>
					<input type="number" class="form-control" autocomplete="off" name="interval_per_post" value="5">
				</div>
			</div>
		</div>
		<div class="row post-repost">
			<div class="col-6">
				<div class="form-group">
					<label><?php _e('Repost frequency (day)')?></label>
					<select class="form-control" name="repost_frequency">
						<?php for ($i=0; $i <= 60; $i++) {?>
							<option value="<?php _e($i)?>"><?php _e($i)?></option>
						<?php }?>
					</select>
					<span class="small"><?php _e('Set 0 to disable repost')?></span>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label><?php _e('Repost until')?></label>
					<input type="text" class="form-control datetime" autocomplete="off" name="repost_until" value="">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="fm-action text-right">
	<?php if(!$post){?>
	<button type="submit" data-action="<?php _e( get_url("post/save") )?>" class="btn btn-info btn-schedule d-none"><?php _e('Schedule')?></a>
	<button type="submit" data-action="<?php _e( get_url("post/save") )?>" class="btn btn-info btn-post-now"><?php _e('Post now')?></a>
	<?php }else{?>
	<input type="hidden" class="form-control" autocomplete="off" name="ids" value="<?php _e( $post->ids )?>">
	<button type="submit" data-action="<?php _e( get_url("post/save") )?>" class="btn btn-info btn-post-now"><?php _e('Update')?></a>
	<?php }?>
</div>
<div id="" class="modal fade post-modal">
	<div class="modal-dialog modal-dialog-centered modal-md">
		<div class="modal-content">
		  	<div class="modal-header bg-solid-warning">
		    	<h5 class="modal-title text-warning"><i class="fas fa-exclamation-circle"></i> <?php _e("Confirm")?></h5>
		  	</div>
		  	<div class="modal-body data-post-confirm">
		  	</div>
		  	<div class="modal-footer">
		    	<button type="button" data-dismiss="modal" class="btn btn-secondary"><?php _e('No, Cancel')?></a>
				<button type="submit" data-dismiss="modal" data-action="<?php _e( get_url("post/save/true") )?>" class="btn btn-info btn-post-try"><?php _e("Yes, I'm sure")?></a>
		  	</div>
		</div>
	</div>
</div>

<?php if($post){?>
	<script type="text/javascript">
		
		var post_type = '<?php _e( trim($post->type) )?>';
		var post_data = <?php _e($post->data)?>;
		var time_post = '<?php _e( datetime_show($post->time_post) )?>';
		var interval_per_post = <?php _e( $post->delay )?>;
		var repost_frequency = <?php _e( $post->repost_frequency )?>;
		var repost_until = '<?php _e( datetime_show($post->repost_until) )?>';

		$(function(){

			setTimeout(function(){
				$(".post .post-type input[value='"+post_type+"']").parents("a").trigger("click");

				$("[name=time_post]").val(time_post);
				$("[name=interval_per_post]").val(interval_per_post);
				$("[name=repost_frequency]").val(repost_frequency);
				if(repost_until != "" && repost_frequency != 0){
					$("[name=repost_until]").val(repost_until);
				}

				if(post_data.link != null){
					$("[name=link]").val(post_data.link).change();
				}

				var el = $("textarea[name=caption]").emojioneArea();
            	el[0].emojioneArea.setText(post_data.caption);

            	var medias = post_data.medias;
            	if(medias != null){
	            	for (var i = 0; i < medias.length; i++) {
	            		File_Manager.addFile(medias[i], medias[i]);
	            	}
            	}
			}, 1000);

		});

	</script>
<?php }?>