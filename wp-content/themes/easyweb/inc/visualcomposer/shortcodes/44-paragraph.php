<?php

vc_map( array(
        'name' =>'Webnus Paragraph',
        'base' => 'p',
		"description" => "P tag",
        "icon" => "webnus_paragraph",
        'params'=>array(


					array(
							'type' => 'textarea_html',
							'heading' => esc_html__( 'Paragraph', 'easyweb' ),
							'param_name' => 'content',
							'value' => 'Paragraph content goes here',
							'description' => esc_html__( 'Paragraph', 'easyweb')
					),

		),
		'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        
    ) );


?>