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
	<?php
		$footer = get_field('footer', 'option');
		$socmed = get_field('social_media', 'option');
	?>
	<footer id="colophon" class="site-footer">
		<section class="cdhi-footer">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-line.png" alt="" class="footer-line">
			<div class="footer-container container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<a href="<?php echo home_url(); ?>">
							<img class="footer-img-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/cdhi-logo-bordered.png" alt="">
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<div class="footer-col-1">
							<p class="cdhi-name">CATANDUANES DOCTORS HOSPITAL INC.</p>
							<p class="rights">&copy; <?php echo date("Y"); ?>, All Rights Reserved</p>
							<p class="cdhi-address"><?php echo $footer['address']; ?></p>
							<img class="footer-yhor" src="<?php echo get_template_directory_uri(); ?>/assets/images/yhor.png" alt="your-health-our-responsibility" />
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
							<div class="footer-socmed-icons">
								<?php if($socmed['facebook']): ?>
									<a target="_blank" href="<?php echo $socmed['facebook']; ?>">
										<svg role="img" title="facebook" class="svg-icon footer-svg">
											<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#facebook"/>
										</svg>
									</a>
								<?php endif ?>
								<?php if($socmed['messenger']): ?>
									<a target="_blank" href="<?php echo $socmed['messenger']; ?>">
										<svg role="img" title="messenger" class="svg-icon footer-svg">
											<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#messenger"/>
										</svg>
									</a>
								<?php endif ?>
								<?php if($socmed['twitter']): ?>
									<a target="_blank" href="<?php echo $socmed['twitter']; ?>">
										<svg role="img" title="twitter" class="svg-icon footer-svg">
											<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#twitter"/>
										</svg>
									</a>
								<?php endif ?>
								<?php if($socmed['instagram']): ?>
									<a target="_blank" href="<?php echo $socmed['instagram']; ?>">
										<svg role="img" title="instagram" class="svg-icon footer-svg">
											<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#instagram"/>
										</svg>
									</a>
								<?php endif ?>
							</div>
							<div class="footer-hotlines">
								<?php if ($footer['emergency_contact']) : ?>
									<p>Emergency | <a href="tel:<?php echo $footer['emergency_contact']; ?>"><?php echo $footer['emergency_contact']; ?></a></p>
								<?php endif ?>
								<?php if ($footer['free_shuttle_contact']) : ?>
									<p>Free Shuttle | <a href="tel:<?php echo $footer['free_shuttle_contact']; ?>"><?php echo $footer['free_shuttle_contact']; ?></a></p>
								<?php endif ?>
								<?php if ($footer['info_desk_contact']) : ?>
									<p>Info Desk | <a href="tel:<?php echo $footer['info_desk_contact']; ?>"><?php echo $footer['info_desk_contact']; ?></a></p>
								<?php endif ?>
							</div>
							<div class="footer-emails">
								<?php if ($footer['email']) : ?>
									<a href="mailto:<?php echo $footer['email']; ?>"><?php echo $footer['email']; ?></a>
								<?php endif ?>
								<?php if ($footer['marketing_email']) : ?>
									<a href="mailto:<?php echo $footer['marketing_email']; ?>"><?php echo $footer['marketing_email']; ?></a>
								<?php endif ?>
								<?php if ($footer['admission_email']) : ?>
									<a href="mailto:<?php echo $footer['admission_email']; ?>"><?php echo $footer['admission_email']; ?></a>
								<?php endif ?>
							</div>
							<div class="trustsiteseal">
											<script type="text/javascript"> //<![CDATA[
											var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
											document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
										//]]></script>
										<script language="JavaScript" type="text/javascript">
											TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_lg_222x54.png", "POSDV", "none");
									</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe-zFZQMRrR5OqRHSxJFRic3B1P3rVt-o&callback=initMap"
                                                                type="text/javascript"></script>
<?php wp_footer(); ?>

</body>
</html>
