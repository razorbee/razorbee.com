<?php


function easyweb_webnus_flexslider($attributes, $content){

$out = '<div class="flexslider"><ul class="slides">'. do_shortcode($content) .'</ul></div>';

return $out;
}

add_shortcode("flexslider", "easyweb_webnus_flexslider");

function easyweb_webnus_flexslideritem($attributes, $content){

	extract(shortcode_atts(array(
	
	"img" => '',
	"alt"=>''
	), $attributes));

$out = ' <li><img src="'.$img.'" alt="'.$alt.'"></li>';

return $out;
}

add_shortcode("flexitem", "easyweb_webnus_flexslideritem");
?>