<?php get_header(); ?>

<div class="index flexblog max">

	<main class="entradas-blog">

		<?php get_template_part( 'template-parts/rastro-migas' ); ?>

		<h1><?php _e( 'Blog', 'mowomo-base' ); ?></h1>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/entrada/entrada' );

			endwhile;

		endif;

		get_template_part( 'template-parts/paginacion' );
		?>

	</main>

	<?php get_template_part( 'sidebar' ); ?>

</div>

<?php get_footer(); ?>