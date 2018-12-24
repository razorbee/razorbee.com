<?php
vc_map( array(
	'name'			=> esc_html__( 'Testimonial Carousel', 'easyweb' ),
	'base'			=> 'testimonial-carousel',
	'description'	=> esc_html__( 'Testimonial Carousel', 'easyweb' ),
	'icon'			=> 'testimonial-carousel',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	'params'		=> array(

		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Testimonial Items Per View', 'easyweb' ),
			'param_name'	=> 'items',
			'value'			=> '3',
		),

		array(
			'heading'		=> esc_html__( 'Testimonial Items', 'easyweb' ),
			'type'			=> 'param_group',
			'param_name'	=> 'testimonial_item',
			'params' => array(

				array(
					'heading'		=> esc_html__( 'Testimonial Image', 'easyweb' ),
					'type'			=> 'attach_image',
					'param_name'	=> 'img',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Content', 'easyweb' ),
					'type'			=> 'textarea',
					'param_name'	=> 'tc_content',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Name', 'easyweb' ),
					'type'			=> 'textfield',
					'param_name'	=> 'name',
					'value'			=> '',
					'admin_label'	=> true,
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Job', 'easyweb' ),
					'type'			=> 'textfield',
					'param_name'	=> 'job',
					'value'			=> '',
					'admin_label'	=> true,
				),
			),
		),

	)
) );