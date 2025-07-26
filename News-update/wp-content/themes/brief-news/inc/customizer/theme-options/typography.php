<?php
/**
 * Typography
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_typography',
	array(
		'panel' => 'brief_news_theme_options',
		'title' => esc_html__( 'Typography', 'brief-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'brief_news_site_title_font',
	array(
		'default'           => 'Commissioner',
		'sanitize_callback' => 'brief_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'brief_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'brief-news' ),
		'section'  => 'brief_news_typography',
		'settings' => 'brief_news_site_title_font',
		'type'     => 'select',
		'choices'  => brief_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'brief_news_site_description_font',
	array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'brief_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'brief_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'brief-news' ),
		'section'  => 'brief_news_typography',
		'settings' => 'brief_news_site_description_font',
		'type'     => 'select',
		'choices'  => brief_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'brief_news_header_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'brief_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'brief_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'brief-news' ),
		'section'  => 'brief_news_typography',
		'settings' => 'brief_news_header_font',
		'type'     => 'select',
		'choices'  => brief_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'brief_news_body_font',
	array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'brief_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'brief_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'brief-news' ),
		'section'  => 'brief_news_typography',
		'settings' => 'brief_news_body_font',
		'type'     => 'select',
		'choices'  => brief_news_get_all_google_font_families(),
	)
);
