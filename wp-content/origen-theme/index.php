<?php
/**
 * Este template muestra lista los post type
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div class="site-content__body full_width">

	<?php
	/**
	 * Hook: origen_after_main_archive
	 * Este hook te permite anclar justo antes del contenedor que
	 * contiene el loop y el listado de posts.
	 *
	 * @since 0.1.0
	 */
	do_action( 'origen_after_main_archive' ); ?>

	<main class="origen_archive_main">

		<?php
		/**
		 * Aquí con el loop de WordPress cargamos el template-part
		 * de archive_single.
		 *
		 * @since 0.1.0
		 */
		origen_loop( 'partials/content', 'archive_single' ); ?>

	</main>

	<?php
	/**
	 * Hook: origen_before_main_archive
	 * Este hook te permite anclar justo despues del contenedor que
	 * contiene el loop.
	 *
	 * @since 0.1.0
	 */
	do_action( 'origen_before_main_archive' ); ?>

</div>
<?php get_footer(); ?>