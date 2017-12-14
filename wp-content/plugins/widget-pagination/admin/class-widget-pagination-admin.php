<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/admin
 */

require_once __DIR__ . '/../includes/class-widget-pagination-utils.php';

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/admin
 * @author     Jana Sieber <mail@jana-sieber.de>
 */
class Widget_Pagination_Admin extends Widget_Pagination_Utils {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The short ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_short    The short ID of this plugin.
	 */
	private $plugin_short;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name      The name of this plugin.
	 * @param      string    $plugin_short     The short name of this plugin.
	 * @param      string    $version          The version of this plugin.
	 */
	public function __construct( $plugin_name, $plugin_short, $version ) {

		$this->plugin_name = $plugin_name;
		$this->plugin_short = $plugin_short;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Widget_Pagination_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Widget_Pagination_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/widget-pagination-admin.css', array(), $this->version, 'all' );

		// Enqueue only on our plugin page
		//if ( 'settings_page_widget-pagination' == get_current_screen() -> id ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/widget-pagination-admin.css', array( 'wp-color-picker' ), $this->version, 'all' );
		//}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Widget_Pagination_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Widget_Pagination_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/widget-pagination-admin.js', array( 'jquery' ), $this->version, false );

		// Enqueue only on our plugin page
		//if ( 'settings_page_widget-pagination' == get_current_screen() -> id ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/widget-pagination-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		//}

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 */
//		add_options_page(
//			'Widget Pagination', // page title
//			'Widget Pagination', // menu title
//			'manage_options', // capability
//			$this->plugin_name, // menu slug
//			array($this, 'display_plugin_setup_page') // callback func
//		);

		add_submenu_page(
				'themes.php', // $parent_slug, for Appearance': 'themes.php'
				'Widget Paginaton', // $page_title
				'Widget Paginaton', // $menu_title
				'manage_options', // $capability
				$this->plugin_name, // menu slug
				array($this, 'display_plugin_setup_page') // callback func
		);
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		/*
		 *  Documentation: https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
		 */
		// Wordpress menu section 'Settings'
//		$settings_link = array(
//			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings') . '</a>',
//		);
		// Wordpress menu section 'Appearance'
		$settings_link = array(
			'<a href="' . admin_url( 'themes.php?page=' . $this->plugin_name ) . '">' . __('Settings') . '</a>',
		);

		return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_setup_page() {

		include_once( 'partials/widget-pagination-admin-display.php' );

	}

	/**
	 * Save / update options
	 */
	public function options_update() {

		/*
		 *  Documentation: https://developer.wordpress.org/reference/functions/register_setting/
		 *
		 * string $option_group: A settings group name
		 * string $option_name: The name of an option to sanitize and save
		 * array $sanitize_callback
		 */
		register_setting( $this->plugin_name, $this->plugin_short, array($this, 'validate') );

	}

	/**
	 *
	 * Validate and sanitize posted values in admin options
	 */
	public function validate($inputs) {

		// checkbox: 1 : 0
		// url: esc_url($input['url']);

		foreach ($inputs as $key => $value) {
			if (!empty($value)) {
				// Color picker inputs
				if (strpos($key, 'color') !== false) {
					$value = sanitize_text_field($value);

					if (!$this->is_valid('hex', $value)) {
						add_settings_error(
								$key, // Setting title
								$key . '_texterror', // Error ID
								__('Please enter a valid hex value color', $this->plugin_name) . ' (' . $key . ': '. $value .')', // Error message
								'error' // Type of message
						);
					}
				}
				// Size inputs
				elseif (strpos($key, 'font-size') !== false
						|| strpos($key, 'margin') !== false
						|| strpos($key, 'padding') !== false) {
					if (!$this->is_valid('size', $value)) {
						add_settings_error(
								$key, // Setting title
								$key . '_texterror', // Error ID
								__('Please enter a valid size', $this->plugin_name) . ' (' . $key . ': '. $value .')', // Error message
								'error' // Type of message
						);
					}
				}
				// Number inputs
				elseif (strpos($key, 'items_per_page') !== false
						|| strpos($key, 'cnt') !== false) {
					if (!$this->is_valid('number', $value)) {
						add_settings_error(
								$key, // Setting title
								$key . '_texterror', // Error ID
								__('Please enter a valid number', $this->plugin_name) . ' (' . $key . ': '. $value .')', // Error message
								'error' // Type of message
						);
					}
				}
			}
		}

		return $inputs;
	}

}
