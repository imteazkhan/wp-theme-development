<?php
$editor_query = new WP_Query( $editor_args );
if ( $editor_query->have_posts() ) {

	$editor_title      = get_theme_mod( 'brief_news_editor_choice_title', __( 'Editors Choice', 'brief-news' ) );
	$editor_button     = get_theme_mod( 'brief_news_editor_choice_button_label', __( 'View All', 'brief-news' ) );
	$editor_button_url = get_theme_mod( 'brief_news_editor_choice_button_link', '#' );
	?>
	<div class="editors-choice">
		<?php if ( ! empty( $editor_title || $editor_button ) ) { ?>
			<div class="title-heading">
				<h3 class="section-title"><?php echo esc_html( $editor_title ); ?></h3>
				<?php if ( ! empty( $editor_button ) ) { ?>
					<a href="<?php echo esc_url( $editor_button_url ); ?>" class="view-all"><?php echo esc_html( $editor_button ); ?></a>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="editors-choice-wrap">
			<?php
			$i = 1;
			while ( $editor_query->have_posts() ) :
				$editor_query->the_post();
				?>
				<div class="blog-post-container <?php echo esc_attr( $i === 1 ? 'grid-layout' : 'list-layout' ); ?>">
					<div class="blog-post-inner">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog-post-image">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
							</div>
						<?php } ?>
						<div class="blog-post-detail">
							<?php brief_news_categories_list(); ?>
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
				$i++;
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
}
