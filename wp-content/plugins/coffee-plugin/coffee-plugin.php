<?php
/**
 * Plugin Name: Coffee Plugin
 * Description: This is the Plugin for Ikonic Assessment. Fetch a direct link to a cup of coffee using the Random Coffee API.
 * Version: 1.0
 * Author: Muhammad Zubair Jaddan
 */

 function hs_give_me_coffee() {
    $api_url = 'https://coffee.alexflipnote.dev/random.json'; 
    $response = wp_remote_get( $api_url );

    if ( is_wp_error( $response ) ) {
        return 'Sorry, unable to get coffee right now.';
    }

    $body = wp_remote_retrieve_body( $response );
    $coffee_data = json_decode( $body, true );

    if ( isset( $coffee_data['file'] ) ) {
        $coffee_link = $coffee_data['file'];
        return $coffee_link;
    } else {
        return 'No coffee link found.';
    }
}

function display_coffee_image_shortcode() {
    ob_start(); // Start output buffering

    // Output the coffee image
    echo '<img src="' . esc_url(hs_give_me_coffee()) . '" class="coffe-image" alt="Cup of Coffee">';

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('coffee_image', 'display_coffee_image_shortcode');