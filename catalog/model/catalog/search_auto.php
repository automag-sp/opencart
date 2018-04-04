<?php
class ModelCatalogSearchAuto extends Model {
	public function getTires(array $data = array(), array $setting = array()) {
		if ($this->customer->isLogged()) {
			$customer_group_id = $this->customer->getCustomerGroupId();
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}	

		$sql = "SELECT p.product_id, pd.name AS name, p.model, p.image, p.price, p.tax_class_id, pd.description AS description,";
		
		if (!empty($data['width'])) {
			$sql .= " pa" . $setting['width'] . ".text AS width,";
		}
		
		if (!empty($data['height'])) {
			$sql .= " pa" . $setting['height'] . ".text AS height,";
		}
		
		if (!empty($data['diameter'])) {
			$sql .= " pa" . $setting['diameter'] . ".text AS diameter,";
		}
		
		if (!empty($data['season'])) {
			$sql .= " pa" . $setting['seasons'] . ".text AS season,";
		}
		
		if (!empty($data['manufacturer'])) {
			$sql .= " m.name AS manufacturer,";
		}
		
		$sql .= " (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$customer_group_id . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special,";
		$sql .= " (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating";
		$sql .=	" FROM " . DB_PREFIX . "product p";
		$sql .=	" LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";
		
		if (!empty($data['width'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['width'] . " ON (p.product_id = pa" . $setting['width'] . ".product_id AND pa" . $setting['width'] . ".attribute_id = " . $setting['width'] . ")";
		}
		
		if (!empty($data['height'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['height'] . " ON (p.product_id = pa" . $setting['height'] . ".product_id AND pa" . $setting['height'] . ".attribute_id = " . $setting['height'] . ")";
		}
		
		if (!empty($data['diameter'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['diameter'] . " ON (p.product_id = pa" . $setting['diameter'] . ".product_id AND pa" . $setting['diameter'] . ".attribute_id = " . $setting['diameter'] . ")";
		}
		
		if (!empty($data['season'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['seasons'] . " ON (p.product_id = pa" . $setting['seasons'] . ".product_id AND pa" . $setting['seasons'] . ".attribute_id = " . $setting['seasons'] . ")";
		}
		
		if (!empty($data['manufacturer'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)";
		}
		
		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		$sql .= " AND p.status = 1";
		
		if (!empty($data['width']))
			$sql .= " AND pa" . $setting['width'] . ".text = '" . $data['width'] . "'";

		if (!empty($data['height']))
			$sql .= " AND pa" . $setting['height'] . ".text = '" . $data['height'] . "'";
		
		if (!empty($data['diameter']))
			$sql .= " AND pa" . $setting['diameter'] . ".text = '" . $data['diameter'] . "'";
		
		if (!empty($data['season']))
			$sql .= " AND pa" . $setting['seasons'] . ".text = '" . $data['season'] . "'";
		
		if (!empty($data['manufacturer']))
			$sql .= " AND m.name = '" . $data['manufacturer'] . "'";
		
		$sql .= " GROUP BY p.product_id";
		
		$sort_data = array(
			'pd.name',
			'p.model',
			'p.quantity',
			'p.price',
			'rating',
			'p.sort_order',
			'p.date_added'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
			} else {
				$sql .= " ORDER BY " . $data['sort'];
			}
		} else {
			$sql .= " ORDER BY p.sort_order";	
		}
		
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC, LCASE(pd.name) DESC";
		} else {
			$sql .= " ASC, LCASE(pd.name) ASC";
		}
	
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}				

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	
		
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		
		$this->db->query('SET OPTION SQL_BIG_SELECTS = 1');
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
		
	public function getTotalTires($data = array(), array $setting = array()) {
		if ($this->customer->isLogged()) {
			$customer_group_id = $this->customer->getCustomerGroupId();
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}	
		
		$sql = "SELECT COUNT(DISTINCT p.product_id) AS total FROM " . DB_PREFIX . "product p";
		
		if (!empty($data['width'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['width'] . " ON (p.product_id = pa" . $setting['width'] . ".product_id AND pa" . $setting['width'] . ".attribute_id = " . $setting['width'] . ")";
		}
		
		if (!empty($data['height'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['height'] . " ON (p.product_id = pa" . $setting['height'] . ".product_id AND pa" . $setting['height'] . ".attribute_id = " . $setting['height'] . ")";
		}
		
		if (!empty($data['diameter'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['diameter'] . " ON (p.product_id = pa" . $setting['diameter'] . ".product_id AND pa" . $setting['diameter'] . ".attribute_id = " . $setting['diameter'] . ")";
		}
		
		if (!empty($data['season'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['seasons'] . " ON (p.product_id = pa" . $setting['seasons'] . ".product_id AND pa" . $setting['seasons'] . ".attribute_id = " . $setting['seasons'] . ")";
		}
		
		if (!empty($data['manufacturer'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)";
		}
		
		$where = array();
		
		if (!empty($data['width']))
			$where[] = 'pa' . $setting['width'] . ".text = '" . $data['width'] . "'";
		
		if (!empty($data['height']))
			$where[] = 'pa' . $setting['height'] . ".text = '" . $data['height'] . "'";
		
		if (!empty($data['diameter']))
			$where[] = 'pa' . $setting['diameter'] . ".text = '" . $data['diameter'] . "'";
		
		if (!empty($data['season']))
			$where[] = 'pa' . $setting['seasons'] . ".text = '" . $data['season'] . "'";
		
		if (!empty($data['manufacturer']))
			$where[] = "m.name = '" . $data['manufacturer'] . "'";
		
		if(!empty($where))
			$sql .= ' WHERE p.status = 1 AND ' . implode(' AND ', $where);
		
		$this->db->query('SET OPTION SQL_BIG_SELECTS = 1');
		$query = $this->db->query($sql);
		
		return $query->row['total'];
	}
	
	public function getDiscs(array $data = array(), array $setting = array()) {
		if ($this->customer->isLogged()) {
			$customer_group_id = $this->customer->getCustomerGroupId();
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}	

		$sql = "SELECT p.product_id, pd.name AS name,  p.model, p.image, p.price, p.tax_class_id, pd.description AS description,";
		
		if (!empty($data['width'])) {
			$sql .= " pa" . $setting['width'] . ".text AS width,";
		}
		
		if (!empty($data['diameter'])) {
			$sql .= " pa" . $setting['diameter'] . ".text AS diameter,";
		}
		
		if (!empty($data['pcd'])) {
			$sql .= " pa" . $setting['pcd'] . ".text AS pcd,";
		}
		
		if (!empty($data['dia'])) {
			$sql .= " pa" . $setting['dia'] . ".text AS dia,";
		}
		
		if (!empty($data['et'])) {
			$sql .= " pa" . $setting['et'] . ".text AS et,";
		}
		if (!empty($data['manufacturer'])) {
			$sql .= " m.name AS manufacturer,";
		}
		
		$sql .= " (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$customer_group_id . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special,";
		$sql .= " (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating";
		$sql .= " FROM " . DB_PREFIX . "product p";
		$sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";
		
		if (!empty($data['width'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['width'] . " ON (p.product_id = pa" . $setting['width'] . ".product_id AND pa" . $setting['width'] . ".attribute_id = " . $setting['width'] . ")";
		}
		
		if (!empty($data['diameter'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['diameter'] . " ON (p.product_id = pa" . $setting['diameter'] . ".product_id AND pa" . $setting['diameter'] . ".attribute_id = " . $setting['diameter'] . ")";
		}
		
		if (!empty($data['pcd'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['pcd'] . " ON (p.product_id = pa" . $setting['pcd'] . ".product_id AND pa" . $setting['pcd'] . ".attribute_id = " . $setting['pcd'] . ")";
		}
		
		if (!empty($data['dia'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['dia'] . " ON (p.product_id = pa" . $setting['dia'] . ".product_id AND pa" . $setting['dia'] . ".attribute_id = " . $setting['dia'] . ")";
		}
		if (!empty($data['et'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['et'] . " ON (p.product_id = pa" . $setting['et'] . ".product_id AND pa" . $setting['et'] . ".attribute_id = " . $setting['et'] . ")";
		}
		
		if (!empty($data['manufacturer'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)";
		}
		
		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		$sql .= " AND p.status = 1";
		
		if (!empty($data['width']))
			$sql .= " AND pa" . $setting['width'] . ".text = '" . $data['width'] . "'";

		if (!empty($data['diameter']))
			$sql .= " AND pa" . $setting['diameter'] . ".text = '" . $data['diameter'] . "'";
		
		if (!empty($data['pcd']))
			$sql .= " AND pa" . $setting['pcd'] . ".text = '" . $data['pcd'] . "'";
		
		if (!empty($data['dia']))
			$sql .= " AND pa" . $setting['dia'] . ".text = '" . $data['dia'] . "'";
			
		if (!empty($data['et']))
			$sql .= " AND pa" . $setting['et'] . ".text = '" . $data['et'] . "'";
			/* 30-40
			list($a, $b) = explode('-', $data['et']);
			
			$sql .= " (pa" . $setting['et'] . ".text BETWEEN '" . $a . "' AND '" . $b . "')";
			*/
		
		if (!empty($data['manufacturer']))
			$sql .= " AND m.name = '" . $data['manufacturer'] . "'";
		
		$sql .= " GROUP BY p.product_id";
		
		$sort_data = array(
			'pd.name',
			'p.model',
			'p.quantity',
			'p.price',
			'rating',
			'p.sort_order',
			'p.date_added'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
				$sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
			} else {
				$sql .= " ORDER BY " . $data['sort'];
			}
		} else {
			$sql .= " ORDER BY p.sort_order";	
		}
		
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC, LCASE(pd.name) DESC";
		} else {
			$sql .= " ASC, LCASE(pd.name) ASC";
		}
	
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}				

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	
		
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		
		$this->db->query('SET OPTION SQL_BIG_SELECTS = 1');
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getTotalDiscs(array $data = array(), array $setting = array()) {
		if ($this->customer->isLogged()) {
			$customer_group_id = $this->customer->getCustomerGroupId();
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}	
		
		$sql = "SELECT COUNT(DISTINCT p.product_id) AS total FROM " . DB_PREFIX . "product p";
		
		if (!empty($data['width'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['width'] . " ON (p.product_id = pa" . $setting['width'] . ".product_id AND pa" . $setting['width'] . ".attribute_id = " . $setting['width'] . ")";
		}
		
		if (!empty($data['diameter'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['diameter'] . " ON (p.product_id = pa" . $setting['diameter'] . ".product_id AND pa" . $setting['diameter'] . ".attribute_id = " . $setting['diameter'] . ")";
		}
		
		if (!empty($data['pcd'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['pcd'] . " ON (p.product_id = pa" . $setting['pcd'] . ".product_id AND pa" . $setting['pcd'] . ".attribute_id = " . $setting['pcd'] . ")";
		}
		
		if (!empty($data['dia'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['dia'] . " ON (p.product_id = pa" . $setting['dia'] . ".product_id AND pa" . $setting['dia'] . ".attribute_id = " . $setting['dia'] . ")";
		}
		if (!empty($data['et'])) {
			$sql .= " INNER JOIN " . DB_PREFIX . "product_attribute pa" . $setting['et'] . " ON (p.product_id = pa" . $setting['et'] . ".product_id AND pa" . $setting['et'] . ".attribute_id = " . $setting['et'] . ")";
		}
		
		if (!empty($data['manufacturer'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)";
		}
		
		$where = array();
		
		if (!empty($data['width']))
			$where[] = 'pa' . $setting['width'] . ".text = '" . $data['width'] . "'";
		
		if (!empty($data['diameter']))
			$where[] = 'pa' . $setting['diameter'] . ".text = '" . $data['diameter'] . "'";
		
		if (!empty($data['pcd']))
			$where[] = 'pa' . $setting['pcd'] . ".text = '" . $data['pcd'] . "'";
		
		if (!empty($data['dia']))
			$where[] = 'pa' . $setting['dia'] . ".text = '" . $data['dia'] . "'";
		
		if (!empty($data['et']))
			$where[] = 'pa' . $setting['et'] . ".text = '" . $data['et'] . "'";
			/* 30-40
			list($a, $b) = explode('-', $data['et']);
			
			$where[] = '(pa' . $setting['et'] . ".text BETWEEN '" . $a . "' AND '" . $b . "')";
			*/
		
		if (!empty($data['manufacturer']))
			$where[] = "m.name = '" . $data['manufacturer'] . "'";
		
		if(!empty($where))
			$sql .= ' WHERE p.status = 1 AND ' . implode(' AND ', $where);
		
		$this->db->query('SET OPTION SQL_BIG_SELECTS = 1');
		$query = $this->db->query($sql);
		
		return $query->row['total'];
	}
	
	public function getCarId($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "cars
				WHERE vendor = '" . $this->db->escape(utf8_strtolower($data['vendor'])) . "' AND
					model = '" . $this->db->escape(utf8_strtolower($data['model'])) . "' AND
					year = '" . $this->db->escape(utf8_strtolower($data['year'])) . "' AND
					modification = '" . $this->db->escape(utf8_strtolower($data['modification'])) . "'
				LIMIT 1";
		
		$query = $this->db->query($sql);
		
		return $query->row;
	}
	
	public function getTiresToCar($carId) {
		$sql = "SELECT * FROM " . DB_PREFIX . "car_to_tire
				WHERE car_id = '" . (int)$carId . "'";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function getDiscsToCar($carId) {
		$sql = "SELECT * FROM " . DB_PREFIX . "car_to_disk
				WHERE car_id = '" . (int)$carId . "'";
		
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
}
?>