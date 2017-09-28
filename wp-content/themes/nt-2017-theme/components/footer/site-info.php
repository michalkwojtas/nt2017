<div class="tag-cloud">
	<?php wp_tag_cloud( array(
   'smallest' => 8, // size of least used tag
   'largest'  => 22, // size of most used tag
   'unit'     => 'px', // unit for sizing the tags
   'number'   => 45, // displays at most 45 tags
   'orderby'  => 'name', // order tags alphabetically
   'order'    => 'ASC', // order tags by ascending order
   'taxonomy' => 'post_tag' // you can even make tags for custom taxonomies
) ); ?>
</div>
<div class="site-info">
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'niecelnetrafienie-2017' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'niecelnetrafienie-2017' ), 'WordPress' ); ?></a>
	<span class="sep"> | </span>
	<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'niecelnetrafienie-2017' ), 'Niecelnetrafienie 2017', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
</div><!-- .site-info -->
