<?php


 // distance (horizonal-space)
 function easyweb_webnus_distance1 ($atts, $content = null) {

 	return '<hr class="vertical-space1">';
 }
 add_shortcode('distance1','easyweb_webnus_distance1');
 
 function easyweb_webnus_distance2 ($atts, $content = null) {

 	return '<hr class="vertical-space2">';
 }
 add_shortcode('distance2','easyweb_webnus_distance2');
 
  function easyweb_webnus_distance3 ($atts, $content = null) {

 	return '<hr class="vertical-space3">';
 }
 add_shortcode('distance3','easyweb_webnus_distance3');

  function easyweb_webnus_distance4 ($atts, $content = null) {

 	return '<hr class="vertical-space4">';
 }
 add_shortcode('distance4','easyweb_webnus_distance4');

 
  function easyweb_webnus_distance ($atts, $content = null) {
	extract(shortcode_atts(array(
 	'type'      => '1'
						), $atts));
 	return ($type >0 )? '<hr class="vertical-space'.$type.'">': '<div class="null"></div>';
 }
 add_shortcode('distance','easyweb_webnus_distance');
 
?>