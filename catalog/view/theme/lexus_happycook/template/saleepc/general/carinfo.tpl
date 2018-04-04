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
  <?php
  if(!empty($add_car_text)) {
    ?>
      <a href="<?php print $add_car_link;?>" class="button"><?php print $add_car_text; ?></a>
    <?php
  }
  ?>
    <div class="tabs-group">
        <div id="tabs" class="htabs clearfix">
            <a href="#tab-description">Инфо</a>
            <a href="#tab-tyres">Шины диски</a>
            <a href="#tab-to">Детали ТО</a>
            <a href="#tab-parts">Запчасти</a>
            <a href="#tab-oil">Жидкости</a>
        </div>
        <div id="tab-description" class="tab-content">
        <table class="list">
            <tbody>
                <?php if ($saleepc['modification']['TEX_BODY']<>''){
                    echo '<tr><td>Кузов:</td><td>'.$saleepc['modification']['TEX_BODY'].'</td></tr>';
                }
                ?>
                <tr><td>Начало выпуска:</td><td><?=dt($saleepc['modification']['TYP_PCON_START'])?></td></tr>
                <?php if ($saleepc['modification']['TYP_PCON_END']<>''){
                    echo '<tr><td>Окончание выпуска:</td><td>'.dt($saleepc['modification']['TYP_PCON_END']).'</td></tr>';
                }
                ?>
                <tr><td>Мощность:</td><td><?=$saleepc['modification']['TYP_KW_FROM']?>kw/ <?=$saleepc['modification']['TYP_HP_FROM']?>л.с.</td></tr>
                <tr><td>Объем:</td><td><?=$saleepc['modification']['TYP_LITRES']?> л. (<?=$saleepc['modification']['TYP_CCM_TAX']?>)</td></tr>
                <tr><td>Цилиндры / клапана:</td><td><?=$saleepc['modification']['TYP_CYLINDERS']?> / <?=$saleepc['modification']['TYP_VALVES']?></td></tr>
                <?php if ($saleepc['modification']['TEX_VOLTAGE']<>''){
                    echo '<tr><td>Вольтаж:</td><td>'.$saleepc['modification']['TEX_VOLTAGE'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_ENGINE']<>''){
                    echo '<tr><td>Двигатель:</td><td>'.$saleepc['modification']['TEX_ENGINE'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_FUELSUPL']<>''){
                    echo '<tr><td>Впрыск:</td><td>'.$saleepc['modification']['TEX_FUELSUPL'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_FUEL']<>''){
                    echo '<tr><td>Тип топлива:</td><td>'.$saleepc['modification']['TEX_FUEL'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_CATALYST']<>''){
                    echo '<tr><td>Катализатор:</td><td>'.$saleepc['modification']['TEX_CATALYST'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_BRAKESYS']<>''){
                    echo '<tr><td>Тормозная система:</td><td>'.$saleepc['modification']['TEX_BRAKESYS'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_ABS']<>''){
                    echo '<tr><td>ABS:</td><td>'.$saleepc['modification']['TEX_ABS'].'</td></tr>';
                }
                ?>
                <?php if ($saleepc['modification']['TEX_ASR']<>''){
                    echo '<tr><td>ASR:</td><td>'.$saleepc['modification']['TEX_ASR'].'</td></tr>';
                }
                ?>
                <?php
                    if (count($saleepc['modification']['ENGINES']) > 0){
                        echo '<tr><td>Устанавливаемые двигатели: </td><td><ul>';
                        foreach ($saleepc['modification']['ENGINES'] as $engine){
                            echo '<li>'.$engine['ENG_CODE'].'</li>';
                        }
                        echo '</ul></td></tr>';
                    }
                ?>
                
            </tbody>
        </table>
        <?php
            $groups =array(
                102=> array('HEADER_TEXT'=>'Двигатель (общее)','MAIN_GROUP'=>'engine'),
                103=> array('HEADER_TEXT'=>'Бензиновый двигатель','MAIN_GROUP'=>'engine'),
                104=> array('HEADER_TEXT'=>'Дизельный двигатель','MAIN_GROUP'=>'engine'),
                113=> array('HEADER_TEXT'=>'Выбросы','MAIN_GROUP'=>'engine'),
                105=> array('HEADER_TEXT'=>'Система охлаждения','MAIN_GROUP'=>'engine'),
                107=> array('HEADER_TEXT'=>'Электрика','MAIN_GROUP'=>'engine'),
                102000001=> array('HEADER_TEXT'=>'Освещение','MAIN_GROUP'=>'electronic'),
                108=> array('HEADER_TEXT'=>'Тормозная система','MAIN_GROUP'=>'brakes'),
                109=> array('HEADER_TEXT'=>'Рулевое управление и колеса','MAIN_GROUP'=>'steer_susp'),
                110=> array('HEADER_TEXT'=>'Шины, диски','MAIN_GROUP'=>'steer_susp'),
                111=> array('HEADER_TEXT'=>'Объемы емкостей','MAIN_GROUP'=>null),
                106=> array('HEADER_TEXT'=>'Ремни','MAIN_GROUP'=>'engine'),
                112=> array('HEADER_TEXT'=>'Моменты затяжки','MAIN_GROUP'=>null)
            );
            foreach ($saleepc['vivid_info'] as $model){
        		echo '<h2>'.$model['DESCRIPTION'].' '.$model['ENGINECODE']. ' ('.$model['BUILD_FROM'].'-'.$model['BUILD_TO'].') '.$model['CAPACITY'].'ccm '.$model['OUTPUT'].'kW</h2><table class="list">';
        		
        		foreach ($groups as $grid => $group){
        			if (isset($model['adj'][$grid])){
        				echo '<thead><tr bgcolor="#ccc"><td colspan="3">'.$group['HEADER_TEXT'].'</td></tr></thead>';
        				    $i=0;
        					foreach ($model['adj'][$grid] as $itm){
        					    $i++;
        						echo '<tr class="'.(($i%2)==0?'light':'dark').'"><td>'.($itm['PARENT_ID']==''?'':'&nbsp;&nbsp;').$itm['SENT_TEXT'].'</td><td>'.$itm['ITEM_NOTE_TEXT'].'</td><td>'.$itm['VALUE'].'&nbsp;'.$itm['SENT_MEAS_UNITS'].'</td></tr>';
        					}
        			}
        		}
        		
        		echo '</table>';
            }
/*                    
	foreach ($ret['vivid']['adjustment']['models'] as $model){
		echo '<h2>'.$model['DESCRIPTION'].' '.$model['ENGINECODE']. '('.$model['BUILD_FROM'].'-'.$model['BUILD_TO'].') '.$model['CAPACITY'].'ccm '.$model['OUTPUT'].'kW</h2>';
		echo '<table><tbody>';
		foreach ($groups as $grid => $group){
			if (isset($model['adj'][$grid])){
				echo '<tr><th colspan="3">'.$group['HEADER_TEXT'].'</th></td>';
				    $i=0;
					foreach ($model['adj'][$grid] as $itm){
					    $i++;
						echo '<tr class="'.(($i%2)==0?'light':'dark').'"><td>'.($itm['PARENT_ID']==''?'':'&nbsp;&nbsp;').$itm['SENT_TEXT'].'</td><td>'.$itm['ITEM_NOTE_TEXT'].'</td><td>'.$itm['VALUE'].'&nbsp;'.$itm['SENT_MEAS_UNITS'].'</td></tr>';
					}
			}
		}
	   echo '</tbody></table>';
	}
*/                    
                    
                                
                
                ?>
        </div>
        <div id="tab-tyres" class="tab-content">Шины диски</div>
        <div id="tab-to" class="tab-content">
        <table class="list tech111">
        <?
        	foreach ($saleepc['TO'] as $row){

        		echo '<tr><td>'.$row['PART_NAME'].'</td><td>'
                     .$row['KOL'].'</td><td>'
                     .$row['DOP_IFO'].'</td><td><a href="/index.php?route=product/search&search='
                     .$row['XLINK2'].'">Найти</a></td>';
        	}
?>
        </table>
        <?
        //print_r($saleepc['TO']);
		?>
        </div>
        <div id="tab-parts" class="tab-content">
            <?php
            foreach ($saleepc['part_groups'] as $group){
            ?>
                <div class="secnode" title="<?=$group['TEX_TEXT']?>" style="background-image:url(/image/data/general/sections/<?=$group['STR_ID']?>.jpg);">
                    <a href="/index.php?route=saleepc/general/partnodes&modification_id=<?=$saleepc['modification']['TYP_ID']?>&ga=<?=$group['STR_ID']?>" ><?=$group['TEX_TEXT']?></a>
                </div>
            <?php
            }
            ?>
            <br style="clear: both;" />
        </div>
        <div id="tab-oil" class="tab-content">
            <?php
                foreach ($saleepc['lbrs'] as $lbr_system_id => $models){
                    foreach ($models['models'] as $model){
                        echo '<h2>'.$model['DESCRIPTION'].' '.$model['ENGINECODE']. '('.$model['BUILD_FROM'].'-'.$model['BUILD_TO'].') '.$model['CAPACITY'].'ccm '.$model['OUTPUT'].'kW</h2>';
                    }
                    echo '<b>Масла и жидкости для: '.$saleepc['lbrs'][$lbr_system_id]['SYSTEM']['LBR_SYST_DESCRIPTION'].'</b><br /><br />';
            ?>
            <table class="list"><tbody>
            <?php
                foreach ($saleepc['lbrs'][$lbr_system_id]['LUB'] as $lub){
				    echo '<thead><tr bgcolor="#ccc"><td colspan=4>'.$lub['NAME']['LBR_SENT_TEXT'].'</td></tr></thead>';
				    foreach ($lub['ITEMS'] as $itm){
					   echo '<tr><td>'.$itm['LBR_LUBR_TEXT'].'</td><td>'.$itm['LBR_QLTY_TEXT'].'</td><td>'.$itm['LBR_TMP_TEXT'].'</td><td>'.$itm['LBR_VSC_TEXT'].'</td></tr>';
				    }
                }
            ?>		
            </tbody></table>
            <?php	
	           }
            ?>        
        </div>

    </div>
      



</div>  
<pre><?//=print_r($saleepc['TO'])?></pre>	
	
<?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
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
