
<?php
                // Récupère la catégorie de la photo en cours
                $terms = get_the_terms(get_the_ID(), 'categorie');
                if ($terms && !is_wp_error($terms) && is_array($terms)) {
                    $first_category = $terms[0]->slug;
                } else {
                    // Gère le cas où aucune catégorie n'est trouvée.
                    $first_category = 'categorie-par-defaut'; // Remplacez par une valeur par défaut ou laissez vide selon vos besoins.
                }

                // Requête pour récupérer jusqu'à deux photos du même type de catégorie que la photo actuelle
                $args = array(
                    'post_type' => 'photo',
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie',
                            'field'    => 'slug',
                            'terms'    => $first_category,
                        ),
                    ),
                );

                $query = new WP_Query($args);
                
            ?>
          
    <div id="photo-galerie">
        
        <?php
    if($query->have_posts()):
    while ($query -> have_posts()) {
        $query -> the_post();
        
        
            the_post_thumbnail();?>


      <?php
    } 
    ?>
      
    </div>
    <?php
    wp_reset_postdata();
endif;
?>