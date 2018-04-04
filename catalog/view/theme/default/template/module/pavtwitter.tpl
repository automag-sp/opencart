<?php $id = rand(); ?>

<?php ?>
<div class="box pavtwitter">
	<div class="box-heading">		
		<span><?php echo $heading_title;?></span>
	</div>
	<div class="box-content">
		<div id="pav-twitter<?php echo $id;?>" class="pav-twitter">
			<a class="twitter-timeline" data-dnt="true" data-theme="<?php echo $theme; ?>" data-link-color="#<?php echo $link_color;?>" data-chrome="<?php echo $chrome; ?>" data-border-color="#<?php echo $border_color ?>" lang="<?php echo $language_code;?>" data-tweet-limit="<?php echo $count; ?>" data-show-replies="<?php echo $show_replies==1?'true':'false'; ?>" href="https://twitter.com/<?php echo $username; ?>"  data-widget-id="<?php echo $widget_id; ?>">Tweets by @<?php echo $username;?></a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
</div>

<script type="text/javascript">
// Customize twitter feed
var hideTwitterAttempts = 0;
function hideTwitterBoxElements() {
	setTimeout( function() {
		if ( $('[id*=pav-twitter<?php echo $id;?>]').length ) {
			$('#pav-twitter<?php echo $id;?> iframe').each( function(){
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