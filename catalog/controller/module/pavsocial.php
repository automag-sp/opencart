<?php
/******************************************************
 * @package  : Pav Social module for Opencart 1.5.x
 * @version  : 1.0
 * @author   : http://www.pavothemes.com
 * @copyright: Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license  : GNU General Public License version 1
*******************************************************/

class ControllerModulePavsocial extends Controller {

	protected function index($setting) {
		static $module = 1;
		$this->language->load('module/pavsocial');

		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
		 	$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$outsite = isset($setting['position'])?$setting['position']:'outsite_left';
		if ($outsite == 'outsite_left') {
			$this->data['prefix'] = 'left';
		} else {
			$this->data['prefix'] = 'right';
		}
		
		//data config twitter
		$this->data['count'] = !empty($setting['count'])?$setting['count']:4;
		$this->data['username'] = $setting['username'];
		$this->data['widget_id'] = $setting['widget_id'];
		$this->data['theme'] = $setting['theme'];
		$this->data['link_color'] = $setting['link_color'];
		$this->data['border_color'] = $setting['border_color'];
		$this->data['width'] = $setting['width'];
		$this->data['height'] = $setting['height'];
		$this->data['show_replies'] = $setting['show_replies'];
		$this->data['chrome'] = (isset($setting['chrome']) && is_array($setting['chrome']))?implode(" ",$setting['chrome']):'';
		$this->data['name_color'] = isset($setting['name_color'])?$setting['name_color']:'#000000';
		$this->data['nickname_color'] = isset($setting['nickname_color'])?$setting['nickname_color']:'#000000';
		$this->data['title_color'] = isset($setting['title_color'])?$setting['title_color']:'#000000';

	
		//data config facebook
		$this->data['page_url'] = isset($setting['facebook'])?$setting['facebook']:'';
		$this->data['application_id'] = isset($setting['application_id'])?$setting['application_id']:'';
		$this->data['border_color'] = isset($setting['border_color'])?$setting['border_color']:0;
		$this->data['colorscheme'] = isset($setting['colorscheme'])?$setting['colorscheme']:'light';
		$this->data['face_width'] = isset($setting['face_width'])?$setting['face_width']:'220';
		$this->data['face_height'] = isset($setting['face_height'])?$setting['face_height']:'220';
		$this->data['tream'] = isset($setting['tream'])?$setting['tream']:0;
		$this->data['show_faces'] = isset($setting['show_faces'])?$setting['show_faces']:0;
		$this->data['header'] = isset($setting['header'])?$setting['header']:0;

		//data config video
		$this->data['video_ids'] = isset($setting['youtube_video_ids'])?$setting['youtube_video_ids']:'fNEepYl3LAk';
		$this->data['video_width'] = isset($setting['video_width'])?$setting['video_width']:'766';
		$this->data['video_height'] = isset($setting['video_height'])?$setting['video_height']:'419';
		

		//load code language
		$this->load->model('localisation/language');
		$language_id = $this->config->get('config_language_id');
		$language = $this->model_localisation_language->getLanguage($language_id);
		$this->data['language_code'] = $language['code'];

		//Load file tpl
		$this->data['module'] = $module++;
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavsocial.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/pavsocial.tpl';
		} else {
			$this->template = 'default/template/module/pavsocial.tpl';
		}
		$this->render();
	}
}

?>
