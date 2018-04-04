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
		
    <table>
<?
        foreach ($saleepc['parts'] as $part){
            //echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/general/'.$part['images'][0]['GRA_TAB_NR'].'/'.$part['images'][0]['GRA_ID'].'.jpg" alt="Рисунок" />':'').'</td><td>123</td></tr>';
//            echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/general/'.$part['images'][0]['GRA_TAB_NR'].'/'.$part['images'][0]['GRA_GRD_ID'].'.jpg" alt="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].' '.$part['GA_TEXT'].'"  width="100" />':'').'</td><td valign="top"><b>[ '.$part['SUP_BRAND'].' ] </b> : <a href="#" title="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].'">'.$part['ART_ARTICLE_NR'].'</a> - '.$part['GA_TEXT'].'<br />';
            echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/td/'.mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '',$part['SUP_BRAND'])).'/'.mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '',$part['ART_ARTICLE_NR'])).'.jpg" alt="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].' '.$part['GA_TEXT'].'"  width="100" />':'').'</td><td valign="top"><b>[ '.$part['SUP_BRAND'].' ] </b> : <a href="/index.php?route=product/search&search='.mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '',$part['ART_ARTICLE_NR'])).'&brand='.$part['SUP_BRAND'].'" title="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].'">'.$part['ART_ARTICLE_NR'].'</a> - '.$part['GA_TEXT'].'<br />';
            foreach ($part['descs'] as $desc){
                echo $desc['CR_TEXT'].': <i>'.$desc['M_TEXT'].$desc['LAC_VALUE'].'</i><br />';
            }
            echo '</td></tr>';
        }
?>    
    </table>
    <pre><?//=print_r($saleepc)?></pre>
    
    
</div>  
	
	
	<?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.products-block  .product-block').each(function(index, element) {
 
			 $(element).parent().addClass("col-fullwidth");
		});		
		<?php
            $text_list = isset($text_list) ? $text_list : '';
            $text_grid = isset($text_grid) ? $text_grid : '';
        ?>
		$('.display').html('<span style="float: left;"><?php echo (isset($text_display)?$text_display:'') ; ?></span><a class="list active"><span class="fa fa-th-list"></span><em><?php echo $text_list; ?></em></a><a class="grid"  onclick="display(\'grid\');"><span class="fa fa-th"></span><em><?php echo $text_grid; ?></em></a>');
	
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.products-block  .product-block').each(function(index, element) {
			 $(element).parent().removeClass("col-fullwidth");  
		});	
		<?php
            if(!isset($text_list)){
              $text_list = '';
            }
            if(!isset($text_grid)){
              $text_grid = '';
            }
            if(!isset($text_display)){
              $text_display = '';
            }
        ?>
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
