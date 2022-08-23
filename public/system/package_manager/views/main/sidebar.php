<div class="input-group box-search-one">
  	<input class="form-control search-input" type="text" autocomplete="off" placeholder="<?php _e('Search')?>">
  	<span class="input-group-append">
	    <button class="btn" type="button">
	        <i class="fa fa-search"></i>
	    </button>
	</span>
</div>

<div class="widget">
	
	<div class="widget-items search-list">
		<?php if( !empty($result) ){?>

			<?php foreach ($result as $row): ?>
			<div class="widget-item search-item wrap-m <?php _e( get_data($row, 'ids', 'class', segment(4)) )?>">
				<a 
					class="actionItem" 
					data-result="html" 
					data-content="column-two" 
					href="<?php _e( get_module_url('index/update/' . get_data( $row, 'ids' ) ) )?>" 
					data-history="<?php _e( get_module_url('index/update/' . get_data( $row, 'ids' ) ) )?>"
					data-call-after="Core.CKEditor();" 
				>
					<span class="widget-section">
						<span class="widget-icon"><i class="fas fa-cubes"></i></span>
						<span class="widget-desc"><?php _e( get_data( $row, 'name' ) )?></span>
					</span>
				</a>
				<?php if( get_data($row, "type") == 2){?>
				<div class="widget-option">
					<div class="dropdown">
					  	<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
					  		<i class="fas fa-ellipsis-v"></i>
					  	</button>
					  	<div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround">
						    <a class="dropdown-item actionItem" href="<?php _e( get_module_url('delete') )?>" data-id="<?php _e( get_data( $row, 'ids' ) )?>" data-confirm="<?php _e('Are you sure to delete this items?')?>" data-remove="widget-item"><i class="far fa-trash-alt"></i> <?php _e('Delete')?></a>
					  	</div>
					</div>
				</div>
				<?php }?>
			</div>
			<?php endforeach ?>

		<?php }else{?>
			<div class="empty small"></div>
		<?php }?>
	</div>

</div>