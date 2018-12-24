<?php

vc_map( array(
        'name' =>'Webnus Link',
        'base' => 'link',
		"description" => "Learn more link",
        'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "icon" => "webnus_link",
		'params'=>array(
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Link URL', 'easyweb' ),
							'param_name' => 'url',
							'value' => '#',
							'description' => esc_html__( 'Link URL, Example: http://domain.com', 'easyweb')
					),
					
					array(
							'type' => 'textarea_html',
							'heading' => esc_html__( 'Link Text', 'easyweb' ),
							'param_name' => 'content',
							'value' => 'Link Text',
							'description' => esc_html__( 'Link Text (Content)', 'easyweb')
					),
		)
        
    ) );


?>