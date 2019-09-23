<?php
/**
 * Template Name: Doctor
 */

get_header();
$content = get_field('content');
$image = get_field('introduction_image')['sizes'];
/**
 * DOCTORS PER DEPARTMENT LIST
 */
$loop = new WP_Query( array( 'post_type' => 'doctor') );
$departmentTerms = get_terms('department');
$departmentDoctor = [];
$availableDepartments = [];
//STORE EACH DOCTOR TO A DEPARTMENT FOR SORTING
foreach($loop->posts as $p):
    $term = get_the_terms($p->ID, 'department');
    foreach($term as $t):
        if($t->name):
            $departmentDoctor[$t->name][] = $p;
        endif;
    endforeach;
endforeach;
// GET AVAILABLE DEPARTMENTS (COMPARISON CHECKER FOR LOOPING)
foreach($departmentTerms as $department):
    $availableDepartments[] = $department->name;
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
    <section class="doctor-main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 doctors-introduction">
                    <h1>Our Doctors</h1>
                    <div class="intro-content">
                        <?php echo $content; ?>
                    </div>
                    <picture>
                        <source srcset="<?php echo $image['large'] ?>" media="(min-width: 1200px)" />
                        <source srcset="<?php echo $image['medium_large'] ?>" media="(min-width: 768px)" />
                        <source srcset="<?php echo $image['medium_large'] ?>" media="(min-width: 0px)" />
                        <img src="<?php echo $image['large'] ?>" />
                    </picture>
                </div>
                <div class="col"></div>
                <div class="col-md-7 col-sm-12 doctors-list-content">
                    <h3>List of Our Doctors</h3>
                    <?php
                        foreach($availableDepartments as $dept):
                    ?>
                            <div class="doctors-department-container">
                                <h5><?php echo $dept ?></h5>
                                <div class="container">
                                    <div class="row">
                                        <?php 
                                            foreach($departmentDoctor as $key=>$doctor) :
                                                if($key==$dept) :
                                                    foreach($doctor as $d):
                                                        $id = $d->ID;
                                                        $specialization = get_field('specialization', $id);
                                                        $ln = get_field('last_name', $id);
                                                        $fn = get_field('first_name', $id);
                                        ?>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <p>Name: <?php echo $fn.' '.$ln; ?></p>
                                                    <p>Specialization: <?php echo $specialization; ?></p>
                                                </div>
                                        <?php 
                                                    endforeach;
                                                endif;
                                            endforeach;
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>
 </main>
<?php
get_footer();
