<?php if ($checkout_method == 'iframe') { ?>
  <iframe src="<?php echo $iframe_url ?>" scrolling="no" width="560px" height="540px" frameBorder="0"></iframe>
<?php } else { ?>
  
  <div class="buttons">
    <div class="right">
      <a class="button btn btn-theme-default" href="<?php echo $iframe_url ?>"><?php echo $button_confirm ?></a>
    </div>
  </div>
  
<?php } ?>