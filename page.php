<?php
/**
 * Este template muestra las páginas por defecto.
 *
 * Dependiendo de las opciones que hayamos elegido en la cofiguración del tema
 * este template imprimirá el contenido a full-width o con sidebar.
 *
 * Para editar el content debes modificarlo en :partials/content-page.php.
 * Si quieres llamar a otro content duplica este template en tu child-theme.
 *
 * @package Origen
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

	<div class="origen_layout <?php echo get_theme_mod('origen_page_layout'); ?>"> <!-- Los tres modos son __sidebar, __sidebar--reverse, full-width -->

		<main class="<?php echo apply_filters( 'origen_page_main', 'site-content__main site-page' ); ?>">

			<?php
			while ( have_posts() ) : the_post();

				/**
				 * Hook: origen_before_page
				 * Este hook te permite anclar justo antes de que WordPress imprima
				 * el contenido del editor, este contenido se adaptara a como hayamos
				 * seleccionado que se vea el content (si a full-width o con sidebar).
				 *
				 * @since 0.1.0
				 */
				do_action( 'origen_before_page' );

				get_template_part( '/partials/content', 'page' );

				/**
				 * Hook: origen_after_page
				 * Este hook te permite anclar justo despues de que se cierre el contenido
				 * del editor de WordPress. Este contenido se adaptara a como hayamos seleccionado
				 * que se vea el content.
				 *
				 * Si la página está paginada (está divido el contenido en varias páginas)
				 * el contenido de este hook se imprimirá despues de los enlaces de paginación.
				 *
				 * * @since 0.1.0
				 */
				do_action( 'origen_after_page' );

			endwhile;
			?>

		</main>

		<?php if(origen_sidebar_exist()) get_sidebar( ); ?>
	</div>



<?php get_footer(); ?>