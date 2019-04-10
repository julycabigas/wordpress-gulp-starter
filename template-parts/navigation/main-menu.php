<?php 

/**
 * Display Navigation 
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since   1.0.0
 * @package themezero
 */

?>

<?php if( has_nav_menu('top') ) : ?>

<nav itemscope itemtype="http://schema.org/SiteNavigationElement">
     <?php 

        wp_nav_menu( array(
		    'menu'           => 'Primary Menu', // Do not fall back to first non-empty menu.
		    'theme_location' => 'top',
		    'fallback_cb'    => false // Do not fall back to wp_page_menu()
		)); 

     ?>
</nav>

<?php endif; ?>