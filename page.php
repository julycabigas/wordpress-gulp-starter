<?php
/**
* Template to display single page
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @since   1.0.0
* @package themezero
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main class="content" id="content" itemscope itemtype="http://schema.org/WebPageElement">

	<?php get_template_part( 'template-parts/loop/content', 'banner' );  ?>

	<!--- Main Content -->
	<div class="content__main">

		<div class="auto-container">

				<div class="row">

					 <div class="<?php echo ( get_field('no_sidebar') ) ? 'col-md-12' : 'col-md-8'; ?>">
					 	
					 	<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/loop/content', 'page' ); ?>

						<?php endwhile; ?>

					 </div>

				 <?php if( !get_field('no_sidebar') ) : ?>

					 <div class="col-md-4">

					 	<aside id="sidebar">

							<?php if( get_field('lead_form') ) : ?>
									
									<?php the_field( 'lead_form' );?>

							<?php else: ?>	

							 		<?php if( is_active_sidebar('footer-about') ) : ?>

				                          <div class="widget-area">

				                            <?php dynamic_sidebar('right-sidebar')  ?>

				                          </div>

				                  	<?php  endif; ?>

							<?php endif; ?>	
		                  
					 	</aside>

					 </div>

				<?php endif; ?>	 

				</div>

		</div>

	</div><!-- .Main Content -->

</main>

<?php get_footer(); ?>
