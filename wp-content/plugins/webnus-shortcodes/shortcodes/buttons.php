<?php
 function easyweb_webnus_buttons( $atts, $content = null ) {
 	extract(shortcode_atts(array(
	'btn_content'     => '',
	'shape'     => '',
 	'url'      => '#',
 	'target'   => '_self',
 	'color'    => 'theme-skin',
 	'size'     => 'small',
	'border'   => 'false',
	'icon'     => ''
 	), $atts));
	$border = ( 'true' == $border ) ? 'bordered-bot' : '';
	$icon_str = !empty($icon)? '<i class="'.$icon.'"></i>' : '';
 	$out = '<a href="'. $url . '" class="button '.$color.' '.$shape.' '.$size.' '.$border.' " target="'.$target.'">'. $icon_str . $btn_content . '</a>';
 	return $out;
 }
 add_shortcode('button', 'easyweb_webnus_buttons');
?>