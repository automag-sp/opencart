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
<div class="box">
  <div class="heading">
    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
  </div>
  <div class="content">
  	<div id="tabs" class="htabs">
	  	<a href="#tab-general"><?php echo $tab_position; ?></a>
		<a href="#tab-html"><?php echo $tab_blocks; ?></a>
	</div>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
		<div id="tab-general">
      <table id="module" class="list">
        <thead>
          <tr>
            <td class="left"><span class="required">*</span> <?php echo $entry_html_block; ?></td>
            <td class="left"><?php echo $entry_layout; ?></td>
            <td class="left"><?php echo $entry_position; ?></td>
            <td class="left"><?php echo $entry_status; ?></td>
            <td class="right"><?php echo $entry_sort_order; ?></td>
            <td></td>
          </tr>
        </thead>
        <?php $module_row = 0; ?>
        <?php foreach ($modules as $module) { ?>
        <tbody id="module-row<?php echo $module_row; ?>">
          <tr>
            <td class="left html_block_id"><select name="html_block_module[<?php echo $module_row; ?>][html_block_id]">
				<option value=""><?php echo $text_select; ?></option>
                <?php $block_row = 0;
				foreach ($html_block_content as $content_id => $content) { ?>
                <?php if ($content_id == $module['html_block_id']) { ?>
                <option value="<?php echo $content_id; ?>" selected="selected">Блок <?php echo $content_id; ?></option>
                <?php } else { ?>
                <option value="<?php echo $content_id; ?>"><?php echo $text_block . ' ' . $content_id; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
			  <?php if (isset($error_content[$module_row])) { ?>
              <span class="error"><?php echo $error_content[$module_row]; ?></span>
              <?php } ?></td>
            <td class="left"><select name="html_block_module[<?php echo $module_row; ?>][layout_id]">
                <?php foreach ($layouts as $layout) { ?>
                <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
            <td class="left"><select name="html_block_module[<?php echo $module_row; ?>][position]">
                <?php if ($module['position'] == 'content_top') { ?>
                <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                <?php } else { ?>
                <option value="content_top"><?php echo $text_content_top; ?></option>
                <?php } ?>
                <?php if ($module['position'] == 'content_bottom') { ?>
                <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                <?php } else { ?>
                <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                <?php } ?>
                <?php if ($module['position'] == 'column_left') { ?>
                <option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
                <?php } else { ?>
                <option value="column_left"><?php echo $text_column_left; ?></option>
                <?php } ?>
                <?php if ($module['position'] == 'column_right') { ?>
                <option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
                <?php } else { ?>
                <option value="column_right"><?php echo $text_column_right; ?></option>
                <?php } ?>
              </select></td>
            <td class="left"><select name="html_block_module[<?php echo $module_row; ?>][status]">
                <?php if ($module['status']) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
            <td class="right"><input type="text" name="html_block_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
            <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
          </tr>
        </tbody>
        <?php $module_row++; ?>
        <?php } ?>
        <tfoot>
          <tr>
            <td colspan="5"></td>
            <td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
          </tr>
        </tfoot>
      </table>
	  </div>
	  <div id="tab-html">
			<div id="vtabs" class="vtabs">
				<?php $content_row = 1; ?>
				<?php foreach ($html_block_content as $block_id => $content) { ?>
				<a href="#tab-content-<?php echo $content_row; ?>" id="content-<?php echo $content_row; ?>" rel="<?php echo $block_id; ?>"><?php echo $text_block . ' ' . $block_id; ?> <img src="view/image/delete.png" alt="" onclick="removeBlock(<?php echo $content_row; ?>);  return false;" /></a>
				<?php $content_row++; ?>
				<?php } ?>
				<span id="content-add"><?php echo $button_add_block; ?> <img src="view/image/add.png" alt="" onclick="addBlock();" /></span>
			</div>
			<?php $content_row = 1; $block_id = 0; ?>
			<?php foreach ($html_block_content as $block_id => $content) { ?>
			<div id="tab-content-<?php echo $content_row; ?>" class="vtabs-content">
				<table class="form">
				  <tbody>
				  	<tr>
					  <td><label for="html-block-<?php echo $block_id; ?>-use-php"><?php echo $entry_php; ?></label></td>
					  <td>
					  	<input id="html-block-<?php echo $block_id; ?>-use-php" type="checkbox" name="html_block_<?php echo $block_id; ?>[use_php]" <?php echo isset($content['use_php']) ? 'checked="checked"' : ''; ?>  />
					  </td>
					</tr>
					<tr>
					  <td><label for="html-block-<?php echo $block_id; ?>-theme"><?php echo $entry_theme; ?></label></td>
					  <td>
					  	<input id="html-block-<?php echo $block_id; ?>-theme" type="checkbox" class="html-block-content-use-theme" name="html_block_<?php echo $block_id; ?>[theme]" <?php echo isset($content['theme']) ? 'checked="checked"' : ''; ?>  />
					  </td>
					</tr>
				</tbody>
				</table>
				<div class="theme-more <?php if(!isset($content['theme'])) echo 'hide'; ?>">
					<table class="form">
						<tbody id="content-theme-<?php echo $content_row; ?>" >
							<tr>
								<td></td>
								<td>
									<p class="link">
										<a class="js"><?php echo $text_tokens; ?></a>
									</p>
									<div class="content" style="display: none;">
										<table class="list">
											<thead>
												<tr>
													<td class="left"><?php echo $column_token; ?></td>
													<td class="left"><?php echo $column_value; ?></td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="left">[title]</td>
													<td class="left"><?php echo $text_replace_title; ?></td>
												</tr>
												<tr>
													<td class="left">[content]</td>
													<td class="left"><?php echo $text_replace_content; ?></td>
												</tr>
											</tbody>
										</table>
										
									</div>
									<textarea rows="10" cols="100" name="html_block_<?php echo $block_id; ?>[template]"><?php echo isset($content['template']) ? $content['template'] : ''; ?></textarea>
									<p class="help"><?php echo $text_php_help; ?></p>
								</td>
							</tr>
						</tbody>
						
				  </table>
			  </div>
			  <div id="language-<?php echo $content_row; ?>" class="htabs">
				<?php foreach ($languages as $language) { ?>
				<a href="#tab-language-<?php echo $content_row; ?>-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
				<?php } ?>
			  </div>
			  <?php foreach ($languages as $language) { ?>
			  <div id="tab-language-<?php echo $content_row; ?>-<?php echo $language['language_id']; ?>" class="html-block-content-content">
			  	<table class="form margin">
				<tbody>
			  		<tr>
					  <td><label for="html-block-<?php echo $block_id; ?>-title-<?php echo $language['language_id']; ?>"><?php echo $entry_title; ?></label></td>
					  <td><input id="html-block-<?php echo $block_id; ?>-title-<?php echo $language['language_id']; ?>" type="text" name="html_block_<?php echo $block_id; ?>[title][<?php echo $language['language_id']; ?>]" value="<?php echo $content['title'][$language['language_id']]; ?>" /></td>
					</tr>
				  <tr>
				  	<td class="message"><label for="content-<?php echo $content_row; ?>-<?php echo $language['language_id']; ?>"><?php echo $entry_content; ?></label><span class="help">
						<a class="js show-hide-editor help"><?php echo ($content['editor'][$language['language_id']]) ? $text_disable_editor : $text_enabled_editor; ?></a>
					</span></td>
					<td><textarea class="<?php echo ($content['editor'][$language['language_id']]) ? 'enabled' : 'disable'; ?>" rows="19" cols="130" name="html_block_<?php echo $block_id; ?>[content][<?php echo $language['language_id']; ?>]" id="content-<?php echo $content_row; ?>-<?php echo $language['language_id']; ?>"><?php echo $content['content'][$language['language_id']]; ?></textarea><p class="help"><?php echo $text_php_help . '.<br />' . $text_php_help_editor; ?></p><input type="hidden" name="html_block_<?php echo $block_id; ?>[editor][<?php echo $language['language_id']; ?>]" value="<?php echo $content['editor'][$language['language_id']]; ?>" /></td>
				  </tr>
				  </tbody>
				</table>
			  </div>
			  <?php } ?>
			</div>
			<?php $content_row++; ?>
			<?php } ?>
	  </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--

function addCkeditor(el) {
	CKEDITOR.replace(el, {
		filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
	}); 
}

<?php $content_row = 1; ?>
<?php foreach ($html_block_content as $content) { ?>
<?php foreach ($languages as $language) { ?>
	if ($('#content-<?php echo $content_row; ?>-<?php echo $language['language_id']; ?>').hasClass('enabled')) {
		addCkeditor('content-<?php echo $content_row; ?>-<?php echo $language['language_id']; ?>');
	}
<?php } ?>
<?php $content_row++; ?>
<?php } ?>

$('#tab-html').delegate('.show-hide-editor', 'click', function(event){
	event.preventDefault();
	var context = $(this).parents('tr');
	var textarea = $('textarea', context);
	if (CKEDITOR.instances[$(textarea).attr('id')]) {
		CKEDITOR.instances[$(textarea).attr('id')].destroy(true);
		var help_text = '<?php echo $text_enabled_editor; ?>';
		var val = 0;
	} else {
		addCkeditor($(textarea).attr('id'));
		var help_text = '<?php echo $text_disable_editor; ?>';
		var val = 1;
	}
	$('input[type=hidden]', context).val(val);
	$(this).text(help_text);
});


//--></script> 
<script type="text/javascript"><!--

$('#tab-html').delegate('p.link a.js', 'click', function(event){
	event.preventDefault();
	$(this).parent().next('.content').slideToggle('fast');
});

$('#tab-html').delegate('.html-block-content-use-theme', 'click', function(event) {
	$(this).parents('table').next('.theme-more').slideToggle('fast');
});

var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left html_block_id"><select name="html_block_module[' + module_row + '][html_block_id]">';
	html += '    <option value=""><?php echo $text_select; ?></option>';
	$('#vtabs a').each(function(i, el){
	html += '    <option value="' + $(el).attr('rel') + '">' + $(el).text() + '</option>';
	});
	html += '    </select></td>';
	html += '    <td class="left"><select name="html_block_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="html_block_module[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="html_block_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="html_block_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}

var content_row = <?php echo $content_row; ?>;
var block_id = <?php echo $block_id; ?>;

function addBlock() {
	
	block_id++;
	
	var default_theme = '<div class="box">\n';
	default_theme +=	'	<div class="box-heading">[title]</div>\n';
	default_theme +=	'	<div class="box-content">\n';
	default_theme +=	'		[content]\n';
	default_theme +=	'	</div>\n';
	default_theme +=	'</div>\n';
	
	html  = '<div id="tab-content-' + content_row + '" class="vtabs-content">';
	
	html += '  <table class="form" cols="2">';
	html += '    <tbody>';
	html += '    </tr>';
	html += '       <td><label for="html-block-' + block_id + '-use-php"><?php echo $entry_php; ?></label></td>';
	html += '      	<td><input id="html-block-' + block_id + '-use-php" type="checkbox" name="html_block_' + block_id + '[use_php]" /></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><label for="html-block-' + block_id + '-theme"><?php echo $entry_theme; ?></label></td>';
	html += '      <td><input type="checkbox" class="html-block-content-use-theme" id="html-block-' + block_id + '-theme" name="html_block_' + block_id + '[theme]" /></td>';
	html += '    </tr>';
	html += '    </tbody>';	
	html += '  </table>'; 
	html += '  <div class="theme-more hide">';
	html += '    <table class="form">';
	html += '      <tbody id="content-theme-' + content_row + '" >';
	html += '        <tr>';
	html += '  		   <td></td>';
	html += '  		   <td>';
	html += '            <p class="link">';
	html += '			   <a class="js"><?php echo $text_tokens; ?></a>';
	html += '  			 </p>';
	html += '			 <div class="content" style="display: none;">';
	html += '  			   <table class="list">';
	html += '  			     <thead>';
	html += '  				   <tr>';
	html += '				     <td class="left"><?php echo $column_token; ?></td>';
	html += '  					 <td class="left"><?php echo $column_value; ?></td>';
	html += '  				   </tr>';
	html += '  				 </thead>';
	html += '  				 <tbody>';
	html += '  				   <tr>';
	html += '  				     <td class="left">[title]</td>';
	html += '  					 <td class="left"><?php echo $text_replace_title; ?></td>';
	html += '  				   </tr>';
	html += '  				   <tr>';
	html += '  				     <td class="left">[content]</td>';
	html += '  					 <td class="left"><?php echo $text_replace_content; ?></td>';
	html += '  				   </tr>';
	html += '  				 </tbody>';
	html += '  			   </table>';
	html += '  			 </div>';
	html += '  			 <textarea rows="10" cols="100" name="html_block_' + block_id + '[template]">' + default_theme + '</textarea><p class="help"><?php echo $text_php_help; ?></p>';
	html += '  		   </td>';
	html += '  		 </tr>';
	html += '  	   </tbody>';
	html += '  	 </table>';
	html += '  </div>';
	
	html += '  <div id="language-' + content_row + '" class="htabs">';
    <?php foreach ($languages as $language) { ?>
    html += '    <a href="#tab-language-'+ content_row + '-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>';
    <?php } ?>
	html += '  </div>';

	<?php foreach ($languages as $language) { ?>
	html += '    <div id="tab-language-'+ content_row + '-<?php echo $language['language_id']; ?>" class="html-block-content-content">';
	html += '      <table class="form">';
	html += '    	<tr>';
	html += '      <td><label for="html-block-' + block_id + '-title-<?php echo $language['language_id']; ?>"><?php echo $entry_title; ?></label></td>';
	html += '      <td><input type="text" id="html-block-' + block_id + '-title-<?php echo $language['language_id']; ?>" name="html_block_' + block_id + '[title][<?php echo $language['language_id']; ?>]" value="" /></td>';
	html += '    	</tr>';
	html += '        <tr>';
	html += '          <td><label for="content-' + content_row + '-<?php echo $language['language_id']; ?>"><?php echo $entry_content; ?></label><span class="help"><a class="js show-hide-editor help"><?php echo $text_disable_editor; ?></a></span></td>';
	html += '          <td class="message"><textarea class="enabled" rows="19" cols="130" name="html_block_' + block_id + '[content][<?php echo $language['language_id']; ?>]" id="content-' + content_row + '-<?php echo $language['language_id']; ?>"></textarea><p class="help"><?php echo $text_php_help . '.<br />' . $text_php_help_editor; ?></p><input type="hidden" name="html_block_' + block_id + '[editor][<?php echo $language['language_id']; ?>]" value="1" /></td>';
	html += '        </tr>';
	html += '      </table>';
	html += '    </div>';
	<?php } ?>

	
	html += '</div>';
	
	$('#tab-html').append(html);
	
	<?php foreach ($languages as $language) { ?>
		addCkeditor('content-' + content_row + '-<?php echo $language['language_id']; ?>');
	<?php } ?>
	
	$('#language-' + content_row + ' a').tabs();
	
	$('#content-add').before('<a href="#tab-content-' + content_row + '" id="content-' + content_row + '" rel="' + block_id + '"><?php echo $text_block; ?> ' + block_id + '&nbsp;<img src="view/image/delete.png" alt="" onclick="removeBlock(' + content_row + ');  return false; " /></a>');
	
	$('.vtabs a').tabs();
	
	$('#content-' + content_row).trigger('click');
	
	$('#module.list tbody td.html_block_id select').append('<option value="' + block_id + '"><?php echo $text_block; ?> ' + block_id + '</option>');
	
	content_row++;
	
}

function removeBlock(content_row) {
	
	var error = false;
	
	$('#module.list tbody td.html_block_id select').each(function(i, el){
		if ($(el).val() == $('#content-' + content_row).attr('rel')) {
			error = true;
			module = $(el).parents('tbody');
		}
	});
	
	if (error) {
	
		if (confirm('<?php echo $text_confirm_remove; ?>')) {
			$(module).remove();
		} else {
			return;
		}
	
	}
		
	$('#module.list tbody td.html_block_id select').each(function(i, el){
		$('option[value=' + $('#content-' + content_row).attr('rel') + ']', el).remove();
	});
	
	$('.vtabs a:first').trigger('click');
	$('#content-' + content_row).remove();
	$('#tab-content-' + content_row).remove();
	 
}

//--></script>
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#vtabs a').tabs();
//--></script>
<script type="text/javascript"><!--
<?php $content_row = 1; ?>
<?php foreach ($html_block_content as $content) { ?>
$('#language-<?php echo $content_row; ?> a').tabs();
<?php $content_row++; ?>
<?php } ?> 
//--></script> 
<?php echo $footer; ?>