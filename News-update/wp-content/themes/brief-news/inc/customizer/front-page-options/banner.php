<?php
/**
 * Banner Section
 *
 * @package Brief News
 */

$wp_customize->add_section(
	'brief_news_banner_section',
	array(
		'panel' => 'brief_news_front_page_options',
		'title' => esc_html__( 'Banner Section', 'brief-news' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'brief_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'brief_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Brief_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'brief_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'brief-news' ),
			'section'  => 'brief_news_banner_section',
			'settings' => 'brief_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'brief_news_enable_banner_section',
		array(
			'selector' => '#brief_news_banner_section .section-link',
			'settings' => 'brief_news_enable_banner_section',
		)
	);
}


// Banner Section Main - Heading.
$wp_customize->add_setting(
	'brief_news_banner_section_area',
	array(
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new Brief_News_Title_Control(
		$wp_customize,
		'brief_news_banner_section_area',
		array(
			'label'           => __( 'Main Banner Settings', 'brief-news' ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_banner_section_area',
			'active_callback' => 'brief_news_is_banner_section_enabled',
		)
	)
);

// Banner Section - Main News Content Type.
$wp_customize->add_setting(
	'brief_news_main_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_main_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_main_news_content_type',
		'type'            => 'select',
		'active_callback' => 'brief_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'brief-news' ),
			'category' => esc_html__( 'Category', 'brief-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'brief_news_main_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'brief_news_main_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'brief-news' ), $i ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_main_news_content_post_' . $i,
			'active_callback' => 'brief_news_is_main_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => brief_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'brief_news_main_news_content_category',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_main_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_main_news_content_category',
		'active_callback' => 'brief_news_is_main_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => brief_news_get_post_cat_choices(),
	)
);

// Banner Section - Editor Choice Heading.
$wp_customize->add_setting(
	'brief_news_editor_choice_area',
	array(
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new Brief_News_Title_Control(
		$wp_customize,
		'brief_news_editor_choice_area',
		array(
			'label'           => __( 'Editor Choice Settings', 'brief-news' ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_editor_choice_area',
			'active_callback' => 'brief_news_is_banner_section_enabled',
		)
	)
);

// Banner Section - Editor Choice Title.
$wp_customize->add_setting(
	'brief_news_editor_choice_title',
	array(
		'default'           => __( 'Editors Choice', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_editor_choice_title',
	array(
		'label'           => esc_html__( 'Section Title', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_editor_choice_title',
		'type'            => 'text',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);

// Banner Section - Editor Choice Button Label.
$wp_customize->add_setting(
	'brief_news_editor_choice_button_label',
	array(
		'default'           => __( 'View All', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_editor_choice_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_editor_choice_button_label',
		'type'            => 'text',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);

// Banner Section - Editor Choice Button Link.
$wp_customize->add_setting(
	'brief_news_editor_choice_button_link',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'brief_news_editor_choice_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_editor_choice_button_link',
		'type'            => 'url',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);

// Banner Section - Editor Choice Content Type.
$wp_customize->add_setting(
	'brief_news_editor_choice_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_editor_choice_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_editor_choice_content_type',
		'type'            => 'select',
		'active_callback' => 'brief_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'brief-news' ),
			'category' => esc_html__( 'Category', 'brief-news' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'brief_news_editor_choice_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'brief_news_editor_choice_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'brief-news' ), $i ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_editor_choice_content_post_' . $i,
			'active_callback' => 'brief_news_is_editor_choice_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => brief_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'brief_news_editor_choice_content_category',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_editor_choice_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_editor_choice_content_category',
		'active_callback' => 'brief_news_is_editor_choice_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => brief_news_get_post_cat_choices(),
	)
);

// Banner Section - Featured News Heading.
$wp_customize->add_setting(
	'brief_news_featured_news_area',
	array(
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	new Brief_News_Title_Control(
		$wp_customize,
		'brief_news_featured_news_area',
		array(
			'label'           => __( 'Featured News Settings', 'brief-news' ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_featured_news_area',
			'active_callback' => 'brief_news_is_banner_section_enabled',
		)
	)
);

// Banner Section - Editor Choice Title.
$wp_customize->add_setting(
	'brief_news_featured_news_title',
	array(
		'default'           => __( 'Featured News', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_featured_news_title',
	array(
		'label'           => esc_html__( 'Section Title', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_featured_news_title',
		'type'            => 'text',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);

// Banner Section - Editor Choice Button Label.
$wp_customize->add_setting(
	'brief_news_featured_news_button_label',
	array(
		'default'           => __( 'View All', 'brief-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'brief_news_featured_news_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_featured_news_button_label',
		'type'            => 'text',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);

// Banner Section - Editor Choice Button Link.
$wp_customize->add_setting(
	'brief_news_featured_news_button_link',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'brief_news_featured_news_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_featured_news_button_link',
		'type'            => 'url',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);

// Banner Section - Featured News Content Type.
$wp_customize->add_setting(
	'brief_news_featured_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_featured_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_featured_news_content_type',
		'type'            => 'select',
		'active_callback' => 'brief_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'brief-news' ),
			'category' => esc_html__( 'Category', 'brief-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'brief_news_featured_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'brief_news_featured_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'brief-news' ), $i ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_featured_news_content_post_' . $i,
			'active_callback' => 'brief_news_is_featured_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => brief_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'brief_news_featured_news_content_category',
	array(
		'sanitize_callback' => 'brief_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'brief_news_featured_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_featured_news_content_category',
		'active_callback' => 'brief_news_is_featured_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => brief_news_get_post_cat_choices(),
	)
);

// Banner Section - Advertisement Logo.
$wp_customize->add_setting(
	'brief_news_banner_advertisement_image',
	array(
		'sanitize_callback' => 'brief_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'brief_news_banner_advertisement_image',
		array(
			'label'           => esc_html__( 'Advertisement Logo', 'brief-news' ),
			'section'         => 'brief_news_banner_section',
			'settings'        => 'brief_news_banner_advertisement_image',
			'active_callback' => 'brief_news_is_banner_section_enabled',
		)
	)
);

	// Banner Section - Advertisement Logo URL.
$wp_customize->add_setting(
	'brief_news_banner_advertisement_image_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'brief_news_banner_advertisement_image_url',
	array(
		'label'           => esc_html__( 'Advertisement URL', 'brief-news' ),
		'section'         => 'brief_news_banner_section',
		'settings'        => 'brief_news_banner_advertisement_image_url',
		'type'            => 'url',
		'active_callback' => 'brief_news_is_banner_section_enabled',
	)
);
