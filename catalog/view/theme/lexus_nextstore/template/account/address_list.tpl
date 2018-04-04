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
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>

	<div id="content">
		<?php echo $content_top; ?>
		<h1><?php echo $heading_title; ?></h1>
	
		<div class="wrapper">
			<h2 class="no-margin-top"><?php echo $text_address_book; ?></h2>
			<?php foreach ($addresses as $result) { ?>
			<div class="content table-responsive">
				<table style="width:100%;">
					<tr>
						<td>
							<?php echo $result['address']; ?>
						</td>
						<td style="text-align: right;">
							<a href="<?php echo $result['update']; ?>" class="button btn btn-theme-default"><?php echo $button_edit; ?></a> 
							&nbsp; <a href="<?php echo $result['delete']; ?>" class="button btn btn-theme-default"><?php echo $button_delete; ?></a>
						</td>
					</tr>
				</table>
			</div>
			<?php } ?>
		</div>	
		
		<div class="buttons">
			<div class="left"><a href="<?php echo $back; ?>" class="button btn btn-theme-default"><?php echo $button_back; ?></a></div>
			<div class="right"><a href="<?php echo $insert; ?>" class="button btn btn-theme-default"><?php echo $button_new_address; ?></a></div>
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