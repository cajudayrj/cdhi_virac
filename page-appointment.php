<?php
/**
 * Template Name: Make Appointment
 */

get_header();
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
    <section class="make-an-appointment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 appointment-heading">
                    <h1 class="appointment-heading-title"><?php the_title(); ?></h1>
                    <div class="appointment-heading-instructions">
                        <?php echo get_field('heading_instructions') ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 appointment-caution">
                    <div class="caution">
                        <svg role="img" title="caution" class="caution-svg">
                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
                        </svg>
                        <div class="caution-text">
                            <?php echo get_field('heading_caution') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h3 class="appointment-request-form-label">Appointment Request Form</h3>
                </div>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="335" title="Make An Appointment"]'); ?>
            <div class="row main-form-container">
                <div class="col-md-6">
                    <div class="disclaimer">
                        <?php echo get_field('appointment_disclaimer') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </main>
<?php
get_footer();
