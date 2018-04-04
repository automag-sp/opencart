<div class="box">
    <div class="box-heading"><span><?php echo $heading_title; ?></span></div>
    <div class="box-content">
        <ul>
          <?php if (!$logged) { ?>
              <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a> / <a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
              <li><a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a></li>
          <?php } ?>
            <li><a href="<?php echo $account; ?>"><span class="fa fa-info fa-1"></span><?php echo $text_account; ?></a></li>
          <?php if ($logged) { ?>
              <li><a href="<?php echo $my_cars; ?>"><span class="fa fa-car fa-1"></span><?php echo $text_my_cars; ?></a></li>
              <li><a href="<?php echo $edit; ?>"><span class="fa fa-user fa-1"></span><?php echo $text_edit; ?></a></li>
              <li><a href="<?php echo $password; ?>"><span class="fa fa-key fa-1"></span><?php echo $text_password; ?></a></li>
          <?php } ?>
<!--            <li><a href="--><?php //echo $wishlist; ?><!--"><span class="fa fa-bookmark fa-1"></span>--><?php //echo $text_wishlist; ?><!--</a></li>-->
            <li><a href="<?php echo $order; ?>"><span class="fa fa-calendar-check-o fa-1"></span><?php echo $text_order; ?></a></li>
<!--            <li><a href="--><?php //echo $return; ?><!--"><span class="fa fa-undo fa-1"></span>--><?php //echo $text_return; ?><!--</a></li>-->
            <li><a href="<?php echo $transaction; ?>"><span class="fa fa-credit-card-alt fa-1"></span><?php echo $text_transaction; ?></a></li>
            <li><a href="<?php echo $newsletter; ?>"><span class="fa fa-at fa-1"></span><?php echo $text_newsletter; ?></a></li>


          <?php if ($logged) { ?>
              <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
          <?php } ?>
        </ul>
    </div>
</div>
