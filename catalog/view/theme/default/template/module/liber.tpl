<div class="box">
	<div class="box-heading"><?php echo $heading_title; ?></div>
	<div class="box-content">
		<?php if ($liberes) { ?>
		<div class="liber">
			<div class="content">
				<?php foreach($liberes as $key => $liber) { ?>
				<div class="box">
					<h3 class="liber-item-question" data-scroll="#liber-item-question<?php echo $key; ?>"><?php echo $liber['question']; ?></h3>
				</div>
				<?php } ?>
			</div>
			<?php foreach($liberes as $key => $liber) { ?>
			<div class="liber-item" id="liber-item-question<?php echo $key; ?>">
				<h3 class="question"><?php echo $liber['question']; ?></h3>
				<div class="answer content"><?php echo $liber['answer']; ?></div>
			</div>
			<?php } ?>
		</div>
		<?php } else { ?>
		<div class="content">
			<?php echo $text_no_liberes; ?>
		</div>
		<?php } ?>
		<div class="feedback-liber">
			<h2 class="feedback-liber-title"><?php echo $text_write; ?></h2>
			<div class="content">
				<b><?php echo $entry_contact; ?></b><br />
				<input type="text" name="feedback_liber_contact" value="" />
				<br class="feedback_liber_contact" />
				<br />
				<b><?php echo $entry_question; ?></b><br />
				<textarea name="feedback_liber_question" cols="40" rows="10" style="width: 97%;"></textarea><br />
				<span style="font-size: 11px;"><?php echo $text_note; ?></span>
				<br class="feedback_liber_question" />
				<br />
				<b><?php echo $entry_captcha; ?></b><br />
				<input type="text" name="feedback_liber_captcha" value="" />
				<br />
				<img src="index.php?route=information/liber/captcha&id=<?php echo $rand; ?>" alt="captcha" />
				<br class="feedback_liber_captcha" />
				<br />
				<div class="buttons">
					<div class="left"><a class="feedback-liber-button button" data-wait="<?php echo $text_wait; ?>"><?php echo $button_send; ?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>