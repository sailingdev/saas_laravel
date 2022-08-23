
<div class="form-group">
    <label for="facebook_client_id"><?php _e('Facebook client id')?></label>
    <input type="text" class="form-control" id="facebook_client_id" name="facebook_client_id" value="<?php _e( get_option('facebook_client_id', '') )?>">
</div>
<div class="form-group">
    <label for="facebook_client_secret"><?php _e('Facebook client secret')?></label>
    <input type="text" class="form-control" id="facebook_client_secret" name="facebook_client_secret" value="<?php _e( get_option('facebook_client_secret', '') )?>">
</div>
<div class="form-group">
    <label for="facebook_app_version"><?php _e('Facebook app version')?></label>
    <input type="text" class="form-control" id="facebook_app_version" name="facebook_app_version" value="<?php _e( get_option('facebook_app_version', 'v10.0') )?>">
</div>

<h5 class="fs-16 fw-4 text-info m-b-20 m-t-40"><i class="fas fa-caret-right"></i> <?php _e("Facebook API Profile")?></h5>
<div class="form-group">
	<label for="status"><?php _e('Login Facebook profile')?></label>
	<div>
		<label class="i-radio i-radio--tick i-radio--brand m-r-10">
			<input type="radio" name="facebook_profile_status" <?php _e( get_option('facebook_profile_status', 0)  == 0?"checked":"" )?> value="0"> <?php _e('Disable')?>
			<span></span>
		</label>
		<label class="i-radio i-radio--tick i-radio--brand m-r-10">
			<input type="radio" name="facebook_profile_status" <?php _e( get_option('facebook_profile_status', 0)  == 1?"checked":"" )?> value="1"> <?php _e('Enable')?>
			<span></span>
		</label>
	</div>
</div>
<div class="alert alert-solid-brand">
	<span class="fw-6"><?php _e("Callback URL:")?></span>
    <a href="<?php _e( get_url("facebook_profiles") )?>" target="_blank"><?php _e( get_url("facebook_profiles") )?></a><br/>
</div>

<div class="form-group">
    <label for="facebook_profile_permissions"><?php _e('Permissions')?></label>
    <input type="text" class="form-control" id="facebook_profile_permissions" name="facebook_profile_permissions" value="<?php _e( get_option('facebook_profile_permissions', '') )?>">
</div>