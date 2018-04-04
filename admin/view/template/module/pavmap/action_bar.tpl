<div class="pav-toolbar">
	<div class="btn-group">
		<?php
			if(isset($menu_active)){
				switch ($menu_active) {
					case 'modules':
						?>
						<a onclick="$('#form').submit();" class="btn btn-small"><span><?php echo $button_save; ?></span></a>&nbsp;&nbsp;
						<a onclick="$('#action').val('save-stay');$('#form').submit();" class="btn btn-small"><span><?php echo $button_save_stay; ?></span></a>&nbsp;&nbsp;
						<a href="<?php echo $cancel; ?>" class="btn btn-small"><span><?php echo $button_cancel; ?></span></a>&nbsp;&nbsp;
						<?php
						break;
					case 'grouplocation':
						?>
						<a href="<?php echo $insert_link;?>" class="btn btn-small btn-success"><span><?php echo $button_insert; ?></span></a>&nbsp;&nbsp;
						<a onclick="$('#action').val('delete');$('#form').submit();" class="btn btn-small btn-remove"><span><?php echo $button_delete; ?></span></a>&nbsp;&nbsp;
						<?php
					break;
					case 'location':
						?>
						<a href="<?php echo $insert_link;?>" class="btn btn-small btn-success"><span><?php echo $button_insert; ?></span></a>&nbsp;&nbsp;
						<a onclick="$('#action').val('delete');$('#form').submit();" class="btn btn-small btn-remove"><span><?php echo $button_delete; ?></span></a>&nbsp;&nbsp;
						<?php
					break;
					case 'insert':
						?>
						<a onclick="$('#form').submit();" class="btn btn-small"><span><?php echo $button_save; ?></span></a>&nbsp;&nbsp;
						<a href="<?php echo $cancel; ?>" class="btn btn-small"><span><?php echo $button_cancel; ?></span></a>&nbsp;&nbsp;
						<?php
						break;
					break;
					case 'update':
						?>
						<a onclick="$('#form').submit();" class="btn btn-small"><span><?php echo $button_save; ?></span></a>&nbsp;&nbsp;
						<a onclick="$('#action').val('save-stay');$('#form').submit();" class="btn btn-small"><span><?php echo $button_save_stay; ?></span></a>&nbsp;&nbsp;
						<a href="<?php echo $cancel; ?>" class="btn btn-small"><span><?php echo $button_cancel; ?></span></a>&nbsp;&nbsp;
						<?php
						break;
					break;
					default:
						break;
				}
			}
		?>
	</div>
</div>
