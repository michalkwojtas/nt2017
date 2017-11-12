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
		<!--Should there ever be a problem with the thumbnail for tags, uploading double featured images is a backup solution
		<?php
			if( class_exists('Dynamic_Featured_Image') ) {
				global $dynamic_featured_image;
				$featured_images = $dynamic_featured_image->get_featured_images(get_the_ID());
				foreach( $featured_images as $image ) {
					echo "<img src='{$image['full']}' />";
			}
		}
	?>
		-->
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
	<div class="entry-content">
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
					<?php the_post_thumbnail( 'niecelnetrafienie-2017-featured-image' ); ?>
			</div>
		<?php endif; ?>
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
		<?php
		$paragraphAfter= 3; //display after the first paragraph
		$content = apply_filters('the_content', get_the_content());
		$content = explode("</p>", $content);
		for ($i = 0; $i <count($content); $i++ ) {
		if ($i == $paragraphAfter) { ?>

		<div>THIS IS MY TEST CONTENT</div>

		<?php }
		echo $content[$i] . "</p>";
		} ?>
	</div>
</article>
<!-- #post-## -->
