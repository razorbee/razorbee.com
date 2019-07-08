<?php
vc_map( array(
	'name'			=> esc_html__( ' Webnus Pricing Plan ', 'easyweb' ),
	'base'			=> 'pricing-plan',
	'description'	=> esc_html__( 'Webnus Pricing Plan', 'easyweb' ),
	'icon'			=> 'pricing-plan',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	'params'		=> array(

		array(
			'heading'		=> esc_html__( 'Type', 'easyweb' ),
			'description'	=> esc_html__( 'You can choose among these pre-designed types.', 'easyweb'),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Type 1', 'easyweb' ) => '1',
				esc_html__( 'Type 2', 'easyweb' ) => '2',
			),
		),

		array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'easyweb' ),
				'param_name' => 'title',
				'value'=>'',
				'description' => esc_html__( 'Enter title pricing table', 'easyweb'),
		),

		array(
			'heading'		=> esc_html__( 'Features', 'easyweb' ),
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
			'dependency'	=> array( 'element' => 'type', 'value' => '2' ),
		),

		array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Content', 'easyweb' ),
				'param_name' => 'text_content',
				'value'=>'',
				'description' => esc_html__( 'Enter the content Name', 'easyweb'),
				'dependency'	=> array( 'element' => 'type', 'value' => '1' ),	
		),

		array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Flag', 'easyweb' ),
				'param_name' => 'flag',
				'value'		 => array(
					esc_html__( 'None', 'easyweb' )	=> 'none',
					esc_html__( 'Featured', 'easyweb' )	=> 'Featured',
					esc_html__( 'Popular', 'easyweb' )	=> 'Popular',
				),
				'description' => esc_html__( 'Enter the content Name', 'easyweb'),
				'dependency'	=> array( 'element' => 'type', 'value' => '2' ),	
		),

		array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Price', 'easyweb' ),
				'param_name' => 'price',
				'value'=>'$',
				'description' => esc_html__( 'Enter the price Name', 'easyweb'),
			),

		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Link Text', 'easyweb'),
			"param_name"=> "link_text",
			"value"=>"",
			"description" => esc_html__( "Link Text", 'easyweb'),	
		),

		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Link URL', 'easyweb'),
			"param_name"=> "link_url",
			"value"=>"",
			"description" => esc_html__( "Link URL (http://example.com)", 'easyweb'),	
		),

) ) );