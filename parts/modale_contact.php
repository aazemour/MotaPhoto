<!-- The Modal -->
<div id="myModal" class="modal">
    <?php
    // Récupérer l'ID du post depuis l'URL
    $post_id = is_preview() ? intval($_GET['preview_id']) : get_queried_object_id();

    // Vérifier si l'ID du post est valide
    if ($post_id > 0) {

        // Paramètres de la requête WP_Query
        $args = array(
            'post_type' => 'photos',
            'p' => $post_id, // Utiliser l'ID du post pour récupérer un post spécifique
        );

        $your_query = new WP_Query($args);

        if ($your_query->have_posts()):
            while ($your_query->have_posts()):
                $your_query->the_post();
                // On récupère les champs ACF nécessaires
    
                $references = get_field('references');



            endwhile;
            wp_reset_postdata();
        endif;
    } else {
        echo 'ID du post non valide.';
    }
    ?>
    <!-- Modal content -->
    <div class="modal-content">
        <?php
        // Vérifie si la page actuelle n'est pas la page unique "single-photos.php"
        if (!is_page_template('single-photos.php')):
            ?>
        <?php endif; ?>
        <div class="modal-header">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact_header.png" />
        </div>

        <div class="formulaire">
            <?php echo do_shortcode('[contact-form-7 id="f5e91db" title="Formulaire de contact" your-subject="' . esc_html($references) . '"]'); ?>
        </div>
    </div>

</div>