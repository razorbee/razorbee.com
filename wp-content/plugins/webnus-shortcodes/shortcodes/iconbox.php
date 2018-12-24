<?php
function easyweb_webnus_iconbox( $attributes, $content = null ) {

	extract(shortcode_atts(array(
		"type"=>'',
		'icon_title'=>'',
		'icon_link_url'=>'',
		'icon_link_text'=>'',
		"icon_name"=>'',
		"iconbox_content"=>'',
		"icon_size"=>'',
		"icon_color"=>'',
		"title_color"=>'',
		"content_color"=>'',
		"link_color"=>'',
		"icon_image"=>'',
		"featured"=>'',
		"border_left"=>'',
		"border_right"=>'',
	), $attributes));
	ob_start();

	$type =  ( $type == 0 ) ? '' : $type ;

	$iconbox_style = $type17_start_wrap = $type17_end_wrap = '';
	if ( $type==17 ) {
		$iconbox_style = ( !empty($icon_color) ) ? ' style="color: ' . esc_attr($icon_color) . '"' : '' ;
		$type17_start_wrap = '<div class="icon-wrap" style="background-color:' . esc_attr($icon_color) . '">';
		$type17_end_wrap   = '</div>';
	}

	$iconbox22_class = '';
	if ( $type == 22 ) {
		$iconbox22_class .= $featured ? ' ' . $featured : '';
		$iconbox22_class .= $border_left ? ' ' . $border_left : '';
		$iconbox22_class .= $border_right ? ' ' . $border_right : '';
	}
	
	echo '<article class="icon-box' . $type . $iconbox22_class . '" ' . $iconbox_style . '>';

		if(!empty($icon_name) && $icon_name != 'none') :
			if(!empty($icon_link_url))
				echo '' . $type17_start_wrap . '<a href="' . esc_url($icon_link_url) . '">'  . do_shortcode(  "[icon name='$icon_name' size='$icon_size' color='$icon_color']" ).'</a>' . $type17_end_wrap . '';
			else
				echo $type17_start_wrap . do_shortcode(  "[icon name='$icon_name' size='$icon_size' color='$icon_color']" ) . $type17_end_wrap;
		elseif(!empty($icon_image)) :
			if(is_numeric($icon_image)){
				$icon_image = wp_get_attachment_url( $icon_image );
			}
			if(!empty($icon_link_url))
				echo "<a href='$icon_link_url'>" . '<img src="'.$icon_image.'" alt="" />' . '</a>' ;
			else
				echo '<img src="'.$icon_image.'" alt="" />';
		endif;

	 	$title_style = !empty($title_color)?' style="color:'.$title_color.'"':'';
		 echo '<h4'.$title_style.'>' . $icon_title . '</h4>';
		 $content_style = !empty($content_color)?' style="color:'.$content_color.'"':'';
      	 echo '<p'.$content_style.'>'.$iconbox_content .'</p>' ;
		 $link_style = !empty($link_color)?' style="color:'.$link_color.'"':'';
		 echo (!empty($icon_link_url) &&  (!empty($icon_link_text)) )?"<a".$link_style." class=\"magicmore\" href=\"{$icon_link_url}\">{$icon_link_text}</a>":'';

	echo '</article>';
	
$out = ob_get_contents();
ob_end_clean();
$out = str_replace('<p></p>','',$out);
	return $out;
 }
 add_shortcode('iconbox', 'easyweb_webnus_iconbox');
?>