<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($module_install) { ?>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1><?php echo $heading_title; ?></h1>
			<div class="buttons"><a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a></div>
		</div>
		<div class="content">
			<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
				<table class="list">
					<thead>
						<tr>
							<td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
							<td class="left"><?php if ($sort == 'contact') { ?>
								<a href="<?php echo $sort_contact; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_contact; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_contact; ?>"><?php echo $column_contact; ?></a>
								<?php } ?></td>
							<td class="left"><?php if ($sort == 'question') { ?>
								<a href="<?php echo $sort_question; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_question; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_question; ?>"><?php echo $column_question; ?></a>
								<?php } ?></td>
							<td class="right"><?php if ($sort == 'viewed') { ?>
								<a href="<?php echo $sort_viewed; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_viewed; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_viewed; ?>"><?php echo $column_viewed; ?></a>
								<?php } ?></td>
							<td class="right"><?php echo $column_action; ?></td>
						</tr>
					</thead>
					<tbody>
						<?php if ($liberes) { ?>
						<?php foreach ($liberes as $liber) { ?>
						<tr>
							<td style="text-align: center;"><?php if ($liber['selected']) { ?>
								<input type="checkbox" name="selected[]" value="<?php echo $liber['liber_question_id']; ?>" checked="checked" />
								<?php } else { ?>
								<input type="checkbox" name="selected[]" value="<?php echo $liber['liber_question_id']; ?>" />
								<?php } ?></td>
							<td class="left"><?php echo $liber['contact']; ?></td>
							<td class="left"><?php echo $liber['question']; ?></td>
							<td class="right"><?php echo $liber['viewed']; ?></td>
							<td class="right">
								<?php foreach ($liber['action'] as $action) { ?>
								[ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
								<?php } ?></td>
						</tr>
						<?php } ?>
						<?php } else { ?>
						<tr>
							<td class="center" colspan="5"><?php echo $text_no_results; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>
			<div class="pagination"><?php echo $pagination; ?></div>
		</div>
	</div>
	<?php } else { ?>
	<div class="box">
		<div class="heading">
			<h1><?php echo $heading_title; ?></h1>
		</div>
		<div class="content">
			<div class="warning"><?php echo $text_module_not_exists; ?></div>
		</div>
	</div>
	<?php } ?>
</div>
<?php echo $footer; ?>