<?php
/**
 * FSE Medical Clinic functions and definitions
 *
 * @package fse_medical_clinic
 * @since 1.0
 */

if ( ! function_exists( 'fse_medical_clinic_support' ) ) :
	function fse_medical_clinic_support() {

		load_theme_textdomain( 'fse-medical-clinic', get_template_directory() . '/languages' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support('woocommerce');

		// Enqueue editor styles.
		add_editor_style(get_stylesheet_directory_uri() . '/assets/css/editor-style.css');

	}
endif;

add_action( 'after_setup_theme', 'fse_medical_clinic_support' );

if ( ! function_exists( 'fse_medical_clinic_styles' ) ) :
	function fse_medical_clinic_styles() {
		// Register theme stylesheet.
		$fse_medical_clinic_theme_version = wp_get_theme()->get( 'Version' );

		$fse_medical_clinic_version_string = is_string( $fse_medical_clinic_theme_version ) ? $fse_medical_clinic_theme_version : false;
		wp_enqueue_style(
			'fse-medical-clinic-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$fse_medical_clinic_version_string
		);

		// Enqueue the 'custom.js' script
		wp_enqueue_script( 'fse-medical-clinic-script', 
			get_template_directory_uri() . '/assets/js/custom.js', 
			array( 'jquery' ), 
			$fse_medical_clinic_version_string, true 
		);

		wp_enqueue_style( 'dashicons' );

		//font-awesome
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/fontawesome/css/all.css'
			, array(), '6.7.0' );
	}
endif;

add_action( 'wp_enqueue_scripts', 'fse_medical_clinic_styles' );


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// TGM Plugin
require get_template_directory() . '/inc/tgm/tgm.php';
