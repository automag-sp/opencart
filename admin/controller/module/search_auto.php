<?php
class ControllerModuleSearchAuto extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('module/search_auto');

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/search_auto.css');
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('search_auto', $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_search_tire'] = $this->language->get('text_search_tire');
		$this->data['text_search_disc'] = $this->language->get('text_search_disc');
		$this->data['text_search_auto'] = $this->language->get('text_search_auto');
		$this->data['entry_tire_width'] = $this->language->get('entry_tire_width');
		$this->data['entry_tire_height'] = $this->language->get('entry_tire_height');
		$this->data['entry_tire_diameter'] = $this->language->get('entry_tire_diameter');
		$this->data['entry_tire_seasons'] = $this->language->get('entry_tire_seasons');
		$this->data['entry_tire_category'] = $this->language->get('entry_tire_category');
		$this->data['entry_disc_width'] = $this->language->get('entry_disc_width');
		$this->data['entry_disc_diameter'] = $this->language->get('entry_disc_diameter');
		$this->data['entry_disc_pcd'] = $this->language->get('entry_disc_pcd');
		$this->data['entry_disc_dia'] = $this->language->get('entry_disc_dia');
		$this->data['entry_disc_et'] = $this->language->get('entry_disc_et');
		$this->data['entry_disc_category'] = $this->language->get('entry_disc_category');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_forms'] = $this->language->get('entry_forms');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
		//--- get all attributes -----------------------------------------------
		$this->load->model('catalog/attribute_group');
		$this->load->model('catalog/attribute');

        $attributes = array();

		$data = array(
			'sort'  => 'ag.sort_order',
			'order' => 'ASC',
			'start' => 0,
			'limit' => 100
		);
		
		$attr_groups = $this->model_catalog_attribute_group->getAttributeGroups($data);
		
		foreach ($attr_groups as $group) {
			$data = array(
                'filter_attribute_group_id' => $group['attribute_group_id'],
    			'sort'  => 'a.sort_order',
	    		'order' => 'ASC',
    	    	'start' => 0,
    		    'limit' => 100
    	    );

            $items = array();

    		$results = $this->model_catalog_attribute->getAttributes($data);
    		
			foreach ($results as $result) {
		        $items[] = array(
			        'attribute_id'    => $result['attribute_id'],
				    'attribute_name'  => $result['name'],
			    );
            }

            $attributes[] = array(
                'group_id'   => $group['attribute_group_id'],
                'group_name' => $group['name'],
                'items'      => $items
            );
        }
		$this->data['attributes'] = $attributes;
		//----------------------------------------------------------------------
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
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
			'href'      => $this->url->link('module/search_auto', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/search_auto', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['modules'] = array();

		if (isset($this->request->post['search_auto_module'])) {
			$this->data['modules'] = $this->request->post['search_auto_module'];
		} elseif ($this->config->get('search_auto_module')) { 
			$this->data['modules'] = $this->config->get('search_auto_module');
		}
		
		if (isset($this->request->post['search_auto_module_setting'])) {
			$this->data['tire_width'] = $this->request->post['search_auto_module_setting']['tire']['width'];
			$this->data['tire_height'] = $this->request->post['search_auto_module_setting']['tire']['height'];
			$this->data['tire_diameter'] = $this->request->post['search_auto_module_setting']['tire']['diameter'];
			$this->data['tire_seasons'] = $this->request->post['search_auto_module_setting']['tire']['seasons'];
			
			if(isset($this->request->post['search_auto_module_setting']['tire']['category'])) {
				$this->data['tire_category'] = $this->request->post['search_auto_module_setting']['tire']['category'];
			} else {
				$this->data['tire_category'] = '';
			}
			
			$this->data['disc_width'] = $this->request->post['search_auto_module_setting']['disc']['width'];
			$this->data['disc_diameter'] = $this->request->post['search_auto_module_setting']['disc']['diameter'];
			$this->data['disc_pcd'] = $this->request->post['search_auto_module_setting']['disc']['pcd'];
			$this->data['disc_dia'] = $this->request->post['search_auto_module_setting']['disc']['dia'];
			$this->data['disc_et'] = $this->request->post['search_auto_module_setting']['disc']['et'];
			
			if(isset($this->request->post['search_auto_module_setting']['disc']['category'])) {
				$this->data['disc_category'] = $this->request->post['search_auto_module_setting']['disc']['category'];
			} else {
				$this->data['disc_category'] = '';
			}
		} elseif ($this->config->get('search_auto_module_setting')) { 
			$setting = $this->config->get('search_auto_module_setting');
			
			$this->data['tire_width'] = $setting['tire']['width'];
			$this->data['tire_height'] = $setting['tire']['height'];
			$this->data['tire_diameter'] = $setting['tire']['diameter'];
			$this->data['tire_seasons'] = $setting['tire']['seasons'];
			$this->data['tire_category'] = $setting['tire']['category'];
			$this->data['disc_width'] = $setting['disc']['width'];
			$this->data['disc_diameter'] = $setting['disc']['diameter'];
			$this->data['disc_pcd'] = $setting['disc']['pcd'];
			$this->data['disc_dia'] = $setting['disc']['dia'];
			$this->data['disc_et'] = $setting['disc']['et'];
			$this->data['disc_category'] = $setting['disc']['category'];
		} else {
			$this->data['tire_width'] = '';
			$this->data['tire_height'] = '';
			$this->data['tire_diameter'] = '';
			$this->data['tire_seasons'] = '';
			$this->data['tire_category'] = '';
			$this->data['tire_status'] = '';
			$this->data['disc_width'] = '';
			$this->data['disc_diameter'] = '';
			$this->data['disc_pcd'] = '';
			$this->data['disc_dia'] = '';
			$this->data['disc_et'] = '';
			$this->data['disc_category'] = '';
			$this->data['disc_status'] = '';
			$this->data['auto_status'] = '';
		}
		
		$this->load->model('catalog/category');
		
		$this->data['categories'] = $this->model_catalog_category->getCategories(0);
		
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->template = 'module/search_auto.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/search_auto')) {
			$this->error['warning'] = $this->language->get('error_permission');
		} else if($this->request->post['search_auto_module_setting']['disc']['category'] == '-' ||
			$this->request->post['search_auto_module_setting']['disc']['width'] == '-' ||
			$this->request->post['search_auto_module_setting']['disc']['diameter'] == '-' ||
			$this->request->post['search_auto_module_setting']['disc']['pcd'] == '-' ||
			$this->request->post['search_auto_module_setting']['disc']['dia'] == '-' ||
			$this->request->post['search_auto_module_setting']['disc']['et'] == '-' ||
			
			$this->request->post['search_auto_module_setting']['tire']['category'] == '-' ||
			$this->request->post['search_auto_module_setting']['tire']['width'] == '-' ||
			$this->request->post['search_auto_module_setting']['tire']['height'] == '-' ||
			$this->request->post['search_auto_module_setting']['tire']['diameter'] == '-' ||
			$this->request->post['search_auto_module_setting']['tire']['seasons'] == '-') {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>