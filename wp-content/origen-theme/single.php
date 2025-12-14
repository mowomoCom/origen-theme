<?php get_header(); ?>

<div class="origen_layout"> <!-- Los tres modos son __sidebar, __sidebar--reverse, full-width -->

	<main class="site-content__main site-single">
		<?php
		while ( have_posts() ) : the_post();

			/**
			 * Hook: origen_before_single
			 * Este hook te permite anclar justo antes de que WordPress imprima
			 * el contenido del editor, este contenido se adaptara a como hayamos
			 * seleccionado que se vea el content (si a full-width o con sidebar).
			 */
			do_action( 'origen_before_single' );

			get_template_part( '/partials/content', 'single' );

			/**
			 * Hook: origen_after_single
			 * Este hook te permite anclar justo despues de que se cierre el contenido
			 * del editor de WordPress. Este contenido se adaptara a como hayamos seleccionado
			 * que se vea el content.
			 *
			 * Si la página está paginada (está divido el contenido en varias páginas)
			 * el contenido de este hook se imprimirá despues de los enlaces de paginación.
			 */
			do_action( 'origen_after_single' );

		endwhile;
		?>

	</main>
</div>

<?php get_footer(); ?>