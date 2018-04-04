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

    
		


<script>
function show(imageName)
{
    var node = document.getElementById('imagePlase');
    var brX = document.getElementById('imageParent');
    var br = brX.getBoundingClientRect();
    /*
    alert("Top:"+br.top+", Left:"+br.left+", Right:"+br.right+", Bottom:"+br.bottom);
    */
    node.innerHTML = '<img src="http://img.autosovet.ru/vag12/SK/'+imageName.substr(6, 3)+'/'+imageName.substr(6, 3)+imageName.substr(1, 5)+imageName.substr(0, 1)+'.gif" width=450>';
}
</script>

<?
$regions = array(
		'BR' => 'Бразилия', 
		'CA' => 'Китай', 
		'MEX' => 'Мексика', 
		'RA' => 'RA', 
		'RDW' => 'Европа', 
		'USA' => 'Америка', 
		'CZ' => 'Европа', 
		'USA' => 'Америка', 
		'SVW' => 'Китай' 
	);
?>
<table>
	<tr>
		<td width="500" valign="top">
			<table class="list">
<?			
	foreach ($saleepc['subgroups'] as $subgroup){
	    foreach ($subgroup['descrs'] as $row){
            echo '<tr onclick="show(\''.$subgroup['img'].'\')" onDblClick="document.location=\'/index.php?route=saleepc/skoda/parts&model='.$saleepc['year']['id'].'&subgroup='.$row['id'].'\'" style="cursor: pointer;"><td nowrap>'.substr($subgroup['hgug'], 0, 1).' - '.substr($subgroup['hgug'], 1, 2).'</td><td>';
            ////////////////////////////////////////////
                $texts = $row['tsben'];
                $texts2 = (array)unserialize($row['tsmoa']);
                $cnt = max(count($texts2), count($texts));
                for($i = 0; $i < $cnt; $i++){
                    if (isset($texts[$i])){
                        $rows = (array)unserialize($texts[$i]['tex']);
                        foreach ($rows as $line) echo $line;
                    }
                    if (isset($texts2[$i])) echo $texts2[$i];
                    echo '<br />';
                }
            ///////////////////////////////////////////
            echo '</td><td>';
            /////////////////////////////////////////// ПРАВИМ ВЫВОД !!!! ////////////////////////////
                $texts = $row['benennung'];
                $texts2 = (array)unserialize($row['modellangabe']);
                $cnt = max(count($texts2), count($texts));
                for($i = 0; $i < $cnt; $i++){
                    if (isset($texts[$i])){
                        $rows = (array)unserialize($texts[$i]['tex']);
                        foreach ($rows as $line) echo $line;
                    }
                    if (isset($texts2[$i])) echo $texts2[$i];
                    echo '<br />';
                }
            ///////////////////////////////////////////////////////////////////////////////////////////
            echo '</td><td>';
                $texts = $row['tsbem'];
                $texts2 = (array)unserialize($row['stock']);
                $cnt = max(count($texts2), count($texts));
                for($i = 0; $i < $cnt; $i++){
                    if (isset($texts[$i])){
                        $rows = (array)unserialize($texts[$i]['tex']);
                        foreach ($rows as $line) echo str_replace('.+', '', $line);
                    }
                    if (isset($texts2[$i])) echo $texts2[$i];
                    echo '<br />';
                }
            echo '</td></tr>';
	    }
	}
?>
			</table>
		</td>
		<td valign="top" >
		<div id="imageParent">
		<div id="imagePlase">
<font color="Red">
    <ul>
        <li>Один клик по строке с названием - показывает картинку</li>
        <li>Двойной клик по строке с названием - переход к запчастям</li>
    </ul>
</font>		
		</div>
		</div>
		
		</td>
	</tr>
</table>
		
		
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