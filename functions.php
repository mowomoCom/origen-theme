<?php
/**
 * mowomo Origen - Funciones
 *
 * @package Origen
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Añade todas las funciones que requiere el tema para funcionar.
 */
require get_template_directory() . '/inc/class.origen.php';


/**
 * Añade zona de menu principal
  */

  register_nav_menus( array(
	'PrincipalMenu' => __( 'Menu Principal', 'origen' ),
) );
  
/** 
 * Añade footer con 5 zonas de widget
*/
origen_new_widget('footer_brand_zone');
origen_new_widget('footer_sitemap_menu');
origen_new_widget('footer_legal_menu');
origen_new_widget('footer_copyright_zone');
origen_new_widget('footer_social_share_zone');



add_action( 'origen_footer', 'origen_setup_footer');
function origen_setup_footer(){
	ob_start(); ?>

	  <!-- Site footer -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <?php dynamic_sidebar( 'footer_brand_zone' ); ?>
          </div>
          <div class="col-xs-6 col-md-3">
		  	<?php dynamic_sidebar('footer_sitemap_menu');?>
          </div>
          <div class="col-xs-6 col-md-3">
            <?php dynamic_sidebar('footer_legal_menu');?>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
			<?php dynamic_sidebar('footer_copyright_zone');?>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
			<?php dynamic_sidebar('footer_social_share_zone');?>
          </div>
        </div>
      </div>
<?php 
$footer = ob_get_clean();
echo $footer;
}