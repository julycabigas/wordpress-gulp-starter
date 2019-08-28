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

 


        wp_enqueue_script('popper',  get_template_directory_uri() . '/assets/js/popper.min.js', array(), false, true);
        wp_enqueue_script('bootstrap',  get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
        //wp_enqueue_script('fitvid', 'https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.2.0/jquery.fitvids.js', array(), false, true);
        wp_enqueue_script('vendorsJs', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), false, true); 
        wp_enqueue_script('customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array(), false, true);
     

    } else {

       wp_enqueue_script('jquery');
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

    //wp_register_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Rubik:400,500,700', array(), '1.0', 'all');
    wp_enqueue_style('maincss', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');

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

/**
 * Dequeue the jQuery UI styles.
 *
 * Hooked to the wp_print_styles action, with a late priority (100),
 * so that it is after the style was enqueued.
 */
function remove_unwanted_css() { 


   if( is_front_page() || is_page_template('page-landingpage.php') ) {

       wp_dequeue_style( 'mp3-jplayer' );
       wp_deregister_style( 'mp3-jplayer' );

       wp_dequeue_style( 'wp-block-library' );
       wp_deregister_style('wp-block-library');
   
       wp_dequeue_style( 'fc-form-css' );
       wp_deregister_style('fc-form-css');

   }
} 


add_action( 'wp_enqueue_scripts', 'remove_unwanted_css', 9999 );
add_action( 'wp_enqueue_scripts', 'themezero_scripts' );
add_action( 'wp_enqueue_scripts', 'themezero_styles' ); 
add_action( 'wp_enqueue_scripts', 'themezero_enqueue_comments_reply' );