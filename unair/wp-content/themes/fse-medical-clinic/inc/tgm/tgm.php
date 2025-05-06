<?php
/**
 * Recommended plugins.
 */
	
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

function fse_medical_clinic_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Getwid – Gutenberg Blocks', 'fse-medical-clinic' ),
			'slug'             => 'getwid',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'      => esc_html__( 'WooCommerce', 'fse-medical-clinic' ),
			'slug'      => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	fse_medical_clinic_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'fse_medical_clinic_register_recommended_plugins' );