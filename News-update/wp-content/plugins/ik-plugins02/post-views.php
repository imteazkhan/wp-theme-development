<?php
/*
Plugin Name: Post Views Counter
Description: Counts and displays the number of views on each post.
Version: 1.0
Author: imteaz
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Increment view count on single post view
function pvc_increment_post_views() {
    if (is_single()) {
        global $post;
        $views = get_post_meta($post->ID, 'pvc_post_views', true);
        $views = $views ? $views : 0;
        $views++;
        update_post_meta($post->ID, 'pvc_post_views', $views);
    }
}
add_action('wp_head', 'pvc_increment_post_views');

// Display views at the end of content
function pvc_show_post_views($content) {
    if (is_single()) {
        global $post;
        $views = get_post_meta($post->ID, 'pvc_post_views', true);
        $views = $views ? $views : 0;
        $content .= '<p><strong>👁️ Views: ' . $views . '</strong></p>';
    }
    return $content;
}
add_filter('the_content', 'pvc_show_post_views');

// Add views column in admin post list
function pvc_add_views_column($columns) {
    $columns['pvc_post_views'] = 'Views';
    return $columns;
}
add_filter('manage_posts_columns', 'pvc_add_views_column');

function pvc_display_views_column($column, $post_id) {
    if ($column === 'pvc_post_views') {
        $views = get_post_meta($post_id, 'pvc_post_views', true);
        echo $views ? $views : '0';
    }
}
add_action('manage_posts_custom_column', 'pvc_display_views_column', 10, 2);
