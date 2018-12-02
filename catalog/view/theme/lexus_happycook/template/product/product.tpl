<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" );

  $themeConfig = $this->config->get('themecontrol');
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
      'quickview'                          => 0,
      'show_swap_image'                    => 0,
      'product_related_column'     => 0,
      'category_pzoom'				     => 1,
  );
  $languageID = $this->config->get('config_language_id');
  $productConfig = array_merge( $productConfig, $themeConfig ); 
    $quickview          = $productConfig['quickview'];
    $swapimg            = $productConfig['show_swap_image'];
    $categoryPzoom 	    = $productConfig['category_pzoom'];
?>
<?php echo $header; ?>
 

<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>  

<div id="group-content">
<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
		<?php echo $column_left; ?>
	</aside>	
<?php endif; ?> 
<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">
<div id="content"><?php echo $content_top; ?>
  
 
  <div class="product-info">
	<div class="row else__top_prod">
    <div class="col-lg-12 col-md-12">
		 <h1><?php echo $heading_title; ?></h1>
	</div>
        <?php if ($thumb || $images) { ?>
    <div class="col-lg-8 col-md-8 image-container">
  <?php if( $special )  { ?>
          <div class="product-label-special label"><?php echo $this->language->get( 'text_sale' ); ?></div>
        <?php } ?>
		<div class="<?php if (count($images) > 0) {echo 'col-sm-10';} else {echo 'col-sm-12';}?> big__images">
        <?php if ($thumb) { ?>
        <div class="image"><a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class="colorbox">
          <img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image"  data-zoom-image="<?php echo $popup; ?>" class="product-image-zoom"/></a></div>
        <?php } ?>
		</div>
		<div class="col-sm-2 smalls___imgs">
        <?php if ($images) { ?>
        <div class="image-additional slide carousel" id="image-additional" style="padding: 0px;">
	  <a href="#" class="prev"><i class="fa fa-chevron-down"></i></a>		
		<div id="image-additional-carousel" class="carousel-inner">

		<ul>
        <?php 
        if( $productConfig['product_zoomgallery'] == 'slider' && $thumb ) {  
          $eimages = array( 0=> array( 'popup'=>$popup,'thumb'=> $thumb )  ); 
          $images = array_merge( $eimages, $images );
        }
        $icols = 3; $i= 0;
        foreach ($images as  $image) { ?>
          
          
         
		<li>
              <a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" class="colorbox" data-zoom-image="<?php echo $image['popup']; ?>" data-image="<?php echo $image['popup']; ?>">
				<span>
                <img src="<?php echo $image['thumb']; ?>" style="max-width:100%;width: 100%;"  title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" data-zoom-image="<?php echo $image['popup']; ?>" class="product-image-zoom" />
				</span>
              </a>
            
        </li>
          
        <?php } ?>
		</ul>
      </div>
	  <a href="#" class="next"><i class="fa fa-chevron-up"></i></a>
        </div>
<script>
jQuery_1_11_1("#image-additional-carousel").jCarouselLite({
    btnNext: ".image-additional .next",
    btnPrev: ".image-additional .prev",
    vertical: true	

});
</script>

        <?php } ?>
		</div>
     
         </div>
    <?php } else { ?>
    <div class="col-lg-8 col-md-8 image-container">
  <?php if( $special )  { ?>
          <div class="product-label-special label"><?php echo $this->language->get( 'text_sale' ); ?></div>
        <?php } ?>
		<div class="col-sm-12 big__images">
        <div class="image"><a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class="colorbox">
          <img src="/image/cache/data/product/%20временно%20отсутствует-240x240.jpg" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image"  data-zoom-image="<?php echo $popup; ?>" class="product-image-zoom"/></a></div>
		</div>
     
         </div>
    <?php } ?>
    <div class="col-lg-4 col-md-4 all_right__colls_pr">
    <div class="right__colls_pr">
	<div class="col-sm-12 cennic__products">
        <?php if ($price) { ?>
    <div class="price ">
     <?php if (!$special) { ?>
        <?php echo $price; ?>
        <?php } else { ?>
        <span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
        <?php } ?>
    </div>
    <?php if ($price) { ?>
      <div class="price-other">
        <?php if ($tax) { ?>
        <span class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></span><br />
        <?php } ?>
        <?php if ($points) { ?>
        <span class="reward"><small><?php echo $text_points; ?> <?php echo $points; ?></small></span><br />
        <?php } ?>
        <?php if ($discounts) { ?>
        <br />
        <div class="discount">
          <?php foreach ($discounts as $discount) { ?>
          <?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?><br />
          <?php } ?>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
    <?php } ?>
      </div>
		 
      


    <div class="price-cart row">


      <div class="col-sm-12">
        <div class="product-extra">
          <div class="quantity-adder my_quantity col-sm-6 padding-rl0">
          
            <div class="quantity-number pull-left">
                <span class="add-up add-action fa fa-pluss col-xs-2"><i class="fa fa-plus"></i></span> 
                <input class="col-xs-8 quant" type="text" name="quantity" id="input-quantity" size="2" value="<?php echo $minimum; ?>">
                <span class="add-down add-action fa fa-minuss col-xs-2"><i class="fa fa-minus"></i></span>
            </div>                
          
          </div>
          
          
          
          <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />

    <div class="product-action pull-left col-sm-6  padding-rlr padding-rlr-mob">
        <div class="cart pull-left">
            <button type="button" id="button-cart" data-loading-text="Loading..." class="buttonse"><?php echo $button_cart; ?></button>            
        </div>                            
    </div>


<div class="knopki">	

		 <div class="compare-wish col-sm-6 col-md-6 col-xs-6 padding-rl0">
			<div class="col-sm-6 col-md-6 col-xs-6 padding-rll">
				<a class="btn-grays" onclick="addToWishList('<?php echo $product_id; ?>');"><span class="fa fa-heart"></span></a>
			</div>
			<div class="col-sm-6 col-md-6 col-xs-6 padding-rl0">
				<a class="btn-grays" onclick="addToCompare('<?php echo $product_id; ?>');"><span class="fa fa-retweet"></span></a>
			</div>
		</div>
		
<div class="col-sm-6 col-md-6 col-xs-6 padding-rlr">		
<a id="fast_order" href="#fast_order_form" class="btn-gray" />Быстрый заказ</a>
<div style="display:none">
<div id="fast_order_form">       
<input id="product_name" type="hidden" value="<?php echo $heading_title; ?>">
<input id="product_price" type="hidden" value="<?php echo ($special ? $special : $price); ?>">
<div class="fast_order_center"><?php echo $heading_title; ?> — ваш заказ</div>
<div class="fast_order_left">
<p>Имя:</p>
<p>Телефон:</p>
<p>Комментарий:</p>
</div>
<div class="fast_order_right">
<p><input type="text" id="customer_name"/></p>
<p><input type="text" id="customer_phone"/></p>
<p><input type="text" id="customer_message"/></p>
</div>
<div class="fast_order_center">
<p id="fast_order_result">Пожалуйста, укажите ваше имя и телефон, чтобы мы могли связаться с вами</p>
<button class="fast_order_button"><span>Оформить заказ</span></button>
</div>
</div>
</div>   
</div>   
</div>   
    <div class="clearfix"></div>

    
          
         
        </div>
        <?php if ($minimum > 1) { ?>
        <div class="minimum pull-right"><?php echo $text_minimum; ?></div>
        <?php } ?>
        </div>
      </div>

      <ul class="description time__worke">
        <?php if ($manufacturer) { ?>
		<li>
        <span class="txt__attribpre"><span class="txt__attrib"><?php echo $text_manufacturer; ?></span> </span> <span><a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a></span>
        <?php } ?>
		</li>
		<li>
        <span class="txt__attribpre"><span class="txt__attrib"><?php echo $text_model; ?></span></span> <span><?php echo $model; ?></span>
		</li>
        <?php if ($reward) { ?>
		<li>
        <span class="txt__attribpre"><span class="txt__attrib"><?php echo $text_reward; ?></span></span> <span><?php echo $reward; ?></span>
        <?php } ?>
		</li>
		<li>
        <span class="txt__attribpre"><span class="txt__attrib"><?php echo $text_stock; ?></span></span> <span><?php echo $stock; ?></span>
		</li>
		</ul>
<ul class="list-unstyled inform-block-prod">
                    <li><a class="clickmodal" href="/ucloviya-doctavki">Доставка</a></li>
                    <li><a class="clickmodal" href="/ucloviya-oplati">Оплата</a></li>
                    <li><a class="clickmodal" href="/kontakti">Контакты</a></li>
                    <li><a class="clickmodal" href="/index.php?route=information/information/agree&information_id=14">Как заказать </a></li>
			  
</ul>
    <div class="buttom__prod_manufact">
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,twitter,viber,skype"></div>
	</div>
      <?php if ($profiles): ?>
      <div class="option">
          <h2><span class="required">*</span><?php echo $text_payment_profile ?></h2>
          <br />
          <select name="profile_id">
              <option value=""><?php echo $text_select; ?></option>
              <?php foreach ($profiles as $profile): ?>
              <option value="<?php echo $profile['profile_id'] ?>"><?php echo $profile['name'] ?></option>
              <?php endforeach; ?>
          </select>
          <br />
          <br />
          <span id="profile-description"></span>
          <br />
          <br />
      </div>
      <?php endif; ?>
	  
	
 
      <?php if ($options) { ?>
      <div class="options">
        <h2><?php echo $text_option; ?></h2>
        <br />
        <?php foreach ($options as $option) { ?>
        <?php if ($option['type'] == 'select') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
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
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'radio') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'checkbox') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'image') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <table class="option-image">
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <tr>
              <td style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" /></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                  <?php if ($option_value['price']) { ?>
                  (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                  <?php } ?>
                </label></td>
            </tr>
            <?php } ?>
          </table>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'text') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" />
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'textarea') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <textarea name="option[<?php echo $option['product_option_id']; ?>]" cols="40" rows="5"><?php echo $option['option_value']; ?></textarea>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'file') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="button">
          <input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'date') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'datetime') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'time') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
        </div>
        <br />
        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
  
  <?php if ($tags) { ?>
  <div class="tags"><b><?php echo $text_tags; ?></b>
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
  </div>
  <div class="tabs-group">
  <div id="tabs" class="htabs clearfix"><a href="#tab-description"><?php echo $tab_description; ?></a>
    <?php if ($attribute_groups) { ?>
    <a href="#tab-attribute"><?php echo $tab_attribute; ?></a>
    <?php } ?>
    <?php if ($review_status) { ?>
    <a href="#tab-review"><?php echo $tab_review; ?></a>
    <?php } ?>
    <?php if( $productConfig['enable_product_customtab'] && isset($productConfig['product_customtab_name'][$languageID]) ) { ?>
     <a href="#tab-customtab"><?php echo $productConfig['product_customtab_name'][$languageID]; ?></a>
   <?php } ?> 

  </div>
  <div id="tab-description" class="tab-content"><?php echo $description; ?></div>
  <?php if ($attribute_groups) { ?>
  <div id="tab-attribute" class="tab-content">
    <table class="attribute">
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
  <?php if ($review_status) { ?>
  <div id="tab-review" class="tab-content">
    <div id="review"></div>
    <h2 id="review-title"><?php echo $text_write; ?></h2>
    <b><?php echo $entry_name; ?></b><br />
    <input type="text" name="name" value="" />
    <br />
    <br />
    <b><?php echo $entry_review; ?></b>
    <textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
    <span style="font-size: 11px;"><?php echo $text_note; ?></span><br />
    <br />
    <b><?php echo $entry_rating; ?></b> <span><?php echo $entry_bad; ?></span>&nbsp;
    <input type="radio" name="rating" value="1" />
    &nbsp;
    <input type="radio" name="rating" value="2" />
    &nbsp;
    <input type="radio" name="rating" value="3" />
    &nbsp;
    <input type="radio" name="rating" value="4" />
    &nbsp;
    <input type="radio" name="rating" value="5" />
    &nbsp;<span><?php echo $entry_good; ?></span><br />
    <br />
    <b><?php echo $entry_captcha; ?></b><br /> <br /> 
	<img src="index.php?route=product/product/captcha" alt="" id="captcha" />
    <br />
	    <br />
    <input type="text" name="captcha" value="" />
    <br />
       <br />
    <div>
      <a id="button-review" class="button"><?php echo $button_continue; ?></a>
    </div>
  </div>
  <?php } ?>

    <?php if( $productConfig['enable_product_customtab'] && isset($productConfig['product_customtab_content'][$languageID]) ) { ?>
     <div id="tab-customtab" class="tab-content custom-tab">
      <div class="inner">
        <?php echo html_entity_decode( $productConfig['product_customtab_content'][$languageID], ENT_QUOTES, 'UTF-8'); ?>
      </div></div>
   <?php } ?> 
  </div>
   
    <?php if ($products) { ?>
	<?php 
	$cols = 4;
	$span = 12/$cols; 
		?>
	<div class="product-related box">
   <div class="box-heading"><span><?php echo $tab_related; ?> (<?php echo count($products); ?>)</span></div>
   <div id="related" class="slide product-grid" data-interval="0">
    <div class="carousel-controls">
      <a class="carousel-control left" href="#related" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#related" data-slide="next">&rsaquo;</a>
    </div>
    <div class="products-block carousel-inner">
			  <?php foreach ($products as $i => $product) { $i=$i+1; ?>
				<?php if( $i%$cols == 1 && $cols > 1 ) { ?>
        <div class= "item <?php if($i==1) {?>active<?php } ?>">
				  <div class="row">
				<?php } ?>
        <div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-6 col-xs-12">
          <div class="product-block">
				  <?php if ($product['thumb']) { ?>
      <div class="image"><a class="img" href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a>
        <div class="compare-wishlish">
          <div class="wishlist"><a class="fa fa-heart" onclick="addToWishList('<?php echo $product['product_id']; ?>');"  data-toggle="tooltip" title="<?php echo $this->language->get("button_wishlist"); ?>" ></a></div>
          <?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
           <div class="product-zoom hidden-xs hidden-sm">
            <a href="<?php echo $zimage;?>" class="colorbox-related" rel="nofollow" title="<?php echo $product['name']; ?>"><span class="fa fa-search-plus"></span></a>
           </div>
           <?php } ?>
          <div class="compare"><a class="fa fa-retweet"  onclick="addToCompare('<?php echo $product['product_id']; ?>');" data-toggle="tooltip" title="<?php echo $this->language->get("button_compare"); ?>" ></a></div>
        </div>
        <?php //#2 Start fix quickview in fw?>
          <?php if ($quickview) { ?>
          <div class="product-quickview hidden-xs hidden-sm">
              <a class="pav-colorbox" href="<?php echo $this->url->link("themecontrol/product",'product_id='.$product['product_id'] );?>"><?php echo $this->language->get('quick_view'); ?></a>
            </div>
          <?php } ?>
        <?php //#2 End fix quickview in fw?>
              <?php 
            if( $swapimg ){
              $product_images = $this->model_catalog_product->getProductImages( $product['product_id'] );
          if(isset($product_images) && !empty($product_images)) {
            $thumb2 = $this->model_tool_image->resize($product_images[0]['image'],  $this->config->get('config_image_product_width'),  $this->config->get('config_image_product_height') );
          ?>  
          <a class="hover-image" href="<?php echo $product['href']; ?>"><img src="<?php echo $thumb2; ?>" alt="<?php echo $product['name']; ?>"></a>
        <?php } } ?>
      </div>
      <?php } ?>
	 <div class="product-meta">
      <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div> 
	     <?php if ($product['rating']) { ?>
        <div class="rating"><img alt="<?php echo $product['rating']; ?>" src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" />
        </div>
        <?php } else { ?>
        <div class="norating"><img alt="0" src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-0.png"></div>
        <?php } ?>
	  <div class="price-cart">
      <?php if ($product['price']) { ?>
      <div class="price">
        <?php if (!$product['special']) { ?>
        <?php echo $product['price']; ?>
        <?php } else { ?>
        <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
        <?php } ?>
      </div>
      <?php } ?>
 
      <div class="cart">
        <span class="fa fa-shopping-cart"></span>
        <input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" />
      </div>
	  </div>
        
	  </div>
        </div>
			  </div>
			  
			  <?php if( $cols > 1  && ($i%$cols == 0 || $i==count($products)) ) { ?>
				 </div>
        </div>
				<?php } ?>
				
			  <?php } ?>
  </div>
  </div>
  </div>
  <?php } ?>
  
  <?php echo $content_bottom; ?></div>
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
<script type="text/javascript"><!--
$(document).ready(function() {
  $('.colorbox').colorbox({
    overlayClose: true,
    opacity: 0.5,
    rel: "colorbox"
  });
});
//--></script> 
<?php if( $categoryPzoom ) {  ?>
<script type="text/javascript">
<!--
  $(document).ready(function() {
    $('.colorbox-related').colorbox({
      overlayClose: true,
      opacity: 0.5,
      rel: false,
      onLoad:function(){
        $("#cboxNext").remove(0);
        $("#cboxPrevious").remove(0);
        $("#cboxCurrent").remove(0);
      }
    });
  });
//-->
</script>
<?php } ?>
<script type="text/javascript"><!--
$(document).ready(function() {
    $('.pav-colorbox').colorbox({
        width: '900px', 
        height: '650px',
        overlayClose: true,
        opacity: 0.5,
        iframe: true, 
    });
});
//--></script> 
 <script type="text/javascript"><!--

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
        $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
          
        $('.success').fadeIn('slow');
          
        $('#cart-total').html(json['total']);
        
        $('html, body').animate({ scrollTop: 0 }, 'slow'); 
      } 
    }
  });
});
//--></script>
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
    $('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
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
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--
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
      $('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
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
//--></script>
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
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
//--></script> 

</section> 
<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
		<?php echo $column_right; ?>
	</aside>
<?php endif; ?>
</div>
<?php echo $footer; ?>