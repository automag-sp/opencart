<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); 
	$themeConfig = $this->config->get('themecontrol');
	 
	$DISPLAY_MODE = 'grid';
	if( isset($themeConfig['cateogry_display_mode']) ){
		$DISPLAY_MODE = $themeConfig['cateogry_display_mode'];
	}
	$MAX_ITEM_ROW =3; 
	if( isset($themeConfig['cateogry_product_row']) && $themeConfig['cateogry_product_row'] ){
		$MAX_ITEM_ROW = $themeConfig['cateogry_product_row'];
	}
	$categoryPzoom = isset($themeConfig['category_pzoom']) ? $themeConfig['category_pzoom']:0; 

?>
<?php echo $header; ?>
<div id="breadcrumb">
	<div class="container">
		<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
		</div>

	</div>
</div>
<div id="group-content">

 
<div class="span8">
<div id="content"><?php echo $content_top; ?>
  
 
  <h1 class="title-category"><?php echo $heading_title; ?></h1>
  
  
  
  
<form method="GET" action="/parts/hyundai/vin">
<h3 style="float: left; padding: 5px; "><?=$text_search_vin?>:</h3><input type="text" id="vin" name="vin" value="" class="inputtxt" /> <input type="submit" value=" <?=$text_search?> " class="inputbtn" /><br style="clear: both" />
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
<pre>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Emirates 728 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9563906671665018"
     data-ad-slot="3107295688"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</pre>
<div id="outItms">123</div>
<pre>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Emirates 728 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9563906671665018"
     data-ad-slot="3107295688"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</pre>
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
		s = s + '<div style="padding: 5px 0; margin: 5px 0; border-top: 1px solid #ccc;"><img src="http://img.saleepc.ru/hyundai/logo/'+models[key]['CatFolder']+'.jpg" alt="'+ models[key]['CatName'] +'" style="float: left; padding: 0 15px 0 0;" /><a href="/index.php?route=saleepc/hyundai/modifications&model=' + models[key]['CatFolder'] + '" title="' + models[key]['CatName'] + '">' + models[key]['CatName'] + '</a><br />' + models[key]['Family'] + '<br />' + models[key]['FromYear'] + ' - ' + models[key]['ToYear'] + '<br />' + models[key]['ProductionFrom'] + ' - ' + models[key]['ProductionTo'] + '</div><br style="clear: both;" />';
	}
	document.getElementById('outItms').innerHTML = s;
}

</script>
    
	
<?php echo $content_bottom; ?></div>


</div> 
<div class="span4">	
	<?php echo $column_right; ?>
	<pre>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- AUTOKAT - 300x600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-9563906671665018"
     data-ad-slot="3933573684"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</pre>	
</div>

</div>
<?php echo $footer; ?>