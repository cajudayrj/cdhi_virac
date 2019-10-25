<?php
    /**
     * Template Name: Board
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
    <section class="board-section-container">
        <div class="container">
            

            <div class="password-protected-form">

                <?php if (!post_password_required($post)): ?>
                        <div class="col-md-12">
                            <div class="row">
                                <?php the_field('content'); ?>
                                <?php the_content(); ?>
                            </div>
                        </div>

                    <?php else: ?>


                        <?php the_content(); ?>


                <?php
                    endif;
                ?>
            </div>

        </div>
    </section>
</main>
<?php
    get_footer();
