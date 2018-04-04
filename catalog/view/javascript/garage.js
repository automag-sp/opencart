$(document).ready(function () {
	$('#mark_id').change(function () {
		var mark_id = $(this).val();
		if (mark_id == '0') {
			$('#model_id').html('<option>- Модель -</option>');
			$('#model_id').attr('disabled', true);
			$('#modification_id').html('<option>- Модификация -</option>');
			$('#modification_id').attr('disabled', true);
			$('#garage_sbm').attr('disabled', true);  			
			return(false);
		}
		$('#model_id').attr('disabled', true);
		$('#model_id').html('<option>загрузка...</option>');
		var url = '/index.php';
		$.get(
			url,
			{
                route: "saleepc/general/modelsg",
                manufacturer_id: mark_id
            },
			function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = ''; 

					$(result.models).each(function() {
						options += '<option value="' + $(this).attr('region_id') + '">' + $(this).attr('name') + '</option>';
					});

					$('#model_id').html('<option value="0">- Модель -</option>'+options);
					$('#model_id').attr('disabled', false);
					$('#modification_id').html('<option>- Модификация -</option>');
					$('#modification_id').attr('disabled', true);  			
					$('#garage_sbm').attr('disabled', true);  			
				}
			},
			"json"
		);
	});
	
$('#model_id').change(function () {
		var model_id = $('#model_id :selected').val();
		if (model_id == '0') {
			$('#modification_id').html('<option>- Модификация -</option>');
			$('#modification_id').attr('disabled', true);
			$('#garage_sbm').attr('disabled', true);  			
			return(false);
		}
		$('#modification_id').attr('disabled', true);
		$('#modification_id').html('<option>загрузка...</option>');	
		var url = '/index.php';		
		$.get(
			url,
			{
                route: "saleepc/general/modificationsg",
                model_id: model_id
            },
			
			function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = ''; 
					$(result.models).each(function() {
						options += '<option value="' + $(this).attr('modification_id') + '">' + $(this).attr('name') + '</option>';
					});

					$('#modification_id').html('<option>- Модификация -</option>'+options);
					$('#modification_id').attr('disabled', false);
					$('#garage_sbm').attr('disabled', true);  			
				}
			},
			"json"
		);
	});
	
$('#modification_id').change(function () {
		var modification_id = $('#modification_id :selected').val();
		if (modification_id == '0') {
			$('#garage_sbm').attr('disabled', true);  			
			return(false);
		}
		$('#garage_sbm').attr('disabled', false);
		return(false);
		
	});

});