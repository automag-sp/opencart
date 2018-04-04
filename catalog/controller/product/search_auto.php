<?php
class ControllerProductSearchAuto extends Controller {
	public function index()	{
		$this->language->load('product/search_auto');
		$this->language->load('product/category');
		
		$this->load->model('catalog/product');
		$this->load->model('catalog/search_auto');
		$this->load->model('tool/image');
		
		$title = $this->language->get('heading_title');
		
		$tab = '';
		$width = '';
		$height = '';
		$diameter = '';
		$season = '';
		$manufacturer = '';
		$pcd = '';
		$dia = '';
		$et = '';
		$vendor = '';
		$model = '';
		$year = '';
		$mod = '';
		
		$url = '';
		$this->data['vendor'] = '';
		
		if (isset($this->request->get['tab'])) {
			$tab = $this->request->get['tab'];
			$url .= '&tab=' . $tab;
			
			$this->data['tab'] = $tab;
		}
		
		if ($tab == 'tire') {
			$title = $this->language->get('text_tire') . ' ';
			
			if (isset($this->request->get['width'])) {
				$width = $this->request->get['width'];
				$url .= '&width=' . $width;
				
				$title .= $width;
				
				$this->data['width'] = $width;
			}
			
			if (isset($this->request->get['height'])) {
				$height = $this->request->get['height'];
				$url .= '&height=' . $height;
				
				if($width) {
					$title .= '/' . $height;
				} else {
					$title .= $height;
				}
				
				$this->data['height'] = $height;
			}
			
			if (isset($this->request->get['diameter'])) {
				$diameter = $this->request->get['diameter'];
				$url .= '&diameter=' . $diameter;
				
				$title .= ' R' . $diameter . ' ';
				
				$this->data['diameter'] = $diameter;
			}
			
			if (isset($this->request->get['season'])) {
				$season = $this->request->get['season'];
				$url .= '&season=' . urlencode(html_entity_decode($season, ENT_QUOTES, 'UTF-8'));
				
				$this->data['season'] = $season;
			}
			
			if (isset($this->request->get['manufacturer'])) {
				$manufacturer = $this->request->get['manufacturer'];
				$url .= '&manufacturer=' . urlencode(html_entity_decode($manufacturer, ENT_QUOTES, 'UTF-8'));
				
				$this->data['manufacturer'] = $manufacturer;
			}
		} else if($tab == 'disc') {
			$title = $this->language->get('text_disc') . ' ';
			
			if (isset($this->request->get['width'])) {
				$width = $this->request->get['width'];
				$url .= '&width=' . $width;
				
				$title .= $width;
				
				$this->data['width'] = $width;
			}
			
			if (isset($this->request->get['diameter'])) {
				$diameter = $this->request->get['diameter'];
				$url .= '&diameter=' . $diameter;
				
				if($width) {
					$title .= 'xR' . $diameter;
				} else {
					$title .= 'R' . $diameter;
				}
				
				$this->data['diameter'] = $diameter;
			}
			
			if (isset($this->request->get['pcd'])) {
				$pcd = $this->request->get['pcd'];
				$url .= '&pcd=' . $pcd;
				
				$title .= ' PCD ' . $pcd . ' ';
				
				$this->data['pcd'] = $pcd;
			}
			
			if (isset($this->request->get['dia'])) {
				$dia = $this->request->get['dia'];
				$url .= '&dia=' . $dia;
				
				$this->data['dia'] = $dia;
			}
			
			if (isset($this->request->get['et'])) {
				$et = $this->request->get['et'];
				$url .= '&et=' . $et;
				
				$title .= ' ET ' . $et . ' ';
				
				$this->data['et'] = $et;
			}
			
			if (isset($this->request->get['manufacturer'])) {
				$manufacturer = $this->request->get['manufacturer'];
				$url .= '&manufacturer=' . urlencode(html_entity_decode($manufacturer, ENT_QUOTES, 'UTF-8'));
				
				$this->data['manufacturer'] = $manufacturer;
			}
		} else if($tab == 'auto') {
			if (isset($this->request->get['vendor'])) {
				$vendor = $this->request->get['vendor'];
				$url .= '&vendor=' . $vendor;
									
				$this->data['vendor'] = $vendor;
			}
			
			if (isset($this->request->get['model'])) {
				$model = $this->request->get['model'];
				$url .= '&model=' . $model;
				
				$this->data['model'] = $model;
			}
			
			if (isset($this->request->get['year'])) {
				$year = $this->request->get['year'];
				$url .= '&year=' . $year;
				
				$this->data['year'] = $year;
			}
			
			if (isset($this->request->get['mod'])) {
				$mod = $this->request->get['mod'];
				$url .= '&mod=' . $mod;
				
				$this->data['mod'] = $mod;
			}
		}
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
			$url .= '&sort=' . $sort;
		} else {
			$sort = 'p.price';
		} 

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
			$url .= '&order=' . $order;
		} else {
			$order = 'DESC';
		}
  		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
			$url .= '&page=' . $page;
		} else {
			$page = 1;
		}
				
		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
			$url .= '&limit=' . $limit;
		} else {
			$limit = $this->config->get('config_catalog_limit');
		}
		
		$setting = $this->config->get('search_auto_module_setting');
		
		$this->document->setTitle($title);
		
		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array( 
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
      		'separator' => false
   		);
		
		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('product/search_auto', $url),
      		'separator' => $this->language->get('text_separator')
   		);
		
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_empty'] = $this->language->get('text_empty');
		$this->data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
		$this->data['text_display'] = $this->language->get('text_display');
		$this->data['text_list'] = $this->language->get('text_list');
		$this->data['text_grid'] = $this->language->get('text_grid');		
		$this->data['text_sort'] = $this->language->get('text_sort');
		$this->data['text_limit'] = $this->language->get('text_limit');
		$this->data['text_recom_tires'] = $this->language->get('text_recom_tires');
		$this->data['text_recom_discs'] = $this->language->get('text_recom_discs');
		$this->data['text_zavod'] = $this->language->get('text_zavod');
		$this->data['text_zamena'] = $this->language->get('text_zamena');
		$this->data['text_pcd'] = $this->language->get('text_pcd');
		$this->data['text_dia'] = $this->language->get('text_dia');
		$this->data['text_nut'] = $this->language->get('text_nut');
		$this->data['text_mm'] = $this->language->get('text_mm');
		$this->data['text_empty_info'] = $this->language->get('text_empty_info');
		$this->data['button_search'] = $this->language->get('button_search');
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['button_wishlist'] = $this->language->get('button_wishlist');
		$this->data['button_compare'] = $this->language->get('button_compare');
		$this->data['compare'] = $this->url->link('product/compare');
		$this->data['text_tax'] = $this->language->get('text_tax');

		$text_original = $this->language->get('text_original');
		$text_replacement = $this->language->get('text_replacement');
		$text_tuning = $this->language->get('text_tuning');

		$product_total = array();
		$products = array();
		$this->data['products'] = array();
		
		if($tab == 'tire' and (isset($width) || isset($height) || isset($diameter) || isset($season) || isset($manufacturer))) {
			$data = array(
				'width'			=> $width,
				'height'		=> $height,
				'diameter'		=> $diameter,
				'season'		=> $season,
				'manufacturer'	=> $manufacturer,
				'sort'			=> $sort,
				'order'			=> $order,
				'start'			=> ($page - 1) * $limit,
				'limit'			=> $limit
			);
			
			$product_total = $this->model_catalog_search_auto->getTotalTires($data, $setting['tire']);
			$products = $this->model_catalog_search_auto->getTires($data, $setting['tire']);
		} else if($tab == 'disc' and (isset($width) || isset($diameter) || isset($pcd) || isset($dia) || isset($et) || isset($manufacturer))) {
			$data = array(
				'width'			=> $width,
				'diameter'		=> $diameter,
				'pcd'			=> $pcd,
				'dia'			=> $dia,
				'et'			=> $et,
				'manufacturer'	=> $manufacturer,
				'sort'			=> $sort,
				'order'			=> $order,
				'start'			=> ($page - 1) * $limit,
				'limit'			=> $limit
			);
			
			$product_total = $this->model_catalog_search_auto->getTotalDiscs($data, $setting['disc']);
			$products = $this->model_catalog_search_auto->getDiscs($data, $setting['disc']);
		} else if($tab == 'auto' and (isset($vendor) || isset($model) || isset($year) || isset($mod))) {
			if($year == '2013') {
				$y = '2012';
			} else {
				$y = $year;
			}
			
			$data = array(
				'vendor'		=> $vendor,
				'model'			=> $model,
				'year'			=> $y,
				'modification'	=> $mod
			);
			
			$car = $this->model_catalog_search_auto->getCarId($data);
			
			$this->data['car'] = array(
				'id'			=> $car['id'],
				'vendor'		=> $car['vendor'],
				'year'			=> $car['year'],
				'model'			=> $car['model'],
				'modification'	=> $car['modification'],
				'nut'			=> $car['nut'],
				'pcd'			=> $car['pcd'],
				'dia'			=> $car['dia']
			);
			
			$data = json_decode($car['data'], true);

			$this->data['data'] = array();

			foreach($data as $type=>$groups) {
				if(!is_array($groups)) continue;
				if(!isset($this->data['data'][$type])) $this->data['data'][$type] = array();

				foreach($groups as $groupName=>$items) {
					switch($groupName) {
						case 'default':
							$groupName = $text_original;
							break;
						case 'replacement':
							$groupName = $text_replacement;
							break;
						default:
							$groupName = $text_tuning;
					}

					if(!isset($this->data['data'][$type][$groupName])) $this->data['data'][$type][$groupName] = array();

					foreach($items as $item) {
						if($type == 'tires') {
							$name = "{$item['w']}/{$item['h']} R{$item['r']}";
							$href = "index.php?route=product/search_auto&tab=tire&width={$item['w']}&height={$item['h']}&diameter={$item['r']}";
						} else {
							$name = "{$item['w']}x{$item['r']} ET {$item['et']}";
							$href = "index.php?route=product/search_auto&tab=disc&width={$item['w']}&diameter={$item['r']}&pcd={$car['pcd']}&dia={$car['dia']}&et={$item['et']}";
						}

						$pos = isset($item['p']) ? ($item['p'] === 'b' ? '(зад.)' : '(перед.)') : '';


						$this->data['data'][$type][$groupName][] = array(
							'name' => $name,
							'href' => $href,
							'pos'  => $pos
						);
					}
				}
			}
		}
		
		if($products) {
			foreach ($products as $product) {
				if ($product['image']) {
					$image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
				} else {
					$image = false;
				}
				
				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$price = false;
				}
				
				if ((float)$product['special']) {
					$special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}	
				
				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$product['special'] ? $product['special'] : $product['price']);
				} else {
					$tax = false;
				}				
				
				if ($this->config->get('config_review_status')) {
					$rating = (int)$product['rating'];
				} else {
					$rating = false;
				}
				
				$this->data['products'][] = array(
					'product_id'  => $product['product_id'],
					'thumb'       => $image,
					'name'        => $product['name'],
					'model'       => $product['model'],
					'description' => utf8_substr(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
					'price'       => $price,
					'special'	  => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', '&product_id=' . $product['product_id'])
				);
				
			}
			
			$url = '';
			
			if (isset($this->request->get['tab'])) {
				$url .= '&tab=' . $this->request->get['tab'];
			}
			
			if (isset($this->request->get['width'])) {
				$url .= '&width=' . $this->request->get['width'];
			}
					
			if (isset($this->request->get['height'])) {
				$url .= '&height=' . $this->request->get['height'];
			}
			
			if (isset($this->request->get['diameter'])) {
				$url .= '&diameter=' . $this->request->get['diameter'];
			}
			
			if (isset($this->request->get['season'])) {
				$url .= '&season=' . urlencode(html_entity_decode($this->request->get['season'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['manufacturer'])) {
				$url .= '&manufacturer=' . $this->request->get['manufacturer'];
			}
					
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
						
			$this->data['sorts'] = array();
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/search_auto', 'sort=p.sort_order&order=ASC' . $url)
			);
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/search_auto', 'sort=pd.name&order=ASC' . $url)
			); 
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/search_auto', 'sort=pd.name&order=DESC' . $url)
			);
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/search_auto', 'sort=p.price&order=ASC' . $url)
			); 
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/search_auto', 'sort=p.price&order=DESC' . $url)
			); 
			
			if ($this->config->get('config_review_status')) {
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/search_auto', 'sort=rating&order=DESC' . $url)
				); 
				
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/search_auto', 'sort=rating&order=ASC' . $url)
				);
			}
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/search_auto', 'sort=p.model&order=ASC' . $url)
			); 
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/search_auto', 'sort=p.model&order=DESC' . $url)
			);
			
			$url = '';
			
			if (isset($this->request->get['tab'])) {
				$url .= '&tab=' . $this->request->get['tab'];
			}
			
			if (isset($this->request->get['width'])) {
				$url .= '&width=' . $this->request->get['width'];
			}
					
			if (isset($this->request->get['height'])) {
				$url .= '&height=' . $this->request->get['height'];
			}
			
			if (isset($this->request->get['diameter'])) {
				$url .= '&diameter=' . $this->request->get['diameter'];
			}
			
			if (isset($this->request->get['season'])) {
				$url .= '&season=' . urlencode(html_entity_decode($this->request->get['season'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['manufacturer'])) {
				$url .= '&manufacturer=' . $this->request->get['manufacturer'];
			}
						
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	
	
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$this->data['limits'] = array();
			
			$this->data['limits'][] = array(
				'text'  => $this->config->get('config_catalog_limit'),
				'value' => $this->config->get('config_catalog_limit'),
				'href'  => $this->url->link('product/search_auto', $url . '&limit=' . $this->config->get('config_catalog_limit'))
			);
						
			$this->data['limits'][] = array(
				'text'  => 25,
				'value' => 25,
				'href'  => $this->url->link('product/search_auto', $url . '&limit=25')
			);
			
			$this->data['limits'][] = array(
				'text'  => 50,
				'value' => 50,
				'href'  => $this->url->link('product/search_auto', $url . '&limit=50')
			);
	
			$this->data['limits'][] = array(
				'text'  => 75,
				'value' => 75,
				'href'  => $this->url->link('product/search_auto', $url . '&limit=75')
			);
			
			$this->data['limits'][] = array(
				'text'  => 100,
				'value' => 100,
				'href'  => $this->url->link('product/search_auto', $url . '&limit=100')
			);
					
			$url = '';
			
			if (isset($this->request->get['tab'])) {
				$url .= '&tab=' . $this->request->get['tab'];
			}
			
			if (isset($this->request->get['width'])) {
				$url .= '&width=' . $this->request->get['width'];
			}
					
			if (isset($this->request->get['height'])) {
				$url .= '&height=' . $this->request->get['height'];
			}
			
			if (isset($this->request->get['diameter'])) {
				$url .= '&diameter=' . $this->request->get['diameter'];
			}
			
			if (isset($this->request->get['season'])) {
				$url .= '&season=' . urlencode(html_entity_decode($this->request->get['season'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['manufacturer'])) {
				$url .= '&manufacturer=' . $this->request->get['manufacturer'];
			}
			
			if (isset($this->request->get['pcd'])) {
				$url .= '&pcd=' . $this->request->get['pcd'];
			}
			
			if (isset($this->request->get['dia'])) {
				$url .= '&dia=' . $this->request->get['dia'];
			}
			
			if (isset($this->request->get['et'])) {
				$url .= '&et=' . $this->request->get['et'];
			}
			
			if (isset($this->request->get['vendor'])) {
				$url .= '&vendor=' . urlencode(html_entity_decode($this->request->get['vendor'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['model'])) {
				$url .= '&model=' . urlencode(html_entity_decode($this->request->get['model'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['year'])) {
				$url .= '&year=' . $this->request->get['year'];
			}
			
			if (isset($this->request->get['mod'])) {
				$url .= '&mod=' . urlencode(html_entity_decode($this->request->get['mod'], ENT_QUOTES, 'UTF-8'));
			}
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	
	
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			
			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('product/search_auto', $url . '&page={page}');
			
			$this->data['pagination'] = $pagination->render();
		}
		
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;
		$this->data['limit'] = $limit;
		
		$this->document->addScript('catalog/view/javascript/jquery/jquery.total-storage.min.js');

		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/search_auto_result.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/search_auto_result.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/search_auto_result.css');
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/search_auto.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/product/search_auto.tpl';
		} else {
			$this->template = 'default/template/product/search_auto.tpl';
		}
		//echo $this->template;
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'
		);
		//echo '<pre>'; print_r($this->data);echo '</pre>';
		$this->response->setOutput($this->render());			
	}
}
?>
