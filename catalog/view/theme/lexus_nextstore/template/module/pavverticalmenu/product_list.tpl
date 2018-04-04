<?php if( isset($widget_name)){
?>
	<h3 class="menu-title widget-product-name"><span><?php echo $widget_name;?></span></h3>
<?php
}?>
<div class="widget-product-list">
	<div class="widget-inner clearfix">
		<?php foreach ($products as $product) { ?>
		<div class="product-block pull-left">
			<div class="w-product">
				<?php if ($product['thumb']) { ?>
				<div class="image">
					<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a>
				</div>
				<?php } ?>

				<div class="product-meta">
					<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
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

					<div class="rating">		
			  			<?php if ($product['rating']) { ?>
							<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" />
						<?php } ?>
					</div>

					<div class="action">
						<div class="cart">	
							<button onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn btn-shopping-cart">
								<span class="fa fa-shopping-cart product-icon hidden-sm hidden-md"></span>
								<span><?php echo $this->language->get("button_cart"); ?></span>
							</button>						
						</div>
						<div class="wishlist">
							<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_wishlist"); ?>" class="fa fa-heart product-icon">
								<?php echo $this->language->get("button_wishlist"); ?>
							</a>	
						</div>
						<div class="compare">			
							<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_compare"); ?>" class="fa fa-exchange product-icon">
								<?php echo $this->language->get("button_compare"); ?>
							</a>	
						</div>
					</div>	
				</div>
			</div>								
		</div>
		<?php } ?>
	</div>
</div>