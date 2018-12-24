<?php
$easyweb_webnus_options = easyweb_webnus_options();
echo '<section class="footer-subscribe-bar"><div class="container"><div class="row">';
$type = isset($easyweb_webnus_options['easyweb_webnus_footer_subscribe_type']) ? $easyweb_webnus_options['easyweb_webnus_footer_subscribe_type'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_feedburner_id'] = isset($easyweb_webnus_options['easyweb_webnus_footer_feedburner_id']) ? $easyweb_webnus_options['easyweb_webnus_footer_feedburner_id'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_mailchimp_url'] = isset($easyweb_webnus_options['easyweb_webnus_footer_mailchimp_url']) ? $easyweb_webnus_options['easyweb_webnus_footer_mailchimp_url'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_subscribe_text'] = isset($easyweb_webnus_options['easyweb_webnus_footer_subscribe_text']) ? $easyweb_webnus_options['easyweb_webnus_footer_subscribe_text'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_subscribe_title'] = isset($easyweb_webnus_options['easyweb_webnus_footer_subscribe_title']) ? $easyweb_webnus_options['easyweb_webnus_footer_subscribe_title'] : 'We will send you news and offers twice a month' ;
$feedburner_id = esc_html($easyweb_webnus_options['easyweb_webnus_footer_feedburner_id']);
$mailchimp_url = esc_url($easyweb_webnus_options['easyweb_webnus_footer_mailchimp_url']);
$subscribe_text = esc_html($easyweb_webnus_options['easyweb_webnus_footer_subscribe_text']);
$subscribe_title = esc_html($easyweb_webnus_options['easyweb_webnus_footer_subscribe_title']);
if($type =='FeedBurner'){ 
	$email_name='email';
	echo '<form class="footer-subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open(\'http://feedburner.google.com/fb/a/mailverify?uri='.$feedburner_id.'\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true"><input type="hidden" value="'.$feedburner_id.'" name="uri"/><input type="hidden" name="loc" value="en_US"/>';
}else{ 
	$email_name='MERGE0';
	echo '<form class="footer-subscribe-form" action="'.$mailchimp_url.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">';
}
echo '
	<div class="footer-subscribe-text col-sm-7">
		<h6>'.$subscribe_title.'</h6>
		<p>'.$subscribe_text.'</p>
	</div>
	<div class="col-sm-5">
		<input placeholder="'.esc_html__('Enter Your Email','easyweb').'" class="footer-subscribe-email" type="text" name="'.$email_name.'"/>
		<button class="footer-subscribe-submit" type="submit">'.esc_html__('Join ','easyweb').'</button>
	</div>
	</form></div></div></section>';
?>