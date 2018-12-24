<?php

vc_map( array(
        'name' =>'Max Counter',
        'base' => 'maxcounter',
        "icon" => "icon-wpb-maxcounter",
		"description" => "MaxCounter",
        'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        'params' => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Type', 'easyweb' ),
							'param_name' => 'type',
							'value' => array(
							'Type 1'=>'1',
							'Type 2'=>'2',
							'Type 3'=>'3',
							'Type 4'=>'4',
							),
							'description' => esc_html__( 'You can choose among these pre-designed types.', 'easyweb')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Count', 'easyweb' ),
							'param_name' => 'count',
							'value' => '',
							'description' => esc_html__( 'Enter the number that you want to count.', 'easyweb')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Prefix', 'easyweb' ),
							'param_name' => 'prefix',
							'value' => '',
							'description' => esc_html__( 'Show the unit content before your counter number., Example: $', 'easyweb')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Suffix', 'easyweb' ),
							'param_name' => 'suffix',
							'value' => '',
							'description' => esc_html__( 'Show the unit content after your counter number., Example: %', 'easyweb')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'easyweb' ),
							'param_name' => 'title',
							'value' => '',
							'description' => esc_html__( 'Enter the title', 'easyweb')
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Color', 'easyweb' ),
							'param_name' => 'color',
							'value' => '',
							'description' => esc_html__( 'Please select icon color', 'easyweb'),
						),
						array(
							'type' => 'iconfonts',
							'heading' => esc_html__( 'Icon', 'easyweb' ),
							'param_name' => 'icon',
							'value' => '',
							'description' => esc_html__( 'Please select counter icon', 'easyweb'),
						),
						
        ),
		
        
    ) );


?>