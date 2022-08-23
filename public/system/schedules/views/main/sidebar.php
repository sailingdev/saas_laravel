<div class="input-group box-search-one">
  	<input class="form-control search-input" type="text" autocomplete="off" placeholder="<?php _e('Search')?>">
  	<span class="input-group-append">
	    <button class="btn" type="button">
	        <i class="fa fa-search"></i>
	    </button>
	</span>
</div>

<div class="widget-list widget-solid schedules-type">
	
	<div class="widget-item widget-item-2 search-item <?php _e( segment(3) == "queue"?"active":"" )?>" data-time="<?php _e( segment(5) )?>" data-type="queue" data-category="<?php _e( segment(4) )?>">
		 <a href="<?php _e( get_module_url( "index/queue/".segment(4)."/" ) )?>">
        	<div class="icon"><i class="fas fa-circle-notch fa-spin"></i></div>
            <div class="content content-1">
                <div class="title fw-5"><?php _e("Queue")?></div>
            </div>
        </a>
	</div>
	<div class="widget-item widget-item-2 search-item <?php _e( segment(3) == "published"?"active":"" )?>" data-time="<?php _e( segment(5) )?>" data-type="published" data-category="<?php _e( segment(4) )?>">
		 <a href="<?php _e( get_module_url("index/published/".segment(4)."/" ) )?>">
        	<div class="icon"><i class="fas fa-check-double"></i></div>
            <div class="content content-1">
                <div class="title fw-5"><?php _e("Published")?></div>
            </div>
        </a>
	</div>
	<div class="widget-item widget-item-2 search-item <?php _e( segment(3) == "unpublished"?"active":"" )?>" data-time="<?php _e( segment(5) )?>" data-type="unpublished" data-category="<?php _e( segment(4) )?>">
		 <a href="<?php _e( get_module_url("index/unpublished/".segment(4)."/" ) )?>">
        	<div class="icon"><i class="fas fa-exclamation-circle"></i></div>
            <div class="content content-1">
                <div class="title fw-5"><?php _e("Unpublished")?></div>
            </div>
        </a>
	</div>
</div>

<?php if( !empty($categories) ){?>
<div class="sub-sidebar-headline fs-14 fw-6 m-t-20 text-info m-b-10">
	<i class="fas fa-filter"></i> <span class="text-uppercase"><?php _e('Schedules of')?></span>
</div>

<div class="widget schedules-of">
	<div class="widget-list search-list">
			<div class="widget-item widget-item-3 search-list">
				 <a href="#">
	                <div class="icon border">
	                	<i class="fas fa-share-alt-square"></i>
	                </div>
	                <div class="content content-1">
	                    <div class="title fw-4"><?php _e( "All schedules" )?></div>
	                </div>
	            </a>
				
				<div class="widget-option">
					<label class="i-radio i-radio--tick i-radio--brand">
						<input type="radio" name="module" class="check-item" <?php _e( segment(4)=="all"?"checked":"" )?> value="all" >
						<span></span>
					</label>
				</div>
			</div>
			<?php foreach ($categories as $row): ?>
			<div class="widget-item widget-item-3 search-list">
				 <a href="#">
	                <div class="icon border">
	                	<i class="<?php _e( $row->module_icon )?>" style="color: <?php _e( $row->module_color )?>"></i>
	                </div>
	                <div class="content content-1">
	                    <div class="title fw-4"><?php _e( $row->module_name )?></div>
	                </div>
	            </a>
				
				<div class="widget-option">
					<label class="i-radio i-radio--tick i-radio--brand">
						<input type="radio" name="module" class="check-item" <?php _e( segment(4)==$row->category?"checked":"" )?> value="<?php _e( $row->category )?>" >
						<span></span>
					</label>
				</div>
			</div>
			<?php endforeach ?>

	</div>
</div>
<?php }?>

<?php if( !empty($categories) ){?>
<form action="<?php _e( get_module_url("delete/multi") )?>" class="actionForm" data-redirect="" data-confirm="<?php _e('Are you sure to delete this items?')?>">
	<div class="sub-sidebar-headline fs-14 fw-6 m-t-20 text-info m-b-10">
		<i class="far fa-trash-alt"></i> <span class="text-uppercase"><?php _e("Delete schedules")?></span>
	</div>

	<div class="card border-0 b-r-4">
		<div class="card-body bg-solid-info b-r-4">
			<div class="m-b-0">
				<label class="i-radio i-radio--brand">
					<?php _e('Queue')?> <input type="radio" name="type" checked="" value="queue">
					<span></span>
				</label>
			</div>
			<div class="m-b-0">
				<label class="i-radio i-radio--brand">
					<?php _e('Published')?> <input type="radio" name="type" value="published">
					<span></span>
				</label>
			</div>
			<div class="m-b-0">
				<label class="i-radio i-radio--brand">
					<?php _e('Unpublished')?> <input type="radio" name="type" value="unpublished">
					<span></span>
				</label>
			</div>
			<div class="form-group">
				<label><?php _e("Category")?></label>
				<select class="form-control" name="category">
					<option value="all"> <?php _e("All")?> </option>
					<?php foreach ($categories as $row): ?>
					<option value="<?php _e( $row->category )?>"> <?php _e( $row->module_name )?> </option>
					<?php endforeach ?>
				</select>
			</div>
			<button type="submit" class="btn btn-danger btn-block"><?php _e("Delete")?></button>
		</div>
	</div>
</form>
<?php }?>