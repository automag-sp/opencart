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


<table class="list">
<?

    $q = '&';
    if (isset($saleepc['vin'])){
        $q.='vin='.$saleepc['vin'].'&vinid='.$saleepc['vinid'];
    }else{
        foreach ($saleepc['options'] as $k => $v) $q.=$k.'='.$v.'&';
    }


    foreach ($saleepc['subgroups'] as $subgroup){
        echo '<tr><td>'.$subgroup['fl7'].'</td><td>'.$subgroup['page'].'</td><td><a href="/index.php?route=saleepc/hyundai/parts&model='.$saleepc['model']['CatFolder'].'&subgroup='.$subgroup['subgroup_id'].$q.'" title="'.$saleepc['model']['CatName'].' '.$subgroup['sgroup_name'].'">'.$subgroup['sgroup_name'].'</a></td><td>';
        /*
        foreach ($subgroup['options_desc'] as $desc_arr){
            foreach ($desc_arr as $desc_key => $desc_name){
                echo $desc_key.'&nbsp;-&nbsp; '.$desc_name.' ';
            }
        }
        */
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