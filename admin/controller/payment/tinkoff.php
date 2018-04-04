<?php
class ControllerPaymentTinkoff extends Controller {

    public function install() {
        $this->load->model('payment/tinkoff');

        $this->model_payment_tinkoff->install();
    }

    public function uninstall() {
        $this->load->model('payment/tinkoff');

        $this->model_payment_tinkoff->uninstall();
    }

    public function index() {
        $this->load->language('payment/tinkoff');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');
        $this->load->model('setting/extension');
        $this->load->model('payment/tinkoff');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');

        $this->error = array();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            unset($this->request->post['tinkoff_module']);

            $this->model_setting_setting->editSetting('tinkoff', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
        } else {
            $this->data['error'] = @$this->error;
        }

        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['terminal_key_label'] = $this->language->get('terminal_key');
        $this->data['secret_key_label'] = $this->language->get('secret_key');
        $this->data['currency_label'] = $this->language->get('currency');
        $this->data['payment_url_label'] = $this->language->get('payment_url');
        $this->data['description_label'] = $this->language->get('description');
        $this->data['status_label'] = $this->language->get('status');
        $this->data['status_success_label'] = $this->language->get('status_success');
        $this->data['status_failed_label'] = $this->language->get('status_failed');

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');
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
            'href'      => $this->url->link('payment/tinkoff', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        //button actions
        $this->data['action'] = $this->url->link('payment/tinkoff', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['terminal_key'] = isset($this->request->post['terminal_key']) ? $this->request->post['terminal_key'] : $this->config->get('terminal_key');
        $this->data['secret_key'] = isset($this->request->post['secret_key']) ? $this->request->post['secret_key'] : $this->config->get('secret_key');
        $this->data['currency'] = isset($this->request->post['currency']) ? $this->request->post['currency'] : $this->config->get('currency');
        $this->data['payment_url'] = isset($this->request->post['payment_url']) ? $this->request->post['payment_url'] : $this->config->get('payment_url');
        $this->data['description'] = isset($this->request->post['description']) ? $this->request->post['description'] : $this->config->get('description');
        $this->data['tinkoff_status'] = isset($this->request->post['tinkoff_status']) ? $this->request->post['tinkoff_status'] : $this->config->get('tinkoff_status');
        $this->data['order_status_success_id'] = isset($this->request->post['order_status_success_id']) ? $this->request->post['order_status_success_id'] : $this->config->get('order_status_success_id');
        $this->data['order_status_failed_id'] = isset($this->request->post['order_status_failed_id']) ? $this->request->post['order_status_failed_id'] : $this->config->get('order_status_failed_id');
        $this->data['tinkoff_sort_order'] = isset($this->request->post['tinkoff_sort_order']) ? $this->request->post['tinkoff_sort_order'] : $this->config->get('tinkoff_sort_order');
        $this->load->model('localisation/order_status');

        $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        $this->data['token'] = $this->session->data['token'];

        $this->template = 'payment/tinkoff.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        $this->response->setOutput($this->render());
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'payment/tinkoff')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (empty($this->request->post['terminal_key'])) {
            $this->error['terminal_key'] = $this->language->get('error_terminal_key');
        }

        if (empty($this->request->post['secret_key'])) {
            $this->error['secret_key'] = $this->language->get('error_secret_key');
        }

        if (empty($this->request->post['payment_url'])) {
            $this->error['payment_url'] = $this->language->get('error_payment_url');
        }

        if (empty($this->request->post['currency'])) {
            $this->error['currency'] = $this->language->get('error_currency');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}
?>