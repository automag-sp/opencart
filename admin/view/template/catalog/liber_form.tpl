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
			<h1><?php echo $heading_title; ?></h1>
			<div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
		</div>
		<div class="content">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
				<table class="form">
					<tr>
						<td><?php echo $entry_status; ?></td>
						<td><select name="status">
								<?php if ($status) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0"><?php echo $text_disabled; ?></option>
								<?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
								<?php } ?>
							</select></td>
					</tr>
					<tr>
						<td> <?php echo $entry_date_added; ?></td>
						<td><input type="text" name="date_added" value="<?php echo $date_added; ?>" size="12" class="date" /></td>
					</tr>
					<tr>
						<td> <?php echo $entry_sort_order; ?></td>
						<td><input type="text" name="sort_order" value="<?php echo $sort_order; ?>" size="3" /></td>
					</tr>
				</table>
				<div id="languages" class="htabs">
					<?php foreach ($languages as $language) { ?>
					<a href="#language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" question="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
					<?php } ?>
				</div>
				<?php foreach ($languages as $language) { ?>
				<div id="language<?php echo $language['language_id']; ?>">
					<table class="form">
						<tr>
							<td><span class="required">*</span> <?php echo $entry_question; ?></td>
							<td><textarea name="liber_description[<?php echo $language['language_id']; ?>][question]" cols="60" rows="8"><?php echo isset($liber_description[$language['language_id']]['question']) ? $liber_description[$language['language_id']]['question'] : ''; ?></textarea>
								<?php if (isset($error_question[$language['language_id']])) { ?>
								<span class="error"><?php echo $error_question[$language['language_id']]; ?></span>
								<?php } ?></td>
						</tr>
						<tr>
							<td><span class="required">*</span> <?php echo $entry_answer; ?></td>
							<td><textarea name="liber_description[<?php echo $language['language_id']; ?>][answer]" id="description_answer<?php echo $language['language_id']; ?>"><?php echo isset($liber_description[$language['language_id']]['answer']) ? $liber_description[$language['language_id']]['answer'] : ''; ?></textarea>
								<?php if (isset($error_answer[$language['language_id']])) { ?>
								<span class="error"><?php echo $error_answer[$language['language_id']]; ?></span>
								<?php } ?></td>
						</tr>
					</table>
				</div>
				<?php } ?>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
			CKEDITOR.replace('description_answer<?php echo $language['language_id']; ?>', {
			filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
			});
			<?php } ?>
//--></script>
<script type="text/javascript"><!--
			$('#tabs a').tabs();
			$('#languages a').tabs();
//--></script>
<script type="text/javascript"><!--
			$('.date').datepicker({dateFormat: 'yy-mm-dd'});
//--></script>