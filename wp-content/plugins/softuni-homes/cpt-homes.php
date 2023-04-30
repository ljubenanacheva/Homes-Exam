<?php
/**
 * Register a custom post type called "home".
 */
function softuni_homes_cpt() {
	
	$labels = array(
		'name'                  => _x( 'Homes', 'Post type general name', 'softuni' ),
		'singular_name'         => _x( 'Home', 'Post type singular name', 'softuni' ),
		'menu_name'             => _x( 'Homes', 'Admin Menu text', 'softuni' ),
		'name_admin_bar'        => _x( 'Home', 'Add New on Toolbar', 'softuni' ),
		'add_new'               => __( 'Add New', 'softuni' ),
		'add_new_item'          => __( 'Add New Home', 'softuni' ),
		'new_item'              => __( 'New Home', 'softuni' ),
		'edit_item'             => __( 'Edit Home', 'softuni' ),
		'view_item'             => __( 'View Home', 'softuni' ),
		'all_items'             => __( 'All Homes', 'softuni' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'home' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true
	);

	register_post_type( 'home', $args );

    // flush_rewrite_rules();
}

add_action( 'init', 'softuni_homes_cpt' );

/**
 * This is a function registering a custom Home Location taxonomy
 */
function softuni_homes_location_taxonomy() {
    $labels = array(
		'name'              => _x( 'Location', 'taxonomy general name', 'softuni' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'softuni' ),
		'search_items'      => __( 'Search Locations', 'softuni' ),
		'all_items'         => __( 'All Locations', 'softuni' ),
		'parent_item'       => __( 'Parent Location', 'softuni' ),
		'parent_item_colon' => __( 'Parent Location:', 'softuni' ),
		'edit_item'         => __( 'Edit Location', 'softuni' ),
		'update_item'       => __( 'Update Locations', 'softuni' ),
		'add_new_item'      => __( 'Add New Location', 'softuni' ),
		'new_item_name'     => __( 'New Location Name', 'softuni' ),
		'menu_name'         => __( 'Location', 'softuni' ),
	);

    $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true
	);

    register_taxonomy( 'location', 'home', $args );
}

add_action( 'init', 'softuni_homes_location_taxonomy' );

/**
 * This is a function registering a custom Home Seller taxonomy
 */
function softuni_homes_seller_taxonomy() {
    $labels = array(
		'name'              => _x( 'Seller', 'taxonomy general name', 'softuni' ),
		'singular_name'     => _x( 'Seller', 'taxonomy singular name', 'softuni' ),
		'search_items'      => __( 'Search Companies', 'softuni' ),
		'all_items'         => __( 'All Companies', 'softuni' ),
		'parent_item'       => __( 'Parent Seller', 'softuni' ),
		'parent_item_colon' => __( 'Parent Seller:', 'softuni' ),
		'edit_item'         => __( 'Edit Seller', 'softuni' ),
		'update_item'       => __( 'Update Companies', 'softuni' ),
		'add_new_item'      => __( 'Add New Seller', 'softuni' ),
		'new_item_name'     => __( 'New Seller Name', 'softuni' ),
		'menu_name'         => __( 'Seller', 'softuni' ),
	);

    $args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true
	);

    register_taxonomy( 'seller', 'home', $args );
}

add_action( 'init', 'softuni_homes_seller_taxonomy' );
