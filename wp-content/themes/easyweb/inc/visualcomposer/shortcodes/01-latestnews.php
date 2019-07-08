<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
foreach($categories as $category)
{
	$category_slug_array[] = $category->slug;
}
vc_map( array(
        'name' =>'Latest News',
        'base' => 'latestnews',
        "icon" => "latestnews",
		"description" => "Latest News",
        'category' => esc_html__( 'Webnus Shortcodes', 'easyweb' ),
        'params' => array(
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Type", 'easyweb' ),
							"param_name" => "type",
							"value" => array(
								"Cover"=>"1",
								"List"=>"2",
							),
							"description" => esc_html__( "Select style type", 'easyweb')
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
							'param_name' => 'scount',
							'value' => '',
							'description' => esc_html__( 'Number of post(s) to show', 'easyweb')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Count in row', 'easyweb' ),
							'param_name' => 'rcount',
							'value' => '',
							'description' => esc_html__( 'Number of post(s) in a row', 'easyweb'),
							"dependency" => array('element'=>'type','value'=>array('1')),
						),
					),    
		) );
?>