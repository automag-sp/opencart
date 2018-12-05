<?php
class ControllerModuleHtmlBlock extends Controller {
	private $error = array(); 
	
	public function index() {
	
		$this->document->addStyle('view/stylesheet/html_block.css');
		$this->load->language('module/html_block');

		$this->document->setTitle(strip_tags($this->language->get('heading_title')));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('html_block', $this->request->post);		
					
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
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_php_help'] = $this->language->get('text_php_help');
		$this->data['text_php_help_editor'] = $this->language->get('text_php_help_editor');
		$this->data['text_tokens'] = $this->language->get('text_tokens');
		$this->data['text_replace_title'] = $this->language->get('text_replace_title');
		$this->data['text_replace_content'] = $this->language->get('text_replace_content');
		$this->data['text_block'] = $this->language->get('text_block');
		$this->data['text_enabled_editor'] = $this->language->get('text_enabled_editor');
		$this->data['text_disable_editor'] = $this->language->get('text_disable_editor');
		$this->data['text_confirm_remove'] = $this->language->get('text_confirm_remove');
		
		$this->data['entry_html_block'] = $this->language->get('entry_html_block');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_php'] = $this->language->get('entry_php');
		$this->data['entry_theme'] = $this->language->get('entry_theme');
		$this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_content'] = $this->language->get('entry_content');
		
		$this->data['column_token'] = $this->language->get('column_token');
		$this->data['column_value'] = $this->language->get('column_value');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['button_add_block'] = $this->language->get('button_add_block');
		
		$this->data['tab_position'] = $this->language->get('tab_position');
		$this->data['tab_blocks'] = $this->language->get('tab_blocks');
		
		$this->data['token'] = $this->session->data['token'];
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->error['content'])) {
			$this->data['error_content'] = $this->error['content'];
		} else {
			$this->data['error_content'] = array();
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
       		'text'      => strip_tags($this->language->get('heading_title')),
			'href'      => $this->url->link('module/html_block', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/html_block', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['modules'] = array();
		
		if (isset($this->request->post['html_block_module'])) {
			$this->data['modules'] = $this->request->post['html_block_module'];
		} elseif ($this->config->get('html_block_module')) { 
			$this->data['modules'] = $this->config->get('html_block_module');
		}
		
		if (count($this->request->post)) {
			$html_blocks = $this->request->post;
		} else {
			$this->load->model('module/html_block');
			$html_blocks = $this->model_module_html_block->getSetting('html_block', (int)$this->config->get('config_store_id'));
		}
		
		unset($html_blocks['html_block_module']);
		
		$this->data['html_block_content'] = array();
		
		foreach ($html_blocks as $key => $value) {
			if (strpos($key, 'html_block_') === 0 && is_array($value)) {
				$block_id = substr($key, 11);
				$this->data['html_block_content'][$block_id] = $value;
			}
		}
		
		ksort($this->data['html_block_content']);
				
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		$this->template = 'module/html_block.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/html_block')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post['html_block_module'])) {
			foreach ($this->request->post['html_block_module'] as $key => $value) {
				if (!$value['html_block_id']) {
					$this->error['content'][$key] = $this->language->get('error_content');
				}			
			}
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>