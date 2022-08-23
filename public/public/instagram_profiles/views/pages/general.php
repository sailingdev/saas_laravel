<div class="widget-box-add-account">
	
	<div class="headline m-b-30">
		<div class="title fs-18 fw-5 text-info"><i class="far fa-plus-square"></i> <?php _e('Add profile')?></div>
		<div class="desc"><?php _e("Choose the profile you'd like to manage")?></div>
	</div>

	<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
		<?php if( get_option('instagram_login_user', 0)){?>
	  	<li class="nav-item">
	    	<a class="nav-link active" id="instagram-user-tab" data-toggle="tab" href="#instagram-user" role="tab" aria-controls="instagram-user" aria-selected="true"><i class="<?php _e($module_icon)?>"></i> <?php _e('Username & Password')?></a>
	  	</li>
	  	<?php }?>
	  	<?php if( get_option('instagram_login_button', 0)){?>
	  	<li class="nav-item">
	    	<a class="nav-link <?php _e( !get_option('instagram_login_user', 0)?"active":"" )?>" id="instagram-app-tab" data-toggle="tab" href="#instagram-app" role="tab" aria-controls="instagram-app" aria-selected="false"><i class="<?php _e($module_icon)?>"></i> <?php _e("Button")?></a>
	  	</li>
	  	<?php }?>
	</ul>
	<div class="tab-content p-t-25" id="myTabContent">
		<?php if( get_option('instagram_login_user', 0)){?>
	  	<div class="tab-pane fade show active" id="instagram-user" role="tabpanel" aria-labelledby="instagram-user-tab">
	  		
	  		<form class="actionForm" action="<?php _e( get_module_url('save') )?>" method="POST" data-redirect="<?php _e( PATH.'account_manager' )?>">
				<div class="form-group">
					<label for="username"><?php _e("Instagram username")?></label>
					<input type="text" class="form-control" id="username" name="username">
				</div>

				<div class="form-group">
					<label for="password"><?php _e("Instagram password")?></label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
				<?php if(get_option('user_proxy', 1)){?>
				<div class="form-group">
					<label for="proxy"><?php _e("Proxy")?></label>
					<input type="text" class="form-control" id="proxy" name="proxy">
				</div>
				<?php }?>

				<div class="form-group security-code d-none">
					<label for="security_code"><?php _e("Security Code")?></label>
					<input type="text" class="form-control" id="security_code" name="security_code">
				</div>

				<div class="form-group verification-code d-none">
					<label for="verification_code"><?php _e("Verification Code")?></label>
					<input type="text" class="form-control" id="verification_code" name="verification_code">
				</div>
				
				<button type="submit" class="btn btn-block btn-info m-t-15"><?php _e('Add profile')?></button>
			</form>

	  	</div>
	  	<?php }?>
	  	<?php if( get_option('instagram_login_button', 0)){?>
	  	<div class="tab-pane fade <?php _e( !get_option('instagram_login_user', 0)?"show active":"" )?>" id="instagram-app" role="tabpanel" aria-labelledby="instagram-app-tab">
	  		<a href="<?php _e( get_module_url('oauth_button') )?>" class="btn btn-facebook btn-block"><i class="fab fa-facebook-square"></i> <?php _e('Connect with Facebook')?></a>
	  	</div>
	  	<?php }?>
	</div>
</div> 