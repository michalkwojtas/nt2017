<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 * @author     Jana Sieber <mail@jana-sieber.de>
 */
class Widget_Pagination_i18n {


	/**
	 * Load the plugin text domain for translation.
	 * -> https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/
	 * -> https://make.wordpress.org/meta/handbook/documentation/translations/
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'widget-pagination', // must use a text domain that matches the plugin's slug
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
