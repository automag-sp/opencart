<?php if( isset($widget_name)){
	?>
	<h3 class="menu-title"><span class="menu-title"><em class="fa fa-caret-right"></em><?php echo $widget_name;?></span></h3>
	<?php
}?>
<div class="widget-html">
	<div class="widget-inner">
		<?php echo $html; ?>
	</div>
</div>