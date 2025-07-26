<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    // sidebar menu
    register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
    //footer menu
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

add_theme_support( 'title-tag' );

add_theme_support( 'custom-logo' );

// add_theme_support( 'custom-header' );
add_theme_support( 'custom-header', array(
    'default-image' => '',
    'width'         => 1200,
    'height'        => 400,
    'flex-height'   => true,
    'flex-width'    => true,
    'header-text'   => false,
) );

register_nav_menus([
    'footer-menu' => __('Footer Menu', 'your-theme-textdomain')
  ]);
  

add_theme_support( 'custom-background' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-formats', array( 'video', 'audio', 'quote', 'link', 'gallery' ) );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'widgets' );

add_theme_support( 'customize-selective-refresh-widgets' );

// add_theme_support( 'comments' );

get_template_part( 'inc/walker');
get_template_part( 'inc/hotnews');