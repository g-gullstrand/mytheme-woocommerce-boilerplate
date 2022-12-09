<?php

error_log(get_stylesheet_directory_uri() . '/style.css');

function mytheme_scripts() {
    wp_register_style( 'mytheme-styles', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'mytheme-styles' );
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );


/**
 * Mini cart related functions
 */
require get_template_directory() . '/inc/mini-cart.php';