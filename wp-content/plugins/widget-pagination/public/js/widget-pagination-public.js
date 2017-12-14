/* global wgpag_options */

(function( $ ) {
	'use strict';

	/**
	 * Code for the public-facing JavaScript source.
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

		// Saved (or default) options
		var pages_to_show = parseInt(wgpag_options.pages_to_show) || 7;
		var widgets = wgpag_options.widgets || [];
		var prev_label = wgpag_options.prev_label || '<';
		var next_label = wgpag_options.next_label || '>';
		var autoscroll_speed = wgpag_options.autoscroll_speed || 0;
		var prevnext_threshold = wgpag_options.prevnext_threshold || 0;

		//console.log(wgpag_options); // for debugging

		function navigation(len, cur, showpage, autoadvance) {
				var div = $('<div class="wgpag-pagination"></div>');
				var timeoutId = 0;

				function gotoPage(nr) {
						if (timeoutId) {
								window.clearTimeout (timeoutId);
						}
						div.replaceWith(navigation(len, nr, showpage, false));
				}

				if (autoadvance) {
						timeoutId = window.setTimeout(function() {
								div.replaceWith(navigation(len, cur % len + 1, showpage, true));
						}, autoscroll_speed);
				}

				function navelement(n, title) {
						if (n < 1)
								n = 1;
						else if (n > len)
								n = len;
						if (n == cur) {
								return $('<span class="wgpag-current">' + title + '</span>');
						}
						var el = $('<a href="#" class="wgpag">' + title + '</a>;');
						el.click(function() { gotoPage(n); return false; });
						return el;
				}

				var first, last;
				if (len <= pages_to_show) {
						first = 2;
						last = len -1;
				}
				else {
						first = cur > 2 ? cur - 1 : 2;
						if (first == 3)
								first--;
						last = cur < len -1 ? cur + 1 : len -1;
						if (last == len -2)
								last++;
				}

				if (len >= prevnext_threshold)
						div.append(navelement(cur -1, prev_label).addClass('wgpag-prev'));
				div.append(navelement(1, 1));
				if (first > 2)
						div.append('<span class="wgpag-separator">&hellip;</span>');
				for (var i = first; i <= last; i++)
						div.append(navelement(i, i));
				if (last < len -1)
						div.append('<span class="wgpag-separator">&hellip;</span>');
				div.append(navelement(len, len));
				if (len >= prevnext_threshold)
						div.append(navelement(cur +1, next_label).addClass('wgpag-next'));

				showpage(cur);
				return div;
		}

		// append navigation for the DOM list 'ul' to 'el'
		function appendnav(el, ul, items_per_page) {
				var li = ul.children('li');
				if (li.length > items_per_page) {
						var npages = Math.ceil(li.length / items_per_page);

						/* append empty list elements to the last page to prevent the
						   navbar from jumping up on the last page */
						var rem = npages * items_per_page - li.length;
						for (var i = 0; i < rem; i++)
								ul.append('<li style="visibility: hidden">&nbsp;</li>');
						li = $(ul).children('li');

						function showpage(nr) {
								var first = (nr - 1) * items_per_page;
								li.hide().slice(first, first + items_per_page).show();
						}
						el.append(navigation(npages, 1, showpage, autoscroll_speed > 0));
				}
		}

		for (var i = 0; i < widgets.length; i++) {
				$(widgets[i].selector).each(function() {
						$(this).find('ul').first().each(function() {
								appendnav($(this).parent(), $(this), widgets[i].count || 10000);
						});
				});
		}
	});

})( jQuery );
