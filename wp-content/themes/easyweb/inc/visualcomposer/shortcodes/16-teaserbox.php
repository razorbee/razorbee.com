<?php vc_map( array(
	'name' =>'Teaser Box',
	'base' => 'teaserbox',
	'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	"description" => "Image and icon with text article",
	"icon" => "webnus_teaserbox",
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
				"Type 7"=>"7",
			),
			"description" => esc_html__( "TeaserBox Type", 'easyweb')
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'easyweb' ),
			'param_name' => 'img',
			'value'=>'',
			'description' => esc_html__( 'TeaserBox Image', 'easyweb')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'easyweb' ),
			'param_name' => 'title',
			'value'=>'',
			'description' => esc_html__( 'Enter the Title', 'easyweb')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Subtitle', 'easyweb' ),
			'param_name' => 'subtitle',
			'value'=>'',
			'description' => esc_html__( 'Enter the Subtitle', 'easyweb')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Link URL', 'easyweb' ),
			'param_name' => 'link_url',
			'value'=>'#',
			'description' => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'easyweb')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image alt', 'easyweb' ),
			'param_name' => 'img_alt',
			'value'=>'',
			'description' => esc_html__( 'Enter the image alt Text', 'easyweb')
		),		
	),
)); ?>