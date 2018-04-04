<?php
class ControllerModuleB24Apipro extends Controller
{
	private $error = array();
	private $filename = '';

	const CONFIG_USER_LIST = 'user_list';
	const CONFIG_MANAGER_ID = 'manager_id';

	public function install()
	{
	
		$createTableSql = "CREATE TABLE IF NOT EXISTS `b24_order` (
					`id` INT(11) NOT NULL AUTO_INCREMENT,
					`oc_order_id` INT(11) NULL DEFAULT NULL,
					`b24_order_id` INT(11) NULL DEFAULT NULL,
					`date_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					PRIMARY KEY (`id`)
				)
				COLLATE='utf8_general_ci'
				ENGINE=InnoDB
				;"
		;

		$createConfigTableSql = "CREATE TABLE IF NOT EXISTS `b24_order_config` (
						`id` INT(11) NOT NULL AUTO_INCREMENT,
						`name` VARCHAR(255) NULL DEFAULT NULL,
						`value` TEXT NULL,
						PRIMARY KEY (`id`),
						UNIQUE INDEX `name` (`name`)
					)
					ENGINE=InnoDB
;"
		;

		$createCustomer = "CREATE TABLE IF NOT EXISTS `b24_customer` (
						`id` INT(11) NOT NULL AUTO_INCREMENT,
						`oc_customer_id` INT(11) NOT NULL,
						`b24_contact_id` INT(11) NOT NULL,
						`b24_contact_field` TEXT NULL,
						`date_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
						PRIMARY KEY (`id`),
						UNIQUE INDEX `b24_contact_id` (`b24_contact_id`)
					)
					COLLATE='utf8_general_ci'
					ENGINE=InnoDB				  
					;"
		;

		$createConfigCustomer = "CREATE TABLE IF NOT EXISTS `b24_customer_config` (
						`id` INT(11) NOT NULL AUTO_INCREMENT,
						`name` VARCHAR(255) NULL DEFAULT NULL,
						`value` TEXT NULL,
						PRIMARY KEY (`id`),
						UNIQUE INDEX `name` (`name`)
					)
					ENGINE=InnoDB
;"
		;

		$this->db->query($createTableSql);
		$this->db->query($createConfigTableSql);
		$this->db->query($createCustomer);
		$this->db->query($createConfigCustomer);
	}

	public function uninstall()
	{
		
	}

	public function __construct( $registry )
	{
		parent::__construct($registry);

		$this->filename = $_SERVER['DOCUMENT_ROOT'] . '/b24_api/include/connect_config.php';
	}

	public function index()
	{
		$this->language->load('module/b24_apipro');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');	

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if($this->request->post['save-config'] != '')
			{
				$dataToSave = array();
				$dataToSave['CLIENT_ID'] = trim($this->request->post['client_id']);
				$dataToSave['CLIENT_SECRET'] = trim($this->request->post['client_secret']);
				$dataToSave['DOMAIN'] = trim($this->request->post['domain']);
				$dataToSave['SCOPE'] = $this->request->post['scope'] ? $this->request->post['scope'] : array();
				$dataToSave['B24_DOMAIN'] = trim($this->request->post['b24_domain']);


				$dataToSave['PATH'] = $this->request->post['path'];

				$this->saveConfig($dataToSave);


			}elseif ($this->request->post['connect'] != '')
			{
				if( empty($QUERY_DATA) && empty($_REQUEST["code"]))
				{
					/******************* get code *************************************/

					$domain = B24_DOMAIN;
					$params = array(
						"response_type" => "code",
						"client_id" => CLIENT_ID,
						"redirect_uri" => REDIRECT_URI,
					);
					$path = "/oauth/authorize/";

					redirect(PROTOCOL."://".$domain.$path."?".http_build_query($params));
					/******************** /get code ***********************************/
				}
			}
			elseif ($this->request->post['refresh-user-list'] != '')
			{
				$this->refreshUserList();
			}
			elseif ($this->request->post['set-manager'] != '')
			{
				$managerId = $this->request->post['manager'];
				$this->setManager($managerId);
			}
		}

		if(isset($_REQUEST["code"]))
		{
			/****************** get access_token ******************************/
			$code = $_REQUEST["code"];
			$domain = $_REQUEST["domain"];
			$member_id = $_REQUEST["member_id"];

			$params = array(
				"grant_type" => "authorization_code",
				"client_id" => CLIENT_ID,
				"client_secret" => CLIENT_SECRET,
				"redirect_uri" => REDIRECT_URI,
				"scope" => SCOPE,
				"code" => $code,
			);
			$path = "/oauth/token/";

			$query_data = query("GET", PROTOCOL."://".$domain.$path, $params);
			//var_dump($query_data);
			//die('test');

			if(isset($query_data["access_token"]))
			{
				$QUERY_DATA = $query_data;
				$QUERY_DATA["ts"] = time();

				writeTokenToFile($QUERY_DATA);

				$this->data['connect_success'] = 'Успешно сгенирован Код';

				//die();
			}

			redirect(PATH);
			//else
			//{
			//	$data['connect_error'] = "Произошла ошибка авторизации! " . print_r($query_data, 1);
			//}
			/********************** /get access_token *************************/

			$this->session->data['success'] = $this->language->get('text_success');

			//redirect(PATH);

			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');

		$this->data['entry_banner'] = $this->language->get('entry_banner');
		$this->data['entry_dimension'] = $this->language->get('entry_dimension');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['dimension'])) {
			$this->data['error_dimension'] = $this->error['dimension'];
		} else {
			$this->data['error_dimension'] = array();
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/b24_apipro', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$this->data['action'] = $this->url->link('module/b24_apipro', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();

		if (isset($this->request->post['b24_apipro_module'])) {
			$this->data['modules'] = $this->request->post['b24_apipro_module'];
		} elseif ($this->config->get('banner_module')) {
			$this->data['modules'] = $this->config->get('b24_apipro_module');
		}

		// Vars
		$query_data = readAuth();
		$this->data['access_token'] = $query_data['access_token'];

		$savedConfig = @$this->getSavedConfig();
		$this->data['saved_config'] = $savedConfig;
		$this->data['scope_list'] = @$this->getScopeList();

		$this->data['user_list'] = $this->getUserList();
		$this->data['manager_id'] = $this->getManagerId();
		// Vars


		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->load->model('design/banner');

		$this->data['banners'] = $this->model_design_banner->getBanners();

		$this->template = 'module/b24_apipro.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/b24_apipro')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		//if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
		//	$this->error['name'] = $this->language->get('error_name');
		//}

		return !$this->error;
	}

	//public function getSelectedScope()
	//{
	//	$scope = $this->getSavedConfig()['SCOPE'];
	//
	//	if ( !empty($scope) )
	//	{
	//		return explode(',', $scope);
	//	}
	//
	//	return [];
	//}

	public function getSavedConfig()
	{
		$content = file_get_contents($this->filename);
		$config = json_decode($content, true);

		return $config;
	}

	public function saveConfig(array $data)
	{
		$config = json_encode($data, JSON_UNESCAPED_UNICODE);

		return file_put_contents($this->filename, $config);
	}

	public function getScopeList()
	{
		$params = array(
			'type' => 'scope',
			'params' => array('full' => true)
		);

		$result = callRest($params);

		return $result['result'];

	}

	public function getUserList()
	{
		$sql = 'SELECT value  FROM b24_customer_config WHERE `name` = "' . self::CONFIG_USER_LIST . '";';
		$query = $this->db->query($sql);

		return json_decode($query->row['value'], 1);
	}

	public function getManagerId()
	{
		$sql = 'SELECT value  FROM b24_customer_config WHERE `name` = "' . self::CONFIG_MANAGER_ID . '";';
		$query = $this->db->query($sql);

		return $query->row['value'];
	}

	public function refreshUserList()
	{
		$params = array(
			'type' => 'user.get',
			'params' => array()
		);

		$result = callRest($params);
		$userList = json_encode($result['result'], JSON_UNESCAPED_UNICODE);

		$sql = "REPLACE into b24_customer_config SET `value` = '{$userList}', `name` = '" . self::CONFIG_USER_LIST . "';";

		$this->db->query($sql);
	}

	public function setManager($managerId)
	{
		if(abs($managerId) <= 0 ){ trigger_error('Manager ID must be integer', E_USER_WARNING);}

		$sql = "REPLACE into b24_customer_config SET `value` = '{$managerId}', `name` = '" . self::CONFIG_MANAGER_ID . "';";

		$this->db->query($sql);
	}


}