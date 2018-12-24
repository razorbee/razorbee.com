<?php
vc_map( array(
	'name' =>'Webnus Blog',
	'base' => 'blog',
	"description" => "Blog Loop",
	'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
	"icon" => "webnus_blog",
	'params'=>array(
	
		array(
			"type" => "dropdown",
			"heading" => esc_html__( "Type", 'easyweb' ),
			"param_name" => "type",
			"value" => array(
				"Large Posts"=>"1",
				"List Posts"=>"2",							
				"Grid Posts"=>"3",							
				"First Large then List"=>"4",							
				"First Large then Grid"=>"5",							
				"Masonry"=>"6",		
				"Timeline"=>"7",	
			),						
			"description" => esc_html__( "Type", 'easyweb')
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Category', 'easyweb' ),
			'param_name' => 'category',
			'value'=>$category_slug_array,
			'description' => esc_html__( 'Select specific category, leave blank to show all categories.', 'easyweb')
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Post Count', 'easyweb' ),
			'param_name' => 'count',
			'value' => '',
			'description' => esc_html__( 'Number of post(s) to show', 'easyweb')
		),

		array(
			'heading'		=> esc_html__( 'Order By', 'easyweb' ),
			'type'			=> 'dropdown',
			'param_name'	=> 'orderby',
			'value'			=> array(
				esc_html__( 'Date (Latest Posts)', 'easyweb' ) => 'date',
				esc_html__( 'Popular posts: Comment Count', 'easyweb' ) => 'comment_count',
				esc_html__( 'Popular posts: View Count', 'easyweb' ) => 'view_count',
				esc_html__( 'Popular Posts: Social Score', 'easyweb' ) => 'social_score',
			),
			'description' => esc_html__( 'If you use "Social Post Score" type, then Social Metrics Tracker plugin must be activated via Apperance > Install Plugins.', 'easyweb')
		),

	)  
) );