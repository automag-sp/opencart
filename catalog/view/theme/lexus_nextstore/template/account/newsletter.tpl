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
		<div class="wrapper no-margin">		
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" role="form">
				<div class="content">
					<table class="form">
						<tr>
							<td><?php echo $entry_newsletter; ?></td>
							<td>
								<?php if ($newsletter) { ?>
								<input type="radio" name="newsletter" value="1" checked="checked" />
								<?php echo $text_yes; ?>&nbsp;
								<input type="radio" name="newsletter" value="0" />
								<?php echo $text_no; ?>
								<?php } else { ?>
								<input type="radio" name="newsletter" value="1" />
								<?php echo $text_yes; ?>&nbsp;
								<input type="radio" name="newsletter" value="0" checked="checked" />
								<?php echo $text_no; ?>
								<?php } ?>
							</td>
						</tr>
					</table>
				</div>
				
				<div class="buttons">
					<div class="left"><a href="<?php echo $back; ?>" class="button btn btn-theme-default"><?php echo $button_back; ?></a></div>
					<div class="right"><input type="submit" value="<?php echo $button_continue; ?>" class="button btn btn-theme-default" /></div>
				</div>
			</form>		
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