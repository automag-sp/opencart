<?php
/******************************************************
 * @package Pav Opencart Theme Framework for Opencart 1.5.x
 * @version 2.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) October 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

class ModelSampleModule extends Model {
	
	/**
	 * get data sample by actived theme
	 */
	public function getSamplesByTheme( $theme ){
		$this->load->model('setting/extension');
		$extensions = $this->model_setting_extension->getInstalled('module');
	
		$output = array();
		$files = glob(  dirname(__FILE__).'/'.$theme.'/modules/*.php' );
		foreach( $files as $dir ){
			$module = str_replace(".php","",basename( $dir ));
			if( !is_file(DIR_APPLICATION."controller/module/".$module.".php") ){	
				$moduleName = $module;
				$existed = 0;
			}else {
				$this->language->load( 'module/'.$module );		
				$moduleName = $this->language->get('heading_title');
				$existed = 1;
			}
			
			$data = $this->config->get($module . '_module');
			 
			$output[$module] = array('extension_installed' => in_array($module,$extensions), 
									 "module"    => $module ,
									 'existed'   => $existed, 
									 'installed' => empty($data)?0:1, 
									 'moduleName'=> $moduleName );
	
		}		

		return $output;
	}
	
	/**
	 * get modules having queries
	 */
	public function getModulesQuery( $theme ){

		if( is_file(dirname(__FILE__).'/'.$theme.'/sample.php') ) {

			require( dirname(__FILE__).'/'.$theme.'/sample.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/';

			$this->load->model('setting/extension');
			
			$query 	    =  ModuleSample::getModulesQuery();
			$modules    = array();
			$extensions = $this->model_setting_extension->getInstalled('module');

			foreach( $query as $key=>$q ) {
				if(  in_array($key,$extensions) ){
					$this->language->load('module/' . $key);
					$modules[$key] = $this->language->get( 'heading_title' );
				}
			}
			
			return $modules;
		}	
		return array();
	}
	
	/**
	 * export data sample of modules
	 */
	public function export( $theme ) {
		if( is_file(dirname(__FILE__).'/'.$theme.'/sample.php') ) {
			require( dirname(__FILE__).'/'.$theme.'/sample.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/modules/';
			if(  !is_dir($dir) ){
				mkdir( $dir, 0755 );
			}
			$modules = ModuleSample::getModules();

			if( method_exists("ModuleSample", "getTables") ){

				$infotables = ModuleSample::getTables();
				$output = array();
				$ctables = array();

				foreach( $infotables as $module => $tables ){

					foreach( $tables as $tableName => $table ){

						// export sql database structures
						$sql = ' SHOW CREATE TABLE  '.DB_PREFIX.$table['table'];
						$query = $this->db->query( $sql );
						$row =  $query->row;
					
						if( isset($row['Create Table']) ){
							$tmp = str_replace("CREATE TABLE", "CREATE TABLE IF NOT EXISTS ", $row['Create Table'] );
							$tmp = str_replace( DB_PREFIX, '".DB_PREFIX."', $tmp );
							$ctables[] = '$query[\''.$module.'\'][]="'.$tmp.'";'."\r\n\r\n"; 
						}
						// export data;
						$sql = ' SELECT * FROM '.DB_PREFIX.$table['table'];

						if( isset($table['lang']) && $table['lang'] ){
							$sql .= ' WHERE language_id='.(int)$this->config->get('config_language_id') ;
						}

						$query = $this->db->query( $sql );
						$rows =  $query->rows;
					
						if( $rows ){
							
							foreach( $rows as   $row ){
								$fs = array();
								$vs = array();
								
								foreach( $row as $key => $value ){ 
									$fs[] = $key;
									if( $key == 'language_id' ){
										$value="LANGUAGEID";
									}
									$vs[] = "'".$this->db->escape( $value )."'";
								}

								$output[] = ' $query[\''.$table['table'].'\'][]="INSERT INTO ".DB_PREFIX."'.$table['table'].'( `'.implode( "`,`", $fs).'` ) VALUES('.implode(", ",  $vs).')"; '. "\r\n" ;	
							}

						}

					}
				}

	

				if( !empty($ctables) ){
					$string = "<?php \r\n \r\n ".implode( ' ', $ctables ) ." ?>";  
					$fp = fopen( dirname($dir).'/query-tables.php', 'w');
					fwrite($fp, $string );
					fclose($fp);
				}


				if( !empty($output) ){
					$string = "<?php \r\n \r\n ".implode( ' ', $output ) ." ?>";  
					$fp = fopen( dirname($dir).'/query-data.php', 'w');
					fwrite($fp, $string );
					fclose($fp);
				}
		 	}
			if( isset($modules) ){
				foreach( $modules as $module ){
					$data = serialize($this->config->get($module . '_module'));
					$fp = fopen( $dir.$module.'.php', 'w');
					fwrite($fp, $data );
					fclose($fp);
				}
		
			}
		}
	}

	public function backup( $theme ){
		$expdir = DIR_CACHE.'backup_'.trim($theme).'/';
		
		if( !is_dir($expdir) ){
			mkdir( $expdir, 0777 );
		}


		if( is_file(dirname(__FILE__).'/'.$theme.'/sample.php') ) {
			require( dirname(__FILE__).'/'.$theme.'/sample.php' );
			$dir =  $expdir;
			$modules = ModuleSample::getModules();
			if( isset($modules) ){
				foreach( $modules as $module ){
					$data = serialize($this->config->get($module . '_module'));
					$fp = fopen( $dir.$module.'.php', 'w');
					fwrite($fp, $data );
					fclose($fp);
				}
		
			}
		}
		return ;
	}

	public function getBackupByTheme( $theme ){
		$output = array();

		$files = glob(  DIR_CACHE.'backup_'.trim($theme).'/*.php');
		foreach( $files as $dir ){
			$module = str_replace(".php","",basename( $dir ));
			$output[$module] = $module;
		}
		return $output;
	}


	public function restoreDataModule( $theme, $module ){
		$this->load->model('setting/setting');
		$dir = DIR_CACHE.'backup_'.trim($theme).'/';
		if( is_file($dir.$module.'.php') ){
			$data = unserialize(file_get_contents( $dir.$module.'.php' ));
			if( is_array($data) ){
				$output = array();
				$output[$module."_module"] = $data; 
				$this->model_setting_setting->editSetting( $module, $output );	
			}
		}	 
	}
	
	public function isTableExisted( $table ){
		$sql = " SHOW TABLES LIKE '".DB_PREFIX.$table."'";

		$query = $this->db->query( $sql );
		$sql = array();

		return count($query->rows);
	}

	/**
	 * install sample query
	 */
	public function installSampleQuery( $theme, $module ){
		if( is_file(dirname(__FILE__).'/'.$theme.'/sample.php') ) {
			require( dirname(__FILE__).'/'.$theme.'/sample.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/';
			
			$this->load->model('setting/extension');
			
			/* execute SQL queries */
			$query =  ModuleSample::getModulesQuery();
			$modules = array();
			
			if( isset($query[$module]) ){
				foreach( $query[$module] as $query ){
					$this->db->query( $query );
				}
			}

			$this->load->model('localisation/language');
			$languages = $this->model_localisation_language->getLanguages();

			if( method_exists("ModuleSample", "getTables") ){
				$tables = ModuleSample::getTables();
				if( is_file(dirname(__FILE__).'/'.$theme.'/query-data.php') ){
					$query = array();
					require( dirname(__FILE__).'/'.$theme.'/query-data.php' );
					if(  isset($tables[$module]) && !empty($query) ){

							

						foreach( $tables[$module] as $table => $info ){
							if( isset($query[$table]) ) {
								$sql = ' SELECT * FROM '.DB_PREFIX.$table.'';
								$sq = $this->db->query( $sql );
								if( count($sq->rows) <= 0 ){
									if( isset($info['lang']) && (int)$info['lang'] ){
										foreach( $languages as $language ){
											foreach( $query[$table] as $s ){
												$this->db->query( str_replace( 'LANGUAGEID', $language['language_id'], $s ) );
											}
										}
									}else{
										foreach( $query[$table] as $s ){
											$this->db->query( $s );
										}
									}
								}	
							}
						}					 
					}
				}
			}	
			die('done');
		}			
		die( 'could not install data sample for this' );
	}

	/**
	 * install store sample
	 */
	public function installStoreSample( $theme ){
		if( is_file(dirname(__FILE__).'/'.$theme.'/sample.php') ) {
			require( dirname(__FILE__).'/'.$theme.'/sample.php' );
			$dir = dirname(__FILE__).'/'.$theme.'/';
			$configs = ModuleSample::getStoreConfigs();

			if( isset($configs) ){
				$this->load->model('setting/setting');
				foreach( $configs as $key => $value ){
					$group = 'config';
					$store_id = 0;	
					$this->db->query("UPDATE " . DB_PREFIX . "setting SET `value` = '" . $this->db->escape($value) . "' WHERE `group` = '" . $this->db->escape($group) . "' AND `key` = '" . $this->db->escape($key) . "' AND store_id = '" . (int)$store_id . "'");
				}
			}
		}
	}
	
	/**
	 * install sample module
	 */
	public function installSample( $theme, $module ){

		$this->load->model('setting/setting');
		$dir = dirname(__FILE__).'/'.$theme.'/modules/'; 
		if( is_file($dir.$module.'.php') ){
			$data = unserialize(file_get_contents( $dir.$module.'.php' ));

			if( is_array($data) ){
				$output = array();
				$output[$module."_module"] = $data; 
				$this->model_setting_setting->editSetting( $module, $output );	
			}
		}	 
	}

	/**
	 *
	 */

}
?>