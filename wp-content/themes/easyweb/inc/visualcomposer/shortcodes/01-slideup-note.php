<?php vc_map( array(
	"name" =>"SlideUp Note",
	"base" => "slideup",
	"description" => "SlideUp Note",
	"icon" => "slideup",
	"category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	"params" => array(
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Title', 'easyweb'),
			"param_name"=> "title",
			"value"=>"",
			"description" => esc_html__( "Note Title", 'easyweb')
		),
		array(
			"type"=>'colorpicker',
			"heading"=>esc_html__('Title color (leave bank for default color)', 'easyweb'),
			"param_name"=> "title_color",
			"value"=>"",
			"description" => esc_html__( "Select title background color", 'easyweb')
		),
		array(
			"type"=>'textarea',
			"heading"=>esc_html__('Content', 'easyweb'),
			"param_name"=> "slideup_content",
			"value"=>"",
			"description" => esc_html__( "Note Content", 'easyweb')	
		),    
	),
)); ?>