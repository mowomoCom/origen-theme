<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name=viewport content="width=device-width, initial-scale=1">

		<!-- FUENTES -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i|Open+Sans:400,400i,600,600i" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<!-- JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri() . "/js/menu.js"; ?>"></script>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class( ); ?>>

		<?php get_template_part( '/template-parts/header/header', 'cabecera' ); ?>