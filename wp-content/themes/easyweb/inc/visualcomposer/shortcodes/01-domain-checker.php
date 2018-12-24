<?php
vc_map( array(
        "name" =>"Domain Checker",
        "base" => "wpdomainchecker",
        "description" => "Domain Checker",
        "category" => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        "icon" => "wpdomainchecker",
        "params" => array(
					array(
					"type" => "textfield",
					"heading" => esc_html__( "Button Label", 'easyweb' ),
					"param_name" => "button",
					"value"=>'',
					"description" => esc_html__( "Button Label", 'easyweb')
					),
					array(
						'heading' => esc_html__('reCaptcha', 'easyweb') ,
						"description" => esc_html__( "Protect your domain checker from spam and abuse.", 'easyweb'),
						'param_name' => 'recaptcha',
						'value' => array( esc_html__( 'Enable', 'easyweb' ) => 'yes'),
						'type' => 'checkbox',
						'std' => '',
					) ,	
					array(
						'heading' => esc_html__('Advanced Options', 'easyweb') ,
						"description" => esc_html__( "Show Advanced Options", 'easyweb'),
						'param_name' => 'advanced',
						'value' => array( esc_html__( 'Enable', 'easyweb' ) => 'enable'),
						'type' => 'checkbox',
						'std' => '',
					) ,
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Width', 'easyweb' ),
						'param_name' => 'width',
						'value'=>'',
						'description' => esc_html__( 'To make it responsive just leave it.', 'easyweb'),
						"dependency" => array('element'=>'advanced','value'=>array('enable')),
					),					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Product ID', 'easyweb' ),
						'param_name' => 'item_id',
						'value'=>'',
						'description' => esc_html__( 'For multiple checker for multiple product WooCommerce.', 'easyweb'),
						"dependency" => array('element'=>'advanced','value'=>array('enable')),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'TLDs', 'easyweb' ),
						'param_name' => 'tld',
						'value'=>'',
						'description' => esc_html__( 'Multiple TLDs check if user not define tld on the domain. (e.g: com,net,org,info)', 'easyweb'),
						"dependency" => array('element'=>'advanced','value'=>array('enable')),
					),
					
        ),
    ) );
?>