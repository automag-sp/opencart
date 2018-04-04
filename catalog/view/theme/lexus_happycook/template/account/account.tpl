<?php require(DIR_TEMPLATE . $this->config->get('config_template') . "/template/common/config.tpl"); ?>
<?php echo $header; ?>
<style type="text/css">
    /* --- Account --- */
    .shortcuts {
        text-align: left;
        margin: 5px 0 25px 0;
    }

    .shortcuts ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .shortcuts li {
        width: 120px;
        height: 155px;
        line-height: normal;
        display: inline-block;
        vertical-align: top;
        padding: 10px 10px;
        border: 1px solid #dbdee1;
        margin: 10px 10px 0px 0px;
        float: left;
        text-align: center;
        overflow: hidden;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
        border-radius: 7px;
        background: #fff;
    }

    .shortcuts li a {
        text-decoration: none;
    }

    .shortcuts li:hover {
        border: 1px solid #aaa;
        background: #f5f5f5;
    }

    .shortcuts li img {
        padding: 8px 20px 12px 14px;
    }

    .shortcuts li h6 {
        color: #333;
        font-size: 11px;
        margin: 0;
        padding: 0;
    }

    .shortcuts .clear {
        overflow: hidden;
        width: 100%;
    }
</style>


<?php require(DIR_TEMPLATE . $this->config->get('config_template') . "/template/common/breadcrumb.tpl"); ?>

<div id="group-content">

  <?php if ($SPAN[0]): ?>
      <aside class="col-lg-<?php echo $SPAN[0]; ?> col-md-<?php echo $SPAN[0]; ?> col-sm-12 col-xs-12">
        <?php echo $column_left; ?>
      </aside>
  <?php endif; ?>

    <section class="col-lg-<?php echo $SPAN[1]; ?> col-md-<?php echo $SPAN[1]; ?> col-sm-12 col-xs-12">
      <?php if ($success) { ?>
          <div class="success"><?php echo $success; ?></div>
      <?php } ?>

        <div id="content"><?php echo $content_top; ?>

            <h1><?php echo $heading_title; ?></h1>
            <h2><?php echo $text_my_orders; ?></h2>
            <div class="shortcuts cf">
                <ul>
                    <li><a href="<?php echo $order; ?>"><img class="account_img" src="/img/ico/order.png" alt="<?php echo $text_order; ?>"><br/><?php echo $text_order; ?></a></li>
                    <li><a href="/index.php?route=account/cars/cars"><img class="account_img" src="/img/ico/bookmark.png" alt="Мои машины"><br/>Мои машины</a></li>
                    <li><a href="<?php echo $reward; ?>"><img class="account_img" src="/img/ico/bonus.png" alt="<?php echo $text_reward; ?>"><br/><?php echo $text_reward; ?></a></li>
<!--                    <li><a href="--><?php //echo $return; ?><!--"><img class="account_img" src="/img/ico/reject.png" alt="--><?php //echo $text_return; ?><!--"><br/>--><?php //echo $text_return; ?><!--</a></li>-->
                    <li><a href="<?php echo $transaction; ?>"><img class="account_img" src="/img/ico/payment.png" alt="<?php echo $text_transaction; ?>"><br/><?php echo $text_transaction; ?></a></li>

                </ul>
                <div class="clear"></div>
            </div>
            <h2><?php echo $text_my_account; ?></h2>
            <div class="shortcuts cf">
                <ul>
                    <li><a href="<?php echo $edit; ?>"><img class="account_img" src="/img/ico/account.png" alt="<?php echo $text_edit; ?>"><br/><?php echo $text_edit; ?></a></li>
                    <li><a href="<?php echo $password; ?>"><img class="account_img" src="/img/ico/passward.png" alt="<?php echo $text_password; ?>"><br/><?php echo $text_password; ?></a></li>
                    <li><a href="<?php echo $newsletter; ?>"><img class="account_img" src="/img/ico/mail.png" alt="<?php echo $text_newsletter; ?>"><br/>Подписка на рассылку новостей</a></li>
                    <li><a href="http://automag-sp.ru/index.php?route=account/logout"><img class="account_img" src="/img/ico/exit.png" alt="Выход"><br/>Выход</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
      <?php echo $content_bottom; ?></section>

  <?php if ($SPAN[2]): ?>
      <aside class="col-lg-<?php echo $SPAN[2]; ?> col-sm-<?php echo $SPAN[2]; ?> col-xs-12">
        <?php echo $column_right; ?>
      </aside>
  <?php endif; ?>
</div>

<?php echo $footer; ?> 