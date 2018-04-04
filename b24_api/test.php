<?php
/**
 * Created by PhpStorm.
 * User: btw
 * Date: 29.06.2017
 * Time: 5:00
 */


if (!$_SERVER['DOCUMENT_ROOT']) {
    $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/..');
}


include 'include/config.php';


$fields = array(
    'type'   => 'crm.lead.add',
    'params' => array("REGISTER_SONET_EVENT" => "Y",
                      'fields'               => array(
                          "TITLE"       => "Test title11",
                          "NAME"        => "Test Name",
                          "SECOND_NAME" => "test secname",
                          "LAST_NAME"   => "test lastname",
                          "STATUS_ID"   => "NEW",
                          "OPENED"      => "Y",
                          "CURRENCY_ID" => "RUR",
                          "OPPORTUNITY" => 1,
                          "PHONE"       => array("VALUE" => "555888", "VALUE_TYPE" => "WORK"),
                      ),
    ),
);
$ret = callRest($fields);

// wget "https://automag.bitrix24.ru/rest/methods?scope=&auth=j8y9g7pqip35pkxq7yeh6alx1dtxbmiq"
var_export($ret);