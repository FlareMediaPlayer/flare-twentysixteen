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


function flare_twentysixteen_componenet_init() {
	$labels = array(
		'name'               => _x( 'Componenets', 'post type general name', 'flare_twentysixteen' ),
		'singular_name'      => _x( 'Componenet', 'post type singular name', 'flare_twentysixteen' ),
		'menu_name'          => _x( 'Componenets', 'admin menu', 'flare_twentysixteen' ),
		'name_admin_bar'     => _x( 'Componenet', 'add new on admin bar', 'flare_twentysixteen' ),
		'add_new'            => _x( 'Add New', 'componenet', 'flare_twentysixteen' ),
		'add_new_item'       => __( 'Add New Componenet', 'flare_twentysixteen' ),
		'new_item'           => __( 'New Componenet', 'flare_twentysixteen' ),
		'edit_item'          => __( 'Edit Componenet', 'flare_twentysixteen' ),
		'view_item'          => __( 'View Componenet', 'flare_twentysixteen' ),
		'all_items'          => __( 'All Componenets', 'flare_twentysixteen' ),
		'search_items'       => __( 'Search Componenets', 'flare_twentysixteen' ),
		'parent_item_colon'  => __( 'Parent Componenets:', 'flare_twentysixteen' ),
		'not_found'          => __( 'No componenets found.', 'flare_twentysixteen' ),
		'not_found_in_trash' => __( 'No componenets found in Trash.', 'flare_twentysixteen' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'flare_twentysixteen' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'componenet' ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'componenet', $args );
}

add_action( 'init', 'flare_twentysixteen_componenet_init' );

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