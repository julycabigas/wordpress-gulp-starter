<?php
/**
 * Theme Header
 *
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since   1.0.0
 * @package themezero
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Site-header -->
<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<!-- Site-logo --> 
				<div class="site-logo">
					<?php themezero_get_logo() ?>
				</div>
				<!-- ./Site-logo --> 
			</div>
			<div class="col-sm-9">
				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<!-- Main Menu --> 
					<div class="main-menu">
						
						<?php get_template_part( 'template-parts/navigation/main', 'menu' ); ?>
			
					</div>
					<!-- . Main Menu -->
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>
<!-- ./Site-header -->
<!-- Accessibility -->
<div class="container screen-reader-text">
	<a href="#main">Skip to main content</a>	
</div>
<!-- ./Accessibility -->