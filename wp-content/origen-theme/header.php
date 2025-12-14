<?php
/**
 * Este es el header de nuestro tema.
 *
 * En este template se encuentra las aperturas del html y el head.
 * Además tiene la apertura de los principales contenedores del tema
 * como son el body, .site, el header y .site-content.
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name=viewport content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		/**
		 * wp_body_open
		 * Te permite añadir contenido justo despues de la apertura del body.
		 */
		wp_body_open(); ?>

		<div class="<?php echo apply_filters( 'origen_site_classes', 'site' ); ?>">

			<?php
			/**
			 * Hook: origen_before_header
			 * Te permite anclar antes de de abrir la etiqueta <header>
			 */
			do_action( 'origen_before_header' ) ?>

			<header class="<?php echo apply_filters( 'origen_header_classes', 'site__header type_one' ); ?>">

				<?php
				/**
				 * Hook: origen_before_header
				 * Te permite anclar dentro de la etiqueta <header>
				 *
				 * @hooked origen_open_container_max	- 5
				 * @hooked origen_site_logo				- 10
				 * @hooked origen_principal_menu		- 20
				 * @hooked origen_close_container_max	- 30
				 *
				 */
				do_action( 'origen_header' ); ?>

			</header>

			<?php
			/**
			 * Hook: origen_after_header
			 * Te permite anclar despues de cerrar la etiqueta <header>
			 */
			do_action( 'origen_after_header' ) ?>

			<div class="<?php echo apply_filters( 'origen_site_content_clasess', 'site-content' ); ?>">
			<?php
			/**
			 * Hook: origen_before_content
			 * Te permite anclar justo antes de del div que contiene a la sidebar y al content.
			 * Este contenido no se ve afectado por como ordenemos el contenido (full-width, sidebar).
			 */
			do_action( 'origen_before_content' ); ?>