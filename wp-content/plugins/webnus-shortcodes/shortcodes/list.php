<?php

 // Lists (ul li)
 function easyweb_webnus_list( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => 'plus',

 	), $atts));
 	return '<ul class="'. $type . '" >' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('ul', 'easyweb_webnus_list');

 function easyweb_webnus_list_item( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
	return '<li class="'. $type .'">' . do_shortcode($content) . '</li>';
 }
 add_shortcode('li', 'easyweb_webnus_list_item');

?>