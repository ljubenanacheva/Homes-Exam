<?php
/**
 *  This function takes care of enqueue the assets of the project
 */
function softuni_assets() {
    wp_enqueue_style( 'softuni-jobs', get_stylesheet_directory_uri() . '/assets/css/master.css', array(), filemtime(  get_template_directory() . '/assets/css/master.css' ) );
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );

/**
 * This function takes care of the custom menu of the project
 */
function softuni_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu Name', 'softuni' ),
        'footer_menu'  => __( 'Footer Menu', 'softuni' ),
    ) );
}
add_action( 'after_setup_theme', 'softuni_register_nav_menu', 0 );
