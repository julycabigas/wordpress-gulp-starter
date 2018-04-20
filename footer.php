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

      			 
      			 <div class="col-sm-6">

      			 	<?php get_template_part( 'template-parts/footer/footer', 'navigation' ); ?>
                
      			 </div>
      			 <div class="col-sm-6">

      			 	<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

      			 </div>	
      			 
      		</div>	 
  		</div>

  </footer><!-- .site-footer -->
	  
<?php 

wp_footer(); ?>

</body>
</html>
