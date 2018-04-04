<?php
/******************************************************
 * @package  : Pav Social module for Opencart 1.5.x
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
		<div class="heading">
			<h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
			<div class="buttons">
				<a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a>
				<a onclick="$('#action').val('save-edit');$('#form').submit();" class="button"><?php echo $this->language->get('text_save_edit'); ?></a>
				<a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a>
			</div>
		</div>
		<div class="content">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
				<input name="action" type="hidden" id="action"/>  
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

					<table class="form">
						<tr>
							<td><?php echo $entry_layout; ?></td>
							<td><select name="pavsocial_module[<?php echo $module_row; ?>][layout_id]">
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
							<td><select name="pavsocial_module[<?php echo $module_row; ?>][position]">
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
							<td><select name="pavsocial_module[<?php echo $module_row; ?>][status]">
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
							<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
						</tr>
					</table>

					<?php $socials = array("Facebook", "Twitter", "Youtube"/*, "Google", "Pinterest"*/); ?>
					<div id="social-<?php echo $module_row; ?>" class="htabs">
						<?php foreach ($socials as $social) { ?>
						<a href="#tab-social-<?php echo $module_row; ?>-<?php echo $social; ?>"><?php echo $social; ?></a>
						<?php } ?>
					</div>
					
					<div id="tab-social-<?php echo $module_row; ?>-Facebook">
						<table class="form">
							<tr>
								<td><?php echo $this->language->get("entry_facebook_url"); ?></td>
								<td>
									<input size="60" type="text" value="<?php echo (isset($module['facebook'])?$module['facebook']:'' ) ?>" name="pavsocial_module[<?php echo $module_row; ?>][facebook]" >
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_application_id"); ?></td>
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][application_id]" value="<?php echo isset($module['application_id'])?$module['application_id']:''; ?>" size="60" /></td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_border_color"); ?></td>
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][border_color]">
										<?php foreach( $yesno as $k=>$v ){ ?>
										<option value="<?php echo $k;?>" <?php if(isset($module['border_color']) && $k==$module['border_color']) { ?>selected="selected"<?php } ?>><?php echo $v;?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_colorscheme"); ?></td>
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][colorscheme]">
										<?php if (isset($module['colorscheme']) && $module['colorscheme']=='dark') { ?>
										<option value="dark" selected="selected">Dark</option>
										<option value="light">Light</option>
										<?php } else { ?>
										<option value="dark" >Dark</option>
										<option value="light" selected="selected">Light</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_width"); ?></td>
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][face_width]" value="<?php echo isset($module['face_width'])?$module['face_width']:220; ?>"/></td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_height"); ?></td>
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][face_height]" value="<?php echo isset($module['face_height'])?$module['face_height']:220; ?>"/></td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_show_tream"); ?></td>
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][tream]">
									<?php foreach( $yesno as $k=>$v ){ ?>
										<option value="<?php echo $k;?>" <?php if(isset($module['tream']) && $k==$module['tream']) { ?>selected="selected"<?php } ?>><?php echo $v;?></option>
									<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_show_faces"); ?></td>
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][show_faces]">
									<?php foreach( $yesno as $k=>$v ){ ?>
										<option value="<?php echo $k;?>" <?php if(isset($module['show_faces']) && $k==$module['show_faces']) { ?>selected="selected"<?php } ?>><?php echo $v;?></option>
									<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_header"); ?></td>
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][header]">
										<?php foreach( $yesno as $k=>$v ){ ?>
										<option value="<?php echo $k;?>" <?php if(isset($module['header']) && $k==$module['header']) { ?>selected="selected"<?php } ?>><?php echo $v;?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
						</table>
					</div>
					<div id="tab-social-<?php echo $module_row; ?>-Twitter">
						<table class="form">
							<tr>
								<td><?php echo $entry_widgetid; ?></td>   
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][widget_id]" value="<?php echo isset($module['widget_id'])?$module['widget_id']:'366766896986591232'; ?>" size="35" /><br/><p><?php echo $entry_widget_help; ?></p></td> 
							</tr>
							<tr>
								<td><?php echo $entry_limit; ?></td>   
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][count]" value="<?php echo isset($module['count'])?$module['count']:5; ?>" size="3" /><br/>
								<p><?php echo $entry_count_help; ?></p></td> 
							</tr>
							<tr>
								<td><?php echo $entry_username; ?></td>   
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][username]" value="<?php echo isset($module['username'])?$module['username']:"PavoThemes"; ?>" size="35" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_theme; ?></td>   
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][theme]">
									<?php foreach($themes as $theme):?>
									<?php if(isset($module['theme']) && $module['theme'] == $theme):?>
									<option value="<?php echo $theme; ?>" selected="selected"><?php echo $theme; ?></option>
									<?php else: ?>
									<option value="<?php echo $theme; ?>"><?php echo $theme; ?></option>
									<?php endif;?>
									<?php endforeach; ?>
								</select> 
							</tr>
							<tr>
								<td><?php echo $entry_nickname_color; ?></td>   
								<td><input type="text" class="color" name="pavsocial_module[<?php echo $module_row; ?>][nickname_color]" value="<?php echo isset($module['nickname_color'])?$module['nickname_color']:'#000000'; ?>" size="35" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_name_color; ?></td>   
								<td><input type="text" class="color" name="pavsocial_module[<?php echo $module_row; ?>][name_color]" value="<?php echo isset($module['name_color'])?$module['name_color']:'#000000'; ?>" size="35" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_title_color; ?></td>   
								<td><input type="text" class="color" name="pavsocial_module[<?php echo $module_row; ?>][title_color]" value="<?php echo isset($module['title_color'])?$module['title_color']:'#000000'; ?>" size="35" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_linkcolor; ?></td>   
								<td><input type="text" class="color" name="pavsocial_module[<?php echo $module_row; ?>][link_color]" value="<?php echo isset($module['link_color'])?$module['link_color']:'#000000'; ?>" size="35" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_bordercolor; ?></td>   
								<td><input type="text" class="color" name="pavsocial_module[<?php echo $module_row; ?>][border_color]" value="<?php echo isset($module['border_color'])?$module['border_color']:'#000000'; ?>" size="35" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_width; ?></td>   
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][width]" value="<?php echo isset($module['width'])?$module['width']:'220'; ?>" size="10" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_height; ?></td>   
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][height]" value="<?php echo isset($module['height'])?$module['height']:'220'; ?>" size="10" /></td> 
							</tr>
							<tr>
								<td><?php echo $entry_showreply; ?></td>   
								<td>
									<select name="pavsocial_module[<?php echo $module_row; ?>][show_replies]">
										<?php if (isset($module['show_replies']) && $module['show_replies']) { ?>
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
								<td><?php echo $entry_chrome; ?></td>   
								<td><select name="pavsocial_module[<?php echo $module_row; ?>][chrome][]" multiple="multiple">
								<?php foreach($chromes as $chrome):?>
								<?php if(isset($module['chrome']) && is_array($module['chrome']) && in_array($chrome, $module['chrome'])):?>
								<option value="<?php echo $chrome; ?>" selected="selected"><?php echo $chrome; ?></option>
								<?php else: ?>
								<option value="<?php echo $chrome; ?>"><?php echo $chrome; ?></option>
								<?php endif;?>
								<?php endforeach; ?>
								</select><br/><p><?php echo $entry_chrome_help; ?></p></td> 
							</tr>
						</table>
					</div>
					<div id="tab-social-<?php echo $module_row; ?>-Youtube">
						<table class="form">
							<tr>
								<td><?php echo $this->language->get("entry_video_ids"); ?></td>   
								<td><textarea cols="57" rows="10" name="pavsocial_module[<?php echo $module_row; ?>][youtube_video_ids]"><?php echo isset($module['youtube_video_ids'])?$module['youtube_video_ids']:''; ?></textarea></td> 
							</tr>
							<tr>
								<td><?php echo $this->language->get("entry_video_width_height"); ?></td>   
								<td><input type="text" name="pavsocial_module[<?php echo $module_row; ?>][video_width]" value="<?php echo isset($module['video_width'])?$module['video_width']:'766'; ?>" size="15" /> X <input type="text" name="pavsocial_module[<?php echo $module_row; ?>][video_height]" value="<?php echo isset($module['video_height'])?$module['video_height']:'419'; ?>" size="15" /></td> 
							</tr>
						</table>
					</div>
					<?php /*
					<div id="tab-social-<?php echo $module_row; ?>-Pinterest">
						<table class="form">
							<tr>
								<td><?php echo $this->language->get("entry_pinterest_url"); ?></td>
								<td>
									<input size="60" type="text" value="<?php echo (isset($module['pinterest'])?$module['pinterest']:'' ) ?>" name="pavsocial_module[<?php echo $module_row; ?>][pinterest]" >
								</td>
							</tr>
						</table>
					</div>
					<div id="tab-social-<?php echo $module_row; ?>-Google">
						<table class="form">
							<tr>
								<td><?php echo $this->language->get("entry_google_url"); ?></td>
								<td>
									<input size="60" type="text" value="<?php echo (isset($module['google'])?$module['google']:'' ) ?>" name="pavsocial_module[<?php echo $module_row; ?>][google]" >
								</td>
							</tr>
						</table>
					</div>
					*/?>
				</div>
				<?php $module_row++; ?>
				<?php } ?>
			</form>
		</div>
	</div>
</div>
<?php /* 
	//Editor
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
<?php $module_row = 1; ?>
<?php foreach ($modules as $module) { ?>
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('description-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>', {
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
*/ ?>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {  

	html  = '<div id="tab-module-' + module_row + '" class="vtabs-content">';

	html += '<table class="form">';
	html += '	<tr>';
	html += '		<td><?php echo $entry_layout; ?></td>';
	html += '		<td><select name="pavsocial_module[' + module_row + '][layout_id]">';
						<?php foreach ($layouts as $layout) { ?>
	html += '			<option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
						<?php } ?>
	html += '		</select></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_position; ?></td>';
	html += '		<td><select name="pavsocial_module[' + module_row + '][position]">';
						<?php foreach( $positions as $pos ) { ?>
						<?php if ($pos == "column_left") { ?>
	html += '			<option selected="selected" value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>';
						<?php } else { ?>
	html += '			<option value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>';
						<?php } ?>
						<?php } ?>
	html += '		</select></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_status; ?></td>';
	html += '		<td><select name="pavsocial_module[' + module_row + '][status]">';
	html += '			<option value="1"><?php echo $text_enabled; ?></option>';
	html += '			<option value="0"><?php echo $text_disabled; ?></option>';
	html += '		</select></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_sort_order; ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][sort_order]" value="1" size="3" /></td>';
	html += '	</tr>';
	html += '</table>';

	<?php $socials = array("Facebook", "Twitter", "Youtube"/*, "Custombox", "Google", "Pinterest"*/); ?>
	html += '<div id="social-' + module_row + '" class="htabs">';
		<?php foreach ($socials as $social) { ?>
	html += '	<a href="#tab-social-' + module_row + '-<?php echo $social; ?>"><?php echo $social; ?></a>';
		<?php } ?>
	html += '</div>';

	html += '<div id="tab-social-' + module_row + '-Facebook">';
	html += '<table class="form">';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_facebook_url"); ?></td>';
	html += '		<td>';
	html += '			<input size="60" type="text" value="https://www.facebook.com/Pavothemes" name="pavsocial_module[' + module_row + '][facebook]" >';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_application_id"); ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][application_id]" value="" size="60" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_border_color"); ?></td>';
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][border_color]">';
							<?php foreach( $yesno as $k=>$v ){ ?>
	html += '				<option value="<?php echo $k;?>"><?php echo $v;?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_colorscheme"); ?></td>';
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][colorscheme]">';
	html += '				<option value="dark" >Dark</option>';
	html += '				<option value="light" selected="selected">Light</option>';
	html += '			</select>';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_width"); ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][face_width]" value="220"/></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_height"); ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][face_height]" value="220"/></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_show_tream"); ?></td>';
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][tream]">';
							<?php foreach( $yesno as $k=>$v ){ ?>
	html += '				<option value="<?php echo $k;?>"><?php echo $v;?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_show_faces"); ?></td>';
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][show_faces]">';
							<?php foreach( $yesno as $k=>$v ){ ?>
							<?php $selected = ($k==1)?'selected="selected"':''; ?>						
	html += '				<option value="<?php echo $k;?>" <?php echo $selected; ?>><?php echo $v;?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_header"); ?></td>';
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][header]">';
							<?php foreach( $yesno as $k=>$v ){ ?>
	html += '				<option value="<?php echo $k;?>"><?php echo $v;?></option>';
							<?php } ?>
	html += '			</select>';
	html += '		</td>';
	html += '	</tr>';
	html += '</table>';
	html += '</div>';

	html += '<div id="tab-social-' + module_row + '-Twitter">';
	html += '<table class="form">';
	html += '	<tr>';
	html += '		<td><?php echo $entry_widgetid; ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][widget_id]" value="366766896986591232" size="35" /><br/><p><?php echo $entry_widget_help; ?></p></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_limit; ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][count]" value="5" size="3" /><br/>';
	html += '		<p><?php echo $entry_count_help; ?></p></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_username; ?></td>'; 
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][username]" value="PavoThemes" size="35" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_theme; ?></td>'; 
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][theme]">';
						<?php foreach($themes as $theme):?>
	html += '			<option value="<?php echo $theme; ?>"><?php echo $theme; ?></option>';
						<?php endforeach; ?>
	html += '			</select>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_nickname_color; ?></td>';
	html += '		<td><input type="text" class="color" name="pavsocial_module[' + module_row + '][nickname_color]" value="#000000" size="35" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_name_color; ?></td>';
	html += '		<td><input type="text" class="color" name="pavsocial_module[' + module_row + '][name_color]" value="#000000" size="35" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_title_color; ?></td>';  
	html += '		<td><input type="text" class="color" name="pavsocial_module[' + module_row + '][title_color]" value="#000000" size="35" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_linkcolor; ?></td>';
	html += '		<td><input type="text" class="color" name="pavsocial_module[' + module_row + '][link_color]" value="#000000" size="35" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_bordercolor; ?></td>';   
	html += '		<td><input type="text" class="color" name="pavsocial_module[' + module_row + '][border_color]" value="#000000" size="35" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_width; ?></td>';   
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][width]" value="220" size="10" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_height; ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][height]" value="220" size="10" /></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_showreply; ?></td>'; 
	html += '		<td>';
	html += '			<select name="pavsocial_module[' + module_row + '][show_replies]">';
	html += '				<option value="1"><?php echo $text_enabled; ?></option>';
	html += '				<option value="0" selected="selected"><?php echo $text_disabled; ?></option>';
	html += '			</select>';
	html += '		</td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $entry_chrome; ?></td>';   
	html += '		<td><select name="pavsocial_module[' + module_row + ']][chrome][]" multiple="multiple">';
					<?php foreach($chromes as $chrome):?>
	html += '		<option value="<?php echo $chrome; ?>"><?php echo $chrome; ?></option>';
					<?php endforeach; ?>
	html += '		</select><br/><p><?php echo $entry_chrome_help; ?></p></td>';
	html += '	</tr>';
	html += '</table>';
	html += '</div>';

	html += '<div id="tab-social-' + module_row + '-Youtube">';
	html += '<table class="form">';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_video_ids"); ?></td>';  
	html += '		<td><textarea cols="57" rows="10" name="pavsocial_module[' + module_row + '][youtube_video_ids]">fNEepYl3LAk</textarea></td>';
	html += '	</tr>';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_video_width_height"); ?></td>';
	html += '		<td><input type="text" name="pavsocial_module[' + module_row + '][video_width]" value="400" size="15" /> X <input type="text" name="pavsocial_module[' + module_row + '][video_height]" value="200" size="15" /></td>';
	html += '	</tr>';
	html += '</table>';
	html += '</div>';
	
	// html += '<div id="tab-social-<?php echo $module_row; ?>-Custombox">';
	// html += '<table class="form">';
	// html += '	<tr>';
	// html += '		<td><?php echo $this->language->get("entry_custom_content"); ?></td>';
	// html += '		<td><textarea cols="57" rows="10" name="pavsocial_module[' + module_row + '][custom_content]"></textarea></td>';
	// html += '	</tr>';
	// html += '</table>';
	// html += '</div>';
	/*
	html += '<div id="tab-social-<?php echo $module_row; ?>-Google">';
	html += '<table class="form">';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_google_url"); ?></td>';
	html += '		<td><input size="60" type="text" value="https://plus.google.com/‎" name="pavsocial_module[' + module_row + '][google]" ></td>';
	html += '	</tr>';
	html += '</table>';
	html += '</div>';

	html += '<div id="tab-social-<?php echo $module_row; ?>-Pinterest">';
	html += '<table class="form">';
	html += '	<tr>';
	html += '		<td><?php echo $this->language->get("entry_pinterest_url"); ?></td>';
	html += '		<td><input size="60" type="text" value="http://www.pinterest.com/PavoThemes" name="pavsocial_module[' + module_row + '][pinterest]" ></td>';
	html += '	</tr>';
	html += '</table>';
	html += '</div>';
	*/
	html += '</div>';
	
	$('#form').append(html);
	
	<?php /* 
	//Editor
	<?php foreach ($languages as $language) { ?>
	CKEDITOR.replace('description-' + module_row + '-<?php echo $language['language_id']; ?>', {
		filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
	});  
	<?php } ?> 
	*/?>

	$('#social-' + module_row + ' a').tabs();
	
	$('#module-add').before('<a href="#tab-module-' + module_row + '" id="module-' + module_row + '"><?php echo $tab_module; ?> ' + module_row + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'.vtabs a:first\').trigger(\'click\'); $(\'#module-' + module_row + '\').remove(); $(\'#tab-module-' + module_row + '\').remove(); return false;" /></a>');
	
	$('.vtabs a').tabs();
	
	$('#module-' + module_row).trigger('click');
	
	module_row++;
}
//--></script> 
<script type="text/javascript"><!--
	$('.vtabs a').tabs();
	jscolor.install(true);
//--></script> 
<script type="text/javascript"><!--
<?php $i = 1; ?>
<?php foreach ($modules as $module) { ?>
$('#social-<?php echo $i; ?> a').tabs();
<?php $i++; ?>
<?php } ?> 
//--></script> 
<?php echo $footer; ?>