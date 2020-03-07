<?php

// INTERNACIONALIZACIÓN
add_action('after_setup_theme', 'idiomas_setup');
function idiomas_setup(){
    load_theme_textdomain('nombre_tema', get_template_directory() . '/languages');
}

function mwm_style(){

  wp_register_style('style', get_template_directory_uri().'/styles/css/style.min.css', array(), '1.0');

  wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'mwm_style');

/* INCLUIR MENUS
=============================================== */
add_theme_support('menus');
if (function_exists('register_nav_menus')) {
register_nav_menus (
array (
'MenuSuperior' => 'Menu Superior',
));
}

/*  ZONA DE WIDGET BARRA LATERAL
=============================================== */
function mwm_registrar_sidebar(){
  register_sidebar(array(
   'name' => 'Barra Lateral',
   'id' => 'sidebarblog',
   'description' => 'Barra lateral de la revista',
   'class' => 'sidebar-blog',
   'before_widget' => '<div class="box-sidebar">',
   'after_widget' => '</div>',
   'before_title' => '<div class="widget-title">',
   'after_title' => '</div>',
  ));
}
add_action( 'widgets_init', 'mwm_registrar_sidebar');

/* VIDEOS RESPONSIVE AUTOMATICOS
============================================ */
if(!function_exists('video_content_filter')) {
 function video_content_filter($content) {

// busca algún iFrame en la página
 $pattern = '/<iframe.*?src=".*?(vimeo|youtu\.?be).*?".*?<\/iframe>/';
 preg_match_all($pattern, $content, $matches);

 foreach ($matches[0] as $match) {
// iFrame encontrado, ahora lo envolvemos en un DIV ...
 $wrappedframe = '<div class="rwd-video">' . $match . '</div>';

// Intercambia el original con el video, ahora encerrado
 $content = str_replace($match, $wrappedframe, $content);
 }
 return $content;
 }
// Aplicar a areas de contenido de la página o entrada
 add_filter( 'the_content', 'video_content_filter' );

// Aplicar a los widgets si se quiere
 add_filter( 'widget_text', 'video_content_filter' );
}

// Imágenes destacadas
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails'); }

// SOPORTE PARA TITLE-TAG
add_theme_support( 'title-tag' );

/* ELIMINAR LA VERSION DE WP DE LA URL */

function remove_src_version ( $url ) {
//Regex quitar el parametro ver
$url = preg_replace('/([?&])' . 'ver' . '=[^&]+(&|$)/','$1',$url);
//Eliminar caracteres erroneos al final
if (preg_match("/\?$/", $url) || preg_match("/\&$/", $url))
return substr($url, 0, -1);
else
return $url;
}