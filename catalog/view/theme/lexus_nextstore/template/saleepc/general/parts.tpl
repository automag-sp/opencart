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
		
    <table>
<?
        foreach ($saleepc['parts'] as $part){
            //echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/general/'.$part['images'][0]['GRA_TAB_NR'].'/'.$part['images'][0]['GRA_ID'].'.jpg" alt="Рисунок" />':'').'</td><td>123</td></tr>';
//            echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/general/'.$part['images'][0]['GRA_TAB_NR'].'/'.$part['images'][0]['GRA_GRD_ID'].'.jpg" alt="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].' '.$part['GA_TEXT'].'"  width="100" />':'').'</td><td valign="top"><b>[ '.$part['SUP_BRAND'].' ] </b> : <a href="#" title="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].'">'.$part['ART_ARTICLE_NR'].'</a> - '.$part['GA_TEXT'].'<br />';
            echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/td/'.mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '',$part['SUP_BRAND'])).'/'.mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '',$part['ART_ARTICLE_NR'])).'.jpg" alt="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].' '.$part['GA_TEXT'].'"  width="100" />':'').'</td><td valign="top"><b>[ '.$part['SUP_BRAND'].' ] </b> : <a href="/index.php?route=product/search&search='.mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '',$part['ART_ARTICLE_NR'])).'&brand='.$part['SUP_BRAND'].'" title="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].'">'.$part['ART_ARTICLE_NR'].'</a> - '.$part['GA_TEXT'].'<br />';
            foreach ($part['descs'] as $desc){
                echo $desc['CR_TEXT'].': <i>'.$desc['M_TEXT'].$desc['LAC_VALUE'].'</i><br />';
            }
            echo '</td></tr>';
        }
?>    
    </table>
    <pre><?//=print_r($saleepc)?></pre>
    
    
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
            