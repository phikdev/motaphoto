<?php
function register_my_menu() {
    register_nav_menu( 'main-menu' => __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );