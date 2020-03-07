<?php get_header(); ?>

<div class="flexblog max">

	<main class="contenido-principal">

		<?php get_template_part('rastro-migas') ?>

		<h1 class="archivo">

			<?php
			if (is_category()) {

				single_cat_title();

			} elseif (is_tag()) {

				_e('Artículos de','mowomo-base');
				single_tag_title();

			} elseif (is_day()) {

				_e('Artículos del','mowomo-base');
				the_time('d.m.Y');

			} elseif (is_month()) {

				_e('Artículos del','mowomo-base');
				the_time('F, Y');

			} elseif (is_year()) {

				_e('Artículos del','mowomo-base');
				the_time('Y');

			} elseif (is_author()) {

				_e('Artículos de','mowomo-base');
				the_author();

			}
			?>

		</h1>

		<?php
		if (is_category()):

			echo category_description( );

		endif;

		get_template_part( 'template-parts/entrada/entrada' );

		get_template_part('template-parts/paginacion');
		?>

	</main>


	<?php get_template_part( 'sidebar' ); ?>

</div>

<?php get_footer(); ?>
