

<?php if( !empty($result) ){ ?>

<div class="schedules-list">
	<div class="headline wrap-m">
		<div class="title wrap-c"><i class="far fa-calendar-alt"></i> <span><?php _e( sprintf( __("Schedule for %s"), date_show( segment(5) ) ) )?></span></div>
		<div class="toolbar wrap-c">
			<a class="btn btn-label-info" href="<?php _e( get_url('post') )?>"><i class="far fa-plus-square"></i></a>
		</div>
	</div>

	<div class="input-group box-search-one">
	  	<input class="form-control search-input" type="text" data-search="search-schedule" autocomplete="off" placeholder="<?php _e('Search')?>">
	  	<span class="input-group-append">
		    <button class="btn" type="button">
		        <i class="fa fa-search"></i>
		    </button>
		</span>
	</div>

	<?php foreach ($result as $key => $row): ?>

	<?php
	$data = json_decode($row->data);
	$medias = is_array($data->medias)?$data->medias:[];
	$info = json_decode($row->result);
	?>

	<div class="item search-schedule">
		<div class="type"></div>
		<div class="media">
			
			<?php if($row->type == "text"){?>
				<div class="text"><i class="far fa-file-alt"></i></div>
			<?php }elseif($row->type == "link"){?>
				<div class="link"><i class="fas fa-link"></i></div>
			<?php }elseif($row->type == "photo"){?>

				<?php if( count($medias) == 1 ){?>

					<?php if(is_photo($medias[0]) ){?>
						<div class="image" style="background-image: url('<?php _e( $medias[0] )?>');"></div>
					<?php }else{?>
						<video>
						  	<source src="<?php _e( $medias[0] )?>" type="video/mp4">
						</video>
						<div class="video-icon">
							<i class="far fa-play-circle"></i>
						</div>
					<?php }?>

				<?php }?>

				<?php if( count($medias) > 1 ){?>

					<div class="carousel">
				
						<div id="carousel-<?php _e( $row->ids )?>" class="carousel slide" data-ride="carousel">
						  	<ol class="carousel-indicators">
						  		<?php foreach ($medias as $key => $media) {?>
							    <li data-target="#carousel-<?php _e( $row->ids )?>" data-slide-to="<?php _e( $key )?>" class="<?php _e( $key==0?"active":"" )?>"></li>
								<?php }?>
						 	</ol>
						  	<div class="carousel-inner">
						  		<?php foreach ($medias as $key => $media) {?>
							    <div class="carousel-item <?php _e( $key==0?"active":"" )?>" style="background-image: url('<?php _e( $media )?>');"></div>
							    <?php }?>
						  	</div>
						</div>

					</div>

				<?php }?>

			<?php }elseif($row->type == "media"){?>

				<?php if( count($medias) == 1 ){?>

					<?php if(is_photo($medias[0]) ){?>
						<div class="image" style="background-image: url('<?php _e( $medias[0] )?>');"></div>
					<?php }else{?>
						<video>
						  	<source src="<?php _e( $medias[0] )?>" type="video/mp4">
						</video>
						<div class="video-icon">
							<i class="far fa-play-circle"></i>
						</div>
					<?php }?>

				<?php }?>

				<?php if( count($medias) > 1 ){?>

					<div class="carousel">
				
						<div id="carousel-<?php _e( $row->ids )?>" class="carousel slide" data-ride="carousel">
						  	<ol class="carousel-indicators">
						  		<?php foreach ($medias as $key => $media) {?>
							    <li data-target="#carousel-<?php _e( $row->ids )?>" data-slide-to="<?php _e( $key )?>" class="<?php _e( $key==0?"active":"" )?>"></li>
								<?php }?>
						 	</ol>
						  	<div class="carousel-inner">
						  		<?php foreach ($medias as $key => $media) {?>
							    <div class="carousel-item <?php _e( $key==0?"active":"" )?>" style="background-image: url('<?php _e( $media )?>');"></div>
							    <?php }?>
						  	</div>
						</div>

					</div>

				<?php }?>

			<?php }elseif($row->type == "video"){?>
				<video>
				  	<source src="<?php _e( $medias[0] )?>" type="video/mp4">
				</video>
				<div class="video-icon">
					<i class="far fa-play-circle"></i>
				</div>
			<?php }elseif($row->type == "story"){?>

				<?php if( count($medias) > 0 ){?>

					<?php if(is_photo($medias[0]) ){?>
						<div class="image" style="background-image: url('<?php _e( $medias[0] )?>');"></div>
					<?php }else{?>
						<video>
						  	<source src="<?php _e( $medias[0] )?>" type="video/mp4">
						</video>
						<div class="video-icon">
							<i class="far fa-play-circle"></i>
						</div>
					<?php }?>

				<?php }?>

			<?php }elseif($row->type == "carousel"){?>
				<?php if( count($medias) > 1 ){?>

					<div class="carousel">
				
						<div id="carousel-<?php _e( $row->ids )?>" class="carousel slide" data-ride="carousel">
						  	<ol class="carousel-indicators">
						  		<?php foreach ($medias as $key => $media) {?>
							    <li data-target="#carousel-<?php _e( $row->ids )?>" data-slide-to="0" class="<?php _e( $key==0?"active":"" )?>"></li>
								<?php }?>
						 	</ol>
						  	<div class="carousel-inner">
						  		<?php foreach ($medias as $key => $media) {?>
							    <div class="carousel-item <?php _e( $key==0?"active":"" )?>" style="background-image: url('<?php _e( $media )?>');"></div>
							    <?php }?>
						  	</div>
						</div>

					</div>

				<?php }?>
			<?php }?>
		</div>

		<div class="icon" style="background-color: <?php _e( $row->module_color )?>">
			<i class="<?php _e( $row->module_icon )?>"></i>
		</div>

		<div class="info">
			
			<div class="name">
				<i class="far fa-user-circle"></i> <span><?php _e( $row->name )?></span>
			</div>
			<div class="caption nicescroll">
				<i class="far fa-list-alt"></i>
				<span>
					<?php _e( $data->caption )?>
				</span>
			</div>
			<div class="desc"><i class="far fa-calendar-alt"></i> <span><?php _e( datetime_show( $row->time_posts ) ) ?></span></div>
			
		</div>

		<div class="toolbar">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="ft-more-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround">
                    <li><a href="<?php _e( get_url($row->category."?edit=".$row->ids) )?>"><i class="far fa-edit"></i> <?php _e('
                    Edit')?></a></li>
                    <li><a href="<?php _e( get_module_url("delete") )?>" data-trigger="hover" data-id="<?php _e( $row->ids )?>" class="actionItem" data-remove="item" data-confirm="Are you sure to delete this items?"><i class="far fa-trash-alt"></i> <?php _e('Delete')?></a></li>
                </ul>
            </div>
        </div>

        <?php if($row->status == 3 && isset( $info->message )){?>
        	<div class="status fs-12 bg-solid-success text-success">
	        	<span><i class="far fa-check-circle"></i> <?php _e( $info->message )?></span>
	        	<?php if( isset( $row->url ) ){?>
	        	<span class="m-l-5"><a href="<?php _e( $info->url )?>" target="_blank"><i class="far fa-eye"></i> <?php _e("View post")?></a></span>
	        	<?php }?>

	        </div>
        <?php }elseif($row->status == 4 && isset( $info->message )){?>
        	<div class="status fs-12 bg-solid-danger text-danger">
	        	<i class="fas fa-exclamation-circle"></i> <span><?php _e( $info->message )?></span>
	        </div>
        <?php }?>
	</div>
	<?php endforeach ?>

</div>

<?php }else{?>
<div class="wrap-m h-100">
	<div class="empty">
		<div class="icon"></div>
		<a class="btn btn-info" href="<?php _e( get_url('post') )?>"><i class="far fa-plus-square"></i> <?php _e('Add post')?></a>
	</div>
</div>
<?php }?>

