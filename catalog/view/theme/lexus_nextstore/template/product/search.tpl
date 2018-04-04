<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); 
	$themeConfig = (array)$this->config->get('themecontrol');
	 
	 $categoryConfig = array( 
		'listing_products_columns' 		     		=> 0,
		'listing_products_columns_small' 	     	=> 2,
		'listing_products_columns_minismall'    	=> 1,
		'cateogry_display_mode' 			     	=> 'grid',
		'category_pzoom'				          	=> 1,	
		'quickview'                                 => 0,
		'show_swap_image'                       	=> 0,
	); 
	$categoryConfig  	= array_merge($categoryConfig, $themeConfig );
	$DISPLAY_MODE 	 	= $categoryConfig['cateogry_display_mode'];
	$MAX_ITEM_ROW 	 	= $themeConfig['listing_products_columns']?$themeConfig['listing_products_columns']:4; 
	$MAX_ITEM_ROW_SMALL = $categoryConfig['listing_products_columns_small']?$categoryConfig['listing_products_columns_small']:2;
	$MAX_ITEM_ROW_MINI  = $categoryConfig['listing_products_columns_minismall']?$categoryConfig['listing_products_columns_minismall']:1; 
	$categoryPzoom 	    = $categoryConfig['category_pzoom']; 
	$quickview          = $categoryConfig['quickview'];
	$swapimg            = ($categoryConfig['show_swap_image'])?'swap':'';
?>

<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>
<div class="container">
<div class="row">

<?php if( $SPAN[0] ): ?>
	<aside class="col-md-<?php echo $SPAN[0];?>">
		<?php echo $column_left; ?>
	</aside>
<?php endif; ?> 

<?php $class_3cols = (!empty($column_left) && !empty($column_left))?'three-columns':''; ?>

<section class="col-md-<?php echo $SPAN[1];?> <?php echo $class_3cols;?> ">	
	<div id="content">
		<?php echo $content_top; ?>  
		<div class="search">
			<h1><?php echo $heading_title; ?></h1>
            <div class="box latest blue no-box">
                <div class="box-heading">
    	           <span>Товары на витрине:</span>
    	           <em class="shapes right"></em>	
    	           <em class="line"></em>
                </div>
    			<?php if ($products) { ?>
    				<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/product/product_collection.tpl" );  ?>
    			<?php } else {
    				echo "<h1 style=\"padding: 15px;\">NO PRODUCTS</h1>";
    			} ?>
      
    			<?php if (!$categories && !$products) { ?>
    			<div class="content"><div class="wrapper"><?php echo $text_empty; ?></div></div>
    			<div class="buttons">
    				<div class="right"><a href="<?php echo $continue; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></div>
    			</div>
    			<?php } ?>
            </div>			
			
			
            <div class="box latest blue no-box">
                <div class="box-heading">
    	           <span>Товары на складе:</span>
    	           <em class="shapes right"></em>	
    	           <em class="line"></em>
                </div>
                
                
                
                <?php
                //echo '<pre>'; print_r($ext_products); echo '</pre>';
                if (count($ext_brands)>0){
                    echo '<h3>Необходимо уточнить производителя:</h3>';
                    echo '<ul>';
                    foreach ($ext_brands as $item){
                        echo '<li><a href="/index.php?route=product/search&search='.$item->numberFix.'&brand='.$item->brand.'" title=""><b>'.$item->brand.'</b> <i>'.$item->number.'</i> '.$item->description.'</a></li>';
                        //echo '<pre>'; print_r($item); echo '</pre>';
                    }
                    echo '</ul>';
                } else {
                    if (count($ext_products)>0){
                    ?>
                                <h2>Запрошеный артикул <?=$BRAND?> <?=$NOMER?></h2>
                                <?
                                    $ext_products2 = array();
                                    $cnt_ask = 0;
                                    echo '<table class="list">';
                                    foreach ($ext_products['VOSHOD'] as $item){
                                        if ($BRAND == strtoupper(preg_replace('/[^0-9a-zA-Z]/ium', '',$item->brand)) and $NOMER == strtoupper(preg_replace('/[^0-9a-zA-Z]/ium', '',$item->number))) {
                                            $cnt_ask++;
                                            echo '<tr><td><b>'.$item->brand.'</b><br /><i>'.$item->number.'</i></td><td>'.$item->description.'</td><td>'.$item->availability.'</td><td nowrap>'.number_format($item->price*1.35, 2, '.', ' ').'р.</td></tr>';
                                        } else {
                                            //echo '<tr bgcolor="red"><td><b>'.$item->brand.'</b><br /><i>'.$item->number.'</i></td><td>'.$item->description.'</td><td>'.$item->availability.'</td><td nowrap>'.number_format($item->price*1.35, 2, '.', ' ').'р.</td></tr>';
                                            $ext_products2[] = $item;
                                        }
                                    }
                                    if ($cnt_ask == 0) echo "<tr><td colspan=4><h1 style=\"padding: 15px;\">Запрошеного артикула нет в продаже</h1></td></tr>";
                                    echo '</table>';
                                ?>
                                <h2>ЗАМЕНИТЕЛИ <?=$BRAND?> <?=$NOMER?></h2>
                                <table>
                                <tr><td valign="top">
                                
<?                                
                                    $cnt_ask = 0;
                                    echo '<table class="list">';
                                    foreach ($ext_products2 as $item){
                                        $cnt_ask++;
                                         echo '<tr><td><b>'.$item->brand.'</b><br /><i>'.$item->number.'</i></td><td>'.$item->description.'</td><td>'.$item->availability.'</td><td nowrap>'.number_format($item->price*1.35, 2, '.', ' ').'р.</td></tr>';
                                    }
                                    if ($cnt_ask == 0) echo "<tr><td colspan=6>Заменителей артикула нет в продаже</td></tr>";
                                    echo '</table>';
?>                                
                                
                                
                                </td>
                                <td valign="top">
        <!--                -->                        
                                    <div class="box gray">
                                        <div calss="box-heading" style="margin-top: 5px;">
                                            <div class="box-heading">Без кроссов</div>
                                            <div class="jplist-group box-content" style="margin-top: 0;" data-control-type="checkbox-group-filter" data-control-action="filter" data-control-name="finder">
                                                <input data-path=".CUR" id="CUR" type="checkbox"><label for="CUR">Запрошеный номер</label>
                                            </div>
                                        </div>
                                        <br style="clear: both" />
                       
                                        <div calss="box-heading" style="margin-top: 5px;">
                                            <div class="box-heading">Цена</div>
                                            <div class="jplist-range-slider box-content" style="margin-top: 0;" data-control-type="range-slider" data-control-name="range-slider-prices" data-control-action="filter" data-path=".price" data-slider-func="pricesSlider" data-setvalues-func="priesValues">
                                                <div class="value" data-type="prev-value"></div>
                                                <div class="ui-slider" data-type="ui-slider"></div>
                                                <div class="value" data-type="next-value"></div>
                                            </div>
                                        </div>
                                        <br style="clear: both" />
                
                                        <div calss="box" style="margin-top: 5px;">
                                            <div class="box-heading">Производитель</div>
                                            <div class="jplist-group box-content" style="margin-top: 0;" data-control-type="checkbox-group-filter" data-control-action="filter" data-control-name="brands"></div>
                                        </div>
        
                                    </div>         
        <!--                 -->                        
                                </td>
                            </tr>
                        </table>
                    <?
                    } else {
                        echo 'Нет товаров, которые соответствуют критериям поиска.';
                    }
                }
                ?>			
			</div></div>
    
			<?php echo $content_bottom; ?>
		</div>
  
  
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
		
		$('.display').html('<span style="float: left;"><?php echo $text_display; ?></span><a class="list active"><i class="fa fa-th-list"></i><em><?php echo $text_list; ?></em></a><a class="grid" onclick="display(\'grid\');"><i class="fa fa-th"></i><em><?php echo $text_grid; ?></em></a>');
	
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.products-block  .product-block').each(function(index, element) {
			 $(element).parent().removeClass("col-fullwidth");  
		});	
					
		$('.display').html('<span style="float: left;"><?php echo $text_display; ?></span><a class="list" onclick="display(\'list\');"><i class="fa fa-th-list"></i><em><?php echo $text_list; ?></em></a><a class="grid active"><i class="fa fa-th"></i><em><?php echo $text_grid; ?></em></a>');
	
		$.totalStorage('display', 'grid');
	}
}

view = $.totalStorage('display');

if (view) {
	display(view);
} else {
	display('<?php echo $DISPLAY_MODE;?>');
}
//-->
</script> 

</section>
 
<?php if( $SPAN[2] ): ?>
<aside class="col-md-<?php echo $SPAN[2];?>">	
	<?php echo $column_right; ?>
</aside>
<?php endif; ?>
</div></div></div>

<?php echo $footer; ?>