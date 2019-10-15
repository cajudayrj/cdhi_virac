<?php
/**
 * Template Name: Career
 */

get_header();
$fields = get_field('careers');
$img = get_field('banner_image');
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
        <section class="career-section-container">
            <div class="container">
                <div class="row">
                   
                            <?php 
                                if($fields):
                            ?>
                                <div class="col-md-9">
                            <?php
                                    foreach($fields as $key => $f): 
                            ?>
                                        <div class="career-content-container">
                                            <div class="career-container">
                                                <button class="career-btns" data-career="<?php echo 'career-'.$key ?>"><?php echo $f['career_title']; ?></button>
                                                <div class="career-content" id="<?php echo 'career-'.$key ?>">
                                                    <?php if($f['vacant_positions'] or $f['vacant_positions'] > 0): ?>
                                                        <p class="vacant-position"><?php echo $f['vacant_positions'] ?> Vacant Positions</p>
                                                    <?php endif; ?>
                                                    <div class="qualifications">
                                                        <?php echo $f['qualifications'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php 
                                    endforeach; 
                            ?>
                                </div>
                            <?php
                                else:
                            ?>
                                <div class="col-md-4">
                                    <div class="caution">
                                        <svg role="img" title="caution" class="caution-svg">
                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
                                        </svg>
                                        <div class="caution-text">
                                            <p>Unfortunately, we do not have any available positions to be filled in right now.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5"></div>
                            <?php
                                endif;
                            ?>
                    <div class="col-md-3">
                        <div class="info">
                            <?php echo get_field('side_information'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 col-sm-8 offset-2">
                        <img class="yhor-cdhi-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/yhor-cdhi.png" alt="Your Health Our Responsibility - CDHI">
                    </div>
                    <?php if($img): ?>
                        <div class="col-12">
                            <picture>
                                <source srcset="<?php echo $img['url'] ?>" media="(min-width: 1200px)" />
                                <source srcset="<?php echo $img['sizes']['large'] ?>" media="(min-width: 768px)" />
                                <source srcset="<?php echo $img['sizes']['medium_large'] ?>" media="(min-width: 0px)" />
                                <img src="<?php echo $img['url'] ?>" />
                            </picture>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
