<?php
function theme_setup()
{
    // Enqueue scripts and styles
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '', true);
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom.css', array(), '1.0', 'all');
    wp_enqueue_style('core-styles', get_template_directory_uri() . '/css/core.css', array(), '1.0', 'all');
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

function customize_register($wp_customize)
{
    // Add a section under the "Menus" panel for navigation-related theme options
    $wp_customize->add_section('theme_nav_options', array(
        'title' => __('Navigation Options', 'textdomain'),
        'panel' => 'nav_menus',
        'priority' => 160,
    ));

    // Add a setting for hiding the main navigation
    $wp_customize->add_setting('hide_main_nav', array(
        'default'   => false,
        'transport' => 'refresh',
    ));

    // Add a control to toggle the setting
    $wp_customize->add_control('hide_main_nav_control', array(
        'label'    => __('Hide Main Navigation', 'textdomain'),
        'section'  => 'theme_nav_options',
        'settings' => 'hide_main_nav',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'customize_register');
