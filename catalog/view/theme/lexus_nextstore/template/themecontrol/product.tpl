<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" );

  $themeConfig = (array)$this->config->get('themecontrol');
  $productConfig = array(
      'product_enablezoom'         => 1,
      'product_zoommode'           => 'basic',
      'product_zoomeasing'         => 1,
      'product_zoomlensshape'      => "round",
      'product_zoomlenssize'       => "150",
      'product_zoomgallery'        => 0,
      'enable_product_customtab'   => 0,
      'product_customtab_name'     => '',
      'product_customtab_content'  => '',
      'product_related_column'     => 0,

  );
  $categoryConfig = array(
	'category_pzoom'			   => 1,
  ); 
  $categoryPzoom 	    = $categoryConfig['category_pzoom']; 
  $productConfig 		= array_merge( $productConfig, $themeConfig );  
  $languageID 			= $this->config->get('config_language_id');   
?>

<?php 
/******************************************************
 * @package Pav Opencart Theme Framework for Opencart 1.5.x
 * @version 1.1
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Augus 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/


$themeConfig = $this->config->get( 'themecontrol' );
$LANGUAGE_ID = $this->config->get( 'config_language_id' ); 
$themeName =  $this->config->get('config_template');
require_once( DIR_TEMPLATE.$this->config->get('config_template')."/development/libs/framework.php" );
$helper = ThemeControlHelper::getInstance( $this->registry, $themeName );
$helper->setDirection( $direction );
/* Add scripts files */
$helper->addScript( 'catalog/view/javascript/jquery/jquery-1.7.1.min.js' );
$helper->addScript( 'catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js' );
$helper->addScript( 'catalog/view/javascript/jquery/ui/external/jquery.cookie.js' );
$helper->addScript( 'catalog/view/javascript/common.js' );
$helper->addScript( 'catalog/view/theme/'.$themeName.'/javascript/common.js' );
$helper->addScript( 'catalog/view/javascript/jquery/bootstrap/bootstrap.min.js' );

$helper->addScriptList( $scripts );

$helper->addCss( 'catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css' );	
if( isset($themeConfig['customize_theme']) 
	&& file_exists(DIR_TEMPLATE.$themeName.'/stylesheet/customize/'.$themeConfig['customize_theme'].'.css') ) {  
	$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/customize/'.$themeConfig['customize_theme'].'.css'  );
}

$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/animation.css' );
$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/font-awesome.min.css' );	
$helper->addCssList( $styles );

$layoutMode = $helper->getParam( 'layout' );

$pageClass =  $helper->getPageClass();
$vmegamenu = $helper->renderModule( 'module/pavverticalmenu' );
?>
<!DOCTYPE html>
<html dir="<?php echo $helper->getDirection(); ?>" class="<?php echo $helper->getDirection(); ?>" lang="<?php echo $lang; ?>">
<head>
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width">
	<meta charset="UTF-8" />
	<title><?php echo $title; ?></title>
	<base href="<?php echo $base; ?>" />
	<?php if ($description) { ?>
	<meta name="description" content="<?php echo $description; ?>" />
	<?php } ?>
	<?php if ($keywords) { ?>
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<?php } ?>
	<?php if ($icon) { ?>
	<link href="<?php echo $icon; ?>" rel="icon" />
	<?php } ?>
	<?php foreach ($links as $link) { ?>
	<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
	<?php } ?>
	<?php foreach ($helper->getCssLinks() as $link) { ?>
	<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
	<?php } ?>

	<?php if( $themeConfig['theme_width'] &&  $themeConfig['theme_width'] != 'auto' ) { ?>
	<style> #page-container .container{max-width:<?php echo $themeConfig['theme_width'];?>; width:auto}</style>
	<?php } ?>

	<?php if( isset($themeConfig['use_custombg']) && $themeConfig['use_custombg'] ) {	?>
	<style> 
		body{
			background:url( "image/<?php echo $themeConfig['bg_image'];?>") <?php echo $themeConfig['bg_repeat'];?>  <?php echo $themeConfig['bg_position'];?> !important;
		}
	</style>
	<?php } ?>
	<?php 
		if( isset($themeConfig['enable_customfont']) && $themeConfig['enable_customfont'] ){
			$css=array();
			$link = array();
			for( $i=1; $i<=3; $i++ ){
				if( trim($themeConfig['google_url'.$i]) && $themeConfig['type_fonts'.$i] == 'google' ){
					$link[] = '<link rel="stylesheet" type="text/css" href="'.trim($themeConfig['google_url'.$i]) .'"/>';
					$themeConfig['normal_fonts'.$i] = $themeConfig['google_family'.$i];
				}
				if( trim($themeConfig['body_selector'.$i]) && trim($themeConfig['normal_fonts'.$i]) ){
					$css[]= trim($themeConfig['body_selector'.$i])." {font-family:".str_replace("'",'"',htmlspecialchars_decode(trim($themeConfig['normal_fonts'.$i])))."}\r\n"	;
				}
			}
			echo implode( "\r\n",$link );
			?>
			<style>
			<?php echo implode("\r\n",$css);?>
			</style>
			<?php } else { ?>			
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic,800,700italic,700,600italic,600,400italic,400,300italic,300' rel='stylesheet' type='text/css'>
			<?php } ?>
			<?php foreach ($styles as $style) { ?>
			<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
			<?php } ?>
			<?php foreach( $helper->getScriptFiles() as $script )  { ?>
			<script type="text/javascript" src="<?php echo $script; ?>"></script>
			<?php } ?>


			<?php if( isset($themeConfig['custom_javascript'])  && !empty($themeConfig['custom_javascript']) ){ ?>
			<script type="text/javascript"><!--
			$(document).ready(function() {
				<?php echo html_entity_decode(trim( $themeConfig['custom_javascript']) ); ?>
			});
			//--></script>
			<?php }	?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->	
<!--[if lt IE 9]>
<?php if( isset($themeConfig['load_live_html5'])  && $themeConfig['load_live_html5'] ) { ?>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<?php } else { ?>
<script src="catalog/view/javascript/html5.js"></script>
<?php } ?>
<script src="catalog/view/javascript/respond.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/ie8.css" />
<![endif]-->

<?php if ( isset($stores) && $stores ) { ?>
<script type="text/javascript"><!--
$(document).ready(function() {
	<?php foreach ($stores as $store) { ?>
		$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
		<?php } ?>
	});
//--></script>
<?php } ?>
<?php echo $google_analytics; ?>
</head>
<body class="quickview">
	<section id="page-quickview" role="main">
		<section id="sys-notification">
			<div class="container">
				<?php if ($error) { ?>
				<div class="warning"><?php echo $error ?><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/close.png" alt="" class="close" /></div>
				<?php } ?>
				<div id="notification"></div>
			<script type="text/javascript">
				$(document).ready(function() {
					$( "#notification" ).delegate( "a", "click", function() {
						window.parent.location = $(this).attr('href');
						return false;
					});
				});
			</script>
			</div>
		</section>
		<section id="columns">

		<div class="container">
			<div class="row">

<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="content" class="product-detail">
		<?php echo $content_top; ?>		
		<div class="product-info">
			<div class="row">			
				<?php if ($thumb || $images) { ?>
				<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12 image-container">
					<?php if( isset($date_available) && $date_available == date('Y-m-d')) {   ?>	    	
						<span class="product-label product-label-new">
							<span><?php echo $this->language->get( 'text_new' ); ?></span>	
						</span>												
					<?php } ?>	
					<?php if( $special )  { ?>          
						<span class="product-label product-label-special"><span><?php echo $this->language->get( 'text_sale' ); ?></span></span>
					<?php } ?>
			
					<?php if ($thumb) { ?>
					<div class="image">
						<a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class="colorbox">
							<img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image"  data-zoom-image="<?php echo $popup; ?>" class="product-image-zoom img-responsive"/>
						</a>
					</div>
					<?php } ?>		
			
					<?php if ($images) { ?>
					<div class="image-additional slide carousel" id="image-additional">
						<div id="image-additional-carousel" class="carousel-inner">
							<?php 
							if( $productConfig['product_zoomgallery'] == 'slider' && $thumb ) {  
								$eimages = array( 0=> array( 'popup'=>$popup,'thumb'=> $thumb )  ); 
								$images = array_merge( $eimages, $images );
							}
							$icols = 4; $i= 0;
							foreach ($images as  $image) { ?>
								<?php if( (++$i)%$icols == 1 ) { ?>
								<div class="item">
								<?php } ?>
									<a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" class="colorbox" data-zoom-image="<?php echo $image['popup']; ?>" data-image="<?php echo $image['popup']; ?>">
										<img src="<?php echo $image['thumb']; ?>" style="max-width:<?php echo $this->config->get('config_image_additional_width');?>px"  title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" data-zoom-image="<?php echo $image['popup']; ?>" class="product-image-zoom img-responsive" />
									</a>
								<?php if( $i%$icols == 0 || $i==count($images) ) { ?>
								</div>
							  <?php } ?>
							<?php } ?>		
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#image-additional" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right carousel-control" href="#image-additional" data-slide="next">							
							<i class="fa fa-angle-right"></i>
						</a>

					</div>			
					<script type="text/javascript">
						$('#image-additional .item:first').addClass('active');
						$('#image-additional').carousel({interval:false})
					</script>
					<?php } ?>     
				</div>		
				<?php } ?>
		
	
				<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12 product-view">				
					<h1><?php echo $heading_title; ?></h1>	

					<?php if ($review_status) { ?>
					<div class="review">
						<div><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $rating; ?>.png" alt="<?php echo $reviews; ?>" />&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');"><?php echo $reviews; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');"><?php echo $text_write; ?></a></div>
					</div>
					<?php } ?>

					<div class="description">
						<?php if ($manufacturer) { ?>
							<p>
								<b><?php echo $text_manufacturer; ?></b>
								<a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a>								
							</p>	
						<?php } ?>
						<p>
							<b><?php echo $text_model; ?></b>
							<?php echo $model; ?>
						</p>
						<?php if ($reward) { ?>
							<p>
								<b><?php echo $text_reward; ?></b>
								<?php echo $reward; ?>
							</p>	
						<?php } ?>
						<p>
							<b><?php echo $text_stock; ?></b>
							<span class="availability"><?php echo $stock; ?></span>							
						</p>	
					</div>
							
		 		
					<?php if ($price) { ?>
					<div class="price">
						<div class="price-gruop">
							<span class="text-price"><?php echo $text_price; ?></span>
							<?php if (!$special) { ?>
							<?php echo $price; ?>
							<?php } else { ?>
							<span class="price-old"><?php echo $price; ?></span> 
							<span class="price-new"><?php echo $special; ?></span>
							<?php } ?>
						</div>	
						<div class="other-price">
							<?php if ($tax) { ?>
								<span class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></span><br/>
							<?php } ?>
							<?php if ($points) { ?>
								<span class="reward"><small><?php echo $text_points; ?> <?php echo $points; ?></small></span>
							<?php } ?>
						</div>						
						<?php if ($discounts) { ?>			
						<div class="discount">
							<ul>
								<?php foreach ($discounts as $discount) { ?>							
								<li><?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
					


					<?php if ($profiles): ?>
					<div class="option form-group">
						<h2><span class="required">*</span><?php echo $text_payment_profile ?></h2>
						<select name="profile_id" class="form-control">
							<option value=""><?php echo $text_select; ?></option>
							<?php foreach ($profiles as $profile): ?>
							<option value="<?php echo $profile['profile_id'] ?>"><?php echo $profile['name'] ?></option>
							<?php endforeach; ?>
						</select>
						<span id="profile-description"></span>
					</div>
					<?php endif; ?>



	  	
 
					<?php if ($options) { ?>					
					<div class="options">
						<h2><?php echo $text_option; ?></h2>        
						<?php foreach ($options as $option) { ?>
						<?php if ($option['type'] == 'select') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>									
							<select name="option[<?php echo $option['product_option_id']; ?>]">
								<option value=""><?php echo $text_select; ?></option>
								<?php foreach ($option['option_value'] as $option_value) { ?>
								<option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
								<?php if ($option_value['price']) { ?>
								(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
								<?php } ?>
								</option>
								<?php } ?>
							</select>							
						</div>        
						<?php } ?>


					
					
						<?php if ($option['type'] == 'radio') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>						
							<?php foreach ($option['option_value'] as $option_value) { ?>
							<div class="radio">
								<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>">
									<input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />	
									<?php echo $option_value['name']; ?>
									<?php if ($option_value['price']) { ?>
									(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
									<?php } ?>
								</label>							
							</div>
							<?php } ?>
						</div>					
						<?php } ?>

		
		
						<?php if ($option['type'] == 'checkbox') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>						
							<?php foreach ($option['option_value'] as $option_value) { ?>
							<div class="checkbox">
								<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
									<input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
									<?php if ($option_value['price']) { ?>
									(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
									<?php } ?>
								</label>	
							</div>						
							<?php } ?>
						</div>					
						<?php } ?>

		
		
						<?php if ($option['type'] == 'image') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<table class="option-image">
								<?php foreach ($option['option_value'] as $option_value) { ?>
								<tr>
									<td style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" /></td>
									<td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></td>
									<td>
										<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
											<?php if ($option_value['price']) { ?>
											(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
											<?php } ?>
										</label>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<?php } ?>

		
		
						<?php if ($option['type'] == 'text') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" />
						</div>		
						<?php } ?>
	
	
						<?php if ($option['type'] == 'textarea') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<textarea name="option[<?php echo $option['product_option_id']; ?>]" cols="40" rows="5" class="form-control"><?php echo $option['option_value']; ?></textarea>
						</div>        
						<?php } ?>
		
		
						<?php if ($option['type'] == 'file') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="button btn btn-theme-default">
							<input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
						</div>		
						<?php } ?>
		
						<?php if ($option['type'] == 'date') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
						</div>		
						<?php } ?>		
		
						<?php if ($option['type'] == 'datetime') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
						</div>        
						<?php } ?>		
		
						<?php if ($option['type'] == 'time') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
						</div>        
						<?php } ?>		
				
					<?php } ?>
				</div>
			<?php } ?>
			
			
			<div class="product-extra">
				<div class="quantity-adder pull-left">
					<div class="quantity-number pull-left">
						<span><?php echo $text_qty; ?></span>
						<input type="text" name="quantity" size="2" value="<?php echo $minimum; ?>" />
					</div>
					<div class="quantity-wrapper pull-left">
						<span class="add-up add-action fa fa-plus"></span> 
						<span class="add-down add-action fa fa-minus"></span>
					</div>					
					<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />	
				</div>											
				<div class="cart pull-left">					
					<!-- <input type="button" value="<?php //echo $button_cart; ?>" id="button-cart" class="button btn btn-theme-default" /> -->
					<button id="button-cart" class="btn btn-shopping-cart btn-cart-detail blue">						
						<span class="fa fa-shopping-cart product-icon hidden-sm hidden-md">&nbsp;</span>
						<span><?php echo $button_cart; ?></span>
					</button>
				</div>
				<div class="action pull-left">
					<div class="pull-left">
						<a class="wishlist" onclick="addToWishList('<?php echo $product_id; ?>');">
							<i class="fa fa-heart"></i>
							<?php echo $button_wishlist; ?>
						</a>				
					</div>
					<div class="pull-left">
						<a class="compare" onclick="addToCompare('<?php echo $product_id; ?>');">							
							<i class="fa fa-refresh"></i>
							<?php echo $button_compare; ?>
						</a>
					</div>
				</div>
				<!-- <span>&nbsp;&nbsp;<?php //echo $text_or; ?>&nbsp;&nbsp;</span> -->
			</div>

			<?php if ($minimum > 1) { ?>
				<div class="minimum"><small><?php echo $text_minimum; ?></small></div>
			<?php } ?>			
				
			<div class="share">
				<!-- AddThis Button END --> 				
				<div class="addthis_default_style"><a class="addthis_button_compact"><?php echo $text_share; ?></a> <a class="addthis_button_email"></a><a class="addthis_button_print"></a> <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a></div>
				<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script> 
				<!-- AddThis Button END --> 				
			</div>
		
		
			<?php if ($tags) { ?>
			<div class="tags">
				<b><?php echo $text_tags; ?></b>
				<?php for ($i = 0; $i < count($tags); $i++) { ?>
				<?php if ($i < (count($tags) - 1)) { ?>
				<a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>,
				<?php } else { ?>
				<a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
				<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>  
		</div>
	</div>
</div>

		



		<?php /* ?>
		<div class="tabs-group box">
			<div id="tabs" class="htabs">
				<ul class="nav nav-tabs box-heading clearfix">
					<li><a href="#tab-description"><?php echo $tab_description; ?></a></li>			
					<?php if ($attribute_groups) { ?>
					<li><a href="#tab-attribute"><?php echo $tab_attribute; ?></a></li>		
					<?php } ?>			
					<?php if ($review_status) { ?>
					<li><a href="#tab-review"><?php echo $tab_review; ?></a></li>
					<?php } ?>			
					<?php if( $productConfig['enable_product_customtab'] && isset($productConfig['product_customtab_name'][$languageID]) ) { ?>
					<li><a href="#tab-customtab"><?php echo $productConfig['product_customtab_name'][$languageID]; ?></a></li>
					<?php } ?> 
				</ul>			
			</div>

			<div id="tab-description" class="tab-content"><?php echo $description; ?></div>
			
			<?php if ($attribute_groups) { ?>
			<div id="tab-attribute" class="tab-content no-margin table-responsive">
				<table class="attribute table">
					<?php foreach ($attribute_groups as $attribute_group) { ?>
					<thead>
						<tr>
							<td colspan="2"><?php echo $attribute_group['name']; ?></td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($attribute_group['attribute'] as $attribute) { ?>
						<tr>
							<td><?php echo $attribute['name']; ?></td>
							<td><?php echo $attribute['text']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
					<?php } ?>
				</table>
			</div>
			<?php } ?>

		 
			
			<?php if( $productConfig['enable_product_customtab'] && isset($productConfig['product_customtab_content'][$languageID]) ) { ?>
			<div id="tab-customtab" class="tab-content custom-tab">
				<div class="inner">
					<?php echo html_entity_decode( $productConfig['product_customtab_content'][$languageID], ENT_QUOTES, 'UTF-8'); ?>
				</div>
			</div>
			<?php } ?> 

		</div>
		<?php */ ?>

	</div>

<?php if( $productConfig['product_enablezoom'] ) { ?>
<script type="text/javascript" src=" catalog/view/javascript/jquery/elevatezoom/elevatezoom-min.js"></script>
<script type="text/javascript">
	<?php if( $productConfig['product_zoomgallery'] == 'slider' ) {  ?>
		$("#image").elevateZoom({gallery:'image-additional-carousel', cursor: 'pointer', galleryActiveClass: 'active'}); 
		<?php } else { ?>
		var zoomCollection = '<?php echo $productConfig["product_zoomgallery"]=="basic"?".product-image-zoom":"#image";?>';
		$( zoomCollection ).elevateZoom({
		<?php if( $productConfig['product_zoommode'] != 'basic' ) { ?>
		zoomType        : "<?php echo $productConfig['product_zoommode'];?>",
		<?php } ?>
		lensShape : "<?php echo $productConfig['product_zoomlensshape'];?>",
		lensSize    : <?php echo (int)$productConfig['product_zoomlenssize'];?>,
	});
	<?php } ?> 
</script>
<?php } ?>

<script type="text/javascript">
<!--
$(document).ready(function() {
  $('.colorbox').colorbox({
    overlayClose: true,
    opacity: 0.5,
    rel: "colorbox"
  });
});
//-->
</script>

 <script type="text/javascript">
 <!--
$('select[name="profile_id"], input[name="quantity"]').change(function(){
    $.ajax({
    url: 'index.php?route=product/product/getRecurringDescription',
    type: 'post',
    data: $('input[name="product_id"], input[name="quantity"], select[name="profile_id"]'),
    dataType: 'json',
        beforeSend: function() {
            $('#profile-description').html('');
        },
    success: function(json) {
      $('.success, .warning, .attention, information, .error').remove();
      if (json['success']) {
                $('#profile-description').html(json['success']);
      }
    }
  });
});
$('#button-cart').bind('click', function() {
  $.ajax({
    url: 'index.php?route=checkout/cart/add',
    type: 'post',
    data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
    dataType: 'json',
    success: function(json) {
      $('.success, .warning, .attention, information, .error').remove();
      if (json['error']) {
        if (json['error']['option']) {
          for (i in json['error']['option']) {
            $('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
          }
        }

                if (json['error']['profile']) {
                    $('select[name="profile_id"]').after('<span class="error">' + json['error']['profile'] + '</span>');
                }
      } 

      if (json['success']) {
        $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/close.png" alt="" class="close" /></div>');

        $('.success').fadeIn('slow');

        $('#cart-total').html(json['total']);

        $('html, body').animate({ scrollTop: 0 }, 'slow'); 
      } 
    }
  });
});
//-->
</script>

<?php if ($options) { ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<?php foreach ($options as $option) { ?>
<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
  action: 'index.php?route=product/product/upload',
  name: 'file',
  autoSubmit: true,
  responseType: 'json',
  onSubmit: function(file, extension) {
    $('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/loading.gif" class="loading" style="padding-left: 5px;" />');
    $('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
  },
  onComplete: function(file, json) {
    $('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);

    $('.error').remove();

    if (json['success']) {
      alert(json['success']);
      $('input[name=\'option[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
    }

    if (json['error']) {
      $('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
    }

    $('.loading').remove(); 
  }
});
//-->
</script>

<?php } ?>
<?php } ?>
<?php } ?>

<script type="text/javascript">
<!--
$('#review .pagination a').live('click', function() {
  $('#review').fadeOut('slow');

  $('#review').load(this.href);

  $('#review').fadeIn('slow');

  return false;
});

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').bind('click', function() {
  $.ajax({
    url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
    type: 'post',
    dataType: 'json',
    data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
    beforeSend: function() {
      $('.success, .warning').remove();
      $('#button-review').attr('disabled', true);
      $('#review-title').after('<div class="attention"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
    },
    complete: function() {
      $('#button-review').attr('disabled', false);
      $('.attention').remove();
    },
    success: function(data) {
      if (data['error']) {
        $('#review-title').after('<div class="warning">' + data['error'] + '</div>');
      }

      if (data['success']) {
        $('#review-title').after('<div class="success">' + data['success'] + '</div>');

        $('input[name=\'name\']').val('');
        $('textarea[name=\'text\']').val('');
        $('input[name=\'rating\']:checked').attr('checked', '');
        $('input[name=\'captcha\']').val('');
      }
    }
  });
});
//-->
</script> 

<script type="text/javascript">
<!--
$('#tabs a').tabs();
//-->
</script> 

<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript">
<!--
$(document).ready(function() {
  if ($.browser.msie && $.browser.version == 6) {
    $('.date, .datetime, .time').bgIframe();
  }

  $('.date').datepicker({dateFormat: 'yy-mm-dd'});
  $('.datetime').datetimepicker({
    dateFormat: 'yy-mm-dd',
    timeFormat: 'h:m'
  });
  $('.time').timepicker({timeFormat: 'h:m'});
});
//-->
</script> 
</section>
 
 

</div></div>

</section></section> 
</body></html>