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
								Brgy. Valencia, Virac, Catanduanes
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
					<button class="burger-btn">
						<div class="burger-menu"></div>
					</button>
				</div>
				<div class="green-line-gradient"></div>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-nav',
					) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<section class="mobile-sidebar-navigation">
		<div class="bg-overlay"></div>
		<div class="sidebar-nav-content">
			<h3>CATANDUANES DOCTORS HOSPITAL, INC.</h3>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-nav',
				) );
			?>
			<div class="contact-links">
				<a href="#">
					<svg role="img" title="facebook" class="svg-icon sidebar-svg">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#facebook"/>
					</svg>
					Emergency
				</a>
				<a href="#">
					<svg role="img" title="facebook" class="svg-icon sidebar-svg">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#facebook"/>
					</svg>
					Free Shuttle
				</a>
			</div>
			<div class="socmed-links">
					<a href="#">
						<svg role="img" title="facebook" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#facebook"/>
						</svg>
					</a>
					<a href="#">
						<svg role="img" title="facebook" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#messenger"/>
						</svg>
					</a>
					<a href="#">
						<svg role="img" title="facebook" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#twitter"/>
						</svg>
					</a>
					<a href="#">
						<svg role="img" title="facebook" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#instagram"/>
						</svg>
					</a>
			</div>
			<button class="close-sidebar">
				<div></div>
			</button>
		</div>
	</section>


	<div id="content" class="site-content">
