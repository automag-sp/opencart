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
    <table><tr>
    
    <td height="150px" width="300px" valign="top">
    <div class="secnode" title="<?//=$group['TEX_TEXT']?>" style="background-image:url(/image/data/general/sections/<?=$saleepc['node']['STR_ID']?>.jpg);">
        <a href="#" ><?=$saleepc['node']['TEX_TEXT']?></a>
    </div>
    </td>
    <td rowspan="3" valign="top">
    <div style="float: left; margin: 10px; padding: 0 20px; background-color: #ffffff; background-position: top center; background-repeat: no-repeat; border: 1px solid #ffffff; -moz-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px; -moz-box-shadow: 2px 2px 8px rgba(0,0,0,0.4); -webkit-box-shadow: 2px 2px 8px rgba(0,0,0,0.4); box-shadow: 2px 2px 8px rgba(0,0,0,0.4);">
        <ul id="files">
        <? 
        echo print_level($saleepc['parents'], $saleepc['tree'], $saleepc['node']['STR_ID'], $saleepc['modification']['TYP_ID'])?>
        </ul>
    </div>
    </td></tr>
    <tr><td height="50px"><h2>Другие группы</h2></td></tr>
    <tr><td valign="top">
<?
    foreach ($saleepc['parents']['10001'] as $gr){
        if ($gr['STR_ID'] == $saleepc['node']['STR_ID']) continue;
?>
    <div class="secnode2" title="<?=$gr['TEX_TEXT']?>" style="background-image:url(/image/data/general/sections/<?=$gr['STR_ID']?>.jpg); background-size: cover;">
        <a href="/index.php?route=saleepc/general/partnodes&modification_id=<?=$saleepc['modification']['TYP_ID']?>&ga=<?=$gr['STR_ID']?>" >&nbsp;</a>
    </div>

<?        
    }
?>    
    </td></tr>
    </table>
<?
function print_level(&$nodes, &$tree, $str_id, $modification)
{
    if (isset($nodes[$str_id])){
        $ret= '<li><a href="#">'.$tree[$str_id]['TEX_TEXT'].'</a><ul>';
        foreach ($nodes[$str_id] as $node){
            $ret.=print_level($nodes, $tree, $node['STR_ID'], $modification);
        }
        $ret.='</ul></li>';
    } else {
        $ret='<li><a href="/index.php?route=saleepc/general/parts&modification_id='.$modification.'&partnode_id='.$tree[$str_id]['GA_ID'].'">'.$tree[$str_id]['TEX_TEXT'].'</a></li>';
    }
    return $ret;
}
?>    


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
