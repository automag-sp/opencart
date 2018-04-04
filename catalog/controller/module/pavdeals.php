<?php
class ControllerModulePavdeals extends Controller {
	protected function index($setting) {
		static $module = 0;
		$this->language->load('module/pavdeals');
		$this->load->model('tool/image');
		$this->load->model( 'pavdeals/product' );
		$this->load->model( 'catalog/product' );
		$default = $this->model_pavdeals_product->getDefaultSetting();

		$general_setting = $this->config->get("pavdeals_config");
		
		if(isset($general_setting)){
			$setting = array_merge($general_setting, $setting);	
		}

		if(!empty($setting)){
			$setting = array_merge($default, $setting);
		}else{
			$setting = $default;
		}

		$theme = isset($setting['theme'])?$setting['theme']:"default";
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/pavdeals.css')) {
			$this->document->addStyle('catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/pavdeals.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/pavdeals.css');
		}
		$this->document->addScript('catalog/view/javascript/pavdeals/countdown.js');

		/*Removed when install on pavotheme
		$this->document->addStyle('catalog/view/theme/default/stylesheet/bootstrap.css');
		$this->document->addScript('catalog/view/javascript/jquery/bootstrap/bootstrap.min.js');
		/*End*/

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
         	$this->data['base'] = $this->config->get('config_ssl');
	    } else {
	        $this->data['base'] = $this->config->get('config_url');
	    }

	    if( isset($setting['description'][$this->config->get('config_language_id')]) ) {
			$this->data['message'] = html_entity_decode($setting['description'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');
		}else {
			$this->data['message'] = '';
		}
	    $deal_type = isset($setting['deal_type'])?$setting['deal_type']:'latest';//latest | today deals | category
	    $this->data['button_cart'] = $this->language->get('button_cart');
	    $this->data['limit'] = isset($setting['limit'])?(int)$setting['limit']:10;
	    $this->data['prefix'] = isset($setting['prefix'])?$setting['prefix']:'';
		$this->data['width'] = $setting['width'];
		$this->data['height'] = $setting['height'];
		$this->data['auto_play'] = $setting['auto_play']?"true":"false";
		$this->data['auto_play_mode'] = $setting['auto_play_mode'];
		$this->data['interval'] = (int)$setting['interval'];
		$this->data['cols']   = (int)$setting['cols'];
		$this->data['itemsperpage']   = (int)$setting['itemsperpage'];
		$sorting = isset($setting['sort_deals'])?$setting['sort_deals']:'p.date_added__desc';
		$tmp = explode("__",$sorting);
		$categories = isset($setting['category_ids'])?$setting['category_ids']:'0';
		$start_date = isset($setting['date_start'])?$setting['date_start']:'';
		$to_date = isset($setting['date_to'])?$setting['date_to']:'';
		if(empty($start_date)){
			$start_date = "0000-00-00";
		}
		if(empty($to_date)){
			$to_date = date("Y-m-d");
		}
	    $data = array(  
	    				'start_date' => $start_date,
	    				'to_date' => $to_date,
	    				'filter_categories' => $categories,
	    				'sort'=> $tmp[0],
	    				'order'=> $tmp[1],
	    				'start' => 0,
	    				'limit'=>$this->data['limit']);
	    $results = $this->model_pavdeals_product->getProductSpecials($data);
	    $products = array();
		foreach ($results as $result) {
			$products[] = $this->getItemDeal($result, $setting);
		}

		if (empty($products)) {
			return;
		}
		
		$this->data['products'] = $products;
	    $this->data['heading_title'] = $this->language->get($deal_type."_deals_title");
		$this->data['module'] = $module++;
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavdeals/carousel_deals.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/pavdeals/carousel_deals.tpl';
		} else {
			$this->template = 'default/template/module/pavdeals/carousel_deals.tpl';
		}

		$this->render();
	}
	
	public function getItemDeal($product = null, $setting = array()){

		if(is_numeric($product)){
			$product = $this->model_catalog_product->getProduct((int)$product);
		}
		$deal = $this->model_pavdeals_product->getDeal($product);
		if(!$deal)
			 return false;

		$order_status_id = isset($setting['order_status_id'])?(int)$setting['order_status_id']:5;
		$bought = $this->model_pavdeals_product->getTotalBought($deal['product_id'], $order_status_id );
		$bought = empty($bought)?0:$bought;
		$save_price = (float)$deal['price'] - (float)$deal['special'];
		$discount = round(($save_price/$deal['price'])*100);
		$save_price = $this->currency->format($this->tax->calculate($save_price, $deal['tax_class_id'], $this->config->get('config_tax')));
		if ($deal['image'] && isset($setting['width']) && $setting['height']) {
			$image = $this->model_tool_image->resize($deal['image'], $setting['width'], $setting['height']);
		} else {
			$image = false;
		}
					
		if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
			$price = $this->currency->format($this->tax->calculate($deal['price'], $deal['tax_class_id'], $this->config->get('config_tax')));
		} else {
			$price = false;
		}
				
		if ((float)$deal['special']) {
			$special = $this->currency->format($this->tax->calculate($deal['special'], $deal['tax_class_id'], $this->config->get('config_tax')));
			$saleoff = floor((($deal['price']-$deal['special'])/$deal['price'])*100);
		} else {
			$special = false;
		}
		
		if ($this->config->get('config_review_status')) {
			$rating = $deal['rating'];
		} else {
			$rating = false;
		}
		$date_end_string = isset($deal['date_end'])?$deal['date_end']:"";

		$product = array(
			'product_id' => $deal['product_id'],
			'deal_discount' 	 => $discount,
			'bought'	 => $bought,
			'thumb'   	 => $image,
			'name'    	 => $deal['name'],
			'quantity'	 => $deal['quantity'],
			'price'   	 => $price,
			'special' 	 => $special,
			'saleoff' 	 => isset($saleoff)?$saleoff.'%':0,
			'rating'     => $rating,
			'save_price' => $save_price,
			'date_end_string' => $date_end_string,
			'date_end'	 => explode("-", $date_end_string),
			'description'=> (html_entity_decode($deal['description'], ENT_QUOTES, 'UTF-8')),
			'reviews'    => sprintf($this->language->get('text_reviews'), (int)$deal['reviews']),
			'href'    	 => $this->url->link('product/product', 'product_id=' . $deal['product_id']),
		);
		return $product;
	}
	public function pavdeal($product = null){
		static $module = 0;
		/*If current page is product detail, show deal item*/
		$route = isset($this->request->get['route'])?$this->request->get['route']:"";
		$is_product_detail = false;
		if($route == "product/product"){
			if(empty($product))
				$product = isset($this->request->get['product_id'])?$this->request->get['product_id']:"0";
			
			$is_product_detail = true;
		}
		
		/*End if*/
		if(empty($product)) 
			return;
		$this->language->load('module/pavdeals');
		$this->load->model('tool/image');
		$this->load->model( 'pavdeals/product' );
		$this->load->model( 'catalog/product' );
		$default = $this->model_pavdeals_product->getDefaultSetting();

		$setting = $this->config->get("pavdeals_config");
		if(is_numeric($product)){
			$product = $this->model_catalog_product->getProduct((int)$product);
		}
		if(!empty($setting)){
			$setting = array_merge($default, $setting);
		}else{
			$setting = $default;
		}
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
         	$this->data['base'] = $this->config->get('config_ssl');
	    } else {
	        $this->data['base'] = $this->config->get('config_url');
	    }
		$theme = isset($setting['theme'])?$setting['theme']:"default";
		if(!defined("PAVDEALS_LOADED_ASSETS")){
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/pavdeals.css')) {
				$this->data['style'] = 'catalog/view/theme/'.$this->config->get('config_template').'/stylesheet/pavdeals.css';
			} else {
				$this->data['style'] = 'catalog/view/theme/default/stylesheet/pavdeals.css';
			}
			$this->data['script'] = 'catalog/view/javascript/pavdeals/countdown.js';
			define("PAVDEALS_LOADED_ASSETS", 1);
		}	

		if($is_product_detail){
			$this->data['saleoff_icon'] = $this->model_tool_image->resize( $setting['saleoff_icon'], $setting['icon_width'], $setting['icon_height']);
		}

		$this->data['module'] = "deal".$module++;
		$this->data['product'] = $this->getItemDeal($product, $setting);

		if($is_product_detail){
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavdeals/product_deal_detail.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/pavdeals/product_deal_detail.tpl';
			} else {
				$this->template = 'default/template/module/pavdeals/product_deal_detail.tpl';
			}
			$output = $this->render();
		}else{
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavdeals/item_deal.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/pavdeals/item_deal.tpl';
			} else {
				$this->template = 'default/template/module/pavdeals/item_deal.tpl';
			}
			$output = $this->render();
		}
		return $output;
	}
}
	
?>
