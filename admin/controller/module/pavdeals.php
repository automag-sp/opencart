<?php
class ControllerModulePavdeals extends Controller {
	private $error = array();

	public function index() {

		$this->language->load('module/pavdeals');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		$this->load->model('catalog/category');

		$this->load->model('tool/image');

		$this->load->model('localisation/order_status');

		$this->document->addScript('view/javascript/pavdeals/jquery-cookie.js');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$action = $this->request->post['pavdeals_module']['action'];

			$store_id = $this->request->post['pavdeals_module']['store_id'];
			$surl = isset($store_id)?'&store_id='.$store_id:'';

			unset( $this->request->post['pavdeals_module']['action']);
			unset( $this->request->post['pavdeals_module']['store_id']);
			unset( $this->request->post['pavdeals_module']['stores']);

			$this->model_setting_setting->editSetting('pavdeals', $this->request->post, $store_id);

			$this->session->data['success'] = $this->language->get('text_success');

			if( $action == 'saveedit' ){
				$this->redirect($this->url->link('module/pavdeals', 'token=' . $this->session->data['token'].$surl, 'SSL'));
			}else {		
				$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
			}
		}
    	
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['token'] = $this->session->data['token'];
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');

		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_username'] = $this->language->get('entry_username');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
    	$this->data['entry_width_height'] = $this->language->get('entry_width_height');
    	$this->data['entry_image_selector']	= $this->language->get('entry_image_selector');
    	$this->data['entry_image_selector_help'] = $this->language->get('entry_image_selector_help');
    	$this->data['entry_additional_width_height'] = $this->language->get('entry_additional_width_height');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
    	$this->data['tab_module'] = $this->language->get('tab_module');

    	// Start GetData Store
		$this->load->model('setting/store');
		$action = array();
		$action[] = array(
			'text' => $this->language->get('text_edit'),
			'href' => $this->url->link('setting/setting', 'token=' . $this->session->data['token'], 'SSL')
		);
		$store_default = array(
			'store_id' => 0,
			'name'     => $this->config->get('config_name') . $this->language->get('text_default'),
			'url'      => HTTP_CATALOG,
		);
		$stores = $this->model_setting_store->getStores();
		array_unshift($stores, $store_default);
		
		foreach ($stores as &$store) {
			$url = '';
			if ($store['store_id'] > 0 ) {
				$url = '&store_id='.$store['store_id'];
			}
			$store['option'] = $this->url->link('module/pavdeals', $url.'&token=' . $this->session->data['token'], 'SSL');
		}
		$this->data['stores'] = $stores;
		$store_id = isset($this->request->get['store_id'])?$this->request->get['store_id']:0;
		$this->data['store_id'] = $store_id;
		// End GetData Store

    	$this->data['default_values'] = array();
		
		$this->data['today_deals'] = array(
			'10' => '10 '.$this->language->get('entry_day_deals'), 
			'15' => '15 '.$this->language->get('entry_day_deals'), 
			'30' => '30 '.$this->language->get('entry_day_deals'), 
			'45' => '45 '.$this->language->get('entry_day_deals'), 
			'88' => $this->language->get('entry_in_today_deals'), 
			'99' => $this->language->get('value_specific')
		);
    	
		$this->data['positions'] = array( 'mainmenu',
										  'slideshow',
										  'promotion',
										  'content_top',
										  'column_left',
										  'column_right',
										  'content_bottom',
										  'mass_bottom',
										  'footer_top',
										  'footer_center',
										  'footer_bottom',
										  'product_extra'
		);
   		$categories = $this->model_catalog_category->getCategories(array());
   		$this->data['categories'] = array();
		$this->data['categories'][] = array('category_id'=>0, 'name' => $this->language->get('all_categories') );
   		$this->data['categories'] = array_merge($this->data['categories'], $categories);
   		$this->data['sortdeals'] = array('pd.name__desc'=>$this->language->get("text_name_desc"),
   											'pd.name__asc'=>$this->language->get("text_name_asc"),
   											'p.date_added__desc'=>$this->language->get("text_date_added_desc"),
   											'p.date_added__asc'=>$this->language->get("text_date_added_asc"),
											'p.model__desc'=>$this->language->get("text_model_desc"),
											'p.model__asc'=>$this->language->get("text_model_asc"),
											'ps.price__desc'=>$this->language->get("text_price_desc"),
											'ps.price__asc'=>$this->language->get("text_price_asc"),
											'rating__desc'=>$this->language->get("text_rating_desc"),
											'p.sort_order__asc'=>$this->language->get("text_sort_order_asc"),
											'p.sort_order__desc'=>$this->language->get("text_sort_order_desc"));
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
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
			'href'      => $this->url->link('module/pavdeals', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = $this->url->link('module/pavdeals', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();

		if (isset($this->request->post['pavdeals_module'])) {
			$this->data['modules'] = $this->request->post['pavdeals_module'];
		} else {
			$setting = $this->model_setting_setting->getSetting("pavdeals", $store_id);
			$this->data['modules'] = isset($setting['pavdeals_module'])?$setting['pavdeals_module']:array();
		}
		$this->data['yesno'] = array(0=>$this->language->get('text_no'),1=>$this->language->get('text_yes'));
		$this->data['general'] = $this->config->get('pavdeals_config');
		$this->data['general']['saleoff_icon'] = isset($this->data['general']['saleoff_icon'])?$this->data['general']['saleoff_icon']:"data/saleoff.png";
		$this->data['bg_thumb'] = $this->model_tool_image->resize( $this->data['general']['saleoff_icon'], 150, 150);
		$this->data['no_image'] =  $this->model_tool_image->resize('no_image.jpg', 180, 180);
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

    	$general_params = array();

		$this->load->model('design/layout');

		$this->data['layouts'] = array();
		$this->data['layouts'][] = array('layout_id'=>99999, 'name' => $this->language->get('all_page') );

		$this->data['layouts'] = array_merge($this->data['layouts'],$this->model_design_layout->getLayouts());

		$this->load->model('design/banner');

		$this->data['banners'] = $this->model_design_banner->getBanners();

		$this->template = 'module/pavdeals.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/pavdeals')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post['pavdeals_module'])) {

		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>
