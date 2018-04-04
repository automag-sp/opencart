<?php
$catID = 144;//Прайсы > Общий по магазинам
$catLink = 1;//Первостепенная категория - UPC


require_once '../config.php';
$db = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$db->set_charset('utf8');
$query = "UPDATE oc_product SET status=0 WHERE upc='$catLink'";
$db->query($query);
if ($db->errno) {
    die(__LINE__ . ':"' . $query . '"' . $db->error);
}
$xml = simplexml_load_file(__DIR__ . '/all/offers0_1.xml');
$brands = file_get_contents(__DIR__ . '/all/import0_1.xml');
$brands = str_replace('xmlns=', 'ns=', $brands);
$brands = new SimpleXMLElement($brands);
$total = $new = $udt = $noart = $noprice = $manuf = 0;

foreach ($xml->ПакетПредложений->Предложения->Предложение as $product) {
    $total++;
    $id = $product->Ид;
    $manufacturer = $brands->xpath('//Товар/Ид[. ="' . $id . '"]/parent::*/ЗначенияРеквизитов/ЗначениеРеквизита/Наименование[. ="Производитель"]/parent::*/Значение');
    $manufacturer_id = 0;
    if (count($manufacturer)) {
        $manufacturer = reset($manufacturer);
        $query = "Select manufacturer_id id from oc_manufacturer where name = '$manufacturer'";
        $res = $db->query($query);
        if ($res->num_rows) {
            $manufacturer_id = $res->fetch_assoc()['id'];
        } else {
            $query = "Insert into oc_manufacturer set NAME ='$manufacturer',sort_order=0";
            $res = $db->query($query);
            if ($db->affected_rows) {
                $manufacturer_id = $db->insert_id;
                $manuf++;
                $db->query('INSERT INTO oc_manufacturer_to_store SET store_id=0,manufacturer_id=' . $manufacturer_id);
            }
        }
    }
    $categorys = $brands->xpath('//Товар/Ид[. ="' . $id . '"]/parent::*/Группы/Ид');
    $category_id = $catID;
    if (count($categorys)) {
        foreach ($categorys as $category) {
            $category = $brands->xpath('//Группы/Группа/Ид[. ="' . $category . '"]/parent::*/Наименование');
            if (count($category)) {
                $category = reset($category);
                $query = "Select * from oc_category_description WHERE name ='$category'";

                $res = $db->query($query);
                if ($res->num_rows) {
                    $category_id = $res->fetch_assoc()['category_id'];
                }
            }
        }
    }
    $art = $product->Артикул;
    $kol = intval($product->Склад['КоличествоНаСкладе']);
    $price = intval($product->Цены->Цена->ЦенаЗаЕдиницу);
    $name = $product->Наименование;
    if ($art == '') {
        $noart++;
    }
    if (!$price) {
        $noprice++;
    }
    $query = "SELECT * FROM oc_product WHERE jan = '$id' and upc = '$catLink'";

    $res = $db->query($query);
    if (!$res->num_rows) {
        $query = "INSERT INTO oc_product SET
`model` = '$art', `sku` = '" . mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '', $art)) . "',
`upc` = '$catLink', `ean` = '0',`jan` = '$id', `location` = '', `quantity` = '$kol', `stock_status_id` = '7',
`image` = '',  `manufacturer_id` = '$manufacturer_id', `shipping` = '1', `price` = '$price', `points` = '0' ,
`tax_class_id` = '0' , `date_available` = '2000-01-01', `weight` = '', `weight_class_id` = '1' ,
`length` = '0', `width` = '0', `height` = '0' , `length_class_id` = '1' ,
`subtract` = '' , `minimum` = '' , `sort_order` = '0', `status` = '1' ,
`date_added` = '2012-08-02 00:44:17', `date_modified` = '2012-08-02 00:44:17', `viewed` = '0'";

        $db->query($query);
        if ($db->errno) {
            die(__LINE__ . ':"' . $query . '"' . $db->error);
        }
        $new += $db->affected_rows;
        $product_id = $db->insert_id;
        $query = "INSERT INTO oc_product_description SET
`product_id` = $product_id ,  `language_id` = 2 , `name` = '" . str_replace("'", '`', $name) . "', `description` = '',
`meta_description` = '',  `meta_keyword` = '', `tag` = ''";
        $db->query($query);
        if ($db->errno) {
            die(__LINE__ . ':"' . $query . '"' . $db->error);
        }
        $query = "INSERT INTO oc_product_to_category SET `product_id` = '" . $product_id . "',  `category_id` = '$category_id'";
        $db->query($query);
        if ($db->errno) {
            die(__LINE__ . ':"' . $query . '"' . $db->error);
        }
        $query = "INSERT INTO oc_product_to_store SET  `product_id` = $product_id,  `store_id` = 0";
        $db->query($query);
        if ($db->errno) {
            die(__LINE__ . ':"' . $query . '"' . $db->error);
        }
    } else {
        $row = $res->fetch_assoc();
        $query = "UPDATE oc_product SET status = 1, price=" . floatval($price) . ', quantity=' . floatval($kol);
        $query .= " WHERE product_id = " . $row['product_id'];
        $db->query($query);
        if ($db->errno > 0) {
            die(__LINE__ . ':"' . $query . '"' . $db->error);
        }
        $udt += $db->affected_rows;
    }
}
msg("Total: $total");
msg("New brands: $manuf");
msg("New products: $new");
msg("Udated products: $udt");
msg("No articles: $noart");
msg("No price: $noprice");


$db->query('DROP TABLE IF EXISTS tmp_manuf');
$db->query('CREATE TABLE tmp_manuf AS SELECT * FROM oc_manufacturer om WHERE om.manufacturer_id NOT IN (SELECT omts.manufacturer_id FROM oc_manufacturer_to_store omts)');
$db->query('INSERT INTO oc_manufacturer_to_store SELECT manufacturer_id,0 FROM tmp_manuf;');

function msg($msg){
    static $msg_id = -1;
    $msg = (++$msg_id) . "\t" . date('Y-m-d H:i:s') . ": " . $msg . PHP_EOL;
    file_put_contents(__DIR__ . '/all/' . date('Y-m-d') . '.log', $msg, $msg_id ? FILE_APPEND : NULL);
    print $msg;
}