<?php
class ModelModuleB24Customer extends Model
{
	const TABLE_NAME = 'b24_customer';
	const MANAGER = 10;
	const CREATED_BY = 1 ;
	const RETAIL_CLIENT = 'SHARE';
	const SOURCE_ID_WEB = 'WEB';
	const CONFIG_MANAGER_ID = 'manager_id';

	public function addToDB( $customerId, $b24Id, array $fields = array() )
	{
		if( empty($b24Id) || (int) $customerId <= 0 ){
			trigger_error('Пустой ИД контакта при добавлении контакта из Б24 '
				.". ИД покупателя: ". print_r($customerId, 1) .". ИД Контакта: ".  print_r($b24Id, 1),
				E_USER_WARNING);
		}

		$fields = json_encode($fields);
		$fieldsToAdd = array('oc_customer_id' => $customerId, 'b24_contact_id' => $b24Id, 'b24_contact_field' => $fields);
		$this->insertToDB($fieldsToAdd);

	}

	public function addCustomer( $customerId )
	{
		$this->load->model('module/b24_order');
		$this->load->model('account/customer');

		$customer = $this->model_account_customer->getCustomer($customerId);
		$email = $customer['email'];
		$contact = $this->model_module_b24_order->getB24ContactList(array('EMAIL' => $email));
		$contact = $contact[0];

		// If user already registered in B24
		if ( !empty($contact) )
		{
			$b24Id = $contact['ID'];
			$b24Fields = $contact;
		}else
		{
			$dataToAdd = $this->prepareDataToB24($customerId);
			// Оповещение менеджера о новом клиенте
			$dataToAdd = array_merge($dataToAdd, array('params' => array('REGISTER_SONET_EVENT' => 'Y')));
			$params = array(
				'type' => 'batch',
				'params' => array(
					'cmd' => array(
						'contact_id' => 'crm.contact.add?' . http_build_query($dataToAdd),
						'contact_get' => 'crm.contact.get?' . http_build_query(array('id' => '$result[contact_id]'))  // No quotes in array key!!!
					)
				)
			);
			$result = callRest($params);
			$b24Id = $result['result']['result']['contact_id'];
			$b24Fields = $result['result']['result']['contact_get'];
		}


		if ( !empty($result['result']['result_error']) )
		{
			trigger_error('Ошибка при добавлении клиента в Б24 ' . print_r($result['result_error'], 1), E_USER_WARNING);
		}

		/**
		 * Todo добиться атомарности операции. В Б24 можно добавить одинаковые товары. Если не запишется в БД,
		 * то след раз добавятся еще товары
		 */

		$this->addToDB($customerId, $b24Id, $b24Fields);
		return $b24Id;
	}

	/**
	 * @param integer $customerId
	 */
	public function editCustomer( $customerId )
	{
		$dataToUpdate = $this->prepareDataToB24($customerId);
		$b24Row = $this->getById($customerId);
		$b24ContactId = $b24Row['b24_contact_id'];

		// region Update Crm multiField Phone and Email
		$b24Field = json_decode($b24Row['b24_contact_field'], true);
		$dataToUpdate['fields']['PHONE'][0]['ID'] = $b24Field['PHONE'][0]['ID'];
		$dataToUpdate['fields']['EMAIL'][0]['ID'] = $b24Field['EMAIL'][0]['ID'];
		// endregion

		$dataToUpdate = array_merge($dataToUpdate, array('id' => $b24ContactId));

		$params = array(
			'type' => 'batch',
			'params' => array(
				'cmd' => array(
					'contact_update' => 'crm.contact.update?' . http_build_query($dataToUpdate),
					'contact_get' => 'crm.contact.get?id=' . $b24ContactId
				)
			)
		);

		$result = callRest($params);

		$b24Field = $result['result']['result']['contact_get'];

		$this->addToDB($customerId, $b24ContactId, $b24Field);
	}

	public function editAddress($addressId, $isDefault)
	{
		if(!$isDefault) {return false;}
		
		$address = $this->prepareAddress($addressId, $this->customer->getId());

		$b24Row = $this->getById($this->customer->getId());
		$b24ContactId = $b24Row['b24_contact_id'];

		$dataToB24 = array(
			'id' => $b24ContactId,
			'fields' => $address
		);

		$params = array(
			'type' => 'crm.contact.update',
			'params' => $dataToB24
		);

		$result = callRest($params);

		$x = 5;
	}

	// region delete
	//public function deleteProduct($customerId)
	//{
	//	$productRows = $this->getById($customerId);
	//
	//	$deleteData = [];
	//	foreach ( $productRows as $productRow )
	//	{
	//		$deleteData[] = 'crm.product.delete?id=' . $productRow['b24_product_id'];
	//	}
	//
	//	$params = [
	//		'type' => 'batch',
	//		'params' => ['cmd' => $deleteData]
	//	];
	//
	//	$result = callRest($params);
	//
	//	if ( !empty($result['result_error']) )
	//	{
	//		trigger_error('Ошибка при удалении товаров в Б24: ' . print_r($result['result_error'], 1), E_USER_WARNING);
	//	}
	//}
	//endregion

	public function prepareAddress( $addressId, $customer_id )
	{
		$this->load->model('account/address');

		$address = $this->getAddress($addressId, $customer_id);
		$street = $address['address_1'];
		$city = $address['city'];
		$postCode = $address['postcode'];
		$country = $address['country'];
		$zone = $address['zone'];

		$addressToB24 = array(
				'ADDRESS' => $street,
				'ADDRESS_CITY' => $city,
				'ADDRESS_PROVINCE' => $zone,
				'ADDRESS_COUNTRY' => $country,
				'ADDRESS_POSTAL_CODE' => $postCode,
		);

		return $addressToB24;
	}

	public function prepareDataToB24($customerId)
	{
		$this->load->model('account/customer');
		//$this->load->model('module/b24_customer');
		//$this->load->model('catalog/manufacturer');
		//$this->load->model('localisation/stock_status');

		// DATA
		$customer = $this->model_account_customer->getCustomer($customerId);
		$customerName = $customer['firstname'];
		$customerLastname = $customer['lastname'];
		$customerEmail = $customer['email'];
		$customerPhone = $customer['telephone'];
		// DATA

		//manager
		$b24Row = $this->getById($customerId);
		$b24Field = json_decode($b24Row['b24_contact_field'], 1);
		$managerId = !empty($b24Field['ASSIGNED_BY_ID']) ? $b24Field['ASSIGNED_BY_ID'] : $this->getCurrentManagerId();
		//manager
		
		$dataToB24 = array('fields' => array(
			'NAME' => $customerName,
			'LAST_NAME' => $customerLastname,
			'OPENED' => 'N',
			'ASSIGNED_BY_ID' => $managerId,
			'CREATED_BY_ID' => self::CREATED_BY,
			'TYPE_ID' => self::RETAIL_CLIENT,
			'SOURCE_ID' => self::SOURCE_ID_WEB,
			'PHONE' => array(array('VALUE' => $customerPhone, "VALUE_TYPE" => "WORK")),
			'EMAIL' => array(array('VALUE' => $customerEmail, "VALUE_TYPE" => "WORK")),
		));

		if(!empty($customer['address_id']))
		{
			$address = $this->prepareAddress($customer['address_id'], $customerId);
			$dataToB24['fields'] = array_merge($dataToB24['fields'], $address);
		}

		return $dataToB24;
	}

	public function getCurrentManagerId()
	{
		$sql = 'SELECT `value` FROM b24_customer_config WHERE `name` = "' . self::CONFIG_MANAGER_ID . '";';
		$query = $this->db->query($sql);

		return $query->row['value'];
	}
	
	public function insertToDB(array $fields)
	{
		$db = $this->db;

		$sql = 'REPLACE INTO ' . self::TABLE_NAME . ' SET ' . $this->prepareFields($fields) . ';';
		$db->query($sql);

		$lastId = $this->db->getLastId();

		return $lastId;
	}

	public function prepareFields(array $fields)
	{
		$sql = '';
		$index = 0;
		foreach ( $fields as $columnName => $value )
		{
			$glue = $index === 0 ? ' ' : ', ';
			$sql .= $glue . "`$columnName`" . ' = "' . $this->db->escape($value) . '"';
			$index++;
		}

		return $sql;
	}

	public function getById($customerId)
	{
		if(abs($customerId) <= 0){ trigger_error('Customer ID must be integer', E_USER_WARNING);}

		$db = $this->db;
		$sql = 'Select * from ' . self::TABLE_NAME . ' WHERE oc_customer_id = "' . $db->escape($customerId) . '"';
		$query = $db->query($sql);

		return $query->row;
	}

	public function getList(array $filter)
	{
		$db = $this->db;
		$where = ' WHERE ';
		$index = 0;
		foreach ( $filter as $columnName => $value )
		{
			$glue = $index === 0 ? ' ' : ' AND ';
			$where .= $glue . $columnName. ' = "' . $db->escape($value) . '"';
			$index++;
		}

		$sql = 'Select * from ' . self::TABLE_NAME . $where . ';';
		$query = $db->query($sql);

		return $query->rows;
	}

	public function getAddress($address_id, $customer_id) {
		$address_query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "address WHERE address_id = '" . (int)$address_id . "' AND customer_id = '" . (int) $customer_id . "'");

		if ($address_query->num_rows) {
			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$address_query->row['country_id'] . "'");

			if ($country_query->num_rows) {
				$country = $country_query->row['name'];
				$iso_code_2 = $country_query->row['iso_code_2'];
				$iso_code_3 = $country_query->row['iso_code_3'];
				$address_format = $country_query->row['address_format'];
			} else {
				$country = '';
				$iso_code_2 = '';
				$iso_code_3 = '';
				$address_format = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$address_query->row['zone_id'] . "'");

			if ($zone_query->num_rows) {
				$zone = $zone_query->row['name'];
				$zone_code = $zone_query->row['code'];
			} else {
				$zone = '';
				$zone_code = '';
			}

			$address_data = array(
				'firstname'      => $address_query->row['firstname'],
				'lastname'       => $address_query->row['lastname'],
				'company'        => $address_query->row['company'],
				'company_id'     => $address_query->row['company_id'],
				'tax_id'         => $address_query->row['tax_id'],
				'address_1'      => $address_query->row['address_1'],
				'address_2'      => $address_query->row['address_2'],
				'postcode'       => $address_query->row['postcode'],
				'city'           => $address_query->row['city'],
				'zone_id'        => $address_query->row['zone_id'],
				'zone'           => $zone,
				'zone_code'      => $zone_code,
				'country_id'     => $address_query->row['country_id'],
				'country'        => $country,
				'iso_code_2'     => $iso_code_2,
				'iso_code_3'     => $iso_code_3,
				'address_format' => $address_format
			);

			return $address_data;
		} else {
			return false;
		}
	}
}
