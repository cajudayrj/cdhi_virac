<?php
/**
 * Template Name: Promos
 */

get_header();
$fields = get_field('promos');
?>
    <main>
        <div class="page-breadcrumb container">
            <div class="breadcrumb-text">
                <a href="<?php echo get_home_url(); ?>">
                    <svg role="img" title="previous" class="breadcrumb-svg">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#house"/>
                    </svg>
                </a>
                <span>/</span>
                <a href="#"><?php the_title(); ?></a>
            </div>
        </div>
        <section class="promos-section-container">
            <div class="container">
                <h1 class="promo-package-title">Promo Packages</h1>
                <?php 
                    if($fields):
                        foreach($fields as $key=>$f): 
                ?>
                    <div class="row promo-rows">
                        <div class="col-md-7 col-sm-12">
                            <div class="promo-img">
                                <picture>
                                    <source srcset="<?php echo $f['promo_image']['url'] ?>" media="(min-width: 1200px)" />
                                    <source srcset="<?php echo $f['promo_image']['sizes']['large'] ?>" media="(min-width: 768px)" />
                                    <source srcset="<?php echo $f['promo_image']['sizes']['medium_large'] ?>" media="(min-width: 0px)" />
                                    <img src="<?php echo $f['promo_image']['url'] ?>" />
                                </picture>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="promo-detail-content">
                                <p class="promo-title"><?php echo $f['promo_title']; ?></p>
                                <div class="promo-desc">
                                    <?php echo $f['promo_description']; ?>
                                </div>
                                <p class="promo-valid">Valid until: <?php echo $f['valid_until'] != '' ? $f['valid_until'] : '-'; ?></p>
                                <p class="promo-valid">Who can avail: <?php echo $f['who_can_avail'] != '' ? $f['who_can_avail'] : '-'; ?></p>
                            </div>
                        </div>
                        <?php if(count($fields) != ($key + 1)): ?>
                            <div class="col-sm-12">
                                <div class="separator"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                        endforeach;
                    else:
                ?>
                    <div class="row mb-5">
                        <div class="col-md-4 col-sm-12">
                            <div class="caution">
								<svg role="img" title="caution" class="caution-svg">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
								</svg>
								<div class="caution-text">
									<p>Unfortunately, we do not have any Promo Packages right now. Stay tuned!</p>
								</div>
							</div>
                        </div>
                    </div>
                <?php
                    endif;
                ?>
            </div>
        </section>
    </main>
<?php
get_footer();
