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
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'page-attributes'),
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
    add_meta_box('flare_component_details', 'Component Details', 'flare_component_details', 'components', 'normal', 'high');
    add_meta_box('flare_component_jsdoc', 'JSDoc', 'flare_component_jsdoc', 'components', 'side', 'default');

    
}

add_action('save_post_components', 'save_flare_component_description');

function save_flare_component_description() {

    global $post;

    if (!wp_verify_nonce($_POST['component_meta_noncename'], plugin_basename(__FILE__))) {

        return $post->ID;
    }



    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;

    $key = '_component_description';

    $value = $_POST[$key];



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

function flare_component_description() {

    global $post;

    echo '<input type="hidden" name="component_meta_noncename" id="component_description_meta_noncename" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    $data = get_post_meta($post->ID, '_component_description', true);
    echo '<input type="text" name="_component_description" value="' . $data . '" class="widefat" />';
}

function flare_component_script() {

    global $post;


    echo '<input type="hidden" name="component_script_meta_noncename" id="component_script_meta_noncename" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    echo '<p><strong>Production</strong></p>';
    $data = get_post_meta($post->ID, '_component_script_production', true);
    echo '<input type="text" name="_component_script_production" value="' . $data . '" class="widefat"/>';

    echo '<p><strong>Development</strong></p>';
    $data = get_post_meta($post->ID, '_component_script_development', true);
    echo '<input type="text" name="_component_script_development" value="' . $data . '" class="widefat"/>';
}

function save_flare_component_script() {

    global $post;

    if (!wp_verify_nonce($_POST['component_script_meta_noncename'], plugin_basename(__FILE__))) {

        return $post->ID;
    }



    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;

    $value = $_POST['_component_script_production'];

    $key = '_component_script_production';

    if ($post->post_type == 'revision')
        return; // Don't store custom data twice


    if (get_post_meta($post->ID, $key, FALSE)) {

        update_post_meta($post->ID, $key, $value);
    } else {

        add_post_meta($post->ID, $key, $value);
    }

    if (!$value)
        delete_post_meta($post->ID, $key); // Delete if blank



        
//Now do development script

    $key = '_component_script_development';

    $value = $_POST[$key];

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

add_action('save_post_components', 'save_flare_component_script');

function flare_component_details() {

    global $post;


    echo '<input type="hidden" name="component_details_meta_noncename" id="component_details_meta_noncename" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    echo '<p><strong>Version</strong></p>';
    $data = get_post_meta($post->ID, '_component_details_version', true);
    echo '<input type="text" name="_component_details_version" value="' . $data . '" class="widefat"/>';

    echo '<p><strong>Description</strong></p>';
    $data = get_post_meta($post->ID, '_component_details_description', true);
    echo '<textarea rows="2" cols="40" name="_component_details_description" class="widefat">' . $data . '</textarea>';

    echo '<p><strong>Github</strong></p>';
    $data = get_post_meta($post->ID, '_component_details_github', true);
    echo '<input type="text" name="_component_details_github" value="' . $data . '" class="widefat"/>';

    echo '<p><strong>NPM</strong></p>';
    $data = get_post_meta($post->ID, '_component_details_npm', true);
    echo '<input type="text" name="_component_details_npm" value="' . $data . '" class="widefat"/>';
}

function save_flare_component_details() {

    global $post;

    if (!wp_verify_nonce($_POST['component_details_meta_noncename'], plugin_basename(__FILE__))) {

        return $post->ID;
    }



    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;


    $key = '_component_details_description';
    $component_details = [
        "description" => '_component_details_description',
        "version" => '_component_details_version',
        "github" => '_component_details_github',
        "npm" => '_component_details_npm'
    ];

    foreach ($component_details as $detail => $key) {
        if ($value = isset($_POST[$key])) {
            $value = $_POST[$key];
            if (get_post_meta($post->ID, $key, FALSE)) {

                update_post_meta($post->ID, $key, $value);
            } else {

                add_post_meta($post->ID, $key, $value);
            }

            if (!$value)
                delete_post_meta($post->ID, $key); // Delete if blank
        }
    }
}

add_action('save_post_components', 'save_flare_component_details');

//Now adding support for documentation
function flare_twentysixteen_component_docs_add_query_vars_filter($vars) {
    $vars[] = "docs-version";
    $vars[] = "docs-page";
    return $vars;
}

add_filter('query_vars', 'flare_twentysixteen_component_docs_add_query_vars_filter');

function custom_rewrite_flare_components() {
    //add_rewrite_rule('^components/([^/]+)/docs/([^/]+)/(.*)$','index.php?pagename=$matches[1]&docs-version=$matches[2]&docs-page=matches[3]','top');
    //add_rewrite_rule('^components/([^/]*)/?','index.php?pagename=$matches[1]&docs-version=$matches[1]','top');
    //http://example.com/nutrition/milkshakes/strawberry/
    //pagename=asd&docs-version=asd
}

add_action('init', 'custom_rewrite_flare_components');

/**
 * JSDoc Functionality
 */
function save_flare_component_jsdoc() {
    global $post;


    /* --- security verification --- */
    if (!wp_verify_nonce($_POST['component_jsdoc_noncename'], plugin_basename(__FILE__))) {
        return;
    } // end if

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    } // end if


    if (!current_user_can('edit_page', $post->ID)) {
        return;
    } // end if
    //
       
       
    // Make sure the file array isn't empty
    if (!empty($_FILES['_component_jsdoc']['name'])) {

        
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['_component_jsdoc']['name']));
        //$uploaded_type = $arr_file_type['type'];



        $upload = file_get_contents($_FILES['_component_jsdoc']['tmp_name']);

        add_post_meta($post->ID, '_component_jsdoc', $upload);
        update_post_meta($post->ID, '_component_jsdoc', $upload);
    } // end if
    //update_post_meta($post->ID, '_component_jsdoc', $docs);
}

function flare_component_jsdoc() {

    global $post;
    $doc = get_post_meta($post->ID, '_component_jsdoc', true);

    echo '<input type="hidden" name="component_jsdoc_noncename" id="component_jsdoc_noncename" value="' .
    wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    $html = '<p>';
    $html .= '<strong>Upload Jsdoc JSON.</strong>';
    $html .= '</p>';
    $html .= '<input type="file" id="_component_jsdoc" name="_component_jsdoc" value="" size="25" />';

    echo $html;
}

add_action('save_post_components', 'save_flare_component_jsdoc');