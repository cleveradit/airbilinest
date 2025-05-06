<?php
function expert_healthcare_blog_setting( $wp_customize ) {

$wp_customize->register_control_type( 'Expert_Healthcare_Control_Upgrade' );

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
			'expert_healthcare_frontpage_sections', array(
				'priority' => 32,
				'title' => esc_html__( 'Frontpage Sections', 'expert-healthcare' ),
			)
		);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'expert_healthcare_slider_section', array(
			'title' => esc_html__( 'Slider Section', 'expert-healthcare' ),
			'priority' => 13,
			'panel' => 'expert_healthcare_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_slider_setting' , 
			array(
			'default' => true,
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_slider_section',
			'settings'    => 'expert_healthcare_slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Slider 1
	$wp_customize->add_setting( 
    	'expert_healthcare_slider1',
    	array(
			'default'           => get_page_id_by_slug('slider-page'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'expert_healthcare_slider1',
		array(
		    'label'   		=> __('Slider 1','expert-healthcare'),
		    'section'		=> 'expert_healthcare_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		

	// Slider 2
	$wp_customize->add_setting(
    	'expert_healthcare_slider2',
    	array(
			'default'           => get_page_id_by_slug('slider-page'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);

	$wp_customize->add_control( 
		'expert_healthcare_slider2',
		array(
		    'label'   		=> __('Slider 2','expert-healthcare'),
		    'section'		=> 'expert_healthcare_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// Slider 3
	$wp_customize->add_setting(
    	'expert_healthcare_slider3',
    	array(
			'default'           => get_page_id_by_slug('slider-page'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);

	$wp_customize->add_control( 
		'expert_healthcare_slider3',
		array(
		    'label'   		=> __('Slider 3','expert-healthcare'),
		    'section'		=> 'expert_healthcare_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
		'expert_healthcare_slider_call',
		array(
			'default'=> '',
			'sanitize_callback'	=> 'expert_healthcare_sanitize_phone_number'
		)
	);

	$wp_customize->add_control(
		'expert_healthcare_slider_call',array(
			'label'	=> __('Add Phone Number','expert-healthcare'),
			'section'=> 'expert_healthcare_slider_section',
			'type'=> 'text'
		)
	);

	$wp_customize->add_setting( 'expert_healthcare_upgrade_page_settings_3',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Healthcare_Control_Upgrade(
        $wp_customize, 'expert_healthcare_upgrade_page_settings_3',
            array(
                'priority'      => 200,
                'section'       => 'expert_healthcare_slider_section',
                'settings'      => 'expert_healthcare_upgrade_page_settings_3',
                'label'         => __( 'Expert Healthcare Pro comes with additional features.', 'expert-healthcare' ),
                'choices'       => array( __( '12+ Sections', 'expert-healthcare' ), __( 'One Click Demo Importer', 'expert-healthcare' ), __( 'Section Reordering Facility', 'expert-healthcare' ),__( 'Advance Typography', 'expert-healthcare' ),__( 'Easy Customization', 'expert-healthcare' ),__( '24x7 Support', 'expert-healthcare' ), )
            )
        )
    ); 

	/*=========================================
	Services We Provide Section
	=========================================*/

	$wp_customize->add_section(
		'expert_healthcare_booking_section', array(
			'title' => esc_html__( 'Services We Provide Section', 'expert-healthcare' ),
			'priority' => 14,
			'panel' => 'expert_healthcare_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_tourist_setting' , 
			array(
			'default' => 1,
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_tourist_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_slider_section',
			'settings'    => 'expert_healthcare_tourist_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
    	'expert_healthcare_section_title',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'expert_healthcare_section_title',
		array(
		    'label'   		=> __('Title','expert-healthcare'),
		    'section'		=> 'expert_healthcare_booking_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'expert_healthcare_section_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'expert_healthcare_section_text',
		array(
		    'label'   		=> __('Section Text','expert-healthcare'),
		    'section'		=> 'expert_healthcare_booking_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$expert_healthcare_args = array('numberposts' => -1);
	$post_list = get_posts($expert_healthcare_args);
	$s = 0;
	$pst_sls[]= __('Select','expert-healthcare');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 12; $s++ ) {
		$wp_customize->add_setting(
			'expert_healthcare_section_settigs'.$s,
			array(
				'sanitize_callback' => 'expert_healthcare_sanitize_choices',
			)
		);

		$wp_customize->add_control(
			'expert_healthcare_section_settigs'.$s,
			array(
				'type'    => 'select',
				'choices' => $pst_sls,
				'label' => __('Select post','expert-healthcare'),
				'section' => 'expert_healthcare_booking_section',
			)
		);
	}
	wp_reset_postdata();

	$wp_customize->add_setting( 'expert_healthcare_upgrade_page_settings_4',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Healthcare_Control_Upgrade(
        $wp_customize, 'expert_healthcare_upgrade_page_settings_4',
            array(
                'priority'      => 200,
                'section'       => 'expert_healthcare_booking_section',
                'settings'      => 'expert_healthcare_upgrade_page_settings_4',
                'label'         => __( 'Expert Healthcare Pro comes with additional features.', 'expert-healthcare' ),
                'choices'       => array( __( '12+ Sections', 'expert-healthcare' ), __( 'One Click Demo Importer', 'expert-healthcare' ), __( 'Section Reordering Facility', 'expert-healthcare' ),__( 'Advance Typography', 'expert-healthcare' ),__( 'Easy Customization', 'expert-healthcare' ),__( '24x7 Support', 'expert-healthcare' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_healthcare_blog_setting' );

// service selective refresh
function expert_healthcare_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'expert_healthcare_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'expert_healthcare_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'expert_healthcare_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'expert_healthcare_blog_section_partials' );

// blog_title
function expert_healthcare_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function expert_healthcare_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function expert_healthcare_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}