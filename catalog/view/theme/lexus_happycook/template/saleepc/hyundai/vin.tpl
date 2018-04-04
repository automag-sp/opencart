<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); 
	$themeConfig = $this->config->get('themecontrol');
	 
	 $categoryConfig = array( 
		'listing_products_columns' 		     => 0,
		'listing_products_columns_small' 	 => 2,
		'listing_products_columns_minismall' => 1,
		'cateogry_display_mode' 			 => 'grid',
		'category_pzoom'				     => 1,
		'quickview'                          => 0,
		'show_swap_image'                    => 0,
	); 
	$categoryConfig  = array_merge($categoryConfig, $themeConfig );
	$DISPLAY_MODE 	 = $categoryConfig['cateogry_display_mode'];
	$MAX_ITEM_ROW 	 = $themeConfig['listing_products_columns']?$themeConfig['listing_products_columns']:4; 
	$MAX_ITEM_ROW_SMALL = $categoryConfig['listing_products_columns_small'] ;
	$MAX_ITEM_ROW_MINI  = $categoryConfig['listing_products_columns_minismall']; 
	$categoryPzoom 	    = $categoryConfig['category_pzoom']; 
	$quickview          = $categoryConfig['quickview'];
	$swapimg            = $categoryConfig['show_swap_image'];
?>
<?php echo $header; ?>
 
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" ); ?>


<div id="group-content">
<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
		<?php echo $column_left; ?>
	</aside>	
<?php endif; ?> 
<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">
<div id="content"><?php echo $content_top; ?>
  <h1 class="heading_title"><span><?php echo $heading_title; ?></span></h1>

<div class="saleepc">
<table>

<?php
    foreach ($saleepc['vindecodes'] as $vinitm){
        echo '<tr><td valign="top" style="padding: 5px;"><img src="http://img.saleepc.ru/hyundai/logo/'.$vinitm['model']['CatFolder'].'.jpg" alt="'.$vinitm['model']['CatName'].'" /></td>
        <td valign="top" style="padding: 5px;"><h3>'.$saleepc['vin'].'</h3><a href="/index.php?route=saleepc/hyundai/groups&model='.$vinitm['model']['CatFolder'].'&vin='.$vinitm['vin'].'&vinid='.$vinitm['id'].'" title="'.$vinitm['model']['CatName'].'">'.$vinitm['model']['CatName'].'</a><br />Date:'.substr($vinitm['dt'], 6, 2).'.'.substr($vinitm['dt'], 4, 2).'.'.substr($vinitm['dt'], 0, 4).'<br /></td><td valign="top"  style="padding: 5px;">';
        foreach ($vinitm['options'] as $desk_key => $desk){
            echo '('.$desk_key.') '.$desk['lex_lex1'].': '.$desk['lex_lex2'].'<br />';
        }
        echo '</td></tr><tr><td colspan="2"><h2>Список опций:</h2><ul style="height: 270px; overflow-y: scroll;">';
        foreach ($saleepc['vin_options'] as $key => $val){
            echo "<li><b>$key</b> - $val</li>";
        }
        echo '</ul></td><td valign="top"  style="padding: 5px;">';
?>
        <ul>
            <li>Drive Type: <?=$saleepc['vins']['DriveType']?></li>
            <li>Model: <?=$vinitm['code_1']?></li>
            <li>Country: <?=$saleepc['vins']['Country']?></li>
            <li>Region: <?=$saleepc['vins']['Region3']?></li>
            <li>Plant: <?=$saleepc['vins']['Plant']?></li>
            <li>Engine Factory: <?=$saleepc['vins']['EngFactory']?> <?=$saleepc['vins']['EngFactory2']?></li>
            <li>Engine Number: <?=$saleepc['vins']['EngNum']?></li>
            <li>Engine Code: <?=$saleepc['vins']['EngCode']?></li>
            <li>Transmission Number: <?=$saleepc['vins']['TransNum']?></li>
            <li>Transmission Code: <?=$saleepc['vins']['TransCode']?></li>
            <li>Exterior Color: <?=$saleepc['vins']['ExtCol']?></li>
            <li>Interior Color: <?=$saleepc['vins']['IntCol']?></li>
        </ul>
<?        
        echo '</td></tr>';
    }
        
?>
</table>

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