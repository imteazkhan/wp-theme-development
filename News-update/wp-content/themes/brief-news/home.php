<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Brief News
 */

get_header();
$column_layout = get_theme_mod( 'brief_news_archive_column_layout', 'column-2' );
?>
	<main id="primary" class="site-main">

		<?php

		if ( is_home() && ! is_front_page() ) {
			do_action( 'brief_news_breadcrumb' );
		}

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<div class="blog-archive-layout grid-layout <?php echo esc_attr( $column_layout ); ?>">
				<?php
				$i = 1;
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );
					$i++;
				endwhile;
				?>
			</div>
			<?php

			do_action( 'brief_news_posts_pagination' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

	<?php
	if ( brief_news_is_sidebar_enabled() ) {
		get_sidebar();
	}
	?>

<?php
get_footer();
