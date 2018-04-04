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
				<h1 class="logo"><?php echo $this->language->get("text_list_location"); ?></h1>
			</div>
			<div class="toolbar"><?php require( dirname(__FILE__).'/action_bar.tpl' ); ?></div>

			<div class="content">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
					<input name="action" type="hidden" id="action"/>

					<table class="list">
						<thead>
						<tr>
							<td class="left"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);"></td>
							<td class="left"><?php echo $column_icon; ?></td>
							<td class="left"><?php if ($sort == 'title') { ?>
								<a href="<?php echo $sort_title; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_title; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_title; ?>"><?php echo $column_title; ?></a>
								<?php } ?>
							</td>
							<td class="right"><?php echo $column_latitude; ?></td>
							<td class="right"><?php echo $column_longitude; ?></td>
							<td class="right"><?php echo $column_status; ?></td>
							<td class="right"><?php echo $column_action; ?></td>
						</tr>
						</thead>
						<tbody>
							<tr class="filter">
								<td>&nbsp;</td>
								<td></td>
								<td><input type="text" name="filter_title" value="<?php echo $filter_title; ?>" /></td>
								<td align="right"><input type="text" name="filter_latitude" value="<?php echo $filter_latitude; ?>"/></td>
								<td align="right"><input type="text" name="filter_longitude" value="<?php echo $filter_longitude; ?>"/></td>
								<td align="right">
									<select name="filter_status">
										<?php if ($filter_status =="") { ?>
										<option value="" selected="selected"></option>
										<?php } else { ?>
										<option value=""></option>
										<?php } ?>

										<?php if ($filter_status == 1) { ?>
										<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_enabled; ?></option>
										<?php } ?>

										<?php if ($filter_status == 0 && $filter_status != "") { ?>
										<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
										<?php } else { ?>
										<option value="0"><?php echo $text_disabled; ?></option>
										<?php } ?>
									</select>
								</td>
								<td align="right"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>
							</tr>
							<?php if ($locations) { ?>
							<?php foreach ($locations as $location) {?>
							<tr>
								<td><input type="checkbox" value="<?php echo $location['location_id'] ?>" name="selected[]"></td>
								<td class="center"><img src="<?php echo $this->model_tool_image->resize( $location['icon'], 39, 39);?>"></td>
								<td class="left"><?php echo $location['title']; ?></td>
								<td class="right"><?php echo $location['latitude']; ?></td>
								<td class="right"><?php echo $location['longitude'];?></td>
								<td class="right"><?php echo ($location['status'])?$text_enabled:$text_disabled; ?></td>
								<td class="right">[ <a href="<?php echo $location['action']; ?>"><?php echo $action_edit; ?></a> ]</td>
							</tr>
							<?php } ?>
							<?php } else { ?>
							<tr>
								<td class="center" colspan="7"><?php echo $text_no_results; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</form>
				<div class="pagination"><?php echo $pagination; ?></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript"><!--
function filter() {
  url = 'index.php?route=module/pavmap/location&token=<?php echo $token; ?>';

  var filter_title = $('input[name=\'filter_title\']').attr('value');

  if (filter_title) {
    url += '&filter_title=' + encodeURIComponent(filter_title);
  }

  var filter_latitude = $('input[name=\'filter_latitude\']').attr('value');

  if (filter_latitude) {
    url += '&filter_latitude=' + encodeURIComponent(filter_latitude);
  }

  var filter_longitude = $('input[name=\'filter_longitude\']').attr('value');

  if (filter_longitude) {
    url += '&filter_longitude=' + encodeURIComponent(filter_longitude);
  }

  var filter_status = $('select[name=\'filter_status\']').attr('value');

  if (filter_status != '') {
    url += '&filter_status=' + encodeURIComponent(filter_status);
  }

  location = url;
}
//--></script>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
  if (e.keyCode == 13) {
    filter();
  }
});
//--></script>