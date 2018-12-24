<?php

/**
 * Subtitle
 */
function easyweb_webnus_subtitle ($atts, $content = null) {
	extract( shortcode_atts( array(
		'type'				=> '1',
		'heading'			=> '4',
		'subtitle_content'	=> '',
		'subtitle_color'	=> '',
		'border_color'	=> '',
	), $atts ) );

	$border_color	= $border_color ? ' style="border-bottom-color: ' . $border_color . ';"' : '';
	$subtitle_color	= $subtitle_color ? ' style="color: ' . $subtitle_color . ';"' : '';

	$out = '
	<div class="subtitle-element subtitle-element' . $type . '"' . $border_color .'>
		<h' . $heading . $subtitle_color . '>'. $subtitle_content .'</h' . $heading . '>
	</div>';

	return $out;
 }
 add_shortcode('subtitle','easyweb_webnus_subtitle');


/*  bigtitle */
function easyweb_webnus_bigtitle_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
	'heading'  		 => '2',
	'bigtitle_content' => '',
	'aligncenter'	 => '',
	), $atts));

	$align=($aligncenter)?' aligncenter':'';
	$out = '<h'.$heading.' class="big-title1'.$align.'">'. $bigtitle_content .'</h'.$heading.'>';	
	
	return $out;
}

add_shortcode('big_title','easyweb_webnus_bigtitle_shortcode');


function easyweb_webnus_bigtitle2_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
	'title'      => '',
	'bigtitle'      => '',
	
		), $atts));

	
	$out = '<h2 class="mex-title">'. $bigtitle .'</h2>';
	
	return $out;
}
add_shortcode('big_title2','easyweb_webnus_bigtitle2_shortcode');

function easyweb_webnus_title($atts, $content = null) {
	extract(shortcode_atts(array(
	'type'      => '4',

	), $atts));

	$out = '<h'.$type.'><strong>'.$content.'</strong></h'.$type.'>';
	return $out;
}
add_shortcode('title', 'easyweb_webnus_title');



/**
 * Max Title
 */
function easyweb_webnus_maxtitle_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type'				=> '1',
		'heading'			=> '2',
		'maxtitle_content'	=> '',
		'maxtitle_color'	=> '',
	), $atts ) );

	$maxtitle_color = $maxtitle_color ? ' style="color: ' . $maxtitle_color . ';"' : '';

	$out = '
	<div class="max-title max-title' . $type . '">
		<h' . $heading. $maxtitle_color . '>'. $maxtitle_content .'</h2>
	</div>';

	return $out;
}

add_shortcode('maxtitle','easyweb_webnus_maxtitle_shortcode');