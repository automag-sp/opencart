<?php

include('TinkoffMerchantAPI.php');

class Modelpaymenttinkoff extends Model
{
    public function getMethod($address, $total)
    {
        $this->language->load('payment/tinkoff');

        return array(
            'code' => 'tinkoff',
            'title' => $this->language->get('text_title'),
            'sort_order' => $this->config->get('sagepay_us_sort_order')
        );
    }

    /**
     * After calling initPayment()
     */
    const STATUS_NEW = 'NEW';

    /**
     * After calling cancelPayment()
     * Not Implemented here
     */
    const STATUS_CANCELED = 'CANCELED';

    /**
     * Intermediate status (transaction is in process)
     */
    const STATUS_PREAUTHORIZING = 'PREAUTHORIZING';

    /**
     * After showing payment form to the customer
     */
    const STATUS_FORMSHOWED = 'FORMSHOWED';

    /**
     * Intermediate status (transaction is in process)
     */
    const STATUS_AUTHORIZING = 'AUTHORIZING';

    /**
     * Intermediate status (transaction is in process)
     * Customer went to 3DS
     */
    const STATUS_THREEDSCHECKING = 'THREEDSCHECKING';

    /**
     * Payment rejected on 3DS
     */
    const STATUS_REJECTED = 'REJECTED';

    /**
     * Payment compete, money holded
     */
    const STATUS_AUTHORIZED = 'AUTHORIZED';

    /**
     * After calling reversePayment
     * Charge money back to customer
     * Not Implemented here
     */
    const STATUS_REVERSING = 'REVERSING';

    /**
     * Money charged back, transaction cmplete
     */
    const STATUS_REVERSED = 'REVERSED';

    /**
     * After calling confirmePayment()
     * Confirm money wright-off
     * Not Implemented here
     */
    const STATUS_CONFIRMING = 'CONFIRMING';

    /**
     * Money written off
     */
    const STATUS_CONFIRMED = 'CONFIRMED';

    /**
     * After calling refundPayment()
     * Retrive money back to customer
     * Not Implemented here
     */
    const STATUS_REFUNDING = 'REFUNDING';

    /**
     * Money is back on the customer account
     */
    const STATUS_REFUNDED = 'REFUNDED';

    const STATUS_UNKNOWN = 'UNKNOWN';

    /**
     * Terminal id, bank give it to you
     * @var int
     */
    private $terminalId;

    /**
     * Secret key, bank give it to you
     * @var string
     */
    private $secret;

    /**
     * Read API documentation
     * @var string
     */
    private $paymentUrl;

    /**
     * Current payment status
     * @var string
     */
    private $paymentStatus;

    /**
     * Payment id in bank system
     * @var int
     */
    private $paymentId;

    /**
     * Валюта заказа (643 - рубли)
     * @var int
     */
    private $currency = 643;

    public function __construct($registry)
    {
        parent::__construct($registry);

        $this->terminalId = $this->config->get('terminal_key');
        $this->secret = $this->config->get('secret_key');
        $this->currency = $this->config->get('currency');
    }

    /**
     * Return payment link for user redirection and params for it
     *
     * @param array $params
     * @return array
     * @throws TinkoffException
     */
    public function initPayment(array $params)
    {
        $productItems = array();

        $check_tax = $this->config->get('tinkoff_check_tax') === 'check' ? 'checked' : 'error';

        $errorTaxMessage = 'Не удалось получить данные о налоге на товар. Проверьте настройки.';
        $shippingMethod = isset($this->session->data['shipping_method']) ? $this->session->data['shipping_method'] : 'none';
        $prices = $this->getNormalizePrices($params['amount'], $this->cart->getProducts(), $shippingMethod != 'none' ? $shippingMethod : null);

        if ($shippingMethod != 'none') {
            $taxClassRatesShipping = $this->tax->getRates($shippingMethod['cost'], $shippingMethod['tax_class_id']);
            $shippingRate = array_shift($taxClassRatesShipping);
            $shippingRate = (int)$shippingRate['rate'];
            $shippingPrice = $prices['shipping'];
            switch ($shippingRate) {
                case 0:
                    $taxS = 'vat0';
                    break;
                case 10:
                    $taxS = 'vat10';
                    break;
                case 18:
                    $taxS = 'vat18';
                    break;
                default:
                    if ($check_tax == 'checked') {
                        die($errorTaxMessage);
                    }
                    break;
            }
        }

        $this->load->model('checkout/order');
        $errorTaxationMessage = 'Не удалось получить данные о системе налогобложения. Проверьте настройки.';

        foreach ($this->cart->getProducts() as $product) {
            if (!$product['tax_class_id']) {
                $tax = 'none';
            } else {
                $taxClassRates = $this->tax->getRates($product['price'], $product['tax_class_id']);

                if (count($taxClassRates) > 1 && $check_tax == 'checked') {
                    die($errorTaxMessage);
                }

                $rate = array_shift($taxClassRates);

                $tax = '';
                if ($rate['type'] == 'P') {
                    switch ((int)$rate['rate']) {
                        case 0:
                            $tax = 'vat0';
                            break;
                        case 10:
                            $tax = 'vat10';
                            break;
                        case 18:
                            $tax = 'vat18';
                            break;
                        default:
                            if ($check_tax == 'checked') {
                                die($errorTaxMessage);
                            }
                            break;
                    }
                } else {
                    if ($check_tax == 'checked') {
                        die($errorTaxMessage);
                    }
                }
            }

            $productPrices = $prices['products'];
            $id = $product['product_id'];

            $productItem = array(
                'Name' => mb_substr($product['name'],0,64),
                'Price' => $productPrices[$id],
                'Quantity' => $product['quantity'],
                'Amount' => $productPrices[$id] * $product['quantity'],
                'Tax' => $tax,
            );
            array_push($productItems, $productItem);
        }

        if ($shippingMethod != 'none') {
            $shippingItem = array(
                'Name' => mb_substr($shippingMethod['title'],0,64),
                'Price' => $shippingPrice,
                'Quantity' => 1,
                'Amount' => $shippingPrice,
                'Tax' => $taxS,
            );
            if ($shippingPrice > 0) {
                array_push($productItems, $shippingItem);
            }
        }

        if ($check_tax == 'checked' && $this->config->get('tinkoff_taxation') == 'error') {
            die($errorTaxationMessage);
        }

        $receipt = array(
            'Email' => $params['email'],
            'Phone' => $params['phone'],
            'Taxation' => $this->config->get('tinkoff_taxation'),
            'Items' => $productItems,
        );

        if ($check_tax == 'checked') {
            $requestParams = array(
                'TerminalKey' => $this->terminalId,
                'Amount' => $params['amount'],
                'OrderId' => $params['orderId'],
                'DATA' => array('Email' => $params['email'], 'Connection_type' => 'opencart 1.5',),
                'Receipt' => $receipt,
            );
        } else {
            $requestParams = array(
                'TerminalKey' => $this->terminalId,
                'Amount' => $params['amount'],
                'OrderId' => $params['orderId'],
                'DATA' => array('Email' => $params['email'], 'Connection_type' => 'opencart 1.5',),
            );
        }

        $tinkoffModel = new TinkoffMerchantAPI($this->terminalId, $this->secret);
        $request = $tinkoffModel->buildQuery('Init', $requestParams);
        $this->logs($requestParams, $request);
        $result = (array)json_decode($request);

        if ($result['ErrorCode'] == 8) {
            die($result['Details']);
        }

        $url = parse_url($result['PaymentURL']);

        $urlParams = array();
        if (isset($url['query'])) {
            parse_str($url['query'], $urlParams);
        }

        $this->paymentStatus = $result['Status'];
        $this->paymentId = $result['PaymentId'];

        $this->saveOrder($params['orderId']);

        return array(
            'url' => $result['PaymentURL'],
            'params' => $urlParams,
        );
    }

    function logs($requestParams, $request)
    {
        // log send
        $log = '[' . date('D M d H:i:s Y', time()) . '] ';
        $log .= json_encode($requestParams, JSON_UNESCAPED_UNICODE);
        $log .= "\n";
        file_put_contents(dirname(__FILE__) . "/tinkoff.log", $log, FILE_APPEND);

        $log = '[' . date('D M d H:i:s Y', time()) . '] ';
        $log .= $request;
        $log .= "\n";
        file_put_contents(dirname(__FILE__) . "/tinkoff.log", $log, FILE_APPEND);
    }

    function getNormalizePrices($amount, $products, $shipping)
    {
        $prices = array();
        $realAmount = round($this->getRealAmount() * 100);
        $k = ($realAmount != $amount) ? $amount / $realAmount : 1;

        $newRealAmount = 0;

        foreach ($products as $product) {
            $id = $product['product_id'];
            $price = $this->getRoundTaxPrice($product['price'], $product['tax_class_id'], $k);
            $prices['products'][$id] = $price;
            $newRealAmount += $price * $product['quantity'];
        }

        $shippingPrice = $this->getRoundTaxPrice($shipping['cost'], $shipping['tax_class_id'], $k);
        $newRealAmount = $newRealAmount + $shippingPrice;
        $diff = $amount - $newRealAmount;

        if (abs($diff) >= 0.1) {
            $shippingPrice = $shippingPrice + $diff;
        }

        $prices['shipping'] = $shippingPrice;

        return $prices;
    }

    /**
     * цена с ндс в копейках
     * @param $price
     * @param $taxClassId
     * normalize coefficient @param $k
     * @return float
     */
    function getRoundTaxPrice($price, $taxClassId, $k)
    {
        //сумма в копейках
        return round($this->getVatPrice($price, $taxClassId) * $k, 2) * 100;
    }

    /**
     * сумма позиций в цеке (всех товаров и доставки)
     * @return int
     */
    function getRealAmount()
    {
        $realAmount = 0;

        foreach ($this->cart->getProducts() as $product) {
            $price = $this->getVatPrice($product['price'], $product['tax_class_id']);
            $realAmount += $price * $product['quantity'];
        }

        if (isset($this->session->data['shipping_method'])) {
            $shippingData = $this->cart->session->data['shipping_method'];
            $shippingPrice = $this->getVatPrice($shippingData['cost'], $shippingData['tax_class_id']);
            $realAmount += $shippingPrice;
        }

        return $realAmount;
    }

    /**
     * цену с учетом ндс
     * @param $price
     * @param $vat
     * @return mixed
     */
    public function getVatPrice($price, $vat)
    {
        return $this->cart->tax->calculate($price, $vat, true);
    }

    /**
     * Recieves notification from TSC, checks is request valid.
     * Should OK in response
     *
     * @param array $params
     * @throws TinkoffException
     */
    public function checkNotification(array $params)
    {
        $requestParams = $params;
        unset($requestParams['Token']);
        $requestParams['Success'] = $requestParams['Success'] ? 'true' : 'false';

        $token = $this->generateToken($requestParams);

        if ($params['Token'] != $token) {
            die('NOTOK');
        }

        $this->isRequestSuccess($requestParams['Success']);

        $this->paymentStatus = $params['Status'];
        $this->paymentId = $params['PaymentId'];

        $this->saveOrder($params['OrderId']);

        $this->load->model('checkout/order');

        if ($this->isOrderPaid()) {
            $this->model_checkout_order->confirm($params['OrderId'], $this->config->get('order_status_success_id'));
        } elseif ($this->isOrderFailed()) {
            $this->model_checkout_order->confirm($params['OrderId'], $this->config->get('order_status_failed_id'));
        }
    }

    /**
     * Check if order is complete and money paid
     *
     * @return bool
     * @throws TinkoffException
     */
    public function isOrderPaid()
    {
        $this->checkStatus();

        return in_array($this->paymentStatus, array(self::STATUS_CONFIRMED, self::STATUS_AUTHORIZED));
    }

    /**
     * Checks if oreder is failed
     *
     * @return bool
     */
    public function isOrderFailed()
    {
        return in_array($this->paymentStatus, array(self::STATUS_CANCELED, self::STATUS_REJECTED, self::STATUS_REVERSED));
    }

    public function saveOrder($orderId)
    {
        $date = new \DateTime();

        $currentDate = $date->format('Y-m-d h:i:s');

        $orders = $this->db->query("
          SELECT `id`
          FROM " . DB_PREFIX . "tinkoff_payments
          WHERE `order_id` = '" . (int)$orderId . "'");

        if ($orders->num_rows > 0) {
            $this->db->query("
			    UPDATE " . DB_PREFIX . "tinkoff_payments
			    SET payment_id = '" . $this->paymentId . "',
				    updated = '" . $currentDate . "',
				    status = '" . $this->paymentStatus . "'
			    WHERE order_id = " . (int)$orderId
            );

            return true;
        }

        $this->db->query("
            INSERT INTO `" . DB_PREFIX . "tinkoff_payments`
            SET order_id = '" . (int)$orderId . "',
			    payment_id = '" . $this->paymentId . "',
			    created = '" . $currentDate . "',
				updated = '" . $currentDate . "',
				status = '" . $this->paymentStatus . "'
        ");

        return true;
    }

    /**
     * Check is status variable is set
     *
     * @throws TinkoffException
     */
    private function checkStatus()
    {
        if (is_null($this->paymentStatus)) {
            die(sprintf('Статус заказа не определён.'));
        }
    }

    /**
     * Check bank response format
     *
     * @param $string
     * @return bool
     */
    private function isJson($string)
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Generates request signature
     *
     * @param array $params
     * @return string
     */
    private function generateToken(array $params)
    {
        $requestParams = $params;
        $requestParams['Password'] = $this->secret;

        ksort($requestParams);

        $values = implode('', array_values($requestParams));

        return hash('sha256', $values);
    }

    /**
     * Checks request success
     *
     * @param $success
     * @throws TinkoffException
     */
    private function isRequestSuccess($success)
    {
        if ($success == false) {
            die(sprintf('Запрос к платежному сервису был отправлен некорректно'));;
        }
    }
}

/**
 * Class TinkoffException
 */
class TinkoffException extends Exception
{

}

?>