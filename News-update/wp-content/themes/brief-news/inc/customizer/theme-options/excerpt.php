<?php
/**
 * Excerpt
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_excerpt_options',
	array(
		'panel' => 'brief_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'brief-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'brief_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'brief_news_sanitize_number_range',
		'validate_callback' => 'brief_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'brief_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'brief-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'brief-news' ),
		'section'     => 'brief_news_excerpt_options',
		'settings'    => 'brief_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
