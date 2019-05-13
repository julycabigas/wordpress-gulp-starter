<?php
/** 
* Theme setup
*
* Learn more: https://codex.wordpress.org/Functions_File_Explained
*
* @since   1.0.0
* @package themezero
*/

if ( ! function_exists( 'themezero_setup' ) ) :

		function themezero_setup() {

			/**
			 * Set the content width based on the theme's design and stylesheet.
			 */
			if ( ! isset( $content_width ) ) {
				$content_width = 1170; /* pixels */
			}

			load_theme_textdomain( 'themezero', get_template_directory() . '/languages' );

			add_theme_support( 'automatic-feed-links' );

			add_theme_support( 'title-tag' );

			add_theme_support( 'post-thumbnails' );


			add_image_size('banner', '1980', '700');
			add_image_size('thumbnail', '125', '125');
			add_image_size('featured', '400', '250');


			register_nav_menus( array(
				'top' => esc_html__( 'Primary Menu', 'themezero' ),
				'legal' => esc_html__( 'Legal Menu', 'themezero' ),
				'social' => esc_html__( 'Social Media Menu', 'themezero' ),
	
			) );


			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
			) );

			// add_theme_support( 'post-formats', array(
			// 	'aside',
			// 	'image',
			// 	'video',
			// 	'quote',
			// 	'link',
			// ) );


		    $defaults = array(
		    	'width'		  => '250',
		    	'height'	  => '100',
		        'flex-height' => true,
		        'flex-width'  => true,
		        'header-text' => array( 'site-title', 'site-description' ),
		    );

		    add_theme_support( 'custom-logo', $defaults );


		}
endif; 

add_action( 'after_setup_theme', 'themezero_setup' );