<?php
vc_map( array(
    'name' =>'Our Team',
    'base' => 'ourteam',
	"description" => "Team member",
	'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
    "icon" => "webnus_ourteam",
    'params'=>array(
		
    	array(
			"type" => "dropdown",
			"heading" => esc_html__( "Type", 'easyweb' ),
			"param_name" => "type",
			"value" => array(
				"Type 1"=>"1",
				"Type 2"=>"2",
				"Type 3"=>"3",						
				"Type 4"=>"4",						
				"Type 5"=>"5",						
				"Type 6"=>"6",						
			),
			"description" => esc_html__( "You can choose among these pre-designed types.", 'easyweb')
		),

		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Team Image', 'easyweb' ),
			'param_name' => 'img',
			'value'=>'',
			'description' => esc_html__( 'Team member image', 'easyweb')
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Memeber Name', 'easyweb' ),
			'param_name' => 'name',
			'value'=>'',
			'description' => esc_html__( 'Team member name', 'easyweb')
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Memeber Title', 'easyweb' ),
			'param_name' => 'title',
			'value'=>'',
			'description' => esc_html__( 'Team member title', 'easyweb')
		),

		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Team Memeber Description Text', 'easyweb' ),
			'param_name' => 'text',
			'value'=>'',
			'description' => esc_html__( 'Team member description text', 'easyweb'),
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Link URL', 'easyweb' ),
			'param_name' => 'link',
			'value'=>'',
			'description' => esc_html__( 'Team member link url', 'easyweb')
		),

		array(
			'heading' => esc_html__('Social Icons', 'easyweb') ,
			'description' => wp_kses( __('By enabling this option, Member social networks links will appear.<br/><br/>', 'easyweb'), array( 'br' => array() ) ),
			'param_name' => 'social',
			'value' => array( esc_html__( 'Enable', 'easyweb' ) => 'enable'),
			'type' => 'checkbox',
			'std' => '',
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'First Social Name', 'easyweb' ),
			'param_name' => 'first_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'twitter',
			'description' => esc_html__( 'Select Social Name', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'First Social URL', 'easyweb' ),
			'param_name' => 'first_url',
			'value'=>'',
			'description' => esc_html__( 'First social URL', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Second Social Name', 'easyweb' ),
			'param_name' => 'second_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'facebook',

			'description' => esc_html__( 'Select Social Name', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Second Social URL', 'easyweb' ),
			'param_name' => 'second_url',
			'value'=>'',
			'description' => esc_html__( 'Second social URL', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Third Social Name', 'easyweb' ),
			'param_name' => 'third_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'google-plus',
			'description' => esc_html__( 'Select Social Name', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Third Social URL', 'easyweb' ),
			'param_name' => 'third_url',
			'value'=>'',
			'description' => esc_html__( 'Third social URL', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Fourth Social Name', 'easyweb' ),
			'param_name' => 'fourth_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'linkedin',
			'description' => esc_html__( 'Select Social Name', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Fourth Social URL', 'easyweb' ),
			'param_name' => 'fourth_url',
			'value'=>'',
			'description' => esc_html__( 'Fourth social URL', 'easyweb'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),
	),        
) );