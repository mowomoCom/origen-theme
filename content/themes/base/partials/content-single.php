<?php
/**
 * Este template se usa en single.php para mostrar el contenido.
 *
 * @package Origen
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Hook: origen_before_single_content
	 *
	 * @since 0.1.1
	 */
	do_action( 'origen_before_single_content' );
	?>

	<header class="site-content__header">

		<?php
		/**
		 * Hook: origen_before_single_title
		 *
		 * @since 0.1.1
		 */
		do_action( 'origen_before_single_title' );

		the_title( '<h1 class="site-content__title t-h2">', '</h1>' );

		/**
		 * Hook: origen_after_single_title
		 *
		 * @since 0.1.1
		 */
		do_action( 'origen_after_single_title' );
		?>

	</header><!-- .site-content__header -->

	<?php
	/**
	 * Hook: origen_after_single_header
	 *
	 * @since 0.1.1
	 */
	do_action( 'origen_after_single_header' );
	?>

	<div class="site-content__body">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="site-content__links">' . __( 'Pages:', 'origen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .site-content__body -->

	<?php
	/**
	 * Hook: origen_after_single_content
	 *
	 * @since 0.1.1
	 */
	do_action( 'origen_after_single_content' );
	?>
</article>
