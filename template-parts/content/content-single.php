<article class="entrada-single">

	<header class="single-destacada">
		<div class="single-titulo">
			<?php the_title( '<h1>', '</h1>' ); ?>
		</div>
	</header>

	<div class="contenido-entrada">
		<?php the_content(); ?>
	</div>

	<footer>
		<?php
		$post_tags = get_the_tags();

		if ( $post_tags ) {
			foreach( $post_tags as $tag ) {
			echo $tag->name . ', ';
			}
		}
		?>
	</footer>

</article>