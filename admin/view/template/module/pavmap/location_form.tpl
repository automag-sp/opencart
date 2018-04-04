<?php
/******************************************************
 * @package  : Pav Map module for Opencart 1.5.x
 * @version  : 1.0
 * @author   : http://www.pavothemes.com
 * @copyright: Copyright (C) Feb 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license  : GNU General Public License version 1
*******************************************************/
?>
<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>

	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>

	<div class="box">
		<div class="left-panel">
			<div class="logo"><h1><?php echo $this->language->get('left_title'); ?> </h1></div>
			<div class="slidebar"><?php require( dirname(__FILE__).'/toolbar.tpl' ); ?></div>
			<div class="clear clr"></div>
		</div>
		<div class="right-panel">
			<div class="heading">
				<h1 class="logo">
					<?php echo $this->language->get("text_info_location"); ?>
					<?php if (isset($location_id) && !empty($location_id)): ?>ID: <?php echo $location_id; ?><?php endif ?>
				</h1>
			</div>
			<div class="toolbar"><?php require( dirname(__FILE__).'/action_bar.tpl' ); ?></div>

			<div class="content">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
					<input name="action" type="hidden" id="action"/>
					<input name="location_id" type="hidden" value="<?php echo isset($location_id)?$location_id:0; ?>"/>
					<div id="languages" class="htabs">
						<?php foreach ($languages as $language) { ?>
						<a href="#tab-language-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
						<?php } ?>
					</div>
					<?php foreach ($languages as $language) { ?>
					<div id="tab-language-<?php echo $language['language_id']; ?>">
						<table class="form">
							<tr>
								<td><span class="required">* </span><?php echo $this->language->get('entry_title');?></td>
								<td>
									<input name="location_title[<?php echo $language['language_id'];?>]" value="<?php echo isset($title[$language['language_id']])?$title[$language['language_id']]:''; ?>" size="60"/>
								</td>
							</tr>
							<tr>
								<td><span class="required">* </span><?php echo $this->language->get('entry_content');?></td>
								<td><textarea cols="57" rows="5" name="location_content[<?php echo $language['language_id']; ?>]"><?php echo isset($content[$language['language_id']])?$content[$language['language_id']]:'';?></textarea></td>
							</tr>
						</table>
					</div>
					<?php } ?>
					<table class="form">
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_location_link');?></td>
							<td>
								<input name="location_link" value="<?php echo isset($location_link)?$location_link:''; ?>" size="60"/>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_group_location_name');?></td>
							<td>
								<select name="location_group">
									<?php if (isset($groups)): ?>
									<?php foreach ($groups as $group): ?>
									<?php $selected = ($group['group_location_id'] == $location_group)?"selected='selected'":''; ?>
									<option <?php echo $selected; ?> value="<?php echo $group['group_location_id']; ?>"><?php echo $group['name']; ?></option>
									<?php endforeach ?>
									<?php else: ?>
									<option value="0">&nbsp;</option>
									<?php endif ?>
								</select>
							</td>
						</tr>

						<tr>
							<td><?php echo $this->language->get('entry_googlemap');?><span class="help"><?php echo $this->language->get('help_google_map'); ?></span></td>
							<td>
								<div id="mapCanvas" style="width: 800px;height: 350px;float: left;"></div>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_location_name');?><span class="help"><?php echo $help_location_address; ?></span></td>
							<td><input id="searchTextField" name="location_address" type="text" value="<?php echo isset($location_address)?$location_address:''; ?>" placeholder="<?php echo $text_location_address; ?>" autocomplete="on" runat="server" size="60"/></td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_latitude');?></td>
							<td>
								<input id="location_latitude" name="location_latitude" value="<?php echo (isset($latitude) && !empty($latitude))?$latitude:'40.705423'; ?>" size="30"/>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_longitude');?></td>
							<td>
								<input id="location_longitude" name="location_longitude" value="<?php echo (isset($longitude) && !empty($longitude))?$longitude:'-74.008616'; ?>" size="30"/>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_image'); ?></td>
							<td>
								<div class="image"><img src="<?php echo $thumb; ?>" alt="" id="thumb0" /><br />
									<input type="hidden" name="location_image" value="<?php echo $image; ?>" id="image0" />
									<a onclick="image_upload('image0', 'thumb0');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb0').attr('src', '<?php echo $no_image; ?>'); $('#image0').attr('value', '');"><?php echo $text_clear; ?></a>
								</div>
							</td>
						</tr>
						<tr>
							<td><span class="required">* </span><?php echo $this->language->get('entry_icon'); ?></td>
							<td>
								<div class="image"><img src="<?php echo $thumb_icon; ?>" alt="" id="thumb1" /><br />
									<input type="hidden" name="location_icon" value="<?php echo $icon; ?>" id="image1" />
									<a onclick="image_upload('image1', 'thumb1');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb1').attr('src', '<?php echo $no_image; ?>'); $('#image1').attr('value', '');"><?php echo $text_clear; ?></a>
								</div>
							</td>
						</tr>
						<tr>
							<td></span><?php echo $this->language->get('entry_status');?></td>
							<td>
								<select name="location_status">
									<?php if (isset($status) && $status): ?>
									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
									<option value="0"><?php echo $text_disabled; ?></option>
									<?php else: ?>
									<option value="1"><?php echo $text_enabled; ?></option>
									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
									<?php endif; ?>
								</select>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript"><!--
	$('.htabs a').tabs();
//--></script>



<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();

	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
		$('#dialog').dialog({
		title: '<?php echo $this->language->get("text_image_manager"); ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(text) {
						$('#' + thumb).replaceWith('<img src="' + text + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script>


<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
	function initialize() {
		var input = document.getElementById('searchTextField');
		var autocomplete = new google.maps.places.Autocomplete(input);
		google.maps.event.addListener(autocomplete, 'place_changed', function () {
			var place = autocomplete.getPlace();

			var lat = place.geometry.location.lat();
			var lon = place.geometry.location.lng();

			document.getElementById('location_latitude').value = lat;
			document.getElementById('location_longitude').value = lon;

			var latLng = new google.maps.LatLng(lat, lon);
			var map = new google.maps.Map(document.getElementById('mapCanvas'), {
				zoom: 15,
				center: latLng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			var marker = new google.maps.Marker({
				position: latLng,
				title: 'Point A',
				map: map,
				draggable: true
			});
			// Update current position info.
			geocodePosition(latLng);

			// Add dragging event listeners.
			google.maps.event.addListener(marker, 'dragstart', function() {
				updateMarkerAddress('Dragging...');
			});

			google.maps.event.addListener(marker, 'drag', function() {
				updateMarkerPosition(marker.getPosition());
			});

			google.maps.event.addListener(marker, 'dragend', function() {
				geocodePosition(marker.getPosition());
			});
		});
	}
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript">
	var geocoder = new google.maps.Geocoder();

	function geocodePosition(pos) {
		geocoder.geocode({
			latLng: pos
		}, function(responses) {
			if (responses && responses.length > 0) {
				updateMarkerAddress(responses[0].formatted_address);
			} else {
				updateMarkerAddress('Cannot determine address at this location.');
			}
		});
	}

	function updateMarkerPosition(latLng) {
		document.getElementById('location_latitude').value = latLng.lat();
		document.getElementById('location_longitude').value = latLng.lng();
	}

	function updateMarkerAddress(str) {
		document.getElementById('searchTextField').value = str;
	}

	function initialize() {

		var lat = <?php echo (isset($latitude) && !empty($latitude))?$latitude:'40.705423'; ?>;
		var lon = <?php echo (isset($longitude) && !empty($longitude))?$longitude:'-74.008616'; ?>;

		var latLng = new google.maps.LatLng(lat, lon);
		var map = new google.maps.Map(document.getElementById('mapCanvas'), {
			zoom: 15,
			center: latLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marker = new google.maps.Marker({
			position: latLng,
			title: 'Point A',
			map: map,
			draggable: true
		});

		// Update current position info.
		geocodePosition(latLng);

		// Add dragging event listeners.
		google.maps.event.addListener(marker, 'dragstart', function() {
			updateMarkerAddress('Dragging...');
		});

		google.maps.event.addListener(marker, 'drag', function() {
			updateMarkerPosition(marker.getPosition());
		});

		google.maps.event.addListener(marker, 'dragend', function() {
			geocodePosition(marker.getPosition());
		});
	}
	// Onload handler to fire off the app.
	google.maps.event.addDomListener(window, 'load', initialize);
</script>