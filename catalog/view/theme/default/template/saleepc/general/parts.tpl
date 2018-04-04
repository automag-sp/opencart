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
<?
        foreach ($saleepc['parts'] as $part){
            //echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/general/'.$part['images'][0]['GRA_TAB_NR'].'/'.$part['images'][0]['GRA_ID'].'.jpg" alt="Рисунок" />':'').'</td><td>123</td></tr>';
            echo '<tr><td>'.(isset($part['images'][0])?'<img src="http://img.saleepc.ru/general/'.$part['images'][0]['GRA_TAB_NR'].'/'.$part['images'][0]['GRA_GRD_ID'].'.jpg" alt="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].' '.$part['GA_TEXT'].'"  width="100" />':'').'</td><td valign="top"><b>[ '.$part['SUP_BRAND'].' ] </b> : <a href="#" title="'.$part['SUP_BRAND'].' '.$part['ART_ARTICLE_NR'].'">'.$part['ART_ARTICLE_NR'].'</a> - '.$part['GA_TEXT'].'<br />';
            foreach ($part['descs'] as $desc){
                echo $desc['CR_TEXT'].': <i>'.$desc['M_TEXT'].$desc['LAC_VALUE'].'</i><br />';
            }
            echo '</td></tr>';
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
