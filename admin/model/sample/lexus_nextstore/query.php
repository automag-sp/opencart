<?php 

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `group`='pavmegamenu' and `key` = 'pavmegamenu_module'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `group`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavmegamenu', 'pavmegamenu_module', 'a:1:{i:0;a:4:{s:9:\"layout_id\";s:5:\"99999\";s:8:\"position\";s:8:\"mainmenu\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";i:1;}}', 1);";

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `group`='pavmegamenu_params' and `key` = 'params'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `group`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavmegamenu_params', 'params', '[{\"id\":41,\"group\":0,\"cols\":1,\"subwidth\":1152,\"submenu\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-3\",\"colwidth\":5,\"colclass\":\"hidden-heading-title\"},{\"widgets\":\"wid-2\",\"colwidth\":3},{\"widgets\":\"wid-7\",\"colwidth\":2},{\"widgets\":\"wid-8\",\"colwidth\":2}]}]},{\"submenu\":1,\"subwidth\":762,\"id\":5,\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-5\",\"colwidth\":12}]}]},{\"id\":3,\"group\":0,\"cols\":1,\"submenu\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":32,\"group\":0,\"cols\":1,\"submenu\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":33,\"group\":0,\"cols\":1,\"submenu\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);";


$query['pavblog'][] ="

INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `group`, `key`, `value`, `serialized`) VALUES
(0, 0, 'pavblog', 'pavblog', 'a:42:{s:14:\"general_lwidth\";s:3:\"818\";s:15:\"general_lheight\";s:3:\"479\";s:14:\"general_swidth\";s:3:\"818\";s:15:\"general_sheight\";s:3:\"479\";s:14:\"general_xwidth\";s:2:\"80\";s:15:\"general_xheight\";s:2:\"80\";s:14:\"rss_limit_item\";s:2:\"12\";s:26:\"keyword_listing_blogs_page\";s:5:\"blogs\";s:16:\"children_columns\";s:1:\"3\";s:14:\"general_cwidth\";s:3:\"261\";s:15:\"general_cheight\";s:3:\"153\";s:22:\"cat_limit_leading_blog\";s:1:\"1\";s:24:\"cat_limit_secondary_blog\";s:1:\"5\";s:22:\"cat_leading_image_type\";s:1:\"l\";s:24:\"cat_secondary_image_type\";s:1:\"s\";s:24:\"cat_columns_leading_blog\";s:1:\"1\";s:27:\"cat_columns_secondary_blogs\";s:1:\"1\";s:14:\"cat_show_title\";s:1:\"1\";s:20:\"cat_show_description\";s:1:\"1\";s:17:\"cat_show_readmore\";s:1:\"1\";s:14:\"cat_show_image\";s:1:\"1\";s:15:\"cat_show_author\";s:1:\"1\";s:17:\"cat_show_category\";s:1:\"1\";s:16:\"cat_show_created\";s:1:\"1\";s:13:\"cat_show_hits\";s:1:\"1\";s:24:\"cat_show_comment_counter\";s:1:\"1\";s:15:\"blog_image_type\";s:1:\"l\";s:15:\"blog_show_title\";s:1:\"1\";s:15:\"blog_show_image\";s:1:\"1\";s:16:\"blog_show_author\";s:1:\"1\";s:18:\"blog_show_category\";s:1:\"1\";s:17:\"blog_show_created\";s:1:\"1\";s:25:\"blog_show_comment_counter\";s:1:\"1\";s:14:\"blog_show_hits\";s:1:\"1\";s:22:\"blog_show_comment_form\";s:1:\"1\";s:14:\"comment_engine\";s:5:\"local\";s:14:\"diquis_account\";s:10:\"pavothemes\";s:14:\"facebook_appid\";s:12:\"100858303516\";s:13:\"comment_limit\";s:2:\"10\";s:14:\"facebook_width\";s:3:\"600\";s:20:\"auto_publish_comment\";s:1:\"0\";s:16:\"enable_recaptcha\";s:1:\"1\";}', 1),
(0, 0, 'pavblog_frontmodules', 'pavblog_frontmodules', 'a:1:{s:7:\"modules\";a:3:{i:0;s:15:\"pavblogcategory\";i:1;s:14:\"pavblogcomment\";i:2;s:13:\"pavbloglatest\";}}', 1),
(0, 0, 'pavblogcategory', 'pavblogcategory_module', 'a:1:{i:1;a:5:{s:11:\"category_id\";s:1:\"1\";s:9:\"layout_id\";s:2:\"12\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}}', 1),
(0, 0, 'pavblogcomment', 'pavblogcomment_module', 'a:1:{i:1;a:5:{s:5:\"limit\";s:1:\"6\";s:9:\"layout_id\";s:2:\"12\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"3\";}}', 1),
(0, 0, 'pavbloglatest', 'pavbloglatest_module', 'a:2:{i:1;a:10:{s:11:\"description\";a:2:{i:1;s:0:\"\";i:2;s:0:\"\";}s:4:\"tabs\";s:6:\"latest\";s:5:\"width\";s:3:\"239\";s:6:\"height\";s:3:\"140\";s:4:\"cols\";s:1:\"3\";s:5:\"limit\";s:1:\"6\";s:9:\"layout_id\";s:2:\"12\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}i:2;a:10:{s:11:\"description\";a:2:{i:1;s:0:\"\";i:2;s:0:\"\";}s:4:\"tabs\";s:6:\"latest\";s:5:\"width\";s:3:\"239\";s:6:\"height\";s:3:\"140\";s:4:\"cols\";s:1:\"4\";s:5:\"limit\";s:1:\"4\";s:9:\"layout_id\";s:1:\"1\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";i:5;}}', 1);
";


$query['pavblog'][] =" DELETE FROM `".DB_PREFIX ."layout_route` WHERE `route` LIKE '%pavblog%' ; ";
$query['pavblog'][] =" DELETE FROM `".DB_PREFIX ."layout` WHERE `name` LIKE '%Pav Blog%'; ";


$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(33, 12, 0, 'pavblog/');
";
$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout` (`layout_id`, `name`) VALUES
(12, 'Pav Blog');
";


$query['pavverticalmenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `group`='pavverticalmenu' and `key` = 'pavverticalmenu_module'";
$query['pavverticalmenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `group`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavverticalmenu', 'pavverticalmenu_module', 'a:6:{i:0;a:4:{s:9:\"layout_id\";s:1:\"1\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";i:1;}i:1;a:4:{s:9:\"layout_id\";s:1:\"3\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}i:2;a:4:{s:9:\"layout_id\";s:1:\"5\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}i:3;a:4:{s:9:\"layout_id\";s:2:\"14\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}i:4;a:4:{s:9:\"layout_id\";s:2:\"13\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}i:5;a:4:{s:9:\"layout_id\";s:2:\"15\";s:8:\"position\";s:11:\"column_left\";s:6:\"status\";s:1:\"1\";s:10:\"sort_order\";s:1:\"1\";}}', 1);";

$query['pavverticalmenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `group`='pavverticalmenu_params' and `key` = 'params'";
$query['pavverticalmenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `group`, `key`, `value`, `serialized`) VALUES

(0, 0, 'pavverticalmenu_params', 'params', '[{\"submenu\":1,\"subwidth\":600,\"id\":44,\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-4\",\"colwidth\":12,\"colclass\":\"hidden-heading-title\"}]},{\"cols\":[{\"widgets\":\"wid-10\",\"colwidth\":12,\"colclass\":\"hidden-heading-title\"}]}]},{\"id\":5,\"group\":0,\"cols\":1,\"subwidth\":605,\"submenu\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-5\",\"colwidth\":12,\"colclass\":\"hidden-heading-title\"}]}]},{\"id\":7,\"group\":0,\"cols\":1,\"subwidth\":600,\"submenu\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-2\",\"colwidth\":5},{\"widgets\":\"wid-9\",\"colwidth\":7}]},{\"cols\":[{\"widgets\":\"wid-8\",\"colwidth\":5},{\"widgets\":\"wid-7\",\"colwidth\":7,\"colclass\":\"hidden-heading-title\"}]}]},{\"id\":3,\"group\":0,\"cols\":1,\"submenu\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":26,\"group\":0,\"cols\":1,\"submenu\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":28,\"group\":0,\"cols\":1,\"submenu\":1,\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);";


?>