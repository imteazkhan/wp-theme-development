<?php
/**
 * Pagination
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_pagination',
	array(
		'panel' => 'brief_news_theme_options',
		'title' => esc_html__( 'Pagination', 'brief-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'brief_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'brief-news' ),
			'section'  => 'brief_news_pagination',
			'settings' => 'brief_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'brief_news_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'brief-news' ),
		'section'         => 'brief_news_pagination',
		'settings'        => 'brief_news_pagination_type',
		'active_callback' => 'brief_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'brief-news' ),
			'numeric' => __( 'Numeric', 'brief-news' ),
		),
	)
);
