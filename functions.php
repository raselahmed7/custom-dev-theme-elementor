<?php

// PPM Quickstart theme supports
if ( ! function_exists( 'ppm_quickstart_theme_supports' ) ) :
function ppm_quickstart_theme_supports(){
    
    load_theme_textdomain( 'ppm-quickstart', get_template_directory() . '/languages' );
    
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    
	register_nav_menus( array(
		'main-menu'   => __( 'Primary menu', 'ppm-quickstart' ),
	) );    
}
endif;
add_action('after_setup_theme', 'ppm_quickstart_theme_supports');


// Calling Theme files
function ppm_quickstart_theme_files(){
    
    wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3' );
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.5.0/css/all.css', array(), '5.5' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0' );
    wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
    wp_enqueue_style( 'ppm-quickstart-theme-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'ppm-quickstart-theme-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0' );
    
    wp_enqueue_script( 'popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '1.14.3', true );
    wp_enqueue_script( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '4.1.3', true );
    wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/sticky.min.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'ppm-quickstart-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20120206', true );
}
add_action('wp_enqueue_scripts', 'ppm_quickstart_theme_files'); 


// Includes
include_once('inc/widgets.php');
include_once('inc/custom-posts.php');
include_once('inc/shortcodes.php');
include_once('inc/elementor/elementor.php');
include_once('inc/metabox-and-options.php');