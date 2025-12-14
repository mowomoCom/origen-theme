<?php

// Security
if (!defined('ABSPATH')) exit;

if( class_exists( 'WP_Customize_Control' ) ) {

	class origen_custom_panel extends WP_Customize_Panel {

		public $panel;
	
		public $type = 'origen_custom_panel';
	
		public function json() {
		  	$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
		  	$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
		  	$array['content'] = $this->get_content();
		  	$array['active'] = $this->active();
		  	$array['instanceNumber'] = $this->instance_number;
	
		  	return $array;
		}
	}

	class origen_custom_section extends WP_Customize_Section {

		public $section;
	
		public $type = 'origen_custom_section';
	
		public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
		
			if ( $this->panel ) {
				$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
				$array['customizeAction'] = 'Customizing';
			}
	
		  	return $array;
		}
	}
	if( ! class_exists( 'origen_slider_control' ) ) {

		class origen_slider_control extends WP_Customize_Control {

			/**
			 * The type of control being rendered
			 */
			public $type = 'slider-control';

			public function __construct( $manager, $id, $args = array() ) {
				parent::__construct( $manager, $id, $args );
				$defaults = array(
					'min' => 0,
					'max' => 100,
					'step' => 1
				);
				$args = wp_parse_args( $args, $defaults );

				$this->min = $args['min'];
				$this->max = $args['max'];
				$this->step = $args['step'];
			}
			
			/**
			 * Render the control in the customizer
			 */
			public function render_content() {
			?>
				<label class="origen-custom-controls__container">
					<span class="origen-custom-controls__title"><strong><?php echo esc_html( $this->label ); ?></strong></span>
					<input class='origen-custom-controls__range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
					<input class="origen-custom-controls__input-number" onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='number' value='<?php echo esc_attr( $this->value() ); ?>'>
				</label>
			<?php
			}
		}

	}

	// Enqueue our scripts and styles
	function origen_customize_custom_controls_scripts() {
		wp_enqueue_script( 'origen-customize-controls', get_template_directory_uri() . '/inc/core/origen-custom-controls/assets/js/customizer-script.js', array('jquery'), '1.0', true );
	}
	
	add_action( 'customize_controls_enqueue_scripts', 'origen_customize_custom_controls_scripts' );
	
	function origen_customize_custom_controls_styles() {
		wp_enqueue_style( 'pe-customize-controls', get_template_directory_uri() . '/inc/core/origen-custom-controls/assets/css/styles.min.css', array(), '1.0' );
	}
	
	add_action( 'customize_controls_print_styles', 'origen_customize_custom_controls_styles' );
}