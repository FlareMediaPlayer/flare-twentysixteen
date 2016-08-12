<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');
require_once ('widgets/github.php');
require_once ('widgets/FlareComponents.php');
require_once ('widgets/CompleteBuilds.php');
require_once ('widgets/ComponentOverview.php');
require_once ('widgets/Npm.php');


if (!function_exists('flare-twentysixteen_setup')) :

    function flare_twentysixteen_setup() {
    
        add_theme_support( 'post-thumbnails' );
        
        register_nav_menus(array(
            'main' => __('Main Menu', 'flare-twentysixteen')
        ));
    }

endif;
add_action('after_setup_theme', 'flare_twentysixteen_setup');

function flare_twentysixteen_component_init() {
    $labels = array(
        'name' => _x('Components', 'post type general name', 'flare_twentysixteen'),
        'singular_name' => _x('Component', 'post type singular name', 'flare_twentysixteen'),
        'menu_name' => _x('Components', 'admin menu', 'flare_twentysixteen'),
        'name_admin_bar' => _x('Component', 'add new on admin bar', 'flare_twentysixteen'),
        'add_new' => _x('Add New', 'component', 'flare_twentysixteen'),
        'add_new_item' => __('Add New Component', 'flare_twentysixteen'),
        'new_item' => __('New Component', 'flare_twentysixteen'),
        'edit_item' => __('Edit Component', 'flare_twentysixteen'),
        'view_item' => __('View Component', 'flare_twentysixteen'),
        'all_items' => __('All Components', 'flare_twentysixteen'),
        'search_items' => __('Search Components', 'flare_twentysixteen'),
        'parent_item_colon' => __('Parent Components:', 'flare_twentysixteen'),
        'not_found' => __('No components found.', 'flare_twentysixteen'),
        'not_found_in_trash' => __('No components found in Trash.', 'flare_twentysixteen')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'flare_twentysixteen'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'components'),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'excerpt' , 'custom-fields' , 'page-attributes' ),
        'taxonomies' => array('component-category', 'component-tag'),
        'menu_icon' => 'dashicons-admin-generic',
        'register_meta_box_cb' => 'add_component_metaboxes'
    );

    register_post_type('components', $args);
}

add_action('init', 'flare_twentysixteen_component_init');

function add_component_metaboxes() {

    add_meta_box('flare_component_description', 'Component Description', 'flare_component_description', 'components', 'normal', 'high');

    
}

function save_flare_component_description() {
    global $post;

    if (!wp_verify_nonce($_POST['component_meta_noncename'], plugin_basename(__FILE__))) {

        return $post->ID;
    }


    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;

    $value = $_POST['component_description'];



    if ($post->post_type == 'revision')
        return; // Don't store custom data twice


    if (get_post_meta($post->ID, $key, FALSE)) {

        update_post_meta($post->ID, 'component_description', $value);
    } else {

        add_post_meta($post->ID, 'component_description', $value);
    }

    if (!$value)
        delete_post_meta($post->ID, $key); // Delete if blank
}

add_action('save_post', 'save_flare_component_description'); 

function flare_component_description(){
    global $post;
    
  

    echo '<input type="hidden" name="component_meta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    $data = get_post_meta($post->ID, 'component_description', true);
    echo '<input type="text" name="component_description" value="' . $data  . '" class="widefat" />';

}


function flare_twentysixteen_build_init() {
    
    $labels = array(
        'name' => _x('Complete Builds', 'post type general name', 'flare_twentysixteen'),
        'singular_name' => _x('Complete Build', 'post type singular name', 'flare_twentysixteen'),
        'menu_name' => _x('Complete Builds', 'admin menu', 'flare_twentysixteen'),
        'name_admin_bar' => _x('Complete Builds', 'add new on admin bar', 'flare_twentysixteen'),
        'add_new' => _x('Add New Build', 'complete_build', 'flare_twentysixteen'),
        'add_new_item' => __('Add New Build', 'flare_twentysixteen'),
        'new_item' => __('New Build', 'flare_twentysixteen'),
        'edit_item' => __('Edit Build', 'flare_twentysixteen'),
        'view_item' => __('View Build', 'flare_twentysixteen'),
        'all_items' => __('All Builds', 'flare_twentysixteen'),
        'search_items' => __('Search Builds', 'flare_twentysixteen'),
        'parent_item_colon' => __('Parent Builds:', 'flare_twentysixteen'),
        'not_found' => __('No builds found.', 'flare_twentysixteen'),
        'not_found_in_trash' => __('No builds found in Trash.', 'flare_twentysixteen')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'flare_twentysixteen'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'complete-builds'),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'excerpt' , 'custom-fields' , 'page-attributes' ),
        //'taxonomies' => null, //add more later
        'menu_icon' => 'dashicons-video-alt'
    );

    register_post_type('complete-builds', $args);
}

add_action('init', 'flare_twentysixteen_build_init');


add_action('init', 'flare_twentysixteen_component_taxonomies', 0);

// create two taxonomies, genres and writers for the post type "book"
function flare_twentysixteen_component_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Category', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Category'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'components-category'),
    );

    register_taxonomy('components-category', array('components'), $args);

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' => __('Search Tags'),
        'popular_items' => __('Popular Tags'),
        'all_items' => __('All Tags'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag'),
        'separate_items_with_commas' => __('Separate tags with commas'),
        'add_or_remove_items' => __('Add or remove tags'),
        'choose_from_most_used' => __('Choose from the most used tags'),
        'not_found' => __('No tags found.'),
        'menu_name' => __('Tags'),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'components-tag'),
    );

    register_taxonomy('components-tag', 'components', $args);
}

function flare_twentysixteen_scripts() {
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('highlight-css', get_template_directory_uri() . '/plugins/highlight/styles/default.css');
    wp_enqueue_style('flare-twentysixteen-style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('highlight-js', get_template_directory_uri() . '/plugins/highlight/highlight.pack.js');
    wp_enqueue_script('flare-main-js', get_template_directory_uri() . '/js/main.js');
}

add_action('wp_enqueue_scripts', 'flare_twentysixteen_scripts');



function flare_single_widget($widget) {
    $args = array(
        'before_title' => "<div class=\"widget\">",
        'after_widget' => "</div>",
        'before_title' => "<h3>",
        'after_title' => "</h3>"
    );
    the_widget($widget, null, $args);
}

