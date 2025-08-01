<?php

/**
 * Active Callbacks
 *
 * @package Brief News
 */

// Theme Options.
function brief_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'brief_news_enable_pagination' )->value() );
}
function brief_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'brief_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function brief_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'brief_news_enable_flash_news_section' )->value() );
}
function brief_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_flash_news_content_type' )->value();
	return ( brief_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function brief_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_flash_news_content_type' )->value();
	return ( brief_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section.
function brief_news_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'brief_news_enable_banner_section' )->value() );
}
// Banner Section - Main Banner.
function brief_news_is_main_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_main_news_content_type' )->value();
	return ( brief_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function brief_news_is_main_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_main_news_content_type' )->value();
	return ( brief_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Banner Section - Editor Choice.
function brief_news_is_editor_choice_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_editor_choice_content_type' )->value();
	return ( brief_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function brief_news_is_editor_choice_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_editor_choice_content_type' )->value();
	return ( brief_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Banner Section - Featured News.
function brief_news_is_featured_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_featured_news_content_type' )->value();
	return ( brief_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function brief_news_is_featured_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'brief_news_featured_news_content_type' )->value();
	return ( brief_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function brief_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
