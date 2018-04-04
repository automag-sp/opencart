<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); 
	$themeConfig = $this->config->get('themecontrol');
	 
	 $categoryConfig = array( 
		'listing_products_columns' 		     => 0,
		'listing_products_columns_small' 	 => 2,
		'listing_products_columns_minismall' => 1,
		'cateogry_product_row'               => 3,
		'cateogry_display_mode' 			 => 'grid',
		'category_pzoom'				     => 1,
		'quickview'                          => 0,
		'show_swap_image'                    => 0,
	); 
	$categoryConfig  = array_merge($categoryConfig, $themeConfig );
	$MAX_ITEM_ROW       = $categoryConfig['cateogry_product_row'];
	$DISPLAY_MODE 	 = $categoryConfig['cateogry_display_mode'];
	$MAX_ITEM_ROW 	 = $themeConfig['listing_products_columns']?$themeConfig['listing_products_columns']:4; 
	$MAX_ITEM_ROW_SMALL = $categoryConfig['listing_products_columns_small'] ;
	$MAX_ITEM_ROW_MINI  = $categoryConfig['listing_products_columns_minismall']; 
	$categoryPzoom 	    = $categoryConfig['category_pzoom']; 
	$quickview          = $categoryConfig['quickview'];
	$swapimg            = $categoryConfig['show_swap_image'];
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
<div id="content">
<?php echo $content_top; ?>
  
  <div class="search">
  <h1><?php echo $heading_title; ?></h1>
  
  <?php if ($products) { ?>
    <div class="box">
        <div class="box-heading"><span>Найдено на витрине:</span></div>
        <div class="box-content">
            <div class="product-list"> <div class="products-block">
    
                <?php
            	$cols = $MAX_ITEM_ROW ;
            	$span = floor(12/$cols);
            	$small = floor(12/$MAX_ITEM_ROW_SMALL);
            	$mini = floor(12/$MAX_ITEM_ROW_MINI);
            	foreach ($products as $i => $product) { ?>
            	<?php if( $i++%$cols == 0 ) { ?>
            		  <div class="row">
            	<?php } ?>
                <div class="col-xs-12 col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-<?php echo $small;?> col-xs-<?php echo $mini;?>">
                <div class="product-block">
                  <?php if ($product['thumb']) { ?>
                 <div class="image">
                 	<?php if( $product['special'] ) {   ?>
                	<div class="product-label-special label"><?php echo $this->language->get( 'text_sale' ); ?></div>
                	<?php } ?>
                		<a class="img" href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a>
            	      	<div class="compare-wishlish">
            			 <div class="wishlist"><a class="fa fa-heart" onclick="addToWishList('<?php echo $product['product_id']; ?>');"  data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $button_wishlist; ?>"><span><?php echo $button_wishlist; ?></span></a></div>
            			 <?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
            	      	 <div class="product-zoom hidden-xs hidden-sm">
            	      	 	<a href="<?php echo $zimage;?>" class="colorbox" rel="nofollow" title="<?php echo $product['name']; ?>"><span class="fa fa-search-plus"></span></a>
            	      	 </div>
            	      	 <?php } ?>
            		      <div class="compare"><a class="fa fa-retweet" onclick="addToCompare('<?php echo $product['product_id']; ?>');"  data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $button_compare; ?>"><span><?php echo $button_compare; ?></span></a></div>
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
            			<?php } }?>
            	      </div>
                  <?php } ?>
                  <div class="product-meta">
                  <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
                  <div class="description"><?php echo utf8_substr( strip_tags($product['description']),0,60);?>...</div>
            	  <?php if ($product['rating']) { ?>
                  <div class="rating"><img alt="<?php echo $product['rating']; ?>" src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" />
            	      </div>
            	      <?php } else { ?>
                  <div class="norating"><img alt="0" src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-0.png"></div>
            	      <?php } ?>
                  <?php if ($product['price']) { ?>
                  <div class="price">
                    <?php if (!$product['special']) { ?>
                    <?php echo $product['price']; ?>
                    <?php } else { ?>
                    <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
                    <?php } ?>
                    <?php if ($product['tax']) { ?>
                    <br />
                    <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
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
            	 <?php if( $i%$cols == 0 || $i==count($products) ) { ?>
            	 </div>
            	 <?php } ?>
            				
                <?php } ?>
              </div></div>
          </div>
      </div>
          
          
          
          
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

   <div class="pagination">
   	<?php echo $pagination; ?>
   </div>
  <?php } else { ?>
    <div class="box">
        <div class="box-heading"><span>Найдено на витрине:</span></div>
        <div class="box-content"><h2>Товаров на витрине не найдено</div>
    </div>  
  <?php
  } ?>
  
  
  
  
    <div class="box">
        <div class="box-heading"><span>Найдено на складе: </span></div>
        <div class="box-content">
        <?
        if (($ext_brands)){
            echo '<h2>Необходимо уточнить критерий поиска:</h2><ul>';
            foreach ($ext_brands as $item){
                echo '<li><a href="/index.php?route=product/search&search='.$item->numberFix.'&brand='.$item->brand.'"><b>'.$item->brand.'</b> <i>'.$item->number.'</i>: '.$item->description.'</a></li>';
            }
            echo '</ul>';
        } else {
            //echo $BRAND.' - '.$NOMER.'<br />';
            $ext_products2 = array();
            foreach ($ext_products as $BRA => $NOMS){
                if ($BRA == $BRAND){
                    foreach ($NOMS as $NOM => $DAYS){
                        if ($NOM == $NOMER){
                            echo '<h2>Запрошеный артикул:</h2><table class="list"><thead><tr><td>Бренд/номер</td><td>Описание</td><td>Доставка</td><td>Цена</td><td></td></thead><tbody>';
                            foreach ($DAYS as $DAY => $ITEM){
                                echo '<tr><td><b>'.$ITEM['brand'].'</b><br /><i>'.$ITEM['number'].'</i></td><td>'.$ITEM['description'].'</td><td>'.($DAY+1).'</td><td nowrap>'.number_format($ITEM['price']*1.35, 2, '.', ' ').'р.</td><td><div class="cart"><input type="button" value="Купить" onclick="addToCartR(\''.$ITEM['brand'].'\',\''.$ITEM['number'].'\',\''.$DAY.'\');" class="button"></div></td></tr>';
                            }
                            echo '</tbody></table>';
                        } else {
                            $ext_products2[$BRA][$NOM] = $DAYS;
                        }
                    }
                } else {
                    $ext_products2[$BRA] = $NOMS;
                }
            }
            if (count($ext_products2)>0){
                echo '<h2>Аналоги</h2><table class="list"><thead><tr><td>Бренд/номер</td><td>Описание</td><td>Доставка</td><td>Цена</td><td></td></thead><tbody>';
                foreach ($ext_products2 as $BRA => $NOMS){
                    $RES = array();
                    foreach ($NOMS as $NOM => $DAYS){
                        foreach ($DAYS as $DAY => $ITEM){
                            if (!isset($RES['dd'])){
                                $RES = $ITEM;
                                $RES['dd'] = $DAY;
                            } else {
                                if ($DAY < $RES['dd']){
                                    $RES = $ITEM;
                                    $RES['dd'] = $DAY;
                                } else {
                                    if ($DAY == $RES['dd']){
                                        if ($ITEM['price'] < $RES['price']){
                                            $RES = $ITEM;
                                            $RES['dd'] = $DAY;
                                        }
                                    }
                                }
                                
                            }
                        }
                    }
                    echo '<tr><td><b>'.$RES['brand'].'</b><br /><i>'.$RES['number'].'</i></td><td>'.$RES['description'].'</td><td>'.($RES['dd']+1).'</td><td nowrap>'.number_format($RES['price']*1.35, 2, '.', ' ').'р.</td><td><div class="cart"><input type="button" value="Купить" onclick="addToCartR(\''.$RES['brand'].'\',\''.$RES['number'].'\',\''.$RES['dd'].'\');" class="button"></div></td></tr>'; 
                }
                echo '</tbody></table>';
            }
            //echo '<pre>'; print_r($ext_products2); echo '</pre>';
        }
        ?>
        </div>
    </div>  
  
  
  
  
  <?php if (!$categories && !$products) { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('#content input[name=\'search\']').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#button-search').trigger('click');
	}
});

$('select[name=\'category_id\']').bind('change', function() {
	if (this.value == '0') {
		$('input[name=\'sub_category\']').attr('disabled', 'disabled');
		$('input[name=\'sub_category\']').removeAttr('checked');
	} else {
		$('input[name=\'sub_category\']').removeAttr('disabled');
	}
});

$('select[name=\'category_id\']').trigger('change');

$('#button-search').bind('click', function() {
	url = 'index.php?route=product/search';
	
	var search = $('#content input[name=\'search\']').attr('value');
	
	if (search) {
		url += '&search=' + encodeURIComponent(search);
	}

	var category_id = $('#content select[name=\'category_id\']').attr('value');
	
	if (category_id > 0) {
		url += '&category_id=' + encodeURIComponent(category_id);
	}
	
	var sub_category = $('#content input[name=\'sub_category\']:checked').attr('value');
	
	if (sub_category) {
		url += '&sub_category=true';
	}
		
	var filter_description = $('#content input[name=\'description\']:checked').attr('value');
	
	if (filter_description) {
		url += '&description=true';
	}

	location = url;
});

function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.products-block  .product-block').each(function(index, element) {
 
			 $(element).parent().addClass("col-fullwidth");
		});		
		
		$('.display').html('<span style="float: left;"><?php echo $text_display; ?></span><a class="list active"><span class="fa fa-th-list"></span><em><?php echo $text_list; ?></em></a><a class="grid"  onclick="display(\'grid\');"><span class="fa fa-th"></span><em><?php echo $text_grid; ?></em></a>');
	
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.products-block  .product-block').each(function(index, element) {
			 $(element).parent().removeClass("col-fullwidth");  
		});	
					
		$('.display').html('<span style="float: left;"><?php echo $text_display; ?></span><a class="list" onclick="display(\'list\');"><span class="fa fa-th-list"></span><em><?php echo $text_list; ?></em></a><a class="grid active"><span class="fa fa-th"></span><em><?php echo $text_grid; ?></em></a>');
	
	$.totalStorage('display', 'grid');
}
}

view = $.totalStorage('display');

if (view) {
	display(view);
} else {
	display('<?php echo $DISPLAY_MODE;?>');
}

//--></script> 


<?php if( $categoryPzoom ) {  ?>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.colorbox').colorbox({
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
//--></script>
<?php } ?>
</div>
</section>
<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
	<?php echo $column_right; ?>
</aside>
<?php endif; ?>
</div>
<?php echo $footer; ?>