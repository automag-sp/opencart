<?php
/******************************************************
 * @package Pav verticalmenu module for Opencart 1.5.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

if( $menu ): 
$module_row= 'ss';
?>
<?php if( $menu['verticalmenu_id'] > 0 ) { ?>
<h3><?php echo sprintf($text_edit_menu, $menu['title'], $menu['verticalmenu_id']);?></h3>
<?php } else { ?>
<h3><?php echo $text_create_new;?></h3>
<?php } ?>
<div>
<?php 
// echo '<pre>'.print_r( $menu_description,1 ); die;
?>
	<h4>Menu Information</h4>
	 <div id="language-<?php echo $module_row; ?>" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#tab-language-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div>
          <?php foreach ($languages as $language) { ?>
          <div id="tab-language-<?php echo $language['language_id']; ?>">
            <table class="form">
              <tr>
				<td>Title</td>
				<td><input name="verticalmenu_description[<?php echo $language['language_id'];?>][title]" value="<?php echo (isset($menu_description[$language['language_id']]['title'])?$menu_description[$language['language_id']]['title']:"" );?>"/></td>
              </tr>
			   <tr>
				<td><?php echo $this->language->get('entry_description');?></td>
				<td>
					<textarea name="verticalmenu_description[<?php echo $language['language_id'];?>][description]" value=""><?php echo (isset($menu_description[$language['language_id']]['description'])?$menu_description[$language['language_id']]['description']:"");?></textarea>
				</td>
              </tr>
            </table>
          </div>
          <?php } ?>
	<h4>Menu Type</h4>
	<input type="hidden" name="verticalmenu[item]" value="<?php echo $menu['item'];?>" />
	<table class="form">
		<tr>
			<td><?php echo $this->language->get('entry_publish');?></td>
				
			<td>
				<select type="list" name="verticalmenu[published]" >
					<?php foreach( $yesno as $key => $val ){ ?>
					<option value="<?php echo $key;?>" <?php if( $key==$menu['published']){ ?> selected="selected"<?php } ?>><?php echo $val; ?></option>
					<?php } ?>
				</select>
 			</td>
		</tr>
		<tr>
			<td><?php echo $this->language->get('entry_type');?></td>
				
			<td>
				<select name="verticalmenu[type]" id="verticalmenutype">
					<?php foreach(  $verticalmenutypes as $mt => $val ){ ?>
					<option value="<?php echo $mt; ?>" <?php if($mt == $menu['type']) {?> selected="selected" <?php } ?>><?php echo $val; ?></option>
					<?php } ?>
				</select>
 			</td>
		</tr>
		<tr id="verticalmenutype-url" class="verticalmenutype">
			<td><?php echo $this->language->get('entry_url');?></td>
			<td>
				<input type="text" name="verticalmenu[url]" value="<?php echo $menu['url'];?>" size="50"/>
			</td>
		</tr>
		<tr id="verticalmenutype-category" class="verticalmenutype">
			<td><?php echo $this->language->get('entry_category');?></td>
			<td>
				<input type="text" name="path" value="<?php echo $menu['verticalmenu-category'];?>" size="100" />
                <i><?php echo $this->language->get('text_explain_input_auto');?></i>
			</td>
		</tr>
		<tr id="verticalmenutype-product" class="verticalmenutype">
			<td><?php echo $this->language->get('entry_product');?></td>
			<td>
				<input type="text" name="verticalmenu-product" value="<?php echo $menu['verticalmenu-product'];?>" size="50"/>
				<i><?php echo $this->language->get('text_explain_input_auto');?></i>
			</td>
		</tr>
		<tr id="verticalmenutype-manufacturer" class="verticalmenutype">
			<td><?php echo $this->language->get('entry_manufacturer');?></td>
			<td>
				<input type="text" name="verticalmenu-manufacturer" value="<?php echo $menu['verticalmenu-manufacturer'];?>" size="50"/>
				<i><?php echo $this->language->get('text_explain_input_auto');?></i>
			</td>
		</tr>
		<tr id="verticalmenutype-information" class="verticalmenutype">
			<td><?php echo $this->language->get('entry_information');?></td>
			<td>
				
				<select type="text" name="verticalmenu-information" id="verticalmenu-information">
					<?php foreach( $informations as $info ){ ?>
					<option value="<?php echo $info['information_id'];?>" <?php if( $menu['verticalmenu-information'] == $info['information_id']){ ?> selected="selected" <?php } ?>><?php echo $info['title'];?></option>
					<?php } ?>
				</select>
				
			</td>
		</tr>
		<tr id="verticalmenutype-html" class="verticalmenutype">
			<td><?php echo $this->language->get('entry_html');?></td>
			<td>
				<textarea type="text" name="verticalmenu[content_text]"  size="50"><?php echo $menu['content_text'];?></textarea>
				<i><?php echo $this->language->get('text_explain_input_html');?></i>
			</td>
		</tr>
	</table>	
	<h4>Menu Params</h4>	  
	 <table class="form">
		<tr>
			<td><?php echo $this->language->get('entry_parent_id');?></td>
				
			<td>
				<?php echo $menus;?>
 			</td>
		</tr>
		 <tr>
              <td><?php echo $entry_image;  ?></td>
              <td valign="top"><div class="image"><img src="<?php echo $thumb; ?>" alt="" id="thumb" />
                  <input type="hidden" name="verticalmenu[image]" value="<?php echo $menu['image']; ?>" id="image" />
                  <br />
                  <a onclick="image_upload('image', 'thumb');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a></div></td>
            </tr>
		<tr>
			<td><?php echo $this->language->get('entry_menuclass');?></td>
				
			<td>
				<input type="text" name="verticalmenu[menu_class]" value="<?php echo $menu['menu_class']?>"/>
				
 			</td>
		</tr>	
		<tr>
			<td><?php echo $this->language->get('entry_showtitle');?></td>
				
			<td>
				<select type="list" name="verticalmenu[show_title]" >
					<?php foreach( $yesno as $key => $val ){ ?>
					<option value="<?php echo $key;?>" <?php if( $key==$menu['show_title']){ ?> selected="selected"<?php } ?>><?php echo $val; ?></option>
					<?php } ?>
				</select>
 			</td>
		</tr>
		<tr>
			<td><?php echo $this->language->get('entry_isgroup');?></td>
				
			<td>
				<select type="list" name="verticalmenu[is_group]" value="">
					<?php foreach( $yesno as $key => $val ){ ?>
					<option value="<?php echo $key;?>" <?php if( $key==$menu['is_group']){ ?> selected="selected"<?php } ?>><?php echo $val; ?></option>
					<?php } ?>
				</select>
				<i><?php echo $this->language->get('text_explain_group');?></i>
 			</td>
		</tr>
		<tr style="display:none">
			<td><?php echo $this->language->get('entry_iscontent');?></td>
			<td>
				<select type="list" name="verticalmenu[is_content]">
					<?php foreach( $yesno as $key => $val ){ ?>
					<option value="<?php echo $key;?>" <?php if( $key==$menu['is_content']){ ?> selected="selected"<?php } ?>><?php echo $val; ?></option>
					<?php } ?>
				</select>
 			</td>
		</tr>
		
		<tr>
			<td>
				<?php echo $this->language->get("entry_columns");?>
			</td>
				
			<td>
				<input type="text" name="verticalmenu[colums]" value="<?php echo $menu['colums']?>"/>
				<i><?php echo $this->language->get('text_explain_columns');?></i>
 			</td>
		</tr>
		
		
		 
		<tr>
			<td>
			<?php echo $this->language->get("entry_detail_columns");?>	
			</td>
				
			<td>
				<textarea type="text" name="verticalmenu[submenu_colum_width]" rows="5"><?php echo $menu['submenu_colum_width']?></textarea>
				<i><?php echo $this->language->get('text_explain_submenu_cols');?></i>
 			</td>
		</tr>
		<tr>
			<td><?php echo $this->language->get("entry_sub_menutype");?></td>
			<td>
				<?php //echo '<pre>'.print_r( $menu,1 ); die ;?>
				<select name="verticalmenu[type_submenu]" id="verticalmenu-type_submenu">
					<?php foreach( $submenutypes as $stype => $text ) { ?>
					<option value="<?php echo $stype;?>" <?php if($stype==$menu['type_submenu']) { ?> selected="selected"<?php } ?>><?php echo $text;?></option>
					<?php } ?>
				</select>
				<i><?php echo $this->language->get('text_explain_submenu_type');?></i>
			</td>
		</tr>
		<tr class="type_submenu" id="type_submenu-html" style="display:none;">
			<td><?php echo $this->language->get('entry_submenu_content');?></td>
			<td>
				<textarea name="verticalmenu[submenu_content]" id="submenu_content"><?php echo $menu['submenu_content'];?></textarea>
			
			</td>
		<tr>

		<tr class="type_submenu" id="type_submenu-widget" style="display:none;">
			<td><?php echo $this->language->get('entry_widget_id');?></td>
			<td>
				 <?php if( is_array($widgets) )  { ?>
				 <select name="verticalmenu[widget_id]">
				 	<?php foreach( $widgets as $w => $t ) { ?>
				 	<option <?php if($t['id'] == $menu['widget_id']) { ?> selected="selected" <?php } ?>value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
				 	<?php } ?>
				 </select>
				 <?php } ?>
			</td>
		<tr>

	</table>
	<input type="hidden" name="verticalmenu[verticalmenu_id]" value="<?php echo $menu['verticalmenu_id']?>"/>
</div>
<?php endif; ?>

<script type="text/javascript"> 
$("#type_submenu-"+$("#verticalmenu-type_submenu").val()).show();
$("#verticalmenu-type_submenu").change( function(){
	$(".type_submenu").hide();
	$("#type_submenu-"+$(this).val()).show();
} );


CKEDITOR.replace('submenu_content', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});


CKEDITOR.replace('verticalmenu[content_text]', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});




   $( "#grouptabs a" ).tabs();
   $( "#language-<?php echo $module_row; ?> a" ).tabs();
   $(".verticalmenutype").hide();
   $("#verticalmenutype-"+ $("#verticalmenutype").val()).show();
   $("#verticalmenutype").change( function(){
		$(".verticalmenutype").hide();
		$("#verticalmenutype-"+$(this).val()).show();
   } );
   
   




$('input[name=\'verticalmenu-manufacturer\']').autocomplete({
	delay: 500,
	source: function(request, response) {		
		$.ajax({
			url: 'index.php?route=catalog/manufacturer/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				json.unshift({
					'manufacturer_id':  0,
					'name':  '<?php echo $text_none; ?>'
				});
				
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.manufacturer_id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'verticalmenu-manufacturer\']').val(ui.item.label);
		$('input[name=\'verticalmenu[item]\']').val(ui.item.value);
		
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});

$("#verticalmenu-information").change( function(){ 
	$('input[name=\'verticalmenu[item]\']').val($(this).val());
} );

$('input[name=\'verticalmenu-product\']').autocomplete({
	delay: 500,
	source: function(request, response) {		
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				json.unshift({
					'product_id':  0,
					'name':  '<?php echo $text_none; ?>'
				});
				
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.product_id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'verticalmenu-product\']').val(ui.item.label);
		$('input[name=\'verticalmenu[item]\']').val(ui.item.value);
		
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});

   
$('input[name=\'path\']').autocomplete({
	delay: 500,
	source: function(request, response) {		
		$.ajax({
			url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				json.unshift({
					'category_id':  0,
					'name':  '<?php echo $text_none; ?>'
				});
				
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.category_id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'path\']').val(ui.item.label);
		$('input[name=\'verticalmenu[item]\']').val(ui.item.value);
		
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
</script>