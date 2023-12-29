<?php
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <title>Mota Photo</title>
</head>

<body>

    <header>
        <?php
        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 1,
            'orderby' => 'rand'
        );
        $your_query = new WP_Query($args);

        if ($your_query->have_posts()):

            while ($your_query->have_posts()):
                $your_query->the_post();
                // On récupère les champs ACF nécessaires
                $image = get_field('image');

            endwhile;
            wp_reset_postdata();
        endif;

        ?>
        <div class="logo-nav">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.png"
                    alt="Logo Nathalie Mota" />
            </div>
            <div class="menu">
                <?php
                if (has_nav_menu('header-menu')):
                    ?>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'menu_class' => 'my-header-menu',
                        )
                    );
                    ?>
                <?php endif; ?>
            </div>
        </div>

        <?php
        // Vérifie si la page actuelle n'est pas la page unique "single-photos.php"
        if (!is_page_template('single-photos.php')):
            ?>
            <div class="hero">
                <?php
                // Affichage de l'image si elle existe
                if ($image):
                    ?>
                    <img class=" image-titre" src="<?php echo esc_url($image['url']); ?>" alt="Description de l'image">
                <?php endif; ?>
                <img class="titre-site"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/PHOTOGRAPHE_EVENT.png" />
            </div>
        <?php endif; ?>
    </header>