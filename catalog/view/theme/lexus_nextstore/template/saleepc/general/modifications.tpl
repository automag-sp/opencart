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

		<table class="list">
            <thead>
            <tr>
                <td>Модификация</td>
                <td>Топливо</td>
                <td>Двигатели</td>
                <td>Л.с.</td>
                <td>Объем</td>
                <td>Привод</td>
                <td>Период выпуска</td>
            </tr>
            </thead>
            <tbody>
<?
            foreach ($saleepc['modifications'] as $modification){
                echo '<tr><td><a href="/index.php?route=saleepc/general/partnodes&modification_id='.$modification['TYP_ID'].'" title="'.$saleepc['manufacturer']['MFA_BRAND'].' '.$modification['TYP_NAME'].'">'.$modification['TYP_NAME'].'</a></td><td>'.$modification['ENG_NAME'].'</td><td>';
                foreach ($modification['engines'] as $engine){
                    echo $engine['ENG_CODE'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                }
                echo '<td>'.$modification['TYP_HP'].'</td><td>'.$modification['TYP_CCM'].'</td><td>'.$modification['DRV_NAME'].'</td><td>'. dt($modification['TYP_PCON_START']).' - '.dt($modification['TYP_PCON_END']).'</td></tr>';
            }
?>        
            </tbody>
        </table>

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
        
        