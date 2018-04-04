<?php 
/**
 * class ModelPavnewsletterSubscribe 
 */
class ModelPavmapLocation extends Model { 

	public function installModule(){
		$sql = " SHOW TABLES LIKE '".DB_PREFIX."pavmap_location'";
		$query = $this->db->query( $sql );
		if( count($query->rows) <=0 )
			$this->createTables();
	}

	protected function createTables(){
		$sql = array();
		$sql[] = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."pavmap_group_location` (
				  `group_location_id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(225),
				  `store_id` int(11) NOT NULL DEFAULT 0,
				  `status` tinyint(1) NOT NULL DEFAULT '0',
				PRIMARY KEY (`group_location_id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
		";

		//Create table pavmap_location
		$sql[] = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."pavmap_location` (
				  `location_id` int(11) NOT NULL AUTO_INCREMENT,
				  `group_location_id` int(11) NOT NULL,
				  `link` text DEFAULT '',
				  `address` varchar(225) DEFAULT '',
				  `latitude` varchar(225),
				  `longitude` varchar(225),
				  `icon`  varchar(225),
				  `image` varchar(225),
				  `status` tinyint(1) NOT NULL DEFAULT '0',
				PRIMARY KEY (`location_id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
		";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_group_location VALUES ('1', 'Default', 0, 1);";

		//Records of oc_pavmap_location
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('1',  '1', '#', '', '40.712262', '-73.960538', 'data/pavmap/icons/default.png',          'data/pavmap/address/1.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('2',  '1', '#', '', '40.703647', '-74.010822', 'data/pavmap/icons/automotive.png',       'data/pavmap/address/2.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('3',  '1', '#', '', '40.706071', '-74.004201', 'data/pavmap/icons/food.png',             'data/pavmap/address/3.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('4',  '1', '#', '', '40.714910', '-74.011423', 'data/pavmap/icons/education.png',        'data/pavmap/address/4.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('5',  '1', '#', '', '40.703223', '-73.994081', 'data/pavmap/icons/shopping.png',         'data/pavmap/address/5.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('6',  '1', '#', '', '40.695267', '-73.995166', 'data/pavmap/icons/sports.png',           'data/pavmap/address/6.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('7',  '1', '#', '', '40.719068', '-74.001530', 'data/pavmap/icons/tech.png',             'data/pavmap/address/7.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('8',  '1', '#', '', '40.693761', '-73.988656', 'data/pavmap/icons/automotive.png',       'data/pavmap/address/8.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('9',  '1', '#', '', '40.705423', '-74.008616', 'data/pavmap/icons/company.png',          'data/pavmap/address/9.jpg', '1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location VALUES ('10', '1', '#', '', '40.703647', '-74.001530', 'data/pavmap/icons/tech.png',             'data/pavmap/address/8.jpg', '0');";

		//Create table pavmap_location_description
		$sql[] = "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."pavmap_location_description` (
				  `location_id` int(11) DEFAULT NULL,
				  `language_id` int(11) DEFAULT NULL,
				  `title` varchar(200) DEFAULT NULL,
				  `content` text
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		";
		//Records of oc_pavmap_location_description
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('3', '1', 'title 3', 'content 3');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('3', '2', 'title 3', 'content 3');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('1', '1', 'title 1', 'content 1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('1', '2', 'title 1', 'content 1');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('2', '1', 'title 2', 'content 2');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('2', '2', 'title 2', 'content 2');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('5', '1', 'title 5', 'content 5');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('5', '2', 'title 5', 'content 5');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('6', '2', 'title 6', 'content 6');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('6', '1', 'title 6', 'content 6');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('7', '2', 'title 7', 'content 7');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('7', '1', 'title 7', 'content 7');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('8', '2', 'title 8', 'content 8');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('8', '1', 'title 8', 'content 8');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('9', '1', 'title 9', 'content 9');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('9', '2', 'title 9', 'content 9');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('4', '1', 'title 4', 'content 4');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('4', '2', 'title 4', 'content 4');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('10', '1', 'title 10', 'content 10');";
		$sql[] = "INSERT INTO ".DB_PREFIX."pavmap_location_description VALUES ('10', '2', 'title 10', 'content 10');";

		// Execute query
		foreach( $sql as $q ){
			$query = $this->db->query( $q );
		}
	}

	/**
	 * [GroupLocationsQuery Group_Locations]
	 * @param  array   $data
	 * @param  boolean $get_total
	 * @return array   $sql
	 */
	public function groupLocationsQuery($data = array(), $get_total = false){

		if($get_total){
			$sql = "SELECT count(group_location_id) AS total FROM `".DB_PREFIX."pavmap_group_location`";
		}else{
			$sql = "SELECT * FROM `".DB_PREFIX."pavmap_group_location`";
		}
		$limit_start = 0;
		$limit_end = isset($data['limit'])?$data['limit']:20;
		if(isset($data['page'])){
			$limit_start = ((int)$data['page'] -1) * $limit_end;
			$limit_start = $limit_start < 0?0:$limit_start;
		}
		$limit = " LIMIT ".$limit_start.",".$limit_end;

		$array_sorts = array("name");
		$sort = "name";
		$order = "ASC";

		if(isset($data['sort'])){
			$sort = in_array($data['sort'], $array_sorts)?$data['sort']:$sort;
			$order = (isset($data['order'])&&!empty($data['order']))?$data['order']:$order;
		}
		$ordering = " ORDER BY `".$sort."` ".$order;

		$where = array();
		if(isset($data['filter']) && !empty($data['filter'])){
			foreach($data['filter'] as $key=>$val) {
				if ( $key == "name" ) {
					$where[] = " {$key} LIKE '%".$this->db->escape($val)."%'";
				} elseif($val != NULL && $val !="") {
					$where[] = " {$key}=".$this->db->escape($val);
				}
			}
		}

		if($get_total){
			$limit = "";
			$ordering = "";
		}

		$sql .= !empty($where)?" WHERE".implode(" AND ",$where).$ordering.$limit:"".$ordering.$limit;

		return $sql;
	}

	/**
	 * [getGroupLocations]
	 * @param  array  $data
	 * @return array  $sql
	 */
	public function getGroupLocations($data = array()) {
		$sql = $this->groupLocationsQuery($data);
		$query = $this->db->query($sql);
		return $query->rows;
	}

	/**
	 * [getTotalGroupLocations]
	 * @param  array  $data
	 * @return array  $sql
	 */
	public function getTotalGroupLocations($data = array()){
		$sql = $this->groupLocationsQuery($data, true);
		$query = $this->db->query($sql);
		if($query->num_rows >0){
			return $query->row['total'];
		}
		return 0;
	}

	/**
	 * [getGroupLocation]
	 * @param  [int]    $group_location_id
	 * @return [array]  $row
	 */
	public function getGroupLocation($group_location_id) {
		$sql = "SELECT DISTINCT * FROM `".DB_PREFIX."pavmap_group_location` WHERE group_location_id = " . (int)$group_location_id;
		$query = $this->db->query($sql);
		$row = $query->row;
		return $row;
	}

	/**
	 * [editGroupLocation]
	 * @param  [type] $location_id
	 * @param  array  $data
	 */
	public function editGroupLocation($group_location_id, $data = array()){
		if(isset($data) && !empty($data)) {
			$sql = "UPDATE " . DB_PREFIX . "pavmap_group_location SET 
				`name` = '" . $this->db->escape($data['group_name']) . "',
				status = '" . $this->db->escape($data['group_status']) . "',
				store_id = '" . $this->db->escape($data['group_store']) . "'
				WHERE group_location_id = '" . (int)$group_location_id . "'";
			$this->db->query($sql);
		}
		return true;
	}

	/**
	 * [addLocation]
	 * @param array $data
	 */
	public function addGroupLocation($data = array()) {
		if(isset($data) && !empty($data)) {
			$sql = "INSERT INTO " . DB_PREFIX . "pavmap_group_location(`name`,`store_id`,`status`) 
				VALUES('" . $this->db->escape($data['group_name']) . "','" . $this->db->escape($data['group_store']) . "','" . $this->db->escape($data['group_status']) . "')";
			$this->db->query($sql);
		}
		return true;
	}

	/**
	 * [deleteGroupLocation]
	 * @param  [type] $data
	 */
	public function deleteGroupLocation($data){

		if (isset($data) && !empty($data)) {
			foreach ($data as $group_location_id) {
				$this->db->query("DELETE FROM `" . DB_PREFIX . "pavmap_group_location` WHERE group_location_id = '" . (int)$group_location_id . "'");
			}
		}
		return true;
	}


	/**
	 * [buildQuery Locations]
	 * @param  array   $data
	 * @param  boolean $get_total
	 * @return array   $sql
	 */
	public function buildQuery($data = array(), $get_total = false){

		if($get_total){
			$sql = "SELECT count(l.location_id) AS total FROM `".DB_PREFIX."pavmap_location` as l
					LEFT JOIN `".DB_PREFIX."pavmap_location_description` ld ON l.location_id = ld.location_id
					WHERE ld.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		}else{
			$sql = "SELECT l.*, ld.title, ld.content FROM `".DB_PREFIX."pavmap_location` l 
					LEFT JOIN `".DB_PREFIX."pavmap_location_description` ld ON l.location_id = ld.location_id
					WHERE ld.language_id = '" . (int)$this->config->get('config_language_id') . "'";
		}
		$limit_start = 0;
		$limit_end = isset($data['limit'])?$data['limit']:20;
		if(isset($data['page'])){
			$limit_start = ((int)$data['page'] -1) * $limit_end;
			$limit_start = $limit_start < 0?0:$limit_start;
		}
		$limit = " LIMIT ".$limit_start.",".$limit_end;

		$array_sorts = array("ld.title",
							 "l.location_id",
							);
		$sort = "title";
		$order = "ASC";

		if(isset($data['sort'])){
			$sort = in_array($data['sort'], $array_sorts)?$data['sort']:$sort;
			$order = (isset($data['order'])&&!empty($data['order']))?$data['order']:$order;
		}
		$ordering = " ORDER BY `".$sort."` ".$order;

		$where = array();
		if(isset($data['filter'])){
			foreach($data['filter'] as $key=>$val) {
				if ( $key == "title" ) {
					$where[] = " ld.{$key} LIKE '%".$this->db->escape($val)."%'";
				} elseif($val != NULL && $val !="") {
					$where[] = " l.{$key}=".$this->db->escape($val);
				}
			}
		}

		if($get_total){
			$limit = "";
			$ordering = "";
		}

		$sql .= !empty($where)?" AND ".implode(" AND ",$where).$ordering.$limit:"".$ordering.$limit;
		return $sql;
	}

	public function getTotalLocations($data = array()){
		$sql = $this->buildQuery($data, true);
		$query = $this->db->query($sql);
		if($query->num_rows >0){
			return $query->row['total'];
		}
		return 0;
	}

	/**
	 * [getLocations]
	 * @param  array  $data
	 */
	public function getLocations($data = array()){
		$sql = $this->buildQuery($data);
		$query = $this->db->query($sql);
		return $query->rows;
	}

	/**
	 * [getLocation]
	 * @param  [type]  $location_id
	 * @return [array] $row
	 */
	public function getLocation($location_id) {
		$sql = "SELECT DISTINCT * FROM `".DB_PREFIX."pavmap_location` WHERE location_id = " . (int)$location_id;
		$query = $this->db->query($sql);
		$row = $query->row;

		$sql2 = "SELECT language_id, title, content FROM `".DB_PREFIX."pavmap_location_description` WHERE location_id = " . (int)$location_id;
		$query2 = $this->db->query($sql2);
		$rows2 = $query2->rows;

		$arrtitle = array();
		$arrcontent = array();
		foreach ($rows2 as $value) {
			$arrtitle[$value['language_id']] = $value['title'];
			$arrcontent[$value['language_id']] = $value['content'];

		}

		$row['title'] = $arrtitle;
		$row['content'] = $arrcontent;

		return $row;
	}

	/**
	 * [editLocation
	 * @param  [type] $location_id
	 * @param  array  $data
	 */
	public function editLocation($location_id, $data = array()){
		if(isset($data) && !empty($data)) {
			$sql = "UPDATE " . DB_PREFIX . "pavmap_location SET 
				link = '" . $this->db->escape($data['location_link']) . "',
				address = '" . $this->db->escape($data['location_address']) . "',
				group_location_id = '" . $this->db->escape($data['location_group']) . "',
				status = '" . $this->db->escape($data['location_status']) . "',
				latitude = '" . $this->db->escape($data['location_latitude']) . "', 
				longitude = '" . $this->db->escape($data['location_longitude']) . "', 
				icon = '" . $this->db->escape(html_entity_decode($data['location_icon'], ENT_QUOTES, 'UTF-8')) . "', 
				image = '" . $this->db->escape(html_entity_decode($data['location_image'], ENT_QUOTES, 'UTF-8')) . "'
				WHERE location_id = '" . (int)$location_id . "'";
			$this->db->query($sql);

			$this->load->model('localisation/language');
			$languages = $this->model_localisation_language->getLanguages();

			if( isset($data["location_title"]) && isset($data["location_content"])){
				$sql = " DELETE FROM ".DB_PREFIX ."pavmap_location_description WHERE location_id=".(int)$data["location_id"];
				$this->db->query( $sql );

				foreach( $languages as $language ){
					$sql = "INSERT INTO ".DB_PREFIX ."pavmap_location_description(`language_id`, `location_id`,`title`,`content`) 
								VALUES('".$language['language_id']."','".$data['location_id']."','".$this->db->escape(trim($data["location_title"][$language['language_id']] ))."','".$this->db->escape(trim($data["location_content"][$language['language_id']]))."')";
					$this->db->query( $sql );
				}
			}
		}
		return true;
	}

	/**
	 * [addLocation]
	 * @param array $data
	 */
	public function addLocation($data = array()) {
		if(isset($data) && !empty($data)) {
			$sql = "INSERT INTO " . DB_PREFIX . "pavmap_location(`group_location_id`,`link`,`address`,`latitude`,`longitude`,`icon`,`image`,`status`) 
				VALUES('" . $this->db->escape($data['location_group']). "','" . $this->db->escape($data['location_link']) . "','" . $this->db->escape($data['location_address']) . "','" . $this->db->escape($data['location_latitude']) . "','" . $this->db->escape($data['location_longitude']) . "','" . $this->db->escape(html_entity_decode($data['location_icon'], ENT_QUOTES, 'UTF-8')) . "','" . $this->db->escape(html_entity_decode($data['location_image'], ENT_QUOTES, 'UTF-8')) . "','" . $this->db->escape($data['location_status']) . "')";
			$this->db->query($sql);

			$location_id = $this->db->getLastId();

			$this->load->model('localisation/language');
			$languages = $this->model_localisation_language->getLanguages();

			if( isset($data["location_title"]) && isset($data["location_content"])){
				$sql = " DELETE FROM ".DB_PREFIX ."pavmap_location_description WHERE location_id=".(int)$location_id;
				$this->db->query( $sql );

				foreach( $languages as $language ){
					$sql = "INSERT INTO ".DB_PREFIX ."pavmap_location_description(`language_id`, `location_id`,`title`,`content`) 
								VALUES('".$language['language_id']."','".(int)$location_id."','".$this->db->escape(trim($data["location_title"][$language['language_id']] ))."','".$this->db->escape(trim($data["location_content"][$language['language_id']]))."')";
					$this->db->query( $sql );
				}
			}
		}
		return true;
	}

	/**
	 * [deleteLocation]
	 * @param  [type] $data
	 */
	public function deleteLocation($data){

		if (isset($data) && !empty($data)) {
			foreach ($data as $location_id) {
				$this->db->query("DELETE FROM `" . DB_PREFIX . "pavmap_location_description` WHERE location_id = '" . (int)$location_id . "'");
				$this->db->query("DELETE FROM `" . DB_PREFIX . "pavmap_location` WHERE location_id = '" . (int)$location_id . "'");
			}
		}
		return true;
	}

}