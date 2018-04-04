<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <!--
  <div class="warning">stock_status_id</div>
  <div class="warning">shipping</div>
  <div class="warning">status</div>
  -->
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
		<table class="form">
            <tr>
              <td><span class="required">*</span> <?php echo $entry_name; ?></td>
              <td><input type="text" name="name" value="<?php echo $supplers['name']; ?>" maxlength="64" size="32" />
                <?php if ($error_name) { ?>
                <span class="error"><?php echo $error_name; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
			  <td><span class="required">*</span> <?php echo $entry_rate; ?></td>
              <td><input type="text" name="rate" value="<?php echo $supplers['rate']; ?>" size="12" /></td>
			</tr>            
            <tr>
			  <td><?php echo $entry_path; ?></td>
              <td>&nbsp;<span class="help"><?=DIR_APPLICATION?>uploads/</span><br /><input type="text" name="path" value="<?php echo $supplers['path']; ?>" size="92" /></td>
			</tr>            
            <tr>
			  <td><?php echo $entry_file; ?></td>
              <td><input type="file" name="file" size="42" /></td>
			</tr>            
            <tr>
			  <td><span class="required">*</span> <?php echo $entry_mask; ?></td>
              <td><input type="text" name="mask" value="<?php echo $supplers['mask']; ?>" size="42" /></td>
			</tr>
            <tr>
			  <td><?php echo $entry_days; ?></td>
              <td><input type="text" name="days" value="<?php echo $supplers['days']; ?>" size="42" /></td>
			</tr>
			<tr>
			  <td><span class="required">*</span> <?php echo $entry_category; ?></td>
			  <td>
              	<select name="category_id">
                  <option value="0"><?php echo $text_none; ?></option>
                  <?php foreach ($categories as $category) { ?>
                  <?php if($category['category_id'] == $categoty_id) { ?>			
                  <option value="<?php echo $category['category_id']; ?>" selected="selected"><?php echo $category['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
			</tr>	
			<tr>
			  <td><?php echo $entry_brand; ?></td>
			  <td>
              	<select name="brand_id">
                  <option value="0"><?php echo $text_none; ?></option>
                  <?php foreach ($brands as $brand) { ?>
                  <?php if($brand['manufacturer_id'] == $brand_id) { ?>			
                  <option value="<?php echo $brand['manufacturer_id']; ?>" selected="selected"><?php echo $brand['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $brand['manufacturer_id']; ?>"><?php echo $brand['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
			</tr>
			<tr>
			  <td><?php echo $entry_encode; ?></td>
			  <td>
              	<select name="encode_id">
                  <?php foreach ($encodes as $encode) { ?>
                  <?php if($encode['encode_id'] == $encode_id) { ?>			
                  <option value="<?php echo $encode['encode_id']; ?>" selected="selected"><?php echo $encode['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $encode['encode_id']; ?>"><?php echo $encode['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </td>
			</tr>
		</table>	
			            
        </form>
	  </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>