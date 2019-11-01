<?php
    /**
     * Template Name: Services
     */
    get_header();

    $content = get_field('content');
    $imageGallery = get_field('introduction_image');
    /**
     * QUERY SERVICES POST TYPE
     */
    $query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => -1));
    $posts = $query->posts;
    $hospitalServices = [];
    $concessionaires = [];
    $communityPrograms = [];
    $catTerms = get_terms('service-category');
    $availableCat = [];
    /**
     * STORE ALL SERVICES UNDER HOSPITAL SERVICE ON OWN CATEGORY
     */
    foreach ($posts as $p) :
        $pId = $p->ID;
        $serviceCategory = get_field('main_category', $pId);
        $term = get_the_terms($pId, 'service-category');
        if ($serviceCategory == 'hospital-services'):
            if (is_array($term) || is_object($term)) :
                foreach ($term as $t):
                    if ($t->name):
                        $hospitalServices[$t->name][] = $p;
                    endif;
                endforeach;
            endif;
        endif;

        if($serviceCategory == 'concessionaires'):
            $concessionaires[] = $p;
        endif;

        if($serviceCategory == 'community-program'):
            $communityPrograms[] = $p;
        endif;
    endforeach;
    /**
     * GET ALL AVAILABLE CATEGORY
     * SORT ALPHABETICALLY
     */
    foreach ($catTerms as $categ):
        $availableCat[] = $categ->name;
    endforeach;
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
    <section class="services-section-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 service-introduction">
                    <h1>Our Services</h1>
                    <div class="intro-content">
                        <?php echo $content; ?>
                    </div>
                    <div class="page-slider">
                        <div class="page-glide__track" data-glide-el="track">
                            <div class="glide__slides">
                                <?php
                                    foreach($imageGallery as $gallery):
                                ?>
                                    <picture>
                                        <source srcset="<?php echo $gallery['url'] ?>" media="(min-width: 1200px)" />
                                        <source srcset="<?php echo $gallery['sizes']['large'] ?>" media="(min-width: 768px)" />
                                        <source srcset="<?php echo $gallery['sizes']['medium_large'] ?>" media="(min-width: 0px)" />
                                        <img src="<?php echo $gallery['url'] ?>" />
                                    </picture>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="page-slider-controls" data-glide-el="controls">
                            <button data-glide-dir="&lt;" class="page-prev">
                                <svg role="img" title="previous" class="page-btn-slide-svg">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#back"/>
                                </svg>
                            </button>
                            <button data-glide-dir="&gt;" class="page-next">
                                <svg role="img" title="next" class="page-btn-slide-svg">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#next"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-md-7 service-content-container">
                    <div class="services-tabs">
                        <button id="hospital-services" class="services-tabs-btn active" data-cat-btn="hospital-services">Hospital Services</button>
                        <button id="concessionaires" class="services-tabs-btn" data-cat-btn="concessionaires">Concessionaires</button>
                        <button id="community-program" class="services-tabs-btn" data-cat-btn="community-program">Community Program</button>
                    </div>
                    <div class="service-container opened" data-category="hospital-services">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                    foreach ($availableCat as $key => $avc):
                                        $catKey = $key;
                                        foreach ($hospitalServices as $key => $hService) :
                                            if ($key == $avc):
                                                ?>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="services">
                                                        <h4><?php echo $key ?></h4>
                                                        <?php
                                                        usort($hService, function($a, $b) {
                                                            return strcmp($a->post_title, $b->post_title);
                                                        });
                                                        foreach ($hService as $h):
                                                            $hsGroup = get_field('hospital_services', $h->ID);
                                                            $hsImg = $hsGroup['service_image'];
                                                            $soon = $hsGroup['service_coming_soon']
                                                            ?>
                                                            <p class="service-title" data-service-modal="<?php echo $catKey . '-' . $h->ID; ?>"><?php echo $h->post_title ?> <?php if($soon): ?><span>SOON</span><?php endif; ?></p>
                                                            <div class="service-modal modal-<?php echo $catKey . '-' . $h->ID; ?>">
                                                                <div class="container p-0">
                                                                    <div class="modal-container">
                                                                        <div class="row">
                                                                            <div class="col-md-8 offset-md-2 back-column">
                                                                                <p class="close-modal" data-modal-close="<?php echo $catKey . '-' . $h->ID; ?>">
                                                                                    <svg role="img" title="close-modal" class="close-modal-svg">
                                                                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#left-arrow"/>
                                                                                    </svg>
                                                                                    Back to Our Services
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-8 offset-md-2 service-column">
                                                                                <h3 class="head-title">Service</h3>
                                                                                <h2 class="main-title"><?php echo $h->post_title ?></h2>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 pl-0 desc-cont">
                                                                                            <div class="service-desc"><?php echo $hsGroup['service_description']; ?></div>
                                                                                        </div>
                                                                                        <div class="col-md-6 img-container">
                                                                                            <div class="img-cont" itemscope itemtype="http://schema.org/ImageGallery">
                                                                                                <img src="<?php echo $hsImg['sizes']['medium_large']; ?>" />
                                                                                                <div class="other-img-container">
                                                                                                    <div class="other-imgs-cont">
                                                                                                        <?php
                                                                                                        if ($hsGroup['gallery']):
                                                                                                            foreach ($hsGroup['gallery'] as $key => $g):
                                                                                                                ?>
                                                                                                                <figure class="other-imgs" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                                                                                    <a href="<?php echo $g['url']; ?>" itemprop="contentUrl" data-size="<?php echo $g['width']; ?>x<?php echo $g['height']; ?>" data-index="<?php echo $key + 1; ?>">
                                                                                                                        <img src="<?php echo $g['sizes']['medium_large']; ?>" itemprop="thumbnail" />
                                                                                                                    </a>
                                                                                                                </figure>
                                                                                                                <?php
                                                                                                            endforeach;
                                                                                                        endif;
                                                                                                        ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 offset-md-2 service-availability">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="availability-day content">
                                                                                            <p class="label">Availability Day:</p>
                                                                                            <p class="value"><?php echo $hsGroup['availability_day'] ?></p>
                                                                                        </div>
                                                                                        <div class="availability-time content">
                                                                                            <p class="label">Availability Time:</p>
                                                                                            <p class="value"><?php echo $hsGroup['availability_time'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="service-floor content">
                                                                                            <p class="label">Floor:</p>
                                                                                            <p class="value"><?php echo $hsGroup['floor'] ?></p>
                                                                                        </div>
                                                                                        <div class="service-room content">
                                                                                            <p class="label">Room:</p>
                                                                                            <p class="value"><?php echo $hsGroup['room'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="content">
                                                                                            <p class="label">Officer-In-Charge:</p>
                                                                                            <p class="value"><?php echo $hsGroup['officer_in_charge'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <?php if ($hsGroup['service_note_instruction']): ?>
                                                                                <div class="col-md-8 offset-md-2 pl-0">
                                                                                    <div class="service-desc service-note"><?php echo $hsGroup['service_note_instruction']; ?></div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <?php
                                            endif;
                                        endforeach;
                                    endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="service-container" data-category="concessionaires">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="services">
                                        <h4>Concessionaires</h4>
                                        <?php
                                            usort($concessionaires, function($a, $b) {
                                                return strcmp($a->post_title, $b->post_title);
                                            });
                                            foreach ($concessionaires as $key => $rc):
                                                $rcGroup = get_field('concessionaires', $rc->ID);
                                                $rcImg = $rcGroup['service_image'];
                                                $soon = $rcGroup['service_coming_soon']
                                                ?>
                                                <p class="service-title" data-service-modal="<?php echo 'rc-'. $key . '-' . $rc->ID; ?>"><?php echo $rc->post_title ?> <?php if($soon): ?><span>SOON</span><?php endif; ?></p>
                                                <div class="service-modal modal-<?php echo 'rc-'. $key . '-' . $rc->ID; ?>">
                                                    <div class="container p-0">
                                                        <div class="modal-container">
                                                            <div class="row">
                                                                <div class="col-md-8 offset-md-2 back-column">
                                                                    <p class="close-modal" data-modal-close="<?php echo 'rc-'. $key . '-' . $rc->ID; ?>">
                                                                        <svg role="img" title="close-modal" class="close-modal-svg">
                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#left-arrow"/>
                                                                        </svg>
                                                                        Back to Our Services
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-8 offset-md-2 service-column">
                                                                    <h3 class="head-title">Concessionaires</h3>
                                                                    <h2 class="main-title"><?php echo $rc->post_title ?></h2>
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-md-6 pl-0 desc-cont">
                                                                                <div class="service-desc"><?php echo $rcGroup['service_description']; ?></div>
                                                                            </div>
                                                                            <div class="col-md-6 img-container">
                                                                                <div class="img-cont" itemscope itemtype="http://schema.org/ImageGallery">
                                                                                    <img src="<?php echo $rcImg['sizes']['medium_large']; ?>" />
                                                                                    <div class="other-img-container">
                                                                                        <div class="other-imgs-cont">
                                                                                            <?php
                                                                                            if ($rcGroup['gallery']):
                                                                                                foreach ($rcGroup['gallery'] as $key => $g):
                                                                                                    ?>
                                                                                                    <figure class="other-imgs" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                                                                        <a href="<?php echo $g['url']; ?>" itemprop="contentUrl" data-size="<?php echo $g['width']; ?>x<?php echo $g['height']; ?>" data-index="<?php echo $key + 1; ?>">
                                                                                                            <img src="<?php echo $g['sizes']['medium_large']; ?>" itemprop="thumbnail" />
                                                                                                        </a>
                                                                                                    </figure>
                                                                                                    <?php
                                                                                                endforeach;
                                                                                            endif;
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 offset-md-2 service-availability">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="availability-day content">
                                                                                <p class="label">Availability Day:</p>
                                                                                <p class="value"><?php echo $rcGroup['availability_day'] ?></p>
                                                                            </div>
                                                                            <div class="availability-time content">
                                                                                <p class="label">Availability Time:</p>
                                                                                <p class="value"><?php echo $rcGroup['availability_time'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="service-floor content">
                                                                                <p class="label">Floor:</p>
                                                                                <p class="value"><?php echo $rcGroup['floor'] ?></p>
                                                                            </div>
                                                                            <div class="service-room content">
                                                                                <p class="label">Owned by:</p>
                                                                                <p class="value"><?php echo $rcGroup['owned_by'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <?php if ($rcGroup['service_note_instruction']): ?>
                                                                    <div class="col-md-8 offset-md-2 pl-0">
                                                                        <div class="service-desc service-note"><?php echo $rcGroup['service_note_instruction']; ?></div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-container" data-category="community-program">
                        <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="services">
                                            <h4>Community Program</h4>
                                            <?php
                                                usort($communityPrograms, function($a, $b) {
                                                    return strcmp($a->post_title, $b->post_title);
                                                });
                                                foreach ($communityPrograms as $key => $cp):
                                                    $cpGroup = get_field('community_program', $cp->ID);
                                                    $cpImg = $cpGroup['service_image'];
                                                    $soon = $cpGroup['service_coming_soon']
                                                    ?>
                                                    <p class="service-title" data-service-modal="<?php echo 'cp-'. $key . '-' . $cp->ID; ?>"><?php echo $cp->post_title ?> <?php if($soon): ?><span>SOON</span><?php endif; ?></p>
                                                    <div class="service-modal modal-<?php echo 'cp-'. $key . '-' . $cp->ID; ?>">
                                                        <div class="container p-0">
                                                            <div class="modal-container">
                                                                <div class="row">
                                                                    <div class="col-md-8 offset-md-2 back-column">
                                                                        <p class="close-modal" data-modal-close="<?php echo 'cp-'. $key . '-' . $cp->ID; ?>">
                                                                            <svg role="img" title="close-modal" class="close-modal-svg">
                                                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#left-arrow"/>
                                                                            </svg>
                                                                            Back to Our Services
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-8 offset-md-2 service-column">
                                                                        <h3 class="head-title">Community Program</h3>
                                                                        <h2 class="main-title"><?php echo $cp->post_title ?></h2>
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-6 pl-0 desc-cont">
                                                                                    <div class="service-desc"><?php echo $cpGroup['service_description']; ?></div>
                                                                                </div>
                                                                                <div class="col-md-6 img-container">
                                                                                    <div class="img-cont" itemscope itemtype="http://schema.org/ImageGallery">
                                                                                        <img src="<?php echo $cpImg['sizes']['medium_large']; ?>" />
                                                                                        <div class="other-img-container">
                                                                                            <div class="other-imgs-cont">
                                                                                                <?php
                                                                                                if ($cpGroup['gallery']):
                                                                                                    foreach ($cpGroup['gallery'] as $key => $g):
                                                                                                        ?>
                                                                                                        <figure class="other-imgs" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                                                                            <a href="<?php echo $g['url']; ?>" itemprop="contentUrl" data-size="<?php echo $g['width']; ?>x<?php echo $g['height']; ?>" data-index="<?php echo $key + 1; ?>">
                                                                                                                <img src="<?php echo $g['sizes']['medium_large']; ?>" itemprop="thumbnail" />
                                                                                                            </a>
                                                                                                        </figure>
                                                                                                        <?php
                                                                                                    endforeach;
                                                                                                endif;
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 offset-md-2 service-availability">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="availability-day content">
                                                                                    <p class="label">Date:</p>
                                                                                    <p class="value"><?php echo $cpGroup['date'] ?></p>
                                                                                </div>
                                                                                <div class="availability-time content">
                                                                                    <p class="label">Time:</p>
                                                                                    <p class="value"><?php echo $cpGroup['time'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="service-floor content">
                                                                                    <p class="label">Where:</p>
                                                                                    <p class="value"><?php echo $cpGroup['where'] ?></p>
                                                                                </div>
                                                                                <div class="service-room content">
                                                                                    <p class="label">Partners:</p>
                                                                                    <p class="value"><?php echo $cpGroup['partners'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <?php if ($cpGroup['service_note_instruction']): ?>
                                                                        <div class="col-md-8 offset-md-2 pl-0">
                                                                            <div class="service-desc service-note"><?php echo $cpGroup['service_note_instruction']; ?></div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
