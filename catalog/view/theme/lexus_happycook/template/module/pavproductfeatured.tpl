<?php 
	$span = 12/$cols; 
	$active = 'latest';
	$id = rand(1,time()+9);	
	$bspan = 12-$block_width;
	$themeConfig = $this->config->get('themecontrol');
	$categoryConfig = array(
		'category_pzoom'                     => 1,
		'quickview'                          => 1,
		'show_swap_image'                    => 0,
	);
	$categoryConfig     = array_merge($categoryConfig, $themeConfig );
	$categoryPzoom 	    = $categoryConfig['category_pzoom'];
	$quickview          = $categoryConfig['quickview'];
	$swapimg            = $categoryConfig['show_swap_image'];
?>
<div class="box featured <?php echo $addition_class;?>">
	<div class="box-heading"><span><?php echo $heading_title; ?></span></div>
	<div class="box-content" >
 		<div class="box-products slide row-fluid" id="productfeatured<?php echo $id;?>">
 			<div class="span<?php echo $bspan;?> featured-banner">
 				<?php if ( $banner ) { ?>
				<img src="image/<?php echo $banner; ?>">
 				<?php } ?>
				<?php if( trim($message) ) { ?>
				<div class="box-description"><?php echo $message;?></div>
				<?php } ?>
			</div>
			<div class="span<?php echo $block_width;?> featured-products">
						<?php if( count($products) > $itemsperpage ) { ?>
						<div class="carousel-controls">
						<a class="carousel-control left" href="#productfeatured<?php echo $id;?>"   data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#productfeatured<?php echo $id;?>"  data-slide="next">&rsaquo;</a>
						</div>
						<?php } ?>
						<div class="carousel-inner ">		
						 <?php 
							$pages = array_chunk( $products, $itemsperpage);
						//	echo '<pre>'.print_r( $pages, 1 ); die;
						 ?>	
						  <?php foreach ($pages as  $k => $tproducts ) {   ?>
								<div class="item <?php if($k==0) {?>active<?php } ?>">
									<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
										<?php if( $i%$cols == 1 ) { ?>
										  <div class="row box-product">
										<?php } ?>
											  <div class="pavcol-sm-<?php echo $cols;?> col-xs-12 col-sm-4">
											  	<div class="product-block">
												<?php if ($product['thumb']) { ?>
												<div class="image">
												<?php if( $product['special'] ) {   ?>
												<div class="product-label-special label"><?php echo $this->language->get( 'text_sale' ); ?></div>
											<?php } ?>
												<a class="img" href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a>
												<div class="compare-wishlish">
												 <div class="wishlist"><a class="fa fa-heart" onclick="addToWishList('<?php echo $product['product_id']; ?>');"  data-toggle="tooltip" title="<?php echo $this->language->get("button_wishlist"); ?>" ></a></div>
											      <div class="compare"><a class="fa fa-retweet"  onclick="addToCompare('<?php echo $product['product_id']; ?>');" data-toggle="tooltip" title="<?php echo $this->language->get("button_compare"); ?>" ></a></div>
										    	</div>
											<?php //#2 Start fix quickview in fw?>
									<?php if ($quickview) { ?>
									<div class="product-quickview hidden-xs hidden-sm">
											<a class="pav-colorbox" href="<?php echo $this->url->link("themecontrol/product",'product_id='.$product['product_id'] );?>"><?php echo $this->language->get('quick_view'); ?></a>
												</div>
												<?php } ?>
								<?php //#2 End fix quickview in fw?>
					      	    <?php 
						  			if( $swapimg ){
						      		$product_images = $this->model_catalog_product->getProductImages( $product['product_id'] );
									if(isset($product_images) && !empty($product_images)) {
										$thumb2 = $this->model_tool_image->resize($product_images[0]['image'],  $this->config->get('config_image_product_width'),  $this->config->get('config_image_product_height') );
									?>	
									<a class="hover-image" href="<?php echo $product['href']; ?>"><img src="<?php echo $thumb2; ?>" alt="<?php echo $product['name']; ?>"></a>
								<?php } } ?>
									      </div>
											<?php } ?>
												<div class="product-meta">
												<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
												<div class="description">
													<?php echo utf8_substr( strip_tags($product['description']),0,58);?>...
												</div>
												<?php if ($product['rating']) { ?>
											      <div class="rating"><img alt="<?php echo $product['rating']; ?>" src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" />
											      </div>
											      <?php } else { ?>
											      <div class="norating"><img alt="0" src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-0.png"></div>
											      <?php } ?>
												<?php if ($product['price']) { ?>
												<div class="price">
												  <?php if (!$product['special']) { ?>
												  <?php echo $product['price']; ?>
												  <?php } else { ?>
												  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
												  <?php } ?>
												</div>
												<?php } ?>
												<div class="cart"><span class="fa fa-shopping-cart"></span><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
												</div>
											  </div></div>
									  
									  <?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?>
										 </div>
										<?php } ?>
									<?php } //endforeach; ?>
								</div>
						  <?php } ?>
						</div> 
				</div> 
		</div>
 </div> </div>


<script>
 
$('#productfeatured<?php echo $id;?>').carousel({interval:false,auto:false,pause:'hover'});
</script>
<script type="text/javascript"><!--
$(document).ready(function() {
    $('.pav-colorbox').colorbox({
        width: '900px', 
        height: '650px',
        overlayClose: true,
        opacity: 0.5,
        iframe: true, 
    });
});
//--></script> 