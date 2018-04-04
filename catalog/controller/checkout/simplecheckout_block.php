<?php
/*
@author	Dmitriy Kubarev
@link	http://www.simpleopencart.com
@link	http://www.opencart.com/index.php?route=extension/extension/info&extension_id=4811
*/  

require_once(DIR_SYSTEM . 'library/simple/simple.php');

class ControllerCheckoutSimpleCheckoutBlock extends Controller { 
    public function index() {
        $default_blocks = array('simplecheckout_shipping','simplecheckout_payment','simplecheckout_cart','simplecheckout_customer');

        $block = isset($this->request->get['block']) ? trim($this->request->get['block']) : '';
    
        if ($block) {    
            $this->simple = new Simple($this->registry);

            $this->getChild('checkout/simplecheckout_cart/update');
            $this->getChild('checkout/simplecheckout_customer/update');

            $simplecheckout_shipping = $this->getChild('checkout/simplecheckout_shipping');
            $simplecheckout_payment  = $this->getChild('checkout/simplecheckout_payment');
            $simplecheckout_cart     = $this->getChild('checkout/simplecheckout_cart');
            $simplecheckout_customer = $this->getChild('checkout/simplecheckout_customer');

            if (!in_array($block, $default_blocks)) {
                $this->response->setOutput($this->getChild('module/'.$block, array('limit' => 5, 'width' => 100, 'height' => 100, 'banner_id' => 6)));
            } else {
                $this->response->setOutput($$block);
            }
        }
    }
}


?>