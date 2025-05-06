<?php


$online_pharmacy_tp_theme_css = '';

//theme color
$online_pharmacy_tp_color_option = get_theme_mod('online_pharmacy_tp_color_option');

if($online_pharmacy_tp_color_option != false){
$online_pharmacy_tp_theme_css .='.next.page-numbers:hover, .page-numbers:hover,.wc-block-cart__submit-container a:hover,.top-header,.prev.page-numbers, .next.page-numbers,.page-numbers,span.meta-nav,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,nav.woocommerce-MyAccount-navigation ul li:hover,#footer,#theme-sidebar button[type="submit"]:hover, #footer button[type="submit"]:hover, #comments input[type="submit"]:hover, span.meta-nav:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.book-tkt-btn a:hover, .more-btn a:hover,.main-navigation ul ul, .product-content{';
$online_pharmacy_tp_theme_css .='background-color: '.esc_attr($online_pharmacy_tp_color_option).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_option != false){
$online_pharmacy_tp_theme_css .='#footer h1.wp-block-heading, .wp-block-search .wp-block-search__label, #footer h3.wp-block-heading,#footer h4.wp-block-heading, #footer h5.wp-block-heading, #footer h6.wp-block-heading ,
#theme-sidebar h3, #theme-sidebar h1.wp-block-heading, #theme-sidebar h2.wp-block-heading, #theme-sidebar h3.wp-block-heading,#theme-sidebar h4.wp-block-heading, #theme-sidebar h5.wp-block-heading, #theme-sidebar h6.wp-block-heading, .search-box i,.main-navigation a:hover,.headerbox i,.box-content a, #theme-sidebar .textwidget a, #footer .textwidget a, .comment-body a, .entry-content a, .entry-summary a,a.page-numbers:hover,#theme-sidebar h3,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.headerbox i:hover, .headerbox i:hover:after,#about h3,#about p i, .readmore-btn a,a:hover,.main-navigation a:hover,#theme-sidebar h3,#theme-sidebar .textwidget a, #footer .textwidget a, .comment-body a, .entry-content a, .entry-summary a,h1, h2, h3, h4, h5, h6,.logo h1 a,.main-navigation a,.box-info i, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_tp_color_option).';';
$online_pharmacy_tp_theme_css .='}';
}
// second color
$online_pharmacy_tp_color_sec = get_theme_mod('online_pharmacy_tp_color_sec');

if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='.next.page-numbers, .page-numbers,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.wc-block-cart__submit-container a,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.book-tkt-btn a,.more-btn a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.site-info,#comments input[type="submit"],#theme-sidebar button[type="submit"], #footer button[type="submit"],button[type="submit"], #theme-sidebar .wp-block-search .wp-block-search__label:before,#theme-sidebar h3:before, #theme-sidebar h1.wp-block-heading:before, #theme-sidebar h2.wp-block-heading:before, #theme-sidebar h3.wp-block-heading:before,#theme-sidebar h4.wp-block-heading:before, #theme-sidebar h5.wp-block-heading:before, #theme-sidebar h6.wp-block-heading:before{';
$online_pharmacy_tp_theme_css .='background-color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='#footer li a:hover,a,a.added_to_cart.wc-forward,.readmore-btn a:hover,.site-info a:hover,#theme-sidebar a:hover,.media-links i:hover, .top-header a:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, #footer .tagcloud a:hover,#footer p.wp-block-tag-cloud a:hover,#theme-sidebar .tagcloud a:hover, #slider .inner_carousel h1 a:hover, .logo h1 a:hover, .logo p a:hover{';
$online_pharmacy_tp_theme_css .='color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='#footer .tagcloud a:hover,#theme-sidebar .widget_tag_cloud a:hover,.readmore-btn a:hover, #footer .tagcloud a:hover,#footer p.wp-block-tag-cloud a:hover,#theme-sidebar .tagcloud a:hover{';
$online_pharmacy_tp_theme_css .='border-color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='.page-box,#theme-sidebar section{';
$online_pharmacy_tp_theme_css .='border-left-color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_color_sec != false){
$online_pharmacy_tp_theme_css .='.page-box,#theme-sidebar section{';
$online_pharmacy_tp_theme_css .='border-bottom-color: '.esc_attr($online_pharmacy_tp_color_sec).';';
$online_pharmacy_tp_theme_css .='}';
}
//preloader

$online_pharmacy_tp_preloader_color1_option = get_theme_mod('online_pharmacy_tp_preloader_color1_option');
$online_pharmacy_tp_preloader_color2_option = get_theme_mod('online_pharmacy_tp_preloader_color2_option');
$online_pharmacy_tp_preloader_bg_color_option = get_theme_mod('online_pharmacy_tp_preloader_bg_color_option');

if($online_pharmacy_tp_preloader_color1_option != false){
$online_pharmacy_tp_theme_css .='.center1{';
	$online_pharmacy_tp_theme_css .='border-color: '.esc_attr($online_pharmacy_tp_preloader_color1_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_color1_option != false){
$online_pharmacy_tp_theme_css .='.center1 .ring::before{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_preloader_color1_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_color2_option != false){
$online_pharmacy_tp_theme_css .='.center2{';
	$online_pharmacy_tp_theme_css .='border-color: '.esc_attr($online_pharmacy_tp_preloader_color2_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_color2_option != false){
$online_pharmacy_tp_theme_css .='.center2 .ring::before{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_preloader_color2_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}
if($online_pharmacy_tp_preloader_bg_color_option != false){
$online_pharmacy_tp_theme_css .='.loader{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_preloader_bg_color_option).';';
$online_pharmacy_tp_theme_css .='}';
}

// footer-bg-color
$online_pharmacy_tp_footer_bg_color_option = get_theme_mod('online_pharmacy_tp_footer_bg_color_option');

if($online_pharmacy_tp_footer_bg_color_option != false){
$online_pharmacy_tp_theme_css .='#footer{';
	$online_pharmacy_tp_theme_css .='background: '.esc_attr($online_pharmacy_tp_footer_bg_color_option).' !important;';
$online_pharmacy_tp_theme_css .='}';
}

//footer image
$online_pharmacy_footer_widget_image = get_theme_mod('online_pharmacy_footer_widget_image');
if($online_pharmacy_footer_widget_image != false){
$online_pharmacy_tp_theme_css .='#footer{';
	$online_pharmacy_tp_theme_css .='background: url('.esc_attr($online_pharmacy_footer_widget_image).');';
$online_pharmacy_tp_theme_css .='}';
}


//======================= slider Content layout ===================== //

$healthcare_medicine_slider_content_layout = get_theme_mod('healthcare_medicine_slider_content_layout', 'LEFT-ALIGN'); 
$online_pharmacy_tp_theme_css .= '#slider .carousel-caption{';
switch ($healthcare_medicine_slider_content_layout) {
    case 'LEFT-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:left; right: 45%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:center; left: 15%; right: 15%';
        break;
    case 'RIGHT-ALIGN':
        $online_pharmacy_tp_theme_css .= 'text-align:right; left: 45%; right: 15%';
        break;
    default:
        $online_pharmacy_tp_theme_css .= 'text-align:left; right: 45%; left: 15%';
        break;
}
$online_pharmacy_tp_theme_css .= '}';