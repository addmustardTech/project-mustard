<?php

function pm_scripts__enqueue_script() {

    wp_deregister_script('jquery');

	wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, true);
	wp_register_script('hammerJS', 'https://hammerjs.github.io/dist/hammer.min.js', array('jQuery'));
	wp_register_script('carouselJS', get_template_directory_uri() . '/assets/js/carousel.js', array('jQuery', 'hammerJS'));

}

add_action('wp_enqueue_scripts', 'pm_scripts__enqueue_script');


function pm_styles__enqueue_script() {

    
	wp_enqueue_style('css-main', get_template_directory_uri() . '/assets/css/main.css', array(), time());
	
}

add_action( 'wp_enqueue_scripts', 'pm_styles__enqueue_script' );