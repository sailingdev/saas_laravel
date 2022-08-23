<div class="form-group">
	<label for="status"><?php _e('Log in to Instagram via')?></label>
	<div>
		<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-r-10">
			<input type="hidden" name="instagram_login_user" value="0">
			<input type="checkbox" name="instagram_login_user" <?php _e( get_option('instagram_login_user', 1)  == 1?"checked":"" )?> value="1"> <?php _e('Username & Password')?>
			<span></span>
		</label>
		<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-r-10">
			<input type="hidden" name="instagram_login_button" value="0">
			<input type="checkbox" name="instagram_login_button" <?php _e( get_option('instagram_login_button', 0)  == 1?"checked":"" )?> value="1"> <?php _e('Button')?>
			<span></span>
		</label>
	</div>
</div>
<div class="form-group">
	<label for="status"><?php _e('Get Instagram security code via')?></label>
	<div>
		<label class="i-radio i-radio--tick i-radio--brand m-r-10">
			<input type="radio" name="instagram_choice" <?php _e( get_option('instagram_choice', 0)  == 0?"checked":"" )?> value="0"> <?php _e('SMS')?>
			<span></span>
		</label>
		<label class="i-radio i-radio--tick i-radio--brand m-r-10">
			<input type="radio" name="instagram_choice" <?php _e( get_option('instagram_choice', 0)  == 1?"checked":"" )?> value="1"> <?php _e('Email')?>
			<span></span>
		</label>
	</div>
</div>
<div class="form-group">
    <label for="instagram_ffmpeg_path"><?php _e('FFMPEG PATH')?></label>
    <input type="text" class="form-control" id="instagram_ffmpeg_path" name="instagram_ffmpeg_path" value="<?php _e( get_option('instagram_ffmpeg_path', '') )?>">
    <span class="small"><?php _e("Enter empty if you not change default ffmpeg path on your server")?></span>
</div>
<div class="form-group">
    <label for="instagram_ffprobe_path"><?php _e('FFPROBE PATH')?></label>
    <input type="text" class="form-control" id="instagram_ffprobe_path" name="instagram_ffprobe_path" value="<?php _e( get_option('instagram_ffprobe_path', '') )?>">
    <span class="small"><?php _e("Enter empty if you not change default ffprobe path on your server")?></span>
</div>
<h5 class="fs-16 fw-4 text-info m-b-20 m-t-40"><i class="fas fa-caret-right"></i> <?php _e("Log in to Instagram via button")?></h5>
<div class="alert alert-solid-brand">
	<span class="fw-6"><?php _e("Callback URL:")?></span>
	<a href="<?php _e( get_url("instagram_profiles") )?>" target="_blank"><?php _e( get_url("instagram_profiles") )?></a>
	<br/>
	<span class="fw-6"><?php _e("Click this link to create Facebook app:")?></span>
	<a href="https://developers.facebook.com/apps/" target="_blank">https://developers.facebook.com/apps/</a>
</div>
<div class="form-group">
    <label for="instagram_app_id"><?php _e('Facebook App ID')?></label>
    <input type="text" class="form-control" id="instagram_app_id" name="instagram_app_id" value="<?php _e( get_option('instagram_app_id', '') )?>">
</div>
<div class="form-group">
    <label for="instagram_app_secret"><?php _e('Facebook App Secret')?></label>
    <input type="text" class="form-control" id="instagram_app_secret" name="instagram_app_secret" value="<?php _e( get_option('instagram_app_secret', '') )?>">
</div>
<div class="form-group">
    <label for="instagram_app_version"><?php _e('Facebook app version')?></label>
    <input type="text" class="form-control" id="instagram_app_version" name="instagram_app_version" value="<?php _e( get_option('instagram_app_version', 'v10.0') )?>">
</div>
<div class="form-group">
    <label for="instagram_api_permissions"><?php _e('Permissions')?></label>
    <input type="text" class="form-control" id="instagram_api_permissions" name="instagram_api_permissions" value="<?php _e( get_option('instagram_api_permissions', 'instagram_basic,instagram_content_publish,pages_read_engagement') )?>">
</div>