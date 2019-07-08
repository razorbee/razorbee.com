<?php

 // Paragraph
 function easyweb_webnus_paragraph ($atts, $content = null) {
	extract(shortcode_atts(array(
		'class'      => ''
	), $atts));
 	return '<p class="'. $class .'">' . do_shortcode($content) . '</p>';
 }
 add_shortcode('p','easyweb_webnus_paragraph');
 
 
function easyweb_webnus_maxone_paragraph ($atts, $content = null) {
	extract(shortcode_atts(array(
		'class'      => ''
	), $atts));
 	return '<p class="max-p">' . do_shortcode($content) . '</p>';
 }
 add_shortcode('max-p','easyweb_webnus_maxone_paragraph');


 // Link (magicmore)
function  easyweb_webnus_magiclink_shortcode($attributes, $content = null)
{

	extract(shortcode_atts(array(
	"url" => '#',
		), $attributes));

	return '<a class="magicmore" href="'. esc_url($url) .'">'. do_shortcode($content) . '</a>';
}
add_shortcode("link", 'easyweb_webnus_magiclink_shortcode');

 // BoxLink (magiclink)
function  easyweb_webnus_boxlink_shortcode($attributes, $content = null)
{

	extract(shortcode_atts(array(
	"url" => '#',
	"boxlink_content" => '',
		), $attributes));

	return '<div class="magic-link"><a href="'. esc_url($url) .'">'. $boxlink_content . '</a></div>';
}
add_shortcode("boxlink", 'easyweb_webnus_boxlink_shortcode');



 // Lists (ul li)
 function easyweb_webnus_ul( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
 	return '<ul class="'. $type . '" >' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('list-ul', 'easyweb_webnus_ul');

 function easyweb_webnus_li( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
	return '<li class="'. $type .'">' . do_shortcode($content) . '</li>';
 }
 add_shortcode('li-row', 'easyweb_webnus_li');

 

  // Center
 function easyweb_webnus_center( $atts, $content = null ) {
 	
	return '<div class="aligncenter">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('center', 'easyweb_webnus_center');


  // Span
 function easyweb_webnus_span( $atts, $content = null ) {
 	
	return '<span>' . do_shortcode($content) . '</span>';
 }
 add_shortcode('span', 'easyweb_webnus_span');


  // Row
 function easyweb_webnus_row( $atts, $content = null ) {
 	
	return '<div class="row">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('row', 'easyweb_webnus_row');

 // Row
 function easyweb_webnus_container( $atts, $content = null ) {
 	
	
	return '<section class="container">' . do_shortcode($content) . '</section>';
	
 }
 add_shortcode('container', 'easyweb_webnus_container');

// Horizonal line1
 function easyweb_webnus_hr1( $atts, $content = null ) {
 	return '<hr class="vertical-space1">';
 }
 add_shortcode('line1', 'easyweb_webnus_hr1');
 
// Horizonal line2
 function easyweb_webnus_hr2( $atts, $content = null ) {
 	return '<hr class="vertical-space2">';
 }
 add_shortcode('line2', 'easyweb_webnus_hr2');
 // Clear
 function easyweb_webnus_clear( $atts, $content = null ) {
 	return '<div class="clear"></div>';
 }
 add_shortcode('clear', 'easyweb_webnus_clear');


 
  // Horizonal line
 function easyweb_webnus_hr( $atts, $content = null ) {
 	
	extract(shortcode_atts(array(
 	'type'      => '1'
						), $atts));
	return ( $type == '1')?  '<hr>' : '<hr class="boldbx">';
	
	
 }
 add_shortcode('line', 'easyweb_webnus_hr');

 
 // Horizonal line
 function easyweb_webnus_thickline( $atts, $content = null ) {
 	return '<hr class="boldbx">';
 }
 add_shortcode('tline', 'easyweb_webnus_thickline');


 // Maxone line
 function easyweb_webnus_maxline( $atts, $content = null ) {
 	return '<span class="max-line"></span>';
 }
 add_shortcode('max-line', 'easyweb_webnus_maxline');
 
 
 

?>