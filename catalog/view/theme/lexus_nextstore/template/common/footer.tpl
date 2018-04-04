<?php 
	/******************************************************
	 * @package Pav Megamenu module for Opencart 1.5.x
	 * @version 1.1
	 * @author http://www.pavothemes.com
	 * @copyright	Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
	 * @license		GNU General Public License version 2
	*******************************************************/

	require_once( DIR_TEMPLATE.$this->config->get('config_template')."/development/libs/framework.php" );
	$themeConfig = (array)$this->config->get('themecontrol');
	$themeName =  $this->config->get('config_template');
	$helper = ThemeControlHelper::getInstance( $this->registry, $themeName );
	$LANGUAGE_ID = $this->config->get( 'config_language_id' );  
?>
</section>





<?php
/**
 * Promotion modules
 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
 */
$modules = $helper->getModulesByPosition( 'promotion' ); 
$ospans = array(1=>6,2=>6);

if( count($modules) ){
$cols = isset($config['block_promotion'])&& $config['block_promotion']?(int)$config['block_promotion']:count($modules);	
$class = $helper->calculateSpans( $ospans, $cols );
?>
<section class="pav-promotion" id="pav-promotion">
	<div class="container">
		<?php $j=1;foreach ($modules as $i =>  $module) {?>
		<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>	
		<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
		<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
		<?php  $j++;  } ?>
	</div>	
</section>
<?php } ?>





<?php
	/**
	 * Footer Top Position
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'mass_bottom' ); 
	$ospans = array();
	$cols   = 1;
	if( count($modules) ) { 
?>
<section id="pav-mass-bottom">
	<div class="container">
		<?php $j=1;foreach ($modules as $i =>  $module) {   ?>
			<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>	
			<div class="col-lg-<?php echo floor(12/$cols);?> col-sm-<?php echo floor(12/$cols);?> col-xs-12"><?php echo $module; ?></div>
			<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
		<?php  $j++;  } ?>
	</div>	
</section>
<?php } ?>




<footer id="footer">
	<?php
	/**
	 * Footer Top Position
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'footer_top' ); 
	$ospans = array();
	
	if( count($modules) ){
	$cols = isset($themeConfig['block_footer_top'])&& $themeConfig['block_footer_top']?(int)$themeConfig['block_footer_top']:count($modules);
	//if( $cols < count($modules) ){ $cols = count($modules); }
	$class = $helper->calculateSpans( $ospans, $cols );
	?>
	<div class="footer-top">			
		<div class="container">
			<div class="custom">
				<?php $j=1;foreach ($modules as $i =>  $module) {   ?>
					<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>	
					<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
					<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
				<?php  $j++;  } ?>
			</div>
		</div>		
	</div>
	<?php } ?>
	<?php
	/**
	 * Footer Center Position
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'footer_center' ); 
	$ospans = array(1=>3,2=>2,3=>2,4=>2,5=>3);
	
	if( count($modules) ){
	$cols = isset($themeConfig['block_footer_center'])&& $themeConfig['block_footer_center']?(int)$themeConfig['block_footer_center']:count($modules);
	$class = $helper->calculateSpans( $ospans, $cols );
	?>
	<div class="footer-center">
		<div class="container">
		<?php $j=1;foreach ($modules as $i =>  $module) {  ?>
				<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>	
				<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
				<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
		<?php  $j++;  } ?>	
		</div>
	</div>
<?php } elseif((isset($themeConfig['enable_footer_center'])&&$themeConfig['enable_footer_center'])) { ?>
<div class="footer-center">
		<div class="container">
			<div class="row">			
			<?php if( isset($themeConfig['widget_about_data'][$LANGUAGE_ID]) ) {

			?>
			<div class="column col-xs-12 col-sm-12 col-lg-3 col-md-3">
				<div class="box about-us">					
					<div class="box-content">
						<?php echo html_entity_decode( $themeConfig['widget_about_data'][$LANGUAGE_ID], ENT_QUOTES, 'UTF-8' ); ?>
					</div>
				</div>
			</div>
			<?php } ?>	
		
			<?php if ($informations) { ?>
			<div class="column col-xs-12 col-sm-6 col-lg-2 col-md-2">
				<div class="box info">
					<div class="box-heading"><span><i class="fa fa-caret-right"></i><?php echo $text_information; ?></span></div>
					<div class="box-content">
						<ul class="list">
						  <?php foreach ($informations as $information) { ?>
						  <li><a href="<?php echo $information['href']; ?>"><i class="fa fa-caret-right"></i><?php echo $information['title']; ?></a></li>
						  <?php } ?>
						</ul>
					</div>					
				</div>
			</div>
			<?php } ?>				
		  
			<div class="column col-xs-12 col-sm-6 col-lg-2 col-md-2">
				<div class="box extra">
					<div class="box-heading"><span><i class="fa fa-caret-right"></i><?php echo $text_extra; ?></span></div>
					<div class="box-content">
						<ul class="list">							
							<li><a href="<?php echo $manufacturer; ?>"><i class="fa fa-caret-right"></i><?php echo $text_manufacturer; ?></a></li>
							<li><a href="<?php echo $voucher; ?>"><i class="fa fa-caret-right"></i><?php echo $text_voucher; ?></a></li>
							<li><a href="<?php echo $affiliate; ?>"><i class="fa fa-caret-right"></i><?php echo $text_affiliate; ?></a></li>
							<li><a href="<?php echo $special; ?>"><i class="fa fa-caret-right"></i><?php echo $text_special; ?></a></li>
						</ul>
					</div>			
				</div>
			</div>

			<div class="column col-xs-12 col-sm-6 col-lg-2 col-md-2">
				<div class="box">
					<div class="box-heading"><span><i class="fa fa-caret-right"></i><?php echo $text_account; ?></span></div>
					<div class="box-content">
						<ul class="list">						  
							<li><a href="<?php echo $account; ?>"><i class="fa fa-caret-right"></i><?php echo $text_account; ?></a></li>
							<li><a href="<?php echo $order; ?>"><i class="fa fa-caret-right"></i><?php echo $text_order; ?></a></li>
							<li><a href="<?php echo $wishlist; ?>"><i class="fa fa-caret-right"></i><?php echo $text_wishlist; ?></a></li>
							<li><a href="<?php echo $newsletter; ?>"><i class="fa fa-caret-right"></i><?php echo $text_newsletter; ?></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="column col-xs-12 col-sm-6 col-lg-3 col-md-3">
				<div class="box customer-service">
					<div class="box-heading"><span><i class="fa fa-caret-right"></i><?php echo $text_service; ?></span></div>
					<div class="box-content">
						<ul class="list">						  
							<li><a href="<?php echo $contact; ?>"><i class="fa fa-caret-right"></i><?php echo $text_contact; ?></a></li>
							<li><a href="<?php echo $return; ?>"><i class="fa fa-caret-right"></i><?php echo $text_return; ?></a></li>
							<li><a href="<?php echo $sitemap; ?>"><i class="fa fa-caret-right"></i><?php echo $text_sitemap; ?></a></li>
						</ul>
					</div>	
				</div>
			</div>
		 </div> 
	</div></div>
<?php  } ?>	


<?php
/**
 * Footer Bottom
 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
 */
$modules = $helper->getModulesByPosition( 'footer_bottom' ); 
$ospans = array();

if( count($modules) ){
$cols = isset($themeConfig['block_footer_bottom'])&& $themeConfig['block_footer_bottom']?(int)$themeConfig['block_footer_bottom']:count($modules);	
$class = $helper->calculateSpans( $ospans, $cols );
?>
<div class="footer-bottom">
	<?php $j=1;foreach ($modules as $i =>  $module) {  ?>
	<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>	
	<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
	<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
	<?php  $j++;  } ?>	
</div>
<?php } ?>
	

<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<div id="powered"><div class="container"><div class="copyright">
<?php if( isset($themeConfig['enable_custom_copyright']) && $themeConfig['enable_custom_copyright'] ) { ?>
	<?php echo $themeConfig['copyright'];?>
<?php } else { ?>
	<?php echo $powered; ?>. 
<?php } ?>
Designed by <a href="http://www.themelexus.com" title="themelexus - opencart themes clubs" target="_blank">ThemeLexus</a></div>	
</div></div>

</footer>




<?php
//call social 
$social_left = $helper->getModulesByPosition('outsite_left');
$social_right = $helper->getModulesByPosition('outsite_right');
if(isset($social_left) && !empty($social_left[0])) {
	echo $social_left[0];
}
if(isset($social_right) && !empty($social_right[0])) {
	echo $social_right[0];
}

// call newsletter
$newsletter_bottom = $helper->getModulesByPosition('outsite_bottom');
if(isset($newsletter_bottom) && !empty($newsletter_bottom[0])) {
	echo $newsletter_bottom[0];
}
?>





<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<?php if( isset($themeConfig['enable_paneltool']) && $themeConfig['enable_paneltool'] ){  ?>
	<?php  echo $helper->renderAddon( 'panel' );?>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function() {
		$("li:first-child").addClass('first');
		$("li:last-child").addClass('last');	
		$(".box-product .row:last-child").addClass('last');				
		$("#image-additional a:last-child").addClass('last');
		$(".product-items:last-child").addClass('last');
		$('.product-cols:last-child').addClass('last');	
		$(".product-cols:first-child").addClass('first');		
		$(".product-grid div[class^='col-']:last-child").addClass('last');
		$(".product-grid .row:last-child").addClass('last');
		$(function(){
			$('#header .links li').last().addClass('last');
			$('.breadcrumb a').last().addClass('last');
			$('.cart tr').eq(0).addClass('first');																									  
		});								
	});
</script>
</section> 
<
</body></html>