<?php

/**
 * Archivos para el personalizador
 */

if ( ! function_exists('origen_theme_customizer')){

	function origen_theme_customizer( $wp_customize){

		require_once get_template_directory() . "/inc/libraries/mwm-custom-controls/custom-controls.php";
		$wp_customize->add_panel( 'origen_panel', array(
			'title' => __( 'Origen Theme Setup', 'origen' ),
			'description' => __( 'Here you can setup all the theme settings', 'origen' ),
			'priority' => 160,
			'capability' => 'edit_theme_options',
		));

		// SECCION GOOGLE ANALYTICS
		$wp_customize->add_section( 'origen_layout' , array(
			'title' => __( 'Origen Page Layout', 'origen' ),
			'panel' => 'origen_panel',
			'priority' => 1,
			'capability' => 'edit_theme_options',
		));

		$wp_customize->add_setting( 'origen_page_layout', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'origen_customizer_sanitize_select',
			'default' => 'full_width',
		) );
		  
		$wp_customize->add_control( 'origen_page_layout', array(
			'type' => 'select',
			'section' => 'origen_layout', // Add a default or your own section
			'label' => __( 'Page Layout Type' ),
			'description' => __( 'You can select Full Width, Left Sidebar or Right Sidebar.', 'origen' ),
			'choices' => array(
				'full_width' => __( 'Full width', 'origen' ),
				'sidebar_r' => __( 'Right Sidebar', 'origen' ),
				'sidebar_l' => __( 'Left Sidebar', 'origen' ),
			),
		) );

		foreach ( $GLOBALS['customizer_panel'] as $panel) {
			$wp_customize->add_panel( $panel[0], array(
				'title' => __( $panel[1], 'origen' ),
				'description' => __( $panel[2], 'origen' ),
				'priority' => $panel[3],
				'capability' => 'edit_theme_options',
			));
		}
		foreach ( $GLOBALS['customizer_sections'] as $section) {
			$wp_customize->add_section( trim($section[0]) , array(
				'title' => __( $section[0], 'origen' ),
				'panel' => $section[1],
				'priority' => 1,
				'capability' => 'edit_theme_options',
			));
		}

		foreach ( $GLOBALS['customizer_settings'] as $setting){

			if ( $setting[2] == 'select'){
				$wp_customize->add_setting( trim($setting[0]), array(
					'type' => 'theme_mod',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'origen_customizer_sanitize_select',
					'default' => '',
				  ) );
				  $wp_customize->add_control( trim($setting[0]), array(
					  'type' => 'select',
					  'section' => $setting[1], // Add a default or your own section
					  'label' => __( $setting[0] ),
					  'description' => __('You can select Full Width, Left Sidebar or Right Sidebar.', 'origen' ),
					  'choices' => $setting[3],
					) );
				}else{
					$wp_customize->add_setting( trim($setting[0]), array(
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'default' => '',
					) );

					if ( $setting[2] == 'text'){
						$wp_customize->add_control(trim($setting[0]), array(
							'label' => __( $setting[0], 'origen' ),
							'section' => $setting[1],
							'type' => 'text',
							'input_attrs' => array(
								'placeholder' => $setting[3],
							),
						));
					}
				}
		  	}


		function origen_customizer_sanitize_select( $input, $setting ) {
			
			// Ensure input is a slug.
			$input = sanitize_key( $input );
			
			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;
			
			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	}
	add_action( 'customize_register', 'origen_theme_customizer' );
	
}