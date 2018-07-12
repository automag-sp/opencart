<?php
class Controllerpaymenttinkoff extends Controller {
    protected function index() {
        $this->load->model('payment/tinkoff');
        $this->language->load('payment/tinkoff');
        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
        $temp_sum = $this->currency->format($order_info['total'],$order_info['currency_code'],$order_info['currency_value'],false);
        //$sum = $this->currency->convert($temp_sum,$order_info['currency_code'],'RUB')*100;
        $sum = round($temp_sum, 2) * 100;
        $this->data['payment'] = $this->model_payment_tinkoff->initPayment(array(
            'amount' => $sum,
            'orderId' => $this->session->data['order_id'],
            'email' => $order_info['email'],
            'phone' => $order_info['telephone'],
        ));

        $this->data['payButton'] = $this->language->get('pay_button');

        $this->template = 'default/template/payment/tinkoff_checkout.tpl';

        $this->render();
    }

    public function notification() {
        $this->load->model('payment/tinkoff');
        $request = (array) json_decode(file_get_contents('php://input')); 

        $this->model_payment_tinkoff->checkNotification($request);

        try {

        } catch (Exception $e) {
            die('Something went wrong');
        }

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