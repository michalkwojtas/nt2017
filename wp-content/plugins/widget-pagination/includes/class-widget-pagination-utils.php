<?php

/**
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://wordpress.org/support/profile/jasie
 * @since      1.0.0
 *
 * @package    Widget_Pagination
 * @subpackage Widget_Pagination/includes
 */


/**
 * A collection of variables and functions.
 *
 * @since      1.0.0
 * @package    Widget_Pagination_Utils
 * @subpackage Widget_Pagination/includes
 * @author     Jana Sieber <mail@jana-sieber.de>
 */
class Widget_Pagination_Utils {

	/**
	 * The widgets.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $widgets    The default wordpress widgets.
	 */
	protected $widgets = array(
		'widget_links' => 'Links',
		'widget_categories' => 'Categories',
		'widget_archive' => 'Archive',
		'widget_recent_entries' => 'Recent Posts',
		'widget_recent_comments' => 'Recent Comments',
		'widget_meta' => 'Meta',
		'widget_pages' => 'Pages',
		'widget_nav_menu' => 'Custom Menu'
	);

	/**
	 * The pagination item styles.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $styles    Styles for appearance of pagination items.
	 */
	protected $pag_item_styles = array(
		'color'            => 'Text Colour',
		'border-color'     => 'Border Colour',
		'background-color' => 'Background Colour',
		'font-size'        => 'Font Size'
	);

	/**
	 * The pagination bar styles.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $styles    Styles for appearance of pagination bar.
	 * @todo fill this and use this
	 */
	protected $pag_bar_styles = array();

	/**
	 * Validates values, depending on it's type.
	 *
	 * @param string $type    'hex' or 'size' or 'number'
	 * @param string $value   a value
	 *
	 * @return boolean        true if valid, else false
	 * @since    1.1.0
	 */
	protected function is_valid($type, $value) {
		if (!isset($type) || $value === "" ||
				($type !== 'hex' && $type !== 'size' && $type !== 'number')) { return TRUE; }

		switch ($type) {
			// valid, if value is a hex format
			case 'hex':
				$value = sanitize_text_field($value);
				return preg_match('/^#[a-f0-9]{6}$/i', $value) ?
						TRUE : FALSE;
				//break;

			// valid, if value is 0 or contains a number together with 'px' or 'em' or 'rem'
			case 'size':
				return
					$value === '0'
					|| (
						preg_match('/[0-9]/', $value) &&
						((strpos($value, 'px') !== false)
						|| (strpos($value, 'em') !== false)
						|| (strpos($value, 'rem') !== false))
					) ?
					TRUE : FALSE;
				//break;

			// valid, if value is a number
			case 'number':
				return is_numeric($value) ?
					TRUE : FALSE;
				//break;

		default:
			return TRUE;
			//break;
		}
	}

}
