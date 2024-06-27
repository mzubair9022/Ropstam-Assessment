<?php
/**
 * Plugin Name: Kanye Quotes Plugin
 * Description: This is the Plugin for Ikonic Assessment. Display 5 quotes from the Kanye.rest API.
 * Version: 1.0
 * Author: Muhammad Zubair Jaddan
 */

// Function to fetch Kanye quotes
function get_kanye_quotes() {
    $api_url = 'https://api.kanye.rest/';

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Error fetching Kanye quotes.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (!$data) {
        return 'Error decoding JSON.';
    }

    return $data->quote;
}

// Shortcode to display Kanye quotes
function display_kanye_quotes_shortcode() {
    $quotes = '<ol class="kanye-quotes-list">';
    for ($i = 1; $i <= 5; $i++) {
        $quotes .= '<li>' . get_kanye_quotes() . '</li>';
    }
    $quotes .= "</ol>";
    return $quotes;
}
add_shortcode('kanye_quotes', 'display_kanye_quotes_shortcode');