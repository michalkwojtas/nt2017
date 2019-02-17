<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Niecelnetrafienie_2017
 */

?>
<script>
jQuery(function($){

	// First word in player's name in tactic to be enclosed in span for styling
	$('div.team-wrapper div a' || 'div.team-wrapper.team2 a').html(function(){
		var text = $(this).text().split(' ');
		var first = text.shift();
		return (text.length > 0 ? '<span class="first">'+first+'</span> ' : first) + text.join(" ");
	});

});
</script>
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
			// display the Tactics widget in post content
			$paragraphAfter= 1;
			$content = apply_filters('the_content', get_the_content());
			$content = explode("</p>", $content);
				for ($i = 0; $i <count($content); $i++ ) {
				if ($i == $paragraphAfter) { ?>
					<div class="tactics-wrapper">
						<div class="team-wrapper">
							<h3 class="tactics-team-name">
								<?php
								$term = get_field('team1');
								if( $term ): ?>
								 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> </a>
							 <?php endif; ?>
							 <span class="formation">
								  |  Ustawienie:
								<?php
								$term = get_field('team1-formation');
								if( $term ): ?>
								 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> </a>
								<?php endif; ?>
							</span>
							<span class="manager">
								  |  Trener:
								<?php
								$term = get_field('team1-manager');
								if( $term ): ?>
								 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
								<?php endif; ?>
							</span>
							</h3>
							<div><?php
								$term = get_field('team1-g');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?>
							</div>
							<div><?php
								$term = get_field('team1-d4');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-d3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-d2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-d1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team1-dm4');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-dm3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-dm2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-dm1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team1-am4');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-am3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-am2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-am1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team1-f3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-f2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team1-f1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							</div>
						<div class="team-wrapper team2">
							<div><?php
								$term = get_field('team2-f1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-f2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-f3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team2-am1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-am2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-am3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-am4');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team2-dm1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-dm2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-dm3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-dm4');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team2-d1');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-d2');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-d3');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?><?php
								$term = get_field('team2-d4');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?></div>
							<div><?php
								$term = get_field('team2-g');
								if( $term ): ?><a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a><?php endif; ?>
							</div>
						<h3 class="tactics-team-name">
							<?php
							$term = get_field('team2');
							if( $term ): ?>
							 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> </a>
							<?php endif; ?>
							<span class="formation">
							  |  Ustawienie:
							<?php
							$term = get_field('team2-formation');
							if( $term ): ?>
							 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> </a>
							<?php endif; ?>
						</span>
						<span class="manager">
							  |  Trener:
							<?php
							$term = get_field('team2-manager');
							if( $term ): ?>
							 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
							<?php endif; ?>
						</span>
						</h3>
					</div>
					<div class="tactics-summary">
						<p class="tactics-summary-text">
							<span class="match-rating">
							Poziom meczu:
								<?php
								$term = get_field('match-rating');
								if( $term ): ?>
								 <a target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
								<?php endif; ?>
							</span>
							<span class="best-player">
							Najlepszy na boisku:
								<?php
								$term = get_field('best-player');
								if( $term ): ?>
								 <span class="bold"><?php echo $term->name; ?></span>
								<?php endif; ?>
							</span>
						</p>
					</div>
				</div>
				<?php }
				echo $content[$i] . "</p>";
		} ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'niecelnetrafienie-2017' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>
<!-- #post-## -->
