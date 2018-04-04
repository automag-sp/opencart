<div class="socials-theme <?php echo $prefix; ?>" hidden-xs hidden-sm>
	<ul class="list-socials">
		<?php //Start Div Facebook?>
		<li class="facebook">
			<a href="#" target="_blank"><span class="fa fa-facebook"></span><span>Facebook</span></a>
			<div class="box-content">
					<div class="facebook-wrapper" style="width:<?php echo  $width;?>" >
						<?php if(isset($application_id) && $application_id) { ?>
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/<?php echo $language_code ?>/all.js#xfbml=1&appId=<?php echo $application_id ?>";
							fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
						<?php } else {?>
							<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/<?php echo $language_code ?>/all.js#xfbml=1";
							fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<?php } ?>

						<div class="fb-like-box" data-href="<?php echo $page_url; ?>" data-colorscheme="<?php echo $colorscheme;?>" data-height="<?php echo $face_height; ?>" data-width="<?php echo $face_width; ?>" data-show-faces="<?php echo ($show_faces ? 'true' : 'false'); ?>" data-stream="<?php echo ($tream ? 'true' : 'false'); ?>" data-show-border="<?php echo ( trim($border_color) ?'true':'false') ; ?>" data-header="<?php echo ($header ? 'true' : 'false'); ?>"></div>
					</div>
			</div>
		</li>
		<?php //End Div Facebook?>

		<?php if (!empty($widget_id)) { //Start Div Twitter?>
		<li class="twitter">
			<a href="#" target="_blank"><span class="fa fa-twitter"></span><span>Twitter</span></a>
			<div class="box-content">
				<div id="pav-twitter">
					<a class="twitter-timeline" data-dnt="true" data-theme="<?php echo $theme; ?>" data-link-color="#<?php echo $link_color;?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-chrome="<?php echo $chrome; ?>" data-border-color="#<?php echo $border_color ?>" lang="<?php echo $language_code;?>" data-tweet-limit="<?php echo $count; ?>" data-show-replies="<?php echo $show_replies==1?'true':'false'; ?>" href="https://twitter.com/<?php echo $username; ?>"  data-widget-id="<?php echo $widget_id; ?>">Tweets by @<?php echo $username;?></a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
		</li>
		<?php } //End Div Twitter?>


	
		<?php if (isset($video_ids) && !empty($video_ids)) {?>
		<li class="youtube">
			<a href="#" target="_blank"><span class="fa fa-youtube"></span><span>Youtube</span></a>
			<div class="box-content">
				<object width="<?php echo $video_width; ?>" height="<?php echo $video_height; ?>">
				<param name="movie" value="https://www.youtube.com/v/<?php echo trim($video_ids); ?>?version=3&autoplay=0"></param>
				<param name="allowScriptAccess" value="always"></param>
				<embed src="https://www.youtube.com/v/<?php echo trim($video_ids); ?>?version=3&autoplay=0" type="application/x-shockwave-flash" allowscriptaccess="always" width="<?php echo $video_width; ?>" height="<?php echo $video_height; ?>"></embed>
				</object>
			</div>
		</li>
		<?php } ?>

		<?php /* if (!empty($google)) { ?>
		<li class="google-plus"><a href="<?php echo $google; ?>" target="_blank"><span class="fa fa-google-plus"></span><span>Google plus</span></a></li>
		<?php } ?>
		<?php if (!empty($pinterest)) { ?>
		<li class="pinterest"><a href="<?php echo $pinterest; ?>" target="_blank"><span class="fa fa-pinterest"></span><span>Pinterest</span></a></li>
		<?php } */?>
	</ul>	
</div>


<script type="text/javascript">
// Customize twitter feed
var hideTwitterAttempts = 0;
function hideTwitterBoxElements() {
	setTimeout( function() {
		if ( $('[id*=pav-twitter]').length ) {
			$('#pav-twitter iframe').each( function(){
				var ibody = $(this).contents().find( 'body' );
				if ( ibody.find( '.timeline .stream .h-feed li.tweet' ).length ) {
					ibody.find( '.header .p-nickname' ).css( 'color', '<?php echo $nickname_color; ?>' );
					ibody.find( '.p-name' ).css( 'color', '<?php echo $name_color; ?>' );
					ibody.find( '.e-entry-title' ).css( 'color', '<?php echo $title_color; ?>' );
				} else {
					$(this).hide();
				}
			});
		}
		hideTwitterAttempts++;
		if ( hideTwitterAttempts < 3 ) {
			hideTwitterBoxElements();
		}
	}, 1500);
}
// somewhere in your code after html page load
hideTwitterBoxElements();
</script>