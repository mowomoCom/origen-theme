<?php get_header(); ?>

<div class="search flexblog max">

	<main class="contenido-principal">

		<?php get_template_part( 'template-parts/rastro-migas' ); ?>

		<h1><?php _e( 'Resultados de la búsqueda' , 'mowomo-base' ); ?>"<?php echo get_search_query(); ?>"</h1>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				get_template_part( 'template-parts/entrada/entrada' );

			endwhile;

		endif; ?>

		<?php get_template_part('template-parts/paginacion'); ?>

	</main>

	<?php get_template_part( 'sidebar' ); ?>

</div>

<?php get_footer(); ?>