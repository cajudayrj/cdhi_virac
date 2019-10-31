<?php
/**
 * Template Name: Reviews and Testimonials
 */

get_header();
$fields = get_field('reviews');
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
        <section class="reviews-section-container">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="review-heading"><?php the_title(); ?></h1>
                    </div>
                    <?php
                        if(count($fields) > 0):
                            foreach($fields as $f):
                    ?>
                        <div class="col-md-6 col-sm-12">
                            <div class="review-block-container">
                                <div class="stars">
                                    <?php
                                        for($i = 0; $i < (int)$f['star_count']; $i++):
                                    ?>
                                        <svg role="img" title="review-star" class="review-star">
                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#star"/>
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                                <p class="review-title"><?php echo $f['review_title'] ?></p>
                                <p class="review-description"><?php echo $f['review_description']; ?> <span class="reviewer-name"> - <?php echo $f['reviewer_name'] != '' ? $f['reviewer_name'] : 'Anonymous' ?></span></p>
                            </div>
                        </div>
                    <?php
                            endforeach;
                        else:
                    ?>
                        <div class="col-md-6 col-sm-12">
                            <div class="caution">
                                    <svg role="img" title="caution" class="caution-svg">
                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
                                    </svg>
                                    <div class="caution-text">
                                            <p>No acquired reviews and testimonials.</p>
                                    </div>
                            </div>
                        </div>
                    <?php
                        endif;
                    ?>
                    <div class="col-12">
                        <div class="review-disclaimer">
                            <p>Reviews and Testimonial Form is given to the patient or patient’s relative before they leave the hospital.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
