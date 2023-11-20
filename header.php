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
        <div class="logo-nav">
            <div class="logo">
                <img src="wp-content/themes/MotaPhoto/assets/images/Logo.png" alt="Logo Nathalie Mota"></img>
            </div>
            <div class="menu">
                <?php
                if (has_nav_menu('header-menu')): ?>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'menu_class' => 'my-header-menu',
                        )
                    ); ?>
                <?php endif;
                ?>
            </div>
        </div>
        <div class="hero">
            <img class="image-titre" src="wp-content/themes/MotaPhoto/assets/images/nathalie-11.jpeg"></img>
            <img class="titre-site" src="wp-content/themes/MotaPhoto/assets/images/PHOTOGRAPHE_EVENT.png"></img>
        </div>
    </header>