<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<div class="container">
<div class="row">

<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
		<?php echo $column_left; ?>
	</aside>
<?php endif; ?>

<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">
	<div id="content">
		<?php echo $content_top; ?>		
		<h1><?php echo $heading_title; ?></h1>		
		
        <div class="panel panel-default refine-searchN clearfix box whiteN">
            <div class="panel-heading box-heading">
                <span>Выберите модель</span>
                <em class="shapes right"></em>	
                <em class="line"></em>
            </div>
            <div class="panel-body category-list clearfix box-content">
        		<ul>
                    <?php
                        foreach ($saleepc['models'] as $model){
                            echo '<li><a href="/index.php?route=saleepc/general/modifications&model_id='.$model['MOD_ID'].'&cartype='.$saleepc['cartype'].'" title="'.$model['TEX_TEXT'].'">'.$model['TEX_TEXT'].' <i>('.dt($model['MOD_PCON_START']).' - '.dt($model['MOD_PCON_END']).')</i> </a></li>';
                        }
                    ?>
                </ul>
			</div>
        </div>		
        
	</div>  
	
	<?php echo $content_bottom; ?>
	</section>
	
	<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
		<?php echo $column_right; ?>
	</aside>
<?php endif; ?>

</div></div>

<?php echo $footer; ?>
<?
    function dt($dt)
    {
        return ($dt?substr($dt, 4, 2).'/'.substr($dt, 0, 4):'Настоящее время');
    }

?>
