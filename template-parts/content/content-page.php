<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="content-header">

		<?php the_title( '<h1>', '</h1>' ); ?>

	</header>

	<div class="contenido-pagina">

		<?php the_content(); ?>

	</div>

</article>