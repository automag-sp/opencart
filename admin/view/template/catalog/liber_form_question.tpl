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
			<div class="buttons"><a onclick="location = '<?php echo $import; ?>';" class="button"><?php echo $button_import; ?></a><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
		</div>
		<div class="content">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
				<table class="form">
					<tr>
						<td><?php echo $entry_viewed; ?></td>
						<td><select name="viewed">
								<?php if ($viewed) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0"><?php echo $text_disabled; ?></option>
								<?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
								<?php } ?>
							</select></td>
					</tr>
				</table>
				<div id="languages" class="htabs">
					<a href="#language<?php echo $liber_description_question['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" question="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
				</div>
				<div id="language<?php echo $liber_description_question['language_id']; ?>">
					<table class="form">
						<tr>
							<td><?php echo $entry_contact; ?></td>
							<td><?php echo $liber_description_question['contact']; ?></td>
						</tr>
						<tr>
							<td><?php echo $entry_question; ?></td>
							<td><?php echo $liber_description_question['question']; ?></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>
<script type="text/javascript"><!--
			$('#tabs a').tabs();
	$('#languages a').tabs();
//--></script>