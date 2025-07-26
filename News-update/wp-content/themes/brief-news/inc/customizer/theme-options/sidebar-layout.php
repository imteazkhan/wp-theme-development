<?php
/**
 * Sidebar Option
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'brief-news' ),
		'panel' => 'brief_news_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'brief_news_sidebar_position',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'brief_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'brief-news' ),
		'section' => 'brief_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'brief-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'brief-news' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'brief_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'brief_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'brief-news' ),
		'section' => 'brief_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'brief-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'brief-news' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'brief_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'brief_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'brief-news' ),
		'section' => 'brief_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'brief-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'brief-news' ),
		),
	)
);
