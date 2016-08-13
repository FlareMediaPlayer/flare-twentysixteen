<?php

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
    add_meta_box('flare_component_script', 'Component Script', 'flare_component_script', 'components', 'normal', 'high');

    
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


    if (get_post_meta($post->ID, 'component_description', FALSE)) {

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
  

    echo '<input type="hidden" name="component_meta_noncename" id="component_description_meta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    $data = get_post_meta($post->ID, 'component_description', true);
    echo '<input type="text" name="component_description" value="' . $data  . '" class="widefat" />';

}

function flare_component_script(){
    
    global $post;

    echo '<input type="hidden" name="component_script_meta_noncename" id="component_script_meta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    $data = get_post_meta($post->ID, 'component_script', true);
    echo '<input type="text" name="component_script" value="' . $data  . '" class="widefat"/>';

}

function save_flare_component_script() {
    
    global $post;

    if (!wp_verify_nonce($_POST['component_script_meta_noncename'], plugin_basename(__FILE__))) {

        return $post->ID;
    }


    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;

    $value = $_POST['component_script'];

    $key = 'component_script';

    if ($post->post_type == 'revision')
        return; // Don't store custom data twice


    if (get_post_meta($post->ID, $key, FALSE)) {

        update_post_meta($post->ID, $key, $value);
        
    } else {

        add_post_meta($post->ID, $key, $value);
    }

    if (!$value)
        delete_post_meta($post->ID, $key); // Delete if blank
}

add_action('save_post', 'save_flare_component_script'); 