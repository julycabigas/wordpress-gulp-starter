<?php 
/**
* Template to display single page
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @since   1.0.0
* @package themezero
*/

get_header();

get_template_part( 'template-parts/loop/content', 'banner' );
?>

    <main class="main-content mt-4 mb-5" id="content">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_breadcrumb() ?>
						<?php get_template_part( 'template-parts/loop/content', 'single' ); ?>

						<?php
							//If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>    				
    			</div>
    			<div class="col-md-4">
    				<aside class="sidebar">
    					<div class="widget-area">
							<!-- form-alt -->
							<div class="form-alt">
								<div class="form-alt__header">
									<h3>Book an all obligation interview </h3>
								</div>
								<form action="" class="form-alt__body">
									<div class="form-group">
				                      <input type="text" name="fullname" placeholder="Full Name">
				                   </div>
				                   <div class="form-group">
				                      <input type="email" name="email" placeholder="Email">
				                   </div>
				                   <div class="form-group">
				                      <input type="text" name="phone" placeholder="Phone">
				                   </div>
				                   <input type="submit" value="Submit" class="btn btn-primary">
								</form>
							</div> 
							<!-- .form-alt -->	
						</div>
    				</aside>
    			</div>
    		</div>
		</div>
	</main>		

<?php
get_footer(); ?>