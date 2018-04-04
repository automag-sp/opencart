<div class="box">
	<div id="tabs<?php echo $moduleID; ?>" class="htabs">
		<?php if($tab_tire) { ?><a name="tire" href="#filter-tire<?php echo $moduleID; ?>"><?php echo $tab_tire; ?></a><?php } ?>
		<?php if($tab_disc) { ?><a name="disc" href="#filter-disc<?php echo $moduleID; ?>"><?php echo $tab_disc; ?></a><?php } ?>
		<?php if($tab_auto) { ?><a name="auto" href="#filter-auto<?php echo $moduleID; ?>"><?php echo $tab_auto; ?></a><?php } ?>
	</div>
	<div class="tabs-filter">
		<?php if($tab_tire) { ?>
			<div id="filter-tire<?php echo $moduleID; ?>" class="filter-content">
			<div class="tyres-r">
				<div class="three">
					<div>
						<span><?php echo $entry_width; ?></span><br />
						<select name="width">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($width_tires as $value) { ?>
								<?php if($value['text'] == $width_t) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div>
						<span><?php echo $entry_height; ?></span><br />
						<select name="height">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($height_tires as $value) { ?>
								<?php if($value['text'] == $height) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div>
						<span><?php echo $entry_diameter; ?></span><br />
						<select name="diameter">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($diameter_tires as $value) { ?>
								<?php if($value['text'] == $diameter_t) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="two">
					<div>
						<span><?php echo $entry_season; ?></span><br />
						<select name="season">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($seasons_tires as $value) { ?>
								<?php if($value['text'] == $season) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="one">
					<div>
						<span><?php echo $entry_manufacture; ?></span><br />
						<select name="manufacturer">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($manufacturers_tires as $value) { ?>
								<?php if($value['name'] == $manufacturer_t) { ?>
								<option value="<?php echo $value['name']; ?>" selected="selected"><?php echo $value['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="tire">
					<input type="button" class="button" value="<?php echo $button_search; ?>">
				</div>
			</div>
			</div>
		<?php } ?>
		
		<?php if($tab_disc) { ?>
			<div id="filter-disc<?php echo $moduleID; ?>" class="filter-content">
			<div class="disk-r">
				<div class="three">
					<div>
						<span><?php echo $entry_width; ?></span><br />
						<select name="width">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($width_discs as $value) { ?>
								<?php if($value['text'] == $width_d) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div>
						<span><?php echo $entry_diameter; ?></span><br />
						<select name="diameter">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($diameter_discs as $value) { ?>
								<?php if($value['text'] == $diameter_d) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div>
						<span><?php echo $entry_dia; ?></span><br />
						<select name="dia">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($dia_discs as $value) { ?>
								<?php if($value['text'] == $dia) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="two">
					<div>
						<span><?php echo $entry_pcd; ?></span><br />
						<select name="pcd">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($pcd_discs as $value) { ?>
								<?php if($value['text'] == $pcd) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div>
						<span><?php echo $entry_et; ?></span><br />
						<select name="et">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($et_discs as $value) { ?>
								<?php if($value['text'] == $et) { ?>
								<option value="<?php echo $value['text']; ?>" selected="selected"><?php echo $value['text']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['text']; ?>"><?php echo $value['text']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="one">
					<div>
						<span><?php echo $entry_manufacture; ?></span><br />
						<select name="manufacturer">
							<option value=""><?php echo $text_null; ?></option>
							<?php foreach ($manufacturers_discs as $value) { ?>
								<?php if($value['name'] == $manufacturer_d) { ?>
								<option value="<?php echo $value['name']; ?>" selected="selected"><?php echo $value['name']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="disc">
					<input type="button" class="button" value="<?php echo $button_search; ?>">
				</div>
			</div>
			</div>
		<?php } ?>
		
		<?php if($tab_auto) { ?>
			<div id="filter-auto<?php echo $moduleID; ?>" class="filter-content auto">
				<div class="one">
					<div>
						<span><?php echo $entry_vendor; ?></span><br />
						<select name="vendor" class="vendor">
							<option value="-"><?php echo $text_select; ?></option>
							<?php foreach ($vendor_auto as $value) { ?>
								<?php if($value['vendor'] == $vendor) { ?>
								<option value="<?php echo $value['vendor']; ?>" selected="selected"><?php echo $value['vendor']; ?></option>
								<?php } else { ?>
								<option value="<?php echo $value['vendor']; ?>"><?php echo $value['vendor']; ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					
					<img class="ajaxload" src="image/ajax-loader-mini.gif" />
				</div>
				<div class="two-s">
					<div>
						<span><?php echo $entry_model; ?></span><br />
						<select name="model" class="model">
							<?php if($model_auto) { ?>
								<option value="-"><?php echo $text_select; ?></option>
								<?php foreach ($model_auto as $value) { ?>
									<?php if($value['model'] == $model) { ?>
									<option value="<?php echo $value['model']; ?>" selected="selected"><?php echo $value['model']; ?></option>
									<?php } else { ?>
									<option value="<?php echo $value['model']; ?>"><?php echo $value['model']; ?></option>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div>
						<span><?php echo $entry_year; ?></span><br />
						<select name="year" class="year">
							<?php if($year_auto) { ?>
								<option value="-"><?php echo $text_select; ?></option>
								<?php foreach ($year_auto as $value) { ?>
									<?php if($value['year'] == $year) { ?>
									<option value="<?php echo $value['year']; ?>" selected="selected"><?php echo $value['year']; ?></option>
									<?php } else { ?>
									<option value="<?php echo $value['year']; ?>"><?php echo $value['year']; ?></option>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="one">
					<div>
						<span><?php echo $entry_mod; ?></span><br />
						<select name="mod" class="mod">
							<?php if($mod_auto) { ?>
								<option value="-"><?php echo $text_select; ?></option>
								<?php foreach ($mod_auto as $value) { ?>
									<?php if($value['modification'] == $mod) { ?>
									<option value="<?php echo $value['modification']; ?>" selected="selected"><?php echo $value['modification']; ?></option>
									<?php } else { ?>
									<option value="<?php echo $value['modification']; ?>"><?php echo $value['modification']; ?></option>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="auto">
					<input type="button" class="button" value="<?php echo $button_search; ?>">
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	$('#tabs<?php echo $moduleID; ?> a').tabs();
	
	$(document).ready(function() {
		var select = '<?php echo $tab; ?>';
		if(select != 'tire') {
			$("#tabs<?php echo $moduleID; ?> a=[name='<?php echo $tab; ?>']").click();
		}
	});
</script>