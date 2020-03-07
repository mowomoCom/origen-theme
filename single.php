<?php get_header(); ?>

<div class="single-full max">

	<main class="contenido-principal entrada">

		<?php get_template_part( 'template-parts/rastro-migas' ); ?>

		<?php
		while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content/content', 'single' );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile;
		?>

	</main>

</div>

<?php get_footer(); ?>