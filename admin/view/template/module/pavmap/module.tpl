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
				<h1 class="logo"><?php echo $this->language->get("text_configuration_module"); ?></h1>
			</div>
			<div class="toolbar"><?php require( dirname(__FILE__).'/action_bar.tpl' ); ?></div>

			<div class="content">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
					<input name="action" type="hidden" id="action"/>
					<input type="hidden" value="<?php echo $store_id;?>" name="pavmap_module[store_id]"/>
					<label style="font-weight: bold;color:red;"><?php echo $this->language->get('entry_default_store'); ?></label>
					<select name="pavmap_module[stores]" id="pavstores">
						<?php foreach($stores as $store):?>
						<?php if($store['store_id'] == $store_id):?>
						<option value="<?php echo $store['store_id'];?>" selected="selected"><?php echo $store['name'];?></option>
						<?php else:?>
						<option value="<?php echo $store['store_id'];?>"><?php echo $store['name'];?></option>
						<?php endif;?>
						<?php endforeach;?>
					</select><br/><br/>
					<div class="vtabs">
						<?php $module_row = 1; ?>
						<?php foreach ($modules as $module) { ?>
						<a href="#tab-module-<?php echo $module_row; ?>" id="module-<?php echo $module_row; ?>"><?php echo $tab_module . ' ' . $module_row; ?>&nbsp;<img src="view/image/delete.png" alt="" onclick="$('.vtabs a:first').trigger('click'); $('#module-<?php echo $module_row; ?>').remove(); $('#tab-module-<?php echo $module_row; ?>').remove(); return false;" /></a>
						<?php $module_row++; ?>
						<?php } ?>
						<span id="module-add"><?php echo $button_add_module; ?>&nbsp;<img src="view/image/add.png" alt="" onclick="addModule();" /></span>
					</div>
					<?php $module_row = 1; ?>
					<?php foreach ($modules as $module) { ?>
					<div id="tab-module-<?php echo $module_row; ?>" class="vtabs-content">

						<div id="language-<?php echo $module_row; ?>" class="htabs">
							<?php foreach ($languages as $language) { ?>
							<a href="#tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
							<?php } ?>
						</div>
						<?php foreach ($languages as $language) { ?>
							<div id="tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>">
								<table class="form">
									<tr>
										<td><?php echo $this->language->get('entry_title'); ?></td>
										<td><input size="60" type="text" value="<?php echo isset($module['title'][$language['language_id']]) ? $module['title'][$language['language_id']] : ''; ?>" name="pavmap_module[<?php echo $module_row; ?>][title][<?php echo $language['language_id']; ?>]"></td>
									</tr>
									<tr>
										<td><?php echo $this->language->get('entry_description'); ?></td>
										<td><textarea rows="2" cols="60" name="pavmap_module[<?php echo $module_row; ?>][des][<?php echo $language['language_id']; ?>]" id="des-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>"><?php echo isset($module['des'][$language['language_id']]) ? $module['des'][$language['language_id']] : ''; ?></textarea></td>
									</tr>
								</table>
							</div>
							<?php } ?>
						<table class="form">
							<tr>
								<td><?php echo $this->language->get('prefix_class'); ?><span class="help"><?php echo $this->language->get("help_prefix_class"); ?></span></td>
								<td>
									<input name="pavmap_module[<?php echo $module_row; ?>][prefix]" value="<?php echo (isset($module['prefix'])?$module['prefix']:'' ) ?>"/>
								</td>
							</tr>
							<tr>
								<td><?php echo $entry_layout; ?></td>
								<td><select name="pavmap_module[<?php echo $module_row; ?>][layout_id]">
									<?php foreach ($layouts as $layout) { ?>
									<?php if ($layout['layout_id'] == $module['layout_id']) { ?>
									<option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
									<?php } else { ?>
									<option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
									<?php } ?>
									<?php } ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><?php echo $entry_position; ?></td>
								<td><select name="pavmap_module[<?php echo $module_row; ?>][position]">
									<?php foreach( $positions as $pos ) { ?>
									<?php if ($module['position'] == $pos) { ?>
									<option value="<?php echo $pos;?>" selected="selected"><?php echo $this->language->get('text_'.$pos); ?></option>
									<?php } else { ?>
									<option value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>
									<?php } ?>
									<?php } ?> 
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $entry_status; ?></td>
								<td><select name="pavmap_module[<?php echo $module_row; ?>][status]">
									<?php if ($module['status']) { ?>
									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
									<option value="0"><?php echo $text_disabled; ?></option>
									<?php } else { ?>
									<option value="1"><?php echo $text_enabled; ?></option>
									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
									<?php } ?>
								</select>
							</td>
							</tr>
							<tr>
								<td><?php echo $entry_sort_order; ?></td>
								<td><input type="text" name="pavmap_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
							</tr>
							<tr>
								<td><?php echo $entry_limit; ?><span class="help"><?php echo $help_limit; ?></span></td>
								<td><input type="text" name="pavmap_module[<?php echo $module_row; ?>][limit]" value="<?php echo isset($module['limit'])?$module['limit']:20; ?>" size="3" /></td>
							</tr>
							<tr>
								<td><?php echo $entry_height; ?></td>
								<td><input type="text" name="pavmap_module[<?php echo $module_row; ?>][height]" value="<?php echo isset($module['height'])?$module['height']:400; ?>" size="3" /></td>
							</tr>
						</table>
					</div>
					<?php $module_row++; ?>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
$(document).ready( function() {
  $('#pavstores').bind('change', function () {
      url = 'index.php?route=module/pavmap&token=<?php echo $token; ?>';
      var id = $(this).val();
      if (id) {
          url += '&store_id=' + encodeURIComponent(id);
      }
      window.location = url;
  });
});
<?php $module_row = 1; ?>
<?php foreach ($modules as $module) { ?>
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('des-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
<?php } ?>
<?php $module_row++; ?>
<?php } ?>
//--></script> 

<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {  

	html  = '<div id="tab-module-' + module_row + '" class="vtabs-content">';

	html += '	<div id="language-' + module_row + '" class="htabs">';
					<?php foreach ($languages as $language) { ?>
	html += '		<a href="#tab-language-'+ module_row + '-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>';
					<?php } ?>
	html += '  </div>';

	<?php foreach ($languages as $language) { ?>
	html += '	<div id="tab-language-'+ module_row + '-<?php echo $language['language_id']; ?>">';
	html += '		<table class="form">';
	html += '			<tr>';
	html += '				<td><?php echo $this->language->get("entry_title"); ?></td>';
	html += '				<td><input size="60" type="text" value="title" name="pavmap_module[' + module_row + '][title][<?php echo $language['language_id']; ?>]"></td>';
	html += '			</tr>';
	html += '			<tr>';
	html += '				<td><?php echo $this->language->get("entry_des"); ?></td>';
	html += '				<td><textarea cols="60" rows="2" name="pavmap_module[' + module_row + '][des][<?php echo $language['language_id']; ?>]" id="des-' + module_row + '-<?php echo $language['language_id']; ?>">Google Map</textarea></td>';
	html += '			</tr>';
	html += '		</table>';
	html += ' 	</div>';
	<?php } ?>

	html += '<table class="form">';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("prefix_class"); ?><span class="help"><?php echo $this->language->get("help_prefix_class"); ?></span></td>';
	html += '		<td>';
	html += '			<input name="pavmap_module['+module_row+'][prefix]" value="prefix_class'+module_row+'"/>';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_layout; ?></td>';
	html += '		<td><select name="pavmap_module[' + module_row + '][layout_id]">';
						<?php foreach ($layouts as $layout) { ?>
	html += '			<?php $selected = ($layout["layout_id"]==1)?"selected=\'selected\'":''; ?>';
	html += '			<option <?php echo $selected; ?> value="<?php echo $layout["layout_id"]; ?>"><?php echo addslashes($layout["name"]); ?></option>';
						<?php } ?>
	html += '		</select></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_position; ?></td>';
	html += '		<td><select name="pavmap_module[' + module_row + '][position]">';
						<?php foreach( $positions as $pos ) { ?>
						<?php if ($pos == "content_top") { ?>
	html += '			<option selected="selected" value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>';
						<?php } else { ?>
	html += '			<option value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>';
						<?php } ?>
						<?php } ?>
	html += '		</select></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_status; ?></td>';
	html += '		<td><select name="pavmap_module[' + module_row + '][status]">';
	html += '			<option value="1"><?php echo $text_enabled; ?></option>';
	html += '			<option value="0"><?php echo $text_disabled; ?></option>';
	html += '		</select></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_sort_order; ?></td>';
	html += '		<td><input type="text" name="pavmap_module[' + module_row + '][sort_order]" value="1" size="3" /></td>';
	html += '	</tr>';




	html += '	<tr>';
	html += '		<td><?php echo $entry_limit; ?><span class="help"><?php echo $help_limit; ?></span></td>';
	html += '		<td><input type="text" name="pavmap_module[' + module_row + '][limit]" value="200" size="3" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_height; ?><span class="help"></span></td>';
	html += '		<td><input type="text" name="pavmap_module[' + module_row + '][height]" value="400" size="3" /></td>';
	html += '	</tr>';
	html += '</table>';

	html += '</div>';
	
	$('#form').append(html);
	

	<?php foreach ($languages as $language) { ?>
	CKEDITOR.replace('des-' + module_row + '-<?php echo $language['language_id']; ?>', {
		filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
	});  
	<?php } ?>


	$('#language-' + module_row + ' a').tabs();
	
	$('#module-add').before('<a href="#tab-module-' + module_row + '" id="module-' + module_row + '"><?php echo $tab_module; ?> ' + module_row + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'.vtabs a:first\').trigger(\'click\'); $(\'#module-' + module_row + '\').remove(); $(\'#tab-module-' + module_row + '\').remove(); return false;" /></a>');
	
	$('.vtabs a').tabs();
	
	$('#module-' + module_row).trigger('click');
	
	module_row++;
}
//--></script> 
<script type="text/javascript"><!--
$('.vtabs a').tabs();
//--></script> 
<script type="text/javascript"><!--
<?php $module_row = 1; ?>
<?php foreach ($modules as $module) { ?>
$('#language-<?php echo $module_row; ?> a').tabs();
<?php $module_row++; ?>
<?php } ?> 
//--></script> 
<?php echo $footer; ?>