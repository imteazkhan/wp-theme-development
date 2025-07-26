<?php
if ( ! get_theme_mod( 'brief_news_enable_banner_section', false ) ) {
	return;
}

$main_news_content_ids      = $editor_content_ids = $featured_news_content_ids = array();
$main_content_type          = get_theme_mod( 'brief_news_main_news_content_type', 'post' );
$editor_content_type        = get_theme_mod( 'brief_news_editor_choice_content_type', 'post' );
$featured_news_content_type = get_theme_mod( 'brief_news_featured_news_content_type', 'post' );

if ( $main_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$main_news_content_ids[] = get_theme_mod( 'brief_news_main_news_content_post_' . $i );
	}
	$main_news_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $main_news_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $main_news_content_ids ) ) ) {
		$main_news_args['post__in'] = array_filter( $main_news_content_ids );
		$main_news_args['orderby']  = 'post__in';
	} else {
		$main_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'brief_news_main_news_content_category' );
	$main_news_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}
$main_news_args = apply_filters( 'brief_news_banner_section_args', $main_news_args );

if ( $editor_content_type === 'post' ) {
	for ( $i = 1; $i <= 6; $i++ ) {
		$editor_content_ids[] = get_theme_mod( 'brief_news_editor_choice_content_post_' . $i );
	}
	$editor_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_content_ids ) ) ) {
		$editor_args['post__in'] = array_filter( $editor_content_ids );
		$editor_args['orderby']  = 'post__in';
	} else {
		$editor_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'brief_news_editor_choice_content_category' );
	$editor_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}
$editor_args = apply_filters( 'brief_news_banner_section_args', $editor_args );

if ( $featured_news_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$featured_news_content_ids[] = get_theme_mod( 'brief_news_featured_news_content_post_' . $i );
	}
	$featured_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $featured_news_content_ids ) ) ) {
		$featured_news_args['post__in'] = array_filter( $featured_news_content_ids );
		$featured_news_args['orderby']  = 'post__in';
	} else {
		$featured_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id     = get_theme_mod( 'brief_news_featured_news_content_category' );
	$featured_news_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}
$featured_news_args = apply_filters( 'brief_news_banner_section_args', $featured_news_args );

brief_news_render_banner_section( $main_news_args, $editor_args, $featured_news_args );

/**
 * Render Banner Section.
 */
function brief_news_render_banner_section( $main_news_args, $editor_args, $featured_news_args ) {
	?>

	<div id="brief_news_banner_section"  class="magazine-banner section-splitter banner-style-2">
		<?php
		if ( is_customize_preview() ) :
			brief_news_section_link( 'brief_news_banner_section' );
		endif;
		?>
		<div class="section-wrapper">
			<div class="banner-container-wrapper">

				<?php

				require get_template_directory() . '/template-parts/sections/banner/main-banner.php';

				require get_template_directory() . '/template-parts/sections/banner/editors-choice.php';

				require get_template_directory() . '/template-parts/sections/banner/featured-posts.php';

				?>

			</div>
		</div>
	</div>

	<?php

}
