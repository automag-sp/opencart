<?php

class ModelModuleB24Order extends Model{
    const TABLE_NAME                 = 'b24_order';
    const MANAGER                    = 10;
    const CONFIG_CUSTOMER_GROUP_COEF = 'customer_group_coef';
    const RETAIL_CUSTOMER_GROUP      = 1;
    const MEASURE_PIECE              = 796;
    const WITHOUT_SIZE               = 0;

    //public $UF_DEAL_PAYMENT_METHOD = 'UF_CRM_1480997690';
    //public $UF_DEAL_DISCOUNT_TYPE = 'UF_CRM_1480997560';


    public function addToDB($orderId, $b24Id, array $fields = array()){
        if (empty($b24Id) || (int)$orderId <= 0) {
            trigger_error('Empty $b24Id or $orderId '
                . ". Order ID : " . print_r($orderId, 1) . ". ID B24: " . print_r($b24Id, 1),
                E_USER_WARNING);
        }

        //$fields = json_encode($fields);
        $fieldsToAdd = array('oc_order_id' => $orderId, 'b24_order_id' => $b24Id);
        $this->insertToDB($fieldsToAdd);
    }

    public function addOrder($orderId){
        $this->load->model('checkout/order');

        $order = $this->model_checkout_order->getOrder($orderId);
        if ((int)$order['order_status_id'] > 0) {
            return;
        }

        $dataToAdd = $this->prepareDataToB24($orderId);

        // Оповещение менеджера о новом клиенте
        $dataToAdd = array_merge($dataToAdd, array('params' => array('REGISTER_SONET_EVENT' => 'Y')));

        //Product
        $productToAdd = $this->prepareProductToB24($orderId);
        // Product

        // Not Registered user b24ContactId. LEAD
        $extraField = array();
        if (empty($dataToAdd['fields']['CONTACT_ID'])) {
            $typeApi = 'lead';
        } else {
            $typeApi = 'deal';

            //$customerGroupId = $this->customer->getGroupId();
            //$groupName = $this->getCustomerGroupName($customerGroupId);
            //$discountType = $groupName . ' ' . $this->getDiscountCoef($customerGroupId) . '%';
            //$extraField = [
            //	$this->UF_DEAL_PAYMENT_METHOD => $order['payment_method'],
            //	$this->UF_DEAL_DISCOUNT_TYPE => $discountType,
            //];
        }


        //$dataToAdd['fields'] = array_merge($dataToAdd['fields'], $extraField);
        //$typeApi = 'lead';
        $params = array(
            'type'   => 'batch',
            'params' => array(
              'cmd' => array(
                'order_add'   => 'crm.' . $typeApi . '.add?' . http_build_query($dataToAdd),
                'product_add' => 'crm.' . $typeApi . '.productrows.set?id=$result[order_add]&' . http_build_query($productToAdd),
              ),
            ),
        );

        $result = callRest($params);
        $b24Id = $result['result']['result']['order_add'];
        $b24Fields = $result['result']['result']['product_add'];

        if (!empty($result['result']['result_error'])) {
            trigger_error('Ошибка при добавлении клиента в Б24 ' . print_r($result['result_error'], 1), E_USER_WARNING);
        }

        /**
         * Todo добиться атомарности операции. В Б24 можно добавить одинаковые товары. Если не запишется в БД,
         * то след раз добавятся еще товары
         */

        $this->addToDB($orderId, $b24Id);
    }

    public function editOrder($orderId){

    }

    public function prepareProductToB24($orderId){
        $this->load->model('account/order');

        $productToAdd = array();
        $productRows = $this->model_account_order->getOrderProducts($orderId);
        foreach ($productRows as $product) {
            $productId = $product['product_id'];

// region Get B24 Product ID
            $orderOption = $this->model_account_order->getOrderOptions($orderId, $product['order_product_id']);
            $productOptions = '';
            foreach ($orderOption as $option) {
                $productOptions .= ' | ' . $option['name'] . ': ' . $option['value'];
            }
//			$size = $orderOption[0]['value'] ? $orderOption[0]['value'] : self::WITHOUT_SIZE;

            //$filter = ['oc_product_id' => $productId, 'size' => $size];
            //$b24Product = $this->model_module_b24_product->getList($filter)[0];
//endregion Get B24 Product ID

            //$newProduct = $this->recalculatePriceAndDiscount($product['product_id'], $this->customer->getGroupId());
            $taxRate = ($product['tax'] / $product['price']) * 100;
            $price = $product['price'] + $product['tax'];
            $productName = html_entity_decode(trim($product['name'] . $productOptions));
            $productToAdd['rows'][] = array(
                //'PRODUCT_ID' => $b24Product['b24_product_id'],
                'PRODUCT_NAME' => $productName,
                'PRICE'        => $price,
                //'DISCOUNT_RATE' => $newProduct['discount_rate'],
                //'DISCOUNT_SUM' => $newProduct['discount_sum'],
                //'DISCOUNT_TYPE_ID' => 2,
                'TAX_RATE'     => $taxRate,
                'TAX_INCLUDED' => 'N',
                'QUANTITY'     => $product['quantity'],
                'MEASURE_CODE' => self::MEASURE_PIECE, // piece
            );
        }

        $productToAdd = $this->addDeliveryCost($orderId, $productToAdd);

        return $productToAdd;
    }

    public function addDeliveryCost($orderId, array $productToAdd){
        $orderTotalList = $this->model_account_order->getOrderTotals($orderId);

        foreach ($orderTotalList as $orderTotal) {
            if ($orderTotal['code'] == 'shipping') {
                $productToAdd['rows'][] = array(
                    'PRODUCT_ID'   => 0,
                    'PRICE'        => $orderTotal['value'],
                    'PRODUCT_NAME' => $orderTotal['title'],
                    'QUANTITY'     => 1,
                    'MEASURE_CODE' => self::MEASURE_PIECE, // piece
                );
            }
        }

        return $productToAdd;
    }

    //public function recalculatePriceAndDiscount($productId, $customerGroupId)
    //{
    //	$this->load->model('module/b24_product');
    //
    //	$product = $this->model_module_b24_product->getProduct($productId);
    //	//$groupCoef = $this->getCustomerGroupCoef();
    //	//$customerGroupId = abs($customerGroupId) > 0 ? $customerGroupId : self::RETAIL_CUSTOMER_GROUP;
    //
    //	//$product['discount_rate'] = 100 - $groupCoef[$customerGroupId];
    //	//$product['discount_sum'] = $product['price'] * ($product['discount_rate'] / 100);
    //	//$product['price'] = $product['price'] + (($groupCoef[self::RETAIL_CUSTOMER_GROUP] / 100) * $product['price'])
    //	//	- $product['discount_sum'];
    //
    //	$realPrice = $product['price'] * 2;
    //	$product['discount_rate'] = $this->getDiscountCoef($customerGroupId);
    //	$product['discount_sum'] = $realPrice * ($product['discount_rate'] / 100);
    //	$product['price'] = $realPrice - $product['discount_sum'];
    //
    //	return $product;
    //}

    public function prepareDataToB24($orderId){
        //$this->load->model('account/order');
        $this->load->model('checkout/order');
        $this->load->model('module/b24_customer');
        //$this->load->model('module/b24_product');

        // DATA
        //$order = $this->model_account_order->getOrder($orderId);
        $order = $this->model_checkout_order->getOrder($orderId);
        $orderName = $order['store_name'] . '. Заказ № ' . $order['order_id'];
        $orderComment = $order['comment'];
        $customerLastname = $order['lastname'];
        $customerName = $order['firstname'];
        $customerEmail = mb_stripos($order['email'], 'localhost') ? 'order-no-' . $order['order_id'] . '@automag-sp.ru' : $order['email'];
        $customerPhone = $order['telephone'];
        $customerId = $order['customer_id'];
        // DATA

        //Contact
        if ($this->customer->isLogged()) {
            $b24Contact = $this->getContactFromDB($order['customer_id']);
        } else {
            $b24Contact = $this->getContactFromB24($order['email']);
        }
        $managerId = $b24Contact['ASSIGNED_BY_ID'] ? $b24Contact['ASSIGNED_BY_ID'] : $this->model_module_b24_customer->getCurrentManagerId();
        $b24ContactId = $b24Contact['ID'];
        //Contact

        $managerId = $this->model_module_b24_customer->getCurrentManagerId();
        $dataToB24 = array();
        $dataToB24 = array('fields' => array(
            'TITLE'               => $orderName,
            'STATUS_ID'           => 'NEW',
            'CURRENCY_ID'         => 'RUB',
            'SOURCE_ID'           => 'WEB',
            'OPENED'              => 'N',
            'ASSIGNED_BY_ID'      => $managerId,
            'CONTACT_ID'          => $b24ContactId,
            'COMMENTS'            => $orderComment,
            //'CREATED_BY_ID' => self::CREATED_BY,
            //'SOURCE_ID' => self::SOURCE_ID_WEB,

            // LEAD Fields
            'NAME'                => $customerName,
            'LAST_NAME'           => $customerLastname,
            'ADDRESS'             => $order['payment_address_1'],
            'ADDRESS_COUNTRY'     => $order['payment_country'],
            'ADDRESS_PROVINCE'    => $order['payment_zone'],
            'ADDRESS_CITY'        => $order['payment_city'],
            'ADDRESS_POSTAL_CODE' => $order['payment_postcode'],
            'PHONE'               => array(array('VALUE' => $customerPhone, "VALUE_TYPE" => "WORK")),
            'EMAIL'               => array(array('VALUE' => $customerEmail, "VALUE_TYPE" => "WORK")),
        ));

        return $dataToB24;
    }

    public function getContactFromDB($customerId){
        if (abs($customerId) <= 0) {
            return array();
        }

        $b24Row = $this->model_module_b24_customer->getById($customerId);
        $b24Contact = json_decode($b24Row['b24_contact_field'], 1);

        return $b24Contact;
    }

    public function getContactFromB24($contactEmail){
        $b24Contact = $this->getB24ContactList(array('EMAIL' => $contactEmail));

        trigger_error(var_export($b24Contact,1));
        trigger_error(var_export($contactEmail,1));

        $b24Contact = $b24Contact[0];
        return $b24Contact;
    }

    //public function getDiscountCoef( $customerGroupId )
    //{
    //	if(abs($customerGroupId) <= 0 ){ $customerGroupId = self::RETAIL_CUSTOMER_GROUP;}
    //
    //	$groupCoef = $this->getCustomerGroupCoef();
    //	$discount = $groupCoef[$customerGroupId];
    //
    //	return $discount;
    //}

    //public function getCustomerGroupName( $customerGroupId )
    //{
    //	if(abs($customerGroupId) <= 0 ){ $customerGroupId = self::RETAIL_CUSTOMER_GROUP;}
    //	$this->load->model('account/customer_group');
    //
    //	$groupName = $this->model_account_customer_group->getCustomerGroup($customerGroupId)['name'];
    //
    //	return $groupName;
    //}

    //public function getCustomerGroupCoef()
    //{
    //	$sql = "SELECT * FROM b24_order_config WHERE name = '" .self::CONFIG_CUSTOMER_GROUP_COEF ."'";
    //	$query = $this->db->query($sql);
    //
    //	return json_decode($query->row['value'], 1);
    //}

    public function getB24ContactList($filter){
        if (empty($filter)) {
            trigger_error('Empty filter', E_USER_WARNING);
        }

        foreach ($filter as $value) {
            if (empty($value)) {
                return FALSE;
            }
        }

        $params = array(
            'type'   => 'crm.contact.list',
            'params' => array(
                'filter' => $filter,
            ),
        );

        $result = callRest($params);

        return $result['result'];
    }

    public function insertToDB(array $fields){
        $db = $this->db;

        $sql = 'REPLACE INTO ' . self::TABLE_NAME . ' SET ' . $this->prepareFields($fields) . ';';
        $db->query($sql);

        $lastId = $this->db->getLastId();

        return $lastId;
    }

    public function prepareFields(array $fields){
        $sql = '';
        $index = 0;
        foreach ($fields as $columnName => $value) {
            $glue = $index === 0 ? ' ' : ', ';
            $sql .= $glue . "`$columnName`" . ' = "' . $this->db->escape($value) . '"';
            $index++;
        }

        return $sql;
    }

    public function getById($orderId){
        if (abs($orderId) <= 0) {
            trigger_error('Customer ID must be integer', E_USER_WARNING);
        }

        $db = $this->db;
        $sql = 'Select * from ' . self::TABLE_NAME . ' WHERE oc_order_id = "' . $db->escape($orderId) . '"';
        $query = $db->query($sql);

        return $query->row;
    }

    public function getList(array $filter){
        $db = $this->db;
        $where = ' WHERE ';
        $index = 0;
        foreach ($filter as $columnName => $value) {
            $glue = $index === 0 ? ' ' : ' AND ';
            $where .= $glue . $columnName . ' = "' . $db->escape($value) . '"';
            $index++;
        }

        $sql = 'Select * from ' . self::TABLE_NAME . $where . ';';
        $query = $db->query($sql);

        return $query->rows;
    }
}
