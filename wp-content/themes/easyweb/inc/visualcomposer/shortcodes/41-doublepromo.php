<?php

vc_map( array(
        'name' =>'Double Promo',
        'base' => 'doublepromo',
		"description" => "2 text box + image",
        "icon" => "webnus_doublepromo",
        'params'=>array(
					
					
					
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'easyweb' ),
							'param_name' => 'title',
							'value'=>'',
							'description' => esc_html__( 'Enter the Title', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Link Text', 'easyweb' ),
							'param_name' => 'link_text',
							'value'=>'',
							'description' => esc_html__( 'Enter the link text', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Link URL', 'easyweb' ),
							'param_name' => 'link_link',
							'value'=>'',
							'description' => esc_html__( 'Enter the link url Example: http://domain.com', 'easyweb')
					),
					array(
							'type' => 'attach_image',
							'heading' => esc_html__( 'Image', 'easyweb' ),
							'param_name' => 'img',
							'value'=>'',
							'description' => esc_html__( 'Enter the image url', 'easyweb')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Image alt', 'easyweb' ),
							'param_name' => 'img_alt',
							'value'=>'Alt text',
							'description' => esc_html__( 'Enter the image alt Text', 'easyweb')
					),
					array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Is Last Column?', 'easyweb' ),
							'param_name' => 'last',
							'value'=>array('Yes'=>'true', 'No'=> 'false'),
							'description' => esc_html__( 'Is this second promobox?', 'easyweb')
					),
					array(
							'type' => 'textarea_html',
							'heading' => esc_html__( 'Content', 'easyweb' ),
							'param_name' => 'text',
							'value' => '',
							'description' => esc_html__( 'Enter the Doublepromo content text', 'easyweb')
					),
		),
		'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        
    ) );


?>