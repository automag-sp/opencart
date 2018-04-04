<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" );
    $themeConfig = $this->config->get( 'themecontrol' );
?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<div class="container">
<div class="row">

	<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
		<?php echo $column_left; ?>
	</aside>
	<?php endif; ?> 

	<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">  
		<div id="content">
			<?php echo $content_top; ?>			
			<h1><?php echo $text_location; ?></h1>
			<div class="wrapper no-margin">

				<?php //start contact map ?>
	            <div class="contact-location hidden-xs">
	                <div id="contact-map"></div>
	            </div>

				<div class="row contact-content">					
					<?php  if(  isset($themeConfig['contact_customhtml']) && isset($themeConfig['contact_customhtml'][$this->config->get('config_language_id')]) && trim($themeConfig['contact_customhtml'][$this->config->get('config_language_id')]) ){ ?>
						<div class="col-lg-4 col-md-4 col-sm-12 hidden-xs">
							<div class="contact-info">
								<h3><?php echo $heading_title; ?></h3>
								<div class="content">		
									<div class="media">
										<i class="fa fa-home pull-left"></i>
										<div class="media-body">
											<?php /*<strong><?php echo $text_address; ?></strong>*/ ?>
											<?php echo $store; ?><br> <?php echo $address; ?>
										</div>
									</div>

									<?php if ($telephone) { ?>
									<div class="media">
										<i class="fa fa-phone pull-left"></i>
										<div class="media-body">
											<!-- <strong><?php //echo $text_telephone; ?></strong> -->									
											<?php echo $telephone; ?>														
										</div>
									</div>
									<?php } ?>

									
									<?php if ($fax) { ?>
										<div class="media">
											<i class="fa fa-envelope-o pull-left"></i>											
											<div class="media-body">
												<!-- <strong><?php //echo $text_fax; ?></strong> -->
												<?php echo $fax; ?>
											</div>
										</div>									
									<?php } ?>


								</div>	
							</div>
							<div class="contact-customhtml">
								<div class="content">
									<?php echo html_entity_decode($themeConfig['contact_customhtml'][$this->config->get('config_language_id')]); ?>
								</div>
							</div>
						</div>
					<?php } ?> 

					<div class="col-lg-8 col-md-8 col-sm-12">
						<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" role="form">				
							<h3><?php echo $text_contact; ?></h3>
							<div class="content">
								<div class="form-group">
									<label><?php echo $entry_name; ?></label>
									<p><input type="text" name="name" value="<?php echo $name; ?>" class="form-control" /></p>
								</div>							
								<?php if ($error_name) { ?>
								<p><span class="error"><?php echo $error_name; ?></span></p>
								<?php } ?>
						
								<div class="form-group">
									<label><?php echo $entry_email; ?></label>
									<p><input type="text" name="email" value="<?php echo $email; ?>" class="form-control" /></p>
								</div>
								<?php if ($error_email) { ?>
								<p><span class="error"><?php echo $error_email; ?></span></p>
								<?php } ?>
						
								<div class="form-group">
									<label><?php echo $entry_enquiry; ?></label>
									<p>
										<textarea name="enquiry" cols="50" rows="10" class="form-control"><?php echo $enquiry; ?></textarea>
									</p>
								</div>
								<?php if ($error_enquiry) { ?>
								<p><span class="error"><?php echo $error_enquiry; ?></span></p>
								<?php } ?>
						
								<div class="form-group">
									<label><?php echo $entry_captcha; ?></label>
									<p><input type="text" name="captcha" value="<?php echo $captcha; ?>" class="form-control" /></p>
									<img src="index.php?route=information/contact/captcha" alt="" class="img-responsive img-captcha" />
								</div>
								<?php if ($error_captcha) { ?>
								<p><span class="error"><?php echo $error_captcha; ?></span></p>
								<?php } ?>
							</div>
							
							<div class="buttons">
								<div class="right"><input type="submit" value="<?php echo $button_continue; ?>" class="button btn btn-theme-default" /></div>
							</div>				
						</form>
					</div>
				</div>


				

	            <?php // Jquery googlemap api v3?>
	            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=en"></script>
	            <script type="text/javascript" src="catalog/view/javascript/gmap/gmap3.min.js"></script>
	            <script type="text/javascript" src="catalog/view/javascript/gmap/gmap3.infobox.js"></script>
	            <script type="text/javascript">
	                var mapDiv, map, infobox;
	                var lat = <?php echo isset($themeConfig['location_latitude'])?$themeConfig['location_latitude']:'40.705423'; ?>;
	                var lon = <?php echo isset($themeConfig['location_longitude'])?$themeConfig['location_longitude']:'-74.008616'; ?>;
	                jQuery(document).ready(function($) {
	                    mapDiv = $("#contact-map");
	                    mapDiv.height(400).gmap3({
	                        map:{
	                            options:{
	                                center:[lat,lon],
	                                zoom: 15
	                            }
	                        },
	                        marker:{
	                            values:[
	                                {latLng:[lat, lon], data:"<?php echo isset($themeConfig['location_address'])?$themeConfig['location_address']:'79-99 Beaver Street, New York, NY 10005, USA'; ?>"},
	                            ],
	                            options:{
	                                draggable: false
	                            },
	                            events:{
	                                  mouseover: function(marker, event, context){
	                                    var map = $(this).gmap3("get"),
	                                        infowindow = $(this).gmap3({get:{name:"infowindow"}});
	                                    if (infowindow){
	                                        infowindow.open(map, marker);
	                                        infowindow.setContent(context.data);
	                                    } else {
	                                        $(this).gmap3({
	                                        infowindow:{
	                                            anchor:marker, 
	                                            options:{content: context.data}
	                                        }
	                                      });
	                                    }
	                                },
	                                mouseout: function(){
	                                    var infowindow = $(this).gmap3({get:{name:"infowindow"}});
	                                    if (infowindow){
	                                        infowindow.close();
	                                    }
	                                }
	                            }
	                        }
	                    });
	                });
	            </script>
	            <?php //end contact map ?>
			</div>
			<?php echo $content_bottom; ?>
		</div>
	</section> 

	<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
		<?php echo $column_right; ?>
	</aside>
	<?php endif; ?>

</div></div>

<?php echo $footer; ?>