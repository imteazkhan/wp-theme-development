<?php
/**
 * Breadcrumb
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'brief-news' ),
		'panel' => 'brief_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'brief_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'brief_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'brief-news' ),
			'section' => 'brief_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'brief_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'brief_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'brief-news' ),
		'active_callback' => 'brief_news_is_breadcrumb_enabled',
		'section'         => 'brief_news_breadcrumb',
	)
);
