<?php
class ControllerModuleSearchAuto extends Controller {
	protected function index($module) {
		static $moduleID = 0;
		
		$this->data['moduleID'] = $moduleID++;
		
		$this->language->load('module/search_auto');
		
		$this->data['entry_width']   = $this->language->get('entry_width');
		$this->data['entry_height']  = $this->language->get('entry_height');
		$this->data['entry_diameter'] = $this->language->get('entry_diameter');
		$this->data['entry_season']  = $this->language->get('entry_season');
		$this->data['entry_manufacture']  = $this->language->get('entry_manufacture');
		$this->data['entry_pcd']  = $this->language->get('entry_pcd');
		$this->data['entry_dia']  = $this->language->get('entry_dia');
		$this->data['entry_et']  = $this->language->get('entry_et');
		$this->data['entry_vendor']  = $this->language->get('entry_vendor');
		$this->data['entry_model']  = $this->language->get('entry_model');
		$this->data['entry_year']  = $this->language->get('entry_year');
		$this->data['entry_mod']  = $this->language->get('entry_mod');
		
		$this->data['text_null'] = $this->language->get('text_null');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['button_search']  = $this->language->get('button_search');
		
		$this->load->model('module/search_auto');
		//echo 'Z3';		
		$setting = $this->config->get('search_auto_module_setting');
		//echo 'Z4';
		if (isset($this->request->get['tab'])) {
			$this->data['tab'] = $this->request->get['tab'];
		} else {
			$this->data['tab'] = '';
		}
		
		if(isset($module['forms']['tire'])) {
			$this->form_tire($setting['tire']);
		} else {
			$this->data['tab_tire'] = false;
		}
		
		if(isset($module['forms']['disc'])) {
			$this->form_disc($setting['disc']);
		} else {
			$this->data['tab_disc'] = false;
		}
		
		if(isset($module['forms']['auto'])) {
			$this->form_auto();
		} else {
			$this->data['tab_auto'] = false;
		}
		
		$this->document->addScript('catalog/view/javascript/jquery/tabs.js');
		$this->document->addScript('catalog/view/javascript/search_auto.js');
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/search_auto_form.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/search_auto_form.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/search_auto_form.css');
		}
		if(($module['position'] == 'content_top') || ($module['position'] == 'content_bottom')) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/search_auto_content.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/search_auto_content.tpl';
			} else {
				$this->template = 'default/template/module/search_auto_content.tpl';
			}
		} else {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/search_auto_column.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/search_auto_column.tpl';
			} else {
				$this->template = 'default/template/module/search_auto_column.tpl';
			}
		}
		
		$this->render();
	}
	
	private function form_tire($setting) {
		if($setting) {
			if (isset($this->request->get['tab'])) {
				$tab = $this->request->get['tab'];
			} else {
				$tab = '';
			}
			
			if (isset($this->request->get['width']) && ($tab == 'tire')) {
				$width = $this->request->get['width'];
			} else {
				$width = '';
			}
			
			if (isset($this->request->get['height'])) {
				$height = $this->request->get['height'];
			} else {
				$height = '';
			}
			
			if (isset($this->request->get['diameter']) && ($tab == 'tire')) {
				$diameter = $this->request->get['diameter'];
			} else {
				$diameter = '';
			}
			
			if (isset($this->request->get['season'])) {
				$season = $this->request->get['season'];
			} else {
				$season = '';
			}
			
			if (isset($this->request->get['manufacturer']) && ($tab == 'tire')) {
				$manufacturer = $this->request->get['manufacturer'];
			} else {
				$manufacturer = '';
			}
			
			$manufacturers_tires = $this->model_module_search_auto->getManufacturers($setting['category']);
			$width_tires = $this->model_module_search_auto->getAttrList($setting['width']);
			$height_tires = $this->model_module_search_auto->getAttrList($setting['height']);
			$diameter_tires = $this->model_module_search_auto->getAttrList($setting['diameter']);
			$seasons_tires = $this->model_module_search_auto->getAttrList($setting['seasons']);
//			trigger_error($setting['seasons']);
			$this->data['manufacturers_tires']	= $manufacturers_tires;
			$this->data['width_tires']			= $width_tires;
			$this->data['height_tires']			= $height_tires;
			$this->data['diameter_tires']		= $diameter_tires;
			$this->data['seasons_tires']		= $seasons_tires;
			
			$this->data['tab_tire']	= $this->language->get('tab_tire');
			
			$this->data['width_t']			= $width;
			$this->data['height']			= $height;
			$this->data['diameter_t']		= $diameter;
			$this->data['season']			= $season;
			$this->data['manufacturer_t']	= $manufacturer;
		} else {
			$this->data['tab_tire'] = false;
		}
	}
	
	private function form_disc($setting) {
		if($setting) {
			if (isset($this->request->get['tab'])) {
				$tab = $this->request->get['tab'];
			} else {
				$tab = '';
			}
			
			if (isset($this->request->get['width']) && ($tab == 'disc')) {
				$width = $this->request->get['width'];
			} else {
				$width = '';
			}
			
			if (isset($this->request->get['diameter']) && ($tab == 'disc')) {
				$diameter = $this->request->get['diameter'];
			} else {
				$diameter = '';
			}
			
			if (isset($this->request->get['dia'])) {
				$dia = $this->request->get['dia'];
			} else {
				$dia = '';
			}
			
			if (isset($this->request->get['pcd'])) {
				$pcd = $this->request->get['pcd'];
			} else {
				$pcd = '';
			}
			
			if (isset($this->request->get['et'])) {
				$et = $this->request->get['et'];
			} else {
				$et = '';
			}
			
			if (isset($this->request->get['manufacturer']) && ($tab == 'disc')) {
				$manufacturer = $this->request->get['manufacturer'];
			} else {
				$manufacturer = '';
			}
			
			$this->data['manufacturers_discs'] = $this->model_module_search_auto->getManufacturers($setting['category']);
			$this->data['width_discs'] = $this->model_module_search_auto->getAttrList($setting['width']);
			$this->data['diameter_discs'] = $this->model_module_search_auto->getAttrList($setting['diameter']);
			$this->data['pcd_discs'] = $this->model_module_search_auto->getAttrList($setting['pcd']);
			$this->data['dia_discs'] = $this->model_module_search_auto->getAttrList($setting['dia']);
			$this->data['et_discs'] = $this->model_module_search_auto->getAttrList($setting['et']);

			$this->data['tab_disc']     	 = $this->language->get('tab_disc');
			
			$this->data['width_d']			= $width;
			$this->data['diameter_d']		= $diameter;
			$this->data['dia']				= $dia;
			$this->data['pcd']				= $pcd;
			$this->data['et']				= $et;
			$this->data['manufacturer_d']	= $manufacturer;
		} else {
			$this->data['tab_tire'] = false;
		}
	}
	
	private function form_auto() {
		if (isset($this->request->get['tab'])) {
			$tab = $this->request->get['tab'];
		} else {
			$tab = '';
		}
		
		if (isset($this->request->get['vendor'])) {
			$vendor = $this->request->get['vendor'];
		} else {
			$vendor = '';
		}
		
		if (isset($this->request->get['model'])) {
			$model = $this->request->get['model'];
		} else {
			$model = '';
		}
		
		if (isset($this->request->get['year'])) {
			$year = $this->request->get['year'];
		} else {
			$year = '';
		}
		
		if (isset($this->request->get['mod'])) {
			$mod = $this->request->get['mod'];
		} else {
			$mod = '';
		}
		//echo 'AAA';
		$this->data['vendor_auto'] = $this->model_module_search_auto->getVendors();
		//echo 'BBB';
		$this->data['tab_auto']	= $this->language->get('tab_auto');
		
		if($vendor and $model and $year and $mod) {
			$this->data['model_auto'] = $this->model_module_search_auto->getModels($vendor);
			$this->data['year_auto'] = $this->model_module_search_auto->getYears($vendor, $model);
			$this->data['mod_auto'] = $this->model_module_search_auto->getMods($vendor, $model, $year);
		} else {
			$this->data['model_auto'] = '';
			$this->data['year_auto'] = '';
			$this->data['mod_auto'] = '';
		}
		
		$this->data['vendor']	= $vendor;
		$this->data['model']	= $model;
		$this->data['year']		= $year;
		$this->data['mod']		= $mod;
	}
	
	/* --- AJAX load --- */
	public function model() {
		if($this->request->server['REQUEST_METHOD'] != 'POST' || !isset($this->request->server['HTTP_REFERER']) || strpos($this->request->server['HTTP_REFERER'], HTTP_SERVER) !== 0) {
			header('Location: ' . HTTP_SERVER);
			exit();
		}
		
		$this->language->load('module/search_auto');
		$this->load->model('module/search_auto');

		$data = array();
		$vendor = isset($this->request->post['vendor']) ? $this->request->post['vendor'] : '';
		
		if($vendor) {
			$models = $this->model_module_search_auto->getModels($vendor);
			
			$data['model'] = '<option value="-">' . $this->language->get('text_select') . '</option>';
			
			foreach($models as $model){
				$data['model'] .= '<option value="' . $model['model'] . '">' . $model['model'] . '</option>';
			}
		} else {
			$data['error'] = $this->language->get('text_error_result');
		}

		echo json_encode($data);
	}
	
	public function year() {
		if($this->request->server['REQUEST_METHOD'] != 'POST' || !isset($this->request->server['HTTP_REFERER']) || strpos($this->request->server['HTTP_REFERER'], HTTP_SERVER) !== 0) {
			header('Location: ' . HTTP_SERVER);
			exit();
		}
		
		$this->language->load('module/search_auto');
		$this->load->model('module/search_auto');
		
		$data = array();
		$vendor = isset($this->request->post['vendor']) ? $this->request->post['vendor'] : '';
		$model = isset($this->request->post['model']) ? $this->request->post['model'] : '';
		
		if($vendor and $model) {
			$years = $this->model_module_search_auto->getYears($vendor, $model);
			
			$data['year'] = '<option value="-">' . $this->language->get('text_select') . '</option>';
			
			foreach($years as $year){
				$data['year'] .= '<option value="' . $year['year'] . '">' . $year['year'] . '</option>';
			}
		} else {
			$data['error'] = $this->language->get('text_error_result');
		}
		
		echo json_encode($data);
	}
	
	public function mod() {
		if($this->request->server['REQUEST_METHOD'] != 'POST' || !isset($this->request->server['HTTP_REFERER']) || strpos($this->request->server['HTTP_REFERER'], HTTP_SERVER) !== 0) {
			header('Location: ' . HTTP_SERVER);
			exit();
		}
		
		$this->language->load('module/search_auto');
		$this->load->model('module/search_auto');
		
		$data = array();
		$vendor = isset($this->request->post['vendor']) ? $this->request->post['vendor'] : '';
		$model = isset($this->request->post['model']) ? $this->request->post['model'] : '';
		$year = isset($this->request->post['year']) ? $this->request->post['year'] : '';
		
		if($vendor and $model and $year) {
			$mods = $this->model_module_search_auto->getMods($vendor, $model, $year);
			
			$data['mod'] = '<option value="-">' . $this->language->get('text_select') . '</option>';
			
			foreach($mods as $mod){
				$data['mod'] .= '<option value="' . $mod['modification'] . '">' . $mod['modification'] . '</option>';
			}
		} else {
			$data['error'] = $this->language->get('text_error_result');
		}
		
		echo json_encode($data);
	}
}
?>
