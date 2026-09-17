<?php

function followandrew_theme_support() {
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'followandrew_theme_support');


function followandrew_menus() {

    $locations = array(
        'primary' => 'Desktop Primary Left Sidebar',
        'footer'  => 'Footer Menu Items'
    );

    register_nav_menus($locations);
}

add_action('init', 'followandrew_menus');
 
function followandrew_register_styles() {
    $version = wp_get_theme()->get('Version');
  wp_enqueue_style(
    'followandrew-maincss',
    get_template_directory_uri() . '/blog-site-template-master/css/style.css',
    array('followandrew-bootstrap', 'followandrew-fontawesone'),
    $version ,
    'all'
);

     wp_enqueue_style(
        'followandrew-bootstrap',
        "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",
        array(),
        '4.4.1',
        'all'
    );

     wp_enqueue_style(
        'followandrew-fontawesone',
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css",
        array(),
        '5.13.0',
        'all'
    );
}

add_action('wp_enqueue_scripts', 'followandrew_register_styles');

function followandrew_register_scripts() {

    // jQuery
    wp_enqueue_script(
        'followandrew-jquery',
        'https://code.jquery.com/jquery-3.4.1.slim.min.js',
        array(),
        '3.4.1',
        true
    );

    // Popper.js
    wp_enqueue_script(
        'followandrew-popper',
        'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
        array(),
        '1.16.0',
        true
    );

    // Bootstrap
    wp_enqueue_script(
        'followandrew-bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
        array('followandrew-jquery', 'followandrew-popper'),
        '4.4.1',
        true
    );

    // Main JavaScript
    wp_enqueue_script(
        'followandrew-main',
        get_template_directory_uri() . '/blog-site-template-master/js/main.js',
        array('followandrew-jquery'),
        '1.0',
        true
    );
}
 
add_action('wp_enqueue_scripts', 'followandrew_register_scripts');

?>

