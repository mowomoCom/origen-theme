<?php get_header(); ?>

<div class="page404 max">

	<main class="contenido-principal">

		<?php get_template_part( 'template-parts/rastro-migas' ); ?>

		<article>
			<h1><?php _e( "Lo sentimos, no hemos encontrado lo que estabas buscando." , "mowomo-base" ); ?></h1>

			<div class="contenido-pagina">
				<?php get_search_form(); ?>
			</div>

		</article>
	</main>

</div>

<?php get_footer(); ?>