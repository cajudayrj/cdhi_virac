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
		<?php 
			$header = get_field('header','option'); 
			$footer = get_field('footer','option'); 
			$socmed = get_field('social_media','option');
		?>
		<nav id="site-navigation" class="main-navigation">
			<div class="primary-nav-container container">
				<div class="upper-header">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri() ?>/assets/images/cdhi-logo.png" alt="" />
					</a>
					<div class="header-logo-text">
						<h1>CATANDUANES DOCTORS HOSPITAL, INC.</h1>
						<div class="cdhi-header-details">
							<span>
								<svg role="img" title="facebook" class="svg-icon">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#location"/>
								</svg>
								<?php echo $header['address']; ?>
							</span>
							<span>
								<svg role="img" title="facebook" class="svg-icon">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#telephone"/>
								</svg>
								<?php echo $header['telephone']; ?>
							</span>
							<span>
								<svg role="img" title="facebook" class="svg-icon">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#phone"/>
								</svg>
								<?php echo $header['mobile_phone']; ?>
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
				<a href="tel:<?php echo $footer['emergency_contact'] ?>">
					<svg role="img" title="facebook" class="svg-icon sidebar-svg">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#telephone-2"/>
					</svg>
					Emergency
				</a>
				<a href="tel:<?php echo $footer['free_shuttle_contact'] ?>">
					<svg role="img" title="facebook" class="svg-icon sidebar-svg">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#telephone-2"/>
					</svg>
					Free Shuttle
				</a>
			</div>
			<div class="socmed-links">
					<a href="<?php echo $socmed['facebook']; ?>">
						<svg role="img" title="facebook" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/stack/svg/sprite.stack.svg#facebook"/>
						</svg>
					</a>
					<a href="<?php echo $socmed['messenger']; ?>">
						<svg role="img" title="messenger" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/stack/svg/sprite.stack.svg#messenger"/>
						</svg>
					</a>
					<a href="<?php echo $socmed['twitter']; ?>">
						<svg role="img" title="twitter" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/stack/svg/sprite.stack.svg#twitter"/>
						</svg>
					</a>
					<a href="<?php echo $socmed['instagram']; ?>">
						<svg role="img" title="instagram" class="svg-icon sidebar-svg">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/svg/stack/svg/sprite.stack.svg#instagram"/>
						</svg>
					</a>
			</div>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/yhor-green.png" alt="your-health-our-responsibility" class="yhor-sidebar" />
			<p class="cdhi-sb-name">CATANDUANES DOCTORS HOSPITAL INC.</p>
			<p class="cdhi-sb-rights">&copy; <?php echo date('Y'); ?>, All Rights Reserved</p>
			<p class="cdhi-sb-address"><?php echo $footer['address']; ?></p>
			<button class="close-sidebar">
				<div></div>
			</button>
		</div>
	</section>


	<div id="content" class="site-content">
