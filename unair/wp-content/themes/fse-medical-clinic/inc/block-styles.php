<?php
/**
 * Block Styles
 *
 * @package fse_medical_clinic
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function fse_medical_clinic_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'fse-medical-clinic-padding-0',
				'label' => esc_html__( 'No Padding', 'fse-medical-clinic' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'fse-medical-clinic-post-author-card',
				'label' => esc_html__( 'Theme Style', 'fse-medical-clinic' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'fse-medical-clinic-button',
				'label'        => esc_html__( 'Plain', 'fse-medical-clinic' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'fse-medical-clinic-post-comments',
				'label'        => esc_html__( 'Theme Style', 'fse-medical-clinic' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'fse-medical-clinic-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'fse-medical-clinic' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'fse-medical-clinic-wp-table',
				'label'        => esc_html__( 'Theme Style', 'fse-medical-clinic' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'fse-medical-clinic-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'fse-medical-clinic' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'fse-medical-clinic-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'fse-medical-clinic' ),
			)
		);
	}
	add_action( 'init', 'fse_medical_clinic_register_block_styles' );
}
