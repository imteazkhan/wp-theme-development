<?php
/**
 * Archive Layout
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'brief-news' ),
		'panel' => 'brief_news_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'brief_news_archive_column_layout',
	array(
		'default'           => 'column-2',
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_archive_column_layout',
	array(
		'label'   => esc_html__( 'Column Layout', 'brief-news' ),
		'section' => 'brief_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'brief-news' ),
			'column-3' => __( 'Column 3', 'brief-news' ),
		),
	)
);
