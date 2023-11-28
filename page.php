<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();?>


<div class="photoHero">
<h1 id="titre"><?php the_title()?><h1>
                <?php
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => 1,
                    'orderby' => 'rand',
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post();
                    the_post_thumbnail();
                endwhile;
                wp_reset_postdata();
                ?>
                
            </div>

<div class="galerie">

<?php
$args = array(
    'post_type' => 'photo', 
    'posts_per_page' => 12, 
	'orderby' => 'rand',
);

$query = new WP_Query($args);

// The Loop
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        ?>

        
        <div class="content">
            <?php the_content(); ?>
        </div>

        <?php
    }
} else {

    echo 'Aucune photo trouvé.';
}

wp_reset_postdata();?>
</div>

<?php
get_footer();
?>
