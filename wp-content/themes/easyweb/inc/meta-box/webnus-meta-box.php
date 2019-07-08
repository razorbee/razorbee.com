<?php
add_filter( 'rwmb_meta_boxes', 'easyweb_meta_boxes' );
function easyweb_meta_boxes( $meta_boxes ) {

	// Post
	$meta_boxes[] = array(
		'title'			=> esc_attr__( 'Webnus Post Options', 'easyweb' ),
		'post_types'	=> 'post',
		'fields'		=> array(
			array(
				'id'	=> 'easyweb_featured_video_meta',
				'name'	=> esc_attr__( 'Video or Audio iFrame', 'easyweb' ),
				'desc'	=> esc_attr__( 'Enter the Embed Code', 'easyweb' ),
				'type'	=> 'textarea',
			),
			array(
				'id'	=> 'easyweb_blogpost_meta',
				'name'	=> esc_attr__( 'Post Style', 'easyweb' ),
				'type'	=> 'select',
				'options'     => array(
					'postshow1' => esc_attr__( 'Post Show1 Style', 'easyweb' ),
					'postshow2' => esc_attr__( 'Post Show2 Style', 'easyweb' ),
				),
				'placeholder' => esc_attr__( 'Select an Item', 'easyweb' ),
			),
		),
	);

	// Page
	$meta_boxes[] = array(
		'title'			=> esc_attr__( 'Webnus Page Options', 'easyweb' ),
		'post_types'	=> 'page',
		'fields'		=> array(
			array(
				'id'	=> 'easyweb_page_title_bar_meta',
				'name'	=> esc_attr__( 'Show Page Title:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'id'	=> 'easyweb_page_title_text_color_meta',
				'name'	=> esc_attr__( 'Page Title Text Color:', 'easyweb' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'easyweb_page_title_bg_color_meta',
				'name'	=> esc_attr__( 'Page Title Background Color:', 'easyweb' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'easyweb_page_title_font_size_meta',
				'name'	=> esc_attr__( 'Page Title Font Size:', 'easyweb' ),
				'desc'	=> esc_attr__( '(in px format)', 'easyweb' ),
				'type'	=> 'text',
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'easyweb_transparent_header_meta',
				'name'	=> esc_attr__( 'Transparent Header:', 'easyweb' ),
				'type'	=> 'select',
				'options'	=> array(
					'light'	=> esc_attr__( 'Light Style', 'easyweb' ),
					'dark'	=> esc_attr__( 'Dark Style', 'easyweb' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'easyweb' ),
			),
			array(
				'id'	=> 'easyweb_hide_header_meta',
				'name'	=> esc_attr__( 'Hide Header at Start:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'easyweb_sidebar_position_meta',
				'name'	=> esc_attr__( 'Sidebar Position:', 'easyweb' ),
				'type'	=> 'select',
				'options'	=> array(
					'right'	=> esc_attr__( 'Right', 'easyweb' ),
					'left'	=> esc_attr__( 'Left', 'easyweb' ),
					'both'	=> esc_attr__( 'Both', 'easyweb' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'easyweb' ),
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'easyweb_topbar_show',
				'name'	=> esc_attr__( 'Show Topbar:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'id'	=> 'easyweb_header_show',
				'name'	=> esc_attr__( 'Show Header:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'id'	=> 'easyweb_footer_show',
				'name'	=> esc_attr__( 'Show Footer:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'easyweb_wrap_color_meta',
				'name'	=> esc_attr__( 'Content Background Color:', 'easyweb' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'easyweb_body_bg_color_meta',
				'name'	=> esc_attr__( 'Body Background Color:', 'easyweb' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'easyweb_body_bg_img_meta',
				'name'	=> esc_attr__( 'Body Background Image:', 'easyweb' ),
				'type'	=> 'image_advanced',
			),
			array(
				'id'	=> 'easyweb_body_bg_image_100_meta',
				'name'	=> esc_attr__( '100% Background Image:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
			array(
				'id'	=> 'easyweb_body_bg_image_repeat_meta',
				'name'	=> esc_attr__( 'Background Repeat:', 'easyweb' ),
				'type'	=> 'select',
				'options'	=> array(
					'0'	=> esc_attr__( 'No repeat', 'easyweb' ),
					'1'	=> esc_attr__( 'Repeat both vertically and horizontally', 'easyweb' ),
					'2'	=> esc_attr__( 'Repeat only horizontally', 'easyweb' ),
					'3'	=> esc_attr__( 'Repeat only vertically', 'easyweb' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'easyweb' ),
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'easyweb_onepage_menu_meta',
				'name'	=> esc_attr__( 'OnePage Menu:', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'easyweb_mega_menu_meta',
				'name'	=> esc_attr__( 'Is mega menu?', 'easyweb' ),
				'desc'	=> esc_attr__( 'Is this page Mega Menu content', 'easyweb' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
		),
	);

	return $meta_boxes;
}