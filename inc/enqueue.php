<?php

/**
* Theme Enqueue
*
* Learn more: https://developer.wordpress.org/reference/functions/wp_enqueue_script/
*
* @since   1.0.0
* @package starter
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


        wp_register_script('vendorsJs', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), false, true); 
        wp_register_script('customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array(), false, true); 

        wp_enqueue_script('jquery');
        wp_enqueue_script('vendorsJs'); 
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), false, true); 
        wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), false, true);
        wp_enqueue_script('customJs'); 

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

    wp_register_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Ubuntu:500,700', array(), '1.0', 'all');
    wp_register_style('maincss', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
    wp_register_style('fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0', 'all');

    wp_enqueue_style('googlefonts'); 
    wp_enqueue_style('fontawesome');  
    wp_enqueue_style('maincss'); 

 

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