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
                    <p class="appointment-heading-instructions">Catanduanes Doctors Hospital Inc. respects the confidentiality of your personal data.</p>
                    <p class="appointment-heading-instructions">We are committed to handling your personal data with care, including your health information, which you will provide us, and it is your right to be informed how this hospital uses these data.</p>
                    <p class="appointment-heading-instructions">Please click <a href="#">here</a> for the detailed Catanduanes Doctors Hospital privacy statement.</p>
                    <p class="appointment-heading-instructions">By filling out this online form and continuing to use this website, you agree to the hospital's processing of your personal information as explained in the privacy statement through link provided above.</p>
                </div>
                <div class="col-sm-12 col-md-8 appointment-caution">
                    <div class="caution">
                        <svg role="img" title="caution" class="caution-svg">
                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
                        </svg>
                        <div class="caution-text">
                            <p>This service is strictly for non-emergency, non-urgent cases and not applicable for Same Day Appointment requests.</p>
                            <p>For medical emergency, please call <a href="tel:<?php echo get_field('header','option')['mobile_phone']; ?>"><?php echo get_field('header','option')['mobile_phone']; ?></a>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h3 class="appointment-request-form-label">Appointment Request Form</h3>
                </div>
            </div>
            <div class="row main-form-container">
                <div class="col-md-6">
                    <h4 class="form-heading">CLIENT INFORMATION</h4>
                    <div class="form-container container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Last Name*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <input type="text" placeholder="Last Name"/>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>First Name*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <input type="text" placeholder="First Name"/>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Middle Name</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <input type="text" placeholder="Middle Name"/>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Gender*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <input type="text" placeholder="Gender"/>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Email*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <input type="email" placeholder="Gender"/>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Contact No.*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <input type="text" placeholder="Contact No."/>
                            </div>
                            <!-- -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="form-heading">APPOINTMENT INFORMATION</h4>
                    <div class="form-container container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Procedure Name Requested*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <textarea type="text" rows="3"></textarea>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Doctor's Request*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <textarea type="text" placeholder="Doctor's Request" rows="3"></textarea>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Service*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <div class="form-group">
                                    <select class="form-control" rows="3">
                                        <option value disabled selected>Select Service</option>
                                        <option value="option-1">Service 1</option>
                                        <option value="option-2">Service 2</option>
                                        <option value="option-3">Service 3</option>
                                    </select>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Best Time to Call*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <div class="form-group two-col">
                                    <select class="form-control" rows="3">
                                        <option value disabled selected>Select Hour</option>
                                        <option value="option-1">01</option>
                                        <option value="option-2">02</option>
                                        <option value="option-3">03</option>
                                    </select>
                                    <select class="form-control" rows="3">
                                        <option value disabled selected>Select Meridiem</option>
                                        <option value="option-1">AM</option>
                                        <option value="option-2">PM</option>
                                    </select>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Preferred Date to Call*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <div class="form-group three-col">
                                    <select class="form-control" rows="3">
                                        <option value disabled selected>Month</option>
                                        <option value="option-1">January</option>
                                        <option value="option-2">February</option>
                                        <option value="option-3">March</option>
                                    </select>
                                    <select class="form-control" rows="3">
                                        <option value disabled selected>Day</option>
                                        <option value="option-1">1</option>
                                        <option value="option-2">2</option>
                                        <option value="option-3">3</option>
                                    </select>
                                    <select class="form-control" rows="3">
                                        <option value disabled selected>Year</option>
                                        <option value="option-1">2019</option>
                                        <option value="option-2">2020</option>
                                        <option value="option-3">2021</option>
                                    </select>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Mode of Payment*</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <div class="form-group">
                                    <select class="form-control" rows="3">
                                        <option value="option-1">HMO</option>
                                        <option value="option-2">Cash</option>
                                    </select>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col-sm-12 col-lg-4 col-label">
                                <p>Remarks</p>
                            </div>
                            <div class="col-sm-12 col-lg-8 col-input">
                                <textarea type="text" rows="3" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="appointment-btn">Send Request</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="disclaimer">
                        <p>A Catanduanes Doctors Hospital Inc. On-Call service representative will contact you within two (2) business days upon receipt of this form to confirm your appointment request.</p>
                        <p>For more urgent requests, please contact CDHI On-Call at +632.8888.999.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </main>
<?php
get_footer();
