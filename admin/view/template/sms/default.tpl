<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/cartsms.css">
<link rel="stylesheet" type="text/css" href="view/stylesheet/jquery.datetimepicker.css">
<?php if(substr(VERSION, 0, 3) != "1.4")
    echo '<div id="content">';
?>
<?php
echo $html;
?>
<?php if(substr(VERSION, 0, 3) != "1.4")
    echo '</div>';
?>
<?php echo $footer; ?>