<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cdhi_theme
 */

get_header();
?>

	<main>
		<section class="above-the-fold">
			<div class="container">
				<div class="atf-glide">
					<div class="atf-glide__track" data-glide-el="track">
						<div class="glide__slides">
							<img class="glide__slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/glideimg.jpg" alt="" />
							<img class="glide__slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/glideimg.jpg" alt="" />
							<img class="glide__slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/glideimg.jpg" alt="" />
							<img class="glide__slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/glideimg.jpg" alt="" />
							<img class="glide__slide" src="<?php echo get_template_directory_uri(); ?>/assets/images/glideimg.jpg" alt="" />
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
