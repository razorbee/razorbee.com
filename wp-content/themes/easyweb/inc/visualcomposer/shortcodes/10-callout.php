<?php

vc_map( array(
        'name' =>'Webnus Callout',
        'base' => 'callout',
		"description" => "Call to action + button",
        "icon" => "webnus_callout",
        'params'=>array(
					
					
					
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'easyweb' ),
							'param_name' => 'title',
							'value'=>'',
							'description' => esc_html__( 'Enter the Callout title', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Button Text', 'easyweb' ),
							'param_name' => 'button_text',
							'value'=>'',
							'description' => esc_html__( 'Callout Button text', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Button Link', 'easyweb' ),
							'param_name' => 'button_link',
							'value'=>'',
							'description' => esc_html__( 'Button Link URL', 'easyweb')
					),
					array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content Text', 'easyweb' ),
							'param_name' => 'text',
							'value' => '',
							'description' => esc_html__( 'Enter the Callout content text', 'easyweb')
					),
		),
		'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        
    ) );


?>