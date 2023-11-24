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

<div class="galerie">

<?php
$args = array(
    'post_type' => 'photo', 
    'posts_per_page' => 8, 
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
