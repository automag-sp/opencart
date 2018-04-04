<?php
/******************************************************
 * @package Pav Megamenu module for Opencart 1.5.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2012 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/
class ControllerModulePavverticalmenu extends Controller {

	protected function index($setting) {
		static $module = 0;

		$this->load->model('catalog/product'); 
		$this->load->model('tool/image');
		$this->load->model( 'verticalmenu/verticalmenu' );
		$this->load->model('setting/setting');

		// Get Config store_id
		$store_id = $this->config->get('config_store_id');
		$this->data['store_id'] = $store_id;

		$is_installed = $this->model_verticalmenu_verticalmenu->isInstalled();

		if(!$is_installed) {
			return;
		}
		
		$this->language->load('module/pavverticalmenu');
		
		$this->data['button_cart'] = $this->language->get('button_cart');
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/pavverticalmenu/style.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/pavverticalmenu/style.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/pavverticalmenu/style.css');
		}
		
		/* check bootstrap 3 framwework existed or not. this modules is main support for  themes for pavothemes ' */
		if ( !file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/bootstrap.css') ) {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/pavverticalmenu/css/bootstrap.css');
			$this->document->addScript('catalog/view/theme/default/stylesheet/pavverticalmenu/js/bootstrap.js');
		}

		
		$this->data['module'] = $module++;
		$params = $this->model_setting_setting->getSetting( 'pavverticalmenu_params' );
		if( isset($params['params']) && !empty($params['params']) ){
	 		$params = json_decode( $params['params'] );
	 	}

		// Get Config store_id
		$store_id = $this->config->get('config_store_id');
		$this->data['store_id'] = $store_id;

		$parent = '1';
		$this->data['treemenu'] = $this->model_verticalmenu_verticalmenu->getTree( $parent, true, $params, $store_id );

			
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/pavverticalmenu.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/pavverticalmenu.tpl';
		} else {
			$this->template = 'default/template/module/pavverticalmenu.tpl';
		}
	
		$this->render();
	}

	public function ajxgenmenu( ){ 
 	 	
	}

	public function renderwidget(){
		if( isset($this->request->post['widgets']) ){
			$this->load->model( 'verticalmenu/widget' );
			
			$widgets = $this->request->post['widgets'];
			$widgets = explode( '|wid-', '|'.$widgets );
			if( !empty($widgets) ){
				unset( $widgets[0] );
				$this->model_verticalmenu_widget->loadWidgets();
				$output = '';
				foreach( $widgets as $wid ){
					$output .= $this->model_verticalmenu_widget->renderContent( $wid );
				}

				echo $output;
			}
		 
		}
		exit();
	}
}
?>