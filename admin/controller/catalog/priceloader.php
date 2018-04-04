<?php 
class ControllerCatalogPriceloader extends Controller { 
	 private $error = array();
	  
	public function index() {
		$this->load->language('catalog/priceloader');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('catalog/priceloader');
    	$this->getList();
	}
  	
	public function insert() {
		$this->load->language('catalog/priceloader');
    	$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('catalog/priceloader');
						
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			//echo '<pre>';print_r($this->request->post); echo '</pre>';
			$this->model_catalog_priceloader->addPriceloader($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['sort']))  $url .= '&sort=' . $this->request->get['sort'];
			if (isset($this->request->get['order'])) $url .= '&order=' . $this->request->get['order'];
			if (isset($this->request->get['page']))  $url .= '&page=' . $this->request->get['page'];
			$this->redirect($this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
    		
    	$this->getForm();
  	}   	
   
  	public function update() {
		$this->load->language('catalog/priceloader');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('catalog/priceloader');
		
    	if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_priceloader->editPriceloader($this->request->get['priceloader_id'], $this->request->post);
					
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->redirect($this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
        			
    	$this->getForm();
  	}   

  	public function delete() {
		$this->load->language('catalog/priceloader');

    	$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('catalog/priceloader');
		//echo '<pre>'; print_r($this->request->post); echo '</pre>';	
    	if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $priceloader_id) {
				$this->model_catalog_priceloader->deletePriceloader($priceloader_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');
			
			$url = '';
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
			$this->redirect($this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url, 'SSL'));
    	}
	
    	$this->getList();
  	}  
	
  	public function load() {
  		set_time_limit(0);
		$this->load->language('catalog/priceloader');
		$this->load->model('catalog/priceloader');
    	$this->document->setTitle($this->language->get('heading_title'));
		
		if (isset($this->request->get['priceloader_id'])) {
			$err = $this->model_catalog_priceloader->load($this->request->get['priceloader_id']);
		}
		$this->getList();		
	}
  	
	private function getList()
  	{
  		$results = $this->model_catalog_priceloader->createTables();
  		$url = '';
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
			$url .= '&sort=' . $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
		
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
			$url .= '&order=' . $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
			$url .= '&page=' . $this->request->get['page'];
		} else {
			$page = 1;
		} 

			
  		$this->data['breadcrumbs'] = array();
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
   		
   		
   		
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_no_results'] = $this->language->get('text_no_results');		
		$this->data['insert'] = $this->url->link('catalog/priceloader/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('catalog/priceloader/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');	
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_sort_order'] = $this->language->get('column_sort_order');
		$this->data['column_scode'] = $this->language->get('column_scode');
		$this->data['column_action'] = $this->language->get('column_action');		
		$this->data['column_lastupdate'] = $this->language->get('column_lastupdate');		
		
		
		$this->data['supplers'] = array();
		$results = $this->model_catalog_priceloader->getSupplers();
		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('catalog/priceloader/update', 'token=' . $this->session->data['token'] . '&priceloader_id=' . $result['priceloader_id'] . $url, 'SSL')				
			);
			$action[] = array(
				'text' => $this->language->get('text_load'),
				'href' => $this->url->link('catalog/priceloader/load', 'token=' . $this->session->data['token'] . '&priceloader_id=' . $result['priceloader_id'] . $url, 'SSL')				
			);
						
			$this->data['supplers'][] = array(
				'priceloader_id' 	  => $result['priceloader_id'],
				'name'            => $result['name'],
				'sort_order'      => $result['sort_order'],
				'lastupdate'      => $result['lastupdate'],
				'selected'        => isset($this->request->post['selected']) && in_array($result['priceloader_id'], $this->request->post['selected']),
				'action'          => $action
			);
		}				
		
		
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
		
		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;  		

		
		$this->data['sort_name'] = $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$this->data['sort_sort_order'] = $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');
		$this->data['sort_lastupdate'] = $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . '&sort=lastupdate' . $url, 'SSL');
		
		$pagination = new Pagination();
		$pagination->total = $this->model_catalog_priceloader->getTotalSupplers();;
		//$pagination->total = 77;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();
   		
  		
  		//
  		$this->template = 'catalog/priceloader_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	}
  	
	private function getForm() {
    	$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_none'] = $this->language->get('text_none');

		$this->data['entry_name'] = 		$this->language->get('entry_name');
		$this->data['entry_sort_order'] =	$this->language->get('entry_sort_order');
		$this->data['entry_rate'] = 		$this->language->get('entry_rate');
		$this->data['entry_cod'] = 			$this->language->get('entry_cod');
		$this->data['entry_path'] = 		$this->language->get('entry_path');
		$this->data['entry_file'] = 		$this->language->get('entry_file');
		$this->data['entry_category'] = 	$this->language->get('entry_category');
		$this->data['entry_brand'] = 		$this->language->get('entry_brand');
		$this->data['entry_mask'] = 		$this->language->get('entry_mask');
		$this->data['entry_encode'] = 		$this->language->get('entry_encode');
		$this->data['entry_days'] = 		$this->language->get('entry_days');
		$encodes = array(
			array('encode_id' => 'UTF-8', 'name' => 'UTF-8'),
			array('encode_id' => 'windows-1251', 'name' => 'Windows')
		);
		$this->data['encodes'] = $encodes;
		
    	$this->data['button_save'] = $this->language->get('button_save');
    	$this->data['button_cancel'] = $this->language->get('button_cancel');
		
    	
    	
		if (isset($this->error['warning'])) {$this->data['error_warning'] = $this->error['warning'];} else {$this->data['error_warning'] = '';}
 		if (isset($this->error['name'])) {$this->data['error_name'] = $this->error['name'];} else {$this->data['error_name'] = '';}		
		
		$url = '';		
		if (isset($this->request->get['sort']))  {$sort = $this->request->get['sort'];   $url .= '&sort=' .  $this->request->get['sort'];}  else {$sort = 'name';}
		if (isset($this->request->get['order'])) {$order = $this->request->get['order']; $url .= '&order=' . $this->request->get['order'];} else {$order = 'ASC';}
		if (isset($this->request->get['page']))  {$page = $this->request->get['page'];   $url .= '&page=' .  $this->request->get['page'];}  else {$page = 1;}
		$this->data['cancel'] = $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['breadcrumbs'] = array();
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/priceloader', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
   			
		if (!isset($this->request->get['priceloader_id'])) {
			$this->data['action'] = $this->url->link('catalog/priceloader/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/priceloader/update', 'token=' . $this->session->data['token'] . '&priceloader_id=' . $this->request->get['priceloader_id'] . $url, 'SSL');
		}
		
		if (isset($this->request->get['priceloader_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$suppler_info = $this->model_catalog_priceloader->getXSuppler($this->request->get['priceloader_id']);
		}		
		
		$this->load->model('catalog/manufacturer');		
    	$this->data['brands'] = $this->model_catalog_manufacturer->getManufacturers();    	
		
		$this->load->model('catalog/category');					
		$categories = $this->model_catalog_category->getAllCategories();
		$this->data['categories'] = $this->getAllCategories($categories);
		
		
		$id = 0;
		if (isset($this->request->get['priceloader_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
               $id = $this->request->get['priceloader_id']; 
		}		
		
		$_SESSION['id'] = $id;		
		$results = $this->model_catalog_priceloader->getSuppler($id);
		
		$this->data['supplers'] = array();		
					
    	foreach ($results as $result) {
			$action = array();			
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('catalog/priceloader/update', 'token=' . $this->session->data['token'] . '&priceloader_id=' . $result['priceloader_id'] . $url, 'SSL')
			);
			$this->data['supplers'] = $result;
    	}
    	
		if (isset($this->request->post['name'])) {
      		$this->data['name'] = $this->request->post['name'];
    	} elseif (!empty($suppler_info)) {
			$this->data['name'] = $suppler_info['name'];
		} else {	
      		$this->data['supplers']['name'] = '';
    	}   
    	
		if (isset($this->request->post['rate'])) {
      		$this->data['rate'] = $this->request->post['rate'];
    	} elseif (!empty($suppler_info)) {
			$this->data['rate'] = $suppler_info['rate'];
		} else {
      		$this->data['supplers']['rate'] = '';
    	}	    	 			
    	
		if (isset($this->request->post['path'])) {
      		$this->data['path'] = $this->request->post['path'];
    	} elseif (!empty($suppler_info)) {
			$this->data['path'] = $suppler_info['path'];
		} else {
      		$this->data['supplers']['path'] = '';
    	}	    	 			
    	
		if (isset($this->request->post['mask'])) {
      		$this->data['mask'] = $this->request->post['mask'];
    	} elseif (!empty($suppler_info)) {
			$this->data['mask'] = $suppler_info['mask'];
		} else {
      		$this->data['supplers']['mask'] = '';
    	}	    	 			
    	
		if (isset($this->request->post['days'])) {
      		$this->data['days'] = $this->request->post['days'];
    	} elseif (!empty($suppler_info)) {
			$this->data['days'] = $suppler_info['days'];
		} else {
      		$this->data['supplers']['days'] = '';
    	}	    	 			
    	
		if (isset($this->request->post['categoty_id'])) {
      		$this->data['categoty_id'] = $this->request->post['categoty_id'];
    	} elseif (!empty($suppler_info)) {
			$this->data['categoty_id'] = $suppler_info['category_id'];
		} else {
      		$this->data['supplers']['categoty_id'] = 0;
    	}	    	 			
    	
		if (isset($this->request->post['brand_id'])) {
      		$this->data['brand_id'] = $this->request->post['brand_id'];
    	} elseif (!empty($suppler_info)) {
			$this->data['brand_id'] = $suppler_info['brand_id'];
		} else {
      		$this->data['supplers']['brand_id'] = 0;
    	}	    	 			
    	
		if (isset($this->request->post['encode_id'])) {
      		$this->data['encode_id'] = $this->request->post['encode_id'];
    	} elseif (!empty($suppler_info)) {
			$this->data['encode_id'] = $suppler_info['encode_id'];
		} else {
      		$this->data['supplers']['encode_id'] = 'UTF-8';
    	}	    	 			
    	
		$this->template = 'catalog/priceloader_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());    	
	}
	
	 
	private function getAllCategories($categories, $parent_id = 0, $parent_name = '') {
		$output = array();

		if (array_key_exists($parent_id, $categories)) {
			if ($parent_name != '') {
				$parent_name .= $this->language->get('text_separator');
			}

			foreach ($categories[$parent_id] as $category) {
				$output[$category['category_id']] = array(
					'category_id' => $category['category_id'],
					'name'        => $parent_name . $category['name']
				);

				$output += $this->getAllCategories($categories, $category['category_id'], $parent_name . $category['name']);
			}
		}

		return $output;
    
    }
    
  	private function validateForm() { 
    	if (!$this->user->hasPermission('modify', 'catalog/priceloader')) {
      		$this->error['warning'] = $this->language->get('error_permission');
    	}		
						
    	if (!$this->error) {
			return true;
    	} else {
      		return false;
    	}
  	}
  	
	private function validateDelete() {
    	if (!$this->user->hasPermission('modify', 'catalog/priceloader')) {
      		$this->error['warning'] = $this->language->get('error_permission');  
    	}
		
		if (!$this->error) {
	  		return true;
		} else {
	  		return false;
		}
  	}
  	
	
	
}