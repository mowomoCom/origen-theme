<?php

/**
 * Funciones para los templates
 */

if ( ! function_exists( 'origen_site_logo' ) ) {
	/**
	 * Imprime el logo que se ha añadido en el custom logo en Apariencia
	 *
	 * @since 0.1.0
	 * @return void
	 */
	function origen_site_logo() {
		?>
		<div class="site-logo">

			<figure class="site-logo__img">

				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
				?>

			</figure>

		</div><!-- .site-logo -->
		<?php
	}
}

if ( ! function_exists( 'origen_principal_menu' ) ) {
	/**
	 * Muestra el menu principal
	 *
	 * @since 0.1.0
	 * @return void
	 */
	function origen_principal_menu() {
		?>

		<div class="site-hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>

		<nav class="site-menu" role="navigation" aria-label="<?php esc_html_e( 'Primary menu', 'origen' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'PrincipalMenu',
					'container_class' => 'principal-menu',
				)
			);
			?>
		</nav><!-- .site-menu -->
		<?php
	}
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Compatibilidad de wp_body_open con versiones de WordPress inferiores a la 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if ( ! function_exists( 'origen_post_thumbnail' ) ) {
	/**
	 * Muestra post thumbnail
	 *
	 * @var $size guarda el tamaño de thumbnail. thumbnail|medium|large|full|$custom
	 * @param string $size es el tamaño del post thumbnail.
	 * @since 0.1.0
	 */
	function origen_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			?>
			<figure class="site-content__post-thumbnail">

			<?php the_post_thumbnail( $size ); ?>

			</figure>
			<?php
		}
	}
}

if ( ! function_exists( 'origen_page_content' ) ) {
	/**
	 * Muestra el post content y los link para la paginación si el contenido
	 * de la página estuviera paginada.
	 *
	 * @since 0.1.0
	 */
	function origen_page_content() {
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
	}
}

if ( ! function_exists('origen_open_container_max') ) {
	/**
	 * Permite abrir un contenedor .max que permite limitar el contenido
	 * al ancho máximo de la web
	 *
	 * @since 0.1.0
	 */
	function origen_open_container_max() {
		?>
		<div class="max">
		<?php
	}
}

if ( ! function_exists('origen_close_container_max') ) {
	/**
	 * Permite cerrar el contenedor .max
	 *
	 * @since 0.1.0
	 */
	function origen_close_container_max() {
		?>
		</div>
		<?php
	}
}

if ( !function_exists('origen_sidebar_exist') ) {

	function origen_sidebar_exist(){
		$page_layout = get_theme_mod( 'origen_page_layout' );

		if ($page_layout != 'full_width'){
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'origen_archive_post' ) ) {
	
	function origen_archive_post() {
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>


		<figure class="post__imagen col-12 col-md-6">
			<a href="<?php the_permalink(); ?>" rel="nofollow">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure>

		<div class="post__contenido col-12 col-md-6">
			<header class="post__header">
				<h1 class="post__titulo"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p class="post__categoria"><?php the_category(' '); ?></p>
			</header>
			<p class="post__resumen"><?php echo get_the_excerpt(); ?></p>
			<a href="<?php the_permalink(); ?>" class="btn btn--post" rel="nofollow"><?php _e('Read more', 'origen'); ?></a>
		</div>

		</article>
	<?php
	}
}