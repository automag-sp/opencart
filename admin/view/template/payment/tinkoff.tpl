<?php echo $header; ?>
<div id="content">

    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>

    <?php if (isset($error['error_warning'])) { ?>
    <div class="warning"><?php echo $error['error_warning']; ?></div>
    <?php } ?>

    <div class="box">
        <div class="heading">
            <h1><img src="view/image/payment/tinkoff.png" alt="" height="22px"/> <?php echo $heading_title; ?></h1>

            <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
        </div>
        <div class="content">

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

                <div id="tab-api-details">
                    <table class="form">
                        <tr>
                            <td><span class="required">*</span> <?php echo $terminal_key_label; ?></td>
                            <td><input type="text" name="terminal_key" value="<?php echo $terminal_key; ?>"/>
                                <?php if (isset($error['terminal_key'])) { ?>
                                <span class="error"><?php echo $error['terminal_key']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required">*</span> <?php echo $secret_key_label; ?></td>
                            <td><input type="text" name="secret_key" value="<?php echo $secret_key; ?>"/>
                                <?php if (isset($error['secret_key'])) { ?>
                                <span class="error"><?php echo $error['secret_key']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required">*</span> <?php echo $currency_label; ?></td>
                            <td><input type="text" name="currency" value="<?php echo $currency ?: 643; ?>"/>
                                <?php if (isset($error['currency'])) { ?>
                                <span class="error"><?php echo $error['currency']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="required">*</span> <?php echo $payment_url_label; ?></td>
                            <td><input type="text" name="payment_url" value="<?php echo $payment_url; ?>"/>
                                <?php if (isset($error['payment_url'])) { ?>
                                <span class="error"><?php echo $error['payment_url']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $status_success_label; ?></td>
                            <td><select name="order_status_success_id">
                                    <?php foreach ($order_statuses as $order_status) { ?>
                                    <?php if ($order_status['order_status_id'] == $order_status_success_id) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $status_failed_label; ?></td>
                            <td><select name="order_status_failed_id">
                                    <?php foreach ($order_statuses as $order_status) { ?>
                                    <?php if ($order_status['order_status_id'] == $order_status_failed_id) { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $status_label; ?></td>
                            <td><select name="tinkoff_status">
                                    <?php if ($tinkoff_status) { ?>
                                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                    <option value="0"><?php echo $text_disabled; ?></option>
                                    <?php } else { ?>
                                    <option value="1"><?php echo $text_enabled; ?></option>
                                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                    <?php } ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td><?php echo $description_label; ?></td>
                            <td><input type="text" name="description" value="<?php echo $description; ?>"/>
                                <?php if (isset($error['description'])) { ?>
                                <span class="error"><?php echo $error['description']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Порядок сортировки</td>
                            <td><input type="text" name="tinkoff_sort_order" value="<?php echo $tinkoff_sort_order; ?>" size="1"/></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $footer; ?>