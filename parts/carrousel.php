<?php
// Récupérer l'ID du post depuis l'URL
$post_id = is_preview() ? intval($_GET['preview_id']) : get_queried_object_id();

// Vérifier si l'ID du post est valide
if ($post_id > 0) {

    // Paramètres de la requête WP_Query
    $args = array(
        'post_type' => 'photos',
        'post_per_page' => -1, // Utiliser l'ID du post pour récupérer un post spécifique
        'orderby' => 'annee',
    );

    $posts_array = get_posts($args);

    // Utilisez array_search pour trouver l'index de l'élément
    $current_index = array_search($post_id, array_column($posts_array, 'ID'));
    $prev_index = $current_index - 1;
    $next_index = $current_index + 1;

    $prev_post = $posts_array[$prev_index];
    // Générer le lien du post à partir de l'ID
    $prev_post_link = get_permalink($prev_post->ID);
    $prev_post_image = get_field('image', $prev_post->ID);

    $next_post = $posts_array[$next_index];
    // Générer le lien du post à partir de l'ID
    $next_post_link = get_permalink($next_post->ID);
    $next_post_image = get_field('image', $next_post->ID);
}
?>

<div class="carrousel-container">
    <div class="carrousel">

        <?php
        // Affichage de l'image si elle existe
        if ($prev_post_image):
            ?>
            <img class="contain prev-image hide-image" src="<?php echo esc_url($prev_post_image['url']); ?>"
                alt="Description de l'image" data-image="<?php echo esc_url($prev_post_image['url']); ?>">
        <?php endif; ?>
        <?php
        // Affichage de l'image si elle existe
        if ($next_post_image):
            ?>
            <img class="contain next-image hide-image" src="<?php echo esc_url($next_post_image['url']); ?>"
                alt="Description de l'image" data-image="<?php echo esc_url($next_post_image['url']); ?>">
        <?php endif; ?>
    </div>
    <div class="arrow">
        <a href="<?php echo $prev_post_link ?>">
            <img class="prev" src="<?php echo get_template_directory_uri(); ?>/assets/images/Line_6.svg" />
        </a>
        <a href="<?php echo $next_post_link ?>">
            <img class="next" src="<?php echo get_template_directory_uri(); ?>/assets/images/Line_7.svg" />
        </a>
    </div>
</div>