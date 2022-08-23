<div class="input-group box-search-one">
  	<input class="form-control search-input" type="text" autocomplete="off" placeholder="<?php _e('Search')?>">
  	<span class="input-group-append">
	    <button class="btn" type="button">
	        <i class="fa fa-search"></i>
	    </button>
	</span>
</div>

<div class="widget">
	
	<div class="widget-list search-list">
		<?php if( !empty($accounts) ){?>
			<div class="widget-item widget-item-3 search-list <?php _e( segment(3) == ""?"active":"" )?>">
				 <a href="<?php _e( get_module_url('index') )?>" class="actionItem"
				 	class="actionItem" 
					data-result="html" 
					data-content="column-two" 
					href="<?php _e( get_module_url( 'index' ) )?>" 
					data-history="<?php _e( get_module_url( 'index' ) )?>"
					data-call-after="Watermark.init();" 
				 >
	                <div class="icon border"><i class="fas fa-medal"></i></div>
	                <div class="content content-2">
	                    <div class="title fw-5"><?php _e("Default watermark")?></div>
	                    <div class="desc"><?php _e( "Set default watermark for all profiles" )?></div>
	                </div>
	            </a>
			</div>
			<?php foreach ($accounts as $row): ?>
			<div class="widget-item widget-item-3 search-list <?php _e( $row->ids == segment(3)?"active":"" )?>">
				 <a href="<?php _e( get_module_url('index/'.$row->ids) )?>" class="actionItem"
				 	class="actionItem" 
					data-result="html" 
					data-content="column-two" 
					href="<?php _e( get_module_url( 'index/'.$row->ids ) )?>" 
					data-history="<?php _e( get_module_url( 'index/'.$row->ids ) )?>"
					data-call-after="Watermark.init();" 
				 >
	                <div class="icon"><img src="<?php _e( get_url( get_data($row, 'avatar') ) )?>"></div>
	                <div class="content content-2">
	                    <div class="title fw-5"><?php _e( get_data($row, 'name') )?></div>
	                    <div class="desc"><?php _e( ucfirst( $row->social_network . " " . __($row->category) ) )?></div>
	                </div>
	            </a>
			</div>
			<?php endforeach ?>

		<?php }else{?>
			<div class="empty small"></div>
		<?php }?>
	</div>

</div>