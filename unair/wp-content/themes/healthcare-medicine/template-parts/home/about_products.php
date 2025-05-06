<?php
/**
 * Template part for displaying about section
 *
 * @package Healthcare Medicine
 * @subpackage healthcare_medicine
 */

?>
 <?php if( get_theme_mod( 'healthcare_medicine_about_section_show_hide', true) != '') { ?>
<section id="abt-product" class="py-5">
  <div class="container">
    <?php if( get_theme_mod( 'healthcare_medicine_about_title' ) != '') { ?>
      <h2 class="mb-5"><?php echo esc_html( get_theme_mod('healthcare_medicine_about_title','')); ?></h2>
    <?php } ?>
    <div class="row">
      <?php
        $healthcare_medicine_product_cat = get_theme_mod('healthcare_medicine_best_product_category');
        if ( class_exists( 'WooCommerce' ) ) {
        $healthcare_medicine_args = array(
          'post_type' => 'product',
          'posts_per_page' => 20,
          'product_cat' => $healthcare_medicine_product_cat,
          'order' => 'ASC'
        );?>
        <?php $healthcare_medicine_loop = new WP_Query( $healthcare_medicine_args );
        while ( $healthcare_medicine_loop->have_posts() ) : $healthcare_medicine_loop->the_post(); global $product; ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="product-details mb-4">
              <div class="product-img">
                <?php if (has_post_thumbnail( $healthcare_medicine_loop->post->ID )) echo get_the_post_thumbnail($healthcare_medicine_loop->post->ID, ''); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
              </div>
              <div class="product-content">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8 align-self-center">
                    <h3><a href="<?php echo esc_url(get_permalink( $healthcare_medicine_loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                    <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $healthcare_medicine_loop->post, $product ); } ?>
                  </div>
                  <div class="col-md-4 col-md-4 col-sm-4 col-4 align-self-center ps-0">
                    <span><?php esc_attr( apply_filters( 'woocommerce_product_price_class', '' ) ); ?><?php echo $product->get_price_html(); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
