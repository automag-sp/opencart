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
      <h1><img src="view/image/pickup-advanced.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
        <a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a>
        <a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs">
        <a href="#tab-settings"><?php echo $tab_settings; ?></a>
        <a href="#tab-points"><?php echo $tab_points; ?></a>
        <a href="#tab-about"><?php echo $tab_about; ?></a>
      </div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-settings">
          <h2><?php echo $text_settings; ?></h2>
          <table class="form">
            <tr>
              <td><?php echo $entry_title; ?></td>
              <td>
                <?php foreach ($languages as $language) { ?>
                <input type="text" name="pickup_advanced_settings[<?php echo $language['language_id']; ?>][title]" value="<?php echo isset($pickup_advanced_settings[$language['language_id']]) ? $pickup_advanced_settings[$language['language_id']]['title'] : ''; ?>" style="margin-bottom: 3px;" />
                <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" style="margin-bottom: -1px;" />
                <br />
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td><?php echo $entry_null_cost_text; ?></td>
              <td>
                <?php foreach ($languages as $language) { ?>
                <input type="text" name="pickup_advanced_settings[<?php echo $language['language_id']; ?>][null_cost]" value="<?php echo isset($pickup_advanced_settings[$language['language_id']]) ? $pickup_advanced_settings[$language['language_id']]['null_cost'] : ''; ?>" style="margin-bottom: 3px;" />
                <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" style="margin-bottom: -1px;" />
                <br />
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td><?php echo $entry_null_cost; ?></td>
              <td>
                <select name="pickup_advanced_null_cost">
                  <?php if ($pickup_advanced_null_cost) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr style="display: none;">
              <td><?php echo $entry_group_points; ?></td>
              <td>
                <select name="pickup_advanced_group_points">
                  <?php if ($pickup_advanced_group_points) { ?>
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
              <td><?php echo $entry_status; ?></td>
              <td>
                <select name="pickup_advanced_status">
                  <?php if ($pickup_advanced_status) { ?>
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
              <td><input type="text" name="pickup_advanced_sort_order" value="<?php echo $pickup_advanced_sort_order; ?>" size="1" /></td>
            </tr>
          </table>
        </div>
        <div id="tab-points">
          <h2><?php echo $text_points; ?></h2>
          <table id="module" class="list">
            <thead>
              <tr>
                <td><?php echo $entry_description; ?></td>
                <td><?php echo $entry_link; ?></td>
                <td><?php echo $entry_link_text; ?></td>
                <td class="center"><?php echo $entry_link_status; ?></td>
                <td><?php echo $entry_cost; ?></td>
                <td class="center"><?php echo $entry_weight; ?></td>
                <td class="center"><?php echo $entry_relation; ?></td>
                <td class="center"><?php echo $entry_percentage; ?></td>
                <td class="center"><?php echo $entry_geo_zone; ?></td>
                <td class="center"><?php echo $entry_status_text; ?></td>
                <td class="center"><?php echo $entry_sort_text; ?></td>
                <td class="center"><?php echo $entry_action; ?></td>
              </tr>
            </thead>
            <?php $module_row = 0; ?>
            <?php foreach ($modules as $module) { ?>
            <tbody id="module-row<?php echo $module_row; ?>">
              <tr>
                <td style="width: 270px;">
                  <?php foreach ($languages as $language) { ?>
                  <input type="text" name="pickup_advanced_module[<?php echo $module_row; ?>][<?php echo $language['language_id']; ?>][description]" value="<?php echo isset($module[$language['language_id']]) ? $module[$language['language_id']]['description'] : ''; ?>" style="margin-bottom: 3px;" size="32" />
                  <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" style="margin-bottom: -1px;" />
                  <br />
                  <?php } ?>
                </td>
                <td style="width: 230px;">
                  <?php foreach ($languages as $language) { ?>
                  <input type="text" name="pickup_advanced_module[<?php echo $module_row; ?>][<?php echo $language['language_id']; ?>][link]" value="<?php echo isset($module[$language['language_id']]) ? $module[$language['language_id']]['link'] : ''; ?>" style="margin-bottom: 3px;" size="26" />
                  <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" style="margin-bottom: -1px;" />
                  <br />
                  <?php } ?>
                </td>
                <td style="width: 160px;">
                  <?php foreach ($languages as $language) { ?>
                  <input type="text" name="pickup_advanced_module[<?php echo $module_row; ?>][<?php echo $language['language_id']; ?>][link_text]" value="<?php echo isset($module[$language['language_id']]) ? $module[$language['language_id']]['link_text'] : ''; ?>" style="margin-bottom: 3px;" size="16" />
                  <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" style="margin-bottom: -1px;" />
                  <br />
                  <?php } ?>
                </td>
                <td style="width: 85px;" class="center">
                  <select name="pickup_advanced_module[<?php echo $module_row; ?>][link_status]">
                    <?php if ($module['link_status']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td><input type="text" name="pickup_advanced_module[<?php echo $module_row; ?>][cost]" value="<?php echo $module['cost']; ?>" size="23" /></td>
                <td style="width: 105px;" class="center">
                  <select name="pickup_advanced_module[<?php echo $module_row; ?>][weight]">
                    <?php if ($module['weight']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td style="width: 115px;" class="center">
                  <select name="pickup_advanced_module[<?php echo $module_row; ?>][relation]">
                    <?php if ($module['relation']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td style="width: 115px;" class="center">
                  <select name="pickup_advanced_module[<?php echo $module_row; ?>][percentage]">
                    <?php if ($module['percentage']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td style="width: 100px;" class="center">
                  <select name="pickup_advanced_module[<?php echo $module_row; ?>][geo_zone_id]">
                    <option value="0"><?php echo $text_all_zones; ?></option>
                    <?php foreach ($geo_zones as $geo_zone) { ?>
                    <?php if ($geo_zone['geo_zone_id'] == $module['geo_zone_id']) { ?>
                    <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
                </td>
                <td style="width: 85px;" class="center">
                  <select name="pickup_advanced_module[<?php echo $module_row; ?>][status]">
                    <?php if ($module['status']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td style="width: 75px;" class="center"><input type="text" name="pickup_advanced_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="1" /></td>
                <td style="width: 85px;" class="center"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button-delete"><?php echo $button_delete; ?></a></td>
              </tr>
            </tbody>
            <?php $module_row++; ?>
            <?php } ?>
            <tfoot>
              <tr>
                <td colspan="11"></td>
                <td class="center"><a onclick="addModule();" class="button-insert"><?php echo $button_insert; ?></a></td>
              </tr>
            </tfoot>
          </table>
          <?php echo $entry_tip_text; ?>
        </div>
        <div id="tab-about">
          <h2><?php echo $text_about_title; ?></h2>
          <table class="form">
            <?php echo $text_about_description; ?>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
<!--
var module_row = <?php echo $module_row; ?>;

function addModule()
{
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td style="width: 270px;">';
	               <?php foreach ($languages as $language) { ?>
				   var language_id    = "<?php echo $language['language_id']; ?>";
				   var language_image = "<?php echo $language['image']; ?>";
				   var language_name  = "<?php echo $language['name']; ?>";
	html += '      <input type="text" name="pickup_advanced_module[' + module_row + '][' + language_id + '][description]" value="<?php echo isset($pickup_advanced_module[$language["language_id"]]) ? $pickup_advanced_module[$language["language_id"]]["description"] : ""; ?>' + (module_row + 1) + '" style="margin-bottom: 3px;" size="32" />';
	html += '      <img src="view/image/flags/' + language_image + '" title="' + language_name + '" style="margin-bottom: -1px;" />';
	html += '      <br />';
                   <?php } ?>
	html += '    </td>';
	html += '    <td style="width: 230px;">';
	               <?php foreach ($languages as $language) { ?>
				   var language_id    = "<?php echo $language['language_id']; ?>";
				   var language_image = "<?php echo $language['image']; ?>";
				   var language_name  = "<?php echo $language['name']; ?>";
	html += '      <input type="text" name="pickup_advanced_module[' + module_row + '][' + language_id + '][link]" value="<?php echo isset($pickup_advanced_module[$language["language_id"]]) ? $pickup_advanced_module[$language["language_id"]]["link"] : ""; ?>" style="margin-bottom: 3px;" size="26" />';
	html += '      <img src="view/image/flags/' + language_image + '" title="' + language_name + '" style="margin-bottom: -1px;" />';
	html += '      <br />';
                   <?php } ?>
	html += '    </td>';
	html += '    <td style="width: 160px;">';
	               <?php foreach ($languages as $language) { ?>
				   var language_id    = "<?php echo $language['language_id']; ?>";
				   var language_image = "<?php echo $language['image']; ?>";
				   var language_name  = "<?php echo $language['name']; ?>";
	html += '      <input type="text" name="pickup_advanced_module[' + module_row + '][' + language_id + '][link_text]" value="<?php echo isset($pickup_advanced_module[$language["language_id"]]) ? $pickup_advanced_module[$language["language_id"]]["link_text"] : ""; ?>" style="margin-bottom: 3px;" size="16" />';
	html += '      <img src="view/image/flags/' + language_image + '" title="' + language_name + '" style="margin-bottom: -1px;" />';
	html += '      <br />';
                   <?php } ?>
	html += '    </td>';
	html += '    <td style="width: 85px;" class="center">';
	html += '      <select name="pickup_advanced_module[' + module_row + '][link_status]">';
    html += '        <option value="1"><?php echo $text_enabled; ?></option>';
    html += '        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';
    html += '      </select>';
	html += '    </td>';
	html += '    <td><input type="text" name="pickup_advanced_module[' + module_row + '][cost]" value="0" size="23" /></td>';
	html += '    <td style="width: 105px;" class="center">';
	html += '      <select name="pickup_advanced_module[' + module_row + '][weight]">';
    html += '        <option value="1"><?php echo $text_enabled; ?></option>';
    html += '        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';
    html += '      </select>';
	html += '    </td>';
	html += '    <td style="width: 115px;" class="center">';
	html += '      <select name="pickup_advanced_module[' + module_row + '][relation]">';
    html += '        <option value="1"><?php echo $text_enabled; ?></option>';
    html += '        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';
    html += '      </select>';
	html += '    </td>';
	html += '    <td style="width: 115px;" class="center">';
	html += '      <select name="pickup_advanced_module[' + module_row + '][percentage]">';
    html += '        <option value="1"><?php echo $text_enabled; ?></option>';
    html += '        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';
    html += '      </select>';
	html += '    </td>';
	html += '    <td style="width: 100px;" class="center">';
	html += '      <select name="pickup_advanced_module[' + module_row + '][geo_zone_id]">';
    html += '        <option value="0" selected="selected"><?php echo $text_all_zones; ?></option>';
    html += '        <?php foreach ($geo_zones as $geo_zone) { ?>';
	html += '        <option value="<?php echo $geo_zone["geo_zone_id"]; ?>"><?php echo $geo_zone["name"]; ?></option>';
	html += '        <?php } ?>';
    html += '      </select>';
	html += '    </td>';
	html += '    <td style="width: 85px;" class="center">';
	html += '      <select name="pickup_advanced_module[' + module_row + '][status]">';
    html += '        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '        <option value="0"><?php echo $text_disabled; ?></option>';
    html += '      </select>';
	html += '    </td>';
	html += '    <td style="width: 75px;" class="center"><input type="text" name="pickup_advanced_module[' + module_row + '][sort_order]" value="' + (module_row + 1) + '" size="1" /></td>';
	html += '    <td style="width: 85px;" class="center"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button-delete"><?php echo $button_delete; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}

$('#tabs a').tabs();
//-->
</script>
<?php echo $footer; ?>
