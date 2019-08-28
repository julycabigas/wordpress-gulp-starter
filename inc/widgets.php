<?php
/** 
* Theme widgets
*
* Learn more: https://codex.wordpress.org/Widgets_API
*
* @since   1.0.0
* @package themezero
*/



if ( ! function_exists( 'themezero_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function themezero_widgets_init() {

		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'themezero' ),
			'id'            => 'right-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Contact Sidebar', 'themezero' ),
			'id'            => 'sidebar3',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer About', 'themezero' ),
			'id'            => 'footer-about',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Menu', 'themezero' ),
			'id'            => 'footer-menu',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Contact 1', 'themezero' ),
			'id'            => 'footer-contact-1',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Contact 2', 'themezero' ),
			'id'            => 'footer-contact-2',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );


		register_sidebar( array(
			'name'          => __( 'Footer Legal', 'themezero' ),
			'id'            => 'footer-legal',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

	}
}
add_action( 'widgets_init', 'themezero_widgets_init' );