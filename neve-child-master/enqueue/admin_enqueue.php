<?php

	// NEVE CHILD THEME
	add_action( 'admin_enqueue_scripts', 'neve_child_load_css', 20 );
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
	
	function admin_custom_js_css(){

	}

    class Admin_Enqueue {

        function __construct(){
            add_action('admin_enqueue_scripts', array($this,'admin_custom_js_css') );
        }

        public function admin_custom_js_css(){
            wp_enqueue_script( 
                $handle    = 'custom-front-js', 
                $src       = get_stylesheet_directory().'/admin/assets/admin.js', 
                $deps      = array(), 
                $ver       = '1.0.0', 
                // $in_footer = null 
            );

            wp_enqueue_script( 
                $handle    = 'Jquery', 
                $src       = 'https://code.jquery.com/jquery-3.6.4.min.js', 
                $deps      = array(), 
                $ver       = '1.0.0', 
                $in_footer = false
            );

            // wp_enqueue_script( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $in_footer:boolean )

            // register_style

            wp_enqueue_style( 
                $handle = 'Bootstrap', 
                $src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css', 
                $deps = array(), 
                $ver = '1.0', 
                $media = 'all' 
            );
            
            wp_enqueue_style( 
                $handle = 'custom-front-js', 
                $src = get_stylesheet_directory_uri().'/admin/assets/admin.css', 
                $deps = array(), 
                $ver = '1.0', 
                $media = 'all' 
            );
        }

    }

    // function sample(){
    //     var_dump(dirname(__FILE__));
    //     die();
    // }

    // add_action('admin_init', 'sample');