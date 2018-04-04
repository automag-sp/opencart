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
       <div class="logo"><h1><?php echo $heading_title; ?> </h1></div>
      <div class="slidebar"><?php require( dirname(__FILE__).'/toolbar.tpl' ); ?></div>
       <div class="clear clr"></div>
    </div>
    <div class="right-panel">
      <div class="heading">
        <h1 class="logo"><?php echo $this->language->get("text_frontend_modules"); ?></h1>
      </div>
       <div class="toolbar"><?php require( dirname(__FILE__).'/action_bar.tpl' ); ?></div>
       <div class="content">
          <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
              <label style="font-weight: bold;color:red;"><?php echo $this->language->get('entry_default_store'); ?></label>
              <select name="pavnewsletter_module[stores]" onchange="location = this.value;">
                <?php foreach($stores as $store):?>
                <?php if($store['store_id'] == $store_id):?>
                  <option value="<?php echo $store['option'];?>" selected="selected"><?php echo $store['name'];?></option>
                <?php else:?>
                  <option value="<?php echo $store['option'];?>"><?php echo $store['name'];?></option>
                <?php endif;?>
                <?php endforeach;?>
              </select>
              <input type="hidden" value="<?php echo $store_id;?>" name="pavnewsletter_module[store_id]"/><br/><br/>
             <div id="tabs" class="htabs">
                <a href="#tab-mod-newsletter-box"><?php echo $this->language->get("tab_newsletter_box"); ?></a>
             </div>
             <div id="tab-contents">

            <div id="tab-mod-newsletter-box">
                <div class="tab-inner">
                  <div class="vtabs">
                    <?php $module_row = 1; ?>
                    <?php foreach ($modules as $module) { ?>
                    <a href="#tab-module-<?php echo $module_row; ?>" id="module-<?php echo $module_row; ?>"><?php echo $tab_module . ' ' . ($module_row); ?>&nbsp;<img src="view/image/delete.png" alt="" onclick="$('.vtabs a:first').trigger('click'); $('#module-<?php echo $module_row; ?>').remove(); $('#tab-module-<?php echo $module_row; ?>').remove(); return false;" /></a>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <span id="module-add"><?php echo $button_add_module; ?>&nbsp;<img src="view/image/add.png" alt="" onclick="addModule();" /></span> </div>
                  <?php $module_row = 1; ?>
                  <?php foreach ($modules as $module) { ?>
                  <?php //$module = array_merge($default_values, $module); ?>
                    <div id="tab-module-<?php echo $module_row; ?>" class="vtabs-content">
                        <table class="form">
                                  <tr>
                                    <td><?php echo $this->language->get("entry_layout"); ?></td>
                                    <td><select name="pavnewsletter_module[<?php echo $module_row; ?>][layout_id]">
                                      <?php foreach ($layouts as $layout) { ?>
                                      <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                                      <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                                      <?php } else { ?>
                                      <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                                      <?php } ?>
                                      <?php } ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $this->language->get("entry_position"); ?></td>
                                    <td><select name="pavnewsletter_module[<?php echo $module_row; ?>][position]">
                                     <?php foreach( $positions as $pos ) { ?>
                                              <?php if ($module['position'] == $pos) { ?>
                                              <option value="<?php echo $pos;?>" selected="selected"><?php echo $this->language->get('text_'.$pos); ?></option>
                                              <?php } else { ?>
                                              <option value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>
                                              <?php } ?>
                                              <?php } ?> 
                                            </select></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $this->language->get("entry_status"); ?></td>
                                    <td><select name="pavnewsletter_module[<?php echo $module_row; ?>][status]">
                                    <?php if ($module['status']) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                  </select></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $this->language->get("entry_sort_order"); ?></td>
                                    <td><input type="text" name="pavnewsletter_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo isset($module['sort_order'])?$module['sort_order']:''; ?>" size="3" /></td>
                                  </tr>
					
				<tr>
					<td><?php echo $this->language->get('entry_description'); ?></td>
					<td>
						<textarea name="pavnewsletter_module[<?php echo $module_row; ?>][description]" id="description-<?php echo $module_row; ?>"><?php echo isset($module['description']) ? $module['description'] : ''; ?></textarea><br/>
						<span class="help"><?php echo $this->language->get('about_entry_description');?></span>
					</td>
				</tr>
						
                    </table> 
                    </div>
                    <?php $module_row++; ?>
                  <?php }?>
                  </div>
            </div>
          </div>
      </form>
    </div>
    </div>
    <div class="clear clr"></div>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--

$('.vtabs a').each(function( index ) {
	var id = $(this).attr('id');
	current_row = id.substr(id.length - 1);
	CKEDITOR.replace('description-' + current_row, {
	  height:200,
		filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
	});
});




var module_row = <?php echo $module_row; ?>;
$('#tabs a').tabs();
$(".vtabs a").tabs();
function addModule() {
  html  = '<div id="tab-module-' + module_row + '" class="vtabs-content">';

  html += '  <table class="form">';
  
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_layout"); ?></td>';
  html += '      <td><select name="pavnewsletter_module[' + module_row + '][layout_id]">';
  <?php foreach ($layouts as $layout) { ?>
  html += '           <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
  <?php } ?>
  html += '      </select></td>';
  html += '    </tr>';
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_position"); ?></td>';
  html += '      <td><select name="pavnewsletter_module[' + module_row + '][position]">';
  <?php foreach( $positions as $pos ) { ?>
  html += '<option value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>';      
  <?php } ?>    html += '      </select></td>';
  html += '    </tr>';
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_status"); ?></td>';
  html += '      <td><select name="pavnewsletter_module[' + module_row + '][status]">';
  html += '        <option value="1"><?php echo $text_enabled; ?></option>';
  html += '        <option value="0"><?php echo $text_disabled; ?></option>';
  html += '      </select></td>';
  html += '    </tr>';
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_sort_order"); ?></td>';
  html += '      <td><input type="text" name="pavnewsletter_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
  html += '    </tr>';
 
//description
html += '<tr>';
html += '<td><?php echo $this->language->get('entry_description'); ?></td>';
html += '<td>';
html += '<textarea name="pavnewsletter_module['+module_row+'][description]" id="description-'+module_row+'"></textarea><br/>';
html += '<span class="help"><?php echo $this->language->get('about_entry_description');?></span>';
html += '</td>';
html += '</tr>'; 
  
  
  html += '  </table>'; 
  html += '</div>';
 
$('#tab-mod-newsletter-box .tab-inner').first().append(html);

  
CKEDITOR.replace('description-' + module_row, {
  height:200,
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
}); 


  $('#module-add').before('<a href="#tab-module-' + module_row + '" id="module-' + module_row + '"><?php echo $tab_module; ?> ' + module_row + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'.vtabs a:first\').trigger(\'click\'); $(\'#module-' + module_row + '\').remove(); $(\'#tab-module-' + module_row + '\').remove(); return false;" /></a>');
  
  $('.vtabs a').tabs();
  
  $('#module-' + module_row).trigger('click');
  module_row++;
}
</script>
<?php echo $footer; ?>