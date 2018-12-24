<?php
function easyweb_webnus_testimonial_carousel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'testimonial_item'	=> '',
		'items'				=> '',
	), $atts));

	// testimonial_item loop
	$testimonial_item		= (array) vc_param_group_parse_atts( $testimonial_item );
	$testimonial_item_data	= array();
	foreach ( $testimonial_item as $data ) :
		if( isset( $data['img'] ) && is_numeric( $data['img'] ) )
			$data['img'] = wp_get_attachment_url( $data['img'] );

		$new_line 				= $data;
		$new_line['img']		= isset( $data['img'] ) ? '<img src="' . esc_url( $data['img'] ) . '" alt="' . $data['name'] . '">' : '';
		$new_line['tc_content']	= isset( $data['tc_content'] ) ? '<p class="tc-content">' . esc_html( $data['tc_content'] ) . '</p>' : '';
		$new_line['name']		= isset( $data['name'] ) ? '<p class="tc-name">' . esc_html( $data['name'] ) . '</p>' : '';
		$new_line['job']		= isset( $data['job'] ) ? '<p class="tc-job">' . esc_html( $data['job'] ) . '</p>' : '';

		$testimonial_item_data[]= $new_line;
	endforeach;

	$items = $items ? intval( $items ) : '3';
	
	// render
	$out = '<div class="testimonial-carousel">';
		$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
			foreach ( $testimonial_item_data as $line ) :
				$out .= '<div class="tc-item">' . $line['img'] . $line['tc_content'] . $line['name'] . $line['job'] . '</div>';
			endforeach;
		$out .= '</div>';
		// pagination
		$out .= '
			<div class="tc-navigation">
				<a class="btn prev"><i class="fa-angle-left"></i></a>
				<a class="btn next"><i class="fa-angle-right"></i></a>
			</div>';
	$out .= '</div>';
	
	return $out;
}

add_shortcode( 'testimonial-carousel', 'easyweb_webnus_testimonial_carousel' );