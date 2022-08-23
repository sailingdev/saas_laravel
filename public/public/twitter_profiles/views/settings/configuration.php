<div class="alert alert-solid-brand">
	<span class="fw-6"><?php _e("Callback URL:")?></span>
	<a href="<?php _e( get_url("twitter_profiles") )?>" target="_blank"><?php _e( get_url("twitter_profiles") )?></a>	
	<br/>
	<span class="fw-6"><?php _e("Click this link to create twitter app:")?></span>
	<a href="https://developer.twitter.com/en/apps/create" target="_blank">https://developer.twitter.com/en/apps/create</a>	
</div>

<div class="form-group">
    <label for="facebook_consumer_id"><?php _e('Twitter consumer id')?></label>
    <input type="text" class="form-control" id="twitter_consumer_key" name="twitter_consumer_key" value="<?php _e( get_option('twitter_consumer_key', '') )?>">
</div>
<div class="form-group">
    <label for="twitter_consumer_secret"><?php _e('Twitter consumer secret')?></label>
    <input type="text" class="form-control" id="twitter_consumer_secret" name="twitter_consumer_secret" value="<?php _e( get_option('twitter_consumer_secret', '') )?>">
</div>