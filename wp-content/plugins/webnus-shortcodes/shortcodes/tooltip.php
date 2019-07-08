<?php
function easyweb_webnus_tooltips ($atts, $content = null) {
 	extract(shortcode_atts(array(
	 	'tooltiptext'      => 'Tooltip Text',
	 	'tooltip_content'      => '',
	), $atts));

 	$out = '<span class="tooltips"><a href="#" rel="help" title="' .$tooltiptext. '">';

 	$out .= $tooltip_content;
 	$out .= '</a></span>';
 	return $out;
 }
 add_shortcode('tooltip','easyweb_webnus_tooltips');

?>