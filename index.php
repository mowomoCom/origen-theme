<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div class="site-content__body full_width">

	<?php do_action( 'origen_after_main_archive' ); ?>

	<main class="origen_archive_main">

		<?php origen_loop( 'partials/content', 'archive_single' ); ?>

	</main>

	<?php do_action( 'origen_before_main_archive' ); ?>

</div>
<?php get_footer(); ?>