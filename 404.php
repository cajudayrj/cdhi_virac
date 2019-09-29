<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cdhi_theme
 */

get_header();
?>

	<main>
		<section class="not-found">
			<div class="container">
				<div class="page-404-container">
					<p>404</p>
					<h1>Page not Found.</h1>
					<a href="<?php echo home_url() ?>">Go back to homepage.</a>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
