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
            $annee = get_field('annee');
            $image = get_field('image');

        endwhile;
        wp_reset_postdata();
    endif;
} else {
    echo 'ID du post non valide.';
}
?>


<div class="same-photos">
    <img class="contain" src="<?php echo esc_url($image['url']); ?>" alt="Description de l'image">
    <img class="contain" src="<?php echo esc_url($image['url']); ?>" alt="Description de l'image">
</div>