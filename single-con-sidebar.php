<?php
/*
 * Template Name: Con barra lateral
 * Template Post Type: post
 */
get_header(); ?>

<div class="flexblog max">

	<main class="contenido-principal entrada">

		<?php get_template_part( 'template-parts/rastro-migas' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article class="entrada-single">

				<div class="single-destacada">
					<div class="single-titulo">
						<h1><?php the_title( ); ?></h1>
					</div>
				</div>

				<div class="contenido-entrada">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; ?>

	</main>

	<?php get_template_part( 'sidebar' ); ?>

</div>

<?php get_footer(); ?>