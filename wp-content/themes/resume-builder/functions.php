<?php

function iagodev_load_scripts(){
    wp_enqueue_style( 'iagodev-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', array(), null );
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '' );
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'iagodev_load_scripts' );

function iagodev_config(){

    $textdomain = 'iagodev';
    load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

    register_nav_menus(
        array(
            'iagodev_main_menu' => esc_html__( 'Main Menu', 'iagodev' ),
        )
    );

    $args = array(
        'height'    => 225,
        'width'     => 1920
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'width' => 200,
        'height'    => 110,
        'flex-height'   => true,
        'flex-width'    => true
    ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'gallery', 'caption', 'style', 'script' ));
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'iagodev_config', 0 );

add_action('init', 'iagodev_register_post_type');
function iagodev_register_post_type(){
    include_once get_template_directory() . '/iago-dev.php';
}

if ( ! function_exists( 'wp_body_open' ) ){
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

function limit_characters($conteudo, $limite) {
    if (strlen($conteudo) > $limite) {
        return substr($conteudo, 0, $limite) . '...';
    } else {
        return $conteudo;
    }
}

function redirect_empty_search_to_404() {
    if ( is_search() && !have_posts() ) {
        wp_redirect( home_url( '/404.php' ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_empty_search_to_404' );

function jokerClown() {
    $user = wp_get_current_user();

    if ($user->user_login !== WP_UR_U) {
        remove_menu_page('edit.php');                    
        remove_menu_page('edit-comments.php');           
        remove_menu_page('themes.php');                  
        remove_menu_page('plugins.php');                 
        remove_menu_page('users.php');                   
        remove_menu_page('tools.php');                   
        remove_menu_page('options-general.php');         
        remove_menu_page('edit.php?post_type=acf-field-group');
    }
}
add_action('admin_menu', 'jokerClown', 999);
