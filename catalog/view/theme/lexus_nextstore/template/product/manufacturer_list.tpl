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
			<div id="content" class="underline">
				<?php echo $content_top; ?>
				<h1><?php echo $heading_title; ?></h1>				
				<?php if ($categories) { ?>
				<p>
					<b><?php echo $text_index; ?></b>
					<?php foreach ($categories as $category) { ?>
					&nbsp;&nbsp;&nbsp;
					<a href="index.php?route=product/manufacturer#<?php echo $category['name']; ?>">
						<b><?php echo $category['name']; ?></b>
					</a>
					<?php } ?>
				</p>
				
				<?php foreach ($categories as $category) { ?>
				<div class="manufacturer-list wrapper">
					<div class="manufacturer-heading"><?php echo $category['name']; ?><a id="<?php echo $category['name']; ?>"></a></div>
					<div class="manufacturer-content">
						<?php if ($category['manufacturer']) { ?>
							<?php for ($i = 0; $i < count($category['manufacturer']);) { ?>
							<ul class="list-manufacturer">
								<?php $j = $i + ceil(count($category['manufacturer']) / 4); ?>
								<?php for (; $i < $j; $i++) { ?>
								<?php if (isset($category['manufacturer'][$i])) { ?>
								<li><a href="<?php echo $category['manufacturer'][$i]['href']; ?>"><?php echo $category['manufacturer'][$i]['name']; ?></a></li>
								<?php } ?>
								<?php } ?>
							</ul>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			
				<?php } else { ?>
				<div class="content"><div class="wrapper"><?php echo $text_empty; ?></div></div>
				<div class="buttons">
					<div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
				</div>
				<?php } ?>
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