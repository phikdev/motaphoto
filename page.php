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




defined( 'ABSPATH' ) || exit;

get_header();


$container = get_theme_mod('understrap_container_type');

?>


<div class="photoHero">
        <h1 id="titre-header">
            <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/Titre-header.png' ?>" alt="photo-header">
        <h1>
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
    

<div id="CP" class="galerie">

    <div id="selectAll">
        <div id="select1">  
            <?php
			$categories = get_terms( // you can use get_categories() function as well
				array(
					// you can replace the taxonomy parameter value with any custom taxonomy name or 'post_tag'
					'taxonomy' => 'categorie',
					'orderby' => 'name',
				) 
			);
            
            if( $categories ) :
				?>
					<select id="category-filter">
						<option value="">CATEGORIES</option>
						<?php
							foreach ( $categories as $category ) :
								?><option id="option" value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option><?php
							endforeach;
						?>
					</select>
				<?php
			endif;
		        ?>
            </select>
            <?php
			$formats = get_terms( 
				array(
					
					'taxonomy' => 'format',
					'orderby' => 'name',
				) 
			);
            if( $formats ) :
				?>
					<select class="formats " id="format-filter">
						<option value="">FORMATS</option>
						<?php
							foreach ( $formats as $category ) :
						?>
                        <option value="<?php echo $category->term_id ?>"><?php echo $category->name ?>
                        </option>
                        <?php
							endforeach;
						?>
					</select>
				        <?php
			                endif;
		                ?>
                    </select>
            


        </div> 

        <div id="select2">
            <select id="date-filter">
                <option value="">TRIER PAR</option>
                <option value="ASC">Les plus récentes</option>
                <option value="DESC">Les plus anciennes</option>
            </select>
        </div>
    </div>
    <div id="posts-container">
        <?php 
        $publications = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
        ]);
        ?>

        <?php if($publications->have_posts()): ?>
        
            <?php 
            while ($publications->have_posts()): $publications->the_post();
            get_template_part('templates_part/content');
            endwhile;
            ?>
        
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>    
</div>


<button id="btnL" type="button">Charger plus</button>



		
        <?php
        get_footer();
        ?>




<!-- <script>document.addEventListener('DOMContentLoaded', function() {
    var categoryFilter = document.getElementById('category-filter');
    var formatFilter = document.getElementById('format-filter');
    var dateFilter = document.getElementById('date-filter');

    categoryFilter.addEventListener('change', function() {
        this.classList.toggle('selected-category', this.selectedIndex !== 0);
    });

    formatFilter.addEventListener('change', function() {
        this.classList.toggle('selected-format', this.selectedIndex !== 0);
    });

    dateFilter.addEventListener('change', function() {
        this.classList.toggle('selected-date', this.selectedIndex !== 0);
    });
});

</script> -->
