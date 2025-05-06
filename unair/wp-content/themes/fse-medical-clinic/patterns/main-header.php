<?php
 /**
  * Title: Main Header
  * Slug: fse-medical-clinic/main-header
  */
?>

<!-- wp:group {"className":"top-header","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"0","right":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained","contentSize":"85%"}} -->
<div class="wp-block-group top-header has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"32%","className":"time-box"} -->
<div class="wp-block-column is-vertically-aligned-center time-box" style="flex-basis:32%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":24,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo get_parent_theme_file_uri( '/assets/images/clock.png' ); ?>" alt="" class="wp-image-24"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"12px"}},"textColor":"background"} -->
<p class="has-background-color has-text-color has-link-color" style="font-size:12px"><?php esc_html_e('Mon - Fri 10:00 AM - 09:00 PM / Sunday 11:00 AM - 07:00 PM','fse-medical-clinic'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"28%","className":"loc-box"} -->
<div class="wp-block-column is-vertically-aligned-center loc-box" style="flex-basis:28%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":29,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo get_parent_theme_file_uri( '/assets/images/location.png' ); ?>" alt="" class="wp-image-29"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"12px"}},"textColor":"background"} -->
<p class="has-background-color has-text-color has-link-color" style="font-size:12px"><?php esc_html_e('1901 Thornridge Cir. Shiloh, Hawaii 81063','fse-medical-clinic'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"17%","className":"call-box"} -->
<div class="wp-block-column is-vertically-aligned-center call-box" style="flex-basis:17%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":28,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo get_parent_theme_file_uri( '/assets/images/call.png' ); ?>" alt="" class="wp-image-28"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"12px"}},"textColor":"background"} -->
<p class="has-background-color has-text-color has-link-color" style="font-size:12px"><?php esc_html_e('(406) 555-0120','fse-medical-clinic'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"23%","className":"mail-box"} -->
<div class="wp-block-column is-vertically-aligned-center mail-box" style="flex-basis:23%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"id":27,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo get_parent_theme_file_uri( '/assets/images/mail.png' ); ?>" alt="" class="wp-image-27"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"12px"}},"textColor":"background"} -->
<p class="has-background-color has-text-color has-link-color" style="font-size:12px"><?php esc_html_e('support@example.com','fse-medical-clinic'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lower-header","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}}},"backgroundColor":"background","layout":{"type":"constrained","contentSize":"85%"}} -->
<div class="wp-block-group lower-header has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"20%","className":"logo-box"} -->
<div class="wp-block-column is-vertically-aligned-center logo-box" style="flex-basis:20%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo /-->

<!-- wp:site-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"0.7","fontSize":"30px"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"padding":{"top":"var:preset|spacing|30"}}},"textColor":"foreground","fontFamily":"katibeh"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"55%","className":"nav-box"} -->
<div class="wp-block-column is-vertically-aligned-center nav-box" style="flex-basis:55%"><!-- wp:navigation {"textColor":"foreground","overlayBackgroundColor":"background","overlayTextColor":"foreground","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.3"},"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Services","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Pages","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blog","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"10%","className":"cart-box"} -->
<div class="wp-block-column is-vertically-aligned-center cart-box" style="flex-basis:10%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/mini-cart {"iconColor":{"slug":"primary","color":"#4F8BFF","name":"Primary","class":"has-primary-icon-color"},"productCountColor":{"slug":"secondary","color":"#060B30","name":"Secondary","class":"has-secondary-product-count-color"}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"15%","className":"phone-box"} -->
<div class="wp-block-column is-vertically-aligned-center phone-box" style="flex-basis:15%"><!-- wp:group {"className":"phone-inner","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"5px"}},"backgroundColor":"secondary","layout":{"type":"default"}} -->
<div class="wp-block-group phone-inner has-secondary-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"typography":{"lineHeight":"1.3"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="line-height:1.3"><!-- wp:image {"id":74,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo get_parent_theme_file_uri( '/assets/images/call2.png' ); ?>" alt="" class="wp-image-74"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"500"}},"textColor":"background"} -->
<p class="has-background-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:500"><?php esc_html_e('0034-123-123','fse-medical-clinic'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->