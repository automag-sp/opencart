<?php 
$span = 12/$cols; 
$active = 'latest';
$id = rand(1,9);	

$themeConfig 			= $this->config->get('themecontrol');
$categoryConfig 		= array( 		
	'category_pzoom' 	=> 1,
	'show_swap_image' 	=> 0,
	'quickview' 		=> 0,
); 
$categoryConfig 		= array_merge($categoryConfig, $themeConfig );
$categoryPzoom 	    	= $categoryConfig['category_pzoom'];
$quickview 				= $categoryConfig['quickview'];
$swapimg 				= ($categoryConfig['show_swap_image'])?'swap':'';
?>

<div id="productdeals" class="<?php echo $prefix;?>box productdeals no-box black">
	<div class="box-heading">
		<span><?php echo $heading_title; ?></span>
		<em class="shapes right"></em>	
		<em class="line"></em>
	</div>
	<div class="box-content">
		<div class="box-products slide" id="pavdeals<?php echo $id;?>">
			<?php if( trim($message) ) { ?>
			<div class="box-description wrapper"><?php echo $message;?></div>
			<?php } ?>
			<?php if( count($products) > $itemsperpage ) { ?>
			<div class="carousel-controls">
				<a class="carousel-control left" href="#pavdeals<?php echo $id;?>" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control right" href="#pavdeals<?php echo $id;?>" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
			<?php } ?>
			<div class="carousel-inner">	
				<?php
					$pages = array_chunk( $products, $itemsperpage);
				?>			
				<?php foreach ($pages as  $k => $tproducts ) {   ?>
				<div class="item <?php if($k==0) {?>active<?php } ?>">
					<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
					<?php if( $i%$cols == 1 || $cols == 1) { ?>
					<div class="row product-items">
						<?php } ?>
						<div class="col-lg-<?php echo $span;?> col-sm-<?php echo $span;?> col-md-<?php echo $span;?> col-xs-12 product-cols">
							<div class="product-block">
								
								<?php if ($product['thumb']) { ?>
								<div class="image <?php echo $swapimg; ?>">
									<?php if( $product['special'] ) {   ?>	
										<div class="product-label product-label-special">
											<div class="datas">
												<span><?php echo $this->language->get( 'text_save' ); ?></span>  								
												<span><?php echo $product['saleoff']; ?></span>
											</div>
										</div>							
									<?php } ?>

									<?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
										<a href="<?php echo $zimage;?>" class="info-view colorbox product-zoom" rel="colorbox" title="<?php echo $product['name']; ?>"><i class="fa fa-search-plus"></i></a>
									<?php } ?>

									
									<!-- Swap image -->
									<div class="flip">
										<a href="<?php echo $product['href']; ?>" class="swap-image">
											<img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" class="front" />
											<?php 
											if( $categoryConfig['show_swap_image'] ){
												$product_images = $this->model_catalog_product->getProductImages( $product['product_id'] );
												if(isset($product_images) && !empty($product_images)) {
													$thumb2 = $this->model_tool_image->resize($product_images[0]['image'],  $this->config->get('config_image_product_width'),  $this->config->get('config_image_product_height') );
												?>	
												<img src="<?php echo $thumb2; ?>" alt="<?php echo $product['name']; ?>" class="back" />
											<?php } } ?>								
										</a>
									</div>



									<?php //#2 Start fix quickview in fw?>
										<?php if ($quickview) { ?>
											<a class="pav-colorbox btn btn-theme-default" href="<?php echo $this->url->link("themecontrol/product",'product_id='.$product['product_id'] );?>"><em class="fa fa-plus"></em><span><?php echo $this->language->get('quick_view'); ?></span></a>
										<?php } ?>
									<?php //#2 End fix quickview in fw?>							

								</div>
								<?php } ?>

								<div class="product-meta">
									<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
									<?php if ($product['rating']) { ?>
									<div class="rating">
										<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" />
									</div>
									<?php } ?>				
									<?php if ($product['price']) { ?>
									<div class="price">
										<?php if (!$product['special']) { ?>
										<?php echo $product['price']; ?>
										<?php } else { ?>
										<span class="price-old"><?php echo $product['price']; ?></span> 
										<span class="price-new"><?php echo $product['special']; ?></span>
										<?php } ?>
									</div>									
									<?php } ?>														
								</div>

								<div id="item<?php echo $module; ?>countdown_<?php echo $product['product_id']; ?>" class="deal item-countdown clearfix"></div>

								<div class="deal-collection">
									<div class="deal deal_detail is-hidden">
										<ul>
											<li>
												<span><?php echo $this->language->get("text_discount");?></span>
												<span class="deal_detail_num"><?php echo $product['deal_discount'];?>%</span>
											</li>
											<li>
												<span><?php echo $this->language->get("text_you_save");?></span>
												<span class="deal_detail_num"><span class="price"><?php echo $product["save_price"]; ?></span></span>
											</li>
											<li>
												<span><?php echo $this->language->get("text_bought");?></span>
												<span class="deal_detail_num"><?php echo $product['bought'];?></span>
											</li>
										</ul>
									</div>
									<div class="deal deal-qty-box is-hidden">
										<?php echo sprintf($this->language->get("text_quantity_deal"), $product["quantity"]);?>
									</div>
									<div class="deal item-detail is-hidden">
										<div class="timer-explain">(<?php echo date($this->language->get("date_format_short"), strtotime($product['date_end_string'])); ?>)</div>	
									</div>	
									<script type="text/javascript">
									jQuery(document).ready(function($){
										$("#item<?php echo $module; ?>countdown_<?php echo $product['product_id']; ?>").lofCountDown({
											formatStyle:2,
											TargetDate:"<?php echo date('m/d/Y G:i:s', strtotime($product['date_end_string'])); ?>",
											DisplayFormat:"<ul><li>%%D%% <div><?php echo $this->language->get("text_days");?></div></li><li> %%H%% <div><?php echo $this->language->get("text_hours");?></div></li><li> %%M%% <div><?php echo $this->language->get("text_minutes");?></div></li><li> %%S%% <div><?php echo $this->language->get("text_seconds");?></div></li></ul>",
											FinishMessage: "<?php echo $this->language->get('text_finish');?>"
										});
									});
									</script>
								</div>									
									
								<div class="action">							
									<div class="cart">						
		        						<!-- <input type="button" value="<?php //echo $button_cart; ?>" onclick="addToCart('<?php //echo $product['product_id']; ?>');" class="product-icon fa fa-shopping-cart shopping-cart" /> -->
										<button onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn btn-shopping-cart">
											<span class="fa fa-shopping-cart product-icon hidden-sm hidden-md">&nbsp;</span>
											<span><?php echo $button_cart; ?></span>
										</button>
		      						</div>
									<div class="button-group">
										<div class="wishlist">
											<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_wishlist"); ?>" class="fa fa-heart product-icon">
												<?php // echo $this->language->get("button_wishlist"); ?>
											</a>	
										</div>
										<div class="compare">			
											<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_compare"); ?>" class="fa fa-refresh product-icon">
												<?php // echo $this->language->get("button_compare"); ?>
											</a>	
										</div>
									</div>							
								</div>								
							</div>
						</div>

						<?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?>
					</div>
					<?php } ?>

					<?php } //endforeach; ?>
				</div>
				<?php } ?>				
			</div>  
		</div>
	</div> 
</div>


<script type="text/javascript">
$('#pavdeals<?php echo $id;?>').carousel({interval:<?php echo ( $auto_play_mode?$interval:'false') ;?>,auto:<?php echo $auto_play;?>,pause:'hover'});
</script>