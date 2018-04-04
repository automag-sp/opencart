$(document).ready(function () {
	$('.liber-colorbox').colorbox({
		scrolling: false,
		overlayClose: true,
		opacity: 0.5
	});

	$('.feedback-liber-button').live('click', function () {
		var wait = $(this).data('wait');
		$.ajax({
			url: 'index.php?route=information/liber/write',
			type: 'post',
			dataType: 'json',
			data: '&contact='+encodeURIComponent($('input[name=\'feedback_liber_contact\']').val())+'&question='+encodeURIComponent($('textarea[name=\'feedback_liber_question\']').val())+'&captcha='+encodeURIComponent($('input[name=\'feedback_liber_captcha\']').val()),
			beforeSend: function () {
				$('.success, .attention').remove();
				$(this).attr('disabled', true);
				$('.feedback-liber-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" />'+wait+'</div>');

				$.colorbox.resize()
			},
			complete: function () {
				$(this).attr('disabled', false);
				$('.attention').remove();

				$.colorbox.resize()
			},
			success: function (data) {
				if (data['error']) {
					$('.feedback-liber .error').remove();

					if (data['error']['contact']) {
						$('.feedback_liber_contact').after('<span class="error">'+data['error']['contact']+'</span>');
					}

					if (data['error']['question']) {
						$('.feedback_liber_question').after('<span class="error">'+data['error']['question']+'</span>');
					}

					if (data['error']['captcha']) {
						$('.feedback_liber_captcha').after('<span class="error">'+data['error']['captcha']+'</span>');
					}
				}

				if (data['success']) {
					$('.feedback-liber').empty().after('<div class="success">'+data['success']+'</div>');
				}

				$.colorbox.resize()
			}
		});
	});

	$(".liber-item-question").click(function () {
		elementToScroll = $($(this).data('scroll')).offset().top;

		$("body, html").animate({scrollTop: elementToScroll}, 800);
	});
});