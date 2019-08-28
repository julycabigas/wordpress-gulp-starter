<?php
/**
* Footer Template
*
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @since   1.0.0
* @package themezero
*/


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  ?> 
 

  <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">

    <!-- Footer Mid --> 
    <div class="site-footer-mid">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <!-- Footer Main Menu --> 
                  <?php if( is_active_sidebar('footer-menu') ) : ?>
                          <div class="widget-area widget-menu">
                              <?php dynamic_sidebar('footer-menu')  ?>
                          </div>
                  <?php endif; ?>
                  <!-- ./Footer Main Menu --> 
              </div>
              <div class="col-md-7 offset-md-1">
                 <div class="row">
                     <div class="col-md-5">
                          <!-- Widget Area -->
                          <?php if( is_active_sidebar('footer-contact-1') ) : ?>
                                  <div class="widget-area">
                                    <?php dynamic_sidebar('footer-contact-1')  ?>
                                  </div>  
                          <?php endif; ?>
                          <!-- ./Widget Area -->
                      </div>
                      <div class="col-md-6 offset-md-1">
                             <?php 
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'order' =>  'DESC',
                                    'orderby' => 'date',
                                    'posts_per_page' => 2
                                );

                                $query = New WP_Query($args);

                                if( $query->have_posts() ) : ?>
                                    <!-- Widget Area -->
                                    <div class="widget-area">
                                      <h3 class="widget-title">Latest News</h3>
                                    
                                       <?php while( $query->have_posts() ) : $query->the_post(); ?>
                                    
                                            <div class="news-single">
                                                <h4><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></h4>
                                            </div>

                                       <?php endwhile; ?>

                                    </div><!-- ./Widget Area -->  
                                  <?php 
                                    endif;
                                  ?>
                        </div>
                 </div>
              </div>
            </div>
          </div>
      </div>
      <!-- ./Footer Mid --> 
      
      <!-- ./Footer Bottom --> 
      <div class="site-footer-bottom">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <!-- Copyright -->
                  <div class="copyright">
                    © Copyright <?php echo bloginfo('') ?><?php echo date('Y');?>. All Rights Reserved
                  </div>
                  <!-- Copyright -->
               </div>
               <div class="col-md-6">
                <?php 

                    wp_nav_menu( array(
                        'menu'            => 'Legal', // Do not fall back to first non-empty menu.
                        'depth'           => 1,
                        'theme_location'  => 'Legal',
                        'menu_class'      => 'list-menu',
                        'container'       => false,
                        'container_class' => false,
                        'container_id'    => false,
                    )); 

                 ?>
               </div>
            </div>
         </div>
      </div>
      <!-- ./Footer Bottom --> 
  </footer><!-- .site-footer -->

</div> <!-- .page-wrapper -->

<?php 

wp_footer(); ?>

</body>
</html>
