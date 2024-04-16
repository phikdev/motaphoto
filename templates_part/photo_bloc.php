
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
    while ($query -> have_posts())  {
        
        $query -> the_post();
        ?>
        <div class="photo-hover-container">
           <?php the_post_thumbnail();?>


           
            <div class="photo-hover-overlay">
                <a href="<?php the_permalink(); ?>" class="photo-link">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/oeil.png" alt="Voir l'article">
                </a>
            </div>
                <div class="photo-title">
                    <?php echo get_field ('reference');?>
                </div>
                <div class="photo-categorie">
                <?php 
                $categorie = get_the_terms( get_the_ID(), 'categorie' );
                echo $categorie[0]->name;
                ?>
                </div>
        
            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="photo-fullscreen-link" data-lightbox="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fullscreen.png" alt="Plein écran" class="icon-fullscreen"/>
            </a>
        </div>
      <?php
    } 
    ?>
      
    </div>
    <?php
    wp_reset_postdata();
endif;
?>