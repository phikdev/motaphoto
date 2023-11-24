
<?php 
    $current_category = get_the_terms(get_the_ID(), 'categorie');
    $the_query = new WP_Query(array(
        'orderby' => 'rand',
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'tax_query' => array(
            array(
                // Prendre les images de la taxonomie de "catégorie"
                'taxonomy' => 'categorie',
                // Prendre l'ID de la photo affichée sur le single.php
                'field' => 'term_id',
                'terms' => $current_category[0]->term_id, // Utilisez la catégorie actuelle
            ),
        ),
    ));?>
    <div id="photo-galerie">
        <?php
    if($the_query->have_posts()):
    while ($the_query -> have_posts()) {
        $the_query -> the_post();
        
           the_post_thumbnail();
        
    } 
    ?>
    </div>
    <?php
    wp_reset_postdata();
endif;
?>