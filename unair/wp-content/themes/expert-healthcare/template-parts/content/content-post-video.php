<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Healthcare
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
<?php
		$expert_healthcare_post_id = get_the_ID();
		$expert_healthcare_post = get_post($expert_healthcare_post_id);
		$expert_healthcare_content = do_shortcode(apply_filters('the_content', $expert_healthcare_post->post_content));
		$expert_healthcare_embeds = get_media_embedded_in_content($expert_healthcare_content);

		if (!empty($expert_healthcare_embeds)) {
			foreach ($expert_healthcare_embeds as $expert_healthcare_embed) {
				$expert_healthcare_embed = wp_kses($expert_healthcare_embed, array(
					'iframe' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'frameborder' => array(),
						'allowfullscreen' => array(),
					),
					'video' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'controls' => array(),
					),
				));
				if (strpos($expert_healthcare_embed, 'video') !== false || 
					strpos($expert_healthcare_embed, 'youtube') !== false || 
					strpos($expert_healthcare_embed, 'vimeo') !== false || 
					strpos($expert_healthcare_embed, 'dailymotion') !== false || 
					strpos($expert_healthcare_embed, 'vine') !== false || 
					strpos($expert_healthcare_embed, 'wordpress.tv') !== false || 
					strpos($expert_healthcare_embed, 'hulu') !== false) {
					?>
					<div class="custom-embedded-video">
						<div class="video-container">
							<?php echo $expert_healthcare_embed; ?>
						</div>
						<div class="video-comments">
							<?php comments_template(); ?>
						</div>
					</div>
					<?php
				}
			}
		}
	?>

	<h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></h6>
	<div class="blog-content">
		<?php 
			if ( is_single() ) :
				
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
			
			the_excerpt();
		?>
	</div>
	<ul class="comment-timing">
		<li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
		<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i><?php echo esc_html_e('By','expert-healthcare'); ?> <?php esc_html(the_author()); ?></a></li>
	</ul>
</div>