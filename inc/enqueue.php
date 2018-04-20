<?php

/**
* Theme Enqueue
*
* Learn more: https://developer.wordpress.org/reference/functions/wp_enqueue_script/
*
* @since   1.0.0
* @package themezero
*/

/**
 *
 * Scripts: Frontend with no conditions, Add Custom Scripts to wp_head
 *
 * @since  1.0.0
 *
 */
function themezero_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {


    	//wp_enqueue_script('jquery'); // Enqueue it!
        //wp_deregister_script('jquery'); // Deregister WordPress jQuery
        //wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), '1.11.2');


        wp_register_script('zero_vendorsJs', get_template_directory_uri() . '/assets/js/vendors.min.js', array(), false, true); 
        wp_enqueue_script('zero_vendorsJs'); 

        wp_register_script('zero_customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array(), false, true); 
        wp_enqueue_script('zero_customJs'); 

    }

}

/**
 *
 * Styles: Frontend with no conditions, Add Custom styles to wp_head
 *
 * @since  1.0
 *
 */
function themezero_styles()
{

    /**
     *
     * Minified and Concatenated styles
     *  
     */
     //wp_register_style('sero_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('themezero_style', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('themezero_style'); // Enqueue it!

 

}


/**
 *
 * Styles: Comments 
 *
 * @since  1.0
 *
 */
function themezero_enqueue_comments_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}


add_action( 'wp_enqueue_scripts', 'themezero_scripts' );
add_action( 'wp_enqueue_scripts', 'themezero_styles' ); 
add_action( 'wp_enqueue_scripts', 'themezero_enqueue_comments_reply' );