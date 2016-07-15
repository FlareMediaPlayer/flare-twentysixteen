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
    
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'flare-twentysixteen-style', get_stylesheet_uri() );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js');
 
}
add_action( 'wp_enqueue_scripts', 'flare_twentysixteen_scripts' );