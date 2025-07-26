<?php
function newsportal_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menu('topmenu', 'Top Menu');
}
add_action('after_setup_theme', 'newsportal_setup');

// Enqueue Bootstrap and theme CSS
function newsportal_scripts() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'newsportal_scripts');

// Sidebar
function newsportal_widgets() {
    register_sidebar([
        'name' => 'Sidebar',
        'id' => 'main_sidebar',
        'before_widget' => '<div class="mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
    ]);
}
add_action('widgets_init', 'newsportal_widgets');
