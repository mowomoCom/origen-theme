<?php

/**
 * Corazón de Origen
 */

if ( !class_exists( 'Origen' )) {

    /**
     * Declaración de la clase de configuración del tema
     */
    class Origen {

        // ===== ESTRUCTURE OF THE CLASS =====

        public $scripts = array();
        public $styles = array();
        public $menus = array();
        

        /**
         * Constructor de la clase
         */
        public function __construct() {

            $this::set_defaults();
            $this::include_files();
            $this::register_menus();
            $this::register_default_scripts();

            add_action( 'after_setup_theme', array( $this, 'setup' ) );
            add_action( 'init', array( $this, 'create_menus' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_front_scripts' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
            add_action( 'get_footer', array( $this, 'enqueue_footer_styles' ) );

        }


        // ===== CONFIGURATION OF THE CLASS =====

        /**
         * Inicializa las variables por defecto
         */
        public function set_defaults() {

            /**
             * Global para la versión del tema.
             */
            if ( ! defined( 'ORIGEN_VERSION' ) ) define( 'ORIGEN_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );

            /**
             * Global para el directorio de assets/css
             */
            if ( ! defined( 'ORIGEN_CSS' ) ) define( 'ORIGEN_CSS', get_template_directory() . '/assets/css' );

            /**
             * Global para el directorio de assets/css
             */
            if ( ! defined( 'ORIGEN_FONTS' ) ) define( 'ORIGEN_FONTS', get_template_directory() . '/assets/fonts' );

            /**
             * Global para el directorio de assets/css
             */
            if ( ! defined( 'ORIGEN_IMAGES' ) ) define( 'ORIGEN_IMAGES', get_template_directory() . '/assets/images' );

            /**
             * Global para el directorio de assets/css
             */
            if ( ! defined( 'ORIGEN_JS' ) ) define( 'ORIGEN_JS', get_template_directory() . '/assets/js' );

            /**
             * Definiendo globales del personalizador
             */
            $GLOBALS['customizer_sections']	= array();
            $GLOBALS['customizer_settings'] = array();
            $GLOBALS['customizer_panel']    = array();
            
            /**
             * Definiendo globales de las funciones generales
             */
            $GLOBALS['list_widgets'] = array();

        }


        /**
         * Incluye todos los archivos necesarios para que funcione el tema
         */
        public function include_files() {

            /**
             * Archivos para el personalizador
             */
            require get_template_directory() . '/inc/origen-customizer.php';

            /**
             * Funciones generales de Origen
             */
            require get_template_directory() . '/inc/origen-functions.php';

            /**
             * Funciones para los templates
             */
            require get_template_directory() . '/inc/origen-template-functions.php';

            /**
             * Funciones para los hooks de los templates
             */
            require get_template_directory() . '/inc/origen-template-hooks.php';

        }


        /**
         * Añadimos todas las configuraciones y soportes necesarios para el funcionamiento del tema
         */
        public function register_menus(){

            $this->register_menu( 'MenuPrincipal', __( 'Primary menu', 'origen' ) );

        }


        /**
         * Registrado de scripts básicos del tema
         */
        public function register_default_scripts() {
            // Fonts
            $this::enqueue_header_style( 'origen-google-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i|Open+Sans:400,400i,600,600i' );
            $this::enqueue_footer_style( 'origen_fontawesome', get_template_directory_uri() . '/fonts/fontawesome-free/css/all.css', array(), '5.12.1' );

            // CSS
            $this::enqueue_header_style( 'origen_style', get_template_directory_uri() . '/style.min.css', array(), ORIGEN_VERSION );

            // JS
            $this::enqueue_header_script( 'origen_jq', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array() );
            $this::enqueue_header_script( 'origen_menu', get_template_directory_uri() . '/js/menu.js', array() );
        }


        // ===== LOGIC OF THE CLASS =====


        /**
         * Añadimos todas las configuraciones y soportes necesarios para el funcionamiento del tema
         */
        public function setup(){

            /**
             * Hace compatible el tema con las traducciones en el direcotrio /languages/.
             */
            load_theme_textdomain( 'origen', get_template_directory() . '/languages/' );

            /**
             * Hace que WordPress controle el titulo del archivo en el navegador.
             *
             * @link https://codex.wordpress.org/Title_Tag
             */
            if ( apply_filters( 'origen_add_title_tag_theme_support', true ) ){
                add_theme_support( 'title-tag' );
            }

            /**
             * Añade a los posts el feed RSS por defecto.
             *
             * @link https://codex.wordpress.org/Automatic_Feed_Links
             */
            if ( apply_filters( 'origen_add_automatic_feed_links_theme_support', true )){
                add_theme_support( 'automatic-feed-links' );
            }

            /**
             * Permite añadir un logo personalizado en Apariencia > Encabezado
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            if ( apply_filters( 'origen_add_custom_logo_theme_support', true ) ){
                add_theme_support( 'custom-logo' );
            }

            /**
             * Habilita las imagenes destacadas.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            if ( apply_filters( 'origen_add_post_thubnails_theme_support', 'true' )) {
                add_theme_support( 'post-thumbnails' );
            }

            /**
             * Habilita más tipos de alineamiento para las imagenes en gutenberg.
             *
             * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment 
             */
            if ( apply_filters( 'origen_align-wide_theme_support', 'true' )){
                add_theme_support( 'align-wide' );
            }

            /**
             * Establece las dimensiones predeterminadas para la iamgen destacada.
             *
             * @link https://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
             */
            set_post_thumbnail_size(
                apply_filters( 'origen_post_thumbnail_size_width', '1920' ),
                apply_filters( 'origen_post_thumbnail_size_height', '500' )
            );

        }


        /**
         * Creación de los menús posteriormente registrados desde la clase
         */
        public function create_menus() {

            /**
             * Registra ubicaciones para menú
             *
             * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
             */
            register_nav_menus( apply_filters(
                'origen_register_nav_menus',
                $this->menus
            ) );

        }


        /**
         * Encolado de scripts y styles para el front-end
         */
        public function enqueue_front_scripts() {

            // Encola los scripts
            foreach ( $this->scripts as $script ) {
                wp_register_script( $script[0], $script[1], $script[2], $script[3], $script[4] );
                wp_enqueue_script( $script[0] );
            }

            // Encola los estilos del header
            foreach ( $this->styles as $style ) {
                if ( !$style[5] ) {
                    wp_register_style( $style[0], $style[1], $style[2], $style[3], $style[4] );
                    wp_enqueue_style( $style[0] );
                }
            }

        }


        /**
         * Encolado de scripts y styles para el administrador de WordPress
         */
        public function enqueue_admin_scripts() {

        }


        /**
         * Encolado de styles del footer
         */
        public function enqueue_footer_styles() {

            // Encola los estilos del footer
            foreach ( $this->styles as $style ) {
                if ( $style[5] ) {
                    wp_register_style( $style[0], $style[1], $style[2], $style[3], $style[4] );
                    wp_enqueue_style( $style[0] );
                }
            }

        }


        /**
         * Funciones para crear los menús
         */
        public function register_menu( string $location, string $description ) {

            $this->menus[ $location ] = $description;

        }
        

        /**
         * Funciones para encolar los scripts
         */
        public function enqueue_header_script( string $handle, string $src, $deps = array(), $ver = false ) {
            array_push( $this->scripts, array( $handle, $src, $deps, $ver, false ) );
        }
        public function enqueue_footer_script( string $handle, string $src, $deps = array(), $ver = false ) {
            array_push( $this->scripts, array( $handle, $src, $deps, $ver, true ) );
        }
        public function enqueue_header_style( string $handle, string $src, $deps = array(), $ver = false, $media = 'all' ) {
            array_push( $this->styles, array( $handle, $src, $deps, $ver, $media, false ) );
        }
        public function enqueue_footer_style( string $handle, string $src, $deps = array(), $ver = false, $media = 'all' ) {
            array_push( $this->styles, array( $handle, $src, $deps, $ver, $media, true ) );
        }


    }
}

return new Origen();