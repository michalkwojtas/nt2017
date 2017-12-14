<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/support/profile/jasie
 * @since             1.0.0
 * @package           Widget_Pagination
 *
 * @wordpress-plugin
 * Plugin Name:       Widget Pagination
 * Plugin URI:        http://wgpag.jana-sieber.de/
 * Description:       This plugin lets you add a styleable pagination for the widgets Archives, Categories, Links, Meta, Pages, Recent Posts and Recent Comments.
 * Version:           1.0.0
 * Author:            Jana Sieber
 * Author URI:        https://wordpress.org/support/profile/jasie
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       widget-pagination
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define("WGPAG_VERSION", "1.1");

if (!defined('WGPAG_NAME')) {
	define('WGPAG_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-widget-pagination-activator.php
 */
function activate_widget_pagination() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-widget-pagination-activator.php';
	Widget_Pagination_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-widget-pagination-deactivator.php
 */
function deactivate_widget_pagination() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-widget-pagination-deactivator.php';
	Widget_Pagination_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_widget_pagination' );
register_deactivation_hook( __FILE__, 'deactivate_widget_pagination' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-widget-pagination.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_widget_pagination() {

	$plugin = new Widget_Pagination();
	$plugin->run();

}
run_widget_pagination();
?>
