<?php
class ModelModuleSearchAuto extends Model {
	public function getManufacturers($category_id) {
		$manufacturer_data = $this->cache->get('auto_manufacturer_' . $category_id . '.' . (int)$this->config->get('config_store_id'));
	
		if (!$manufacturer_data) {
			
			$sql = "SELECT DISTINCT m.name FROM " . DB_PREFIX . "product p
						LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (p.product_id = ptc.product_id)
						LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)
					WHERE m.name <> ''
						AND ptc.category_id in (" . (int)$category_id . "";
			
			$sub_categorys = $this->getCategoriesByParentId($category_id);
			
			if($sub_categorys) {
				$sql .= ', ' . implode(', ', $sub_categorys);
			}
			
			$sql .= ") ORDER BY m.name";
			
			$query = $this->db->query($sql);
			
			$manufacturer_data = $query->rows;
		
			$this->cache->set('auto_manufacturer_' . $category_id . '.' . (int)$this->config->get('config_store_id'), $manufacturer_data);
		}
	 
		return $manufacturer_data;
	}
	
	public function getAttrList($attribute_id) {
		$attr_list = $this->cache->get('auto_attr_list_' . $attribute_id . '.v1.' . (int)$this->config->get('config_store_id'));

		if (!$attr_list) {
			
/*			$sql = "SELECT DISTINCT pa.text FROM " . DB_PREFIX . "product_attribute pa
						LEFT JOIN " . DB_PREFIX . "product p ON (pa.product_id = p.product_id)
					WHERE pa.attribute_id = '" . (int)$attribute_id . "'
						AND pa.language_id = '" . (int)$this->config->get('config_language_id') . "'
						AND p.status = '1'
					ORDER BY pa.text";*/

            $sql = "SELECT  pa.text FROM oc_product_attribute pa, oc_product op
WHERE pa.attribute_id = $attribute_id AND op.product_id = pa.product_id AND pa.language_id = ".$this->config->get('config_language_id')." AND op.status = 1
GROUP BY pa.text ORDER BY pa.text";
//			trigger_error($sql);
			
			$query = $this->db->query($sql);
			
			$attr_list = $query->rows;
		
			$this->cache->set('auto_attr_list_' . $attribute_id . '.v1.' . (int)$this->config->get('config_store_id'), $attr_list);
		}
	 
		return $attr_list;
	}
	
	public function getCategoriesByParentId($category_id) {
		$category_data = array();
		
		$category_query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "category WHERE parent_id = '" . (int)$category_id . "'");
		
		foreach ($category_query->rows as $category) {
			$category_data[] = $category['category_id'];
			
			$children = $this->getCategoriesByParentId($category['category_id']);
			
			if ($children) {
				$category_data = array_merge($children, $category_data);
			}			
		}
		
		return $category_data;
	}
	
	public function getVendors() {
		$vendor_data = $this->cache->get('auto_vendor_' . (int)$this->config->get('config_store_id'));
	
		if (!$vendor_data) {
			$query = $this->db->query("SELECT DISTINCT vendor FROM " . DB_PREFIX . "cars ORDER BY vendor");

			$vendor_data = $query->rows;
		
			$this->cache->set('auto_vendor_' . (int)$this->config->get('config_store_id'), $vendor_data);
		}
	 
		return $vendor_data;
	}
	
	/* --- AJAX load --- */
	public function getModels($vendor) {
		$sql = "SELECT DISTINCT model FROM " . DB_PREFIX . "cars
				WHERE vendor = '" . $this->db->escape(utf8_strtolower($vendor)) . "'
				ORDER BY model ASC";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getYears($vendor, $model) {
		$sql = "SELECT DISTINCT year FROM " . DB_PREFIX . "cars
				WHERE vendor = '" . $this->db->escape(utf8_strtolower($vendor)) . "'
					AND model = '" . $this->db->escape(utf8_strtolower($model)) . "'
				ORDER BY year DESC";
		
		$query = $this->db->query($sql);
		
		$years = array();
		
		foreach($query->rows as $item) {
			$years[] = array(
				'year' => $item['year']
			);
		}
		
		return $years;
	}
	
	public function getMods($vendor, $model, $year) {
		$sql = "SELECT DISTINCT modification FROM " . DB_PREFIX . "cars
				WHERE vendor = '" . $this->db->escape(utf8_strtolower($vendor)) . "'
					AND model = '" . $this->db->escape(utf8_strtolower($model)) . "'
					AND year = '" . (int)$year . "'
				ORDER BY modification ASC";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
}
?>