<?php
vc_map( array(
	'base'			=> 'pricing-tables',
	'name'			=> 'Pricing Tables',
	'description'	=> 'Pricing Tables',
	'icon'			=> 'webnus_pricingtable',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'easyweb' ),

	'params' => array(

		array(
			'heading'		=> esc_html__( 'Type', 'easyweb' ),
			'description'	=> esc_html__( 'You can choose among these pre-designed types.', 'easyweb'),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Type 1', 'easyweb' ) => '1',
				esc_html__( 'Type 2', 'easyweb' ) => '2',
				esc_html__( 'Type 3', 'easyweb' ) => '3',
				esc_html__( 'Type 4', 'easyweb' ) => '4',
				esc_html__( 'Type 5', 'easyweb' ) => '5',
				esc_html__( 'Type 6', 'easyweb' ) => '6',
				esc_html__( 'Type 7', 'easyweb' ) => '7',
			),
		),

		array(
			'heading'		=> esc_html__( 'Title', 'easyweb' ),
			'description' 	=> esc_html__( 'Pricing Table Title', 'easyweb'),
			'type'			=> 'textfield',
			'param_name'	=> 'title',
		),

		array(
			'heading'		=> esc_html__( 'Header Description', 'easyweb' ),
			'description' 	=> esc_html__( 'Pricing Table Description', 'easyweb'),
			'type'			=> 'textfield',
			'param_name'	=> 'description',
			'dependency'	=> array( 'element' => 'type', 'value' => '4' ),
		),

		array(
			'heading'		=> esc_html__( 'Price Symbol', 'easyweb' ),
			'type'			=> 'textfield',
			'param_name'	=> 'price_symbol',
			'value'			=> '$',
			'dependency'	=> array( 'element' => 'type', 'value' => '7' ),
		),

		array(
			'heading'		=> esc_html__( 'Price', 'easyweb' ),
			'description'	=> esc_html__( 'Pricing Table Price', 'easyweb'),
			'type'			=> 'textfield',
			'param_name'	=> 'price',
			'value'			=> '$10',
		),

		array(
			'heading'		=> esc_html__( 'Special Offer', 'easyweb' ),
			'description'	=> esc_html__( 'Pricing Table Special Offer or On Sale Price', 'easyweb'),
			'type'			=> 'textfield',
			'param_name'	=> 'on_sale_price',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Plan Label', 'easyweb' ),
			'description'	=> esc_html__( 'Pricing Table Label', 'easyweb'),
			'type'			=> 'textfield',
			'param_name'	=> 'plan_label',
			'value'			=> '',
			'dependency'	=> array( 'element' => 'type', 'value' => array( '3', '5' ) ),
		),

		array(
			'heading'		=> esc_html__( 'Label Color', 'easyweb' ),
			'description' 	=> esc_html__( 'Select Custom Label Color', 'easyweb'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'label_bg_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '5' ),
		),

		array(
			'heading'		=> esc_html__( 'Period', 'easyweb' ),
			'description'	=> esc_html__( 'Pricing Table Period', 'easyweb'),
			'type'			=> 'textfield',
			'param_name'	=> 'period',
			'value'			=> esc_html__( 'Month', 'easyweb'),
		),

		array(
			'heading'		=> esc_html__( 'Features', 'easyweb' ),
			'description'	=> esc_html__( 'Enter features for pricing table - value, title and color.', 'easyweb' ),
			'type'			=> 'param_group',
			'param_name'	=> 'features',
			'params' => array(
				array(
					'heading'	 => esc_html__( 'Feature Item Icon', 'easyweb' ),
					'type'		 => 'dropdown',
					'param_name' => 'feature_icon',
					'value'		 => array(
						esc_html__( 'Empty', 'easyweb' )			=> 'empty-icon',
						esc_html__( 'Available', 'easyweb' )		=> 'available-icon',
						esc_html__( 'Not Available', 'easyweb' )	=> 'not-available-icon',
					),
					'admin_label'	=> true,
				),
				array(
					'heading'		=> esc_html__( 'Feature Item Text', 'easyweb' ),
					'type'			=> 'textfield',
					'param_name'	=> 'feature_item',
					'admin_label'	=> true,
				),
			),
		),

		array(
			'heading'		=> esc_html__( 'Footer Pricing Table Text', 'easyweb' ),
			'type'			=> 'textfield',
			'param_name'	=> 'footer_text',
			'value'			=> '',
		),		

		array(
			'heading'		=> esc_html__( 'Button Text', 'easyweb' ),
			'type'			=> 'textfield',
			'param_name'	=> 'button_text',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Button URL', 'easyweb' ),
			'description'	=> esc_html__( 'Button URL (http://example.com)', 'easyweb' ),	
			'type'			=> 'textfield',
			'param_name'	=> 'button_url',
			'value'			=> '',
		),

		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Featured Plan ?', 'easyweb' ),
			'param_name'	=> 'featured',
			'value'			=> array( esc_html__( 'Yes', 'easyweb' ) => ' w-featured' ),
			'description'	=> esc_html__( 'Pricing Tables Featured Plan', 'easyweb'),
		),

		array(
			'heading'		=> esc_html__('Plan Icon', 'easyweb'),
			'type'			=> 'iconfonts',
			'param_name'	=> 'icon',
			'value'			=> '',
			'dependency'	=> array(
				'element' => 'type',
				'value'   => '2',
			),
		),

		array(
			'heading'		=> esc_html__( 'Heading Background Color', 'easyweb' ),
			'description' 	=> esc_html__( 'Select Custom Background Color', 'easyweb'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'heading_bg_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),

		array(
			'heading'		=> esc_html__( 'Heading Text Color', 'easyweb' ),
			'description' 	=> esc_html__( 'Select Custom Text Color', 'easyweb'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'heading_text_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),
	)

) );