<?php

function theme_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/script.js');
    /*wp_localize_script('theme-script', 'motaphoto_js', array('ajax_url' => admin_url('admin-ajax.php')));*/
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

function theme_enqueue_styles()
{
    wp_enqueue_style('motaphoto', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');
    wp_enqueue_style('google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/* création des menus accessibles depuis le dashboard WP */
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

/* Requête WP_Query */

function motaphoto_request_photos()
{
    $query = new WP_Query([
        'post_type' => 'photos',
        'posts_per_page' => 1
    ]);

    if ($query->have_posts()) {
        wp_send_json($query);
    } else {
        wp_send_json(false);
    }

    wp_die();
}

add_action('wp_ajax_request_photos', 'motaphoto_request_photos');
add_action('wp_ajax_nopriv_request_photos', 'motaphoto_request_photos');


/* ref photo modale */

add_filter('shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3);

function custom_shortcode_atts_wpcf7_filter($out, $pairs, $atts)
{
    $my_attr = 'your-subject';

    if (isset($atts[$my_attr])) {
        $out[$my_attr] = $atts[$my_attr];
    }

    return $out;
}

// Fonction de filtrage pour modifier la requête principale
function my_custom_filters($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (isset($_GET['category_filter']) && $_GET['category_filter'] !== '') {
            $query->set(
                'tax_query',
                array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $_GET['category_filter'],
                    ),
                )
            );
        }

        if (isset($_GET['format_filter']) && $_GET['format_filter'] !== '') {
            $query->set(
                'tax_query',
                array(
                    array(
                        'taxonomy' => 'format',
                        'field' => 'slug',
                        'terms' => $_GET['format_filter'],
                    ),
                )
            );
        }
    }
}

// Ajoutez l'action pour appeler la fonction de filtrage
add_action('pre_get_posts', 'my_custom_filters');
