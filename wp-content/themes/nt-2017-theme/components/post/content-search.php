<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Niecelnetrafienie_2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="post-crests">
		 <div class="club-crest">
			<a href="/tag/real-madrid"><img src="/nt2017/wp-content/themes/nt-2017-theme/assets/images/real-madrid-150x150.png"></a>
		 </div>
		 <div class="club-crest">
			<a href="/tag/barcelona"><img src="/nt2017/wp-content/themes/nt-2017-theme/assets/images/barcelona-150x150.png"></a>
		 </div>
		</div>
		<?php if ( 'post' === get_post_type() ) : ?>
			<?php get_template_part( 'components/post/content', 'meta' ); ?>
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>
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
	<?php
    echo get_the_tag_list('<div class="tags-list">Tagi: ',', ','</div>');
  ?>
</article>
