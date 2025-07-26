<?php
/*
Plugin Name: Simple News Views
Description: Tracks how many times each News post is viewed.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) exit;

// 1. Increase view count when single news post is viewed
function snv_track_post_views() {
    if (is_singular('news')) {
        global $post;
        $views = get_post_meta($post->ID, 'snv_views', true);
        $views = $views ? intval($views) : 0;
        $views++;
        update_post_meta($post->ID, 'snv_views', $views);
    }
}
add_action('wp_head', 'snv_track_post_views');

// 2. Show view count at the end of content (optional)
function snv_append_views_to_content($content) {
    if (is_singular('news') && in_the_loop() && is_main_query()) {
        global $post;
        $views = get_post_meta($post->ID, 'snv_views', true) ?: 0;
        $content .= '<p><strong>Views:</strong> ' . $views . '</p>';
    }
    return $content;
}
add_filter('the_content', 'snv_append_views_to_content');

// 3. Shortcode to show views: [news_views]
function snv_views_shortcode($atts) {
    global $post;
    if (get_post_type($post) === 'news') {
        $views = get_post_meta($post->ID, 'snv_views', true) ?: 0;
        return '<span class="news-views">' . $views . ' views</span>';
    }
    return '';
}
add_shortcode('news_views', 'snv_views_shortcode');
