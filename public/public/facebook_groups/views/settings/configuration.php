<div class="alert alert-solid-brand">
	<span class="fw-6"><?php _e("Callback URL:")?></span>
	<a href="<?php _e( get_url("facebook_groups") )?>" target="_blank"><?php _e( get_url("facebook_groups") )?></a>	
</div>

<div class="form-group">
    <label for="facebook_group_permissions"><?php _e('Permissions')?></label>
    <input type="text" class="form-control" id="facebook_group_permissions" name="facebook_group_permissions" value="<?php _e( get_option('facebook_group_permissions', 'publish_to_groups') )?>">
</div>