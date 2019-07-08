<?php

/*
Plugin Name: Webnus Portfolio
Description: Webnus Portfolio plugin is a wordpress plugin designed to create portfolio in to your wordpress website.
Version: 1.0
Author: Webnus
Author URI: http://webnus.net
License: GPL2
*/

define('PORTFOLIO_DIR', dirname(__FILE__));
define('PORTFOLIO_THEMES_DIR', PORTFOLIO_DIR . "/themes");
define('PORTFOLIO_URL', WP_PLUGIN_URL . "/" . basename(PORTFOLIO_DIR));
define('W_PORTFOLIO_VERSION', '1.0');

//Method And Action Are Call
add_filter('manage_edit-portfolio_columns', 'w_add_new_portfolio_columns');
add_action('manage_portfolio_posts_custom_column', 'w_manage_portfolio_columns', 5, 2);
add_action('init', 'w_portfolio_register');

//Register Post Type
function w_portfolio_register() {
    $labels = array(
        'name' => __('Portfolio'),
        'singular_name' => __('Portfolio'),
        'add_new' => __('Add Portfolio Item'),
        'add_new_item' => __('Add New Portfolio Item'),
        'edit_item' => __('Edit Portfolio Item'),
        'new_item' => __('New Portfolio Item'),
        'view_item' => __('View Portfolio Item'),
        'search_items' => __('Search Portfolio Item'),
        'not_found' => __('No Portfolio Items found'),
        'not_found_in_trash' => __('No Portfolio Items found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => __('Portfolio')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
			'page-attributes'
        ),
        'menu_position' => 23,
        'menu_icon' => 'dashicons-portfolio',
        'taxonomies' => array('portfolio_category')
    );
    register_post_type('portfolio', $args);
	w_portfolio_register_taxonomies();
}

//Register Taxonomies
function w_portfolio_register_taxonomies() {
    register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Category', 'query_var' => true, 'rewrite' => array('slug' => 'portfolio-type')));
     if (count(get_terms('portfolio_category', 'hide_empty=0')) == 0) {
        register_taxonomy('type', 'portfolio', array('hierarchical' => true, 'label' => 'Item Type'));
        $_categories = get_categories('taxonomy=type&title_li=');
        foreach ($_categories as $_cat) {
            if (!term_exists($_cat->name, 'portfolio_category'))
                wp_insert_term($_cat->name, 'portfolio_category');
        }
        $portfolio = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => '-1'));
        while ($portfolio->have_posts()) : $portfolio->the_post();
            $post_id = get_the_ID();
            $_terms = wp_get_post_terms($post_id, 'type');
            $terms = array();
            foreach ($_terms as $_term) {
                $terms[] = $_term->term_id;
            }
            wp_set_post_terms($post_id, $terms, 'portfolio_category');
        endwhile;
        wp_reset_query();
        register_taxonomy('type', array());
    } }
	
//Admin Dashobord Listing Portfolio Columns Title
function w_add_new_portfolio_columns() {
	$columns['cb'] = '<input type="checkbox" />';
 	$columns['title'] = __('Title', 'webnus_portfolio');
	$columns['thumbnail'] = __('Thumbnail', 'webnus_portfolio' );
	$columns['author'] = __('Author', 'webnus_portfolio' );
	$columns['portfolio_category'] = __('Portfolio Categories', 'webnus_portfolio' );
	$columns['date'] = __('Date', 'webnus_portfolio');
	return $columns; 
}

//Admin Dashobord Listing Portfolio Columns Manage
function w_manage_portfolio_columns($columns) {
	global $post;
	switch ($columns) {
	case 'thumbnail':
	 	if(get_the_post_thumbnail( $post->ID, 'thumbnail' )){
				echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
			}else{ 
				echo '<img width="150" height="150" src="'.PORTFOLIO_URL.'/images/no_image.jpg" class="attachment-thumbnail wp-post-image" alt="no image">';
		 }
	break;
 	case 'portfolio_category':
		$terms = wp_get_post_terms($post->ID, 'portfolio_category');  
		foreach ($terms as $term) {  
			echo $term->name .'&nbsp;&nbsp; ';  
		}  
	break;
	}
}
?>