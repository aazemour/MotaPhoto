<?php
// Inclure le fichier de la modale de contact
include get_template_directory() . '/parts/modale_contact.php';
?>
<hr />
<?php
if (has_nav_menu('footer-menu')): ?>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'my-footer-menu',
            // classe CSS pour customiser mon menu
        )
    ); ?>
<?php endif;
?>

</body>

</html>