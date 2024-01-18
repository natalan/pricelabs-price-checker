<?php
/*
Plugin Name: PriceCheck API Endpoint
Description: Provides a custom REST API endpoint for price checking.
Version: 1.0
Author: Andrei Zharov
*/

// Hook into the REST API initialization action
add_action('rest_api_init', function () {
    register_rest_route('natalan/v1', '/pricecheck/', array(
        'methods' => 'GET',
        'callback' => 'natalan_pricecheck_handler',
        'args' => array(
            'check_in' => array(
                'required' => true,
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param); // Basic validation for string type
                }
            ),
            'check_out' => array(
                'required' => true,
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param); // Basic validation for string type
                }
            ),
        ),
        'permission_callback' => '__return_true'
    ));
});

// The handler function for the custom API endpoint
// To be updated after getting Pricelabs API access
function natalan_pricecheck_handler($data) {
    $check_in_date = $data['check_in'];
    $check_out_date = $data['check_out'];

    return new WP_REST_Response("Hello world: check-in date is {$check_in_date} and check-out date is {$check_out_date}", 200);
}
