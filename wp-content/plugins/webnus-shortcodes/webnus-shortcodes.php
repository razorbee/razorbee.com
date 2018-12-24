<?php
/*
Plugin Name: Webnus Shortcodes
Description: Add Webnus Shortcodes to your WordPress website.
Version: 1.0
Author: Webnus
Author URI: http://webnus.net
Text Domain: webnus-shortcodes
Domain Path: /languages
License: GPL2
*/

add_action( 'plugins_loaded', 'shortcodes_init' );
function shortcodes_init() {
	foreach( glob( plugin_dir_path( __FILE__ ) . '/shortcodes/*.php' ) as $filename ) {
		require_once $filename;
	}
}

add_action('plugins_loaded', 'webnus_core_load_textdomain');

function webnus_core_load_textdomain(){
	load_plugin_textdomain(
		'webnus-shortcodes',
		false,
		basename( dirname( __FILE__ ) ) . '/languages' 
	);
}