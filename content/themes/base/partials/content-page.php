<?php
/**
 * Este template se usa en page.php para mostrar el contenido.
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
	 * Hook: origen_before_page_content
	 *
	 * @since 0.1.1
	 */
	do_action( 'origen_before_page_content' );
	?>

	<header class="site-content__header">

		<?php
		/**
		 * Hook: origen_before_page_title
		 *
		 * @since 0.1.1
		 */
		do_action( 'origen_before_page_title' );

		//the_title( '<h1 class="site-content__title">', '</h1>' );

		/**
		 * Hook: origen_after_page_title
		 *
		 * @since 0.1.1
		 */
		do_action( 'origen_after_page_title' );
		?>

	</header><!-- .site-content__header -->

	<?php
	/**
	 * Hook: origen_after_page_header
	 *
	 * @since 0.1.1
	 */
	do_action( 'origen_after_page_header' );
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
	 * Hook: origen_after_page_content
	 *
	 * @since 0.1.1
	 */
	do_action( 'origen_after_page_content' );
	?>
</article>
