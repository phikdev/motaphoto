<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motaphoto</title>
    <?php wp_head() ?>
</head>
<body>
    <header>
    <nav id="nav">
<?php if ( function_exists( 'the_custom_logo' ) ) {
  the_custom_logo();
}?>

<div id="icons"></div>
<?php wp_nav_menu([
   'theme_location' => 'header',
   'container' => false,
   'menu_class' => 'navbar-nav'
])
?>
<!-- <button id="myBtn">Open Modal</button> -->
<div id="mobile">
<ul>
    <li id="first"><a href='http://motaphoto/'> accueil</a></li>
    <li><a href='http://motaphoto/a-propos/'> à propos</a></li>
    <li><a href='http://motaphoto/contact/'> contact</a></li>
</ul>
</div>
</nav>
    </header>
    
