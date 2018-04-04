<?php
class Controllerpaymenttinkoff extends Controller {
    protected function index() {
        $this->load->model('payment/tinkoff');
        $this->language->load('payment/tinkoff');
        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
        $temp_sum = $this->currency->format($order_info['total'],$order_info['currency_code'],$order_info['currency_value'],false);
        $sum = $this->currency->convert($temp_sum,$order_info['currency_code'],'RUB')*100;
        $this->data['payment'] = $this->model_payment_tinkoff->initPayment(array(
            'amount' => (int) $sum,
            'orderId' => $this->session->data['order_id'],
        ));

        $this->data['payButton'] = $this->language->get('pay_button');

        $this->template = 'default/template/payment/tinkoff_checkout.tpl';

        $this->render();
    }

    public function notification() {
        $this->load->model('payment/tinkoff');
//        if(strpos($_SERVER['REQUEST_URI'],'tinkoff')) {
            $this->log->write('---------------SERVER:'.var_export($_SERVER, 1));
            $this->log->write('---------------POST:'.var_export($_POST, 1));
//            $this->log->write('---------------OUT:'.var_export($this->response->getOutput(), 1));
//        }

        $this->model_payment_tinkoff->checkNotification($this->request->post);
        $this->log->write(__FILE__.'::'.__LINE__);
        try {

        } catch (Exception $e) {
            die('Something went wrong');
        }
        $this->log->write(__FILE__.'::'.__LINE__);
        die('OK');
    }

    public function failure() {
        if (isset($this->session->data['order_id'])) {
            $this->cart->clear();

            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['guest']);
            unset($this->session->data['comment']);
            unset($this->session->data['order_id']);
            unset($this->session->data['coupon']);
            unset($this->session->data['reward']);
            unset($this->session->data['voucher']);
            unset($this->session->data['vouchers']);
            unset($this->session->data['totals']);
        }

        $this->language->load('payment/tinkoff');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'href'      => $this->url->link('common/home'),
            'text'      => $this->language->get('text_home'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'href'      => $this->url->link('payment/tinkoff/failure'),
            'text'      => $this->language->get('text_payment'),
            'separator' => $this->language->get('text_separator')
        );

        $this->data['heading_title'] = $this->language->get('heading_title');


        $this->data['text_message'] = sprintf($this->language->get('payment_error'), $this->url->link('information/contact'));


        $this->data['button_continue'] = $this->language->get('button_onmain');

        $this->data['continue'] = $this->url->link('common/home');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/tinkoff_failure.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/payment/tinkoff_failure.tpl';
        } else {
            $this->template = 'default/template/payment/tinkoff_failure.tpl';
        }

        $this->children = array(
            'common/column_left',
            'common/column_right',
            'common/content_top',
            'common/content_bottom',
            'common/footer',
            'common/header'
        );

        $this->response->setOutput($this->render());
    }

    public function success() {
        if (isset($this->session->data['order_id'])) {
            $this->cart->clear();

            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['guest']);
            unset($this->session->data['comment']);
            unset($this->session->data['order_id']);
            unset($this->session->data['coupon']);
            unset($this->session->data['reward']);
            unset($this->session->data['voucher']);
            unset($this->session->data['vouchers']);
            unset($this->session->data['totals']);
        }

        $this->language->load('payment/tinkoff');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'href'      => $this->url->link('common/home'),
            'text'      => $this->language->get('text_home'),
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'href'      => $this->url->link('payment/tinkoff/failure'),
            'text'      => $this->language->get('text_payment'),
            'separator' => $this->language->get('text_separator')
        );

        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_message'] = sprintf($this->language->get('payment_success'), $this->url->link('information/contact'));
        
        $this->data['button_continue'] = $this->language->get('button_onmain');

        $this->data['continue'] = $this->url->link('common/home');

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/tinkoff_failure.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/payment/tinkoff_failure.tpl';
        } else {
            $this->template = 'default/template/payment/tinkoff_failure.tpl';
        }

        $this->children = array(
            'common/column_left',
            'common/column_right',
            'common/content_top',
            'common/content_bottom',
            'common/footer',
            'common/header'
        );

        $this->response->setOutput($this->render());
    }
}
?>