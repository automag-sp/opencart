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
		
		<?php foreach ($downloads as $download) { ?>
			<div class="download-list">
				<div class="download-id"><b><?php echo $text_order; ?></b> <?php echo $download['order_id']; ?></div>
				<div class="download-status"><b><?php echo $text_size; ?></b> <?php echo $download['size']; ?></div>
				<div class="download-content">
					<div class="row">				
						<div class="col-lg-4 col-sm-4 col-xs-12">
							<div class="list-content">
								<b><?php echo $text_name; ?></b> 
								<?php echo $download['name']; ?><br />							
								<b><?php echo $text_date_added; ?></b> 
								<?php echo $download['date_added']; ?>
							</div>
						</div>
						
						<div class="col-lg-4 col-sm-4 col-xs-12">
							<div class="list-content">
								<b><?php echo $text_remaining; ?></b> 
								<?php echo $download['remaining']; ?>
							</div>
						</div>
						
						<div class="download-info col-lg-4 col-sm-4 col-xs-12">
							<?php if ($download['remaining'] > 0) { ?>
								<div class="list-content">
									<a href="<?php echo $download['href']; ?>"><img src="catalog/view/theme/default/image/download.png" alt="<?php echo $button_download; ?>" title="<?php echo $button_download; ?>" /></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="pagination paging clearfix"><?php echo $pagination; ?></div>
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