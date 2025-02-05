<?php
    /**
     * Template Name: Home
     */
    get_header();
?>
<main>
    <section class="above-the-fold">
        <div class="container atf-container">
            <div class="atf-glide d-none d-sm-none d-md-block d-lg-block">
                <div class="atf-glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        <?php
                            $sliders = get_field('banner_slider');
                            foreach ($sliders as $slider) :
                                $image = $slider['image']['sizes'];
                                ?>
                                <picture>
                                    <source srcset="<?php echo $slider['image']['url'] ?>" media="(min-width: 1200px)" />
                                    <source srcset="<?php echo $image['large'] ?>" media="(min-width: 768px)" />
                                    <source srcset="<?php echo $image['medium_large'] ?>" media="(min-width: 0px)" />
                                    <img src="<?php echo $slider['image']['url'] ?>" />
                                </picture>
                                <?php
                            endforeach;
                        ?>
                    </div>
                </div>
                <div class="atf-slider-controls" data-glide-el="controls">
                    <button data-glide-dir="&lt;" class="atf-prev">
                        <svg role="img" title="previous" class="atf-btn-slide-svg">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#back"/>
                        </svg>
                    </button>
                    <button data-glide-dir="&gt;" class="atf-next">
                        <svg role="img" title="next" class="atf-btn-slide-svg">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#next"/>
                        </svg>
                    </button>
                </div>
                <div class="atf-slide-pagination" data-glide-el="controls[nav]">
                    <?php for ($i = 0; $i < count($sliders); $i++): ?>
                            <button data-glide-dir="=<?php echo $i ?>"></button>
                        <?php endfor ?>
                </div>
            </div>

            <div class="atf-glide2 d-block d-sm-block d-md-none d-lg-none">
                <div class="atf-glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        <?php
                            $sliders_mobile = get_field('banner_slider_mobile');
                            foreach ($sliders_mobile as $slider_mobile) :
                                $image = $slider_mobile['image_mobile']['sizes'];
                                ?>
                                <picture>
                                    <source srcset="<?php echo $slider_mobile['image_mobile']['url'] ?>" media="(min-width: 1200px)" />
                                    <source srcset="<?php echo $image_mobile['large'] ?>" media="(min-width: 768px)" />
                                    <source srcset="<?php echo $image_mobile['medium_large'] ?>" media="(min-width: 0px)" />
                                    <img src="<?php echo $slider_mobile['image_mobile']['url'] ?>" />
                                </picture>
                                <?php
                            endforeach;
                        ?>
                    </div>
                </div>
                <div class="atf-slider-controls" data-glide-el="controls">
                    <button data-glide-dir="&lt;" class="atf-prev">
                        <svg role="img" title="previous" class="atf-btn-slide-svg">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#back"/>
                        </svg>
                    </button>
                    <button data-glide-dir="&gt;" class="atf-next">
                        <svg role="img" title="next" class="atf-btn-slide-svg">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#next"/>
                        </svg>
                    </button>
                </div>
                <div class="atf-slide-pagination" data-glide-el="controls[nav]">
                    <?php for ($i = 0; $i < count($sliders_mobile); $i++): ?>
                            <button data-glide-dir="=<?php echo $i ?>"></button>
                        <?php endfor ?>
                </div>
            </div>



            <script type="text/javascript">
                new Glide('.atf-glide', {
                    type: 'slider',
                    autoplay: 0,
                    animationDuration: 600,
                    animationTimingFunc: 'linear',
                    perView: 1,
                    gap: 0,
                    peek: 0
                }).mount()

                new Glide('.atf-glide2', {
                    type: 'slider',
                    autoplay: 0,
                    animationDuration: 600,
                    animationTimingFunc: 'linear',
                    perView: 1,
                    gap: 0,
                    peek: 0
                }).mount()
            </script>





            <div class="atf-content">
<!--                <a href="<?php // echo home_url()  ?>">
                    <svg role="img" title="experiment-results" class="svg-icon atf-buttons-svg">
                    <use xlink:href="<?php // echo get_template_directory_uri()  ?>/assets/svg/stack/svg/sprite.stack.svg#experiment-results"/>
                    </svg>
                    <div class="btn-text">
                        <p class="text">Online Result</p>
                        <p class="subtext">See your Medical Result Fast</p>
                    </div>
                </a>-->
                <a href="<?php echo home_url() ?>/our-services">
                    <svg role="img" title="heart" class="svg-icon atf-buttons-svg">
                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#heart"/>
                    </svg>
                    <div class="btn-text">
                        <p class="text">Our Services</p>
                        <p class="subtext">See available services for you</p>
                    </div>
                </a>
                <a href="<?php echo home_url() ?>/make-an-appointment">
                    <svg role="img" title="calendar" class="svg-icon atf-buttons-svg">
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
            <p><?php the_field('introduction'); ?></p>
        </div>
    </section>
    <section class="video-teaser">
        <div class="container text-center">
            <h2><?php the_field('video_teaser_title'); ?></h2>
            <p><?php the_field('video_teaser_description'); ?></p>

            <?php if( get_field('video_teaser_url') ): ?>
                    <div class="embed-container"><?php the_field('video_teaser_url'); ?><div>
            <?php endif; ?>

        </div>
    </section>
    <section class="partners-section">
        <div class="container">
            <h3>Our Partners</h3>
            <div class="partner-images-desktop">
                <img title="Catanduanes Doctors Hospital Partners" alt="Catanduanes Doctors Hospital Partners"
                     src="<?php the_field('partners_logo_desktop_screen'); ?>"
                     />
            </div>
            <div class="partner-images-mobile">
                <img  title="Catanduanes Doctors Hospital Partners" alt="Catanduanes Doctors Hospital Partners" src="<?php the_field('partners_logo_mobile_screen'); ?>" />
            </div>
        </div>
    </section>
    <section class="news-schedule-guide">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 cdhi-news">
                    <h4 class="title">LATEST NEWS & BLOG</h4>
                    <?php
                        $latestnews = new WP_Query(array('post_type' => 'news-and-blog', 'posts_per_page' => 5));
                        $news = $latestnews->posts;
                        foreach ($news as $n):
                            $newsid = $n->ID;
                            $newstitle = $n->post_title;
                            $newsimage = get_field('post_thumbnail', $newsid) ? get_field('post_thumbnail', $newsid)['sizes']['medium_large'] : get_template_directory_uri() . '/assets/images/glideimg.jpg';
                            $newspostdate = $n->post_date;
                            $newsdate = date("F j, Y", strtotime($newspostdate));
                            ?>
                            <a href="<?php the_permalink($newsid); ?>">
                                <div class="news-container">
                                    <div class="news-thumbnail">
                                        <img src="<?php echo $newsimage; ?>" title="news-thumbnail" alt="news-thumbnail" />
                                    </div>
                                    <div class="news-summary">
                                        <p class="title"><?php echo $newstitle; ?></p>
                                        <p class="date"><?php echo $newsdate; ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <a href="<?php echo home_url() ?>/news-blog" class="view-all">VIEW ALL</a>
                </div>
                <div class="col-sm-12 col-md-4 cdhi-schedule">
                    <h4 class="title">SCHEDULED VISITING DOCTORS</h4>
                    <?php
                        $loop = new WP_Query(array('post_type' => 'doctor', 'posts_per_page' => -1));
                        $doctorSched = [];
                        $count = 0;
                        foreach ($loop->posts as $p):
                            $docId = $p->ID;
                            $hasSched = get_field('has_schedule', $docId);
                            $st = get_field('status', $docId);
                            $visitingSched = get_field('visiting_schedule', $docId);
                            if (($st == 'visiting consultant') and $hasSched) :
                                $firstSched = $visitingSched[0]['date']['from'];
                                $doctorSched[] = [
                                    'date' => $firstSched,
                                    'doc' => $p
                                ];
                            endif;
                        endforeach;
                        //SORTING DATE FROM EARLIEST
                        usort($doctorSched, function($a, $b) {
                            if (strtotime($a['date']) > strtotime($b['date']))
                                return 1;
                            else if (strtotime($a['date']) < strtotime($b['date']))
                                return -1;
                            else
                                return 0;
                        });
                        if (count($doctorSched) > 0) :
                            foreach ($doctorSched as $dsched):
                                $count++;
                                $date = $dsched['date'];
                                $id = $dsched['doc']->ID;
                                $fn = get_field('first_name', $id);
                                $ln = get_field('last_name', $id);
                                $st = get_field('status', $id);
                                $docImage = get_field('image', $id) ? get_field('image', $id)['url'] : get_template_directory_uri() . '/assets/images/doc-default-photo.png';
                                $specialization = get_field('specialization', $id);
                                $services = get_field('services_offered', $id);
                                $vSched = get_field('visiting_schedule', $id);
                                //DISPLAY UP TO MAX 5 DOCTORS ONLY
                                if ($count <= 5):
                                    ?>
                                    <div class="schedule-container">
                                        <div class="doctor-thumbnail">
                                            <img src="<?php echo $docImage; ?>" title="<?php echo $fn; ?> <?php echo $ln; ?>  - <?php echo $specialization; ?>  in Catanduanes Doctors Hospital, Inc." alt="<?php echo $fn; ?> <?php echo $ln; ?>  - <?php echo $specialization; ?> in Catanduanes Doctors Hospital, Inc." />
                                        </div>
                                        <div class="doctor-summary">

                                            <p class="doctor-ln"><?php echo $ln ?>,</p>
                                            <p class="doctor-fn"><?php echo $fn ?></p>
                                            <p class="doctor-specialty"><?php echo $specialization ?></p>
                                            <?php if ($services): ?>
                                                <p class="services">Services Offered:</p>
                                                <ul class="service-list">
                                                    <?php foreach ($services as $service): ?>
                                                        <li><?php echo $service['service_name']; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                            <div class="doctor-schedule">
                                                <?php
                                                foreach ($vSched as $sched):
                                                    $date = $sched['date'];
                                                    ?>
                                                    <div class="doctor-schedule-container">
                                                        <svg role="img" title="calendar" class="ds-svg">
                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#calendar"/>
                                                        </svg>
                                                        <ul>
                                                            <li>
                                                                <?php
                                                                echo $date['from'];
                                                                echo $date['to'] != '' ? ' - ' . $date['to'] : '';
                                                                ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            endforeach;
                        else:
                            ?>
                            <div class="caution">
                                <svg role="img" title="caution" class="caution-svg">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
                                </svg>
                                <div class="caution-text">
                                    <?php the_field('no_scheduled_visiting_doctors_information_text'); ?>
                                </div>
                            </div>
                    <?php
                        endif;
                    ?>
                </div>
                <div class="col-sm-12 col-md-4 cdhi-guide">
                    <h4 class="title">YOUR CDHI GUIDE</h4>
                    <a href="<?php bloginfo('url'); ?>">
                        <div class="guide-container">
                            <div class="thumbnail">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Guide-PatientAdmission.png" alt="">
                            </div>
                            <div class="guide-text">
                                <p>PATIENT REFERENCES</p>
                            </div>
                        </div>
                    </a>
                    <a href="<?php bloginfo('url'); ?>/our-doctors">
                        <div class="guide-container">
                            <div class="thumbnail">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Guide-OurDoctors.png" alt="">
                            </div>
                            <div class="guide-text">
                                <p>OUR DOCTORS</p>
                            </div>
                        </div>
                    </a>
                    <a href="<?php bloginfo('url'); ?>/about">
                        <div class="guide-container">
                            <div class="thumbnail">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Guide-About.png" alt="">
                            </div>
                            <div class="guide-text">
                                <p>ABOUT CDHI</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="social-map">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 social-container">
                    <h4 class="title">Our Social Media</h4>
                    <div class="social-fb">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2FCatanduanesDHI%2F&tabs=timeline&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=140580083432415" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 map-container">
                    <h4 class="title">We are located here</h4>
                    <div id="map"></div>
                    <div class="map-address">
                        <svg role="img" title="map" class="map-svg">
                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#location"/>
                        </svg>
                        <p><?php echo get_field('footer', 'option')['address']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
    get_footer();
