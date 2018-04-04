<?php 
if( !class_exists("ModuleSample") ) {
	class ModuleSample { 
		public static function getModules(){ 
			$modules = array(
				'banner',
				'account',
				'affiliate',
				'latest',
				'filter',

				'pavblog',
				'pavblogcategory',
				'pavblogcomment',
				'pavbloglatest',
							
				'pavcarousel',
				'pavdeals',
				'pavmap',
				'pavmegamenu',
				'pavnewsletter',
				'pavproductcarousel',
				'pavproducts',
				'pavsliderlayer',
				'pavsocial',
				'pavverticalmenu',
				
			);
	
			return $modules;
		}
		
		public static function getTables(){
			$tables = array();

			$tables['pavmegamenu']['megamenu'] = array( 'table' => 'megamenu', 'lang'=>false, 'module'=>'pavmegamenu' );
			$tables['pavmegamenu']['megamenu_description'] = array( 'table' => 'megamenu_description', 'lang'=>true, 'module'=>'pavmegamenu' );
			$tables['pavmegamenu']['megamenu_widgets'] = array( 'table' => 'megamenu_widgets', 'lang'=>false, 'module'=>'pavmegamenu' );

			$tables['pavverticalmenu']['verticalmenu'] = array( 'table' => 'verticalmenu', 'lang'=>false, 'module'=>'pavverticalmenu' );
			$tables['pavverticalmenu']['verticalmenu_description'] = array( 'table' => 'verticalmenu_description', 'lang'=>true, 'module'=>'pavverticalmenu' );
			$tables['pavverticalmenu']['verticalmenu_widgets'] = array( 'table' => 'verticalmenu_widgets', 'lang'=>false, 'module'=>'pavverticalmenu' );
			
			$tables['pavblog']['pavblog_blog'] = array( 'table' => 'pavblog_blog', 'lang'=>false, 'module'=>'pavblog' );
			$tables['pavblog']['pavblog_blog_description'] = array( 'table' => 'pavblog_blog_description', 'lang'=>true, 'module'=>'pavblog' );
			$tables['pavblog']['pavblog_category'] = array( 'table' => 'pavblog_category', 'lang'=>false, 'module'=>'pavblog' );
			$tables['pavblog']['pavblog_category_description'] = array( 'table' => 'pavblog_category_description', 'lang'=>true, 'module'=>'pavblog' );
			$tables['pavblog']['pavblog_comment'] = array( 'table' => 'pavblog_comment', 'lang'=>false, 'module'=>'pavblog' );

			$tables['pavsliderlayer']['pavoslidergroups'] = array( 'table' => 'pavoslidergroups', 'lang'=>false, 'module'=>'pavsliderlayer' );
			$tables['pavsliderlayer']['pavosliderlayers'] = array( 'table' => 'pavosliderlayers', 'lang'=>false, 'module'=>'pavsliderlayer' );

			return $tables; 
		}

		public static function getModulesQuery(){
			$query = array();
			if( is_file(dirname(__FILE__).'/query-tables.php') ){
				include( dirname(__FILE__).'/query-tables.php' );
				include( dirname(__FILE__).'/query.php' );
			}
			elseif( is_file(dirname(__FILE__).'/query.php') ){
				include( dirname(__FILE__).'/query.php' );
			}
			return $query;
		}

		public static function installCustomSetting( $m ){
			
			$d['pavblog'] = array(
						'general_lwidth'=> '818',
						'general_lheight'=> '479',
						'general_swidth'=> '818',	
						'general_sheight'=> '479',
						'general_xwidth' => '80',
						'general_xheight' => '80',
						'rss_limit_item' => 12,
						'keyword_listing_blogs_page'=>'blogs',


						'children_columns' => '3',
						'general_cwidth' => '261',	
						'general_cheight' => '153',
						'cat_limit_leading_blog'=> '1',
						'cat_limit_secondary_blog'=> '5',
						'cat_leading_image_type'=> 'l',
						'cat_secondary_image_type'=> 'l',
						'cat_columns_leading_blog'=> 1,
						'cat_columns_secondary_blogs' => 1,
						'cat_show_title'=> '1',
						'cat_show_description' => '1',
						'cat_show_readmore' => 1,
						'cat_show_image'=> '1',
						'cat_show_author'=> '1',	
						'cat_show_category'=> '1',
						'cat_show_created'=> '0',
						'cat_show_hits' => '1',
						'cat_show_comment_counter'=> '1',
						

						'blog_image_type'=> 'l',
						'blog_show_title'=> '1',
						'blog_show_image'=> '1',
						'blog_show_author'=> '1',
						'blog_show_category'=> '1',
						'blog_show_created'=> '1',
						'blog_show_comment_counter'=> '1',
						'blog_show_hits' => 1,
						'blog_show_comment_form'=>'1',
						'comment_engine' => 'local',
						'diquis_account' => 'pavothemes',
						'facebook_appid' => '100858303516',
						'comment_limit'=> '10',
						'facebook_width'=> '600',
						'auto_publish_comment'=>0,
						'enable_recaptcha' => 1,
						'recaptcha_public_key'=>'6LcoLd4SAAAAADoaLy7OEmzwjrf4w7bf-SnE_Hvj',
						'recaptcha_private_key'=>'6LcoLd4SAAAAAE18DL_BUDi0vmL_aM0vkLPaE9Ob',
						
						'cat_columns_leading_blogs'=> 1,


			);

			$m->load->model('setting/setting');
			$m->model_setting_setting->editSetting('pavblog', $d );	
		}
		
		public static function getStoreConfigs(){
			return array(
					'config_image_category_width' =>873,
					'config_image_category_height' => 240,
					
					'config_image_thumb_width' => 453,
					'config_image_thumb_height' => 397,
					
					'config_image_popup_width' =>630,
					'config_image_popup_height' => 552,
					
					'config_image_product_width' =>190,
					'config_image_product_height' => 166,
					
					'config_image_additional_width' =>92,
					'config_image_additional_height' => 81,
					
					'config_image_related_width' =>163,
					'config_image_related_height' => 143,
					
					'config_image_compare_width' =>100,
					'config_image_compare_height' => 88,
					
					'config_image_wishlist_width' =>70,
					'config_image_wishlist_height' => 61,
					
					'config_image_cart_width' =>70,
					'config_image_cart_height' => 61,

					'config_template' => lexus_nextstore,
					'logo_type' => logo-opencart,
					'quickview' => 1,
					'category_pzoom' => 0,
			);
		}	
	}
}
?>