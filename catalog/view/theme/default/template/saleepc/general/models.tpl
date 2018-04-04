<?=$header.$column_left.$column_right?>
<div id="content">
    <?=$content_top?>
    <div class="breadcrumb">
        <?
            foreach ($breadcrumbs as $breadcrumb) echo $breadcrumb['separator'].'<a href="'.$breadcrumb['href'].'" title="'.$breadcrumb['text'].'">'.$breadcrumb['text'].'</a>';
        ?>
    </div>
    <h1><?=$heading_title?></h1>
    <ul>
    <?
        foreach ($saleepc['models'] as $model){
            echo '<li><a href="/index.php?route=saleepc/general/modifications&model_id='.$model['MOD_ID'].'&cartype='.$saleepc['cartype'].'" title="'.$model['TEX_TEXT'].'">'.$model['TEX_TEXT'].' <i>('.dt($model['MOD_PCON_START']).' - '.dt($model['MOD_PCON_END']).')</i> </a></li>';
        }
    ?>
    </ul>
    <?=$content_bottom?>
</div>
<?=$footer?>
<?
    function dt($dt)
    {
        return ($dt?substr($dt, 4, 2).'/'.substr($dt, 0, 4):'Настоящее время');
    }

?>
