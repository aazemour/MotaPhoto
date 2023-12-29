<?php get_header(); ?>

<form method="get" id="filters-form">
    <div class="filter">
        <div class="filter-dropdown">
            <label for="category_filter"></label>
            <?php wp_dropdown_categories(
                array(
                    'taxonomy' => 'categorie',
                    'name' => 'category_filter',
                    'show_option_all' => 'CATÉGORIES',
                    'hide_empty' => 0,
                    'hierarchical' => 1,
                )
            ); ?>
        </div>

        <div class="filter-dropdown">
            <label for="format_filter"></label>
            <?php wp_dropdown_categories(
                array(
                    'taxonomy' => 'format',
                    'name' => 'format_filter',
                    'show_option_all' => 'FORMATS',
                    'hide_empty' => 0,
                    'hierarchical' => 1,
                )
            ); ?>
        </div>
    </div>

    <div class="tri">
        <div class="filter-dropdown">
            <label for="year_filter"></label>
            <select name="year_filter">
                <option value="">TRIER PAR</option>
                <?php
                // Récupérer toutes les années distinctes de vos photos
                $years = get_posts(
                    array(
                        'post_type' => 'photos',
                        'posts_per_page' => -1,
                        'fields' => 'ids',
                        'meta_key' => 'annee',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                    )
                );

                // Afficher les options
                foreach ($years as $year) {
                    echo '<option value="' . $year . '">' . $year . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
</form>



<?php get_footer(); ?>