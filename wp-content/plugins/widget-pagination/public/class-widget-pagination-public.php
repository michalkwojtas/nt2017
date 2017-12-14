<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/public
 */

require_once __DIR__ . '/../includes/class-widget-pagination-utils.php';

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/public
 * @author     Jana Sieber <mail@jana-sieber.de>
 */
class Widget_Pagination_Public extends Widget_Pagination_Utils {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $plugin_short, $version ) {

		$this->plugin_name = $plugin_name;
		$this->plugin_short = $plugin_short;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/widget-pagination-public.css', array(), $this->version, 'all' );

		wp_register_style('wgpag-options', plugin_dir_url( __FILE__ ) . '/css/wgpag-options.css', $this->plugin_short );
		wp_enqueue_style('wgpag-options');

		// https://developer.wordpress.org/reference/hooks/style_loader_tag/
		//add_filter('style_loader_tag', array($this, 'replace_option_style'), 10, 2);
		add_filter( 'style_loader_tag', array($this, 'replace_option_style'), 10, 4 );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/widget-pagination-public.js', array( 'jquery' ), $this->version, false );

		$options = get_option( $this->plugin_short );

		// send to js
		$widgets = array();
		foreach ($this->widgets as $key => $name) {
			$value = isset($options['items_per_page_' . $key]) ? (int)$options['items_per_page_' . $key] : '';
			$widgets[] = array(
				'selector' => '.' . $key,
				'count'    => $value
			);
		}

		$passed_options = array(
			'widgets'            => $widgets,
			'pages_to_show'      => $options['pag_option_ptsh_cnt'],
			'prev_label'         => $options['pag_option_prev'],
			'next_label'         => $options['pag_option_next'],
			'prevnext_threshold' => $options['pag_option_prevnext_threshold_cnt'],
			'autoscroll_speed'   => $options['pag_option_autoscroll_speed_cnt']);

		// Localize a registered script with data for a JavaScript variable.
		// (send variables to javascript)
		// string $handle: The registered script handle you are attaching the data for
		// string $name: The name of the variable which will contain the data.
		// array $data: The data itself
		wp_localize_script( $this->plugin_name, $this->plugin_short . '_options',
				array('l10n_print_after' => $this->plugin_short . '_options = ' . json_encode($passed_options) . ';'));

	}

	/**
	 * Replace wgpag-options css with an inline style which pulls
	 * the style from the options database.
	 *
	 * @param string $html     The link tag for the enqueued style.
	 * @param string $handle   The style's registered handle.
	 *
	 * @return string          HTML
	 * @author Lars Uebernickel
	 * @since 0.4
	 */
	function replace_option_style ($html, $handle) {
		if ($handle == 'wgpag-options') {
			return '<style type="text/css">' . $this->pagination_css() . '</style>';
		}
		else {
			return $html;
		}
	}

	/**
	 * Generate CSS from styling options on plugin's options page.
	 *
	 * @return string   CSS
	 * @author Lars Uebernickel
	 * @since 0.4
	 */
	private function pagination_css () {
		$css = '';
		$pagcss = '';
		$listcss = '';

		$selectors = array(
			'item_style'       => 'a.wgpag',
			'hover_item_style' => 'a.wgpag:hover',
			'cur_item_style'   => '.wgpag-current'
		);

		$options = get_option( $this->plugin_short );
		foreach($selectors as $name => $selector) {
			$css .= ".wgpag-pagination $selector { ";
			foreach ($this->pag_item_styles as $style => $style_name) {
				if (isset($options["${name}_$style"]) && !empty($options["${name}_$style"])) {
					$css .= "$style: " . $options["${name}_$style"] . " !important;";
				}
			}
			$css .= "}";
		}

		$positions = array ('top', 'right', 'bottom', 'left');

		// usage of '!important' due to prevent the theme from overriding the user's setting
		// only used for styling of pagination, as we added the pagination HTML to the DOM ourselves

		if (isset($options['pag_style_background-color']) && !empty($options['pag_style_background-color'])) {
			$pagcss .= "background-color: " . $options['pag_style_background-color'] . " !important;";
		}

		$borderColor = isset($options['pag_style_border-color']) && !empty($options['pag_style_border-color']) ?
				$options['pag_style_border-color'] : 'inherit';
		foreach ($positions as $pos) {
			if (isset($options['pag_style_border-' . $pos . '-style']) && !empty($options['pag_style_border-' . $pos . '-style'])) {
				$pagcss .= "border-$pos-width: 1px !important;";
				$pagcss .= "border-$pos-style: " . $options['pag_style_border-' . $pos . '-style'] . " !important;";
				$pagcss .= "border-$pos-color: $borderColor !important;";
			}
		}

		if (isset($options['pag_style_text-align'])) { // default: center
			$pagcss .= "text-align: " . $options['pag_style_text-align'] . " !important;";
		}

		foreach ($positions as $pos) {
			if (isset($options['pag_style_margin-' . $pos]) && $options['pag_style_margin-' . $pos] !== '') {
				$pagcss .= "margin-$pos: " . $options['pag_style_margin-' . $pos] . " !important;";
			}
		}
		foreach ($positions as $pos) {
			if (isset($options['pag_style_padding-' . $pos]) && $options['pag_style_padding-' . $pos] !== '') {
				$pagcss .= "padding-$pos: " . $options['pag_style_padding-' . $pos] . " !important;";
			}
		}

		$css .= ".wgpag-pagination { $pagcss; }";

		if (isset($options['list_item_style_list-style-type'])) {
			$listcss = "list-style-type: " . $options['list_item_style_list-style-type'] . " !important;";
		}

		$css .= ".widget li, .widget-container li { $listcss }"; // .widget-container li -> for backwards compatibility

		return $css;
	}

}
?>