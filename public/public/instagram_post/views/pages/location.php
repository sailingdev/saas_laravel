<div class="card m-t-15 b-r-4">
	<div class="card-body p-15 customscroll">
		<div class="widget-list">
			<?php if(!empty($locations)){?>

				<?php foreach ($locations as $row): ?>
			    <div class="widget-item widget-item-3 search-list">
				 	<a href="#">
		                <div class="icon border"><i class="fas fa-map-marker-alt"></i></div>
		                <div class="content content-2">
		                    <div class="title fw-4"><?php _e($row->getName())?></div>
		                    <div class="desc"><?php _e($row->getAddress())?></div>
		                </div>
		            </a>
					<div class="widget-option">
						<label class="i-radio i-radio--tick i-radio--brand m-t-6">
							<input type="radio" name="advance[location]" class="check-item" value='<?php _e( serialize($row) , true)?>'>
							<span></span>
						</label>
					</div>
				</div>
				<?php endforeach ?>

			<?php }?>
		</div>
	</div>
</div>