<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<div class="container">
<div class="row">

<?php if( $SPAN[0] ): ?>
	<aside class="col-sm-<?php echo $SPAN[0];?>">
		<?php echo $column_left; ?>
	</aside>
<?php endif; ?> 

<section class="col-sm-<?php echo $SPAN[1];?>">     
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/close.png" alt="" class="close" /></div>
	<?php } ?>

	<div id="content">
		<?php echo $content_top; ?> 
		<h1><?php echo $heading_title; ?></h1>
		<?php if ($products) { ?>
		<div class="wishlist-info table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td class="image"><?php echo $column_image; ?></td>
						<td class="name"><?php echo $column_name; ?></td>
						<td class="model"><?php echo $column_model; ?></td>
						<td class="stock"><?php echo $column_stock; ?></td>
						<td class="price"><?php echo $column_price; ?></td>
						<td class="action"><?php echo $column_action; ?></td>
					</tr>
				</thead>
				<?php foreach ($products as $product) { ?>
				<tbody id="wishlist-row<?php echo $product['product_id']; ?>">
					<tr>
						<td class="image">
							<?php if ($product['thumb']) { ?>
							<a href="<?php echo $product['href']; ?>">
								<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" />
							</a>
							<?php } ?>
						</td>
						<td class="name underline"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
						<td class="model"><?php echo $product['model']; ?></td>
						<td class="stock"><?php echo $product['stock']; ?></td>
						<td class="price">
							<?php if ($product['price']) { ?>
							<div class="price">
								<?php if (!$product['special']) { ?>
								<?php echo $product['price']; ?>
								<?php } else { ?>
								<span><?php echo $product['price']; ?></span> 
								<span><?php echo $product['special']; ?></span>
								<?php } ?>
							</div>
							<?php } ?>
						</td>
						<td class="action">
							<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/cart-add.png" alt="<?php echo $button_cart; ?>" title="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" />&nbsp;&nbsp;<a href="<?php echo $product['remove']; ?>"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/remove.png" alt="<?php echo $button_remove; ?>" title="<?php echo $button_remove; ?>" /></a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
		
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } else { ?>
		<div class="content"><div class="wrapper a-center"><?php echo $text_empty; ?></div></div>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } ?>
		<?php echo $content_bottom; ?>
	</div>
</section>

<?php if( $SPAN[2] ): ?>
<aside class="col-sm-<?php echo $SPAN[2];?>">	
	<?php echo $column_right; ?>
</aside>
<?php endif; ?>

</div></div>

<?php echo $footer; ?>