<?php

function healthcare_medicine_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'online_pharmacy_footer_widget_image' );
    $wp_customize->remove_control( 'online_pharmacy_footer_widget_image' );
    $wp_customize->remove_setting( 'online_pharmacy_slider_content_layout' );
    $wp_customize->remove_control( 'online_pharmacy_slider_content_layout' );

}
add_action( 'customize_register', 'healthcare_medicine_remove_customize_register', 11 );

function healthcare_medicine_customize_register( $wp_customize ) {

    // Register the custom control type.
    $wp_customize->register_control_type( 'Healthcare_Medicine_Toggle_Control' );



    $wp_customize->add_setting('healthcare_medicine_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'online_pharmacy_sanitize_choices'
    ));
    $wp_customize->add_control('healthcare_medicine_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'healthcare-medicine'),
        'section' => 'online_pharmacy_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','healthcare-medicine'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','healthcare-medicine'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','healthcare-medicine'),
            
            
        ),
    ) );

    // About Product
    $wp_customize->add_section('healthcare_medicine_about_section',array(
        'title' => __('About Product Settings','healthcare-medicine'),
        'priority'  => 17,
        'panel' => 'online_pharmacy_panel_id'
    ));

    $wp_customize->add_setting( 'healthcare_medicine_about_section_show_hide', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'online_pharmacy_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Healthcare_Medicine_Toggle_Control( $wp_customize, 'healthcare_medicine_about_section_show_hide', array(
        'label'       => esc_html__( 'Show / Hide section', 'healthcare-medicine' ),
        'section'     => 'healthcare_medicine_about_section',
        'type'        => 'toggle',
        'settings'    => 'healthcare_medicine_about_section_show_hide',
    ) ) );

    $wp_customize->add_setting('healthcare_medicine_about_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('healthcare_medicine_about_title',array(
        'label' => __('Title','healthcare-medicine'),
        'section'=> 'healthcare_medicine_about_section',
        'type'=> 'text'
    ));

    $healthcare_medicine_args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories($healthcare_medicine_args);
    $cat_posts = array();
    $m = 0;
    $cat_posts[]='Select';
    foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
            $m++;
        }
        $cat_posts[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('healthcare_medicine_best_product_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'healthcare_medicine_sanitize_select',
    ));
    $wp_customize->add_control('healthcare_medicine_best_product_category',array(
        'type'    => 'select',
        'choices' => $cat_posts,
        'label' => __('Select category to display products ','healthcare-medicine'),
        'section' => 'healthcare_medicine_about_section',
    ));
}
add_action( 'customize_register', 'healthcare_medicine_customize_register' );
