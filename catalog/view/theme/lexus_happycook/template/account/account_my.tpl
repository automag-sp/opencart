<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
<?php echo $header; ?>


<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>  

<div id="group-content">

<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
	<?php echo $column_left; ?>
	</aside>
<?php endif; ?>

		<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12"> 
			<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
		<?php } ?>
		    
			<div id="content"><?php echo $content_top; ?>
			  
			  <h1><?php echo $heading_title; ?></h1>

			  <h2><?php echo $text_my_account; ?></h2>
              <div class="saleepc">
              
                <div class="icon">
                    <a href="<?php echo $edit; ?>" title="<?php echo $text_edit; ?>"><span class="fa fa-user fa-3"></span><?php echo $text_edit; ?></a>
                </div>
                <div class="icon">
                    <a href="<?php echo $password; ?>" title="<?php echo $text_password; ?>"><span class="fa fa-key fa-3"></span><?php echo $text_password; ?></a>
                </div>
                <div class="icon">
                    <a href="<?php echo $wishlist; ?>" title="<?php echo $text_wishlist; ?>"><span class="fa fa-bookmark fa-3"></span><?php echo $text_wishlist; ?></a>
                </div>
              </div>
    			  
    			  
    			  
			  <h2><?php echo $text_my_orders; ?></h2>
			  <div class="saleepc">
                <div class="icon">
                    <a href="<?php echo $order; ?>" title="<?php echo $text_order; ?>"><span class="fa fa-calendar-check-o fa-3"></span><?php echo $text_order; ?></a>
                </div>
                <div class="icon">
                    <a href="<?php echo $return; ?>" title="<?php echo $text_return; ?>"><span class="fa fa-undo fa-3"></span><?php echo $text_return; ?></a>
                </div>
                <div class="icon">
                    <a href="<?php echo $transaction; ?>" title="<?php echo $text_transaction; ?>"><span class="fa fa-credit-card-alt fa-3"></span><?php echo $text_transaction; ?></a>
                </div>
			  </div>
			  
			  <h2><?php echo $text_my_newsletter; ?></h2>
			  <div class="saleepc">
                <div class="icon">
                    <a href="<?php echo $newsletter; ?>" title="<?php echo $text_newsletter; ?>"><span class="fa fa-at fa-3"></span><?php echo $text_newsletter; ?></a>
                </div>
			  </div>
		</div>  
  <?php echo $content_bottom; ?></section>
 
	<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-sm-<?php echo $SPAN[2];?> col-xs-12">	
		<?php  echo $column_right; ?>
	</aside>
	<?php endif; ?>
</div>
	
<?php echo $footer; ?> 