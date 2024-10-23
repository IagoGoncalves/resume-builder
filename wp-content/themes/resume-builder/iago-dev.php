<?php 
    $data = array(
        'name'          => _x('Datas', 'post type general name'),
        'singular_name' => _x('Data', 'post type singular name'),
        'menu_name'     => 'Currículos',
    );
    $args = array(
        'labels'            => $data,
        'description'       => 'Custom Post for data',
        'public' => true,
        'show_ui'           => true, 
        'show_in_menu'      => true,
        'has_archive' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-universal-access',
    );
    register_post_type('data', $args);
    flush_rewrite_rules();