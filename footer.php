<div id="ligne"></div>
<footer>
   

   
   
<?php
get_template_part('/templates_part/modale');
wp_nav_menu([
   'theme_location' => 'footer',
   'container' => false,
   'menu_class' => 'footer-nav-politique'
])
?>

</footer>
<?php wp_footer() ?>

</body>
</html>