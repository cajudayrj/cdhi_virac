<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cdhi_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cdhi_theme' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			<?php
			// wp_nav_menu( array(
			// 	'theme_location' => 'menu-1',
			// 	'menu_id'        => 'primary-nav',
			// ) );
			?>
			<div class="primary-nav-container container">
				<div class="upper-header">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/cdhi-logo.png" alt="" />
					<div class="header-logo-text">
						<h1>CATANDUANES DOCTORS HOSPITAL, INC.</h1>
						<div class="cdhi-header-details">
							<span>
								<svg role="img" title="facebook" class="svg-icon">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#facebook"/>
								</svg>
								BRGY. VALENCIA, VIRAC, CATANDUANES
							</span>
							<span>
								<svg role="img" title="facebook" class="svg-icon">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#messenger"/>
								</svg>
								(052) 740-5441
							</span>
							<span>
								<svg role="img" title="facebook" class="svg-icon">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#twitter"/>
								</svg>
								09770380379 / 09186183820
							</span>
						</div>
					</div>
				</div>
				<div class="green-line-gradient"></div>
				<div class="primary-nav">
					<ul>
						<li class="menu-active"><a href="#" target="_blank">CDHI</a></li>
						<li><a href="#" class="" target="_blank">OUR SERVICES</a></li>
						<li><a href="#" class="" target="_blank">OUR DOCTORS</a></li>
						<li><a href="#" class="" target="_blank">MAKE AN APPOINTMENT</a></li>
						<li><a href="#" class="" target="_blank">NEWS & BLOG</a></li>
						<li><a href="#" class="" target="_blank">CONTACT</a></li>
						<li><a href="#" class="" target="_blank">TOUR</a></li>
						<li><a href="#" class="" target="_blank">PROMOS</a></li>
						<li><a href="#" class="" target="_blank">ABOUT</a></li>
					</ul>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<section class="mobile-sidebar-navigation">
		
	</section>

	<div id="content" class="site-content">
