<?php
/**
 * class ModelPavnewsletterSubscribe
 */
class ModelPavmapLocation extends Model {

	protected $isinstalled = false;

	public function __construct( $registry ){
		parent::__construct( $registry );
		$this->isInstalled();

	}

	/**
	 * check installed
	 */
	public function isInstalled() {
		
		$sql = " SHOW TABLES LIKE '".DB_PREFIX."pavmap_location'";
		$query = $this->db->query( $sql );

		if( count($query->rows) <=0 ){ 
			$file = dirname(DIR_APPLICATION).'/admin/model/sample/module.php';
			if( file_exists($file) ){
				require_once( $file );
		 		$sample = new ModelSampleModule( $this->registry );
		 	    $result = $sample->installSampleQuery( $this->config->get('config_template'),'pavmap', true );  
		 	    
			}
			return false;
		}
		$this->isinstalled = true;

		return true;
	}

	/**
	 * [buildQuery Locations]
	 * @param  array   $data
	 * @param  boolean $get_total
	 */
	public function buildQuery($data = array()){

		$store_id = isset($data['store_id'])?$data['store_id']:0;

		$sql = "SELECT g.store_id, l.*, ld.title, ld.content FROM `".DB_PREFIX."pavmap_location` l 
				LEFT JOIN `".DB_PREFIX."pavmap_location_description` ld ON l.location_id = ld.location_id
				LEFT JOIN `".DB_PREFIX."pavmap_group_location` g ON g.group_location_id = l.group_location_id 
				WHERE ld.language_id = '" . (int)$this->config->get('config_language_id') . "' AND
						l.status = 1 AND g.status = 1 AND g.store_id = " .(int)$store_id;

		$sort = "location_id";
		$order = "DESC";
		$ordering = " ORDER BY `".$sort."` ".$order;

		$limit_start = 0;
		$limit_end = isset($data['limit'])?$data['limit']:20;
		$limit = " LIMIT ".$limit_start.",".$limit_end;

		$sql .= $ordering.$limit;

		return $sql;
	}

	/**
	 * [getLocations]
	 * @param  array  $data
	 * @return array  $rows
	 */
	public function getLocations($data = array()) {
		if( !$this->isinstalled ){
			return array();
		}
		$sql = $this->buildQuery($data);
		$query = $this->db->query($sql);
		return $query->rows;
	}

}