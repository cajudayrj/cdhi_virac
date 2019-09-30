<?php
/**
 * Template Name: Doctor
 */

get_header();
$content = get_field('content');
$imageFull = get_field('introduction_image')['url'];
$image = get_field('introduction_image')['sizes'];
/**
 * DOCTORS PER DEPARTMENT LIST
 */
$loop = new WP_Query( array( 'post_type' => 'doctor', 'posts_per_page' => -1) );
$departmentTerms = get_terms('department');
$hmoTerms = get_terms('hmo');
$departmentDoctor = [];
$availableDepartments = [];
//STORE EACH DOCTOR TO A DEPARTMENT FOR SORTING
foreach($loop->posts as $p):
    $term = get_the_terms($p->ID, 'department');
	if(is_array($term) || is_object($term)){
    foreach($term as $t):
        if($t->name):
            $departmentDoctor[$t->name][] = $p;
        endif;
    endforeach;
	}
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
                        <source srcset="<?php echo $imageFull ?>" media="(min-width: 1200px)" />
                        <source srcset="<?php echo $image['large'] ?>" media="(min-width: 768px)" />
                        <source srcset="<?php echo $image['medium_large'] ?>" media="(min-width: 0px)" />
                        <img src="<?php echo $imageFull ?>" />
                    </picture>
                </div>
                <div class="col"></div>
                <div class="col-md-7 col-sm-12 doctors-list-content">
                    <h3>List of Our Doctors</h3>
                    <?php
                        foreach($availableDepartments as $key=>$dept):
                            $deptIndex = $key;
                    ?>
                        <div class="doctors-department-container">
                            <h5><?php echo $dept ?></h5>
                            <div class="container">
                                <div class="row">
                                    <?php 
                                        foreach($departmentDoctor as $key=>$doctor) :
                                            if($key==$dept) :
                                                usort($doctor, function($a, $b){
                                                    $lnameA = get_field('last_name', $a->ID);
                                                    $lnameB = get_field('last_name', $b->ID);
                                                    return strcmp($lnameA, $lnameB);
                                                });
                                                foreach($doctor as $d):
                                                    $id = $d->ID;
                                                    $specialization = get_field('specialization', $id);
                                                    $subspec = get_field('sub_specialization', $id);
                                                    $doctorImg = get_field('image', $id) ? get_field('image', $id)['url'] : get_template_directory_uri()."/assets/images/doc-default-photo.png";
                                                    $ln = get_field('last_name', $id);
                                                    $fn = get_field('first_name', $id);
                                                    $status = get_field('status', $id);
                                                    $hasSched = get_field('has_schedule', $id);
                                                    $medschool = get_field('medical_school', $id);
                                                    $internship = get_field('internship', $id);
                                                    $residency = get_field('residency', $id);
                                                    $fellowship = get_field('fellowship', $id);
                                                    $localSpecialty = get_field('local_specialty_board', $id);
                                                    //ACTIVE SCHED
                                                    $activeSched = get_field('active_schedule', $id);
                                                    $m = ((($activeSched['monday']['am']['time'] != '')  or ($activeSched['monday']['am']['by_appointment'])) or (($activeSched['monday']['pm']['time'] != '') or ($activeSched['monday']['pm']['by_appointment']))) ? 'M ' : '';
                                                    $t = ((($activeSched['tuesday']['am']['time'] != '')  or ($activeSched['tuesday']['am']['by_appointment'])) or (($activeSched['tuesday']['pm']['time'] != '') or ($activeSched['tuesday']['pm']['by_appointment']))) ? 'T ' : '';
                                                    $w = ((($activeSched['wednesday']['am']['time'] != '')  or ($activeSched['wednesday']['am']['by_appointment'])) or (($activeSched['wednesday']['pm']['time'] != '') or ($activeSched['wednesday']['pm']['by_appointment']))) ? 'W ' : '';
                                                    $th = ((($activeSched['thursday']['am']['time'] != '')  or ($activeSched['thursday']['am']['by_appointment'])) or (($activeSched['thursday']['pm']['time'] != '') or ($activeSched['thursday']['pm']['by_appointment']))) ? 'TH ' : '';
                                                    $f = ((($activeSched['friday']['am']['time'] != '')  or ($activeSched['friday']['am']['by_appointment'])) or (($activeSched['friday']['pm']['time'] != '') or ($activeSched['friday']['pm']['by_appointment']))) ? 'F ' : '';
                                                    $s = ((($activeSched['saturday']['am']['time'] != '')  or ($activeSched['saturday']['am']['by_appointment'])) or (($activeSched['saturday']['pm']['time'] != '') or ($activeSched['saturday']['pm']['by_appointment']))) ? 'S ' : '';
                                                    $su = ((($activeSched['sunday']['am']['time'] != '')  or ($activeSched['sunday']['am']['by_appointment'])) or (($activeSched['sunday']['pm']['time'] != '') or ($activeSched['sunday']['pm']['by_appointment']))) ? 'SU' : '';
                                                    $mAm = $activeSched['monday']['am'];
                                                    $mPm = $activeSched['monday']['pm'];
                                                    $tAm = $activeSched['tuesday']['am'];
                                                    $tPm = $activeSched['tuesday']['pm'];
                                                    $wAm = $activeSched['wednesday']['am'];
                                                    $wPm = $activeSched['wednesday']['pm'];
                                                    $thAm = $activeSched['thursday']['am'];
                                                    $thPm = $activeSched['thursday']['pm'];
                                                    $fAm = $activeSched['friday']['am'];
                                                    $fPm = $activeSched['friday']['pm'];
                                                    $sAm = $activeSched['saturday']['am'];
                                                    $sPm = $activeSched['saturday']['pm'];
                                                    $suAm = $activeSched['sunday']['am'];
                                                    $suPm = $activeSched['sunday']['pm'];
                                                    //VISITING SCHED
                                                    $visitingSched = get_field('visiting_schedule', $id);
                                                    //HMO
                                                    $hmo = get_the_terms($id, 'hmo');
                                                    $doctorHMO = [];
                                                    if($hmo) :
                                                        foreach($hmo as $h):
                                                            $doctorHMO[] = $h->name;
                                                        endforeach;
                                                    endif;

                                    ?>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="doctor-profile-container" data-doctor-id="<?php echo $deptIndex."-".$id; ?>">
                                                    <span class="status <?php echo (($status == 'visiting') and ($hasSched)) ? 'hassched' : $status; ?>"><?php echo (($status == 'visiting') and ($hasSched)) ? 'Scheduled Visiting' : $status; ?></span>
                                                    <div class="doctor-image">
                                                        <img title="<?php echo 'Doctor' . ' ' . $fn  . ' ' . $ln . ' - ' . $specialization  . ' ' . 'in Catanduanes Doctors Hospital Inc.'; ?>" src="<?php echo $doctorImg; ?>" />
                                                    </div>
                                                    <p class="doctor-ln"><?php echo $ln; ?>,</p>
                                                    <p class="doctor-fn"><?php echo $fn; ?></p>
                                                    <p class="specialization"><?php echo $specialization; ?></p>
                                                    <?php if($subspec != ''): ?>
                                                        <p class="sub-spec"><?php echo $subspec; ?></p>
                                                    <?php endif; ?>
                                                    <?php if(($m or $t or $w or $th or $f or $s or $su) and $status == 'active'): ?>
                                                        <p class="sched"><?php echo $m.''.$t.''. $w.''.$th.''.$f.''.$s.''.$su ?></p>
                                                    <?php endif ?>
                                                </div>
                                                <div class="doctor-modal modal-<?php echo $deptIndex."-".$id; ?>" data-doctor-modal="<?php echo $deptIndex."-".$id; ?>">
                                                            <div class="container">
                                                        <div class="modal-content-container">
                                                                <div class="row">
                                                                    <div class="col-sm-10">
                                                                        <p class="close-modal" data-modal-close="<?php echo $deptIndex."-".$id; ?>">
                                                                            <svg role="img" title="close-modal" class="close-modal-svg">
                                                                                <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#left-arrow"/>
                                                                            </svg>
                                                                            Back to Our Doctors
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-1 col-xl-2"></div>
                                                                    <div class="col-md-3 col-xl-2">
                                                                        <div class="doctor-image">
                                                                            <img src="<?php echo $doctorImg; ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="doctor-details">
                                                                            <h3>Doctor</h3>
                                                                            <p class="name">
                                                                                <?php echo $fn.' '.$ln; ?>
                                                                                <span class="status <?php echo (($status == 'visiting') and ($hasSched)) ? 'hassched' : $status; ?>"><em><?php echo (($status == 'visiting') and ($hasSched)) ? 'Scheduled Visiting' : $status; ?></em></span>
                                                                            </p>
                                                                            <p class="specialty"><?php echo $specialization; ?></p>
                                                                            <?php if($subspec != ''): ?>
                                                                                <p class="sub-spec"><?php echo $subspec; ?></p>
                                                                            <?php endif; ?>
                                                                            <p class="department"><?php echo $dept; ?> Department</p>
                                                                            <div class="separator"></div>
                                                                            <div class="table-container">
                                                                                <?php if($status == 'active'): ?>
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>DAY</th>
                                                                                            <th>AM</th>
                                                                                            <th>PM</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>MONDAY</td>
                                                                                            <td>
                                                                                                <?php echo $mAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($mAm['time'] != '') or ($mAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $mAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $mPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($mPm['time'] != '') or ($mPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $mPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>TUESDAY</td>
                                                                                            <td>
                                                                                                <?php echo $tAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($tAm['time'] != '') or ($tAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $tAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $tPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($tPm['time'] != '') or ($tPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $tPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>WEDNESDAY</td>
                                                                                            <td>
                                                                                                <?php echo $wAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($wAm['time'] != '') or ($wAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $wAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $wPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($wPm['time'] != '') or ($wPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $wPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>THURSDAY</td>
                                                                                            <td>
                                                                                                <?php echo $thAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($thAm['time'] != '') or ($thAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $thAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $thPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($thPm['time'] != '') or ($thPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $thPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>FRIDAY</td>
                                                                                            <td>
                                                                                                <?php echo $fAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($fAm['time'] != '') or ($fAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $fAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $fPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($fPm['time'] != '') or ($fPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $fPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>SATURDAY</td>
                                                                                            <td>
                                                                                                <?php echo $sAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($sAm['time'] != '') or ($sAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $sAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $sPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($sPm['time'] != '') or ($sPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $sPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>SUNDAY</td>
                                                                                            <td>
                                                                                                <?php echo $suAm['time']; ?>
                                                                                                <?php
                                                                                                    if(($suAm['time'] != '') or ($suAm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $suAm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <?php echo $suPm['time']; ?>
                                                                                                <?php
                                                                                                    if(($suPm['time'] != '') or ($suPm['by_appointment'])) :
                                                                                                ?>
                                                                                                    <svg role="img" title="by-appointment" class="info-svg <?php echo $suPm['by_appointment'] ? 'appointment-svg' : '' ?> ">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                    </svg>
                                                                                                <?php endif; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <?php endif ?>
                                                                                <?php if($status == 'visiting' and $hasSched): ?>
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <th>SCHEDULE</th>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php 
                                                                                            foreach($visitingSched as $vSched): 
                                                                                        ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <svg role="img" title="calendar" class="calendar-svg">
                                                                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#calendar"/>
                                                                                                    </svg>
                                                                                                    <?php
                                                                                                        $date = $vSched['date'];
                                                                                                        echo $date['from'];
                                                                                                        echo $date['to'] != '' ? ' - '.$date['to'] : '';
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php
                                                                                            endforeach; 
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <?php if(($status == 'active') or ($status == 'visiting' and $hasSched)) : ?>
                                                                                <div class="legend-container">
                                                                                    <?php if($status == 'active') : ?>
                                                                                        <div class="legend">
                                                                                            <p class="fcfs">
                                                                                                <svg role="img" title="calendar" class="legend-fcfs-svg">
                                                                                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                </svg>
                                                                                                First come, First Served
                                                                                            </p>
                                                                                            <p class="by-app">
                                                                                                <svg role="img" title="calendar" class="legend-byapp-svg">
                                                                                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#info"/>
                                                                                                </svg>
                                                                                                By Appointment
                                                                                            </p>
                                                                                        </div>
                                                                                    <?php endif; ?>
                                                                                    <div class="schedule-note">
                                                                                        <p>* Schedule is subject to change without prior notice.</p>
                                                                                        <p>Please call CDHIl at 09770380379 / 09186183820 for confirmation.</p>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <div class="gap"></div>
                                                                            <?php if(count($doctorHMO) > 0) : ?>
                                                                                <div class="doctor-other-info">
                                                                                    <p class="modal-info-titles">HMO ACCREDITATION</p>
                                                                                    <ul>
                                                                                        <?php foreach($doctorHMO as $h): ?>
                                                                                            <li><?php echo $h; ?></li>
                                                                                        <?php endforeach; ?>
                                                                                    </ul>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if($medschool): ?>
                                                                                <div class="doctor-other-info">
                                                                                    <p class="modal-info-titles">MEDICAL SCHOOL</p>
                                                                                    <p class="modal-info-detail"><?php echo $medschool; ?></p>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if($internship): ?>
                                                                                <div class="doctor-other-info">
                                                                                    <p class="modal-info-titles">INTERNSHIP</p>
                                                                                    <p class="modal-info-detail"><?php echo $internship; ?></p>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if($residency): ?>
                                                                                <div class="doctor-other-info">
                                                                                    <p class="modal-info-titles">RESIDENCY</p>
                                                                                    <p class="modal-info-detail"><?php echo $residency; ?></p>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if($fellowship): ?>
                                                                                <div class="doctor-other-info">
                                                                                    <p class="modal-info-titles">FELLOWSHIP</p>
                                                                                    <p class="modal-info-detail"><?php echo $fellowship; ?></p>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <?php if($localSpecialty): ?>
                                                                                <div class="doctor-other-info">
                                                                                    <p class="modal-info-titles">LOCAL SPECIALTY BOARD</p>
                                                                                    <p class="modal-info-detail"><?php echo $localSpecialty; ?></p>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
