<?php

// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                => __( 'Portfolio', 'Post Type General Name', 'folioum' ),
        'singular_name'       => __( 'Portfolio', 'Post Type Singular Name', 'folioum' ),
        'menu_name'           => __( 'Portfolio', 'folioum' ),
        'parent_item_colon'   => __( 'Parent Portfolio:', 'folioum' ),
        'all_items'           => __( 'All Portfolios', 'folioum' ),
        'view_item'           => __( 'View Portfolio', 'folioum' ),
        'add_new_item'        => __( 'Add New Portfolio', 'folioum' ),
        'add_new'             => __( 'New Portfolio', 'folioum' ),
        'edit_item'           => __( 'Edit Portfolio', 'folioum' ),
        'update_item'         => __( 'Update Portfolio', 'folioum' ),
        'search_items'        => __( 'Search portfolios', 'folioum' ),
        'not_found'           => __( 'No portfolios found', 'folioum' ),
        'not_found_in_trash'  => __( 'No portfolios found in Trash', 'folioum' ),
    );
    $args = array(
        'label'               => __( 'portfolio', 'folioum' ),
        'description'         => __( 'Portfolio information pages', 'folioum' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail', 'editor', 'title' ),
        'taxonomies'          => array( 'Portfolio_category','skin' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => get_template_directory_uri().'/images/admin_ico_portfolio.png',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'rewrite'             => array( 'slug' => 'du-an' ),
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );


// Register taxonomies

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomies', 0 );

// create skin taxonomy
function create_portfolio_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Skin', 'taxonomy general name' ),
        'singular_name'     => _x( 'Skin', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Skins', 'folioum' ),
        'all_items'         => __( 'All Skins' ),
        'parent_item'       => __( 'Parent Skin' ),
        'parent_item_colon' => __( 'Parent Skin:' ),
        'edit_item'         => __( 'Edit Skin' ),
        'update_item'       => __( 'Update Skin' ),
        'add_new_item'      => __( 'Add New Skin' ),
        'new_item_name'     => __( 'New Skin Name' ),
        'menu_name'         => __( 'Skin' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite' => array( 'slug' => 'cong-trinh' ),
    );

    register_taxonomy( 'skin',array('portfolio'), $args );
}




