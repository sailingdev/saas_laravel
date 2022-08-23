<?php if(!empty($groups)){?>
<div class="btn-group dropdown dropdown-arrow-none dropdown-border-none" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="<?php _e('Groups')?>">
  	<button type="button" class="btn dropdown-toggle btn-label-info" data-toggle="dropdown"><i class="fas fa-users"></i></button>
  	<div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround">
  		<?php foreach ($groups as $key => $row): ?>
	    <a href="javascript:void(0);" class="dropdown-item action-groups" data-item='<?php _e( get_data($row, "data") )?>'><i class="fas fa-caret-right"></i> <?php _e( get_data($row, "name") )?></a>
  		<?php endforeach ?>
  	</div>
</div>
<?php }?>