<?php
/**
 * Flash News Section
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_flash_news_section',
	array(
		'panel' => 'brief_news_front_page_options',
		'title' => esc_html__( 'Flash News Section', 'brief-news' ),
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'brief_news_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'brief-news' ),
			'section'  => 'brief_news_flash_news_section',
			'settings' => 'brief_news_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'brief_news_enable_flash_news_section',
		array(
			'selector' => '#brief_news_flash_news_section .section-link',
			'settings' => 'brief_news_enable_flash_news_section',
		)
	);
}

// Flash News Section - Section Title.
$wp_customize->add_setting(
	'brief_news_flash_news_title',
	array(
		'default'           => __( 'Flash News', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_flash_news_title',
	array(
		'label'           => esc_html__( 'Section Title', 'brief-news' ),
		'section'         => 'brief_news_flash_news_section',
		'settings'        => 'brief_news_flash_news_title',
		'type'            => 'text',
		'active_callback' => 'brief_news_is_flash_news_section_enabled',
	)
);

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'brief_news_flash_news_speed_controller',
	array(
		'default'           => 30,
		'sanitize_callback' => 'brief_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'brief_news_flash_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'brief-news' ),
		'description'     => esc_html__( 'Note: Default speed value is 30.', 'brief-news' ),
		'section'         => 'brief_news_flash_news_section',
		'settings'        => 'brief_news_flash_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'brief_news_is_flash_news_section_enabled',
	)
);

// Flash News Section - Content Type.
$wp_customize->add_setting(
	'brief_news_flash_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_flash_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'brief-news' ),
		'section'         => 'brief_news_flash_news_section',
		'settings'        => 'brief_news_flash_news_content_type',
		'type'            => 'select',
		'active_callback' => 'brief_news_is_flash_news_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'brief-news' ),
			'category' => esc_html__( 'Category', 'brief-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Flash News Section - Select Post.
	$wp_customize->add_setting(
		'brief_news_flash_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'brief_news_flash_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'brief-news' ), $i ),
			'section'         => 'brief_news_flash_news_section',
			'settings'        => 'brief_news_flash_news_content_post_' . $i,
			'active_callback' => 'brief_news_is_flash_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => brief_news_get_post_choices(),
		)
	);

}

// Flash News Section - Select Category.
$wp_customize->add_setting(
	'brief_news_flash_news_content_category',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_flash_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'brief-news' ),
		'section'         => 'brief_news_flash_news_section',
		'settings'        => 'brief_news_flash_news_content_category',
		'active_callback' => 'brief_news_is_flash_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => brief_news_get_post_cat_choices(),
	)
);
