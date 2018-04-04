<div class="product-filter clearfix">
	<div class="display">
		<span><?php echo $text_display; ?></span>
		<span><?php echo $text_list; ?></span>
		<a onclick="display('grid');"><i class="fa fa-th"></i><?php echo $text_grid; ?></a>
	</div>
	
	<div class="product-compare"><a href="<?php echo $compare; ?>" id="compare-total" class="btn btn-compare btn-theme-default"><?php echo $text_compare; ?></a></div>   

	<div class="sort"><span><?php echo $text_sort; ?></span>
		<select onchange="location = this.value;">
			<?php foreach ($sorts as $sorts) { ?>
			<?php if ($sorts['value'] == $sort . '-' . $order) { ?>
			<option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
			<?php } else { ?>
			<option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
			<?php } ?>
			<?php } ?>
		</select>
	</div>	
	
	<div class="limit"><span><?php echo $text_limit; ?></span>
		<select onchange="location = this.value;">
			<?php foreach ($limits as $limits) { ?>
			<?php if ($limits['value'] == $limit) { ?>
			<option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
			<?php } else { ?>
			<option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
			<?php } ?>
			<?php } ?>
		</select>
	</div>
</div>