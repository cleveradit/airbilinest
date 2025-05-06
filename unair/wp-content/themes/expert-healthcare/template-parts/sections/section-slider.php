<?php 
  $expert_healthcare_slider = get_theme_mod('expert_healthcare_slider_setting',true);
  
  if ($expert_healthcare_slider == '1') :
?>

<section id="slider-section" class="slider-area">
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <?php
      // Define an array to hold selected slider pages
      $expert_healthcare_pages = array();

      // Loop through customizer settings to collect selected pages
      for ($count = 1; $count <= 3; $count++) {
          $mod = intval(get_theme_mod('expert_healthcare_slider' . $count));
          if ($mod && $mod !== 'page-none-selected') {
              $expert_healthcare_pages[] = $mod;
          }
      }

      // Fallback to 'slider-page' if no pages are selected
      if (empty($expert_healthcare_pages)) {
          $expert_healthcare_default_slider_page = get_page_id_by_slug('slider-page');
          if ($expert_healthcare_default_slider_page > 0) {
              $expert_healthcare_pages[] = $expert_healthcare_default_slider_page;
          }
      }

      if( !empty($expert_healthcare_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $expert_healthcare_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
        <div class="row">
          <div class="col-lg-7 col-md-7 col-12">
            <div class="carousel-caption">
              <div class="inner_carousel">
                <div class="slidercontent-bg">
                  <h1 class="text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
                </div>
                <div class="read-btn mt-md-4 mt-3">
                  <a href="<?php the_permalink(); ?>"><?php echo esc_html('MAKE APPOINTMENT','expert-healthcare'); ?></a>
                </div>
                <div class="slider-call mt-4">
                  <?php if( get_theme_mod( 'expert_healthcare_slider_call' ) != '') { ?>
                    <a class="phn" href="tel:<?php echo esc_url( get_theme_mod('expert_healthcare_slider_call','' )); ?>"><i class="fas fa-phone-alt me-3"></i><?php echo esc_html( get_theme_mod('expert_healthcare_slider_call','')); ?></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-12 slider-img-col">
            <div class="sliderimg">
              <?php if (has_post_thumbnail()) { ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" class="masked-img"/>
              <?php } else { ?>
                <div class="slider-color-box"></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
    <i class="fas fa-angle-left" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Previous','expert-healthcare'); ?></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
    <i class="fas fa-angle-right" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Next','expert-healthcare'); ?></span>
    </button>
  </div>
</section>
<?php endif; ?>