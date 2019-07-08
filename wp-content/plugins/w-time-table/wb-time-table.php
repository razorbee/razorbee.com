<?php

/**
 * @link              http://webnus.biz
 * @since             1.0.0
 * @package           time table
 *
 * @wordpress-plugin
 * Plugin Name:       Webnus Time Table 
 * Description:       Risponsive wordpress time table plugin for Wordpress.
 * Version:           1.0.0
 * Author:            webnus
 * Author URI:        http://webnus.biz/
 * Text Domain:       wb_tt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Define Some Var
 */
define( 'WB_VE', '1.0.0' );
define( 'WB_DIR', plugin_dir_path(  __FILE__  ));
define( 'WB_URL', plugins_url( '' , __FILE__ ));
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wb-tt-activator.php
 */
function activate_wb_tt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wb-tt-activator.php';
	Wb_Tt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wb-tt-deactivator.php
 */
function deactivate_wb_tt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wb-tt-deactivator.php';
	Wb_Tt_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wb_tt' );
register_deactivation_hook( __FILE__, 'deactivate_wb_tt' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wb-tt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Wb_tt() {

	$plugin = new Wb_tt();
	$plugin->run();

}
run_Wb_tt();
