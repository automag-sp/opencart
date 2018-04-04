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
		<h1><?php echo $heading_title; ?></h1>
		
		<?php if ($orders) { ?>
			<?php foreach ($orders as $order) { ?>
			<div class="order-list wrapper">
				<div class="order-id">
					<b><?php echo $text_order_id; ?></b> 
					#<?php echo $order['order_id']; ?>
				</div>
				<div class="order-status">
					<b><?php echo $text_status; ?></b> 
					<?php echo $order['status']; ?>
				</div>
				<div class="order-content row">
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="list-content">
							<b><?php echo $text_date_added; ?></b> 
							<?php echo $order['date_added']; ?><br />
							<b><?php echo $text_products; ?></b> 
							<?php echo $order['products']; ?>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="list-content">
							<b><?php echo $text_customer; ?></b> 
							<?php echo $order['name']; ?><br />
							<b><?php echo $text_total; ?></b> 
							<?php echo $order['total']; ?>
						</div>	
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12">
						<div class="list-content">
							<a href="<?php echo $order['href']; ?>"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/info.png" alt="<?php echo $button_view; ?>" title="<?php echo $button_view; ?>" /></a>&nbsp;&nbsp;<a href="<?php echo $order['reorder']; ?>"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/reorder.png" alt="<?php echo $button_reorder; ?>" title="<?php echo $button_reorder; ?>" /></a>
						</div>		
					</div>				
				</div>
			</div>
			<?php } ?>
			<div class="pagination paging clearfix"><?php echo $pagination; ?></div>
			<?php } else { ?>
				<div class="content"><div class="wrapper"><?php echo $text_empty; ?></div></div>
			<?php } ?>
			<div class="buttons">
				<div class="right"><a href="<?php echo $continue; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></div>
			</div>
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