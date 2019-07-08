<?php
function easyweb_webnus_h1 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h1 class="'. $class .'">' . do_shortcode($content) . '</h1>';
 }
 add_shortcode('h1','easyweb_webnus_h1');
 
 function easyweb_webnus_h2 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h2 class="'. $class .'">' . do_shortcode($content) . '</h2>';
 }
 add_shortcode('h2','easyweb_webnus_h2');
 
 function easyweb_webnus_h3 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h3 class="'. $class .'">' . do_shortcode($content) . '</h3>';
 }
 add_shortcode('h3','easyweb_webnus_h3');
 
 function easyweb_webnus_h4 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h4 class="'. $class .'">' . do_shortcode($content) . '</h4>';
 }
 add_shortcode('h4','easyweb_webnus_h4');
 
 function easyweb_webnus_h5 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h5 class="'. $class .'">' . do_shortcode($content) . '</h5>';
 }
 add_shortcode('h5','easyweb_webnus_h5');
 
 function easyweb_webnus_h6 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h6 class="'. $class .'">' . do_shortcode($content) . '</h6>';
 }
 add_shortcode('h6','easyweb_webnus_h6');
 
 
 function easyweb_webnus_strong ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<strong class="'. $class .'">' . do_shortcode($content) . '</strong>';
 }
 add_shortcode('strong','easyweb_webnus_strong');
 
 function easyweb_webnus_br ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<br class="'. $class .'">';
 }
 add_shortcode('br','easyweb_webnus_br');
 
  function easyweb_webnus_div ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<div class="'. $class .'">'.do_shortcode($content). '</div>';
 }
 add_shortcode('div','easyweb_webnus_div');
 ?>