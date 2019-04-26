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
} ?>

  <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">

  		<div class="container">
  			<div class="row">
          <div class="col-md-5">

                <div class="row">
                    <div class="col-md-7">
                        <!-- Site-logo --> 
                        <div class="site-logo">
                          <a href="<?php echo site_url() ?>"><?php themezero_get_logo() ?></a>
                        </div>
                        <!-- ./Site-logo --> 
                        <div class="site-info">
                          Smart Online Staff, working out of Cebu City, Philippines, with head offices located in South Queensland, offers the most effective VA solutions for startups and small businesses.
                        </div>

                        <ul class="social-links">
                          <li><a href=""><span class="fa fa-facebook"></span></a></li>
                          <li><a href=""><span class="fa fa-linkedin"></span></a></li>
                          <li><a href=""><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 offset-md-1">
                       <!-- Footer Link --> 
                       <div class="footer-navigation">
                           <h3>Main Menu</h3>
                           <!-- Site Nav --> 
                            <div class="footer-navigation__wrapper">
                              <?php 

                                    wp_nav_menu( array(
                                          'menu'           => 'Primary Menu', // Do not fall back to first non-empty menu.
                                          'depth'          => 2,
                                          'theme_location' => 'top',
                                          'menu_class'   => 'main-menu',
                                          'container'       => false,
                                          'container_class' => false,
                                          'container_id'    => false,
                                          'fallback_cb'     => false
                                    )); 

                                 ?>
                            </div>
                            <!-- . Site Nav -->
                       </div>
                       <!-- Footer Link --> 
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                 
                 <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <!-- Widget Area -->
                        <div class="widget-area">
                             <h3>Office Location</h3>

                             <strong>Cebu City</strong> 
                             <p>9th Flr, Avenir Building<br>
                              Archbishop Reyes Ave,<br> 
                              Cebu City, Philippines 6000</p> 

                              <p><strong>Opening Hours:</strong><br> 
                              Monday to Friday: 9:00AM-5:00PM</p> 
                        </div>
                         <!-- ./Widget Area -->
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <!-- Widget Area -->
                        <div class="widget-area">
                            <h3>Contact Info</h3>

                             <strong>Australia</strong> 
                             <p>PO Box 5, Rochedale<br>
                              South QLD 4123</p> 

                            <p><strong>Phone:</strong> (07) 3117 0700  OR  1300 467 646<br> 
                             <strong>Fax:</strong> 1300 733 790</p> 
                        </div>
                         <!-- ./Widget Area -->
                    </div>
                 </div>         

            </div>
      		</div>	 
  		</div>
      <div class="site-footer__bottom">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <!-- Copyright -->
                  <div class="copyright">
                    Ⓒ 2019. Logo Ltd. 
                  </div>
                  <!-- Copyright -->
               </div>
               <div class="col-md-6">
                  <ul class="footer-nav-extra">
                     <li><a href="">Privacy Policy</a></li>
                     <li><a href="">Terms and Condition</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
  </footer><!-- .site-footer -->
	  
<?php 

wp_footer(); ?>

</body>
</html>
