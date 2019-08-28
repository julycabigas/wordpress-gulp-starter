<?php
/**
* The template for displaying archive pages.
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
}

get_header();
?>


<main class="main-content" id="content">

	<?php get_template_part( 'template-parts/loop/content', 'banner' );  ?>

	<div class="content__main">
		
	    <div class="container">

	    	<div class="row">

	    		<div class="col-lg-8">
	    		
					<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'order' => 'DESC',
							'orderby' => 'date',
							'posts_per_page' => 5,
							'paged' => $paged 
						);

						$query =  NEW WP_Query($args);

						if ( $query->have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>

								<?php

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/loop/content', get_post_format() );
								?>

							<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif;  wp_reset_postdata() ?>

					<!-- The pagination component -->
					<?php themezero_pagination(); ?>

	    		</div>

	    		<div class="col-lg-4">

	    			<?php get_sidebar() ?>

	    		</div>

	    	</div>

	    </div>

	</div>



</div>

<?php get_footer(); ?>
