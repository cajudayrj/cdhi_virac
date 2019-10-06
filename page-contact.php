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
                        <div class="row main-form-container">
                            <div class="col-md-12 form-col-container">
                                <div class="form-container container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-3 col-label">
                                            <p>Subject*</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-9 col-input">
                                            <div class="form-group">
                                                <select class="form-control" required rows="4">
                                                    <option value disabled selected>Subject</option>
                                                    <option value="option-1">Inquiry</option>
                                                    <option value="option-2">Sample</option>
                                                    <option value="option-3">Sample 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="col-sm-12 col-lg-12 col-input">
                                            <textarea type="text" placeholder="Your message" rows="3"></textarea>
                                        </div>
                                        <!-- -->
                                        <div class="col-sm-12 col-lg-3 col-label">
                                            <p>Last Name*</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-9 col-input">
                                            <input type="text" placeholder="Last Name"/>
                                        </div>
                                        <!-- -->
                                        <div class="col-sm-12 col-lg-3 col-label">
                                            <p>First Name*</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-9 col-input">
                                            <input type="text" placeholder="First Name"/>
                                        </div>
                                        <!-- -->
                                        <div class="col-sm-12 col-lg-3 col-label">
                                            <p>Address</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-9 col-input">
                                            <input type="text" placeholder="Address"/>
                                        </div>
                                        <!-- -->
                                        <div class="col-sm-12 col-lg-3 col-label">
                                            <p>Email*</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-9 col-input">
                                            <input type="email" placeholder="Gender"/>
                                        </div>
                                        <!-- -->
                                        <div class="col-sm-12 col-lg-3 col-label">
                                            <p>Contact No.*</p>
                                        </div>
                                        <div class="col-sm-12 col-lg-9 col-input">
                                            <input type="text" placeholder="Contact No."/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="appointment-btn">Send Request</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <p class="appointment-heading-instructions">For more urgent requests, please contact CDHI at <?php echo get_field('header','option')['mobile_phone']; ?></p>
                                <p class="appointment-heading-instructions">You can also visit us at Surtida St. Brgy. Valencia, Virac, Catanduanes</p>
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
