<?php

function theme_enqueue_styles()
{
    wp_enqueue_style('motaphoto', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Menu En-tête'),
            'footer-menu' => __('Menu Pied-de-page'),
        )
    );
}
add_action('init', 'register_my_menus');