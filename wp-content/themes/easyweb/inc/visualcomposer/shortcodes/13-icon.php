<?php
vc_map( array(
    "name" =>"Webnus Icon",
    "base" => "icon",
	"description" => "Vector font icon",
    
	"icon" => "webnus_icon",
    "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
    "params" => array(
       
         array(
			"type"=>'textfield',
			"heading"=>esc_html__('Icon Size', 'easyweb'),
			"param_name"=> "size",
			"value"=>"",
			"description" => esc_html__( "Icon size in px format, Example: 16px", 'easyweb')
			
		),
		array(
			"type"=>'colorpicker',
			"heading"=>esc_html__('Icon color', 'easyweb'),
			"param_name"=> "color",
			"value"=>"",
			"description" => esc_html__( "Select icon color", 'easyweb')
			
		),
		 array(
			"type"=>'textfield',
			"heading"=>esc_html__('Icon Link URL', 'easyweb'),
			"param_name"=> "link",
			"value"=>"",
			"description" => esc_html__( "Icon link URL http:// ", 'easyweb')
			
		),
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Icon Link Class', 'easyweb'),
			"param_name"=> "link_class",
			"value"=>"",
			"description" => esc_html__( "Icon link Class ", 'easyweb')
			
		),
		array(
			"type" => "colorpicker",
			"heading" => __( "Custom background color", "easyweb" ),
			"param_name" => "bg_color",
			"value"=>"",
			"description" => esc_html__( "Select background color", 'easyweb')
		),
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Padding', 'easyweb'),
			"param_name"=> "padding",
			"value"=>"",
			"description" => esc_html__( "Example: 20px", 'easyweb')
		),
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Border Radius', 'easyweb'),
			"param_name"=> "border_radius",
			"value"=>"",
			"description" => esc_html__( "Border Radius, Example: 8px or 50%", 'easyweb')
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'easyweb' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'easyweb' ),
		),
       array(
            "type" => "iconfonts",
            "heading" => esc_html__( "Icon", 'easyweb' ),
            "param_name" => "name",
            'value'=>'',
            "description" => esc_html__( "Select Icon", 'easyweb')
        ),
       
    ),
	
    
) );