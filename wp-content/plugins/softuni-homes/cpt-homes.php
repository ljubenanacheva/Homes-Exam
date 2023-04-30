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
		'rewrite'            => array( 'slug' => 'Home' ),
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