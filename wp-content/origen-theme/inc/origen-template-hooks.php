<?php

/**
 * Funciones para los hooks de los templates
 */

/**
 * HEADER
 * Hook name: origen_header
 *
 * @see origen_site_logo()
 * @see origen_principal_menu();
 */
add_action( 'origen_header', 'origen_open_container_max', 5 );
add_action( 'origen_header', 'origen_site_logo', 10 );
add_action( 'origen_header', 'origen_principal_menu', 20 );
add_action( 'origen_header', 'origen_close_container_max', 30 );

 /**
 * PAGE
 * Hook name: origen_after_page_header
 *
 * @see origen_post_thumbnail();
 */

add_action( 'origen_after_page_header', 'origen_post_thumbnail' );

 /**
 * SINGLE
 * Hook name: origen_after_single_header
 *
 * @see origen_post_thumbnail();
 */

add_action( 'origen_before_single_content', 'origen_post_thumbnail' );

/**
 * ARCHIVE
 */

 add_action( 'origen_archive_post', 'origen_archive_post', 10 );