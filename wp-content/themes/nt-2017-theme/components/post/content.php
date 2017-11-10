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
<header class="entry-header">
	<div class="post-crests">
   <?php
    $tags_list = get_the_tags();
		if ( ! empty( $tags_list) ) {
    foreach ($tags_list as $tag_x) {
			$image_x = get_term_meta( $tag_x->term_id, 'image', true );
			if ( ! empty( $image_x ) ) {
					$image_atts = wp_get_attachment_image_src( $image_x, 'full' );
					echo '<div class="club-crest"><a href="'. get_term_link($tag_x).'"><img src="' . esc_url( $image_atts[0] ) . '" /></a></div>';
			 }
		 }
	 }
   ?>
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
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
	 		<div class="post-thumbnail">
	 			<a href="<?php the_permalink(); ?>">
	 				<?php the_post_thumbnail( 'niecelnetrafienie-2017-featured-image' ); ?>
	 			</a>
	 		</div>
	 	<?php endif; ?>
	 <div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( '+ Czytaj dalej', 'niecelnetrafienie-2017' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	 </div>
	</a>
</article>
<!-- #post-## -->
