<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon.png" type="image/x-icon">
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <nav id="site-navigation" class="site-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'primary-menu row',
            ));

            ?>
        </nav>
    </header>
    <div class="content">