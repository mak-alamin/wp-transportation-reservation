<?php

if(!defined("ABSPATH")){wp_die("Access denied!");}

add_action('wp_enqueue_scripts', 'myot_wp_transport_load_scripts');
function myot_wp_transport_load_scripts() {

    wp_enqueue_style('myot_transport_fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', null, time());

    wp_enqueue_style('myot_transport_main',  plugins_url('/assets/css/style.css', __FILE__) , time());

    wp_enqueue_script('jquery');

    wp_enqueue_script('jquery-ease', '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array('jquery'), time(), true);

    wp_enqueue_script('myot_transport_fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js', array('jquery'), time(), true);

    wp_enqueue_script('myot_transport_main', plugins_url('/assets/js/main.js', __FILE__) , array('jquery'), time(), true);
}