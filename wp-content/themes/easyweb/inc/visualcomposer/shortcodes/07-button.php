<?php
vc_map( array(
	"name" =>"Webnus Button",
	"base" => "button",
	"description" => "Button shortcode",
	"category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	"icon" => "webnus_button",
	"params" => array(
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Shape", 'easyweb' ),
			"param_name" => "shape",
			"value" => array(
				"Default"=>"",
				"Square"=>"square",
				"Rounded"=>"rounded",
				),
			"description" => esc_html__( "Button Type", 'easyweb')
			),
			
			array(
			"type" => "textarea",
			"heading" => esc_html__( "Content", 'easyweb' ),
			"param_name" => "btn_content",
			"value"=>'',
			"description" => esc_html__( "Button Text Content", 'easyweb')
			),
			
			array(
			"type" => "textfield",
			"heading" => esc_html__( "URL", 'easyweb' ),
			"param_name" => "url",
			"value"=>'#',
			"description" => esc_html__( "Button URL Link", 'easyweb')
			),
									
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Target", 'easyweb' ),
			"param_name" => "target",
			"description" => esc_html__( "Button URL Target", 'easyweb'),
			"value" => array(
				"Self"=>"_self",
				"Blank"=>"_blank",
				"Parent"=>"_parent",
				"Top"=>"_top",
				),
			),
			
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Color", 'easyweb' ),
			"param_name" => "color",
			"description" => esc_html__( "Button Color", 'easyweb'),
			"value" => array(
				"Default"=>"theme-skin",
				"Green"=>"green",
				"Gold"=>"gold",
				"Red"=>"red",
				"Blue"=>"blue",
				"Gray"=>"gray",
				"Dark gray"=>"dark-gray",
				"Cherry"=>"cherry",
				"Orchid"=>"orchid",
				"Pink"=>"pink",
				"Orange"=>"orange",
				"Teal"=>"teal",
				"SkyBlue"=>"skyblue",
				"Jade"=>"jade",
				"White"=>"white",
				"Black"=>"black",
				),
			),
									
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Size", 'easyweb' ),
			"param_name" => "size",
			"description" => esc_html__( "Button Size", 'easyweb'),
			"value" => array(
				"Small"=>"small",
				"Medium"=>"medium",
				"Large"=>"large",	
				),
			),

			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Bordered?", 'easyweb' ),
			"param_name" => "border",
			"value"=>array('Normal'=>'false','Bordered'=>'true'),
			"description" => esc_html__( "Is button bordered?", 'easyweb')
			),
			
			array(
			"type" => "iconfonts",
			"heading" => esc_html__( "Icon", 'easyweb' ),
			"param_name" => "icon",
			"value"=>'',
			"description" => esc_html__( "Select Button Icon", 'easyweb')
			),	
	),
));
?>