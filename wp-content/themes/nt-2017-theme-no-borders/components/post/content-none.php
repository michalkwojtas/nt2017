<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Niecelnetrafienie_2017
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="entry-title"><?php esc_html_e( 'Brak wyników wyszukiwania', 'niecelnetrafienie-2017' ); ?></h1>
	</header>
	<div class="page-content">
		<div class="no-search-results-image"><p class="image-error-message">0:0</p></div>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'niecelnetrafienie-2017' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Niestety, do wpisanej przez Ciebie frazy nie pasują żadne treści na tej stronie. Spróbuj wpisać inną frazę. Możesz też wybrać kategorię na belce powyżej lub tag po prawej stronie (komputer) lub poniżej (telefon).', 'niecelnetrafienie-2017' ); ?></p>
			<?php
		/*	get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'niecelnetrafienie-2017' ); ?></p>
			<?php
				get_search_form(); */

		endif; ?>
	</div>
</section><!-- .no-results -->
