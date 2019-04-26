<?php

/** 
*  Template Tags Functions
*
* Learn more: https://codex.wordpress.org/Functions_File_Explained
*
* @since   1.0.0
* @package themezero
*/



/**
*  BREADCRUMBS                        
*/

function the_breadcrumb() {
    $sep = '<span> > </span>';
    if (!is_front_page()) {
    
    // Start the breadcrumb with a link to your homepage
        echo '<div id="breadcrumbs" class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a>' . $sep;
    
    // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            
                the_category(', ', 'single');
            
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
    
    // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
    
    // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
    
    // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}


/**
* Extra Entry Info
*
* @return tags,cats,comments Visible only if Login user
*/
if ( ! function_exists( 'themezero_posted_on' ) ) :

        function themezero_posted_on() {

            $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }
            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( 'c' ) ),
                esc_html( get_the_modified_date() )
            );
            $posted_on = sprintf(
                esc_html_x( 'Posted on %s', 'post date', 'themezero' ),
                '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
            );
            $byline = sprintf(
                esc_html_x( 'by %s', 'post author', 'themezero' ),
                '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
            );
            echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

        }
endif;


/**
* Extra Entry Info
*
* @return tags,cats,comments Visible only if Login user
*/
if ( ! function_exists( 'themezero_entry_footer' ) ) :

        function themezero_entry_footer() {
            // Hide category and tag text for pages.
            if ( 'post' === get_post_type() ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ', 'themezero' ) );
                if ( $categories_list ) {
                    printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'themezero' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                }
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', esc_html__( ', ', 'themezero' ) );
                if ( $tags_list ) {
                    printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'themezero' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                }
            }
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                echo '<span class="comments-link">';
                comments_popup_link( esc_html__( 'Leave a comment', 'themezero' ), esc_html__( '1 Comment', 'themezero' ), esc_html__( '% Comments', 'themezero' ) );
                echo '</span>';
            }
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__( 'Edit %s', 'themezero' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }
endif;


/**
*
* @return Display Simple Pagination Links
*/
if ( ! function_exists( 'themezero_pagination_links' ) ) :

        function themezero_pagination_links($query) {

            $big = 999999999; // need an unlikely integer


                $args = array(
                    'base'                 => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'             => '?paged=%#%',
                    'total'              => $query->max_num_pages,
                    'current'            =>  max( 1, get_query_var('paged') ),
                    'show_all'           => false,
                    'end_size'           => 1,
                    'mid_size'           => 2,
                    'prev_next'          => true,
                    'prev_text'          => __('« '),
                    'next_text'          => __(' »'),
                    'type'               => 'list',
                    'add_args'           => false,
                    'add_fragment'       => '',
                    'before_page_number' => '',
                    'after_page_number'  => ''
                );

            echo paginate_links( $args );
        }

endif;


/**
* This is use to return logo setup from customizer
*
* @return Logo Image
*/
if ( ! function_exists( 'themezero_get_logo' ) ) :

    function themezero_get_logo() {

        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
                echo wp_get_attachment_image($custom_logo_id);
        } else {
                echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
        }

    
    }

endif;