<div class="alert alert-solid-brand">
	<span class="fw-6"><?php _e("Callback URL:")?></span> <a href="<?php _e( get_url("facebook_pages") )?>" target="_blank"><?php _e( get_url("facebook_pages") )?></a><br/>
</div>

<div class="form-group">
    <label for="facebook_page_permissions"><?php _e('Permissions')?></label>
    <input type="text" class="form-control" id="facebook_page_permissions" name="facebook_page_permissions" value="<?php _e( get_option('facebook_page_permissions', 'pages_read_engagement,pages_manage_posts,pages_show_list') )?>">
</div>