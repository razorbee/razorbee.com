<?php

vc_map( array(
        'name' =>'Webnus Quote',
        'base' => 'quote',
		"description" => "Quote",
        "icon" => "webnus_quote",
        'params'=>array(
					
					
					
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Name', 'easyweb' ),
							'param_name' => 'name',
							'value'=>'',
							'description' => esc_html__( 'Enter the Name', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Name Subtitle', 'easyweb' ),
							'param_name' => 'name_sub',
							'value'=>'',
							'description' => esc_html__( 'Enter the Name Subtitle', 'easyweb')
					),
					
					
					
					array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content', 'easyweb' ),
							'param_name' => 'text',
							'value' => '',
							'description' => esc_html__( 'Enter the Quote of the Week content text', 'easyweb')
					),
		),
		'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        
    ) );


?>