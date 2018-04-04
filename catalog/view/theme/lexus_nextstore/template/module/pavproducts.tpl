<?php 
/******************************************************
 * @package Pav Product Tabs module for Opencart 1.5.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2012 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

$span = 12/$cols; 
$active = 'latest';
$id = rand(1,9)+rand();	

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



<div class="box pav-categoryproducts no-box">
	<?php if( !empty($module_description) ) { ?>
	<div class="module-desc">
		<?php echo $module_description;?>
	</div>
	<?php } ?>

	<div class="tab-nav">
		<ul class="h-tabs" id="producttabs<?php echo $id;?>">
			<?php foreach( $tabs as $tab => $category ) { 
				if( empty($category) ){ continue;}
				$tab = 'cattabs';
				///	echo '<pre>'.print_r( $category,1 ); die; 
				$products = $category['products'];
				$icon = $this->model_tool_image->resize( $category['image'], 20, 20 ); 
				?>
				<li>
					<a href="#tab-<?php echo $tab.$id.$category['category_id'];?>" data-toggle="tab" class="box-heading">
						<?php if ( $icon ) { ?><img src="<?php echo $icon;?>" alt="<?php echo $category['category_name'];?>" /><?php } ?>
						<span><?php echo $category['category_name'];?></span>
						<em class="shapes right"></em>	
						<em class="line"></em>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>

		<div class="box-content">	
			<div class="tab-content">  
				<?php foreach( $tabs as $tab => $category ) { 
					if( empty($category) ){ continue;}
					$tab = 'boxcats';
					$products = $category['products'];
					$icon = $this->model_tool_image->resize( $category['image'], 45,45 ); 
					?>
					<div class="tab-pane <?php echo $category['class'];?> clearfix" id="tab-cattabs<?php echo $id.$category['category_id'];?>">	
						<?php if( count($products) > $itemsperpage ) { ?>
						<div class="carousel-controls">
							<a class="carousel-control left fa" href="#<?php echo $tab.$id.$category['category_id'];?>" data-slide="prev">
								<em class="fa fa-angle-left"></em>
							</a>
							<a class="carousel-control right" href="#<?php echo $tab.$id.$category['category_id'];?>" data-slide="next">
								<em class="fa fa-angle-right"></em>
							</a>
						</div>
						<?php } ?>
						<div class="pavproducts<?php echo $id;?> slide" id="<?php echo $tab.$id.$category['category_id'];?>">
							<div class="carousel-inner">		
								<?php $pages = array_chunk( $products, $itemsperpage);	 ?>	
								<?php foreach ($pages as  $k => $tproducts ) {   ?>
								<div class="item <?php if($k==0) {?>active<?php } ?>">
									<?php foreach( $tproducts as $i => $product ) { ?>
									<?php if( $i++%$cols == 0 ) { ?>
									<div class="row">
										<?php } ?>
										<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-12 product-cols">
											<div class="product-block">
												<?php if ($product['thumb']) { ?>
													<?php $product_images = $this->model_catalog_product->getProductImages( $product['product_id'] ); ?>
													<div class="image <?php echo isset($product_images[0])?$swapimg:''; ?>">
														<?php if( $product['special'] ) {   ?>	
															<span class="product-label product-label-special">
																<span><?php echo $this->language->get( 'text_sale' ); ?></span>  								
															</span>							
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
													<div class="left">
														<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3> 
														<?php if ($product['price']) { ?>
														<div class="price">
															<?php if (!$product['special']) { ?>
															<?php echo $product['price']; ?>
															<?php } else { ?>
															<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
															<?php } ?>
														</div>
														<?php } ?>	
													</div>
													<div class="right">
														<div class="rating">		
															<?php if ($product['rating']) { ?>
															<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" />
															<?php } ?>
														</div>
														<p class="description"><?php echo utf8_substr( strip_tags($product['description']),0,60);?>...</p>
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
					<?php } // endforeach of tabs ?>	
				</div>
			</div>
		</div>


		<script type="text/javascript">
			$(function () {
				$('.pavproducts<?php echo $id;?>').carousel({interval:99999999999999,auto:false,pause:'hover'});
				$('#producttabs<?php echo $id;?> a:first').tab('show');
			});
		</script>
