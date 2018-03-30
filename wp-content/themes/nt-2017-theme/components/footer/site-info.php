<div class="tag-cloud">
	<?php wp_tag_cloud( array(
   'smallest' => 0.7, // size of least used tag
   'largest'  => 2.1, // size of most used tag
   'unit'     => 'em', // unit for sizing the tags
   'number'   => 120, // displays at most 45 tags
   'orderby'  => 'name', // order tags alphabetically
   'order'    => 'ASC', // order tags by ascending order
   'taxonomy' => 'post_tag' // you can even make tags for custom taxonomies
) ); ?>
</div>
<div class="site-info">
	<a target="_blank" href="<?php echo esc_url( __( 'https://wordpress.org/', 'niecelnetrafienie-2017' ) ); ?>"><?php printf( esc_html__( 'Strona oparta o %s', 'niecelnetrafienie-2017' ), 'WordPress' ); ?></a>
	<span class="sep"> | </span>
	<?php printf( esc_html__( 'Autorzy szablonu: %2$s', 'niecelnetrafienie-2017' ), 'Niecelnetrafienie 2017', '<a href="http://automattic.com/" rel="designer" target="_blank">Automattic</a> i <a href="http://michalwojtas.pl/" rel="designer" target="_blank">Michał Wojtas</a>' ); ?>
  <span class="sep"> | </span>
	© 2009-2018 Michał Wojtas
</div><!-- .site-info -->
