<?php

vc_map( array(
        'name' =>'Box Link',
        'base' => 'boxlink',
		"description" => "Orange box link",
        'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "icon" => "webnus_boxlink",
		'params'=>array(
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Link URL', 'easyweb' ),
							'param_name' => 'url',
							'value' => '#',
							'description' => esc_html__( 'Link URL, Example: http://domain.com', 'easyweb')
					),
					
					array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Link Text', 'easyweb' ),
							'param_name' => 'boxlink_content',
							'value' => 'Link Text',
							'description' => esc_html__( 'Link Text (Content)', 'easyweb')
					),
		)
        
    ) );


?>