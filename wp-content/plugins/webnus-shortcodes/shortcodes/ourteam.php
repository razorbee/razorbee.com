<?php
function easyweb_webnus_ourteam ( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'			=> '1',
		'img'			=> '',
		'name'			=> '',
		'title'			=> '',
		'text'			=> '',
		'link'			=> '',
		'social'		=> '',
		'first_social'	=> 'twitter',
		'first_url'		=> '',
		'second_social'	=> 'facebook',
		'second_url'	=> '',
		'third_social'	=> 'google-plus',
		'third_url'		=> '',
		'fourth_social'	=> 'linkedin',
		'fourth_url'	=> '',
	), $atts ) );
	
	// if image is numeric, return image url
	if( is_numeric( $img ) )
		$img = wp_get_attachment_url( $img );

	// socials
	$socials = '';
	if ( $social == 'enable' ) :
		$social1 = $social2 = $social3 = $social4 = '';
		$social1 = ( $first_url ) ? '<a href="' . esc_url( $first_url ) . '" target="_blank"><i class="fa-' . $first_social . '"></i></a>' : '';
		$social2 = ( $second_url ) ? '<a href="' . esc_url( $second_url ) . '" target="_blank"><i class="fa-' . $second_social . '"></i></a>' : '';
		$social3 = ( $third_url ) ? '<a href="' . esc_url( $third_url ) . '" target="_blank"><i class="fa-' . $third_social . '"></i></a>' : '';
		$social4 = ( $fourth_url ) ? '<a href="' . esc_url( $fourth_url ) . '" target="_blank"><i class="fa-' . $fourth_social . '"></i></a>' : '';
		$socials = '<div class="social-team">' . $social1 . $social2 . $social3 . $social4 . '</div>';
	endif; 

	// link
	$start_link = $end_link = ''; 
	if ( $link ) :
		$start_link = '<a href="' . esc_url($link) . '">';
		$end_link 	= '</a>';
	endif;

	// render content
	$out = '';
	switch ( $type ) :
		case '3':
			$out .= '
			<article class="our-team3 clearfix">
				<figure>
					<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
				</figure>
				<div class="tdetail">
					' . $start_link . '
						<h2>' . esc_html( $name ) . '</h2>
						<h5>' . esc_html( $title ) . '</h5>
					' . $end_link . '
					' . $socials . '
				</div>
			</article>';
		break;

		// other types
		default:
			// description text
			$text = ( $text && $type == '6' ) ? '<p>' . esc_html( $text ) . '</p>' : '';

			$out .= '
			<article class="our-team' . $type . '">
				<figure>
					<img src="' . esc_url( $img ) . '" alt="' . esc_html( $name ) . '">
					' . $start_link . '
						<figcaption>
							<h2>' . esc_html( $name ) . '</h2>
							<h5>' . esc_html( $title ) . '</h5>
						</figcaption>
					' . $end_link . '
				</figure>
				' . $text . '
				' . $socials . '
			</article>';	
		break;
	endswitch;

	return $out;
}

add_shortcode('ourteam','easyweb_webnus_ourteam');