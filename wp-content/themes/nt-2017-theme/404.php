<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Niecelnetrafienie_2017
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="entry-title"><?php esc_html_e( '404. Niecelne trafienie. Nie ma takiej strony.', 'niecelnetrafienie-2017' ); ?></h1>
				</header>
				<div class="page-content">
					<div class="404-image"><img src="/nt2017/wp-content/themes/nt-2017-theme/assets/images/baggio-world-cup-miss.jpg"></div>
					<p><?php esc_html_e( 'Jeśli trafiłaś/eś na tę stronę z wyszukiwarki, użyj formularza w prawym górnym rogu aby szukać interesującej Cię frazy. Możesz też wybrać kategorię na belce powyżej lub tag po prawej stronie (komputer) lub poniżej (telefon)', 'niecelnetrafienie-2017' ); ?></p>
					<?php
	/*			  get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );

						// Only show the widget if site has multiple categories.
						if ( niecelnetrafienie_2017_categorized_blog() ) :
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'niecelnetrafienie-2017' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div>
					<?php
						endif;  */

						/* translators: %1$s: smiley */
				/*  $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'niecelnetrafienie-2017' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

			    	the_widget( 'WP_Widget_Tag_Cloud' ); */
					?>

				</div>
			</section>
		</main>
	</div>
	<?php
	get_sidebar();
	get_footer();
