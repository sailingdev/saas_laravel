<?php
$name = "";
$ids = "";
$data = array();

if(!empty($group)){
    $ids = $group->ids;
    $name = $group->name;
    $data = json_decode($group->data);
}

?>

<div class="group-manager-content">
	<div class="group-manager-box">
		
		<div class="p-15">
		    <div class="form-group m-b-0">
		        <label><?php _e("Group name")?></label>
		        <input type="text" class="form-control group-name" value="<?php _e( $name )?>">
		    </div>
		    <div class="text-center text-primary d-none d-sm-block m-t-15">
		        <?php _e("Drag and drop to right to select and to left to unselect")?>
		    </div>
		</div>

		<div class="group-list-wrap row m-l-0 m-r-0">
		    <div class="group-col col-6 p-0">
		        <div class="group-panel">
		            <div class="pn-group-header"><?php _e("All accounts")?></div>
		            <ul class="group-list connected-sortable draggable-left nicescroll p-0">
		                <?php if(!empty($accounts)){
		                foreach ($accounts as $row) {
		                    if(!in_array($row->pid, $data)){
		                ?>
		                <li class="group-item">
		                    <div class="pic">
		                        <img src="<?php _e( get_img_url( get_data($row, 'avatar') ) )?>">
		                    </div>
		                    <div class="detail">
		                        <div class="title"><?php _e( get_data($row, "name") )?></div>
		                        <div class="desc"><?php _e( ucfirst( get_data($row, "social_network") ) ." ". get_data($row, "category") )?></div>
		                        <input type="hidden" name="group[]" value="<?php _e( get_data($row, "pid") ) ?>">
		                    </div>
		                </li>
		                <?php }}}?>
		            </ul>
		        </div>
		    </div>
		    <form action="<?php _e( get_module_url('save') )?>" data-redirect="<?php _e( get_module_url() )?>" method="POST" class="actionForm saveFormGroups group-col col-6 p-0">
		        <input type="hidden" name="name" value="<?php _e( $name ) ?>">
		        <input type="hidden" name="ids" value="<?php _e( $ids ) ?>">
		        <div class="group-panel">
		            <div class="pn-group-header"><?php _e("Selected accounts")?></div>
		            <ul class="group-list connected-sortable draggable-right nicescroll p-0">
		                <?php if(!empty($accounts)){
		                foreach ($accounts as $row) {
		                    if(in_array($row->pid, $data)){
		                ?>
		                <li class="group-item">
		                    <div class="pic">
		                        <img src="<?php _e( get_img_url( get_data($row, 'avatar') ) )?>">
		                    </div>
		                    <div class="detail">
		                        <div class="title"><?php _e( get_data($row, "name") )?></div>
		                        <div class="desc"><?php _e( ucfirst( get_data($row, "social_network") ) ." ". get_data($row, "category") )?></div>
		                        <input type="hidden" name="group[]" value="<?php _e( get_data($row, "pid") ) ?>">
		                    </div>
		                </li>
		                <?php }}}?>
		            </ul>
		        </div>
		    </form>
		</div>

	</div>
	<div class="card-footer p15">
        <button type="button" class="btn btn-info saveGroups"> <?php _e('Save')?></button>
        <a 
			class="btn btn-label-dark actionItem" 
			data-result="html" 
			data-content="column-two"
			data-history="<?php _e( get_module_url() )?>" 
			href="<?php _e( get_module_url() )?>"
        > <?php _e('Cancel')?></a>
    </div>
</div>