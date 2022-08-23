<div class="input-group box-search-one">
  	<input class="form-control search-input" type="text" autocomplete="off" placeholder="<?php _e('Search')?>">
  	<span class="input-group-append">
	    <button class="btn" type="button">
	        <i class="fa fa-search"></i>
	    </button>
	    <?php _e( $block_group, false)?>
	    <a class="btn btn-label-info">
	    	<label class="i-checkbox i-checkbox--brand">
				<input type="checkbox" name="id[]" class="check-all">
				<span></span>
			</label>
	   	</a>
	</span>
</div>

<div class="widget">
	
	<div class="widget-list search-list">
		<?php if( !empty($result) ){?>

			<?php if(!empty($post)){?>

				<?php foreach ($result as $row): ?>
					
					<?php if($post->account_id == $row->id){?>
					<div class="widget-item widget-item-3 search-list" data-pid="<?php _e( get_data($row, 'pid') )?>">
						 <a href="#">
			                <div class="icon"><img src="<?php _e( BASE.get_data($row, 'avatar') )?>"></div>
			                <div class="content content-2">
			                    <div class="title fw-4"><?php _e( get_data($row, 'name') )?></div>
			                    <div class="desc"><?php _e( ucfirst( $row->social_network . " " . __($row->category) ) )?></div>
			                </div>
			            </a>
						
						<div class="widget-option">
							<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-t-6">
								<input type="checkbox" name="account[]" class="check-item" checked="" value="<?php _e( get_data($row, 'social_network')."__".get_data($row, 'ids') )?>" >
								<span></span>
							</label>
						</div>
					</div>
					<?php }?>

				<?php endforeach ?>

			<?php }else{?>
				<?php foreach ($result as $row): ?>
					<div class="widget-item widget-item-3 search-list" data-pid="<?php _e( get_data($row, 'pid') )?>">
						 <a href="#">
			                <div class="icon"><img src="<?php _e( BASE.get_data($row, 'avatar') )?>"></div>
			                <div class="content content-2">
			                    <div class="title fw-4"><?php _e( get_data($row, 'name') )?></div>
			                    <div class="desc"><?php _e( ucfirst( $row->social_network . " " . __($row->category) ) )?></div>
			                </div>
			            </a>
						
						<div class="widget-option">
							<label class="i-checkbox i-checkbox--tick i-checkbox--brand m-t-6">
								<input type="checkbox" name="account[]" class="check-item" value="<?php _e( get_data($row, 'social_network')."__".get_data($row, 'ids') )?>" >
								<span></span>
							</label>
						</div>
					</div>
				<?php endforeach ?>

			<?php }?>

		<?php }else{?>
			<div class="empty small"></div>
			<div class="text-center">
				<a class="btn btn-info" href="<?php _e( get_url("account_manager") )?>">
    				<i class="fas fa-plus-square"></i> <?php _e("Add account")?>
    			</a>
    		</div>
		<?php }?>
	</div>

</div>