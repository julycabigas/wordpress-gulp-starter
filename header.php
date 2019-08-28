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
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<!-- Preloader -->
<div id="preloader" class="preloader">
	<div class="preloader-inner">
		  <span class="fa fa-spinner fa-spin" aria-hidden="true"></span>
	</div>
</div>	
<!-- ./Preloader -->

<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Site-header -->
	<header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
		<div class="site-header-top">
			<div class="auto-container">
				<div class="row">
					<div class="col-5">
						<?php 
							if(  has_nav_menu('social') ) :

								$args = array(
									'menu'  => 'Social Media',
									'theme_location' => 'social',
									'container' => false,
									'container_class' => false,
									'menu_class' => 'social-links',
								);

								wp_nav_menu( $args);

							endif; 

						?>
					</div>
					<div class="col-7 text-right">

						<?php 
							$header_btn = get_theme_mod('header_button');

							if( $header_btn ) : ?>
							 	<!-- Header CTA -->
							 	<div class="header-cta-btn">
							 		<?php echo $header_btn; ?>
							 	</div>
							 	<!-- ./Header CTA --> 
				 	 	<?php endif; ?> 

					</div>
				</div>
				<div class="border-line"></div>
			</div>
		</div>
		<div class="site-header-middle">
			<div class="auto-container">

				<!-- Site-logo --> 
				<div class="site-logo">
					<a href="<?php echo site_url() ?>"><?php themezero_get_logo() ?></a>
				</div>
				<!-- ./Site-logo --> 

				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<!-- Site Nav --> 
					<div class="site-nav">
						<?php get_template_part( 'template-parts/navigation/main', 'menu' ); ?>
					</div>
					<!-- . Site Nav -->
				<?php endif; ?>
			</div>	
		</div>
		<div class="site-header-bottom">
			<?php 

		        wp_nav_menu( array(
				    'menu'           => 'Primary Menu', // Do not fall back to first non-empty menu.
				    'depth'	         => 3,
				    'theme_location' => 'top',
				    'menu_class' 	 => 'nav navbar-nav main-menu',
				    'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarSupportedContent',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)); 

		     ?>
		</div>
	</header>
	<!-- ./Site-header -->
	<!-- Accessibility -->
	<div class="auto-container screen-reader-text">
		<a href="#main"><?php __( 'Skip to main content', 'themezero') ?></a>	
	</div>
	<!-- ./Accessibility -->


