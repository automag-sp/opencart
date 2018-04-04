<?php
class ControllerModulePavmap extends Controller {
	protected function index($setting) {
		static $module = 0;

		$current_store_id = $this->config->get('config_store_id');
		$stores = isset($setting['store_id'])?$setting['store_id']:array();

		if(!empty($stores) && !in_array($current_store_id, $stores)){
			return;
		}

		// if IE<=8 module do not work
		if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])) { 
			return;
		}

		$this->language->load('module/pavmap');
		$this->load->model('design/banner');
		$this->load->model('tool/image');
		$this->load->model('pavmap/location');

		// Jquery googlemap api v3
		$this->document->addScript('https://maps.googleapis.com/maps/api/js?v=3.exp&language=ru&key=AIzaSyA3A1PTQTEs86HWyQj8ZmFfrI0ZiFza_xk');
		$this->document->addScript('catalog/view/javascript/gmap/gmap3.min.js');
		$this->document->addScript('catalog/view/javascript/gmap/gmap3.infobox.js');

		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/pavmap.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/pavmap.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/pavmap.css');
		}
		$language_id = $this->config->get('config_language_id');
		$this->data['text_view_more'] = $this->language->get('text_view_more');
		$limit = isset($setting['limit'])?$setting['limit']:50;
		$height = isset($setting['height'])?$setting['height']:400;
		$title = isset($setting['title'][$language_id])?$setting['title'][$language_id]:'';
		$des = isset($setting['des'][$language_id])?$setting['des'][$language_id]:'';

		$this->data['height'] = $height;
		$this->data['title'] = $title;
		$this->data['des'] = $des;

		$data = array("limit" => $limit, "store_id" => $current_store_id);

		// get list locations of group by store_id
		$locations = $this->model_pavmap_location->getLocations($data);

		foreach ($locations as &$location) {
			$location['icon'] = $this->model_tool_image->resize($location['icon'], 49, 56);
			$location['image'] = $this->model_tool_image->resize($location['image'], 120, 160, "h");
		}

		$this->data['locations'] = $locations;

		//echo "<pre>"; print_r($locations); die;

		$this->data['module'] = $module++;

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavmap.tpl')){
			$this->template = $this->config->get('config_template') . '/template/module/pavmap.tpl';
		} else {
			$this->template = 'default/template/module/pavmap.tpl';
		}

		$this->render();
	}
}
?>
