<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <title>Mota Photo</title>
</head>

<body>
    <header class="header">
        <div>
            <img class="logo" src="wp-content/themes/MotaPhoto/assets/images/Logo.png" alt="Logo Nathalie Mota"></img>
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
    </header>