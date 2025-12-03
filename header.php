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
        <?php if ( ! get_theme_mod( 'hide_main_nav', false ) ) : ?>
            <nav id="site-navigation" class="site-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu row',
                    )
                );
                ?>
            </nav>
        <?php endif; ?>
    </header>
    <div class="content">
    <div class="site-logo" style="top:15px;left:15px;z-index:1000;">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/GPM_edited_edited.avif" alt="Site Logo" style="height:80px;width:auto;">
        </a>
    </div>