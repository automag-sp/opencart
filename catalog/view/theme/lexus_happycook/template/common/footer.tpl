<?php
	/******************************************************
	 * @package Pav Megamenu module for Opencart 1.5.x
	 * @version 1.1
	 * @author http://www.pavothemes.com
	 * @copyright	Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
	 * @license		GNU General Public License version 2
	*******************************************************/

	require_once( DIR_TEMPLATE.$this->config->get('config_template')."/development/libs/framework.php" );
	$themeConfig = $this->config->get('themecontrol');
	$themeName =  $this->config->get('config_template');
	$helper = ThemeControlHelper::getInstance( $this->registry, $themeName );
	$LANGUAGE_ID = $this->config->get( 'config_language_id' );
?>
</div></div></section>


<?php
	/**
	 * Footer Top Position
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'mass_bottom' );
	$ospans = array( );
	$cols   = 1;
	if( count($modules) ) {
?>
<section id="pav-mass-bottom">
	<div class="container">
		<?php $j=1;foreach ($modules as $i =>  $module) {   ?>
			<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>
			<div class="col-lg-<?php echo floor(12/$cols);?>"><?php echo $module; ?></div>
			<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>
		<?php  $j++;  } ?>
	</div>
</section>
<?php } ?>
<section id="footer">
	<?php
	/**
	 * Footer Top Position
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'footer_top' );
	$ospans = array();

	if( count($modules) ){
	$cols = isset($themeConfig['block_footer_top'])&& $themeConfig['block_footer_top']?(int)$themeConfig['block_footer_top']:count($modules);
	//if( $cols < count($modules) ){ $cols = count($modules); }
	$class = $helper->calculateSpans( $ospans, $cols );
	?>
	<div class="footer-top">
		<div class="container">
			<?php $j=1;foreach ($modules as $i =>  $module) {   ?>
				<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>
					<div class="<?php echo $class[$j];?> col-md-6"><?php echo $module; ?></div>
				<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>
			<?php  $j++;  } ?>
		</div>
	</div>
	<?php } ?>
	<?php
	/**
	 * Footer Center Position
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'footer_center' );
	$ospans = array();

	if( count($modules)||true ){
	$cols = isset($themeConfig['block_footer_center'])&& $themeConfig['block_footer_center']?(int)$themeConfig['block_footer_center']:count($modules);
	$class = $helper->calculateSpans( $ospans, $cols );
	?>
	<div class="footer-center">
		<div class="container">
		<?php $j=1;
		if(is_array($modules) && count($modules))
		foreach ($modules as $i =>  $module) {
		    ?>
				<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>
				<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
				<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>
		<?php  $j++;  } ?>
		</div>
        <div class="container">
            <link href="catalog/view/theme/default/stylesheet/pavmap.css" rel="stylesheet"/>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=ru&key=AIzaSyA3A1PTQTEs86HWyQj8ZmFfrI0ZiFza_xk"></script>
            <script type="text/javascript" src="catalog/view/javascript/gmap/gmap3.min.js"></script>
            <script type="text/javascript" src="catalog/view/javascript/gmap/gmap3.infobox.js"></script>
<?php
//if(false){
if(!defined('ALEXA')){
  ?>
    <div class="col-lg-12 col-md-12 sergi">
        <div class="box pavgooglemap">
            <div class="box-heading">
                <span>Наши магазины расположены:</span>
            </div>
            <div class="box-content">
                <div class="pavmap">
                    <div id="directory-main-bar-1" class="gmap"></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var mapDiv, map, infobox;
            jQuery(document).ready(function($) {
                mapDiv = $("#directory-main-bar-1");
                mapDiv.height(400).gmap3({
                    map: {
                        options: {
                            "draggable": true
                            ,"mapTypeControl": true
                            ,"mapTypeId": google.maps.MapTypeId.ROADMAP
                            ,"scrollwheel": true //Alow scroll zoom in, zoom out
                            ,"panControl": true
                            ,"rotateControl": false
                            ,"scaleControl": true
                            ,"streetViewControl": true
                            ,"zoomControl": true
                        }
                    }
                    ,marker: {
                        values: [
                            {
                                latLng: [56.33373038781419, 38.12962135487828],
                                options: {
                                    icon: "",
                                    //shadow: "icon-shadow.png",
                                },
                                data: '<div class="marker-holder"><div class="marker-content with-image">' +
                                '<img src="http://automag-sp.ru/image/cache/data/ вид-120x160h.JPG" alt="">' +
                                '<div class="map-item-info"><div class="title">'+"АВТОМАГ"+'</div>' +
                                '<div class="address">'+"г. Сергиев Посад, Новоугличское шоссе 73"+'</div>' +
                                '<div class="description">'+""+'</div>' +
                                '<a href="' + "" + '" class="more-button">' + "VIEW MORE" + '</a></div>' +
                                '<div class="arrow"></div><div class="close"></div></div></div></div>'
                            },
                            {
                                latLng: [56.274554575166775, 38.1229710569778],
                                options: {
                                    icon: "",
                                    //shadow: "icon-shadow.png",
                                },
                                data: '<div class="marker-holder"><div class="marker-content with-image">' +
                                '<img src="http://automag-sp.ru/image/cache/data/gVFqZ_O2TNM-120x160h.jpg" alt="">' +
                                '<div class="map-item-info"><div class="title">'+"АВТОМАГ 24"+'</div>' +
                                '<div class="address">'+"Московское ш., 22Б, Сергиев Посад, Московская обл., Россия, 141304"+'</div>' +
                                '<div class="description">'+""+'</div><a href="' + "" + '" class="more-button">' + "VIEW MORE" + '</a></div>' +
                                '<div class="arrow"></div><div class="close"></div></div></div></div>'
                            },
                        ],
                        options:{
                            draggable: false, //Alow move icon location
                        },
                        cluster:{
                            radius: 20,
                            // This style will be used for clusters with more than 0 markers
                            0: {
                                content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
                                width: 90,
                                height: 80
                            },
                            // This style will be used for clusters with more than 20 markers
                            20: {
                                content: "<div class='cluster cluster-2'>CLUSTER_COUNT</div>",
                                width: 90,
                                height: 80
                            },
                            // This style will be used for clusters with more than 50 markers
                            50: {
                                content: "<div class='cluster cluster-3'>CLUSTER_COUNT</div>",
                                width: 90,
                                height: 80
                            },
                            events: {
                                click: function(cluster) {
                                    map.panTo(cluster.main.getPosition());
                                    map.setZoom(map.getZoom() + 2);
                                }
                            }
                        },
                        events: {
                            click: function(marker, event, context){
                                map.panTo(marker.getPosition());

                                infobox.setContent(context.data);
                                infobox.open(map,marker);

                                // if map is small
                                var iWidth = 260;
                                var iHeight = 300;
                                if((mapDiv.width() / 2) < iWidth ){
                                    var offsetX = iWidth - (mapDiv.width() / 2);
                                    map.panBy(offsetX,0);
                                }
                                if((mapDiv.height() / 2) < iHeight ){
                                    var offsetY = -(iHeight - (mapDiv.height() / 2));
                                    map.panBy(0,offsetY);
                                }

                            }
                        }
                    }
                },"autofit");

                map = mapDiv.gmap3("get");
                infobox = new InfoBox({
                    pixelOffset: new google.maps.Size(-50, -65),
                    closeBoxURL: '',
                    enableEventPropagation: true
                });
                mapDiv.delegate('.infoBox .close','click',function () {
                    infobox.close();
                });
            });
        </script>
    </div>
  <?php
}
else{
    ?>
    <div class="col-lg-12 col-md-12 alexa">
        <div class="box pavgooglemap">
            <div class="box-heading">
                <span>Расположение магазина:</span>
            </div>
            <div class="box-content">
                <div class="pavmap">
                    <div id="directory-main-bar-1" class="gmap"></div>
                </div>
            </div>
        </div>
            <script type="text/javascript">
                var mapDiv, map, infobox;
                jQuery(document).ready(function($) {
                    mapDiv = $("#directory-main-bar-1");
                    mapDiv.height(400).gmap3({
                        map: {
                            options: {
                                "draggable": true
                                ,"mapTypeControl": true
                                ,"mapTypeId": google.maps.MapTypeId.ROADMAP
                                ,"scrollwheel": true //Alow scroll zoom in, zoom out
                                ,"panControl": true
                                ,"rotateControl": false
                                ,"scaleControl": true
                                ,"streetViewControl": true
                                ,"zoomControl": true
                                ,center:[56.398497, 38.717585]
                                ,zoom:18
                            }
                        }
                        ,marker: {
                            values: [
                                {
                                    latLng: [56.398497, 38.717585],
                                    options: {
                                        icon: "",
                                        //shadow: "icon-shadow.png",
                                    },
                                    data: '<div class="marker-holder"><div class="marker-content with-image">' +
                                    '<img src="" alt="">' +
                                    '<div class="map-item-info"><div class="title">'+"АВТОМАГ мини"+'</div>' +
                                    '<div class="address">'+"г. Александров, ул. Первомайская 13 корпус 1, ТЦ Саша"+'</div>' +
                                    '<div class="description">'+""+'</div>' +
                                    //                                '<a href="' + "" + '" class="more-button">' + "VIEW MORE" + '</a>' +
                                    '</div>' +
                                    '<div class="arrow"></div><div class="close"></div></div></div></div>'
                                }
                            ],
                            options:{
                                draggable: false, //Alow move icon location
                            },
                            cluster:{
                                radius: 20,
                                // This style will be used for clusters with more than 0 markers
                                0: {
                                    content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
                                    width: 90,
                                    height: 80
                                },
                                // This style will be used for clusters with more than 20 markers
                                20: {
                                    content: "<div class='cluster cluster-2'>CLUSTER_COUNT</div>",
                                    width: 90,
                                    height: 80
                                },
                                // This style will be used for clusters with more than 50 markers
                                50: {
                                    content: "<div class='cluster cluster-3'>CLUSTER_COUNT</div>",
                                    width: 90,
                                    height: 80
                                },
                                events: {
                                    click: function(cluster) {
                                        map.panTo(cluster.main.getPosition());
                                        map.setZoom(map.getZoom() + 2);
                                    }
                                }
                            },
                            events: {
                                click: function(marker, event, context){
                                    map.panTo(marker.getPosition());

                                    infobox.setContent(context.data);
                                    infobox.open(map,marker);

                                    // if map is small
                                    var iWidth = 260;
                                    var iHeight = 300;
                                    if((mapDiv.width() / 2) < iWidth ){
                                        var offsetX = iWidth - (mapDiv.width() / 2);
                                        map.panBy(offsetX,0);
                                    }
                                    if((mapDiv.height() / 2) < iHeight ){
                                        var offsetY = -(iHeight - (mapDiv.height() / 2));
                                        map.panBy(0,offsetY);
                                    }

                                }
                            }
                        }
                    }
//                    ,zoom:5

//                    ,"autofit"
                    );

                    map = mapDiv.gmap3("get");
                    infobox = new InfoBox({
                        pixelOffset: new google.maps.Size(-50, -65),
                        closeBoxURL: '',
                        enableEventPropagation: true
                    });
                    mapDiv.delegate('.infoBox .close','click',function () {
                        infobox.close();
                    });
                });
            </script>
    </div>
    <?php
}
?></div>

	</div>
<?php } elseif((isset($themeConfig['enable_footer_center'])&&$themeConfig['enable_footer_center'])) { ?>
<div class="footer-center">
		<div class="container"><div class="row">
		  <?php if ($informations) { ?>
			<div class="column col-xs-12 col-sm-6 col-lg-2">
				<div class="box">
					<div class="box-heading"><span><?php echo $text_information; ?></span></div>
					<ul class="list">
					  <?php foreach ($informations as $information) { ?>
					  <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
					  <?php } ?>
					</ul>
				</div>
			</div>
		  <?php } ?>

		<div class="column col-xs-12 col-sm-6 col-lg-2">
			<div class="box">
				<div class="box-heading"><span><?php echo $text_service; ?></span></div>
				<ul class="list">
				  <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
				  <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
				  <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
				   <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
				  <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
				</ul>
			</div>
		</div>

		<div class="column col-xs-12 col-sm-6 col-lg-2">
			<div class="box">
			<div class="box-heading"><span><?php echo $text_extra; ?></span></div>
			<ul class="list">
			  <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
			  <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
			  <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
			  <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
			</ul>
		  </div>
		</div>

		<div class="column col-xs-12 col-sm-6 col-lg-2">
			<div class="box">
				<div class="box-heading"><span><?php echo $text_account; ?></span></div>
				<ul class="list">
				  <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
				  <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
				  <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
				  <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
				  <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
				</ul>
			</div>
		</div>

		<?php if( isset($themeConfig['widget_contact_data'][$LANGUAGE_ID]) ) {

		 ?>
		<div class="column col-xs-12 col-sm-6 col-lg-4">
			<div class="box contact-us">
				<div class="box-heading"><span><?php echo $this->language->get('text_contact_us'); ?></span></div>
				<?php echo html_entity_decode( $themeConfig['widget_contact_data'][$LANGUAGE_ID], ENT_QUOTES, 'UTF-8' ); ?>
		</div>
		</div>
		 <?php } ?>

		 </div>
	</div></div>
<?php  } ?>
	<?php
	/**
	 * Footer Bottom
	 * $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]
	 */
	$modules = $helper->getModulesByPosition( 'footer_bottom' );
	$ospans = array(1=>3, 2=>2,3=>4,4=>3);

	if( count($modules) ){
	$cols = isset($themeConfig['block_footer_bottom'])&& $themeConfig['block_footer_bottom']?(int)$themeConfig['block_footer_bottom']:count($modules);
	$class = $helper->calculateSpans( $ospans, $cols );
	//echo '<pre>'; print_r($class); echo '</pre>';
	?>
	<div class="footer-bottom">
		<div class="container">
		<?php
			$j=1;
			$k=1;
			foreach ($modules as $i =>  $module) {
				if( $i++%$cols == 0 || count($modules)==1 ){  $j=1; } ?>
				<div class="<?php echo $class[$j];?> col-sm-6 col-xs-12 footer-modules-<?php print $k;?>"><?php echo $module; ?></div>
				<?php if( $i%$cols == 0 || $i==count($modules) ){  }
				$j++;
				$k++;
			}
		?>
        </div>
		<div id="bank-logos">
			<img src="/image/logo/bank/tinkoff.png" width="30">
			<img src="/image/logo/bank/visa.png" width="30">
			<img src="/image/logo/bank/master.png" width="30">
			<img src="/image/logo/bank/mir.png" width="30">
		</div>
	</div>
	<?php } ?>
  <?php
  /*
  ?>
	<!--
	OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
	Please donate via PayPal to donate@opencart.com
	//-->
	<div id="powered"><div class="container"><div class="copyright">
	<?php if( isset($themeConfig['enable_custom_copyright']) && $themeConfig['enable_custom_copyright'] ) { ?>
		<?php echo $themeConfig['copyright'];?>
	<?php } else { ?>
		<?php echo $powered; ?>
	<?php } ?>
	<div class="paypal"><img src="image/data/paypal.png" alt=""><a href="#"></a></div></div></div>
      <?php
      */
      ?>
</section>

<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<?php if( isset($themeConfig['enable_paneltool']) && $themeConfig['enable_paneltool'] ){  ?>
	<?php  echo $helper->renderAddon( 'panel' );?>
<?php } ?>
</section>
<!--<script type="text/javascript" src="http://automag-sp.ru/callcons/js/callcons.js" charset='utf-8'></script> -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33663159 = new Ya.Metrika({
                    id:33663159,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33663159" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script data-skip-moving="true">
        (function(w,d,u,b){
                s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
                h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.ru/b3531129/crm/site_button/loader_2_kx8qeq.js');
</script>
<div title="Укажите ваш город" id="city_dialog" style="display: none"><p style="text-align: center">
        <a class="btn btn-block btn-default" style="background: #1bbc9b" href="/index.php?site_city=s">Сергиев посад</a>
        <a class="btn btn-block btn-default" style="background: #1bbc9b" href="/index.php?site_city=a">Александров</a>
    </p></div>
</body></html>