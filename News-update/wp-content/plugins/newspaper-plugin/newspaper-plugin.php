<?php
/**
 * Plugin Name: Newspaper Plugin
 * Description: Adds News post type, breaking news section, and view counter.
 * Version: 1.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Register News Custom Post Type
function np_register_news_post_type() {
    register_post_type( 'np_news', [
        'labels' => [
            'name' => 'News',
            'singular_name' => 'News',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
        'menu_icon' => 'dashicons-media-document',
    ]);
}
add_action( 'init', 'np_register_news_post_type' );

// Add View Counter
function np_set_post_views($postID) {
    $key = 'np_post_views';
    $count = get_post_meta($postID, $key, true);
    $count = ($count == '') ? 0 : $count;
    $count++;
    update_post_meta($postID, $key, $count);
}

function np_track_post_views($post_id) {
    if (is_single() && get_post_type($post_id) == 'np_news') {
        np_set_post_views($post_id);
    }
}
add_action('wp_head', function() {
    if (is_single()) {
        global $post;
        np_track_post_views($post->ID);
    }
});

// Display view count below content
function np_show_post_views($content) {
    if (is_singular('np_news')) {
        $views = get_post_meta(get_the_ID(), 'np_post_views', true);
        $views = $views ? $views : 0;
        $content .= "<p><strong>Views:</strong> $views</p>";
    }
    return $content;
}
add_filter('the_content', 'np_show_post_views');

// Breaking News Shortcode
function np_breaking_news_shortcode() {
    $args = [
        'post_type' => 'np_news',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    ];
    $news = new WP_Query($args);

    $output = '<div style="background:red;color:white;padding:10px;font-weight:bold;animation: blinker 1s linear infinite;">Breaking News: ';
    while ($news->have_posts()) {
        $news->the_post();
        $output .= '<a style="color:white;margin-right:15px;" href="' . get_permalink() . '">' . get_the_title() . '</a>';
    }
    $output .= '</div>';
    $output .= '<style>@keyframes blinker { 50% { opacity: 0; } }</style>';

    wp_reset_postdata();
    return $output;
}
add_shortcode('breaking_news', 'np_breaking_news_shortcode');
