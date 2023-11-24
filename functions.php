<?php


function theme_enqueue_style()
{
  wp_enqueue_style('header-style', get_template_directory_uri() . '/style.css');
 
}
add_action('wp_enqueue_scripts', 'theme_enqueue_style');


function scripts() {
  wp_enqueue_style( 'style-name', get_stylesheet_uri() );

  wp_enqueue_script( 'script-name', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
   
}
    add_action( 'wp_enqueue_scripts', 'scripts' );






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
  $args = array(   'post_type' => 'photo',   'posts_per_page' => 12 );  $query = new WP_Query($args);
  if($query->have_posts()) {
  $response = $query;
  } else {
  $response = false;
  }
  
  wp_send_json($response);
  wp_die();
  }
  add_action( 'wp_ajax_request_photo', 'motaphoto_request_photo' ); 
  add_action( 'wp_ajax_nopriv_request_photo', 'motaphoto_request_photo' );

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


    