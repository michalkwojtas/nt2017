(function( $ ) {
	'use strict';

	/**
	 * Code for the admin-facing JavaScript source.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	$(document).ready(function($){

		// WordPress' color picker
		if ( $.isFunction( jQuery.fn.wpColorPicker ) ) {
			$( 'input.color-picker' ).wpColorPicker();
		}

	});

	// Add custom widgets
	/*$('#wgpag-customwidget').change(function() {
		// clone a row with a standard widget
		var customWidget = jQuery('#items_per_page tr').first().clone();

		//console.log(customwidget);

		// append it
		jQuery('#items_per_page').append(customWidget);

		var widgetName = $(this).find("option:selected").text();
		var widgetID   = $(this).val();

		// change label and value and id and name
		customWidget.find('label').html(widgetName); //LABEL text
		customWidget.find('input').attr('name', 'wgpag-items_per_page_' + widgetID); //INPUT name
		customWidget.find('input').attr('id', 'wgpag-items_per_page_' + widgetID); //INPUT id
		customWidget.find('input').val(''); //empty value
		customWidget.find('span').remove(); //remove hint

		// disable selected option and reset dropdown
		$(this).find("option:selected").attr("disabled","disabled");
		$(this).val('');
	});*/

})( jQuery );
