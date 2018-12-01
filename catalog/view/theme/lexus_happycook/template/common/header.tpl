<?php
/******************************************************
 * @package Pav Opencart Theme Framework for Opencart 1.5.x
 * @version 1.1
 * @author http://www.pavothemes.com
 * @copyright    Copyright (C) Augus 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license        GNU General Public License version 2
 *******************************************************/


$themeConfig = $this->config->get('themecontrol');
$themeName = $this->config->get('config_template');
require_once(DIR_TEMPLATE . $this->config->get('config_template') . "/development/libs/framework.php");
$helper = ThemeControlHelper::getInstance($this->registry, $themeName);
$helper->setDirection($direction);
/* Add scripts files */

$helper->addScript('catalog/view/javascript/jquery/jquery-1.7.1.min.js');
$helper->addScript('catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js');

//$helper->addScript('catalog/view/javascript/jquery/ui/minified/jquery.ui.dialog.min.js');
$helper->addScript('catalog/view/javascript/jquery/ui/external/jquery.cookie.js');
$helper->addScript('catalog/view/javascript/common.js?v23');
$helper->addScript('catalog/view/javascript/fast_order.js');
$helper->addScript('catalog/view/theme/' . $themeName . '/javascript/common.js');
$helper->addScript('catalog/view/javascript/jquery/bootstrap/bootstrap.min.js');
$helper->addScript('catalog/view/javascript/garage.js');
$helper->addScript('catalog/view/javascript/bt_automag.js?ts='.md5(date('Y-m-d-h').DB_PASSWORD));

$helper->addScriptList($scripts);

$helper->addCss('catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css');
if (isset($themeConfig['customize_theme'])
    && file_exists(DIR_TEMPLATE . $themeName . '/stylesheet/customize/' . $themeConfig['customize_theme'] . '.css')
) {
    $helper->addCss('catalog/view/theme/' . $themeName . '/stylesheet/customize/' . $themeConfig['customize_theme'] . '.css');
}

$helper->addCss('catalog/view/theme/' . $themeName . '/stylesheet/animation.css');
$helper->addCss('catalog/view/theme/' . $themeName . '/stylesheet/font-awesome.min.css');
$helper->addCss('catalog/view/theme/' . $themeName . '/stylesheet/font.css');
$helper->addCssList($styles);
$helper->addCss('catalog/view/theme/default/stylesheet/fast_order.css');
$helper->addCss('catalog/view/theme/default/stylesheet/bt.css?ts=1'.md5(date('Y-m-d-h').DB_PASSWORD));
$layoutMode = $helper->getParam('layout');

?>
    <!DOCTYPE html>
<html dir="<?php echo $helper->getDirection(); ?>" class="<?php echo $helper->getDirection(); ?>" lang="<?php echo $lang; ?>">
    <head>

        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width">
        <meta charset="UTF-8"/>
        <title><?php echo $title; ?></title>
        <base href="<?php echo $base; ?>"/>
        <?php if ($description) { ?>
            <meta name="description" content="<?php echo $description; ?>"/>
        <?php } ?>
        <?php if ($keywords) { ?>
            <meta name="keywords" content="<?php echo $keywords; ?>"/>
        <?php } ?>
        <?php if ($icon) { ?>
            <link href="<?php echo $icon; ?>" rel="icon"/>
        <?php } ?>
        <?php foreach ($links as $link) { ?>
            <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>"/>
        <?php } ?>
        <?php foreach ($helper->getCssLinks() as $link) { ?>
            <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>"/>
        <?php } ?>


        <?php if ($themeConfig['theme_width'] && $themeConfig['theme_width'] != 'auto') { ?>
            <style> #page-container .container {
                    max-width: <?php echo $themeConfig['theme_width'];?>;
                    width: auto
                }</style>
        <?php } ?>

        <?php if (isset($themeConfig['use_custombg']) && $themeConfig['use_custombg']) { ?>
            <style>
                body {
                    background: url("image/<?php echo $themeConfig['bg_image'];?>") <?php echo $themeConfig['bg_repeat'];?> <?php echo $themeConfig['bg_position'];?> !important;
                }</style>
        <?php } ?>
        <?php
        if (isset($themeConfig['enable_customfont']) && $themeConfig['enable_customfont']) {
            $css = array();
            $link = array();
            for ($i = 1; $i <= 3; $i++) {
                if (trim($themeConfig['google_url' . $i]) && $themeConfig['type_fonts' . $i] == 'google') {
                    $link[] = '<link rel="stylesheet" type="text/css" href="' . trim($themeConfig['google_url' . $i]) . '"/>';
                    $themeConfig['normal_fonts' . $i] = $themeConfig['google_family' . $i];
                }
                if (trim($themeConfig['body_selector' . $i]) && trim($themeConfig['normal_fonts' . $i])) {
                    $css[] = trim($themeConfig['body_selector' . $i]) . " {font-family:" . str_replace("'", '"', htmlspecialchars_decode(trim($themeConfig['normal_fonts' . $i]))) . "}\r\n";
                }
            }
            echo implode("\r\n", $link);
            ?>
            <style>
                <?php echo implode("\r\n",$css);?>
            </style>
        <?php } else { ?>

        <?php } ?>
    <?php foreach ($helper->getScriptFiles() as $script) { ?>
            <script type="text/javascript" src="<?php echo $script; ?>"></script>
        <?php } ?>


        <?php if (isset($themeConfig['custom_javascript']) && !empty($themeConfig['custom_javascript'])) { ?>
            <script type="text/javascript"><!--
                $(document).ready(function () {
                    <?php echo html_entity_decode(trim($themeConfig['custom_javascript'])); ?>
                });
                //--></script>
        <?php } ?>

        <!--[if lt IE 9]>
        <?php if( isset($themeConfig['load_live_html5'])  && $themeConfig['load_live_html5'] ) { ?>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <?php } else { ?>
        <script src="catalog/view/javascript/html5.js"></script>
        <?php } ?>
        <script src="catalog/view/javascript/respond.min.js"></script>
        <link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/ie8.css"/>
        <![endif]-->
        <?php if (isset($themeConfig['enable_paneltool']) && $themeConfig['enable_paneltool']) { ?>
            <link href="catalog/view/theme/<?php echo $themeName; ?>/stylesheet/paneltool.css" rel="stylesheet"/>
            <script type="text/javascript" src="catalog/view/javascript/jquery/colorpicker/js/colorpicker.js"></script>
            <link href="catalog/view/javascript/jquery/colorpicker/css/colorpicker.css" rel="stylesheet"/>
        <?php } ?>
        <?php if (isset($stores) && $stores) { ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    <?php foreach ($stores as $store) { ?>
                    $('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
                    <?php } ?>
                });
                </script>
        <?php } ?>
        <?php echo $google_analytics; ?>
			<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.11.1.min.js"></script>
			<script type="text/javascript">
				var jQuery_1_11_1 = $.noConflict(true);
			</script>
			<script type="text/javascript" src="catalog/view/javascript/jquery.jcarousellite.js"></script>

    </head>
<body id="offcanvas-container" class="<?php print (defined('ALEXA')?'alexa ':'sergi ');?>offcanvas-container layout-<?php echo $layoutMode; ?> fs<?php echo $themeConfig['fontsize']; ?> <?php echo $helper->getPageClass(); ?> <?php echo $helper->getParam('body_pattern', ''); ?>">
<?php
if (isset($_GET['qv']) && ($_GET['qv'] == 1)) {

} else {
    ?>
    <section id="page" class="offcanvas-pusher" role="main">
    <section id="header">
        <section id="topbar">
            <div class="container">
                <div class="pull-left">
                    <div class="row topbar hidden-sm hidden-xs">
                        <ul class="links pull-left">
                            <li class="search">
                                <div id="search" class="pull-left">
                                    <input type="text" name="search" id="search_input_11" placeholder="<?php echo $text_search; ?>" value="<?php echo $search; ?>"/>
                                    <span class="fa fa-search button-search"></span>
                                </div>
                            </li>
                            <li><a class="delivery" href="<?php print $this->url->link('vin/form');?>"><span class="fa fa-car"></span><span class="text-link hidden-xs hidden-sm">Запрос по VIN</span></a></li>
                            <li><a class="delivery" href="<?php print $this->url->link('information/information','information_id=8');?>"><span class="fa fa-truck"></span><span class="text-link hidden-xs hidden-sm">Доставка</span></a></li>
                            <li><a class="payment" href="<?php print $this->url->link('information/information','information_id=7');?>"><span class="fa fa-credit-card"></span><span class="text-link hidden-xs hidden-sm">Оплата</span></a></li>
                            <li><a class="contact" href="<?php print $this->url->link('information/information','information_id=6');?>"><span class="fa fa-map-marker"></span><span class="text-link hidden-xs hidden-sm">Контакты</span></a></li>
                            <li><a class="account" href="<?php echo $account; ?>"><span class="fa fa-user"></span><span class="text-link hidden-xs hidden-sm"><?php echo $text_account; ?></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="cart pull-right">
                        <?php echo $cart; ?>
                    </div>
                    <div class="pull-right hidden-lg hidden-sm hidden-md visible-xs account-wrapper">
                        <a class="account" href="<?php echo $account; ?>"><span class="fa fa-user"></span><span class="text-link hidden-xs hidden-sm"><?php echo $text_account; ?></span></a>
                    </div>
                    <div class="pull-right telephone sergi hidden-xs hidden-sm"><a class="text-link" href="tel://<?php print $this->config->get('config_telephone'); ?>"><span class="fa fa-phone"></span>&nbsp; <span class="text-link"><?php print $this->config->get('config_telephone');
                    ?></a></span></div>
                    <div class="pull-right telephone alexa hidden-xs hidden-sm"><a class="text-link" href="tel://<?php print A_PHONE;?>"><span class="fa fa-phone"></span>&nbsp; <span class="text-link"><?php print A_PHONE;?></a></span></div>
                </div>
                <div class="pull-left show-mobile hidden-lg hidden-md">
                    <div class="pull-left">
                        <input type="text" name="search" placeholder="<?php echo $text_search; ?>" value="<?php echo $search; ?>"/>
                        <span class="fa fa-search button-search"></span>
                    </div>
                </div>


            </div>
        </section>

        <section id="pav-mainnav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php if ($logo) { ?>
                            <div id="logo"><a href="<?php echo $home; ?>"><img src="/image/data/automag-sp.jpg<?php // echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>"/></a></div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 mainmenu">
                        <?php
                        /**
                         * Main Menu modules: as default if do not put megamenu, the theme will use categories menu for main menu
                         */
                        $modules = $helper->getModulesByPosition('mainmenu');
                        if (count($modules) && !empty($modules)) {

                            ?>

                            <?php foreach ($modules as $module) { ?>
                                <?php echo $module; ?>
                            <?php } ?>

                        <?php } elseif ($categories) { ?>

                            <div class="navbar navbar-inverse">
                                <nav id="mainmenutop" class="pav-megamenu" role="navigation">

                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                                        <ul class="nav navbar-nav">
                                            <li class="first"><a href="<?php echo $home; ?>" title="<?php echo $this->language->get('text_home'); ?>"><?php echo $this->language->get('text_home'); ?></a></li>
                                            <?php foreach ($categories as $category) { ?>

                                                <?php if ($category['children']) { ?>
                                                    <li class="parent dropdown deeper "><a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?>
                                                        <b class="caret"></b>
                                                    </a>
                                                <?php } else { ?>
                                                    <li ><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
                                                <?php } ?>
                                                <?php if ($category['children']) { ?>
                                                    <ul class="dropdown-menu">
                                                        <?php for ($i = 0; $i < count($category['children']);) { ?>

                                                            <?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
                                                            <?php for (; $i < $j; $i++) { ?>
                                                                <?php if (isset($category['children'][$i])) { ?>
                                                                    <li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
                                                                <?php } ?>
                                                            <?php } ?>

                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </nav>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section id="sys-notification">
        <div class="container">

            <?php if ($error) { ?>
                <div class="warning"><?php echo $error ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close"/></div>
            <?php } ?>

            <div id="notification"></div>
        </div>
    </section>

    <?php
    /**
     * Slideshow modules
     */
    $modules = $helper->getModulesByPosition('slideshow');
    if ($modules) {
        ?>
        <section id="pav-slideshow" class="pav-slideshow hidden-xs">
            <?php foreach ($modules as $module) { ?>
                <?php echo $module; ?>
            <?php } ?>
        </section>
    <?php } ?>


    <?php
    /**
     * Promotion modules
     * $ospans allow overrides width of columns base on thiers indexs. format array( column-index=>span number ), example array( 1=> 3 )[value from 1->12]
     */
    $modules = $helper->getModulesByPosition('showcase');
    $ospans = array();

    if (count($modules)) {
        $cols = isset($config['block_showcase']) && $config['block_showcase'] ? (int)$config['block_showcase'] : count($modules);
        $class = $helper->calculateSpans($ospans, $cols);
        ?>
        <section class="pav-showcase" id="pav-showcase">
            <div class="container">
                <?php $j = 1;
                foreach ($modules as $i => $module) { ?>
                    <?php if ($i++ % $cols == 0 || count($modules) == 1) {
                        $j = 1; ?><div class="row"><?php } ?>
                    <div class="<?php echo $class[$j]; ?>"><?php echo $module; ?></div>
                    <?php if ($i % $cols == 0 || $i == count($modules)) { ?></div><?php } ?>
                    <?php $j++;
                } ?>
            </div>
        </section>
    <?php } ?>


    <?php
    /**
     * Promotion modules
     * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
     */
    $modules = $helper->getModulesByPosition('promotion');
    $ospans = array(1 => 8, 2 => 4);

    if (count($modules)) {
        $cols = isset($config['block_promotion']) && $config['block_promotion'] ? (int)$config['block_promotion'] : count($modules);
        $class = $helper->calculateSpans($ospans, $cols);
        ?>
        <section class="pav-promotion" id="pav-promotion">
            <div class="container">
                <?php $j = 1;
                foreach ($modules as $i => $module) { ?>
                    <?php if ($i++ % $cols == 0 || count($modules) == 1) {
                        $j = 1; ?><div class="row"><?php } ?>
                    <div class="<?php echo $class[$j]; ?>"><?php echo $module; ?></div>
                    <?php if ($i % $cols == 0 || $i == count($modules)) { ?></div><?php } ?>
                    <?php $j++;
                } ?>
            </div>
        </section>
    <?php } ?>

    <?php if (isset($themeConfig['enable_offsidebars']) && $themeConfig['enable_offsidebars']) { ?>
    <section id="columns" class="offcanvas-siderbars">
    <div class="container">
    <?php
    /*
    ?>
    <div class="row visible-xs">
        <div class="container">
            <div class="offcanvas-sidebars-buttons">
                <button type="button" data-for="column-left" class="pull-left btn btn-danger"><i class="glyphicon glyphicon-indent-left"></i> <?php echo $this->language->get('text_sidebar_left'); ?></button>

                <button type="button" data-for="column-right" class="pull-right btn btn-danger"><?php echo $this->language->get('text_sidebar_right'); ?> <i class="glyphicon glyphicon-indent-right"></i></button>
            </div>
        </div>
    </div>
    <?php
    */
    ?>
    <?php }else { ?>
    <section id="columns">
    <div class="container">
<?php } ?>
    <div class="row">
    <?php
}
