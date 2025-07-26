<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brief News
 */

if ( ! is_front_page() || is_home() ) {
	?>
</div>
</div>
</div>

<?php } ?>

<!-- start of footer -->
<footer class="site-footer">
	<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) : ?>
		<div class="brief-news-top-footer">
			<div class="section-wrapper">
				<div class="top-footer-wrapper">
					<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
						<div class="footer-container-wrapper">
							<div class="footer-content-inside">
								<?php dynamic_sidebar( 'footer-widget-' . $i ); ?>
							</div>
						</div>
					<?php } ?>
				</div>	
			</div>	
		</div>
	<?php endif; ?>

	<div class="brief-news-middle-footer">
		<div class="section-wrapper">
			<div class="middle-footer-wrapper">
				<div class="footer-social-menu">
					<?php
					wp_nav_menu(
						array(
							'container'      => 'ul',
							'menu_class'     => 'social-links',
							'theme_location' => 'social',
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						)
					);
					?>
				</div>
			</div>
		</div> 
	</div>

	<div class="brief-news-bottom-footer">
		<div class="section-wrapper">
			<div class="bottom-footer-content">
				<?php
				/**
				 * Hook: brief_news_footer_copyright.
				 *
				 * @hooked - brief_news_output_footer_copyright_content - 10
				 */
				do_action( 'brief_news_footer_copyright' );
				?>
			</div>
		</div>
	</div>
</footer>

<a href="#" class="scroll-to-top scroll-style-1"></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
