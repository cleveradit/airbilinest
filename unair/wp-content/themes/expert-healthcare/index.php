<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Healthcare
 */
get_header(); 

?>

<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<?php 
	            $expert_healthcare_index_sidebar_setting = get_theme_mod('expert_healthcare_index_sidebar_setting','1');
	            $expert_healthcare_sidebar_position = get_theme_mod('expert_healthcare_sidebar_position', 'right');
	            $expert_healthcare_content_class = ($expert_healthcare_index_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';

	            // Set classes for left or right sidebar
	            $expert_healthcare_content_order_class = ($expert_healthcare_sidebar_position == 'left') ? 'order-lg-2' : '';
	            $expert_healthcare_sidebar_order_class = ($expert_healthcare_sidebar_position == 'left') ? 'order-lg-1' : '';
            ?>
			<div class="<?php echo esc_attr($expert_healthcare_content_class . ' ' . $expert_healthcare_content_order_class); ?>">
				<div class="row">
					<?php 
						$expert_healthcare_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$expert_healthcare_paged );	
					?>
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post(); ?>
							<div class="">
								<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
							</div>
						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part('template-parts/content/content','none'); ?>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-5">
						<div class="sp-post-pagination">
							<?php
							the_posts_pagination( array(
								'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
								'next_text'          => '<i class="fa fa-angle-double-right"></i>',
							) ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php if( $expert_healthcare_index_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>