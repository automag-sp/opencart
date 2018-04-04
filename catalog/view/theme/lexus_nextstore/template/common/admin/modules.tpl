<?php 
	$d = array(
		'widget_support_data' => '
			<div class="media pull-left">
				<div class="pull-left"><i class="fa fa-truck">&nbsp;</i></div>
				<div class="media-body">
					<h3>Free Shipping</h3>
					<p><em>on order over $100.00</em></p>
				</div>
			</div>
			<div class="media pull-left">
				<div class="pull-left"><i class="fa fa-repeat">&nbsp;</i></div>
				<div class="media-body">
					<h3>Free Return</h3>
					<p><em>free 90 days return policy</em></p>
				</div>
			</div>
			<div class="media pull-left">
				<div class="pull-left"><i class="fa fa-money">&nbsp;</i></div>
				<div class="media-body">
					<h3>Member discount</h3>
					<p><em>free register</em></p>
				</div>
			</div>			
		',			
		
		
		'demo_widget_about_data'=>'		
			<img src="image/data/demo/logo-store.png" alt="logo store"/>
			<p>
				Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae
			</p>
			<p>
				Cerat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.	
			</p>
		',				
		
		'username_twitter_module' => 'pavothemes'
	);
	$module = array_merge( $d, $module );

//	echo '<pre>'.print_r( $languages, 1 );die;
?>

<div class="inner-modules-wrap">	 
	<div class="vtabs mytabs" id="my-tab-innermodules">
		<a onclick="return false;" href="#tab-imodule-header" class="selected"><?php echo $this->language->get('Header');?></a>
		<a onclick="return false;" href="#tab-imodule-footer" class="selected"><?php echo $this->language->get('Footer');?></a>
	</div>

	<div class="page-tabs-wrap">
			<div id="tab-imodule-header">					
				<?php /* <h4><?php echo $this->language->get( 'Delivery' ) ; ?></h4> */ ?>
				<div id="language-support_data" class="htabs mytabstyle">
					<?php foreach ($languages as $language) { ?>
					<a href="#tab-language-support_data-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
					<?php } ?>
				  </div>

				<?php foreach ($languages as $language) {   ?>
				  <div id="tab-language-support_data-<?php echo $language['language_id']; ?>">
				   
					<table class="form">
						<?php $text =  isset($module['support_data'][$language['language_id']]) ? $module['support_data'][$language['language_id']] : $module['widget_support_data'];  ?>
					  <tr>
						<td><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $this->language->get('Support Module');?>: </td>
						<td><textarea name="themecontrol[support_data][<?php echo $language['language_id']; ?>]" id="support_data-<?php echo $language['language_id']; ?>" rows="5" cols="60" class="form-control"><?php echo $text; ?></textarea></td>
					  </tr>
					</table>
				  </div>
				  <?php } ?>				
			</div>
	
	 		<div id="tab-imodule-footer">								
				<h4><?php echo $this->language->get( 'Footer Center' ) ; ?></h4>		

					

				  <div id="language-widget_about_data" class="htabs mytabstyle">
		            <?php foreach ($languages as $language) { ?>
		            <a href="#tab-language-widget_about_data-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
		            <?php } ?>
		          </div>

				<?php foreach ($languages as $language) {   ?>
		          <div id="tab-language-widget_about_data-<?php echo $language['language_id']; ?>">		           
		            <table class="form">
		            	<?php $text =  isset($module['widget_about_data'][$language['language_id']]) ? $module['widget_about_data'][$language['language_id']] : $module['demo_widget_about_data'];  ?>
		              <tr>
		                <td><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $this->language->get('About Store Module');?>: </td>
		                <td><textarea name="themecontrol[widget_about_data][<?php echo $language['language_id']; ?>]" id="widget_about_data-<?php echo $language['language_id']; ?>" rows="5" cols="60" class="form-control"><?php echo $text; ?></textarea></td>
		              </tr>
		            </table>
		          </div>
		          <?php } ?>	
				  
			</div>
			
			<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
			<script type="text/javascript"><!--
			$("#language-support_data a").tabs();
			<?php foreach( $languages as $language )  { ?>
			CKEDITOR.replace('support_data-<?php echo $language['language_id']; ?>', {
				filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
			});
			<?php } ?>
			
			$("#language-widget_about_data a").tabs();
			<?php foreach( $languages as $language )  { ?>
			CKEDITOR.replace('widget_about_data-<?php echo $language['language_id']; ?>', {
				filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
			});
			<?php } ?>
					
			//--></script> 
		
	 </div>
	 <div class="clearfix clear"></div>	
</div>

