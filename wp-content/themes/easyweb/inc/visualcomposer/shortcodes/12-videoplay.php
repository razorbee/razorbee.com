<?php

vc_map( array(
        "name" =>"Video Play Button",
        "base" => "videoplay",
		"description" => "Video Play Button",
		"icon" => "webnus_videoplay",
        "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "params" => array(
		
  			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Video URL', 'easyweb' ),
							'param_name' => 'link',
							'value' => '#',
							'description' => esc_html__( 'YouTube/Vimeo URL', 'easyweb')
					),
					
             array(
				"type"=>'textfield',
				"heading"=>esc_html__('Icon Size', 'easyweb'),
				"param_name"=> "size",
				"value"=>"",
				"description" => esc_html__( "Icon size in px format, Example: 80px", 'easyweb')
				
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
				"heading"=>esc_html__('Extra Class', 'easyweb'),
				"param_name"=> "link_class",
				"value"=>"",
				"description" => esc_html__( "Extra Class ", 'easyweb')
				
			),
           
        ),
		
        
    ) );


?>