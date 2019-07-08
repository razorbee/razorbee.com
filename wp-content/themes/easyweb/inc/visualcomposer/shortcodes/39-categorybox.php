<?php

$categories = array();

$categories = get_categories();

$category_slug_array = array();
$category_slug_array[] = 'Entire Categories';
foreach($categories as $category)
{
	$category_slug_array[] = $category->slug;
}
vc_map( array(
        'name' =>'Category Box',
        'base' => 'categorybox',
		"description" => "Show Categorybox, By category filter",
        "icon" => "webnus_categorybox",
        'params'=>array(
					
					
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Category', 'easyweb' ),
						'param_name' => 'category',
						'value'=>$category_slug_array,
						'description' => esc_html__( 'Select specific category', 'easyweb')
				),
				array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'easyweb' ),
						'param_name' => 'title',
						'value'=> '',
						'description' => esc_html__( 'Set title', 'easyweb')
				),
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show title', 'easyweb' ),
						'param_name' => 'show_title',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide title', 'easyweb')
				),
				array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Posts count', 'easyweb' ),
						'param_name' => 'post_count',
						'value'=>'5',
						'description' => esc_html__( 'How many posts to dispaly?', 'easyweb')
				),
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show date', 'easyweb' ),
						'param_name' => 'show_date',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide date', 'easyweb')
				),
					
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show category', 'easyweb' ),
						'param_name' => 'show_category',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide category', 'easyweb')
				),
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show author', 'easyweb' ),
						'param_name' => 'show_author',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide author', 'easyweb')
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

		),
		'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        
    ) );
?>