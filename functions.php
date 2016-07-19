<?php

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


if (!function_exists('flare-twentysixteen_setup')) :

    function flare_twentysixteen_setup() {
        register_nav_menus(array(
            'main' => __('Main Menu', 'flare-twentysixteen')
        ));
    }


    
endif;
add_action( 'after_setup_theme', 'flare_twentysixteen_setup' );


function flare_twentysixteen_scripts() {
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'highlight-css', get_template_directory_uri() . '/plugins/highlight/styles/default.css' );
    wp_enqueue_style( 'flare-twentysixteen-style', get_stylesheet_uri() );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('highlight-js' ,get_template_directory_uri() . '/plugins/highlight/highlight.pack.js' );
    wp_enqueue_script('flare-main-js' ,get_template_directory_uri() .'/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'flare_twentysixteen_scripts' );