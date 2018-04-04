<?php

class ControllerVinForm extends Controller {
    function index() {
        $this->data['message'] = FALSE;
        $fields = array('Модель' => 'mark', 'VIN' => 'vin', 'Запяасти' => 'parts', 'E-mail' => 'mail', 'Телефон' => 'phone');
        if (count($this->request->post)) {
            if ($err = $this->validate($this->request->post)) {
                $this->data['error'] = $err;
            } else {
                $this->commit($fields);
                $this->data['message'] = 'Спасибо за обращение. В кратчайшее время наш менеджер свяжется с вами.';
            }
        }

        if (!$this->data['message']) {
            foreach ($fields as $field) {

                if (isset($this->request->post[$field])) {
                    $this->data['form'][$field] = $this->request->post[$field];
                } else {
                    $this->data['form'][$field] = '';
                }
            }
        }
        $this->document->setTitle('Запрос запчастей по VIN');
        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home'),
            'separator' => FALSE,
        );
        $this->data['breadcrumbs'][] = array(
            'text' => 'Запрос по VIN',
            'href' => $this->url->link('vin/form'),
            'separator' => FALSE,
        );
        $this->data['heading_title'] = 'Запрос по VIN';
        $this->data['post_url'] = $this->url->link('vin/form');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/vin/form.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/vin/form.tpl';
        } else {
            $this->template = 'default/template/vin/form.tpl';
        }
        $this->children = array(
            'common/column_left',
            'common/column_right',
            'common/content_top',
            'common/content_bottom',
            'common/footer',
            'common/header',
        );
        $this->response->setOutput($this->render());
    }


    function commit(array $fields) {
        $message = '';
        if (!count($fields)) {
            $fields = array('Модель' => 'mark', 'VIN' => 'vin', 'Запяасти' => 'parts', 'E-mail' => 'mail', 'Телефон' => 'phone');
        }

        foreach ($fields as $name => $key) {
            $message .= "$name:" . strip_tags($this->request->post[$key]) . PHP_EOL;
        }
        $mail = 'zakaz@automag-sp.ru';
        mail($mail, 'Заказ запчастей по VIN', $message);

        require_once realpath(DIR_APPLICATION . '..') . '/b24_api/include/config.php';
        // Add customer
        /*
                $data['firstname'] = 'Запрос данных по VIN ' . date('Y-m-d h:i:s');
                $data['lastname'] = '';
                $data['telephone'] = $this->request->post['phone'];
                $data['email'] = $this->request->post['mail'];
                $customer_group_id = $this->config->get('config_customer_group_id');
                $this->load->model('account/customer_group');
                $customer_group_info = $this->model_account_customer_group->getCustomerGroup($customer_group_id);
                $this->db->query("INSERT INTO " . DB_PREFIX . "customer SET store_id = '" . (int)$this->config->get('config_store_id') . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', fax = '" . $this->db->escape($data['fax']) . "', salt = '" . $this->db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', password = '" . $this->db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', newsletter = '" . (isset($data['newsletter']) ? (int)$data['newsletter'] : 0) . "', customer_group_id = '" . (int)$customer_group_id . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', status = '1', approved = '" . (int)!$customer_group_info['approval'] . "', date_added = NOW()");
                $customer_id = $this->db->getLastId();
                $this->db->query("INSERT INTO " . DB_PREFIX . "address SET customer_id = '" . (int)$customer_id . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', company = '" . $this->db->escape($data['company']) . "', company_id = '" . $this->db->escape($data['company_id']) . "', tax_id = '" . $this->db->escape($data['tax_id']) . "', address_1 = '" . $this->db->escape($data['address_1']) . "', address_2 = '" . $this->db->escape($data['address_2']) . "', city = '" . $this->db->escape($data['city']) . "', postcode = '" . $this->db->escape($data['postcode']) . "', country_id = '" . (int)$data['country_id'] . "', zone_id = '" . (int)$data['zone_id'] . "'");
                $address_id = $this->db->getLastId();
                $this->db->query("UPDATE " . DB_PREFIX . "customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$customer_id . "'");
                $this->load->model('module/b24_customer');
                $this->model_module_b24_customer->addCustomer($customer_id);
        */


        $fields = array(
            'type' => 'crm.lead.add',
            'params' => array("REGISTER_SONET_EVENT" => "Y",
                'fields' => array(
                    "TITLE" => "Запрос запчастей по VIN",
                    "NAME" => 'Запрос ' . date('Y-m-d H:i:s'),
                    "SECOND_NAME" => "Запчастей",
                    "LAST_NAME" => "По VIN",
                    "STATUS_ID" => "NEW",
                    "OPENED" => "Y",
                    "COMMENTS" =>
                        'Марка: "' . $this->request->post['mark'] . '"' . PHP_EOL .
                        ',VIN: "' . $this->request->post['vin'] . '"' . PHP_EOL .
                        ',Запчасти: "' . $this->request->post['parts'] . '"',
//                    "PHONE" => $this->request->post['phone'],
//                    "EMAIL" => $this->request->post['mail'],
                    "UF_CRM_1512450211" => $this->request->post['vin'],
                    "PHONE" => array(array("VALUE" => $this->request->post['phone'], "VALUE_TYPE" => "WORK")),
                    "EMAIL" => array(array("VALUE" => $this->request->post['mail'], "VALUE_TYPE" => "WORK")),
                ),
            ),
        );
        callRest($fields);
    }

    function validate($fields) {
        if (
            (mb_strlen($fields['mail']) && filter_var($fields['mail'], FILTER_VALIDATE_EMAIL))
            ||
            mb_strlen($fields['phone'])
        ) {
            return FALSE;
        } else {
            return 'Укажите телефон или e-mail';
        }
    }
}