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
