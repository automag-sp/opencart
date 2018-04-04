<?php
class ControllerShippingPickupAdvanced extends Controller
{
	private $error = array();
	
	public function index()
	{
		$this->load->language('shipping/pickup_advanced');
		
		$this->document->setTitle(strip_tags($this->language->get('heading_title')));
		
		$this->document->addStyle('view/stylesheet/pickup_advanced.css');
		$this->document->addStyle('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext,cyrillic');
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate())
		{
			$this->model_setting_setting->editSetting('pickup_advanced', $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$this->data['heading_title']          = strip_tags($this->language->get('heading_title'));
		
		$this->data['text_none']              = $this->language->get('text_none');
		$this->data['text_enabled']           = $this->language->get('text_enabled');
		$this->data['text_disabled']          = $this->language->get('text_disabled');
		$this->data['text_all_zones']         = $this->language->get('text_all_zones');
		$this->data['text_points']            = $this->language->get('text_points');
		$this->data['text_settings']          = $this->language->get('text_settings');
		$this->data['text_about_title']       = $this->language->get('text_about_title');
		$this->data['text_about_description'] = $this->language->get('text_about_description');
		
		$this->data['tab_settings']           = $this->language->get('tab_settings');
		$this->data['tab_points']             = $this->language->get('tab_points');
		$this->data['tab_about']              = $this->language->get('tab_about');
		
		$this->data['entry_title']            = $this->language->get('entry_title');
		$this->data['entry_description']      = $this->language->get('entry_description');
		$this->data['entry_link']             = $this->language->get('entry_link');
		$this->data['entry_link_text']        = $this->language->get('entry_link_text');
		$this->data['entry_link_status']      = $this->language->get('entry_link_status');
		$this->data['entry_cost']             = $this->language->get('entry_cost');
		$this->data['entry_null_cost']        = $this->language->get('entry_null_cost');
		$this->data['entry_null_cost_text']   = $this->language->get('entry_null_cost_text');
		$this->data['entry_weight']           = $this->language->get('entry_weight');
		$this->data['entry_relation']         = $this->language->get('entry_relation');
		$this->data['entry_tip_text']         = $this->language->get('entry_tip_text');
		$this->data['entry_percentage']       = $this->language->get('entry_percentage');
		$this->data['entry_geo_zone']         = $this->language->get('entry_geo_zone');
		$this->data['entry_group_points']     = $this->language->get('entry_group_points');
		$this->data['entry_status']           = $this->language->get('entry_status');
		$this->data['entry_sort_order']       = $this->language->get('entry_sort_order');
		$this->data['entry_action']           = $this->language->get('entry_action');
		$this->data['entry_sort_text']        = $this->language->get('entry_sort_text');
		$this->data['entry_status_text']      = $this->language->get('entry_status_text');
		
		$this->data['button_save']            = $this->language->get('button_save');
		$this->data['button_cancel']          = $this->language->get('button_cancel');
		$this->data['button_insert']          = $this->language->get('button_insert');
		$this->data['button_delete']          = $this->language->get('button_delete');
		
		if (isset($this->error['warning']))
		{
			$this->data['error_warning'] = $this->error['warning'];
		}
		else
		{
			$this->data['error_warning'] = '';
		}
		
		$this->data['breadcrumbs'] = array();
		
		$this->data['breadcrumbs'][] = array
		(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);
		
   		$this->data['breadcrumbs'][] = array
		(
			'text'      => $this->language->get('text_shipping'),
			'href'      => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
   		$this->data['breadcrumbs'][] = array
		(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('shipping/pickup_advanced', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$this->data['action'] = $this->url->link('shipping/pickup_advanced', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		foreach ($this->data['languages'] as $language)
		{
			if ($language['filename'] == 'russian')
			{
				$this->data['pickup_advanced_settings'][$language['language_id']]['title']     = 'Самовывоз';
				$this->data['pickup_advanced_settings'][$language['language_id']]['null_cost'] = 'Бесплатно';
				
				$this->data['pickup_advanced_module'][$language['language_id']]['description'] = 'Самовывоз, площадь Независимости ';
				$this->data['pickup_advanced_module'][$language['language_id']]['link']        = 'http://maps.yandex.ua/-/CVBZFIo1';
				$this->data['pickup_advanced_module'][$language['language_id']]['link_text']   = 'посмотреть на карте';
			}
			
			if ($language['filename'] == 'english')
			{
				$this->data['pickup_advanced_settings'][$language['language_id']]['title']     = 'Pickup';
				$this->data['pickup_advanced_settings'][$language['language_id']]['null_cost'] = 'Free';
				
				$this->data['pickup_advanced_module'][$language['language_id']]['description'] = 'Pickup, 150 London Wall ';
				$this->data['pickup_advanced_module'][$language['language_id']]['link']        = 'http://goo.gl/maps/z6ba3';
				$this->data['pickup_advanced_module'][$language['language_id']]['link_text']   = 'see on map';
			}
		}
		
		if (isset($this->request->post['pickup_advanced_settings']))
		{
			$this->data['pickup_advanced_settings'] = $this->request->post['pickup_advanced_settings'];
		}
		elseif ($this->config->get('pickup_advanced_settings'))
		{
			$this->data['pickup_advanced_settings'] = $this->config->get('pickup_advanced_settings');
		}
		
		if (isset($this->request->post['pickup_advanced_null_cost']))
		{
			$this->data['pickup_advanced_null_cost'] = $this->request->post['pickup_advanced_null_cost'];
		}
		elseif ($this->config->has('pickup_advanced_null_cost'))
		{
			$this->data['pickup_advanced_null_cost'] = $this->config->get('pickup_advanced_null_cost');
		}
		else
		{
			$this->data['pickup_advanced_null_cost'] = 1;
		}
		
		if (isset($this->request->post['pickup_advanced_group_points']))
		{
			$this->data['pickup_advanced_group_points'] = $this->request->post['pickup_advanced_group_points'];
		}
		elseif ($this->config->has('pickup_advanced_group_points'))
		{
			$this->data['pickup_advanced_group_points'] = $this->config->get('pickup_advanced_group_points');
		}
		else
		{
			$this->data['pickup_advanced_group_points'] = 1;
		}
		
		if (isset($this->request->post['pickup_advanced_status']))
		{
			$this->data['pickup_advanced_status'] = $this->request->post['pickup_advanced_status'];
		}
		elseif ($this->config->has('pickup_advanced_status'))
		{
			$this->data['pickup_advanced_status'] = $this->config->get('pickup_advanced_status');
		}
		else
		{
			$this->data['pickup_advanced_status'] = 1;
		}
		
		if (isset($this->request->post['pickup_advanced_sort_order']))
		{
			$this->data['pickup_advanced_sort_order'] = $this->request->post['pickup_advanced_sort_order'];
		}
		elseif ($this->config->has('pickup_advanced_sort_order'))
		{
			$this->data['pickup_advanced_sort_order'] = $this->config->get('pickup_advanced_sort_order');
		}
		else
		{
			$this->data['pickup_advanced_sort_order'] = 1;
		}
		
		$this->data['modules'] = array();
		
		if (isset($this->request->post['pickup_advanced_module']))
		{
			$this->data['modules'] = $this->request->post['pickup_advanced_module'];
		}
		elseif ($this->config->get('pickup_advanced_module'))
		{
			$this->data['modules'] = $this->config->get('pickup_advanced_module');
		}
		
		$this->load->model('localisation/geo_zone');
		
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		$this->template = 'shipping/pickup_advanced.tpl';
		$this->children = array
		(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
	}
	
	private function validate()
	{
		if (!$this->user->hasPermission('modify', 'shipping/pickup_advanced'))
		{
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function install()
	{
		$this->load->model('shipping/pickup_advanced');
		$this->model_shipping_pickup_advanced->install();
	}
}
?>
