<?php 

/**
*  404 Page
*
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @since   1.0.0
* @package themezero
*/

get_header(); 

?>

	<main class="main-content" id="content">
		<div class="container">



				<h1 class="title"><?php _e( 'Error 404', 'themezero' ); ?></h1>

				<p><?php _e( "The page you're looking for could not be found. It may have been removed, renamed, or maybe it didn't exist in the first place.", "zero" ); ?></p>

				<div class="meta">
				
					<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'To the front page', 'themezero' ); ?></a>
				
				</div>



		</div>	
	</main>

<?php get_footer(); ?>