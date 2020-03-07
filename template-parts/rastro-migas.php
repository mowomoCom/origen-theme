<div class="rastro-migas">

<?php global $post; ?>

	<a href="<?php bloginfo('url'); ?>"><?php _e('Inicio','mowomo-base'); ?></a> &gt;

	<?php
	if ( is_page()) {

		if($post->post_parent){
			$anc = get_post_ancestors( $post->ID );
			$title = get_the_title();
			foreach ( $anc as $ancestor ) {
				$output = '<a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> &gt; ';
			}
			echo $output;
			echo $title;
		} else {
			echo get_the_title();
		}
	}

	if (is_home()) {

	}

	if (is_single()) { ?>

		<a href="<?php bloginfo('url'); ?>/blog/">Blog</a> &gt; <?php the_title();

	}

	 if (is_archive()) {
		 if (is_category()) {   single_cat_title();
		 } elseif ( is_tag()) {  single_tag_title();
		 } elseif (is_day()) {  the_time('d.m.Y');
		 } elseif (is_month()) {  the_time('F, Y');
		 } elseif (is_year()) {  the_time('Y');
		 } elseif (is_author()) {  the_author();
		 }
	 }

	if ( is_search() ) {
		_e('Resultado de busqueda &gt;','mowomo-base');
		echo get_search_query();
	}

	if ( is_404() ) {
   		_e( '404', 'mowomo-base' );
	}?>

</div>