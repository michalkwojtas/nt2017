		<div class="entry-meta">
			<span class="cat-links"><?php the_category()?></span><span class="posted-on"><?php the_time("d.m.Y") ?></span><span class="match-rating">
				<?php
				$term = get_field('match-rating');
				if( $term ): ?>
				 <a class="match-rating" target="_blank" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
				<?php endif; ?></span>
		</div><!-- .entry-meta -->
