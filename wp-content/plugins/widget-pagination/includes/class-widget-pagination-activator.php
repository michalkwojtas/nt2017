<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 * @author     Jana Sieber <mail@jana-sieber.de>
 */
class Widget_Pagination_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if (!defined('WGPAG_NAME')) {
			define('WGPAG_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
		}
	}

}
