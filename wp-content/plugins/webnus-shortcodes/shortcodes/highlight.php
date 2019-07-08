<?php
function easyweb_webnus_highlight1 ($atts, $content = null) {

 	return '<span class="highlight1">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight1','easyweb_webnus_highlight1');

 function easyweb_webnus_highlight2 ($atts, $content = null) {

 	return '<span class="highlight2">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight2','easyweb_webnus_highlight2');

 function easyweb_webnus_highlight3 ($atts, $content = null) {

 	return '<span class="highlight3">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight3','easyweb_webnus_highlight3');

 function easyweb_webnus_highlight4 ($atts, $content = null) {

 	return '<span class="highlight4">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight4','easyweb_webnus_highlight4');
 
 
 function easyweb_webnus_highlight( $atts, $content = null ) {
 	extract( shortcode_atts( array(
 	'type' => '1', 
 	
 	), $atts ) );
	return '<span class="highlight'.$type.'">' . do_shortcode($content) . '</span>';
}
 add_shortcode('highlight','easyweb_webnus_highlight');
?>