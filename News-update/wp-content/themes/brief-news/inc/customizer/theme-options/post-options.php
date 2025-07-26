<?php
/**
 * Post Options
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'brief-news' ),
		'panel' => 'brief_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'brief_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'brief-news' ),
			'section' => 'brief_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'brief_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'brief-news' ),
			'section' => 'brief_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'brief_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'brief-news' ),
			'section' => 'brief_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'brief_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'brief-news' ),
			'section' => 'brief_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'brief_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'brief-news' ),
		'section'  => 'brief_news_post_options',
		'settings' => 'brief_news_post_related_post_label',
		'type'     => 'text',
	)
);
