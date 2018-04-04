<FORM ACTION="<?php echo $payment['url']; ?>" METHOD="GET">
    <?php foreach($payment['params'] as $name => $value): ?>
    <INPUT TYPE="HIDDEN" NAME="<?php echo $name; ?>" VALUE="<?php echo $value; ?>">
    <?php endforeach; ?>

    <INPUT TYPE="SUBMIT" VALUE="<?php echo $payButton; ?>" class="button">
</FORM>