<?php
// Register Custom Post Type: Hotnews
function register_hotnews_post_type() {
    $labels = array(
        'name'                  => _x( 'Hot News', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Hot News', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Hot News', 'text_domain' ),
        'name_admin_bar'        => __( 'Hot News', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'add_new_item'          => __( 'Add New Hot News', 'text_domain' ),
        'new_item'              => __( 'New Hot News', 'text_domain' ),
        'edit_item'             => __( 'Edit Hot News', 'text_domain' ),
        'view_item'             => __( 'View Hot News', 'text_domain' ),
        'all_items'             => __( 'All Hot News', 'text_domain' ),
        'search_items'          => __( 'Search Hot News', 'text_domain' ),
        'not_found'             => __( 'No Hot News found.', 'text_domain' ),
        'not_found_in_trash'    => __( 'No Hot News found in Trash.', 'text_domain' ),
    );

    $args = array(
        'label'                 => __( 'Hot News', 'text_domain' ),
        'description'           => __( 'Hot News for the website', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type( 'hotnews', $args );
//good news post type start
$labels = array(
        'name'                  => _x( 'Good News', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Good News', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Good News', 'text_domain' ),
        'name_admin_bar'        => __( 'Good News', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'add_new_item'          => __( 'Add New Good News', 'text_domain' ),
        'new_item'              => __( 'New Good News', 'text_domain' ),
        'edit_item'             => __( 'Edit Good News', 'text_domain' ),
        'view_item'             => __( 'View Good News', 'text_domain' ),
        'all_items'             => __( 'All Good News', 'text_domain' ),
        'search_items'          => __( 'Search Good News', 'text_domain' ),
        'not_found'             => __( 'No Good News found.', 'text_domain' ),
        'not_found_in_trash'    => __( 'No Good News found in Trash.', 'text_domain' ),
    );

    $args = array(
        'label'                 => __( 'Good News', 'text_domain' ),
        'description'           => __( 'Good News for the website', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' , 'page-attributes', 'revisions' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type( 'goodnews', $args );
//good news post type end


}
add_action( 'init', 'register_hotnews_post_type', 0 );

// Enqueue Bootstrap 5.3.3 CSS and JS
function enqueue_bootstrap() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );
    // Enqueue Bootstrap JS
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.3.3', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );
?>