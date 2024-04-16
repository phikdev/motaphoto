<!-- declaration des variables -->
<?php 
$categorie = get_the_terms( get_the_ID(), 'categorie' );
$format = get_the_terms( get_the_ID(), 'format' );
?>
<?php 
get_header();
?>
<main>
	<section id="single">
 	<div id ="bloc-description">
		<div id="ref">
			<h1 id="titre"><?php the_title()?><h1>
			<h4 id ="description"> RÉfÉRENCE :<span class="data-ref"> <?php echo get_field ('reference');?></span></h4>
			<h4 id ="description">CATÉGORIE : <?php echo $categorie[0]->name;?></h4>
			<h4 id ="description">FORMAT : <?php echo $format[0]->name;?></h4>
			<h4 id ="description">TYPE : <?php echo get_field ('type');?></h4>
			<h4 id ="description">ANNÉE : <?php echo get_the_date('Y') ?></h4>
		</div>
	</div>
	
	<div id="bloc-image">
	<img id="photo" src="<?php echo get_the_post_thumbnail_url() ?>" alt="Photo" > 
	</div>
</section>


<section>
		<div id="trait"></div>
			<div id="suggestion">
				<p>Cette photo vous intéresse ?</p>
				<button class="btn2" id="btn" type="button">Contact</button>
				<div id="selection">
					<div id="small">
						<span class="previous"><?php echo get_the_post_thumbnail(get_previous_post()) ?></span>
						<span class="next"><?php echo get_the_post_thumbnail(get_next_post()) ?></span>
					</div>
		
					<div id="fleche">
						<?php if (get_previous_post()):?>
						<a href="<?php echo get_the_permalink(get_previous_post())?>">
						<img id="left" src="<?php echo get_stylesheet_directory_uri(get_previous_post()).'/assets/images/left.png' ?>"/>
						</a>
						<?php endif;?>
						<?php if (get_next_post()):?>
						<a href=" <?php echo get_the_permalink(get_next_post())?>">
						<img id="right" src="<?php echo get_theme_file_uri('assets/images/right.png') ?>"/>
						</a>
		
						<?php endif;?>
					</div>
		    	</div>
			</div>
</section>
<section id="autre">
		<div id="ligne"></div>
		<h2>Vous aimerez aussi</h2>
	<div id="parent">

		<?php get_template_part('/templates_part/photo_bloc');?>
	
		<div id="load">
			<a href="motaphoto/accueil#CP">
			<button class="btn3"  type="button">Toutes les photos</button>
			</a>
		</div>
	</div>
</section>
</main>



<?php
get_footer();?>

