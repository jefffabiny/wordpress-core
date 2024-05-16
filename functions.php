<?php
function theme_setup()
{
    // Enqueue scripts and styles
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '', true);
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom.min.css', array(), '1.0', 'all');
    wp_enqueue_style('core-styles', get_template_directory_uri() . '/css/core.min.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'theme_setup');

function custom_theme_setup()
{
    // Add support for custom menus
    add_theme_support('menus');
}

add_action('after_setup_theme', 'custom_theme_setup');
function register_theme_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));
}
add_action('init', 'register_theme_menus');
