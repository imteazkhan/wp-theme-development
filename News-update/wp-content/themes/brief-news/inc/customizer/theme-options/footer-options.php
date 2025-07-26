<?php
/**
 * Footer Options
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_footer_options',
	array(
		'panel' => 'brief_news_theme_options',
		'title' => esc_html__( 'Footer Options', 'brief-news' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'brief-news' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'brief_news_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'brief_news_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'brief-news' ),
		'section'  => 'brief_news_footer_options',
		'settings' => 'brief_news_footer_copyright_text',
		'type'     => 'textarea',
	)
);
