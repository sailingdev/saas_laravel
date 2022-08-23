<div class="post-overplay"><div class='loader loader1'><div><div><div><div></div></div></div></div></div></div>
<div class="headline m-b-25">
	<div class="title fs-16 text-info"><i class="far fa-edit"></i> <?php _e('New post')?></div>
</div>
<div class="row lg post-type m-b-15">
	<?php if( !empty( $post_types ) ){?>

		<?php foreach ($post_types as $key => $row): ?>
		<div class="item col p-l-0 p-r-0 <?php _e( $key == 0?"active":"" )?>">
			<a href="javascript:void(0);">
				<label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
					<input type="radio" name="post_type" <?php _e( $key == 0?"checked":"" )?> value="<?php _e( $row['id'] )?>"> <i class="<?php _e( $row['icon'] )?>"></i> <?php _e( $row['name'] )?>
					<span class="d-none"></span>
				</label>
			</a>
		</div>
		<?php endforeach ?>

	<?php }?>
</div>