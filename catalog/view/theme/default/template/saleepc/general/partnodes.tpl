<?=$header.$column_left.$column_right?>
<div id="content">
    <?=$content_top?>
    <div class="breadcrumb">
        <?
            foreach ($breadcrumbs as $breadcrumb) echo $breadcrumb['separator'].'<a href="'.$breadcrumb['href'].'" title="'.$breadcrumb['text'].'">'.$breadcrumb['text'].'</a>';
        ?>
    </div>
    <h1><?=$heading_title?></h1>
<?
    $nodes = $saleepc['tree'];
    $node = $nodes[0];
    array_shift($nodes);
    $content = "";
    foreach ($nodes as $nextNode){
        $node_lev = $node['STR_LEVEL'];
        if ($node['STR_LEVEL'] == $nextNode['STR_LEVEL']){
            $content.='
                <li class="Node ExpandLeaf IsLast">
                    <div class="Expand"></div>
                    <div class="Content"><a href="index.php?route=saleepc/general/parts&modification_id='.$saleepc['modification']['TYP_ID'].'&partnode_id='.$node['GA_ID'].'" title="'.$node['TEX_TEXT'].'">'.$node['TEX_TEXT'].'</a></div>
                </li>
            ';
        }
        if ($node['STR_LEVEL'] < $nextNode['STR_LEVEL']){
            $content.='
                <li class="Node ExpandClosed">
                    <div class="Expand"></div>
                    <div class="Content">'.$node['TEX_TEXT'].'</div>
                    <ul class="Container">
            ';
        }
        if ($node['STR_LEVEL'] > $nextNode['STR_LEVEL']){
            $content.='
                <li class="Node ExpandLeaf IsLast">
                    <div class="Expand"></div>
                    <div class="Content"><a href="index.php?route=saleepc/general/parts&modification_id='.$saleepc['modification']['TYP_ID'].'&partnode_id='.$node['GA_ID'].'" title="'.$node['TEX_TEXT'].'">'.$node['TEX_TEXT'].'</a></div>
                </li>
            ';
            for ($i=0; $i<($node_lev-$nextNode['STR_LEVEL']); $i++){
                $content.='</ul></li>';
            }
        }

        $node = $nextNode;
    }

            $content.='
                <li class="Node ExpandLeaf IsLast">
                    <div class="Expand"></div>
                    <div class="Content"><a href="index.php?route=saleepc/general/parts&modification_id='.$saleepc['modification']['TYP_ID'].'&partnode_id='.$node['GA_ID'].'" title="'.$node['TEX_TEXT'].'">'.$node['TEX_TEXT'].'</a></div>
                </li>
            ';
            for ($i=0; $i<($node['STR_LEVEL']-2); $i++){
                $content.='</ul></li>';
            }

?>
<script type="text/javascript">
function tree_toggle(event) {
	event = event || window.event
	var clickedElem = event.target || event.srcElement

	if (!hasClass(clickedElem, 'Expand')) {
		return // клик не там
	}

	// Node, на который кликнули
	var node = clickedElem.parentNode
	if (hasClass(node, 'ExpandLeaf')) {
		return // клик на листе
	}

	// определить новый класс для узла
	var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
	// заменить текущий класс на newClass
	// регексп находит отдельно стоящий open|close и меняет на newClass
	var re =  /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
	node.className = node.className.replace(re, '$1'+newClass+'$3')
}


function hasClass(elem, className) {
	return new RegExp("(^|\\s)"+className+"(\\s|$)").test(elem.className)
}

</script>

<div onclick="tree_toggle(arguments[0])">
<ul class="Container">
  <li class="Node IsRoot IsLast ExpandOpen">

    <div class="Expand"></div>
    <div class="Content">Запчасти</div>
    <ul class="Container">


<?
    echo $content;
?>
    </ul>
 </li>
</ul>
</div>    
    <?=$content_bottom?>
</div>
    <pre><?//=print_r($saleepc)?></pre>

<?=$footer?>
<?
    function dt($dt)
    {
        return ($dt?substr($dt, 4, 2).'/'.substr($dt, 0, 4):'Настоящее время');
    }

?>
