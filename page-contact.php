<?php
/**
 * Template Name: Contact
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
    <section class="contact-section-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 appointment-heading header">
                                <h1 class="appointment-heading-title"><?php the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 appointment-heading">
                                <p class="appointment-heading-instructions">Catanduanes Doctors Hospital Inc. respects the confidentiality of your personal data.</p>
                                <p class="appointment-heading-instructions">We are committed to handling your personal data with care, including your health information, which you will provide us, and it is your right to be informed how this hospital uses these data.</p>
                                <p class="appointment-heading-instructions">Please click <a href="#">here</a> for the detailed Catanduanes Doctors Hospital privacy statement.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="appointment-request-form-label">Contact Form</h3>
                            </div>
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="652" title="CDHI Contact Us"]') ?>
                        <div class="row main-form-container">
                            <div class="col-md-12">
                                <div class="disclaimer">
                                    <p>We will try to get back to you within 48 Hours! Thank you!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-12"></div>
                <div class="col-sm-12 col-md-5 appointment-heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="appointment-heading-instructions">
                                    <?php echo get_field('sidebar_text') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="map-container">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </main>
<?php
get_footer();
