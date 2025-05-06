<?php
function expert_healthcare_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_healthcare_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Option', 'expert-healthcare' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_healthcare_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Option', 'expert-healthcare' ),
			'priority' => 1,
			'panel' => 'expert_healthcare_sidebar',
		)
	);
	
	// Archive Post Settings 
	$wp_customize->add_setting(
		'archive_post_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_healthcare_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'archive_post_settings',
		array(
			'type' => 'hidden',
			'label' => __('All Sidebar Setting','expert-healthcare'),
			'section' => 'expert_healthcare_sidebar_settings',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_sidebar_settings',
			'settings'    => 'expert_healthcare_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_sidebar_settings',
			'settings'    => 'expert_healthcare_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_sidebar_settings',
			'settings'    => 'expert_healthcare_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_sidebar_settings',
			'settings'    => 'expert_healthcare_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_sidebar_settings',
			'settings'    => 'expert_healthcare_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_sidebar_settings',
			'settings'    => 'expert_healthcare_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_healthcare_sidebar_position', array(
        'default'   => 'right',
        'sanitize_callback' => 'expert_healthcare_sanitize_sidebar_position',
    ));

    $wp_customize->add_control( 'expert_healthcare_sidebar_position', array(
        'label'    => __( 'Sidebar Position', 'expert-healthcare' ),
        'section'  => 'expert_healthcare_sidebar_settings',
        'settings' => 'expert_healthcare_sidebar_position',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Sidebar', 'expert-healthcare' ),
            'left'  => __( 'Left Sidebar', 'expert-healthcare' ),
        ),
    ));

	 $wp_customize->add_setting( 'expert_healthcare_upgrade_page_settings_15',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Healthcare_Control_Upgrade(
        $wp_customize, 'expert_healthcare_upgrade_page_settings_15',
            array(
                'priority'      => 200,
                'section'       => 'expert_healthcare_sidebar_settings',
                'settings'      => 'expert_healthcare_upgrade_page_settings_15',
                'label'         => __( 'Expert Healthcare Pro comes with additional features.', 'expert-healthcare' ),
                'choices'       => array( __( '12+ Sections', 'expert-healthcare' ), __( 'One Click Demo Importer', 'expert-healthcare' ), __( 'Section Reordering Facility', 'expert-healthcare' ),__( 'Advance Typography', 'expert-healthcare' ),__( 'Easy Customization', 'expert-healthcare' ),__( '24x7 Support', 'expert-healthcare' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_healthcare_sidebar_setting' );