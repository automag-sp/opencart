<?=$header.$column_left.$column_right?>
<div id="content">
    <?=$content_top?>
    <div class="breadcrumb">
        <?
            foreach ($breadcrumbs as $breadcrumb) echo $breadcrumb['separator'].'<a href="'.$breadcrumb['href'].'" title="'.$breadcrumb['text'].'">'.$breadcrumb['text'].'</a>';
        ?>
    </div>
    <h1><?=$heading_title?></h1>
    <h2><?=$PC?></h2>
    <?
        $let = '';
        foreach ($saleepc['manufacturers']['PC'] as $manufacturer){
            if ($let <> $manufacturer['MFA_BRAND'][0]){
                $let = $manufacturer['MFA_BRAND'][0];
                echo "<p>$let</p>";
            }
            echo '<a href="/index.php?route=saleepc/general/models&manufacturer_id='.$manufacturer['MFA_ID'].'&cartype=pc" title="'.$manufacturer['MFA_BRAND'].'">'.$manufacturer['MFA_BRAND'].'</a>&nbsp;&nbsp;&nbsp;&nbsp; ';
        }
    ?>
    <h2><?=$CV?></h2>
    <?
        $let = '';
        foreach ($saleepc['manufacturers']['CV'] as $manufacturer){
            if ($let <> $manufacturer['MFA_BRAND'][0]){
                $let = $manufacturer['MFA_BRAND'][0];
                echo "<p>$let</p>";
            }
            echo '<a href="/index.php?route=saleepc/general/models&manufacturer_id='.$manufacturer['MFA_ID'].'&cartype=cv" title="'.$manufacturer['MFA_BRAND'].'">'.$manufacturer['MFA_BRAND'].'</a>&nbsp;&nbsp;&nbsp;&nbsp; ';
        }
    ?>
    <?=$content_bottom?>
</div>
<?=$footer?>
