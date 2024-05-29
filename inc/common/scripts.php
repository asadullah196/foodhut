<?php

define('FOODHUT_ASSETS', get_template_directory_uri() . '/assets/vendors/');

// Foodhut CSS and JS enqueue here
function foodhut_theme_scripts() {

    // All CSS
    wp_enqueue_style( 'themify-icons',  FOODHUT_ASSETS.'themify-icons/css/themify-icons.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'animate',  FOODHUT_ASSETS.'animate/animate.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'foodhut-main',  get_template_directory_uri().'/assets/css/foodhut.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );

    // All JS
    wp_enqueue_script( 'harry-google-map', foodhut_google_maps_url(), array(), '1.0.0', 'all' );
	wp_enqueue_script( 'bootstrap-bundle', FOODHUT_ASSETS.'bootstrap/bootstrap.bundle.js', array( ), 1.1, true );
	wp_enqueue_script( 'bootstrap-affix', FOODHUT_ASSETS.'bootstrap/bootstrap.affix.js', array( ), 1.1, true );
	wp_enqueue_script( 'wow', FOODHUT_ASSETS.'wow/wow.js', array( ), 1.1, true );

	wp_enqueue_script( 'foodhut-main', get_template_directory_uri().'/assets/js/foodhut.js', array( 'jquery' ), 1.1, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'foodhut_theme_scripts' );


/*
Register Google Maps API
 */
function foodhut_google_maps_url() {
    $maps_url = '';

    /*
    Translators: If you need to disable the Google Maps API, translate this to 'off'.
    */
    if ( 'off' !== _x( 'on', 'Google Maps API: on or off', 'foodhut' ) ) {
        $api_key = 'AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8';
        $maps_url = 'https://maps.googleapis.com/maps/api/js?key=' . urlencode( $api_key ) . '&callback=initMap';
    }
    return $maps_url;
}