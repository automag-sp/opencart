<div class="box white latest_blog">
	<div class="box-heading">
		<span><?php echo $heading_title; ?></span>
		<em class="shapes right"></em>	
		<em class="line"></em>
	</div>
	<div class="box-content" >
		<?php if( !empty($blogs) ) { ?>
		<div class="pavblog-latest row">
			<?php foreach( $blogs as $key => $blog ) { $key = $key + 1;?>
			<div class="col-lg-<?php echo floor(12/$cols);?> col-md-<?php echo floor(12/$cols);?> col-sm-<?php echo floor(12/$cols);?>">
				<div class="blog-item">					
					<div class="blog-body">
						<?php if( $blog['thumb']  )  { ?>
							<div class="image">
								<img src="<?php echo $blog['thumb'];?>" title="<?php echo $blog['title'];?>" alt="<?php echo $blog['title'];?>" class="img-responsive"/>
							</div>
						<?php } ?>

						<div class="create-date pull-left">
							<div class="created">
								<span class="day"><?php echo date("d",strtotime($blog['created']));?></span><hr/>
								<span class="month"><?php echo date("M",strtotime($blog['created']));?></span> 								
							</div>
						</div>
						
						<div class="create-info pull-left">
							<div class="inner">
								<div class="blog-header">
									<h4 class="blog-title">
										<a href="<?php echo $blog['link'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
									</h4>
								</div>
								<div class="description">
									<?php $blog['description'] = strip_tags($blog['description']); ?>
									<?php echo utf8_substr( $blog['description'],0, 76 );?>...
								</div>
							</div>							
						</div>						
						
						<div class="buttons-wrap">
							<a href="<?php echo $blog['link'];?>" class="readmore btn btn-theme-default"><?php echo $this->language->get('text_readmore');?></a>
						</div>

					</div>						
				</div>
			</div>
			<?php if( ( $key%$cols==0 || $key == count($blogs)) ){  ?>

			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>
