<header class="main-header">
<?php 
  $expert_healthcare_header = get_theme_mod('expert_healthcare_header_setting','1');
  
  if($expert_healthcare_header == '1') {
?>
  <div class="upper-header-area">
  	<div class="container">
    	<?php 
    	        $expert_healthcare_header_search_setting = get_theme_mod('expert_healthcare_header_search_setting');
    	        $expert_healthcare_topheader_social_media_setting = get_theme_mod('expert_healthcare_topheader_social_media_setting','#');
				$expert_healthcare_topheader_social_media_facebook = get_theme_mod('expert_healthcare_topheader_social_media_facebook','#');
				$expert_healthcare_topheader_social_media_twitter = get_theme_mod('expert_healthcare_topheader_social_media_twitter','#');
				$expert_healthcare_topheader_social_media_instagram = get_theme_mod('expert_healthcare_topheader_social_media_instagram','#');
				$expert_healthcare_topheader_social_media_linkedin = get_theme_mod('expert_healthcare_topheader_social_media_linkedin','#');
				$expert_healthcare_topheader_social_media_youtube = get_theme_mod('expert_healthcare_topheader_social_media_youtube','#');

				$expert_healthcare_topheader_email = get_theme_mod( 'expert_healthcare_topheader_email' );
				$expert_healthcare_topheader_phoneno = get_theme_mod( 'expert_healthcare_topheader_phoneno' );

				$expert_healthcare_topheader_button_text = get_theme_mod('expert_healthcare_topheader_button_text');
				$expert_healthcare_topheader_button_link = get_theme_mod('expert_healthcare_topheader_button_link');
			?>
			<div class="row">
				<div class="col-lg-8 col-md-5 contact text-md-start text-center align-self-center">
					<?php if( $expert_healthcare_topheader_phoneno != ''){?>
						<a class="me-3" href="tel:<?php echo esc_html( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_phoneno)); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_phoneno)); ?></a>
					<?php }?>
					<?php if( $expert_healthcare_topheader_email != ''){?>
						<a href="mailto:<?php echo esc_html( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_email)); ?>"><i class="fas fa-envelope me-2"></i><?php echo esc_html( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_email)); ?></a>
					<?php }?>
				</div>
				<div class="col-lg-2 col-md-4 text-md-end text-center align-self-center my-md-1 my-2">
					<?php if( $expert_healthcare_topheader_social_media_setting != ''){?>
						<?php if( $expert_healthcare_topheader_social_media_facebook != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_social_media_facebook)); ?>"><i class="fab fa-facebook-f"></i></a>
						<?php }?>
						<?php if( $expert_healthcare_topheader_social_media_twitter != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_social_media_twitter)); ?>"><i class="fab fa-twitter"></i></a>
						<?php }?>
						<?php if( $expert_healthcare_topheader_social_media_instagram != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_social_media_instagram)); ?>"><i class="fab fa-instagram"></i></a>
						<?php }?>
						<?php if( $expert_healthcare_topheader_social_media_linkedin != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_social_media_linkedin)); ?>"><i class="fab fa-linkedin-in"></i></a>
						<?php }?>
						<?php if( $expert_healthcare_topheader_social_media_youtube != ''){?>
							<a href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_social_media_youtube)); ?>"><i class="fab fa-youtube"></i></a>
						<?php }?>
					<?php }?>
				</div>
				<div class="col-lg-2 col-md-3 align-self-center mb-md-0 mb-3">
						<?php
						$expert_healthcare_like_option = get_theme_mod('expert_healthcare_like_option');
						?>
						<div class="header-details">
						    <p class="mb-0 pe-4">
						        <?php if (class_exists('woocommerce')): ?>
						            <?php if (is_user_logged_in()): ?>
						                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"><i class="fas fa-user"></i></a>
						            <?php else: ?>
						                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"><i class="far fa-user"></i></a>
						            <?php endif; ?>
						        <?php endif; ?>
						    </p>
						    <?php if ($expert_healthcare_like_option != ''): ?>
						        <p class="mb-0 pe-4">
						            <a href="<?php echo esc_url(apply_filters('expert_healthcare_topheader', $expert_healthcare_like_option)); ?>"><i class="far fa-heart"></i></a>
						        </p>
						    <?php endif; ?>
						    <p class="mb-0 pe-4">
						        <?php if (class_exists('YITH_WCWL')): ?>
						            <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><i class="far fa-heart"></i></a>
						        <?php endif; ?>
						    </p>
						    <p class="mb-0">
						        <?php if (class_exists('woocommerce')): ?>
						            <a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fas fa-shopping-basket"></i></a>
						        <?php endif; ?>
						    </p>
						</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>
	<div class="<?php if( get_theme_mod( 'expert_healthcare_sticky_header', '0')) { ?>sticky-header<?php } else { ?>close-sticky<?php } ?>">
		<div class="lower-header-area py-3">
			<div class="container">
	      <nav class="navbar navbar-expand-lg navbaroffcanvase">
	    		<div class="row">
	    			<div class="col-lg-2 col-md-3 align-self-center">
							<div class="logo">
								<?php 
								if (has_custom_logo()) {
									the_custom_logo();
								} else {
									// Check if both title and tagline settings are disabled
									$expert_healthcare_tagline_enabled = get_theme_mod('expert_healthcare_tagline_setting', false);
									$expert_healthcare_title_enabled = get_theme_mod('expert_healthcare_site_title_setting', false);

									if (!$expert_healthcare_tagline_enabled && !$expert_healthcare_title_enabled) {
										// Display the default logo
										$default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
										echo '<a href="' . esc_url(home_url('/')) . '">';
										echo '<img src="' . esc_url($default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
										echo '</a>';
									}

									// Display tagline if the setting is enabled
									if ($expert_healthcare_tagline_enabled) :
										$expert_healthcare_site_desc = get_bloginfo('description'); ?>
										<p class="site-description"><?php echo esc_html($expert_healthcare_site_desc); ?></p>
									<?php endif; ?>

									<?php
									// Display site title if the setting is enabled
									if ($expert_healthcare_title_enabled) : ?>
										<p class="site-title">
											<a href="<?php echo esc_url(home_url('/')); ?>">
												<?php echo esc_html(get_bloginfo('name')); ?>
											</a>
										</p>
									<?php endif; ?>
								<?php } ?>
							</div>
						</div>
	      		<div class="col-lg-6 col-md-3 align-self-center">
	      			<div class="navbar-menubar responsive-menu">
	      				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php esc_attr('Toggle navigation','expert-healthcare'); ?>"> 
	          			<i class="fa fa-bars"></i>
	          		</button>
	              <div class="collapse navbar-collapse navbar-menu">
	              	<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-label="<?php esc_attr('Toggle navigation','expert-healthcare'); ?>"> 
	              		<i class="fa fa-times"></i>
	          			</button> 
						<?php
			                wp_nav_menu( array( 
			                  'theme_location' => 'primary',
			                  'container_class' => 'main-menu clearfix' ,
			                  'menu_class' => 'clearfix',
			                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                  'fallback_cb' => 'wp_page_menu',
			                ) ); 
			            ?>
	              </div>
	            </div>
	      		</div>
		    		<div class="col-lg-2 col-md-3 align-self-center">
		    			<?php if( $expert_healthcare_header_search_setting != '1'){?>
							<div class="search_feild my-3 my-md-0">
		          				<?php get_search_form(); ?>
		        			</div>
		        		<?php }?>
	     			</div>
					<div class="col-lg-2 col-md-3 align-self-center">
						<?php if( $expert_healthcare_topheader_button_link != '' || $expert_healthcare_topheader_button_text != ''){?>
							<div class="button_header text-center text-md-end">
								<a href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_button_link)); ?>"><?php echo esc_html( apply_filters('expert_healthcare_topheader', $expert_healthcare_topheader_button_text)); ?></a>
							</div>
						<?php }?>
	          		</div>
	      	</div>
	      </nav>
	    </div>
	</div>
  </div>
</header>