<?php
/**
 * Block Patterns
 *
 * @package fse_medical_clinic
 * @since 1.0
 */

function fse_medical_clinic_register_block_patterns() {
	$block_pattern_categories = array(
		'fse-medical-clinic' => array( 'label' => esc_html__( 'FSE Medical Clinic', 'fse-medical-clinic' ) ),
		'pages' => array( 'label' => esc_html__( 'Pages', 'fse-medical-clinic' ) ),
	);

	$block_pattern_categories = apply_filters( 'fse_medical_clinic_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'fse_medical_clinic_register_block_patterns', 9 );