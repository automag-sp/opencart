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
			<div class="login-description">
				<?php echo $text_description; ?>
			</div>
			<div class="login-content">
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-xs-12">
						<h2><?php echo $text_new_affiliate; ?></h2>
						<div class="content">
							<?php echo $text_register_account; ?> 
							<p><a href="<?php echo $register; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></p>						
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-xs-12">
						<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" role="form">
							<h2><?php echo $text_returning_affiliate; ?></h2>
							<div class="content underline">
								<p><strong><?php echo $text_i_am_returning_affiliate; ?></strong></p>	
								<div class="form-group">
									<label class="control-label"><?php echo $entry_email; ?></label>
									<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" />
								</div>								
								<div class="form-group">
									<label class="control-label"><?php echo $entry_password; ?></label>
									<input type="password" class="form-control" name="password" value="<?php echo $password; ?>" />
									<br/>
									<a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a>
								</div>
								<input type="submit" value="<?php echo $button_login; ?>" class="button btn btn-theme-default" />
								<?php if ($redirect) { ?>
								<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
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