<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'healthcare_medicine_after_setup_theme' );
function healthcare_medicine_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'healthcare-medicine-featured-image', 2000, 1200, true );
    add_image_size( 'healthcare-medicine-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function healthcare_medicine_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'healthcare-medicine' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'healthcare-medicine' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'healthcare-medicine' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'healthcare-medicine' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'healthcare-medicine' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'healthcare-medicine' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'healthcare-medicine' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'healthcare-medicine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'healthcare_medicine_widgets_init' );

// enqueue styles for child theme
function healthcare_medicine_enqueue_styles() {

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'healthcare-medicine-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'healthcare-medicine-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('online-pharmacy-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('online-pharmacy-child-style', get_stylesheet_directory_uri() .'/style.css', array('online-pharmacy-style'));

    require get_theme_file_path( '/tp-theme-color.php' );
        wp_add_inline_style( 'online-pharmacy-child-style',$online_pharmacy_tp_theme_css );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );

    $online_pharmacy_body_font_family = get_theme_mod('online_pharmacy_body_font_family', '');

    $online_pharmacy_heading_font_family = get_theme_mod('online_pharmacy_heading_font_family', '');

    $online_pharmacy_menu_font_family = get_theme_mod('online_pharmacy_menu_font_family', '');

    $online_pharmacy_tp_theme_css = '
        body{
            font-family: '.esc_html($online_pharmacy_body_font_family).'!important;
        }
        p.simplep{
            font-family: '.esc_html($online_pharmacy_body_font_family).'!important;
        }
        .more-btn a{
            font-family: '.esc_html($online_pharmacy_body_font_family).'!important;
        }
        h1,h2.woocommerce-loop-product__title,.woocommerce div.product .product_title {
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h2{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h3{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h4{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h5{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        h6{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        #theme-sidebar .wp-block-search .wp-block-search__label{
            font-family: '.esc_html($online_pharmacy_heading_font_family).'!important;
        }
        .main-navigation a {
            font-family: '.esc_html($online_pharmacy_menu_font_family).'!important;
        }
    ';
    wp_add_inline_style('online-pharmacy-style', $online_pharmacy_tp_theme_css);
}
add_action('wp_enqueue_scripts', 'healthcare_medicine_enqueue_styles');

function healthcare_medicine_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'healthcare-medicine-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'healthcare_medicine_admin_scripts' );

    function healthcare_medicine_header_style() {
 if ( get_header_image() ) :
 $healthcare_medicine_custom_header = "
 .headerbox{
 background-image:url('".esc_url(get_header_image())."');
 background-position: center top;
 background-size: cover; }";
 wp_add_inline_style( 'healthcare-medicine-child-style', $healthcare_medicine_custom_header );
 endif;
}
add_action( 'wp_enqueue_scripts', 'healthcare_medicine_header_style' );

require get_theme_file_path( '/customizer/customize-control-toggle.php' );

function healthcare_medicine_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_NAME' ) ) {
    define( 'ONLINE_PHARMACY_PRO_THEME_NAME', esc_html__( 'Healthcare Pro', 'healthcare-medicine' ));
}
if ( ! defined( 'ONLINE_PHARMACY_PRO_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_PRO_THEME_URL', 'https://www.themespride.com/products/medicine-wordpress-theme' );
}
if ( ! defined( 'ONLINE_PHARMACY_FREE_THEME_URL' ) ) {
	define( 'ONLINE_PHARMACY_FREE_THEME_URL', 'https://www.themespride.com/products/free-healthcare-wordpress-theme' );
}
if ( ! defined( 'ONLINE_PHARMACY_DEMO_THEME_URL' ) ) {
	define( 'ONLINE_PHARMACY_DEMO_THEME_URL', 'https://page.themespride.com/healthcare-medicine-pro/' );
}
if ( ! defined( 'ONLINE_PHARMACY_DOCS_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/healthcare-medicine/' );
}
if ( ! defined( 'ONLINE_PHARMACY_DOCS_URL' ) ) {
	define( 'ONLINE_PHARMACY_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/healthcare-medicine/'));
}
if ( ! defined( 'ONLINE_PHARMACY_RATE_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_RATE_THEME_URL', 'https://wordpress.org/support/theme/healthcare-medicine/reviews/#new-post' );
}
if ( ! defined( 'ONLINE_PHARMACY_SUPPORT_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/healthcare-medicine' );
}
if ( ! defined( 'ONLINE_PHARMACY_CHANGELOG_THEME_URL' ) ) {
    define( 'ONLINE_PHARMACY_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}

define('HEALTHCARE_MEDICINE_PHARMACY_CREDIT',__('https://www.themespride.com/products/free-healthcare-wordpress-theme','healthcare-medicine') );
if ( ! function_exists( 'healthcare_medicine_credit' ) ) {
    function healthcare_medicine_credit(){
        echo "<a href=".esc_url(HEALTHCARE_MEDICINE_PHARMACY_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('online_pharmacy_footer_text',__('Healthcare Medicine WordPress Theme','healthcare-medicine')))."</a>";
    }
}
