<?php
$product_name = trim($_POST['product_name']);
$product_price = trim($_POST['product_price']);
$customer_name = trim($_POST['customer_name']);
$customer_phone = trim($_POST['customer_phone']);
$customer_message = trim($_POST['customer_message']);
$mail_subject = "Мой интернет-магазин - быстрый заказ (" . date('d.m.Y H:i') . ")";

if (isset($customer_name) && $customer_name !== "" && isset($customer_phone) && $customer_phone !== "") {
    //$store_email = "noreply@automag-sp.ru";
    require_once __DIR__ . '/b24_api/include/config.php';
    $fields = array(
        'type'   => 'crm.lead.add',
        'params' => array("REGISTER_SONET_EVENT" => "Y",
                          'fields'               => array(
                              "TITLE"       => "Быстрый заказ",
                              "NAME"        => $customer_name,
                              "SECOND_NAME" => "",
                              "LAST_NAME"   => "",
                              "STATUS_ID"   => "NEW",
                              "OPENED"      => "Y",
                              "CURRENCY_ID" => "RUB",
                              "OPPORTUNITY" => intval($product_price),
                              "COMMENTS"    => $customer_message.' "'.$product_name.'"',
                              "PHONE"       => array(array("VALUE" => $customer_phone, "VALUE_TYPE" => "WORK")),
                          ),
        ),
    );
    callRest($fields);

    $store_email = array("e-parts@mail.ru","zakaz@automag-sp.ru");
    $fast_order_email = "zakaz@automag-sp.ru";
    $subject = '=?UTF-8?B?' . base64_encode($mail_subject) . '?=';
    $headers = "From: <" . $fast_order_email . ">\r\n";
    $headers = $headers . "Return-path: <" . $fast_order_email . ">\r\n";
    $headers = $headers . "Content-type: text/plain; charset=\"UTF-8\"\r";
    $message = "Быстрый заказ\n\nДата заказа: " . date('d.m.Y H:i') .
      "\nЗаказчик: " . $customer_name . "\nТелефон: " . $customer_phone .
      "\nКомментарий: " . $customer_message . "\n\nТовар: " . $product_name . "\nЦена: " . $product_price;
    foreach ($store_email as $_mail) {
      mail($_mail, $mail_subject, $message, $headers);
    }
} else {
    echo "empty";
};
