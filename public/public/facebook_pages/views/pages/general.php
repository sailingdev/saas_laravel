<div class="widget-box-add-account">
	
	<div class="headline m-b-30">
		<div class="title fs-18 fw-5 text-info"><i class="far fa-plus-square"></i> <?php _e('Add profile')?></div>
		<div class="desc"><?php _e("Choose the profile you'd like to manage")?></div>
	</div>


	<?php if($status == "success"){?>
	<div class="wiget-head text-right m-b-0">
		<div class="input-group box-search-one">
		  	<input type="text" class="form-control search-input" autocomplete="off" placeholder="<?php _e('Search')?>">
		  	<div class="input-group-append">
		  		<button class="btn" type="submit"><i class="fa fa-search"></i></button>
			    <a class="btn btn-label-info">
			    	<label class="i-checkbox i-checkbox--brand">
						<input type="checkbox" name="id[]" class="check-all">
						<span></span>
					</label>
			   	</a>
		  	</div>
		</div>
	</div>
	<form class="actionForm" action="<?php _e( get_module_url('save') )?>" method="POST" data-redirect="<?php _e( PATH.'account_manager' )?>">
		<div class="widget-list">
			
			<?php if( !empty($result) ){?>

				<?php foreach ($result as $row): ?>
				<div class="widget-item widget-item-3 search-list">
					 <a href="#">
		                <div class="icon"><img src="<?php _e( get_data($row, 'avatar') )?>"></div>
		                <div class="content content-2">
		                    <div class="title"><?php _e( get_data($row, 'name') )?></div>
		                    <div class="desc"><?php _e( get_data($row, 'id') )?></div>
		                </div>
		            </a>
					
					<div class="widget-option">
						<label class="i-checkbox i-checkbox--tick i-checkbox--brand">
							<input type="checkbox" name="id[]" class="check-item" value="<?php _e( get_data($row, 'id') )?>" >
							<span></span>
						</label>
					</div>
				</div>
				<?php endforeach ?>

			<?php }?>

		</div>
		<button type="submit" class="btn btn-block btn-info m-t-15"><?php _e('Add profile')?></button>
	</form>

	<?php }else{?>
	<div class="alert alert-solid-danger m-b-0 m-t-30"><i class="fas fa-exclamation-circle"></i> <?php _e( $message )?></div>
	<?php }?>

	<div class="note">
		<div class="desc m-b-15"><?php _e("If you don't see your profiles above, you might try to reconnec, re-accept all permissions, and ensure that you're logged in to the correct profile.")?></div>
		<a href="<?php _e( get_module_url('oauth') )?>" class="btn btn-facebook"><i class="fab fa-facebook-square"></i> <?php _e('Re-connect with Facebook')?></a>
	</div>
</div>