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
* Display Breadcrumb
*
* @return tags,cats,comments Visible only if Login user
*/
if( ! function_exists('themezero_breadcrumbs') ) :
    function themezero_breadcrumbs() {
           
        // Settings
        $separator          = '&gt;';
        $breadcrums_id      = 'breadcrumbs';
        $breadcrums_class   = 'breadcrumbs';
        $home_title         = 'Homepage';
          
        // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
        $custom_taxonomy    = 'product_cat';
           
        // Get the query & post information
        global $post,$wp_query;
           
        // Do not display on the homepage
        if ( !is_front_page() ) {
           
            // Build the breadcrums
            echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
               
            // Home page
            echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
            echo '<li class="separator separator-home"> ' . $separator . ' </li>';
               
            if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
                  
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
                  
            } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
                  
                // If post is a custom post type
                $post_type = get_post_type();
                  
                // If it is a custom post type display name and link
                if($post_type != 'post') {
                      
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);
                  
                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                    echo '<li class="separator"> ' . $separator . ' </li>';
                  
                }
                  
                $custom_tax_name = get_queried_object()->name;
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
                  
            } else if ( is_single() ) {
                  
                // If post is a custom post type
                $post_type = get_post_type();
                  
                // If it is a custom post type display name and link
                if($post_type != 'post') {
                      
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);
                  
                    echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                    echo '<li class="separator"> ' . $separator . ' </li>';
                  
                }
                  
                // Get post category info
                $category = get_the_category();
                 
                if(!empty($category)) {
                  
                    // Get last category post is in
                    $last_category = end(array_values($category));
                      
                    // Get parent any categories and create array
                    $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                    $cat_parents = explode(',',$get_cat_parents);
                      
                    // Loop through parent categories and store in variable $cat_display
                    $cat_display = '';
                    foreach($cat_parents as $parents) {
                        $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                        $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                    }
                 
                }
                  
                // If it's a custom post type within a custom taxonomy
                $taxonomy_exists = taxonomy_exists($custom_taxonomy);
                if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                       
                    $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                    $cat_id         = $taxonomy_terms[0]->term_id;
                    $cat_nicename   = $taxonomy_terms[0]->slug;
                    $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                    $cat_name       = $taxonomy_terms[0]->name;
                   
                }
                  
                // Check if the post is in a category
                if(!empty($last_category)) {
                    echo $cat_display;
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                      
                // Else if post is in a custom taxonomy
                } else if(!empty($cat_id)) {
                      
                    echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                    echo '<li class="separator"> ' . $separator . ' </li>';
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
                } else {
                      
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                      
                }
                  
            } else if ( is_category() ) {
                   
                // Category page
                echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
                   
            } else if ( is_page() ) {
                   
                // Standard page
                if( $post->post_parent ){
                       
                    // If child page, get parents 
                    $anc = get_post_ancestors( $post->ID );
                       
                    // Get parents in the right order
                    $anc = array_reverse($anc);
                       
                    // Parent page loop
                    if ( !isset( $parents ) ) $parents = null;
                    foreach ( $anc as $ancestor ) {
                        $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                        $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                    }
                       
                    // Display parent pages
                    echo $parents;
                       
                    // Current page
                    echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                       
                } else {
                       
                    // Just display current page if not parents
                    echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                       
                }
                   
            } else if ( is_tag() ) {
                   
                // Tag page
                   
                // Get tag information
                $term_id        = get_query_var('tag_id');
                $taxonomy       = 'post_tag';
                $args           = 'include=' . $term_id;
                $terms          = get_terms( $taxonomy, $args );
                $get_term_id    = $terms[0]->term_id;
                $get_term_slug  = $terms[0]->slug;
                $get_term_name  = $terms[0]->name;
                   
                // Display the tag name
                echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
               
            } elseif ( is_day() ) {
                   
                // Day archive
                   
                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
                   
                // Month link
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
                echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
                   
                // Day display
                echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
                   
            } else if ( is_month() ) {
                   
                // Month Archive
                   
                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
                   
                // Month display
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
                   
            } else if ( is_year() ) {
                   
                // Display year archive
                echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
                   
            } else if ( is_author() ) {
                   
                // Auhor archive
                   
                // Get the author information
                global $author;
                $userdata = get_userdata( $author );
                   
                // Display author name
                echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
               
            } else if ( get_query_var('paged') ) {
                   
                // Paginated archives
                echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
                   
            } else if ( is_search() ) {
               
                // Search results page
                echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
               
            } elseif ( is_404() ) {
                   
                // 404 page
                echo '<li>' . 'Error 404' . '</li>';
            }
           
            echo '</ul>';
               
        }
           
    }


endif;






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