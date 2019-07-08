<?php
/**
 * @link              http://webnus.biz
 * @since             1.0.0
 * @package           time table
 */
/**
 * Post Type class
 */
class Wb_post_type {

    function __construct() {
        add_action( 'init', array($this, 'wb_post_type') );
        //add_action( 'admin_menu', array($this, 'wb_diable_new_entry') );
        add_filter( 'manage_wb-tt_posts_columns', array($this, 'wb_shortcode_show') );
        add_action( 'manage_wb-tt_posts_custom_column', array($this, 'wb_shortcode_content_show'), 10, 2);
        add_action( 'do_meta_boxes', array($this, 'wb_remove_meta_b' ) );
        add_filter( 'manage_edit-wb-tt_columns' , array($this,'my_remove_unwanted' ) );
    }

    /**
     * Register a table post type.
     */
    function wb_post_type() {

        $labels = array(
            'name'               => _x( 'All Table', 'post type general name', 'wb_tt' ),
            'singular_name'      => _x( 'ttable', 'post type singular name', 'wb_tt' ),
            'menu_name'          => _x( 'Time Table', 'admin menu', 'wb_tt' ),
            'name_admin_bar'     => _x( 'Time Table', 'add new on admin bar', 'wb_tt' ),
            'add_new'            => _x( 'Add New Table', 'book', 'wb_tt' ),
            'add_new_item'       => __( 'Add New Table', 'wb_tt' ),
            'new_item'           => __( 'New Table', 'wb_tt' ),
            'edit_item'          => __( 'Edit Table', 'wb_tt' ),
            'view_item'          => __( 'View Table', 'wb_tt' ),
            'all_items'          => __( 'All Tables', 'wb_tt' ),
            'search_items'       => __( 'Search Table', 'wb_tt' ),
            'parent_item_colon'  => __( 'Parent Table:', 'wb_tt' ),
            'not_found'          => __( 'No Table found.', 'wb_tt' ),
            'not_found_in_trash' => __( 'No Table found in Trash.', 'wb_tt' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Webnus Easy Time Table', 'wb_tt' ),
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'wb-tt' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_icon'          => 'dashicons-list-view',
            'menu_position'      => 80,
            'map_meta_cap'       => true,   
            'supports'           => array( 'title' )
        );

        register_post_type( 'wb-tt', $args );
    }

    /**
     * [wb_diable_new_entry hide add new entry on tables col]
     * @return [nothing]
     */
    function wb_diable_new_entry() {
        global $submenu;
        unset($submenu['edit.php?post_type=wb-tt'][10]);
    }
    
    /**
     * Add shortcode col
     */
    function wb_shortcode_show( $defaults ) {
        $defaults['shortcode'] = 'Short Code';
        return $defaults;
    }

    /**
     * Add Shortcode content
     */
    function wb_shortcode_content_show( $column_name, $post_ID ){
        echo '[wbtt id='."$post_ID".']';
    }

    function my_remove_unwanted( $columns ) {
        unset( $columns['date'],
               $columns['wpsite-show-ids'] 
         ) ;
      return $columns;
    }

    function wb_remove_meta_b() {
        $post_types = get_post_types();
        foreach ( $post_types as $post_type ) {
            if ( 'wb-tt' == $post_type ) {
                remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
                remove_meta_box('eg-meta-box', $post_type, 'normal');
            }
        }
    }
}



    
