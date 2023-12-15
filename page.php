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
        <h1 id="titre-header"><img src="<?php echo get_stylesheet_directory_uri().'/assets/images/Titre-header.png' ?>" alt=""><h1>
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
								?><option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option><?php
							endforeach;
						?>
					</select>
				<?php
			endif;
		        ?>
            </select>
            <?php
			$formats = get_terms( // you can use get_categories() function as well
				array(
					// you can replace the taxonomy parameter value with any custom taxonomy name or 'post_tag'
					'taxonomy' => 'format',
					'orderby' => 'name',
				) 
			);
            if( $formats ) :
				?>
					<select class="formats" id="format-filter">
						<option value="">FORMATS</option>
						<?php
							foreach ( $formats as $category ) :
								?><option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option><?php
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
        <!-- <img id="left" src="<?php echo get_stylesheet_directory_uri().'/assets/images/fullscreen.png' ?>"/> -->
            <?php the_content(); ?>
        </div>

        <?php
             }
        } else {

        echo 'Aucune photo trouvé.';
        }

        wp_reset_postdata();?>
    </div>    
</div>


		<button id="btn2" type="button">Toutes les photos</button>
		
<?php
get_footer();
?>
<script>
    var page = 1; // Compteur de page initial

document.getElementById('btn2').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo admin_url("admin-ajax.php"); ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('posts-container').innerHTML += this.responseText;
            page++;
        }
    };
    xhr.send('action=load_more_photos&page=' + page);
});
</script>
