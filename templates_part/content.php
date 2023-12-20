<div class="content">
    <div class="photo-hover-container">
        <?php the_content(); ?>
            <div class="photo-hover-overlay">
                <a href="<?php the_permalink(); ?>" class="photo-link">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/oeil.png" alt="Voir l'article">
                </a>
            </div>
                <div class="photo-title">
                    <?php echo get_field ('reference');?>
                </div>
        
            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="photo-fullscreen-link" data-lightbox="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fullscreen.png" alt="Plein écran" class="icon-fullscreen"/>
            </a>
    </div>
</div>