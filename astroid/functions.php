<?php
/*
Astroid functions and definitions
@link https://developer.wordpress.org/themes/basics/theme-functions/
@package WordPress
@subpackage Astroid
@since Astroid 0.1.0
*/

if ( ! function_exists('astroid_support') ) :
    /*
    Sets up theme defaults and registers support for various WordPress features.
    @since Astroid 0.1.0
    @return void
    */
    function astroid_support() {
        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );
        // Enqueue editor styles.
        add_editor_style( 'style.css' );
    }
endif;

add_action( 'after_setup_theme', 'astroid_support');

if ( ! function_exists('astroid_styles') ) :
    /*
    Enqueue styles.
    @since Astroid 0.1.0
    @return void
    */
    function astroid_styles() {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get( 'Version' );
        $version_string = is_string( $theme_version ) ? $theme_version : false;
        wp_register_style(
            'astroid-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $version_string
        );
        // Enqueue theme stylesheet.
        wp_enqueue_style( 'astroid-style' );

    }
endif;

add_action( 'wp_enqueue_scripts', 'astroid_styles');

/* Add block patterns */
require get_template_directory() . '/inc/block-patterns.php';
