<?php 
    $data = array(
        'name'          => _x('Datas', 'post type general name'),
        'singular_name' => _x('Data', 'post type singular name'),
        'menu_name'     => 'Dados',
    );
    $args = array(
        'labels'            => $data,
        'description'       => 'Custom Post for data',
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-universal-access',
    );
    register_post_type('data', $args);

    $banner = array(
        'name'          => _x('Banners', 'post type general name'),
        'singular_name' => _x('Banner', 'post type singular name'),
        'menu_name'     => 'Banners',
    );
    $args = array(
        'labels'            => $banner,
        'description'       => 'Custom Post for banners',
        'public' => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor','revisions', 'thumbnail'),
        'menu_icon' => 'dashicons-images-alt',
    );
    register_post_type('Banners', $args);


    flush_rewrite_rules();