<?php 
	$span = 12/$cols; 
?>

<div class="box pav-block bloglatest hidden-xs">
	<div class="box-heading"><span><?php echo $heading_title; ?></span></div>
	<?php if( trim($message) ) { ?>
				<div class="box-description"><?php echo $message;?></div>
				<?php } ?>
		<?php if( !empty($blogs) ) { ?>
		<div class="pavblog-latest clearfix">
			<?php foreach( $blogs as $key => $blog ) { ?>
			<?php if( $key++%$cols == 0 ) { ?>
			<div class="row">
			<?php } ?>
				<div class="col-lg-<?php echo $span;?> pavblock">
					<div class="blog-item">					
						<div class="blog-body clearfix">
							
							<div class="image clearfix">
								<?php if( $blog['thumb']  )  { ?>
									<img src="<?php echo $blog['thumb'];?>" alt="<?php echo $blog['title'];?>">
								<?php } ?>
							</div>
							<div class="group-blog">
								<div class="blog-title">
									<a href="<?php echo $blog['link'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
								</div>
								<span class="comment_count"><span><?php echo $this->language->get("text_comment_count");?></span> <?php echo $blog['comment_count'];?></span>
								<div class="description">
										<?php $blog['description'] = strip_tags($blog['description']); ?>
									<?php echo utf8_substr( $blog['description'],0, 70 );?>...
								</div>

								<p>
									<a href="<?php echo $blog['link'];?>" class="readmore"><?php echo $this->language->get('text_readmore');?></a>
								</p>
							</div>
							
						</div>	
					</div>
				</div>
			<?php if( ( $key%$cols==0 || $key == count($blogs)) ){  ?>			
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>

