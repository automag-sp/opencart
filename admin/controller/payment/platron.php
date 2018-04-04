<?php
class ControllerPaymentPlatron extends Controller {
	private $error = array();

	public function index() {

		$this->load->language('payment/platron');

		$this->document->setTitle = $this->language->get('heading_title');

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('platron', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
         		$this->data['entry_donate_me'] = $this->language->get('entry_donate_me');
		// platron ENTER
        $this->data['entry_payment_name'] = $this->language->get('entry_payment_name');
		$this->data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
		$this->data['entry_secret_word'] = $this->language->get('entry_secret_word');
        $this->data['entry_lifetime'] = $this->language->get('entry_lifetime');

		// URL
		$this->data['copy_result_url'] 	= HTTP_CATALOG . 'index.php?route=payment/platron/callback';
		$this->data['copy_success_url']	= HTTP_CATALOG . 'index.php?route=payment/platron/success';
		$this->data['copy_fail_url'] 	= HTTP_CATALOG . 'index.php?route=payment/platron/fail';

		// TEST MODE
		$this->data['entry_test'] = $this->language->get('entry_test');

		$this->data['entry_order_status'] = $this->language->get('entry_order_status');
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

		//
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}


		//
        if (isset($this->error['payment_name'])) {
            $this->data['error_payment_name'] = $this->error['payment_name'];
        } else {
            $this->data['error_payment_name'] = '';
        }

		if (isset($this->error['merchant_id'])) {
			$this->data['error_merchant_id'] = $this->error['merchant_id'];
		} else {
			$this->data['error_merchant_id'] = '';
		}

		if (isset($this->error['secret_word'])) {
			$this->data['error_secret_word'] = $this->error['secret_word'];
		} else {
			$this->data['error_secret_word'] = '';
		}

		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/platron', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);



        $this->data['action'] = $this->url->link('payment/platron', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

		//
        if (isset($this->request->post['platron_payment_name'])) {
            $this->data['platron_payment_name'] = $this->request->post['platron_payment_name'];
        } else {
            $this->data['platron_payment_name'] = $this->config->get('platron_payment_name');
        }

		//
		if (isset($this->request->post['platron_merchant_id'])) {
			$this->data['platron_merchant_id'] = $this->request->post['platron_merchant_id'];
		} else {
			$this->data['platron_merchant_id'] = $this->config->get('platron_merchant_id');
		}


		//
		if (isset($this->request->post['platron_secret_word'])) {
			$this->data['platron_secret_word'] = $this->request->post['platron_secret_word'];
		} else {
			$this->data['platron_secret_word'] = $this->config->get('platron_secret_word');
		}

        if (isset($this->request->post['platron_test'])) {
            $this->data['platron_test'] = $this->request->post['platron_test'];
        } else {
            $this->data['platron_test'] = $this->config->get('platron_test');
        }

        if (isset($this->request->post['platron_lifetime'])) {
            $this->data['platron_lifetime'] = $this->request->post['platron_lifetime'];
        } else {
            $this->data['platron_lifetime'] = $this->config->get('platron_lifetime');
        }

		if (isset($this->request->post['platron_order_status_id'])) {
			$this->data['platron_order_status_id'] = $this->request->post['platron_order_status_id'];
		} else {
			$this->data['platron_order_status_id'] = $this->config->get('platron_order_status_id');
		}

		$this->load->model('localisation/order_status');

		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['platron_geo_zone_id'])) {
			$this->data['platron_geo_zone_id'] = $this->request->post['platron_geo_zone_id'];
		} else {
			$this->data['platron_geo_zone_id'] = $this->config->get('platron_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['platron_status'])) {
			$this->data['platron_status'] = $this->request->post['platron_status'];
		} else {
			$this->data['platron_status'] = $this->config->get('platron_status');
		}

		if (isset($this->request->post['platron_sort_order'])) {
			$this->data['platron_sort_order'] = $this->request->post['platron_sort_order'];
		} else {
			$this->data['platron_sort_order'] = $this->config->get('platron_sort_order');
		}

		$this->template = 'payment/platron.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/platron')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

        if (!$this->request->post['platron_payment_name']) {
            $this->error['payment_name'] = $this->language->get('error_payment_name');
        }

		if (!$this->request->post['platron_merchant_id']) {
			$this->error['merchant_id'] = $this->language->get('error_merchant_id');
		}

		if (!$this->request->post['platron_secret_word']) {
			$this->error['secret_word'] = $this->language->get('error_secret_word');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>