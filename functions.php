<?php
/**
 * mowomo Origen - Funciones
 *
 * @package Origen
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Añade todas las funciones que requiere el tema para funcionar.
 */
require get_template_directory() . '/inc/class.origen.php';


/**
 * Funciones para los widgets
 */

if ( !function_exists( 'origen_new_widget' ) ) {
	function origen_new_widget( $widget_name = 'Barra lateral' ) {
		$id = trim($widget_name);
		array_push($list_widgets, $list_widgets[]= register_sidebar(array(
			'name' => $widget_name,
			'id' => $id,
			'description' => 'Zona widget de ' . $widget_name,
			'class' => 'origen-widget',
			'before_widget' => '<div class="box-sidebar">',
			'after_widget' => '</div>',
			'before_title' => '<div class="widget-title">',
			'after_title' => '</div>',
		)));
	}
}


/*  ZONA DE WIDGET BARRA LATERAL
=============================================== */

origen_new_widget( 'Barra lateral' );
origen_new_widget( 'Zona nueva 2' );

origen_create_panel('prueba', 'Seccion de prueba', 'Esta es la descrioción');

origen_create_section('misection', 'prueba');

origen_create_setting('selector ejemplo', 'misection', 'select', array(
	'full_width' => __( 'Pantalla completa' ),
	'sidebar_r' => __( 'Barra lateral derecha' ))
);

origen_create_setting('el texto qui', 'misection', 'text', 'placeholder de ejemplo');
