<?php get_header(); ?>

<section class="page-full max">

	<main class="contenido-principal">

		<?php get_template_part( 'template-parts/rastro-migas' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content/content', 'page'); ?>

		<?php endwhile; ?>

	</main>

</section>

<?php get_footer(); ?>
