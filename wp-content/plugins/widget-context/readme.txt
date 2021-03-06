=== Widget Context ===

Contributors: kasparsd, jamescollins  
Tags: widget, widget context, context, logic, widget logic, cms  
Requires at least: 3.0  
Tested up to: 4.9.8  
Stable tag: 1.1.0  
License: GPLv2 or later  

Show or hide widgets on specific posts, pages or sections of your site.


== Description ==

[Widget Context](https://widgetcontext.com) will show or hide widgets on certain sections of your site — front page, posts, pages, archives, search, etc. It also features section targeting by URLs (with wildcard support) for maximum flexibility.

= Contribute =

- Suggest code improvements [on GitHub](https://github.com/kasparsd/widget-context-wporg).
- Report bugs and suggestions on [WordPress.org forums](http://wordpress.org/support/plugin/widget-context).
- [Help translate](https://translate.wordpress.org/projects/wp-plugins/widget-context) to your language.


= Documentation =

= Target by URL =

The “Target by URL” is a very powerful feature with a lot of flexibility for targeting sections of your website based on the request URLs. It was inspired by a similar feature in the [Drupal CMS](https://www.drupal.org).

- Use relative URLs such as `page/sub-page` instead of absolute URLs `https://example.com/page/sub-page`.

- Relative are URLs more flexible and make the logic portable between different domains and server environments.


= Wildcards =

Use the wildcard symbol `*` for matching dynamic parts of the URL. For example:

- `topic/widgets/*` to match all posts in the widgets category, if your permalink structure is set to `/topic/%category%/%postname%`.

- `page-slug/*` to match all child pages of the page-slug parent page.

- Use a trailing `?*` to capture URL with all query arguments such as `utm_source`, etc. For example, for every `blog/post-slug` also include `blog/post-slug?*`.


== Installation ==

- Search for **Widget Context** under "Plugins → Add New" in your WordPress dashboard.

- Widget Context settings will appear automatically under **each widget** under "Appearance → Widgets".


== Changelog ==

= 1.1.0 (June 13, 2018) =
- Fix URL matching for URLs with query strings.
- Introduce unit tests for the URL context.

= 1.0.7 (June 5, 2018) =
- Mark as tested with WordPress 4.9.6.
- Use the localisation service provided by [WP.org](https://translate.wordpress.org/projects/wp-plugins/widget-context).
- Support for Composer.

= 1.0.6 (January 20, 2018) =
- Fix path to admin scripts and styles, props @tedgeving.
- Mark as tested with WordPress 4.9.2.

= 1.0.5 (May 8, 2017) =
- Confirm the plugin works with the latest version of WordPress.
- Add support for continuous testing via [wp-dev-lib](https://github.com/xwp/wp-dev-lib).

= 1.0.4 (May 6, 2016) =
- Confirm the plugin works with the latest version of WordPress.
- Fix the PHP class constructor warning.
- Move the widget context settings link.
- Fix the initial context state in the customizer.

= 1.0.3 =
- Include Russian translation (Thanks Flector!).
- Add textdomain to the remaining strings.
- Enable debugging if [Debug Bar](https://wordpress.org/plugins/debug-bar/) is available.

= 1.0.2 =
- Load available custom post types and taxonomies right before visibility checks to avoid PHP warnings.
- Run visibility checks only after the main post query has run. Fixes issues with WooCommerce.
- Load our CSS and Javascript files only on widget and customizer admin pages.

= 1.0.1 =
- Fix PHP warning in custom post type and taxonomy module.

= 1.0 =
- Public release of the 1.0 refactoring.

= 1.0-beta =
- Improved settings page.

= 1.0-alpha =
- Refactor code to allow custom widget context modules.

= 0.8.3 =

- Fix PHP warning that occurred on PHP 5.2.x.

= 0.8.2 =

- Improved SSL/HTTPS detection.
- Fix: Ensure that is_active_sidebar() & is_dynamic_sidebar() don't return true when there are no widgets displayed on a page.
- Two new filters so that other plugins can override widget context display/visibility logic.

= 0.8.1 =

- Revert back to changing callback function in `$wp_registered_widgets` for attaching widget context setting controls.
- Fix the word count logic.

= 0.8 =

- Major code rewrite and refactoring to improve performance and usability.
- Fix bugs with URL targeting and empty lines in the "Target by URL" textarea.

= 0.7.2 =

- Fix PHP warnings/notices. Props to [James Collins](http://om4.com.au/).

= 0.7.1 =

- Confirm that the plugin works with the latest version of WP.

= 0.7 =

- Bug fix: check for active sidebars only after $paged has been set.

= 0.6 =

- Don't check for used sidebars on each widget load. Allow absolute URLs in the URL check.

= 0.5 =

- Added distinction between is_front_page() and is_home(). Remove widgets from wp_get_sidebars_widgets() if they are not being displayed -- this way you can check if a particular sidebar is empty.

= 0.4.5 =

- Widget output callback couldn't determine the widget_id.

= 0.4.4 =

- Fixed widget control parameter transfer for widgets that don't use the new widget api.

= 0.4.2 =

- Initial release on Plugin repository.


== Upgrade Notice ==

= 1.0.2 =
Load available custom post types and taxonomies right before visibility checks to avoid PHP warnings. Run visibility checks only after the main post query has run. Fixes issues with WooCommerce.

= 1.0.1 =

Fix PHP warning in custom post type and taxonomy module.

= 1.0 =

New modular architecture and settings page. Please make sure you test this version before deploying to a production website.

= 0.8.1 =

(1) Revert to a legacy method for attaching widget control settings in order to make it work with old plugins. (2) Fix the word count context logic.

= 0.8 =

Major code rewrite and refactoring to improve plugin performance and usability.

= 0.7.2 =

Fix PHP warnings/notices.

= 0.7.1 =

Confirm that plugin works with the latest version of WordPress.

= 0.7 =

Bug fix: check for active sidebars only after $paged has been set.

= 0.6 =

Performance improvements - don't check if sidebar has any widgets on every widget load.


== Screenshots ==

1. Widget Context settings at the bottom of every widget
2. Widget Context plugin settings
