<?php

/**
 * Funciones generales de Origen
 */

if ( !function_exists( 'echop' ) ) {
	function echop ( $var ) {
		echo '<pre>',var_dump( $var ),'</pre>';
	}
}

if ( !function_exists( 'origen_get_post_meta' ) ) {
	function origen_get_post_meta( int $post_id, string $key = '' ) {
		return get_metadata( 'post', $post_id, $key, true );
	}
}

/**
 * Funciones para los widgets
 */

if ( !function_exists( 'origen_new_widget' ) ) {
	function origen_new_widget( $widget_name = 'Sidebar' ) {
		$id = trim($widget_name);
		array_push($list_widgets, $list_widgets[]= register_sidebar(array(
			'name' => $widget_name,
			'id' => $id,
			/* translators: 1. widget name */
			'description' => wp_sprintf(__('%s widget zone', 'origen'), $widget_name ),
			'class' => 'origen-widget',
			'before_widget' => '<div class="box-sidebar">',
			'after_widget' => '</div>',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
		)));
	}
}

/**
 * Funciones para el personalizador
 */

if ( !function_exists( 'origen_create_section' ) ) {
	function origen_create_section($name, $panel){
		$section = array($name, $panel);
		array_push( $GLOBALS['customizer_sections'], $section);
	}
}

if ( !function_exists( 'origen_create_setting' ) ) {
	function origen_create_setting($name, $section, $type='', $args=''){
		$setting = array($name, $section, $type, $args);
		array_push( $GLOBALS['customizer_settings'],  $setting );

	}
}

if ( !function_exists( 'origen_create_panel' ) ) {
	function origen_create_panel($id, $title, $description, $priority = 100){
		$panel = array( $id, $title, $description, $priority );
		array_push( $GLOBALS['customizer_panel'],  $panel );
	}
}



if ( !function_exists( 'origen_show_sidebar' ) ) {
	function origen_show_sidebar( $sidebar ) {
		if ( is_active_sidebar( $sidebar ) ) dynamic_sidebar( $sidebar );
	}
}

/**
 * Funciones para los menús
 */

if ( !function_exists( 'origen_show_menu' ) ) {
	function origen_show_menu (string $location, string $container_class, array $args = array() ) {

		$args['theme_location'] = $location;
		$args['container_class'] = $container_class;
		wp_nav_menu( $args );

	}
}


/**
 * Funciones para el loop
 */

if ( !function_exists( 'origen_loop' ) ) {
	function origen_loop( string $tpl_slug = 'content', string $tpl_name = null, array $args = array() ) {

		/**
		 * Filter template and args
		 */
		$tpl_slug = apply_filters( 'origen_loop_tpl_slug', $tpl_slug, $tpl_name, $args );
		$tpl_name = apply_filters( 'origen_loop_tpl_name', $tpl_name, $tpl_slug, $args );
		$args = apply_filters( 'origen_loop_args', $args, $tpl_slug, $tpl_name );

		/**
		 * Sets up The Loop with query parameters
		 */
		
		if ( !empty( $args ) ) :
			query_posts( $args );
		endif;

		/**
		 * Action before checking for posts
		 */
		do_action( 'origen_loop_before_have_posts', $tpl_slug, $tpl_name, $args );

		if ( have_posts() ) :

			/**
			 * Action before the loop starts
			 */
			do_action( 'origen_loop_before_loop_starts', $tpl_slug, $tpl_name, $args );

			while ( have_posts() ) : the_post();

				/**
				 * Action after the loop starts
				 */
				do_action( 'origen_loop_after_loop_starts', $tpl_slug, $tpl_name, $args );

				/**
				 * We load the loop template
				 */
				get_template_part( $tpl_slug, $tpl_name );

				/**
				 * Action before the loop ends
				 */
				do_action( 'origen_loop_before_loop_ends', $tpl_slug, $tpl_name, $args );

			endwhile;

			/**
			 * Action after the loop ends
			 */
			do_action( 'origen_loop_after_loop_ends', $tpl_slug, $tpl_name, $args );

		else:

			/**
			 * Action before there are no posts
			 */
			do_action( 'origen_loop_before_no_posts', $tpl_slug, $tpl_name, $args );

			/**
			 * We load the no loop template
			 */
			get_template_part( 'content', 'none' );

			/**
			 * Action after there are no posts
			 */
			do_action( 'origen_loop_after_no_posts', $tpl_slug, $tpl_name, $args );

		endif;

		/**
		 * Action after checking for posts
		 */
		do_action( 'origen_loop_after_have_posts', $tpl_slug, $tpl_name, $args );
		
	}
}