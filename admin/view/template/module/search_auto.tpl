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
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        
		<div style="float: left;">
		  <h3><?php echo $text_search_disc; ?></h3>
		  <table class="form">
		    <tr>
			  <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_disc_category; ?>
		      </td>
			  <td>
				<div class="listscroll">
                  <div class="even">
				    <input type="radio" name="search_auto_module_setting[disc][category]" value="-" checked="checked" /> <?php echo $text_none; ?>
				  </div>
				  <?php $class = 'even'; ?>
                  <?php foreach ($categories as $category) { ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <div class="<?php echo $class; ?>">
					<?php if($category['category_id'] == $disc_category) { ?>
                      <input type="radio" name="search_auto_module_setting[disc][category]" value="<?php echo $category['category_id']; ?>" checked="checked" />
                    <?php } else { ?>
					  <input type="radio" name="search_auto_module_setting[disc][category]" value="<?php echo $category['category_id']; ?>" />
                    <?php } ?>
					<?php echo $category['name']; ?>
                  </div>
                  <?php } ?>
                </div>
		      </td>
			</tr>
			<tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_disc_width; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[disc][width]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $disc_width) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_disc_diameter; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[disc][diameter]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $disc_diameter) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_disc_pcd; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[disc][pcd]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $disc_pcd) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_disc_dia; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[disc][dia]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $disc_dia) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_disc_et; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[disc][et]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $disc_et) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		  </table>
		</div>
		
		<div style="float: left; margin-left: 12px;">
		  <h3><?php echo $text_search_tire; ?></h3>
		  <table class="form">
		    <tr>
			  <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_tire_category; ?>
		      </td>
			  <td>
				<div class="listscroll">
                  <div class="even">
				    <input type="radio" name="search_auto_module_setting[tire][category]" value="-" checked="checked" /> <?php echo $text_none; ?>
				  </div>
				  <?php $class = 'even'; ?>
                  <?php foreach ($categories as $category) { ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <div class="<?php echo $class; ?>">
					<?php if($category['category_id'] == $tire_category) { ?>
                      <input type="radio" name="search_auto_module_setting[tire][category]" value="<?php echo $category['category_id']; ?>" checked="checked" />
                    <?php } else { ?>
					  <input type="radio" name="search_auto_module_setting[tire][category]" value="<?php echo $category['category_id']; ?>" />
                    <?php } ?>
					<span><?php echo $category['name']; ?></span>
                  </div>
                  <?php } ?>
                </div>
		      </td>
			</tr>
			<tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_tire_width; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[tire][width]">
				  <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
						<?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $tire_width) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_tire_height; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[tire][height]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $tire_height) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_tire_diameter; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[tire][diameter]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $tire_diameter) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		    <tr>
		      <td>
			    <span class="required">*</span>&nbsp;<?php echo $entry_tire_seasons; ?>
		      </td>
		      <td>
			    <select name="search_auto_module_setting[tire][seasons]">
			      <option value="-" selected="selected"><?php echo $text_none; ?></option>
			      <?php foreach ($attributes as $attr_group) { ?>
				    <?php if($attr_group['items']) { ?>
					  <optgroup label="<?php echo $attr_group['group_name']; ?>">
					    <?php foreach ($attr_group['items'] as $attr) { ?>
					      <?php if($attr['attribute_id'] == $tire_seasons) { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>" selected="selected"><?php echo $attr['attribute_name']; ?></option>
						  <?php } else { ?>
						    <option value="<?php echo $attr['attribute_id']; ?>"><?php echo $attr['attribute_name']; ?></option>
						  <?php } ?>
					    <?php } ?>
					  </optgroup>
					<?php } ?>
				  <?php } ?>
			    </select>
		      </td>
		    </tr>
		  </table>
		</div>
		
		<table id="module" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $entry_layout; ?></td>
              <td class="left"><?php echo $entry_position; ?></td>
              <td class="left"><?php echo $entry_forms; ?></td>
              <td class="left"><?php echo $entry_status; ?></td>
              <td class="right"><?php echo $entry_sort_order; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
              <td class="left"><select name="search_auto_module[<?php echo $module_row; ?>][layout_id]">
                  <?php foreach ($layouts as $layout) { ?>
                  <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="search_auto_module[<?php echo $module_row; ?>][position]">
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
			  <td class="forms">
				  <label><input type="checkbox" name="search_auto_module[<?php echo $module_row; ?>][forms][tire]" value="1" <?php echo isset($module['forms']['tire']) ? 'checked="checked" ' : ''; ?>/><?php echo $text_search_tire; ?></label><br />
			      <label><input type="checkbox" name="search_auto_module[<?php echo $module_row; ?>][forms][disc]" value="1" <?php echo isset($module['forms']['disc']) ? 'checked="checked" ' : ''; ?>/><?php echo $text_search_disc; ?></label><br />
			      <label><input type="checkbox" name="search_auto_module[<?php echo $module_row; ?>][forms][auto]" value="1" <?php echo isset($module['forms']['auto']) ? 'checked="checked" ' : ''; ?>/><?php echo $text_search_auto; ?></label>
			    </td>
              <td class="left"><select name="search_auto_module[<?php echo $module_row; ?>][status]">
                  <?php if ($module['status']) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              <td class="right"><input type="text" name="search_auto_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
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
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="search_auto_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="search_auto_module[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="forms"><label><input type="checkbox" name="search_auto_module[' + module_row + '][forms][tire]" value="1" checked="checked" /><?php echo $text_search_tire; ?></label><br />';
	html += '      <label><input type="checkbox" name="search_auto_module[' + module_row + '][forms][disc]" value="1" checked="checked" /><?php echo $text_search_disc; ?></label><br />';
	html += '      <label><input type="checkbox" name="search_auto_module[' + module_row + '][forms][auto]" value="1" checked="checked" /><?php echo $text_search_auto; ?></label>';
	html += '    </td>';
	html += '    <td class="left"><select name="search_auto_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="search_auto_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
//--></script> 
<?php echo $footer; ?>