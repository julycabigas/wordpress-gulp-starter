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

?>


<main class="content" id="content" itemscope itemtype="http://schema.org/WebPageElement">

	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/loop/content', 'page' ); ?>

			<?php
				
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
		?>
	</div>

</main>


<?php get_footer(); ?>
