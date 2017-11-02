<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Niecelnetrafienie_2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'niecelnetrafienie-2017-featured-image' ); ?>
			</a>
		</div>
	<?php endif; ?>
	<header class="entry-header">
		<div class="post-crests">
		 <div class="club-crest">
			<a href="/tag/real-madrid"><img src="/nt2017/wp-content/themes/nt-2017-theme/assets/images/real-madrid-150x150.png"></a>
		 </div>
		 <div class="club-crest">
			<a href="/tag/barcelona"><img src="/nt2017/wp-content/themes/nt-2017-theme/assets/images/barcelona-150x150.png"></a>
		 </div>
	  </div>
		<?php get_template_part( 'components/post/content', 'meta' ); ?>
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</header>
	<a href="<?php echo get_permalink(); ?>">
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( '+ Czytaj dalej', 'niecelnetrafienie-2017' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'niecelnetrafienie-2017' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	</a>
</article>
<!-- #post-## -->
