<?php

function enqueue_scripts() {
    wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


// Task 2:- redirect the user away from the site if their IP address starts with 77.29
function redirect_users_with_ip() {
    // Current user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // IP address pattern to check
    $ip_pattern = '77.29';

    // If the user's IP address starts with the pattern
    if (strpos($user_ip, $ip_pattern) === 0) {
        wp_redirect('https://google.com/'); // This will redirect to Google page
        exit();
    }
}
add_action('init', 'redirect_users_with_ip');


// Task 3:- Post type called "Projects" and taxonomy "Project Type"

// Register Custom Post Type
function register_projects_post_type() {
    $labels = array(
        'name'                  => __( 'Projects', 'text_domain' ),
        'singular_name'         => __( 'Project', 'text_domain' ),
        'menu_name'             => __( 'Projects', 'text_domain' ),
        'all_items'             => __( 'All Projects', 'text_domain' ),
        'add_new'               => __( 'Add New Project', 'text_domain' ),
        'new_item'              => __( 'New Project', 'text_domain' ),
        'edit_item'             => __( 'Edit Project', 'text_domain' ),
        'update_item'           => __( 'Update Project', 'text_domain' ),
        'view_item'             => __( 'View Project', 'text_domain' ),
        'search_items'          => __( 'Search Projects', 'text_domain' ),
    );
    $args = array(
        'labels'                => $labels,
        'label'                 => __( 'Project', 'text_domain' ),
        'description'           => __( 'Custom post type for projects', 'text_domain' ),
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'project_type' ),
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
    );
    register_post_type( 'projects', $args );
}
add_action( 'init', 'register_projects_post_type');

// Register Custom Taxonomy
function register_project_type_taxonomy() {
    $labels = array(
        'name'                       => __( 'Project Types', 'text_domain' ),
        'singular_name'              => __( 'Project Type', 'text_domain' ),
        'menu_name'                  => __( 'Project Type', 'text_domain' ),
        'all_items'                  => __( 'All Project Types', 'text_domain' ),
        'parent_item'                => __( 'Parent Project Type', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Project Type:', 'text_domain' ),
        'add_new_item'               => __( 'Add New Project Type', 'text_domain' ),
        'edit_item'                  => __( 'Edit Project Type', 'text_domain' ),
        'update_item'                => __( 'Update Project Type', 'text_domain' ),
        'view_item'                  => __( 'View Project Type', 'text_domain' ),
        'search_items'               => __( 'Search Project Types', 'text_domain' ),
        'not_found'                  => __( 'No Project Type Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'project_type', array( 'projects' ), $args );
}
add_action( 'init', 'register_project_type_taxonomy');