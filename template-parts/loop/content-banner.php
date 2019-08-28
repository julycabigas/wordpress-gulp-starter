<?php 

/**
 * Display Content Banner
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since   1.0.0
 * @package themezero
 */


?>
<!-- page header -->
<div class="page-header" itemscope itemtype="http://schema.org/WebPageElement">
	<div class="auto-container">
		<div class="page-header-inner">

				 <?php if(  is_archive() ) : ?>	
					<h1>
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</h1>
				<?php elseif( is_home() ) : 

					        global $post;
		            		$page_for_posts_id = get_option('page_for_posts');

				            if ( $page_for_posts_id ) { 
				                $post = get_page($page_for_posts_id);
				                setup_postdata($post);
				                                ?>
								<h1><?php the_title(); ?></h1>
								<?php rewind_posts(); 

							} ?>	

	             <?php else: ?>
	              	<h1><?php the_title() ?></h1>
				 <?php endif; ?>
	     </div>
	</div>
</div>
<!-- ./page header -->


