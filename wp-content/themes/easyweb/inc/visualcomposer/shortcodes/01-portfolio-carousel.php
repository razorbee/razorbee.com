<?php
vc_map(array(
	'name'		  => esc_html__( 'Portfolio Carousel', 'easyweb' ),
	'base'		  => 'portfolio-carousel',
	'description' => esc_html__( 'Portfolio Carousel Element', 'easyweb' ),
	'icon'		  => 'portfolio-carousel',
	'category'	  => esc_html__( 'Webnus Shortcodes', 'easyweb' ),       
	'params'	  => array(

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'easyweb' ),
			'param_name' => 'title',
			'value' => esc_html__( 'Recent Works', 'easyweb' ),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Carousel Count', 'easyweb' ),
			'param_name' => 'carousel_count',
			'value' => '10',
			'description' => esc_html__( 'Default: 10', 'easyweb'),
		),

	)
));