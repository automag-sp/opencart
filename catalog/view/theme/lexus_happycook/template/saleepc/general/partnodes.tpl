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
<?
    $nodes = $saleepc['tree'];
    $node = $nodes[0];
    array_shift($nodes);
    $content = "";
    foreach ($nodes as $nextNode){
        $node_lev = $node['STR_LEVEL'];
        if ($node['STR_LEVEL'] == $nextNode['STR_LEVEL']){
            $content.='
                <li class="Node ExpandLeaf IsLast">
                    <div class="Expand"></div>
                    <div class="Content"><a href="index.php?route=saleepc/general/parts&modification_id='.$saleepc['modification']['TYP_ID'].'&partnode_id='.$node['GA_ID'].'" title="'.$node['TEX_TEXT'].'">'.$node['TEX_TEXT'].'</a></div>
                </li>
            ';
        }
        if ($node['STR_LEVEL'] < $nextNode['STR_LEVEL']){
            $content.='
                <li class="Node ExpandClosed">
                    <div class="Expand"></div>
                    <div class="Content">'.$node['TEX_TEXT'].'</div>
                    <ul class="Container">
            ';
        }
        if ($node['STR_LEVEL'] > $nextNode['STR_LEVEL']){
            $content.='
                <li class="Node ExpandLeaf IsLast">
                    <div class="Expand"></div>
                    <div class="Content"><a href="index.php?route=saleepc/general/parts&modification_id='.$saleepc['modification']['TYP_ID'].'&partnode_id='.$node['GA_ID'].'" title="'.$node['TEX_TEXT'].'">'.$node['TEX_TEXT'].'</a></div>
                </li>
            ';
            for ($i=0; $i<($node_lev-$nextNode['STR_LEVEL']); $i++){
                $content.='</ul></li>';
            }
        }

        $node = $nextNode;
    }

            $content.='
                <li class="Node ExpandLeaf IsLast">
                    <div class="Expand"></div>
                    <div class="Content"><a href="index.php?route=saleepc/general/parts&modification_id='.$saleepc['modification']['TYP_ID'].'&partnode_id='.$node['GA_ID'].'" title="'.$node['TEX_TEXT'].'">'.$node['TEX_TEXT'].'</a></div>
                </li>
            ';
            for ($i=0; $i<($node['STR_LEVEL']-2); $i++){
                $content.='</ul></li>';
            }

?>
<script type="text/javascript">
function tree_toggle(event) {
	event = event || window.event
	var clickedElem = event.target || event.srcElement

	if (!hasClass(clickedElem, 'Expand')) {
		return // клик не там
	}

	// Node, на который кликнули
	var node = clickedElem.parentNode
	if (hasClass(node, 'ExpandLeaf')) {
		return // клик на листе
	}

	// определить новый класс для узла
	var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
	// заменить текущий класс на newClass
	// регексп находит отдельно стоящий open|close и меняет на newClass
	var re =  /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
	node.className = node.className.replace(re, '$1'+newClass+'$3')
}


function hasClass(elem, className) {
	return new RegExp("(^|\\s)"+className+"(\\s|$)").test(elem.className)
}

</script>

<div onclick="tree_toggle(arguments[0])">
<ul class="Container">
  <li class="Node IsRoot IsLast ExpandOpen">

    <div class="Expand"></div>
    <div class="Content">Запчасти</div>
    <ul class="Container">


<?
    echo $content;
?>
    </ul>
 </li>
</ul>
</div>    
    


</div>  
	
	
	<?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.products-block  .product-block').each(function(index, element) {
 
			 $(element).parent().addClass("col-fullwidth");
		});		
		
		$('.display').html('<span style="float: left;"><?php echo $text_display; ?></span><a class="list active"><span class="fa fa-th-list"></span><em><?php echo $text_list; ?></em></a><a class="grid"  onclick="display(\'grid\');"><span class="fa fa-th"></span><em><?php echo $text_grid; ?></em></a>');
	
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.products-block  .product-block').each(function(index, element) {
			 $(element).parent().removeClass("col-fullwidth");  
		});	
					
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
