<?php
class ControllerModulePavtwitter extends Controller {
	protected function index($setting) {
		static $module = 0;


		$this->language->load('module/pavtwitter');

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['count'] = !empty($setting['count'])?$setting['count']:'';
		$this->data['username'] = $setting['username'];
		$this->data['widget_id'] = $setting['widget_id'];
		$this->data['theme'] = $setting['theme'];
		$this->data['link_color'] = $setting['link_color'];
		$this->data['border_color'] = $setting['border_color'];
		$this->data['width'] = $setting['width'];
		$this->data['height'] = $setting['height'];
		$this->data['show_replies'] = $setting['show_replies'];
		$this->data['chrome'] = is_array($setting['chrome'])?implode(" ",$setting['chrome']):$setting['chrome'];

		//start edit code
		$this->data['name_color'] = isset($setting['name_color'])?$setting['name_color']:'#000000';
		$this->data['nickname_color'] = isset($setting['nickname_color'])?$setting['nickname_color']:'#000000';
		$this->data['title_color'] = isset($setting['title_color'])?$setting['title_color']:'#000000';
		//end edit code

		$this->data['module'] = $module++;
		
		$this->load->model('localisation/language');
		$language_id = $this->config->get('config_language_id');
		$language = $this->model_localisation_language->getLanguage($language_id);
		
		$this->data['language_code'] = $language['code'];

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavtwitter.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/pavtwitter.tpl';
		} else {
			$this->template = 'default/template/module/pavtwitter.tpl';
		}

		$this->render();
	}
}
?>
