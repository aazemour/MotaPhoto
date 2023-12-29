<?php
/**
 * Template name: Single photos 
 * Template Post Type: photos
 */

get_header(); ?>

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
			$titre = get_field('titre');
			$references = get_field('references');
			$categorie = get_field('categorie');
			$format = get_field('format');
			$type = get_field('type');
			$annee = get_field('annee');
			$image = get_field('image');

		endwhile;
		wp_reset_postdata();
	endif;
} else {
	echo 'ID du post non valide.';
}
?>

<div id="ajax-call" class="post-photos">
	<div id="ajax-return" class="overlay-content">
		<div class="description-photo">
			<div class="photo-description">
				<div class="description">
					<h2>
						<?php echo esc_html($titre); ?>
					</h2>
					<p>RÉFÉRENCES :
						<?php echo esc_html($references); ?>
					</p>
					<?php
					// Vérifiez si $categorie est un tableau d'objets termes de taxonomie
					if (is_array($categorie) && !empty($categorie)):
						echo '<p>CATÉGORIE: ';

						// Récupérer le terme de taxonomie à partir de son ID
						$term = get_term($categorie[0]);

						// Vérifier si le terme existe avant de l'afficher
						if ($term && !is_wp_error($term)) {
							echo esc_html($term->name);
						} else {
							echo 'Catégorie introuvable';
						}

						echo '</p>';
					else:
						echo '<p>CATÉGORIE: ' . esc_html($categorie) . '</p>';
					endif;
					?>
					<?php
					// Vérifiez si $format est un tableau d'objets termes de taxonomie
					if (is_array($format) && !empty($format)):
						echo '<p>FORMAT: ';

						// Récupérer le terme de taxonomie à partir de son ID
						$term = get_term($format[0]);

						// Vérifier si le terme existe avant de l'afficher
						if ($term && !is_wp_error($term)) {
							echo esc_html($term->name);
						} else {
							echo 'format introuvable';
						}

						echo '</p>';
					else:
						echo '<p>FORMAT: ' . esc_html($format) . '</p>';
					endif;
					?>
					<p>TYPE :
						<?php echo esc_html($type); ?>
					</p>
					<p>ANNÉE :
						<?php echo esc_html($annee); ?>
					</p>
					<hr />
				</div>

				<div class="photo">
					<?php
					// Affichage de l'image si elle existe
					if ($image):
						?>
						<img class="contain" src="<?php echo esc_url($image['url']); ?>" alt="Description de l'image">
					<?php endif; ?>
					<!-- photo -->
				</div>
			</div>

			<div class="contact">
				<div class="bouton-contact">
					<p>Cette photo vous intéresse ?</p>
					<button class="myBtn">Contact</button>
				</div>
				<?php get_template_part('parts/carrousel'); ?>

			</div>
			<hr />
		</div>
		<div class="autres-photos">
			<p>VOUS AIMEREZ AUSSI</p>
			<?php get_template_part('parts/photo_block'); ?>
			<div class="photos-button">
				<button>
					<a href="<?php echo esc_url(home_url('/')); ?>">Toutes les photos</a>
				</button>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>