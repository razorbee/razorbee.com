<?php
vc_map( array(
        'name' =>'Webnus Ministry',
        'base' => 'ministry',
		'description' => 'Introduce Ministries',
		'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ), 
        'icon' => 'ministry',
        'params'=>array(

        	array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'easyweb' ),
					"param_name" => "type",
					"value" => array(
						"Type 1"=>"1",
						"Type 2"=>"2",						
				),
				"description" => esc_html__( "Select style type", 'easyweb')
			),		
		
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Ministry Name', 'easyweb' ),
					'param_name' => 'ministry_name',
					'value'=>'',
					'description' => esc_html__( 'Ministry name', 'easyweb')
			),		
			array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Ministry Image', 'easyweb' ),
					'param_name' => 'ministry_img',
					'value'=>'',
					'description' => esc_html__( 'Ministry image', 'easyweb')
			),
			array(
					"type"=>'colorpicker',
					"heading"=>esc_html__('Main color (leave bank for default color)', 'easyweb'),
					"param_name"=> "color",
					"value"=>"",
					"dependency" => array('element'=>'type','value'=>array('1')),
					"description" => esc_html__( "Select title color", 'easyweb')
			),
			array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Ministry Description Text', 'easyweb' ),
					'param_name' => 'text',
					'value'=>'',
					'description' => esc_html__( 'Ministry description text', 'easyweb')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Ministry Director Name', 'easyweb' ),
					'param_name' => 'director_name',
					'value'=>'',
					"dependency" => array('element'=>'type','value'=>array('1')),
					'description' => esc_html__( 'Ministry director name', 'easyweb')
			),
			array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Ministry Director Image', 'easyweb' ),
					'param_name' => 'director_img',
					'value'=>'',
					"dependency" => array('element'=>'type','value'=>array('1')),
					'description' => esc_html__( 'Ministry director image', 'easyweb')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Ministry Link URL', 'easyweb' ),
					'param_name' => 'link',
					'value'=>'',
					'description' => esc_html__( 'Ministry link url', 'easyweb')
			),
		),
    ) );
?>