<?php


function theme_enqueue_style()
{
  wp_enqueue_style('header-style', get_template_directory_uri() . '/style.css');
 
}
add_action('wp_enqueue_scripts', 'theme_enqueue_style');


function scripts() {
    // Enregistrement de votre feuille de style
    wp_enqueue_style('style-name', get_stylesheet_uri());

    // Enregistrement de votre script JavaScript
    wp_enqueue_script('script-name', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);

    // Localisation du script pour les requêtes AJAX
    wp_localize_script('script-name', 'load_more_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'), // URL pour les requêtes AJAX
        'nonce' => wp_create_nonce('load_more_photos_nonce') // Nonce pour la sécurité
    ));
}
add_action('wp_enqueue_scripts', 'scripts');







function montheme_supports()
{
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}

add_action('after_setup_theme', 'montheme_supports');

add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() { 
    $defaults = array( 
      'height' => 100, 
      'width' => 300, 
      'flex-height' => true, 
      'flex-width' => true, 
      'header-text' => array( 'site-title', 'site-description' ), 
      'unlink-homepage-logo' => false, 
    ); 
 
    add_theme_support( 'custom-logo', $defaults ); 
 } 
 add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

 function motaphoto_request_photo() {
    $paged = isset($_POST['page']) ? $_POST['page'] : 1;
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'paged' => $paged,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->the_post()) {
            echo '<div class="photo">';
            the_post_thumbnail('large'); // ou tout autre format que vous souhaitez
            echo '</div>';
        }
    } else {
        echo 'no_more_photos';
    }

    wp_die();
}

add_action('wp_ajax_request_photo', 'motaphoto_request_photo'); 
add_action('wp_ajax_nopriv_request_photo', 'motaphoto_request_photo');


  function motaphoto_scripts() {
    wp_enqueue_script('motaphoto', get_template_directory_uri() . '/assets/js/motaphoto.js', array('jquery'), '1.0.0', true);
    wp_localize_script('motaphoto', 'motaphoto_js', array('ajax_url' => admin_url('admin-ajax.php')));
    }
    
    add_action('wp_enqueue_scripts', 'motaphoto_scripts');

    function add_search_form($items, $args) {
      if($args->theme_location == 'header' ){
      $items .= '<li class="myBtn">'
              . 'CONTACT'
              . '</li>';
      }
    return $items;
  }
  add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);


  


    /*FILTRES*/
    function filter_photos() {
      $category = $_POST['category'];
      $format = $_POST['format'];
      $order = $_POST['order'];
  
      $args = array(
          'post_type' => 'photo',
          'posts_per_page' => -1, //12?
          'orderby' => 'date',
          'order' => $order ? $order : 'DESC'
      );
  
      // Ajoutez des conditions de filtrage si des filtres sont sélectionnés
      if($category) {
          $args['tax_query'][] = array(
              'taxonomy' => 'categorie',
              'field'    => 'term_id',
              'terms'    => $category
          );
      }
  
      if($format) {
          $args['tax_query'][] = array(
              'taxonomy' => 'format',
              'field'    => 'term_id',
              'terms'    => $format
          );
      }
  
      $query = new WP_Query($args);
  
      if ($query->have_posts()) {
          while ($query->have_posts()) {
              $query->the_post();
              // Générez et affichez chaque post
              
              get_template_part('templates_part/content');
              
          }
      } else {
          echo 'Aucune photo trouvée.';
      }
  
      wp_die();
  }
  
  add_action('wp_ajax_filter_photos', 'filter_photos');
  add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');
  
    


  function weichie_load_more() {
    $paged = $_POST['paged'];
    $ajaxposts = new WP_Query([
      'post_type' => 'photo',
      'posts_per_page' => 12,
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged,
    ]);

    $response = '';
    if ($ajaxposts->have_posts()) {
      ob_start();
      while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
        get_template_part('templates_part/content');
      endwhile;
      $response = ob_get_clean();
    }

    // Déterminer s'il y a plus de posts à charger
    $more_posts = $paged < $ajaxposts->max_num_pages;

    echo json_encode(array(
        'html' => $response,
        'more' => $more_posts // true s'il y a plus de posts, false sinon
    ));
    exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');







