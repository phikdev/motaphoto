<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motaphoto</title>
    <?php wp_head() ?>
</head>
<body>
<?php if ( function_exists( 'the_custom_logo' ) ) {
  the_custom_logo();
}?>
<?php wp_nav_menu([
   'theme_location' => 'header',
   'container' => false,
   'menu_class' => 'navbar-nav'
])
?>
    
