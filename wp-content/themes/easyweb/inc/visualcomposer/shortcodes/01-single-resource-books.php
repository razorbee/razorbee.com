<?php
vc_map( array(
	'name'			=> esc_html__( 'Webnus Single Resource Books', 'easyweb' ),
	'base'			=> 'single-resource-books',
	'description'	=> esc_html__( 'Webnus Resource Books', 'easyweb' ),
	'icon'			=> 'single-resource-books',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	'params'		=> array(

		array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'easyweb' ),
				'param_name' => 'name',
				'value'=>'',
				'description' => esc_html__( 'Enter the book Name', 'easyweb'),
		),

		array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'easyweb' ),
				'param_name' => 'img',
				'value'=>'',
				'description' => esc_html__( 'Image', 'easyweb'),
		),

		array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Author', 'easyweb' ),
				'param_name' => 'author',
				'value'=>'',
				'description' => esc_html__( 'Enter the Author Name', 'easyweb'),
		),

		array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Content', 'easyweb' ),
				'param_name' => 'text',
				'value'=>'',
				'description' => esc_html__( 'content', 'easyweb'),
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