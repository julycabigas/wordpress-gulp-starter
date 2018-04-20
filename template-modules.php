<?php
/**
*  Template to display modules
*
*  Template Name: Modules
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @since   1.0.0
* @package themezero
*/


get_header(); ?>


<?php

	// check if the flexible content field has rows of data
	if( have_rows('module') ):

	     // loop through the rows of data
	    while ( have_rows('module') ) : the_row();

	    
	        get_template_part('template-parts/modules/' . get_row_layout());


	    endwhile;

	else :

	    // no layouts found

	endif;

?>

<?php get_footer(); ?>
