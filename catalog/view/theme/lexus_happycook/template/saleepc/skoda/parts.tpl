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
<table class="noborder">
<tr>
<td valign="top" width="400">
<img src="http://img.autosovet.ru/vag12/SK/<?=substr($saleepc['image']['img'], 6, 3)?>/<?=substr($saleepc['image']['img'], 6, 3).substr($saleepc['image']['img'], 1, 5).substr($saleepc['image']['img'], 0, 1)?>.gif" title="Запчасти" width="380"/>
<?php echo $column_left; ?><?php echo $column_right; ?>
</td>
<td valign="top">

<table class="list">
<thead>
    <tr>
        <td>#</td>
        <td></td>
        <td>Номер</td>
        <td>Наименование</td>
        <td>Примечание</td>
        <td>Шт</td>
        <td>Данные модели</td>
    </tr></thead>
<?
error_reporting(0);
    foreach ((array)$saleepc['parts'] as $part){
        if ($part['ou'] == 'U'){
            // НАДГРУППА
            echo '<tr bgcolor="FFDDDD"><td></td><td></td><td></td><td>';
                $texts = $part['tsben'];
                $texts2 = (array)unserialize($part['tsmoa']);
                $cnt = max(count($texts2), count($texts));
                for($i = 0; $i < $cnt; $i++){
                    if (isset($texts[$i])){
                        $rows = (array)unserialize($texts[$i]['tex']);
                        foreach ($rows as $line) echo $line;
                    }
                    if (isset($texts2[$i])) echo $texts2[$i];
                    echo '<br />';
                }
                /*
                foreach ($part['tsben'] as $txt){
                    $texts = unserialize($txt['tex']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                }
                $texts = unserialize($part['tsmoa']);
                foreach ((array)$texts as $line) echo "$line<br />";
                */
            echo '</td><td>';
                $texts = $part['benennung'];
                $texts2 = (array)unserialize($part['modellangabe']);
                $cnt = max(count($texts2), count($texts));
                for($i = 0; $i < $cnt; $i++){
                    if (isset($texts[$i])){
                        $rows = (array)unserialize($texts[$i]['tex']);
                        foreach ($rows as $line) echo $line;
                    }
                    if (isset($texts2[$i])) echo $texts2[$i];
                    echo '<br />';
                }
                /*
                foreach ($part['benennung'] as $txt){
                    $texts = unserialize($txt['tex']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                }
                $texts = unserialize($part['modellangabe']);
                foreach ((array)$texts as $line) echo "$line<br />";
                */
            echo '</td><td>';            
            echo '</td><td>';
                $texts = $part['tsbem'];
                $texts2 = (array)unserialize($part['stock']);
                $cnt = max(count($texts2), count($texts));
                for($i = 0; $i < $cnt; $i++){
                    if (isset($texts[$i])){
                        $rows = (array)unserialize($texts[$i]['tex']);
                        foreach ($rows as $line) echo $line;
                    }
                    if (isset($texts2[$i])) echo $texts2[$i];
                    echo '<br />';
                }
                /*
                foreach ($part['tsbem'] as $txt){
                    $texts = unserialize($txt['tex']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                }
                $texts = unserialize($part['stock']);
                foreach ((array)$texts as $line) echo "$line<br />";
                */
            echo '</td></tr>';
            foreach ($part['depend'] as $dpart){
                /////////////////////////////
                echo '<tr><td>'.$dpart['btpos'].'</td><td></td><td><a href="/index.php?route=product/search&search='.$dpart['nomer'].'&brand=VAG">'.$dpart['nomer'].'</a></td><td>';
                    $texts = $dpart['tsben'];
                    $texts2 = (array)unserialize($dpart['tsmoa']);
                    $cnt = max(count($texts2), count($texts));
                    for($i = 0; $i < $cnt; $i++){
                        if (isset($texts[$i])){
                            $rows = (array)unserialize($texts[$i]['tex']);
                            foreach ($rows as $line) echo $line;
                        }
                        if (isset($texts2[$i])) echo $texts2[$i];
                        echo '<br />';
                    }
                    /*
                    foreach ($dpart['tsben'] as $txt){
                        $texts = unserialize($txt['tex']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                    $texts = unserialize($dpart['tsmoa']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                    }
                    */
                echo '</td><td>';
                    $texts = $dpart['benennung'];
                    $texts2 = (array)unserialize($dpart['modellangabe']);
                    $cnt = max(count($texts2), count($texts));
                    for($i = 0; $i < $cnt; $i++){
                        if (isset($texts[$i])){
                            $rows = (array)unserialize($texts[$i]['tex']);
                            foreach ($rows as $line) echo $line;
                        }
                        if (isset($texts2[$i])) echo $texts2[$i];
                        echo '<br />';
                    }
                    /*
                    foreach ($dpart['benennung'] as $txt){
                        $texts = unserialize($txt['tex']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                    }
                    $texts = unserialize($dpart['modellangabe']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                    */
                echo '</td><td>';            
                    $texts = unserialize($dpart['bemerkung']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                echo '</td><td>';
                    $texts = $dpart['tsbem'];
                    $texts2 = (array)unserialize($dpart['stock']);
                    $cnt = max(count($texts2), count($texts));
                    for($i = 0; $i < $cnt; $i++){
                        if (isset($texts[$i])){
                            $rows = (array)unserialize($texts[$i]['tex']);
                            foreach ($rows as $line) echo $line;
                        }
                        if (isset($texts2[$i])) echo $texts2[$i];
                        echo '<br />';
                    }
                    /*
                    foreach ($dpart['tsbem'] as $txt){
                        $texts = unserialize($txt['tex']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                    }
                    $texts = unserialize($dpart['stock']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                    */
                echo '</td></tr>';
                /////////////////////////////
            }
        } else {
            // ЗАПЧАСТЬ
                echo '<tr><td>'.$part['btpos'].'</td><td></td><td><a href="/index.php?route=product/search&search='.$part['nomer'].'&brand=VAG">'.$part['nomer'].'</a></td><td>';
                    $texts = $part['tsben'];
                    $texts2 = (array)unserialize($part['tsmoa']);
                    $cnt = max(count($texts2), count($texts));
                    for($i = 0; $i < $cnt; $i++){
                        if (isset($texts[$i])){
                        	try {
                            	$rows = (array)unserialize($texts[$i]['tex']);
                        	} catch (Exception $e){
                        		$rows = array();
                        	}
                            foreach ($rows as $line) echo $line;
                        }
                        if (isset($texts2[$i])) echo $texts2[$i];
                        echo '<br />';
                    }
                    /*
                    foreach ($part['tsben'] as $txt){
                        $texts = unserialize($txt['tex']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                        $texts = unserialize($part['tsmoa']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                    }
                    */
                echo '</td><td>';
                    $texts = $part['benennung'];
                    $texts2 = (array)unserialize($part['modellangabe']);
                    $cnt = max(count($texts2), count($texts));
                    for($i = 0; $i < $cnt; $i++){
                        if (isset($texts[$i])){
                            $rows = (array)unserialize($texts[$i]['tex']);
                            foreach ($rows as $line) echo $line;
                        }
                        if (isset($texts2[$i])) echo $texts2[$i];
                        echo '<br />';
                    }
                    /*
                    foreach ($part['benennung'] as $txt){
                        $texts = unserialize($txt['tex']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                    }
                    $texts = unserialize($part['modellangabe']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                    */
                echo '</td><td>';            
                    $texts = unserialize($part['bemerkung']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                echo '</td><td>';
                    $texts = $part['tsbem'];
                    $texts2 = (array)unserialize($part['stock']);
                    $cnt = max(count($texts2), count($texts));
                    for($i = 0; $i < $cnt; $i++){
                        if (isset($texts[$i])){
                            $rows = (array)unserialize($texts[$i]['tex']);
                            foreach ($rows as $line) echo $line;
                        }
                        if (isset($texts2[$i])) echo $texts2[$i];
                        echo '<br />';
                    }
                    /*
                    foreach ($part['tsbem'] as $txt){
                        $texts = unserialize($txt['tex']);
                        foreach ((array)$texts as $line) echo "$line<br />";
                    }
                    $texts = unserialize($part['stock']);
                    foreach ((array)$texts as $line) echo "$line<br />";
                    */
                echo '</td></tr>';
        }
    }
?>

</table>

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