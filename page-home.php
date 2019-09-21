<?php
/**
 * Template Name: Home
 */

get_header();
?>
    <main>
		<section class="above-the-fold">
			<div class="container atf-container">
				<div class="atf-glide">
					<div class="atf-glide__track" data-glide-el="track">
						<div class="glide__slides">
							<?php
								$sliders = get_field('banner_slider');
								foreach($sliders as $slider) :
								$image = $slider['image']['sizes'];
							?>
								<picture>
									<source srcset="<?php echo $image['large'] ?>" media="(min-width: 1200px)" />
									<source srcset="<?php echo $image['medium_large'] ?>" media="(min-width: 768px)" />
									<source srcset="<?php echo $image['medium'] ?>" media="(min-width: 0px)" />
									<img src="<?php echo $image['large'] ?>" />
								</picture>
							<?php
								endforeach;
							?>
						</div>
					</div>
				</div>
				<div class="atf-content">
					<a href="">
						<svg role="img" title="facebook" class="svg-icon atf-buttons-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#medical-result"/>
						</svg>
						<div class="btn-text">
							<p class="text">Online Result</p>
							<p class="subtext">See your Medical Result Fast</p>
						</div>
					</a>
					<a href="">
						<svg role="img" title="facebook" class="svg-icon atf-buttons-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#heart"/>
						</svg>
						<div class="btn-text">
							<p class="text">Our Services</p>
							<p class="subtext">See available services for you</p>
						</div>
					</a>
					<a href="">
						<svg role="img" title="facebook" class="svg-icon atf-buttons-svg">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#calendar"/>
						</svg>
						<div class="btn-text">
							<p class="text">Make an Appointment</p>
							<p class="subtext">Let's talk about how CDHI can help</p>
						</div>
					</a>
				</div>
			</div>
		</section>
		<section class="home-description">
			<div class="container">
				<h2>Catanduanes Doctors Hospital Inc.</h2>
				<p>With its prominently elegant structure, CDHI poses as the island’s endearing surprise not only to the people of Catanduanes but also to the global community. To top it all, CDHI’s immense potentials in the medical tourism industry, to likewise include wide job opportunities to the people in and outside Catanduanes, CDHI promises to offer better health and therefore better life. After all, “Your health is our responsibility” is what CDHI is all for.</p>
			</div>
		</section>
		<section class="partners-section">
			<div class="container">
				<h3>Our Partners</h3>
				<div class="partner-images-desktop">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/partners/partners-desktop-1.png" />
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/partners/partners-desktop-2.png" />
				</div>
				<div class="partner-images-mobile">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/partners/partners-mobile-1.png" />
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/partners/partners-mobile-2.png" />
				</div>
			</div>
		</section>
	</main>
<?php
get_footer();
