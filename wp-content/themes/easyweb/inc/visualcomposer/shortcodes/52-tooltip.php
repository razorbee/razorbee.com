<?php

vc_map( array(
        "name" =>"Webnus Tooltip",
        "base" => "tooltip",
		"description" => "Tooltip",
        "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "icon" => "webnus_tooltip",
        "params" => array(
						array(
							"type" => "textarea",
							"heading" => esc_html__( "Tooltip Text", 'easyweb' ),
							"param_name" => "tooltiptext",
							"value" => '',
							"description" => esc_html__( "Tooltip text goes here", 'easyweb')
						),
						
						array(
							'type' => "textarea_html",
							"heading" => esc_html__( 'Tooltip Content', 'easyweb' ),
							"param_name" => 'tooltip_content',
							"value"=>'',
							"description" => esc_html__( "Contet Goes Here", 'easyweb')
						),
						
           
        ),
		
        
    ) );


?>