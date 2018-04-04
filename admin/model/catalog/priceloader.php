<?php 
class ModelCatalogPriceloader extends Model {
    public function createTables() {
        $query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "priceloader (
            priceloader_id INT(10) AUTO_INCREMENT, 
            name varchar(64),
            lastupdate DATETIME NULL, 
            sort_order INT(13), 
            rate decimal(8,4), 
            cod varchar(3),
            path varchar(128),
            category_id int,
            brand_id int,
            mask varchar(128), 
            days int,
            encode_id varchar(16),
            hide varchar(1), PRIMARY KEY (priceloader_id)) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
        $this->cache->delete('priceloader');
    }
    
    public function addPriceloader($data) {
        $data['rate'] = str_replace(',','.',trim($data['rate']));
          $this->db->query("INSERT INTO " . DB_PREFIX . "priceloader SET 
              `name` = '" . $this->db->escape($data['name']) . "', 
              `sort_order` = '0', 
              `rate` = '" . $this->db->escape($data['rate']) . "', 
              `cod` = '0', 
              `path` = '" . $this->db->escape($data['path']) . "', 
              `category_id` = '" . $this->db->escape($data['category_id']) . "', 
              `brand_id` = '" . $this->db->escape($data['brand_id']) . "', 
              `mask` = '" . $this->db->escape($data['mask']) . "', 
              `days` = '" . $this->db->escape($data['days']) . "', 
              `encode_id` = '" . $this->db->escape($data['encode_id']) . "', 
              `hide` = 'Y'");
          $id = $this->db->getLastId();
          
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            if ($data['path']==''){
                $path = DIR_APPLICATION.'uploads/csv'.$id.'.csv';
                $this->db->query("UPDATE " . DB_PREFIX . "priceloader SET
                `path` = '$path'
                WHERE priceloader_id = $id");
            }else{
                $path = $data['path']; 
            }
             move_uploaded_file($_FILES["file"]["tmp_name"], $path);
           }
        $this->cache->delete('priceloader');
        
    }
    
    public function editPriceloader($id, $data) {
        $data['rate'] = str_replace(',','.',trim($data['rate']));
          $this->db->query("UPDATE " . DB_PREFIX . "priceloader SET 
              `name` = '" . $this->db->escape($data['name']) . "', 
              `sort_order` = '0', 
              `rate` = '" . $this->db->escape($data['rate']) . "', 
              `cod` = '0', 
              `path` = '" . $this->db->escape($data['path']) . "', 
              `category_id` = '" . $this->db->escape($data['category_id']) . "', 
              `brand_id` = '" . $this->db->escape($data['brand_id']) . "', 
              `mask` = '" . $this->db->escape($data['mask']) . "', 
              `days` = '" . $this->db->escape($data['days']) . "', 
              `encode_id` = '" . $this->db->escape($data['encode_id']) . "', 
              `hide` = 'Y' WHERE priceloader_id = $id");
        $this->cache->delete('priceloader');
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            if ($data['path']==''){
                $path = DIR_APPLICATION.'uploads/csv'.$id.'.csv';
                $this->db->query("UPDATE " . DB_PREFIX . "priceloader SET
                `path` = '$path'
                WHERE priceloader_id = $id");
            }else{
                $path = $data['path']; 
            }
             move_uploaded_file($_FILES["file"]["tmp_name"], $path);
           }
        
        
    }
    
    public function deletePriceloader($priceloader_id) {
        $this->db->query("DELETE FROM " . DB_PREFIX . "priceloader WHERE `priceloader_id` = '" . (int)$priceloader_id . "'");
        $this->cache->delete('priceloader');
    }

    public function load($priceloader_id) {
        set_time_limit(0);

        $priceloader = $this->getXSuppler($priceloader_id);
        $mask = array_flip(explode(';', $priceloader['mask']));
        unset($mask['n']);
        $this->load->model('catalog/manufacturer');
        $manufacturers =$this->model_catalog_manufacturer->getManufacturers();
        foreach ($manufacturers as $manufacturer){
            $brands[strtoupper(trim($manufacturer['name']))] = $manufacturer['manufacturer_id'];
            if (isset($manufacturer['aliases'])&&($manufacturer['aliases']<>'')){
                $aliases = explode(';', $manufacturer['aliases']);
                foreach ($aliases as $aliase) $brands[strtoupper(trim($aliase))] = $manufacturer['manufacturer_id'];
            }
        }
        
        //echo '<pre>';print_r($priceloader);echo '</pre>';
        //echo '<pre>';print_r($mask);echo '</pre>';
        //echo '<pre>';print_r($brands);echo '</pre>';
        $this->clearCategory($priceloader['category_id']);
        //echo 'ZZZ';
        $errors = array();
        if (($handle = fopen($priceloader['path'], "r")) !== FALSE) {
            if (isset($mask['brand'])){
                //brand in price
                while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                    if (count($data)<3) continue;
                    if (!isset($brands[strtoupper(trim($data[$mask['brand']]))])) continue;
                    $product = array();
                    $product['sku'] = $data[$mask['nomer']];
                    $product['upc'] = $priceloader['category_id'];
                    $product['manufacturer'] = $brands[strtoupper(trim($data[$mask['brand']]))];
                    $product['days'] = $priceloader['days'];
                    $product['name'] = iconv($priceloader['encode_id'], 'UTF-8', $data[$mask['name']]);
                    $product['price'] = str_replace(',', '.', $data[$mask['price']])*$priceloader['rate'];
                    $product['quantity'] = isset($mask['kol'])?$data[$mask['kol']]:0;
                    $product['weight'] = isset($mask['weight'])?$data[$mask['weight']]:0;
                    $product['category'] = $priceloader['category_id'];
                    $this->putNewProduct($product);
                    //echo '<pre>'; print_r($data); echo '</pre>';
                    //echo '<pre>'; print_r($product); echo '</pre><hr />';
                }
            }else{
                //brang global
                while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                    if (count($data)<3) continue;
                    $product = array();
                    $product['sku'] = $data[$mask['nomer']];
                    $product['upc'] = $priceloader['category_id'];
                    $product['manufacturer'] = $priceloader['brand_id'];
                    $product['days'] = $priceloader['days'];
                    $product['name'] = iconv($priceloader['encode_id'], 'UTF-8', $data[$mask['name']]);
                    $product['price'] = str_replace(',', '.', $data[$mask['price']])*$priceloader['rate'];
                    $product['quantity'] = isset($mask['kol'])?$data[$mask['kol']]:0;
                    $product['weight'] = isset($mask['weight'])?$data[$mask['weight']]:0;
                    $product['category'] = $priceloader['category_id'];
                    $this->putNewProduct($product);
                }
            }
            $this->db->query("UPDATE " . DB_PREFIX . "priceloader SET lastupdate = now() WHERE priceloader_id = $priceloader_id");
        fclose($handle);
        }else{
            $errors['file_empty'] = 1;
        }
        
                
    }    
    
    
    public function getSuppler($suppler_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "priceloader WHERE `priceloader_id` = '" . (int)$suppler_id . "'");
            
        return $query->rows;
    }    
    
    public function getXSuppler($suppler_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "priceloader WHERE `priceloader_id` = '" . (int)$suppler_id . "'");
            
        return $query->row;
    }    
    
    public function getSupplers() {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "priceloader ORDER BY priceloader_id ASC");            
        
        return $query->rows;
    }
    
    public function getTotalSupplers() {
          $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "priceloader");
        
        return $query->row['total'];
    }
    
    public  function putNewProduct($product) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE sku = '" . mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '', $product['sku'])) . "' and upc ='" . $product['upc'] . "'");
        if ($query->num_rows > 0)
        {
            $row = $query->row;
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE sku = '" . mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '', $product['sku'])) . "' and upc ='1'");
            if ($query->num_rows > 0) {
                $active = 0;
            } else {
                $active = 1;
            }
            $this->db->query("UPDATE " . DB_PREFIX . "product SET `ean` = '" . $product['days'] . "', `stock_status_id` = '7', `quantity` = '" . $product['quantity'] . "', `price` = '" . $product['price'] . "', `status` = '$active'  WHERE product_id = ".$row['product_id']);
        } else {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE sku = '" . mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '', $product['sku'])) . "' and upc ='1'");
            if ($query->num_rows > 0) {
                $active = 0;
            } else {
                $active = 1;
            }
            
            $this->db->query("INSERT INTO " . DB_PREFIX . "product SET 
                `model` = '" . $product['sku'] . "', 
                `sku` = '" . mb_strtoupper(preg_replace('/[^a-z0-9]/ium', '', $product['sku'])) . "', 
                `upc` = '" . $product['upc'] . "', 
                `ean` = '" . $product['days'] . "', 
                `location` = '', 
                `quantity` = '" . $product['quantity'] . "', 
                `stock_status_id` = '7', 
                `image` = '', 
                `manufacturer_id` = '" . $product['manufacturer'] . "', 
                `shipping` = '1', 
                `price` = '" . $product['price'] . "', 
                `points` = '0' , 
                `tax_class_id` = '0' , 
                `date_available` = '2000-01-01', 
                `weight` = '". $product['weight'] . "', 
                `weight_class_id` = '1' , 
                `length` = '0', 
                `width` = '0', 
                `height` = '0' , 
                `length_class_id` = '1' , 
                `subtract` = '' , 
                `minimum` = '' ,  
                `sort_order` = '0', 
                `status` = '".$active."' , 
                `date_added` = '2012-08-02 00:44:17', 
                `date_modified` = '2012-08-02 00:44:17', 
                `viewed` = '0'");
            $product_id = $this->db->getLastId();
            $this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET 
                `product_id` = '" .(int)$product_id. "', 
                `language_id` = 2 , 
                `name` = '" . $this->db->escape($product['name']) . "', 
                `description` = '', 
                `meta_description` = '', 
                `meta_keyword` = '', 
                `tag` = ''");
            $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET 
                `product_id` = '" .(int)$product_id. "', 
                `category_id` = '" . $product['category'] . "'");    
            $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_store SET 
                `product_id` = '" .(int)$product_id. "', 
                `store_id` = 0");
        }   
        

    }
    
    
    private function clearCategory($category_id)
    {
        //echo "UPDATE" . DB_PREFIX . "product SET status = 0 WHERE upc = '$category_id'";
        $query = $this->db->query("UPDATE " . DB_PREFIX . "product SET status = 0 WHERE upc = '$category_id'");
        $this->cache->delete('product');
        //$query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product_to_category WHERE category_id = $category_id ");
        //foreach ($query->rows as $row) $this->deleteProduct($row['product_id']);
        //$this->cache->delete('product');
    }
    private  function deleteProduct($product_id) 
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE related_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int)$product_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "review WHERE product_id = '" . (int)$product_id . "'");        
        $this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");
    }
    
    
}
