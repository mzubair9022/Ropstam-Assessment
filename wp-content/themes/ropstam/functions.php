<?php

function enqueue_scripts() {
    wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


// Task 2:- redirect the user away from the site if their IP address starts with 77.29
function redirect_users_with_ip() {
    // Current user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // IP address pattern to check
    $ip_pattern = '77.29';

    // If the user's IP address starts with the pattern
    if (strpos($user_ip, $ip_pattern) === 0) {
        wp_redirect('https://google.com/'); // This will redirect to Google page
        exit();
    }
}
add_action('init', 'redirect_users_with_ip');

