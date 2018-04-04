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
  <h1 class="heading_title">
  <?php
    if (file_exists(DIR_IMAGE.'data/general/types/'.strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND'])).'/'.$saleepc['model']['MOD_ID'].'.png')){
        ?>
            <img src="/image/data/general/types/<?=strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND']))?>/<?=$saleepc['model']['MOD_ID']?>.png" style="padding-right: 20px;" />
        <?php
    }
  ?>
  <span><?php echo $heading_title; ?></span></h1>


		<table class="list">
            <thead>
            <tr>
                <td>Модификация</td>
                <td>Топливо</td>
                <td>Двигатели</td>
                <td>Л.с.</td>
                <td>Объем</td>
                <td>Привод</td>
                <td>Период выпуска</td>
            </tr>
            </thead>
            <tbody>
<?
            foreach ($saleepc['modifications'] as $modification){
                echo '<tr><td><a href="/index.php?route=saleepc/general/carinfo&modification_id='.$modification['TYP_ID'].$to_only.'" title="'.$saleepc['manufacturer']['MFA_BRAND'].' '.$modification['TYP_NAME'].'">'.$modification['TYP_NAME'].'</a></td><td>'.$modification['ENG_NAME'].'</td><td>';
                foreach ($modification['engines'] as $engine){
                    echo $engine['ENG_CODE'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                }
                echo '<td>'.$modification['TYP_HP'].'</td><td>'.$modification['TYP_CCM'].'</td><td>'.$modification['DRV_NAME'].'</td><td>'. dt($modification['TYP_PCON_START']).' - '.dt($modification['TYP_PCON_END']).'</td></tr>';
            }
?>        
            </tbody>
        </table>

	</div>  
	
	<?php echo $content_bottom; ?></div>
</section> 
<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
		<?php echo $column_right; ?>
	</aside>
<?php endif; ?>
</div>
 
<?php echo $footer; ?>	
	
	
<?
    function dt($dt)
    {
        return ($dt?substr($dt, 4, 2).'/'.substr($dt, 0, 4):'Настоящее время');
    }

?>
