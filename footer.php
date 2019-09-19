<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cdhi_theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<section class="cdhi-footer">
			<div class="footer-container container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<img class="footer-img-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/cdhi-logo.png" alt="">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<div class="footer-col-1">
							<p class="cdhi-name">CATANDUANES DOCTORS HOSPITAL INC.</p>
							<p class="rights">&copy; <?php echo date("Y"); ?>, All Rights Reserved</p>
							<p class="cdhi-address">SURTIDA ST., VALENCIA, VIRAC, CATANDUANES PHILIPPINES 4800</p>
							<img class="footer-yhor" src="#" alt="your-health-our-responsibility" />
							<p class="powered-by">POWERED BY: <a href="http://nocturnalpixels.com" target="_blank">NOCTURNAL PIXELS</a></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-12">
						<div class="footer-col-2">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'footer-primary',
									'menu_id'        => 'footer-primary-links',
								) );
							?>
						</div>
					</div>
					<div class="col-md-3 col-sm-12">
						<div class="footer-col-3">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'footer-secondary',
									'menu_id'        => 'footer-secondary-links',
								) );
							?>
						</div>
					</div>
					<div class="col-md-3 col-sm-12">
						<div class="footer-col-4">

						</div>
					</div>
				</div>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
