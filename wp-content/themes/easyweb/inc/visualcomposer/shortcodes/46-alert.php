<?php

vc_map( array(
        "name" =>"Webnus Alert",
        "base" => "alert",
		"description" => "Alert box",
        "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "icon" => "webnus_alert",
        "params" => array(
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Type", 'easyweb' ),
							"param_name" => "type",
							"value" => array(
								"Info"=>"info",
								"Success"=>"success",
								"Warning"=>"warning",
								"Danger"=>"danger",
								
						),
						"description" => esc_html__( "Alert Type", 'easyweb')
						),
						array(
							"type" => "checkbox",
							"heading" => esc_html__( "Has Close?", 'easyweb' ),
							"param_name" => "close",
							"value" => array('Yes please'=>'true'),
							"description" => esc_html__( "Has Close Button?", 'easyweb')
						),
						array(
							"type" => "textarea_html",
							"heading" => esc_html__( "Alert Content", 'easyweb' ),
							"param_name" => "content",
							"value"=>"Content goes here",
							"description" => esc_html__( "Contet Goes Here", 'easyweb')
						),
						
           
        ),
		
        
    ) );


?>