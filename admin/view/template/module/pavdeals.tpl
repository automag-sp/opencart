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
        <a class="button" onclick="$('#action').val('saveedit');$('#form').submit();"><?php echo $this->language->get('text_save_edit'); ?></a>
        <a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <input type="hidden" name="pavdeals_module[action]" id="action" value=""/>
        <input type="hidden" value="<?php echo $store_id;?>" name="pavdeals_module[store_id]"/>
        
        <div id="tabs" class="htabs">
            <a href="#tab-general"><?php echo $this->language->get("tab_general"); ?></a>
            <a href="#tab-position"><?php echo $this->language->get("tab_position"); ?></a>
         </div>
         <div id="tab-contents">
            <div id="tab-general">
                <div class="tab-inner">
                  <table class="form"> 
                      <tr>
                        <td><?php echo $this->language->get('entry_order_status'); ?></td>
                        <td><select name="pavdeals_config[order_status_id]">
                            <?php 
                            if(isset($order_statuses) && !empty($order_statuses)){
                              foreach($order_statuses as $order_status){
                                if(isset($general['order_status_id']) && ($order_status['order_status_id'] == $general['order_status_id'])){
                                  ?>
                                  <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status["name"];?></option>
                                  <?php
                                }else{
                                  ?>
                                  <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status["name"];?></option>
                                  <?php
                                }
                              }

                            }
                            ?>
                        </select><br/><p><?php echo $this->language->get("text_order_status_help");?></p></td>
                      </tr>
                      <tr>
                        <td><?php echo $this->language->get("entry_saleoff_icon");?></td>
                        <td>
                          <?php $image = isset($general['saleoff_icon'])?$general['saleoff_icon']:""; ?>
                          <div class="image">
                            <img src="<?php echo $bg_thumb; ?>" alt="" id="thumb" />
                            <input type="hidden" name="pavdeals_config[saleoff_icon]" value="<?php echo $image; ?>" id="image" />
                            <br />
                            <a onclick="image_upload('image', 'thumb');"><?php echo $this->language->get("text_browse"); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $this->language->get("text_clear"); ?></a>
                            
                          </div>
                          <br class="clear clr" style="clear:both"/>
                            <p><font style="font-size:12px"><i><?php echo $this->language->get("entry_saleoff_icon_help"); ?></i></font></p>
                        </td>
                      </tr>

						<?php //today deal?>
						<tr>
							<td><?php echo $this->language->get('entry_today_deal'); ?><span class="help"><?php echo $this->language->get('help_range_date'); ?></span></td>
							<td>
								<select id="today-deal" name="pavdeals_config[today_deal]">
									<?php foreach($today_deals as $key=>$value): ?>
									<?php $selected = (isset($general['today_deal']) && ($key == $general['today_deal']))?'selected=selected':''?>
									<option value='<?php echo $key;?>' <?php echo $selected;?> ><?php echo $value;?></option>
									<?php endforeach; ?>
								</select>
                <span class="help"><?php echo $this->language->get('help_range_date_1'); ?></span>
							</td>
						</tr>
						<tr class="deal-specific">
							<td><?php echo $this->language->get('entry_today_date_start_end'); ?></td>
							<td><input type="text" class="date" name="pavdeals_config[time_end]" value="<?php echo isset($general['time_end'])?$general['time_end']:''; ?>"/></td>
						</tr>
						<tr>
							<td><?php echo $this->language->get('enable_available'); ?></td>
							<td>
								<select id="today-deal" name="pavdeals_config[enable_available]">
									<?php if (isset($general['enable_available']) && $general['enable_available']) { ?>
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
							<td><?php echo $this->language->get('enable_pass'); ?></td>
							<td>
								<select id="today-deal" name="pavdeals_config[enable_pass]">
									<?php if ($general['enable_pass']) { ?>
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
                        <td><?php echo $this->language->get("entry_saleoff_icon_width_height");?></td>
                        <td>
                          <input type="text" name="pavdeals_config[icon_width]" value="<?php echo isset($general['icon_width'])?$general['icon_width']:180;?>" size="10"/> / <input type="text" name="pavdeals_config[icon_height]" value="<?php echo isset($general['icon_height'])?$general['icon_height']:180;?>" size="10"/>
                        </td>
                        <tr>
		      <tr>
                          <td><?php echo $this->language->get("entry_limit_cols");?></td>
                          <td>
                              <input type="text" value="<?php echo isset($general['limit'])?$general['limit']:10;?>" size="10" name="pavdeals_config[limit]"> - <input type="text" value="<?php echo isset($general['cols'])?$general['cols']:3;?>" size="10" name="pavdeals_config[cols]">
                              <?php /*- <input type="text" value="<?php echo isset($general['itemsperpage'])?$general['itemsperpage']:5;?>" size="10" name="pavdeals_config[itemsperpage]">*/?>
                          </td>
                      </tr>
                      <tr>
                          <td><?php echo $this->language->get("entry_width_height");?></td>
                          <td>
                              <input type="text" value="<?php echo isset($general['width'])?$general['width']:180;?>" size="10" name="pavdeals_config[width]"> /
                              <input type="text" value="<?php echo isset($general['height'])?$general['height']:180;?>" size="10" name="pavdeals_config[height]">
                          </td>
                      </tr>
                  </table>
                  <div class="clear"></div>
                  <div class="more-info">
                    <h4><?php echo $this->language->get('text_explain_urlformats');?></h4>
                    <ol> 
                      <li><div><b><?php echo $this->language->get('text_front_page'); ?></b></div>Normal: <?php echo HTTPS_CATALOG."index.php?route=pavdeals/deals";?></li>
                    </ol>
                  </div>
                </div>
              </div>
            <div id="tab-position">
                <div class="tab-inner">
                  <div style="padding-bottom: 10px;">
                    <label style="font-weight: bold;color:red;"><?php echo $this->language->get('entry_default_store'); ?></label>
                    <select name="pavdeals_module[stores]" id="pavstores">
                      <?php foreach($stores as $store):?>
                      <?php if($store['store_id'] == $store_id):?>
                        <option value="<?php echo $store['store_id'];?>" selected="selected"><?php echo $store['name'];?></option>
                      <?php else:?>
                        <option value="<?php echo $store['store_id'];?>"><?php echo $store['name'];?></option>
                      <?php endif;?>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="vtabs">
                    <?php $module_row = 1; ?>
                    <?php foreach ($modules as $module) { ?>
                    <a href="#tab-module-<?php echo $module_row; ?>" id="module-<?php echo $module_row; ?>"><?php echo $tab_module . ' ' . ($module_row); ?>&nbsp;<img src="view/image/delete.png" alt="" onclick="$('.vtabs a:first').trigger('click'); $('#module-<?php echo $module_row; ?>').remove(); $('#tab-module-<?php echo $module_row; ?>').remove(); return false;" /></a>
                    <?php $module_row++; ?>
                    <?php } ?>
                    <span id="module-add"><?php echo $button_add_module; ?>&nbsp;<img src="view/image/add.png" alt="" onclick="addModule();" /></span> </div>
                  <?php $module_row = 1; ?>
                  <?php foreach ($modules as $module) { ?>
                  <?php $module = array_merge($default_values, $module); ?>
                    <div id="tab-module-<?php echo $module_row; ?>" class="vtabs-content">
                        <table class="form">
                                  <tr>
                                    <td><?php echo $this->language->get("entry_layout"); ?></td>
                                    <td><select name="pavdeals_module[<?php echo $module_row; ?>][layout_id]">
                
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
                                    <td><select name="pavdeals_module[<?php echo $module_row; ?>][position]">
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
                                    <td><select name="pavdeals_module[<?php echo $module_row; ?>][status]">
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
                                    <td><input type="text" name="pavdeals_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
                                  </tr>
                                <tr>
                                  <td colspan="2"><?php echo $this->language->get("entry_filter_label"); ?></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->language->get('entry_date_start_end'); ?></td>
                                  <td><?php echo $this->language->get('entry_from'); ?><input type="text" class="date" name="pavdeals_module[<?php echo $module_row; ?>][date_start]" value="<?php echo isset($module['date_start'])?$module['date_start']:''; ?>"/><?php echo $this->language->get('entry_to'); ?><input type="text" class="date" name="pavdeals_module[<?php echo $module_row; ?>][date_to]" value="<?php echo isset($module['date_to'])?$module['date_to']:''; ?>"/></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->language->get('entry_categories'); ?></td>
                                  <td><select name="pavdeals_module[<?php echo $module_row; ?>][category_ids][]" id="pavdeals_module_<?php echo $module_row; ?>_category_ids" multiple="multiple" size="10">
                                     <?php foreach ($categories as $category) { ?>
                                     <?php
                                      $click = "";
                                      if(empty($category['category_id']))
                                        $click = " onclick=\"selectAll('#pavdeals_module_{$module_row}_category_ids');\"";
                                     ?>
                                        <option value="<?php echo $category['category_id']; ?>" <?php echo $click; ?> <?php if( isset($module['category_ids']) && in_array($category['category_id'],$module['category_ids'])) { ?> selected="selected" <?php } ?>><?php echo $category['name']; ?></option>
                                      <?php } ?>
                                    </select></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->language->get('entry_sort_order_deals'); ?></td>
                                  <td><select name="pavdeals_module[<?php echo $module_row; ?>][sort_deals]">
                                     <?php foreach ($sortdeals as $k=>$v) { ?>
                                        <option value="<?php echo $k; ?>" <?php if( isset($module['sort_deals']) && $k = $module['sort_deals']) { ?> selected="selected" <?php } ?>><?php echo $v; ?></option>
                                      <?php } ?>
                                    </select></td>
                                </tr>
                                  <tr>
                                    <td><?php echo $this->language->get('entry_limit_cols_itemsperpage'); ?></td>
                                    <td><input type="text" name="pavdeals_module[<?php echo $module_row; ?>][limit]" size="10" value="<?php echo isset($module['limit'])?$module['limit']:10; ?>"/> - <input type="text" name="pavdeals_module[<?php echo $module_row; ?>][cols]" size="10" value="<?php echo isset($module['cols'])?$module['cols']:1; ?>"/> - <input type="text" name="pavdeals_module[<?php echo $module_row; ?>][itemsperpage]" size="10" value="<?php echo isset($module['itemsperpage'])?$module['itemsperpage']:5; ?>"/></td>
                                  </tr>
                                  <tr>
                                  <td><?php echo $this->language->get('entry_additional_class'); ?></td>
                                  <td><input type="text" name="pavdeals_module[<?php echo $module_row; ?>][prefix]" size="45" value="<?php echo isset($module['prefix'])?$module['prefix']:""; ?>"/></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->language->get('entry_width_height'); ?></td>
                                  <td><input type="text" name="pavdeals_module[<?php echo $module_row; ?>][width]" size="10" value="<?php echo isset($module['width'])?$module['width']:"180"; ?>"/> x <input type="text" name="pavdeals_module[<?php echo $module_row; ?>][height]" size="10" value="<?php echo isset($module['height'])?$module['height']:"180"; ?>"/></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->language->get('entry_auto_play'); ?></td>
                                  <td><select name="pavdeals_module[<?php echo $module_row; ?>][auto_play]">
                                     <?php foreach ($yesno as $k=>$v) { ?>
                                        <option value="<?php echo $k; ?>" <?php if( isset($module['auto_play']) && $module['auto_play'] == $k ) { ?> selected="selected" <?php } ?>><?php echo $v; ?></option>
                                      <?php } ?>
                                    </select></td>
                                </tr>
                                <tr>
                                  <td><?php echo $this->language->get('entry_interval'); ?></td>
                                  <td><input type="text" name="pavdeals_module[<?php echo $module_row; ?>][interval]" size="10" value="<?php echo isset($module['interval'])?$module['interval']:"1000"; ?>"/></td>
                                </tr>
                                  
                    </table> 
                    </div>
                    <?php $module_row++; ?>
                  <?php } ?>
                  <div class="clear"></div>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--

$(document).ready(function() {

  $('#tabs a').click( function(){
    $.cookie("sactived_tab", $(this).attr("href") );
  });

  if( $.cookie("sactived_tab") !="undefined" ){
    $('#tabs a').each( function(){ 
      if( $(this).attr("href") ==  $.cookie("sactived_tab") ){
        $(this).click();
        return ;
      }
    });
  }

  $('#pavstores').bind('change', function () {
      url = 'index.php?route=module/pavdeals&token=<?php echo $token; ?>';
      var id = $(this).val();
      if (id) {
          url += '&store_id=' + encodeURIComponent(id);
      }
      window.location = url;
  });

	selectbox($("#today-deal").val());
	$( "#today-deal" ).change(function() {
		$selected = $(this).val();
		selectbox($selected);
	});
	function selectbox($selected) {
		$(".deal-specific").hide();
		if($selected == 99){
			$(".deal-specific").show();
		}
	}
});

var module_row = <?php echo $module_row; ?>;
$('#tabs a').tabs();
$(".vtabs a").tabs();
$('.date').datepicker({dateFormat: 'yy-mm-dd'});
function selectAll(obj){
  $(obj).find("option").each(function(index,Element) {
    $(Element).attr("selected","selected");
  }); 
}
function addModule() {
  html  = '<div id="tab-module-' + module_row + '" class="vtabs-content">';

  html += '  <table class="form">';
  
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_layout"); ?></td>';
  html += '      <td><select name="pavdeals_module[' + module_row + '][layout_id]">';
  <?php foreach ($layouts as $layout) { ?>
  html += '           <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
  <?php } ?>
  html += '      </select></td>';
  html += '    </tr>';
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_position"); ?></td>';
  html += '      <td><select name="pavdeals_module[' + module_row + '][position]">';
  <?php foreach( $positions as $pos ) { ?>
  html += '<option value="<?php echo $pos;?>"><?php echo $this->language->get('text_'.$pos); ?></option>';      
  <?php } ?>    html += '      </select></td>';
  html += '    </tr>';
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_status"); ?></td>';
  html += '      <td><select name="pavdeals_module[' + module_row + '][status]">';
  html += '        <option value="1"><?php echo $text_enabled; ?></option>';
  html += '        <option value="0"><?php echo $text_disabled; ?></option>';
  html += '      </select></td>';
  html += '    </tr>';
  html += '    <tr>';
  html += '      <td><?php echo $this->language->get("entry_sort_order"); ?></td>';
  html += '      <td><input type="text" name="pavdeals_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
  html += '    </tr>';
  html += '<tr>';
  html += '<tr>';
  html += '                                <td colspan="2"><?php echo $this->language->get("entry_filter_label"); ?></td>';
  html += '                              </tr>';
  html += '                              <tr>';
  html += '                                <td><?php echo $this->language->get('entry_date_start_end'); ?></td>';
  html += '                                <td><?php echo $this->language->get('entry_from'); ?><input type="text" class="date" name="pavdeals_module[' + module_row + '][date_start]" value=""/><?php echo $this->language->get('entry_to'); ?><input type="text" class="date" name="pavdeals_module[' + module_row + '][date_to]" value=""/></td>';
  html += '                              </tr>';
  html += '                              <tr>';
  html += '                                <td><?php echo $this->language->get('entry_categories'); ?></td>';
  html += '                                <td><select name="pavdeals_module[' + module_row + '][category_ids][]" id="pavdeals_module_' + module_row + '_category_ids" multiple="multiple" size="10">';
                                     <?php foreach ($categories as $category) { ?>
  html += '                                 <option value="<?php echo $category['category_id']; ?>" <?php if(empty($category['category_id'])): ?>  onclick="selectAll(\'#pavdeals_module_' + module_row + '_category_ids\');" <?php endif;?>><?php echo preg_replace('/[^A-Za-z0-9\-]/', '', $category['name']); ?></option>';
                                      <?php } ?>
  html += '                                  </select></td>';
  html += '                              </tr>';
  html += '                              <tr>';
  html += '                                <td><?php echo $this->language->get('entry_sort_order_deals'); ?></td>';
  html += '                                <td><select name="pavdeals_module[' + module_row + '][sort_deals]">';
                                     <?php foreach ($sortdeals as $k=>$v) { ?>
  html += '                                      <option value="<?php echo $k; ?>"><?php echo $v; ?></option>';
                                      <?php } ?>
  html += '                                  </select></td>';
  html += '                              </tr>';
  html += '                                  <td><?php echo $this->language->get('entry_limit_cols_itemsperpage'); ?></td>';
  html += '                                  <td><input type="text" name="pavdeals_module[' + module_row + '][limit]" size="10" value="10"/> - <input type="text" name="pavdeals_module[' + module_row + '][cols]" size="10" value="1"/> - <input type="text" name="pavdeals_module[' + module_row + '][itemsperpage]" size="10" value="5"/></td>';
  html += '                                </tr>';
  html += '                                <tr>';
  html += '                                <td><?php echo $this->language->get('entry_additional_class'); ?></td>';
  html += '                                <td><input type="text" name="pavdeals_module[' + module_row + '][prefix]" size="45" value=""/></td>';
  html += '                              </tr>';
  html += '                              <tr>';
  html += '                                <td><?php echo $this->language->get('entry_width_height'); ?></td>';
  html += '                                <td><input type="text" name="pavdeals_module[' + module_row + '][width]" size="10" value="180"/> x <input type="text" name="pavdeals_module[' + module_row + '][height]" size="10" value="180"/></td>';
  html += '                              </tr>';
  html += '                              <tr>';
  html += '                                <td><?php echo $this->language->get('entry_auto_play'); ?></td>';
  html += '                                <td><select name="pavdeals_module[' + module_row + '][auto_play]">';
                                     <?php foreach ($yesno as $k=>$v) { ?>
  html += '                                      <option value="<?php echo $k; ?>"><?php echo $v; ?></option>';
                                      <?php } ?>
  html += '                                  </select></td>';
  html += '                              </tr>';
  html += '                              <tr>';
  html += '                                <td><?php echo $this->language->get('entry_interval'); ?></td>';
  html += '                                <td><input type="text" name="pavdeals_module[' + module_row + '][interval]" size="10" value="1000"/></td>';
  html += '                              </tr>';

  
  html += '  </table>'; 
  html += '</div>';
  
  $('#form').append(html);

  $('#module-add').before('<a href="#tab-module-' + module_row + '" id="module-' + module_row + '"><?php echo $tab_module; ?> ' + module_row + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'.vtabs a:first\').trigger(\'click\'); $(\'#module-' + module_row + '\').remove(); $(\'#tab-module-' + module_row + '\').remove(); return false;" /></a>');
  
  $('.vtabs a').tabs();
  $('.date').datepicker({dateFormat: 'yy-mm-dd'});
  $('#module-' + module_row).trigger('click');
  module_row++;
}
//--></script> 
<script type="text/javascript"><!--
function image_upload(field, thumb) {
  $('#dialog').remove();
  
  $('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
  
  $('#dialog').dialog({
    title: '<?php echo $this->language->get("text_image_manager"); ?>',
    close: function (event, ui) {
      if ($('#' + field).attr('value')) {
        $.ajax({
          url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).val()),
          dataType: 'text',
          success: function(data) {
            $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
          }
        });
      }
    },  
    bgiframe: false,
    width: 800,
    height: 400,
    resizable: false,
    modal: false
  });
};
//--></script> 
<?php echo $footer; ?>