<?php

function enqueue_scripts() {
    wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');