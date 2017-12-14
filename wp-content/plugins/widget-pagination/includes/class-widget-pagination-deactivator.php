<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 * @author     Jana Sieber <mail@jana-sieber.de>
 */
class Widget_Pagination_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		if (!defined('WGPAG_NAME')) {
			define('WGPAG_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
		}

		// Clean de-registration of registered settings
		//unregister_setting( WGPAG_NAME, WGPAG_NAME );
	}

}
