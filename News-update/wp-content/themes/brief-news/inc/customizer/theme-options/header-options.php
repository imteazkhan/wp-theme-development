<?php
/**
 * Header Options
 *
 * @package Brief News Pro
 */

$wp_customize->add_section(
	'brief_news_header_options',
	array(
		'panel' => 'brief_news_theme_options',
		'title' => esc_html__( 'Header Options', 'brief-news' ),
	)
);

// Header Options - Header Button Custom Label.
$wp_customize->add_setting(
	'brief_news_header_custom_button_label',
	array(
		'default'           => __( 'Subscribe', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_header_custom_button_label',
	array(
		'label'    => esc_html__( 'Header Custom Button', 'brief-news' ),
		'section'  => 'brief_news_header_options',
		'settings' => 'brief_news_header_custom_button_label',
		'type'     => 'text',
	)
);

// Header Options - Header Button Custom URL.
$wp_customize->add_setting(
	'brief_news_header_custom_button_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'brief_news_header_custom_button_url',
	array(
		'label'    => esc_html__( 'Button Link', 'brief-news' ),
		'section'  => 'brief_news_header_options',
		'settings' => 'brief_news_header_custom_button_url',
		'type'     => 'url',
	)
);
