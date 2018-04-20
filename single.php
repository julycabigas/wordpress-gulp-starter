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

    <main class="main-content" id="content">
    	<div class="container margin-top-lg">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/loop/content', 'single' ); ?>

						<?php //zero_breadcrumbs(); ?>

					<?php
						//If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>
		</div>
	</main>		

<?php
get_footer(); ?>