<?php
/**
* Template to display blog page
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @since   1.0.0
* @package themezero
*/

get_header();

?>


<main class="content" id="content" itemscope itemtype="http://schema.org/WebPageElement">
	<?php get_template_part( 'template-parts/loop/content', 'banner' );  ?>
	<!--- Main Content -->
	<div class="content__main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<?php 
					    wp_reset_postdata();
						$args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => 2,
								'paged' => get_query_var('paged'),
								'orderby' => 'date',
						);

						$query = New WP_Query( $args );

						if( $query->have_posts() ) :

							while( $query->have_posts() ) : $query->the_post();
					?>
							
							<article class="article-area">
								 <figure class="thumbnail">
								 	  <?php the_post_thumbnail('blog-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']) ?>
								 </figure>
								 <div class="info">
								 
									<h2><?php the_title(); ?></h2>
									<?php 
						
										$post_categories = wp_get_post_categories( GET_THE_ID() );
										$cats = array();
										     
										foreach($post_categories as $c){
										   $cat = get_category( $c );
										    echo '<span class="category">' . $cat->name . '</span>';
										}
									?>
									<span class="date-posted"><?php the_time('F j, Y'); ?></span>
								    
								    <?php the_excerpt() ?>
								 </div>
							</article>	
							
					<?php
							endwhile;

						endif;

						wp_reset_postdata();
					?>
					<?php themezero_pagination_links($query) ?>
				</div>
				<div class="col-lg-4">
					<?php get_sidebar() ?>
				</div>
			</div>

		</div>
	</div>
	<!-- .Main Content -->

</main>


<?php get_footer(); ?>
