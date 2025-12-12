<?php
/**
 * Este template se usa en archive.php, index.php para mostrar el contenido.
 *
 * @package Origen
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php do_action( 'origen_after_archive_post' ); ?>

<?php do_action( 'origen_archive_post' ); ?>

<?php do_action( 'origen_before_archive_post' ); ?>