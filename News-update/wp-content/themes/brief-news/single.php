<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Brief News
 */

get_header();
?>
<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single' );

		do_action( 'brief_news_post_navigation' );

		if ( is_singular( 'post' ) ) {
			$related_posts_label = get_theme_mod( 'brief_news_post_related_post_label', __( 'Related Posts', 'brief-news' ) );
			$args                = array(
				'posts_per_page' => 3,
				'post__not_in'   => array( $post->ID ),
				'orderby'        => 'rand',
			);

			$cat_content_id = get_the_category( $post->ID );
			if ( ! empty( $cat_content_id ) ) {
				$args['cat'] = $cat_content_id[0]->term_id;
			}

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				?>
				<div class="related-posts">
					<h2><?php echo esc_html( $related_posts_label ); ?></h2>
					<div class="row">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
								<div>
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php brief_news_post_thumbnail(); ?>
										<div class="post-text">
											<header class="entry-header">
											<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
											</header><!-- .entry-header -->
											<div class="entry-content">
											<?php the_excerpt(); ?>
											</div><!-- .entry-content -->
										</div>
									</article>
								</div>
								<?php
							endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php
			endif;
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;

		endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
if ( brief_news_is_sidebar_enabled() ) {
	get_sidebar();
}
?>
<?php

get_footer();
