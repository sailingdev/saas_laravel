<div class="subheadline wrap-m">
	
	<div class="sh-main wrap-c">
		<div class="sh-title text-info fs-18 fw-5"><i class="far fa-edit"></i> <?php _e('Update')?></div>
	</div>
	<div class="sh-toolbar wrap-c">
		<div class="btn-group" role="group">
	    	<a 
	    		class="btn btn-label-info actionItem" 
	    		data-result="html" 
	    		data-content="column-two"
	    		data-history="<?php _e( get_module_url() )?>" 
	    		data-call-after="Layout.inactive_subsidebar();" 
	    		href="<?php _e( get_module_url() )?>"
	    	>
	    		<i class="fas fa-chevron-left"></i> <?php _e('Back')?>
	    	</a>
		</div>
	</div>

</div>

<div class="m-t-10">
	<form class="actionForm" action="<?php _e( get_module_url( 'save/'.segment(4) ) )?>" data-redirect="<?php _e( get_module_url() )?>">
		
		<div class="row">
			<div class="col-md-6">
				<form>
					<div class="form-group">
				    	<label for="status"><?php _e('Status')?></label>
				    	<div>
				    		<label class="i-radio i-radio--tick i-radio--brand m-r-10">
								<input type="radio" name="status" checked="true" value="1" <?php _e( get_data($result, 'status', 'radio', 1) )?> > <?php _e('Enable')?>
								<span></span>
							</label>
							<label class="i-radio i-radio--tick i-radio--brand m-r-10">
								<input type="radio" name="status" value="0" <?php _e( get_data($result, 'status', 'radio', 0) )?> > <?php _e('Disable')?>
								<span></span>
							</label>
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label for="position"><?php _e('Position')?></label>
				    	<input type="number" class="form-control" id="position" name="position" value="<?php _e( get_data($result, 'position') )?>">
				  	</div>
				  	<div class="form-group">
				    	<label for="title"><?php _e('Title')?></label>
				    	<input type="text" class="form-control" id="title" name="title" value="<?php _e( get_data($result, 'name') )?>">
				  	</div>
				  	<div class="form-group">
				    	<label for="desc"><?php _e('Description')?></label>
				    	<input type="text" class="form-control" id="desc" name="desc" value="<?php _e( get_data($result, 'desc') )?>">
				  	</div>
				  	<div class="form-group">
			            <label for="image"><?php _e('Image')?></label>
			            <div class="input-group">
			                <input type="text" class="form-control" id="image" name="image" value="<?php _e( get_data($result, 'image') )?>">
			                <div class="input-group-append">
			                    <button class="btn btn-info btnOpenFileManager" data-id="image" data-select="single" type="button"><i class="far fa-folder-open"></i></button>
			                </div>
			            </div>
			        </div>
				  	<div class="form-group">
				    	<label for="content"><?php _e('Content')?></label>
				    	<textarea class="form-control" id="ckeditor" name="content"><?php _e( get_data($result, 'content') )?></textarea>
				  	</div>
				  	
				  	<button type="submit" class="btn btn-primary"><?php _e('Submit')?></button>
				</form>
			</div>
		</div>

	</form>

</div>