<?=$header.$column_left.$column_right?>
<div id="content">
    <?=$content_top?>
    <div class="breadcrumb">
        <?
            foreach ($breadcrumbs as $breadcrumb) echo $breadcrumb['separator'].'<a href="'.$breadcrumb['href'].'" title="'.$breadcrumb['text'].'">'.$breadcrumb['text'].'</a>';
        ?>
    </div>
    <h1><?=$heading_title?></h1>
    <table>
        <tr>
            <th>Модификация</th>
            <th>Топливо</th>
            <th>Двигатели</th>
            <th>Л.с.</th>
            <th>Объем</th>
            <th>Привод</th>
            <th>Период выпуска</th>
        </tr>
<?

        foreach ($saleepc['modifications'] as $modification){
            echo '<tr><td><a href="/index.php?route=saleepc/general/partnodes&modification_id='.$modification['TYP_ID'].'" title="'.$saleepc['manufacturer']['MFA_BRAND'].' '.$modification['TYP_NAME'].'">'.$modification['TYP_NAME'].'</a></td><td>'.$modification['ENG_NAME'].'</td><td>';
            foreach ($modification['engines'] as $engine){
                echo $engine['ENG_CODE'].'&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            echo '<td>'.$modification['TYP_HP'].'</td><td>'.$modification['TYP_CCM'].'</td><td>'.$modification['DRV_NAME'].'</td><td>'. dt($modification['TYP_PCON_START']).' - '.dt($modification['TYP_PCON_END']).'</td></tr>';
        }
        
?>        
    </table>
    <pre><?//=print_r($saleepc)?></pre>
    <?=$content_bottom?>
</div>
<?=$footer?>
<?
    function dt($dt)
    {
        return ($dt?substr($dt, 4, 2).'/'.substr($dt, 0, 4):'Настоящее время');
    }

?>
