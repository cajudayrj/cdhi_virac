<?php
/**
 * Template Name: About
 */

get_header();
$fields = get_field('tabs_and_content');
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
        <section class="about-section-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tabs-container">
                            <?php 
                                if($fields): 
                                    foreach($fields as $key => $f):
                                        //create slug for id and link
                                        $text = $f['tab_title'];
                                        // replace non letter or digits by -
                                        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
                                        // transliterate
                                        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
                                        // remove unwanted characters
                                        $text = preg_replace('~[^-\w]+~', '', $text);
                                        // trim
                                        $text = trim($text, '-');
                                        // remove duplicate -
                                        $text = preg_replace('~-+~', '-', $text);
                                        // lowercase
                                        $text = strtolower($text);
                            ?>
                                <button class="tab-btns tab-btn-<?php echo $key; ?> <?php echo $key==0 ? 'active': '' ?>" id="<?php echo $text;?>" data-target-content="tab-content-<?php echo $key;?>"><?php echo $f['tab_title']; ?></button>
                            <?php
                                    endforeach;
                                endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        
                        <?php 
                                if($fields): 
                                    foreach($fields as $key => $f):
                            ?>
                                <div class="tab-content-container tab-content-<?php echo $key; ?> <?php echo $key==0 ? 'active': '' ?>">
                                    <h1><?php echo $f['tab_title']; ?></h1>
                                    <?php echo $f['content']; ?>
                                </div>
                            <?php
                                    endforeach;
                                endif;
                            ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
