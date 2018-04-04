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
    if (file_exists(DIR_IMAGE.'logo/cars/'.strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND'])).'.png')){
        ?>
            <img src="/image/logo/cars/<?=strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND']))?>.png" style="padding-right: 20px;" width="100px" />
        <?php
    }
  ?>
  
  <span><?php echo $heading_title; ?></span></h1>
  <p>
    <?php for ($i=1995; $i<=date('Y'); $i++) echo '<button class="f-'.$i.'" style="margin: 3px; 5px;">'.$i.'</button>';?>
    <button class="f-all" style="margin: 3px; 5px;">Все года</button>
  </p>

  
  
  
        <div class="panel panel-default clearfix">
            <div class="panel-heading box-heading">
                <span>Выберите модель</span>
                <em class="shapes right"></em>	
                <em class="line"></em>
            </div>
            <div class="panel-body category-list clearfix box-content">
                    <?php
                        foreach ($saleepc['models'] as $group => $models){
                            $img_url = (file_exists(DIR_IMAGE.'data/general/models/'.strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND'])).'/'.$group.'.jpg')?'/image/data/general/models/'.strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND'])).'/'.$group.'.jpg':'/image/data/general/models/default.jpg');
                            ?>
                            <?php
                                if (count($models)<=1){
                                    $model = $models[0];
                                ?>
                                <div class="modelsdiv <?=classes($model['MOD_PCON_START'], $model['MOD_PCON_END'])?>" style="background-image:url(<?=$img_url?>);">
                                    <div class="modelname"><?=$group?></div>
                                    <a href="/index.php?route=saleepc/general/modifications&model_id=<?=$model['MOD_ID']?>&cartype=<?=$saleepc['cartype'].$to_only;?>" class="ampick" title="<?=$model['TEX_TEXT']?>"><?=$model['TEX_TEXT2']?><i>(<?=dt2($model['MOD_PCON_START'])?> - <?=dt2($model['MOD_PCON_END'])?>)</i></a>
                                </div>
                                <?php
                            } else {
                                $fr = date('Y');
                                $to = 0;
                                foreach ($models as $model){
                                    $fr1 = substr($model['MOD_PCON_START'], 0, 4);
                                    $to1 = $model['MOD_PCON_END']?substr($model['MOD_PCON_END'], 0, 4):date('Y');
                                    if ($fr1 < $fr) $fr = $fr1;
                                    if ($to1 > $to) $to = $to1;
                                }
                            ?>
                                
                                <div class="modelsdiv <?=classes($fr, $to)?>" style="background-image:url(<?=$img_url?>);">
                                    <div class="modelname"><?=$group?></div>
                                    <ul class="Navigation">
                                        <li class="ddpick"><a href="javascript:void(0)" >- Выбрать модель -</a>
                                            <ul>
                                            <?php foreach ($models as $model) {?>
                                                <li><a href="/index.php?route=saleepc/general/modifications&model_id=<?=$model['MOD_ID']?>&cartype=<?=$saleepc['cartype'].$to_only;?>" title="<?=$model['TEX_TEXT']?>"><?=$model['TEX_TEXT']?><i>(<?=dt2($model['MOD_PCON_START'])?> - <?=dt2($model['MOD_PCON_END'])?>)</i></a></li>
                                            <?php }?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            <?
                            }
                            ?>                                
                            <?php
                        }
                    ?>
			</div>
        </div>		
        
	</div>
<script type="text/javascript">
var fActive = '';
 
function filterColor(color){
    if(fActive != color){
        $('div.modelsdiv').filter('.c'+color).slideDown();
        $('div.modelsdiv').filter(':not(.c'+color+')').slideUp();
        fActive = color;
    }  
}
<?php
for ($i=1995; $i<=date('Y'); $i++) echo "$('.f-$i').click(function(){ filterColor('$i'); });"
?> 
$('.f-all').click(function(){
 $('div.modelsdiv').slideDown();
 fActive = 'all';
});
</script>	

	
	
	
	
	
	
	
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
    function classes($dt1, $dt2){
        $fr = substr($dt1, 0, 4);
        $to = $dt2?substr($dt2, 0, 4):date('Y');
        $years = array();
        for ($i=$fr; $i<=$to; $i++) $years[] = 'c'.$i;
        return implode(' ', $years); 
    }
    function dt($dt)
    {
        return ($dt?substr($dt, 4, 2).'/'.substr($dt, 0, 4):'Н/в');
    }

    function dt2($dt)
    {
        return ($dt?substr($dt, 0, 4):'Н/в');
    }

?>
