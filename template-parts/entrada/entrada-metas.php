<?php $id_autor = get_the_author_meta('ID'); ?>

<div class="metas">

	<div class="autor">

		<a href="<?php echo get_author_posts_url( $id_autor ); ?>"><?php echo get_avatar( $id_autor); ?><span class="nombre-autor"><?php echo get_the_author(' '); ?></span></a>

	</div>

	<span class="fecha"><i class="fas fa-calendar-alt"></i><?php the_date(); ?></span>
	<span class="categoria"><?php the_category(' '); ?></span>

</div>