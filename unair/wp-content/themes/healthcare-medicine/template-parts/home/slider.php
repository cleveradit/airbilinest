<?php
/**
 * Template part for displaying slider section
 *
 * @package Healthcare Medicine
 * @subpackage healthcare_medicine
 */

?>
<?php $healthcare_medicine_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if ( get_theme_mod( 'online_pharmacy_slider_arrows') != '' ) : ?>

  <div id="slider" class="mt-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <?php 
        $online_pharmacy_slide_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $healthcare_medicine_mod = intval( get_theme_mod( 'online_pharmacy_slider_page' . $count ));
          if ( 'page-none-selected' != $healthcare_medicine_mod ) {
            $online_pharmacy_slide_pages[] = $healthcare_medicine_mod;
          }
        }
        if ( !empty($online_pharmacy_slide_pages) ) :
          $healthcare_medicine_args = array(
            'post_type' => 'page',
            'post__in' => $online_pharmacy_slide_pages,
            'orderby' => 'post__in'
          );
          $healthcare_medicine_query = new WP_Query( $healthcare_medicine_args );
          if ( $healthcare_medicine_query->have_posts() ) :
            $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php while ( $healthcare_medicine_query->have_posts() ) : $healthcare_medicine_query->the_post(); ?>
          <div class="carousel-item <?php if($i == 1) { echo 'active'; } ?>">
            <?php if ( has_post_thumbnail() ) { ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>"/>
            <?php } else { ?>
              <img src="<?php echo esc_url($healthcare_medicine_static_image); ?>" alt="<?php esc_attr_e('Default Image', 'healthcare-medicine'); ?>"/>
            <?php } ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 20 ) ); ?></p>
                <div class="more-btn mt-4">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Shop Now', 'healthcare-medicine'); ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; wp_reset_postdata(); ?>
      </div>
      <?php else : ?>
        <div class="no-postfound"><?php esc_html_e('No posts found', 'healthcare-medicine'); ?></div>
      <?php endif; endif; ?>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <i class="fas fa-angle-left" aria-hidden="true"></i>
        <span class="screen-reader-text"><?php echo esc_html('Previous', 'healthcare-medicine'); ?></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <i class="fas fa-angle-right" aria-hidden="true"></i>
        <span class="screen-reader-text"><?php echo esc_html('Next', 'healthcare-medicine'); ?></span>
      </button>
    </div>
    <div class="clearfix"></div>
  </div>

<?php endif; ?>
