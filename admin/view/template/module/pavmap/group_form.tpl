<?php
/******************************************************
 * @package  : Pav Map module for Opencart 1.5.x
 * @version  : 1.0
 * @author   : http://www.pavothemes.com
 * @copyright: Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license  : GNU General Public License version 1
*******************************************************/
?>
<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>

	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>

	<div class="box">
		<div class="left-panel">
			<div class="logo"><h1><?php echo $this->language->get('left_title'); ?> </h1></div>
			<div class="slidebar"><?php require( dirname(__FILE__).'/toolbar.tpl' ); ?></div>
			<div class="clear clr"></div>
		</div>
		<div class="right-panel">
			<div class="heading">
				<h1 class="logo">
					<?php echo $this->language->get("text_info_group_location"); ?>
					<?php if (isset($group_id) && !empty($group_id)): ?>ID: <?php echo $group_id; ?><?php endif ?>
				</h1>
			</div>
			<div class="toolbar"><?php require( dirname(__FILE__).'/action_bar.tpl' ); ?></div>

			<div class="content">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
					<input name="action" type="hidden" id="action"/>
					<input name="group_id" type="hidden" value="<?php echo isset($group_id)?$group_id:0; ?>"/>
					<table class="form">
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_group_name');?></td>
							<td>
								<input name="group_name" value="<?php echo (isset($group_name))?$group_name:''; ?>" size="40"/>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_group_store');?></td>
							<td>
								<select name="group_store">
									<?php foreach ($stores as $store): ?>
									<?php $selected = (isset($group_store) && $group_store == $store['store_id'])?"selected='selected'":'' ?>
									<option <?php echo $selected;?> value="<?php echo $store['store_id'];?>"><?php echo $store['name']; ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_group_status');?></td>
							<td>
								<select name="group_status">
									<?php if (isset($group_status) && $group_status): ?>
									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
									<option value="0"><?php echo $text_disabled; ?></option>
									<?php else: ?>
									<option value="1"><?php echo $text_enabled; ?></option>
									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
									<?php endif; ?>
								</select>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

