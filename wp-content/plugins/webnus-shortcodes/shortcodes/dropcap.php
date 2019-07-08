<?php
function easyweb_webnus_dropcap1 ($atts, $content = null) {

	extract( shortcode_atts( array(
		'dropcap1_content' => '', 

	), $atts ) );

 	return '<span class="dropcap1">' . $dropcap1_content . '</span>';
 }
add_shortcode('dropcap1','easyweb_webnus_dropcap1');

function easyweb_webnus_dropcap2 ($atts, $content = null) {

	extract( shortcode_atts( array(
		'dropcap2_content' => '', 

	), $atts ) );

	return '<span class="dropcap2">' . $dropcap2_content . '</span>';
}
add_shortcode('dropcap2','easyweb_webnus_dropcap2');

function easyweb_webnus_dropcap3 ($atts, $content = null) {

	extract( shortcode_atts( array(
		'dropcap3_content' => '', 

	), $atts ) );

	return '<span class="dropcap3">' . $dropcap3_content . '</span>';
}
add_shortcode('dropcap3','easyweb_webnus_dropcap3');

function easyweb_webnus_dropcap ($atts, $content = null) {
	extract( shortcode_atts( array(
	'type' => '1', 
	'dropcap_content' => '', 

), $atts ) );
return '<span class="dropcap'.$type.'">' . $dropcap_content . '</span>';
}
add_shortcode('dropcap','easyweb_webnus_dropcap');
?>