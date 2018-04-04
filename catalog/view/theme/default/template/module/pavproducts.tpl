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
?>
<div class="box pav-category-products">
<?php if( !empty($module_description) ) { ?>
 <div class="module-desc">
	<?php echo $module_description;?>
 </div>
 <?php } ?>
  

	<div class="box-content">
		<?php foreach( $tabs as $tab => $category ) { 
				if( empty($category) ){ continue;}
				$tab = 'boxcats';
				$id = $category['category_id'].rand();	
				$products = $category['products'];
				$icon = $this->model_tool_image->resize( $category['image'], 45,45 ); 
		?>
		<div class="cat-products-block <?php echo $category['class'];?> clearfix">	
			<div class="block-head">
				<h3><?php echo $category['category_name'];?></h3>
			</div>	
			<div class="block-content">
				<div class="box-products  pavproducts<?php echo $id; ?> slide" id="tab-<?php echo $tab.$id;?>">
					<?php if( count($products) > $itemsperpage ) { ?>
					<div class="carousel-controls">
					<a class="carousel-control left" href="#tab-<?php echo $tab.$id;?>"   data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#tab-<?php echo $tab.$id;?>"  data-slide="next">&rsaquo;</a>
					</div>
					<?php } ?>
					<div class="carousel-inner ">		
					 <?php $pages = array_chunk( $products, $itemsperpage);	 ?>	
					  <?php foreach ($pages as  $k => $tproducts ) {   ?>
							<div class="item <?php if($k==0) {?>active<?php } ?>">
								<?php foreach( $tproducts as $i => $product ) { ?>
									<?php if( $i++%$cols == 0 ) { ?>
									  <div class="row-fluid box-product">
									<?php } ?>
										  <div class="span<?php echo $span;?> product-block"><div class="product-inner">
											<?php if ($product['thumb']) { ?>
											<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
											<?php } ?>
											<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
											<div class="description">
												<?php echo utf8_substr( strip_tags($product['description']),0,58);?>...
											</div>
											<?php if ($product['price']) { ?>
											<div class="price">
											  <?php if (!$product['special']) { ?>
											  <?php echo $product['price']; ?>
											  <?php } else { ?>
											  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
											  <?php } ?>
											</div>
											<?php } ?>
											<?php if ($product['rating']) { ?>
											<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
											<?php } ?>
											<div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
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
		</div>		
		<?php } // endforeach of tabs ?>	
	</div>
</div>


<script type="text/javascript">
$(function () {
 $('.pavproducts<?php echo $id;?>').carousel({interval:99999999999999,auto:false,pause:'hover'});
</script>
