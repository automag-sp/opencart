<div id="breadcrumb"><ol class="breadcrumb container">
	<?php foreach ($breadcrumbs as $breadcrumb) { ?>
	<li><a href="<?php echo $breadcrumb['href']; ?>"><span><?php echo $breadcrumb['text']; ?></span></a></li>
	<?php } ?>
</ol></div>