<?php
/**
 * Single post partial template.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since   1.0.0
 * @package themezero
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


    <?php 

   
          if ( has_post_thumbnail() ) {

              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

              if ( ! empty( $large_image_url[0] ) ) {

                  echo '<a href="' . esc_url( $large_image_url[0] ) . '" class="alignleft" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
                  echo get_the_post_thumbnail( $post->ID, 'blog-image' ); 
                  echo '</a>';
              }

          }
          else {

                  echo '<img src="' . get_template_directory_uri() . '/assets/img/default-thumbnail.jpg" alt="'. get_bloginfo('title') .'" />';
          }

    ?> 
			


	<?php the_content(); ?>


	


</article><!-- #post-## -->
