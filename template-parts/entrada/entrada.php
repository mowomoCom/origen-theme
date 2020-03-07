
	<article class="entrada">

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php get_template_part("template-parts/entrada/entrada", 'metas'); ?>

		<div class="img-destacada">
			<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
		</div>

		<div class="extracto">
			<?php the_excerpt(); ?>
		</div>

		<div class="btn-accion">
			<a href="<?php the_permalink(); ?>"><?php _e( 'Seguir leyendo' , 'mowomo-base' ); ?><i class="far fa-angle-right"></i></a>
		</div>

	</article>

