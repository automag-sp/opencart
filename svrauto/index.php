<?php

require '../config.php';
define('DISK_CATEGORY', 131);
define('TIRES_CATEGORY', 217);
define('SVRAUTO_KEY', 'lzVs7SZu42VZu-PjwfHahvPK1EH3X6_G');
define('XML_DIR', __DIR__ . '/xml/');
define('XML_URL', 'http://webmim.svrauto.ru/api/v1/catalog/unload?access-token=' . SVRAUTO_KEY . '&format=xml&gzip=0&types=1%3B2');


$attributes_config[1] = [
  31 => 'SWIDTH',
  32 => 'SHEIGHT',
  33 => 'SDIAMETR',
  34 => 'SSEASON',
  44 => 'STHORNING',
  45 => 'SSPEED',
  46 => 'SLOAD',
  47 => 'STHORNTYPE',
  48 => 'SGOODLAND',
  56 => 'SMNFCODE',
];
$attributes_config[2] = [
  35 => 'SWIDTH',
  36 => 'SDIAMETR',
  37 => 'SPCD',
  38 => 'SWHEELOFFSET',
  39 => 'SDIA',
  49 => 'SHOLESQUANT',
  53 => 'SPROCESSWAY',
  51 => 'SDPCD',
  52 => 'SCOLOR',
  54 => 'SAUTOLIST',
  55 => 'SMNFCODE',
];

class SVRAUTO {

  /**
   * @var \SVRAUTO
   */
  private static $main;

  /**
   * @var integer
   */
  private $type;

  /**
   * @var \mysqli
   */
  private $db;

  /**
   * @var integer
   */
  private $category_id;

  /**
   * SVRAUTO constructor.
   */
  function __construct() {
    $this->db = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $this->db->set_charset('utf8');
  }

  /**
   * @return \SVRAUTO
   */
  public static function get() {
    if (!isset(self::$main)) {
      self::$main = new SVRAUTO();
    }
    return self::$main;
  }

  /**
   * @param $type integer
   */
  public function parse($type) {
    $this->type = $type;
    $this->fetch_xml();
    $this->prepare_to_import();
    $this->load_data();
  }

  /**
   *
   */
  private function fetch_xml() {
    file_exists(XML_DIR) || mkdir(XML_DIR, 0777);

    if (!file_exists($this->file_name())) {
      $this->log("Fetching " . XML_URL);
      $xml = file_get_contents(XML_URL);
      file_put_contents($this->file_name(), $xml);
      $this->log('Fetched ' . strlen($xml) . " bytes type " . $this->type);
    }
    else {
      $this->log("File " . $this->file_name() . " already exists");
    }
  }

  /**
   * @return string
   */
  private function file_name() {
    return XML_DIR . date('Y-m-d') . ".xml";
  }

  /**
   * @param $msg string
   */
  private function log($msg) {
    static $msg_id = 0;
    $msg = ($msg_id++) . "\t" . date('Y-m-d H:i:s') . "\t:" . $msg . PHP_EOL;
    file_put_contents(__DIR__ . '/log.log', $msg, $msg_id ? FILE_APPEND : NULL);
    print $msg;
  }

  /**
   *
   */
  private function prepare_to_import() {
    $this->category_id = $this->type == 1 ? TIRES_CATEGORY : DISK_CATEGORY;
    $this->db->query('UPDATE oc_product op,oc_product_to_category optc SET op.status = 0 WHERE length(op.isbn)>0 AND op.product_id = optc.product_id AND optc.category_id =' . $this->category_id);
    $this->log("Disabled " . $this->db->affected_rows . " items of type " . $this->type);
  }


  /**
   *
   */
  function load_data() {
    $tmp  = simplexml_load_file($this->file_name());
    $work = $tmp->xpath('//COMMODITIES[@ID="' . $this->type . '"]/COMMODITY');
    unset($tmp);

    $manufacturer    = $attr = $name = $isbn = $model = $sku = '';
    $manufacturer_id = $attr_id = $product_id = $price = $qty = 0;

    $search = $this->db->prepare('SELECT product_id FROM oc_product WHERE isbn = ?');
    $search->bind_param('s', $isbn);
    $search->bind_result($product_id);

    $insert_product = $this->db->prepare('INSERT INTO oc_product SET minimum=0, manufacturer_id=?, subtract=0, weight_class_id=1,length_class_id=1,isbn=?, price=?,status=1,model=?,sku=?,quantity=?,date_added=now(),date_modified=now(),date_available=now(),stock_status_id=7');
    $insert_product->bind_param('isdssd', $manufacturer_id, $isbn, $price, $model, $sku, $qty);
    $insert_to_store = $this->db->prepare('INSERT INTO oc_product_to_store SET product_id=? ,store_id=0');
    $insert_to_store->bind_param('i', $product_id);
    $insert_description = $this->db->prepare('INSERT INTO oc_product_description SET product_id=?,language_id=2,name=?');
    $insert_description->bind_param('is', $product_id, $name);

    $insert_category = $this->db->prepare('INSERT INTO oc_product_to_category SET product_id=?,category_id=' . $this->category_id);
    $insert_category->bind_param('i', $product_id);

    $update_product = $this->db->prepare('UPDATE oc_product SET price=?,quantity=? WHERE product_id=?');
    $update_product->bind_param('ddi', $price, $qty, $product_id);

    $update_product_status = $this->db->prepare('UPDATE oc_product SET status=1 WHERE product_id=?');
    $update_product_status->bind_param('i', $product_id);

    $insert_attributes = $this->db->prepare('INSERT INTO oc_product_attribute SET product_id=?,attribute_id=?,text=?,language_id=2');
    $insert_attributes->bind_param('iis', $product_id, $attr_id, $attr);

    $search_manufacturer = $this->db->prepare('SELECT manufacturer_id FROM oc_manufacturer WHERE name = ?');
    $search_manufacturer->bind_param('s', $manufacturer);
    $search_manufacturer->bind_result($manufacturer_id);
    $insert_manufacturer = $this->db->prepare('INSERT INTO oc_manufacturer SET name = ?');
    $insert_manufacturer->bind_param('s', $manufacturer);
    $insert_manufacturer_to_store = $this->db->prepare('INSERT INTO oc_manufacturer_to_store SET manufacturer_id=?,store_id=0');
    $insert_manufacturer_to_store->bind_param('i', $manufacturer_id);
    foreach ($work as $disk) {
      $isbn         = $disk->NNOMMODIF;
      $model        = $sku = $disk->SMODEL;
      $price        = floatval($disk->NPRICE_RRP) * (defined(SVRAUTO_PRICE_MULTIPLER) ? SVRAUTO_PRICE_MULTIPLER : 1);
      $qty          = floatval($disk->NREST);
      $name         = $disk->SMODIFNAME;
      $manufacturer = $disk->SMARKA;
      if (!mb_strlen(trim($model))) {
        $model = $sku = $isbn;
      }
      $search->execute();
      $search->store_result();
      if ($search->fetch()) {
        $update_product->execute();
        if ($update_product->errno) {
          $this->log($update_product->error . '::' . $update_product->errno);
        }
        if ($update_product->affected_rows) {
          $this->log("Updated product $name($product_id)");
        }
        $update_product_status->execute();
      }
      else {
        $search_manufacturer->execute();
        $search_manufacturer->store_result();
        if (!$search_manufacturer->fetch()) {
          $insert_manufacturer->execute();
          $manufacturer_id = $insert_manufacturer->insert_id;
          $insert_manufacturer_to_store->execute();
          $this->log("Created manufacturer $manufacturer($manufacturer_id)");
        }
        $insert_product->execute();
        if ($insert_product->affected_rows > 0) {
          $product_id = $insert_product->insert_id;
          $insert_to_store->execute();
          $insert_description->execute();
          $insert_category->execute();
          foreach ($GLOBALS['attributes_config'][$this->type] as $id => $val) {
            $attr_id = $id;
            $attr    = $disk->{$val};
            if (mb_strlen($attr)) {
              $insert_attributes->execute();
            }
          }
          $this->log("Created product $name($product_id)");
        }
      }
    }
  }
}


SVRAUTO::get()->parse(1);
SVRAUTO::get()->parse(2);
/*
DROP TABLE IF EXISTS clear_tmp;
CREATE TABLE clear_tmp AS SELECT op.product_id FROM oc_product op WHERE LENGTH(op.isbn) > 0;
ALTER TABLE clear_tmp ADD INDEX IDX_clear_tmp_product_id (product_id);
DELETE FROM oc_product_attribute WHERE product_id IN (SELECT product_id FROM clear_tmp);
DELETE FROM oc_product_to_category WHERE product_id IN (SELECT product_id FROM clear_tmp);
DELETE FROM oc_product_to_store WHERE product_id IN (SELECT product_id FROM clear_tmp);
DELETE FROM oc_product_description WHERE product_id IN (SELECT product_id FROM clear_tmp);
DELETE FROM oc_product WHERE product_id IN (SELECT product_id FROM clear_tmp);
-- DROP TABLE IF EXISTS clear_tmp;
*/