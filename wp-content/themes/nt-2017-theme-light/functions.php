<?php
/**
 * components functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Niecelnetrafienie_2017
 */

if ( ! function_exists( 'niecelnetrafienie_2017_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function niecelnetrafienie_2017_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'niecelnetrafienie-2017' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'niecelnetrafienie-2017', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'niecelnetrafienie-2017-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'niecelnetrafienie-2017' ),
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'niecelnetrafienie_2017_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'niecelnetrafienie_2017_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function niecelnetrafienie_2017_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'niecelnetrafienie_2017_content_width', 640 );
}
add_action( 'after_setup_theme', 'niecelnetrafienie_2017_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function niecelnetrafienie_2017_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function niecelnetrafienie_2017_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'niecelnetrafienie-2017' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'niecelnetrafienie_2017_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function niecelnetrafienie_2017_scripts() {
	wp_enqueue_style( 'niecelnetrafienie-2017-style', get_stylesheet_uri() );

	wp_enqueue_script( 'niecelnetrafienie-2017-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'niecelnetrafienie-2017-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'niecelnetrafienie_2017_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Below is a custom set of functions letting me sort tags on post front-end by the order they were entered in for this post
 * The functions have been provided by user "bonger" at https://wordpress.stackexchange.com/questions/174453/order-tags-but-not-alphabetically
 * Should this cease to work after a future WP update, the double featured images plugin is a backup solution
 */

// Called in admin on updating terms - update our order meta.
add_action( 'set_object_terms', function ( $object_id, $terms, $tt_ids, $taxonomy, $append, $old_tt_ids ) {
    if ( $taxonomy != 'post_tag' ) {
        return;
    }
    // Save in comma-separated string format - may be useful for MySQL sorting via FIND_IN_SET().
    update_post_meta( $object_id, '_tt_ids_order', implode( ',', $tt_ids ) );
}, 10, 6 );

// Reorder terms using our order meta.
function wpse174453_get_the_terms( $terms, $post_id, $taxonomy ) {
    if ( $taxonomy != 'post_tag' || ! $terms ) {
        return $terms;
    }
    if ( $ids = get_post_meta( $post_id, '_tt_ids_order', true ) ) {
        $ret = $term_idxs = array();
        // Map term_ids to term_taxonomy_ids.
        foreach ( $terms as $term_id => $term ) {
            $term_idxs[$term->term_taxonomy_id] = $term_id;
        }
        // Order by term_taxonomy_ids order meta data.
        foreach ( explode( ',', $ids ) as $id ) {
            if ( isset( $term_idxs[$id] ) ) {
                $ret[] = $terms[$term_idxs[$id]];
                unset($term_idxs[$id]);
            }
        }
        // In case our meta data is lacking.
        foreach ( $term_idxs as $term_id ) {
            $ret[] = $terms[$term_id];
        }
        return $ret;
    }
    return $terms;
}

// Called in front-end via the_tags() or related variations of.
add_filter( 'get_the_terms', 'wpse174453_get_the_terms', 10, 3 );

// Called on admin edit.
add_filter( 'terms_to_edit', function ( $terms_to_edit, $taxonomy ) {
    global $post;
    if ( ! isset( $post->ID ) || $taxonomy != 'post_tag' || ! $terms_to_edit ) {
        return $terms_to_edit;
    }
    // Ignore passed in term names and use cache just added by terms_to_edit().
    if ( $terms = get_object_term_cache( $post->ID, $taxonomy ) ) {
        $terms = wpse174453_get_the_terms( $terms, $post->ID, $taxonomy );
        $term_names = array();
        foreach ( $terms as $term ) {
            $term_names[] = $term->name;
        }
        $terms_to_edit = esc_attr( join( ',', $term_names ) );
    }
    return $terms_to_edit;
}, 10, 2 );
