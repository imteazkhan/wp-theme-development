<?php
$featured_query = new WP_Query( $featured_news_args );
if ( $featured_query->have_posts() ) {

	$featured_title      = get_theme_mod( 'brief_news_featured_news_title', __( 'Featured News', 'brief-news' ) );
	$featured_button     = get_theme_mod( 'brief_news_featured_news_button_label', __( 'View All', 'brief-news' ) );
	$featured_button_url = get_theme_mod( 'brief_news_featured_news_button_link', '#' );
	$advertisement_image = get_theme_mod( 'brief_news_banner_advertisement_image' );
	$advertisement_url   = get_theme_mod( 'brief_news_banner_advertisement_image_url', '#' );
	?>
	<div class="featured-posts">
		<?php if ( ! empty( $featured_title || $featured_button ) ) { ?>
			<div class="title-heading">
				<h3 class="section-title"><?php echo esc_html( $featured_title ); ?></h3>
				<?php if ( ! empty( $featured_title || $featured_button ) ) { ?>
					<a href="<?php echo esc_url( $featured_button_url ); ?>" class="view-all"><?php echo esc_html( $featured_button ); ?></a>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="featured-posts-wrap">
			<?php
			while ( $featured_query->have_posts() ) :
				$featured_query->the_post();
				?>
				<div class="blog-post-container list-layout">
					<div class="blog-post-inner">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog-post-image">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
							</div>
						<?php } ?>
						<div class="blog-post-detail">
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="post-meta">
								<?php
								brief_news_posted_by();
								brief_news_posted_on();
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php if ( ! empty( $advertisement_image ) ) : ?>
			<div class="banner-promo-area">
				<a href="<?php echo esc_url( $advertisement_url ); ?>"><img src="<?php echo esc_url( $advertisement_image ); ?>" alt="<?php esc_attr_e( 'Promo Image', 'brief-news' ); ?>"></a>
			</div>
		<?php endif; ?>
	</div>
	<?php
}
