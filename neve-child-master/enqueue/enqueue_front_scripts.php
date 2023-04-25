<?php

	// NEVE CHILD THEME
	add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	if ( ! function_exists( 'neve_child_load_css' ) ):
		/**
		 * Load CSS file.
		 */
		function neve_child_load_css() {
			wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
		}

	endif;

    // ADDING CUSTOM JS AND CSS
	add_action('wp_enqueue_scripts', 'custom_js_css');
	function custom_js_css(){
		
		wp_enqueue_script( 
			$handle    = 'Jquery', 
			$src       = 'https://code.jquery.com/jquery-3.6.4.min.js', 
			$deps      = array(), 
			$ver       = '1.0.0', 
			$in_footer = false
		);

		wp_enqueue_script( 
			$handle    = 'custom-front-js', 
			$src       = get_stylesheet_directory_uri().'/assets/custom.js', 
			$deps      = array('Jquery'), 
			$ver       = '1.0.0', 
			// $in_footer = null 
		);
		
		wp_enqueue_style( 
			$handle = 'Bootstrap', 
			$src    = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', 
			$deps   = array(), 
			$ver    = '1.0', 
			$media  = 'all' 
        );
		
		wp_enqueue_style( 
			$handle = 'custom-front-css', 
			$src    = get_stylesheet_directory_uri().'/assets/custom.css', 
            $deps   = array(), 
            $ver    = '1.0', 
            $media  = 'all' 
		);
	}

	