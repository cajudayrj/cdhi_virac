<?php
/**
 * Template Name: Services
 */

get_header();

$content = get_field('content');
$imageFull = get_field('introduction_image')['url'];
$image = get_field('introduction_image')['sizes'];
/**
 * QUERY SERVICES POST TYPE
 */
$query = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => -1) );
$posts = $query->posts;
$hospitalServices = [];
$catTerms = get_terms('service-category');
$availableCat = [];
/**
 * STORE ALL SERVICES UNDER HOSPITAL SERVICE ON OWN CATEGORY
 */
foreach ($posts as $p) :
    $pId = $p->ID;
    $hospServ = get_field('main_category', $pId);
    $term = get_the_terms($pId, 'service-category');
    if($hospServ == 'hospital-services'):
        if(is_array($term) || is_object($term)) :
            foreach($term as $t):
                if($t->name):
                    $hospitalServices[$t->name][] = $p;
                endif;
            endforeach;
        endif;
    endif;
endforeach;
/**
 * GET ALL AVAILABLE CATEGORY
 * SORT ALPHABETICALLY
 */
foreach($catTerms as $categ):
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
                        <picture>
                            <source srcset="<?php echo $imageFull ?>" media="(min-width: 1200px)" />
                            <source srcset="<?php echo $image['large'] ?>" media="(min-width: 768px)" />
                            <source srcset="<?php echo $image['medium_large'] ?>" media="(min-width: 0px)" />
                            <img src="<?php echo $imageFull ?>" />
                        </picture>
                    </div>
                <div class="col"></div>
                <div class="col-md-7 service-content-container">
                    <div class="services-tabs">
                        <button id="hospital-services" class="services-tabs-btn active" data-cat-btn="hospital-services">Hospital Services</button>
                        <button id="resource-center" class="services-tabs-btn" data-cat-btn="resource-center">Resource Center</button>
                        <button id="community-program" class="services-tabs-btn" data-cat-btn="community-program">Community Program</button>
                    </div>
                    <div class="service-container opened" data-category="hospital-services">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                    foreach ($availableCat as $key => $avc):
                                        $catKey = $key;
                                        foreach ($hospitalServices as $key => $hService) :
                                            if($key == $avc):
                                ?>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="services">
                                                        <h4><?php echo $key ?></h4>
                                                        <?php 
                                                            usort($hService, function($a, $b){
                                                                return strcmp($a->post_title,$b->post_title);
                                                            });
                                                            foreach($hService as $h): 
                                                            $hsGroup = get_field('hospital_services',$h->ID);
                                                            $hsImg = $hsGroup['service_image'];
                                                        ?>
                                                            <p class="service-title" data-service-modal="<?php echo $catKey.'-'.$h->ID; ?>"><?php echo $h->post_title ?></p>
                                                            <div class="service-modal modal-<?php echo $catKey.'-'.$h->ID; ?>">
                                                                <div class="container p-0">
                                                                    <div class="modal-container">
                                                                        <div class="row">
                                                                            <div class="col-md-8 offset-md-2 back-column">
                                                                                <p class="close-modal" data-modal-close="<?php echo $catKey.'-'.$h->ID; ?>">
                                                                                    <svg role="img" title="close-modal" class="close-modal-svg">
                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#left-arrow"/>
                                                                                    </svg>
                                                                                    Back to Our Services
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-8 offset-md-2 service-column">
                                                                                <h3 class="head-title">Service</h3>
                                                                                <h2 class="main-title"><?php echo $h->post_title ?></h2>
                                                                                <p class="service-desc"><?php echo $hsGroup['service_description']; ?></p>
                                                                                <div class="service-img">
                                                                                    <picture>
                                                                                        <source srcset="<?php echo $hsImg['url'] ?>" media="(min-width: 1200px)" />
                                                                                        <source srcset="<?php echo $hsImg['sizes']['large'] ?>" media="(min-width: 768px)" />
                                                                                        <source srcset="<?php echo $hsImg['sizes']['medium_large'] ?>" media="(min-width: 0px)" />
                                                                                        <img src="<?php echo $hsImg['url'] ?>" />
                                                                                    </picture>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 offset-md-2 service-availability">
                                                                                <div class="availability-day content">
                                                                                    <p class="label">Availability Day:</p>
                                                                                    <p class="value"><?php echo $hsGroup['availability_day'] ?></p>
                                                                                </div>
                                                                                <div class="availability-time content">
                                                                                    <p class="label">Availability Time:</p>
                                                                                    <p class="value"><?php echo $hsGroup['availability_time'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 service-location">
                                                                                <div class="service-floor content">
                                                                                    <p class="label">Floor:</p>
                                                                                    <p class="value"><?php echo $hsGroup['floor'] ?></p>
                                                                                </div>
                                                                                <div class="service-room content">
                                                                                    <p class="label">Room:</p>
                                                                                    <p class="value"><?php echo $hsGroup['room'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 offset-md-2 service-officer">
                                                                                <div class="content">
                                                                                    <p class="label">Officer-In-Charge:</p>
                                                                                    <p class="value"><?php echo $hsGroup['officer_in_charge'] ?></p>
                                                                                </div>
                                                                            </div>
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
                    <div class="service-container" data-category="resource-center">
                        <h1>Resource Center</h1>
                    </div>
                    <div class="service-container" data-category="community-program">
                        <h1>Community Program</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </main>
<?php
get_footer();
