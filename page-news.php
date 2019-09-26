<?php
/**
 * Template Name: News and Blog
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
        <section class="news-and-blog-section-container">
            <div class="container">
                
            </div>
        </section>
    </main>
<?php
get_footer();
