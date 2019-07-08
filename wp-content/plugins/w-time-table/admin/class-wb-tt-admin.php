<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link              http://webnus.biz
 * @since             1.0.0
 * @package           time table
 */

/**
 * The admin-specific functionality of the plugin.
 */
class Wb_Tt_Admin {

	/**
	 * The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'grid', WB_URL . '/admin/css/ui-1.10.0.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, WB_URL . '/admin/css/wb-tt.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'font-awsome_wb_1', WB_URL . '/public/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wp-color-picker' );
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( 'media-grid' );
		wp_enqueue_script( 'media' );    
	    wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wb-tt-admin.js', array( 'jquery' ), $this->version, false );

	}

}
