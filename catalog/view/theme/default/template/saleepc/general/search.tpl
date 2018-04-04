<?=$header.$column_left.$column_right?>
<div id="content">
    <?=$content_top?>
    <div class="breadcrumb">
        <?
            foreach ($breadcrumbs as $breadcrumb) echo $breadcrumb['separator'].'<a href="'.$breadcrumb['href'].'" title="'.$breadcrumb['text'].'">'.$breadcrumb['text'].'</a>';
        ?>
    </div>
    <h1><?=$heading_title?></h1>
    <pre><?=print_r($saleepc)?></pre>
    <?=$content_bottom?>
</div>
<?=$footer?>
