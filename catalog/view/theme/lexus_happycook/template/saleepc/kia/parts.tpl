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

<?
    $q = '&';
    if (isset($saleepc['vin'])){
        $q.='vin='.$saleepc['vin'].'&vinid='.$saleepc['vinid'];
    }else{
        foreach ($saleepc['options'] as $k => $v) $q.=$k.'='.$v.'&';
    }
?>



<style type="text/css"> 
    tr.rowt, td.rowt { background: #F7F7F7; cursor:hand; padding: 3px 2px;}
	tr.row_over,  td.row_over { background: #DBDBDB; cursor:hand; padding: 3px 2px;}
</style> 
<script>
function select_items(prefix, n){
        Opera = (document.getElementsByTagName('*'));
        IE = (document.all);
        if (Opera)de = Opera;
        if (IE)de = IE;
        
        
        for (i=0; i<de.length; i++) {
             if (!de[i].id){
                     continue;
             }
             name = de[i].id;
             if (name.substring(0,prefix.length) == prefix){
                  reg = /_([A-Z0-9]+)/;
                  res = reg.exec(name);
                  if (!res) continue;
                  if (n == res[1]){
                          style_items(de[i], true);
                  }else{
                          style_items(de[i], false);
                  }
                  
             }
        }
}
        function style_items(obj, s){
                if (s){
                        obj.className = 'row_over';
                }else{
                        obj.className = 'rowt';
                }
         }
 </script>

 
<table>
    <tr>
        <td valign="top">
            <table class="list">
                <thead>
                    <tr><th>PNC</th><th>Номер</th><th>Название</th><th>С</th><th>По</th><th>Кол</th><th>its</th></tr>
                </thead>
                <tbody>
<?
                    $i=0;
                    foreach ($saleepc['parts'] as $part){
                        if ($part['partnomer']=='') continue;
                        $i++;
                        echo '<tr class="rowt" id="itms_'.$part['PNC'].'_'.$i.'">
                            <td>'.$part['PNC'].'</td>
                            <td><a href="/index.php?route=product/search&search='.$part['partnomer'].'&brand=Hyundai-KIA">'.$part['partnomer'].'</a></td>
                            <td>'.$part['part_name'].'</td>
                            <td>'.dt($part['FromDate']).'</td>
                            <td>'.dt($part['ToDate']).'</td>
                            <td>'.$part['quantity'].'</td>
                            <td>'.$part['its'].'</td>
                            </tr>';
                    }
?>
                </tbody>
            </table>

        </td>
        <td valign="top" style="padding-left: 10px">
            <img src="http://img.saleepc.ru/kia/<?=$saleepc['model']['CatFolder']?>/<?=$saleepc['subgroup']['subgroup_id']?>.png" usemap="#Navigation"/>
            <p><map name="Navigation">
<?
            foreach ($saleepc['img_map'] as $itm){
                if ($itm['typ'] ==5) {
                    echo '<area shape="rect" coords="'.($itm['x']).', '.($itm['y']).', '.($itm['x1']).', '.($itm['y1']).'" href="/index.php?route=saleepc/kia/parts&model='.$saleepc['model']['CatFolder'].'&subgroup='.$itm['itm_id'].'11'.$q.'" title="'.$itm['itm_id'].'">';
                } else {
                    echo '<area shape="rect" coords="'.($itm['x']).', '.($itm['y']).', '.($itm['x1']).', '.($itm['y1']).'" href="#" onclick="select_items(\'itms\', \''.$itm['itm_id'].'\'); return false" title="'.$itm['itm_id'].'">';
                }
            }
?>
            </map></p>
            <?php echo $column_left; ?> <?php echo $column_right; ?>  

        </td>
    </tr>
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
<?
function dt($dt){
    if ($dt=='') return ''; return substr($dt,6,2).'/'.substr($dt,4,2).'/'.substr($dt,0,4);
}