<?php

function expert_healthcare_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'expert_healthcare_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'expert-healthcare'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'expert_healthcare_footer_top',
        array(
            'title' 		=> __('Footer Widgets','expert-healthcare'),
			'panel'  		=> 'expert_healthcare_footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_footer_top',
			'settings'    => 'expert_healthcare_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_healthcare_upgrade_page_settings_1',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Healthcare_Control_Upgrade(
        $wp_customize, 'expert_healthcare_upgrade_page_settings_1',
            array(
                'priority'      => 200,
                'section'       => 'expert_healthcare_footer_top',
                'settings'      => 'expert_healthcare_upgrade_page_settings_1',
                'label'         => __( 'Expert Healthcare Pro comes with additional features.', 'expert-healthcare' ),
                'choices'       => array( __( '12+ Sections', 'expert-healthcare' ), __( 'One Click Demo Importer', 'expert-healthcare' ), __( 'Section Reordering Facility', 'expert-healthcare' ),__( 'Advance Typography', 'expert-healthcare' ),__( 'Easy Customization', 'expert-healthcare' ),__( '24x7 Support', 'expert-healthcare' ), )
            )
        )
    ); 

	// Footer Bottom // 
	$wp_customize->add_section(
        'expert_healthcare_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','expert-healthcare'),
			'panel'  		=> 'expert_healthcare_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_healthcare_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copyright', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_footer_bottom',
			'settings'    => 'expert_healthcare_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'expert_healthcare_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'expert_healthcare_footer_copyright',
		array(
		    'label'   		=> __('Copyright','expert-healthcare'),
		    'section'		=> 'expert_healthcare_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'expert_healthcare_copyright_alignment', array(
        'default'   => 'center',
        'sanitize_callback' => 'expert_healthcare_sanitize_copyright_position',
    ));

    $wp_customize->add_control( 'expert_healthcare_copyright_alignment', array(
        'label'    => __( 'Copyright Position', 'expert-healthcare' ),
        'section'  => 'expert_healthcare_footer_bottom',
        'settings' => 'expert_healthcare_copyright_alignment',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Align', 'expert-healthcare' ),
            'left'  => __( 'Left Align', 'expert-healthcare' ),
            'center'  => __( 'Center Align', 'expert-healthcare' ),
        ),
    ));

	$wp_customize->add_setting( 'expert_healthcare_upgrade_page_settings_2',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Healthcare_Control_Upgrade(
        $wp_customize, 'expert_healthcare_upgrade_page_settings_2',
            array(
                'priority'      => 200,
                'section'       => 'expert_healthcare_footer_bottom',
                'settings'      => 'expert_healthcare_upgrade_page_settings_2',
                'label'         => __( 'Expert Healthcare Pro comes with additional features.', 'expert-healthcare' ),
                'choices'       => array( __( '12+ Sections', 'expert-healthcare' ), __( 'One Click Demo Importer', 'expert-healthcare' ), __( 'Section Reordering Facility', 'expert-healthcare' ),__( 'Advance Typography', 'expert-healthcare' ),__( 'Easy Customization', 'expert-healthcare' ),__( '24x7 Support', 'expert-healthcare' ), )
            )
        )
    ); 
}
add_action( 'customize_register', 'expert_healthcare_footer' );

// Footer selective refresh
function expert_healthcare_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'expert_healthcare_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'expert_healthcare_footer_partials' );

// copyright_content
function expert_healthcare_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}