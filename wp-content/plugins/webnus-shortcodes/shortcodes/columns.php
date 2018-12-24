<?php

function easyweb_webnus_onethird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-4">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_third', 'easyweb_webnus_onethird');
 
 
function easyweb_webnus_onehalf( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-6">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_half', 'easyweb_webnus_onehalf');

 
 
function easyweb_webnus_twothird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-8">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('two_third', 'easyweb_webnus_twothird');
 
 
 
 
function easyweb_webnus_onefourth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-3">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_fourth', 'easyweb_webnus_onefourth');
 
 
 
function easyweb_webnus_onesixth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-2">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_sixth', 'easyweb_webnus_onesixth');
 
 function easyweb_webnus_onetwelfth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-1">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_twelfth', 'easyweb_webnus_onetwelfth');
 
?>