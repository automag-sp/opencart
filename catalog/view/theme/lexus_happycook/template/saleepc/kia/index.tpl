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
  
  
  
  
<form method="GET" action="index.php?route=saleepc/kia">
<input type="hidden" name="route" value="saleepc/kia/vin" />
<h3 style="float: left; padding: 5px; "><?=$text_search_vin?>:</h3><input type="text" id="vin" name="vin" value="" class="inputtxt" style="width: 20%" /> <input type="submit" value=" <?=$text_search?> " class="inputbtn" />
</form>
<label for="type"><?=$text_type?>:</label>&nbsp;<select id="type" name="type" onChange="selChange()" class="inputtxt"> 
<option value="ALL">ALL</option> 
<option value="0">Cars</option> 
<option value="1">SUV</option> 
<option value="2">Commercial</option> 
</select> 
<label for="year"><?=$text_year?>:</label>&nbsp;<select id="year" name="year" onChange="selChange()" class="inputtxt"> 
<option value="ALL">ALL</option> 
<option value="2014">2014</option> 
<option value="2013">2013</option> 
<option value="2012">2012</option> 
<option value="2011">2011</option> 
<option value="2010">2010</option> 
<option value="2009">2009</option> 
<option value="2008">2008</option> 
<option value="2007">2007</option> 
<option value="2006">2006</option> 
<option value="2005">2005</option> 
<option value="2004">2004</option> 
<option value="2003">2003</option> 
<option value="2002">2002</option> 
<option value="2001">2001</option> 
<option value="2000">2000</option> 
<option value="1999">1999</option> 
<option value="1998">1998</option> 
<option value="1997">1997</option> 
<option value="1996">1996</option> 
<option value="1995">1995</option> 
<option value="1994">1994</option> 
<option value="1993">1993</option> 
<option value="1992">1992</option> 
<option value="1991">1991</option> 
<option value="1990">1990</option> 
<option value="1989">1989</option> 
<option value="1988">1988</option> 
<option value="1987">1987</option> 
<option value="1986">1986</option> 
<option value="1985">1985</option> 
<option value="1984">1984</option> 
<option value="1983">1983</option> 
<option value="1982">1982</option> 
</select>
<label for="region"><?=$text_region?>:</label>&nbsp;<select id="region" name="region" onChange="selChange()" class="inputtxt"> 
<option value="ALL">ALL</option> 
<option value="HAC">Canada</option> 
<option value="HMA">USA</option> 
<option value="AUS">Australia</option> 
<option value="DOM">DOM</option> 
<option value="CIS">CIS</option> 
<option value="EUR">Europe</option> 
<option value="GEN">General</option> 
<option value="MES">Near East</option> 
<option value="CHN">China</option> 
</select>

<div id="outItms" class="media">123</div>

<script language="JavaScript" type="text/JavaScript">
var models = <?=json_encode($saleepc['models'])?>;
selChange();
function selChange() {
	var year =  document.getElementById('year').value;
	var region = document.getElementById('region').value;
	var type = document.getElementById('type').value;
	
	var s = '';
	for (var key in models) {
    	if (type != 'ALL'){
	       if (models[key]['MenuCategories'] != type) continue;
	   }
	   if (region != 'ALL'){
	       if (models[key]['DataRegions'].indexOf(region) == -1) continue;
	   }
	   if (year != 'ALL'){
	       if (models[key]['FromYear'] > year) continue;
	       if ((models[key]['ToYear'] != null)&&(models[key]['ToYear'] < year)) continue;
	   }
		s = s + '<div style="padding: 5px 0; margin:30px 0; border-top: 1px solid #ccc;"><img src="http://img.saleepc.ru/kia/logo/'+models[key]['CatFolder']+'.jpg" alt="'+ models[key]['CatName'] +'" style="float: left; padding: 0 15px 0 0;" /><a href="/index.php?route=saleepc/kia/modifications&model=' + models[key]['CatFolder'] + '" title="' + models[key]['CatName'] + '">' + models[key]['CatName'] + '</a><br />' + models[key]['Family'] + '<br />' + models[key]['FromYear'] + ' - ' + models[key]['ToYear'] + '<br />' + models[key]['ProductionFrom'] + ' - ' + models[key]['ProductionTo'] + '</div>';
	}
	document.getElementById('outItms').innerHTML = s;
}

</script>




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