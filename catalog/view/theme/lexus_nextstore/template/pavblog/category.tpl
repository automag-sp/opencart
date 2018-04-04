<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>
<div class="container">
<div class="row">
	<?php if( $SPAN[0] ): ?>
		<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
			<?php echo $column_left; ?>
		</aside>	
	<?php endif; ?> 
	<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">
		<div id="content">
			<?php echo $content_top; ?>
			<header class="pav-header">
				<h1><?php echo $heading_title; ?></h1>
				<a class="rss-wrapper" href="<?php echo $category_rss;?>"><span class="fa fa-feed"></span></a>	
			</header>  
			<section class="pav-category wrapper blog-wrapper">
				<?php if( !empty($children) ) { ?>
				<div class="pav-children no-margin">
					<h3><?php echo $this->language->get('text_children');?></h3>
					<div class="children-wrap row">				
						<?php 
						$cols = (int)$config->get('children_columns');
						foreach( $children as $key => $sub )  { $key = $key + 1;?>
							<div class="col-lg-<?php echo floor(12/$cols);?> col-sm-<?php echo floor(12/$cols);?> col-xs-12">
								<div class="children-inner">
									<h4><a href="<?php echo $sub['link']; ?>" title="<?php echo $sub['title']; ?>"><?php echo $sub['title']; ?> (<?php echo $sub['count_blogs']; ?>)</a></h4>
									<?php if( $sub['thumb'] ) { ?>
										<div class="image">
											<img src="<?php echo $sub['thumb'];?>"  alt="<?php echo $sub['title']; ?>" class="img-responsive" />
										</div>
									<?php } ?>
									<div class="sub-description">
										<?php echo $sub['description']; ?>
									</div>
								</div>
							</div>
							<?php if( ( $key%$cols==0 || $cols == count($leading_blogs)) ){ ?>
								
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			
				<div class="pav-blogs">
					<?php
					$cols = $config->get('cat_columns_leading_blog');
					if( count($leading_blogs) ) { ?>
						<div class="leading-blogs row">
							<?php foreach( $leading_blogs as $key => $blog ) { $key = $key + 1;?>
							<div class="col-lg-<?php echo floor(12/$cols);?> col-sm-<?php echo floor(12/$cols);?> col-xs-12">
							<?php require( '_item.tpl' ); ?>
							</div>
							<?php if( ( $key%$cols==0 || $cols == count($leading_blogs)) ){ ?>
								
							<?php } ?>
							<?php } ?>
						</div>
					<?php } ?>

					<?php
						$cols = $config->get('cat_columns_secondary_blogs');
						if ( count($secondary_blogs) ) { ?>
						<div class="secondary row">						
							<?php foreach( $secondary_blogs as $key => $blog ) {  $key = $key+1; ?>
							<div class="col-lg-<?php echo floor(12/$cols);?> col-sm-<?php echo floor(12/$cols);?> col-xs-12">
							<?php require( '_item.tpl' ); ?>
							</div>
							<?php if( ( $key%$cols==0 || $cols == count($leading_blogs)) ){ ?>
								
							<?php } ?>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if( $total ) { ?>	
					<div class="pav-pagination clearfix"><?php echo $pagination;?></div>
					<?php } ?>
				</div>
			</section>			
			<?php echo $content_bottom; ?> 
		</div>
	</section>
	
	<?php if( $SPAN[2] ): ?>
		<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
			<?php echo $column_right; ?>
		</aside>
	<?php endif; ?>	
	
 </div></div> 
 
<?php echo $footer; ?>