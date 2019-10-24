<?php
    /**
     * Template Name: Reference
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
    <section class="reference-section-container">
        <div class="container">

            <div class="row">
                <?php if (have_rows('tabs_and_content')): ?>
                        <div class="col-md-4">
                            <div class="tabs-container">
                                <div show class="nav flex-column nav-pills show" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php
                                    $i = 0;
                                    while (have_rows('tabs_and_content')) : the_row();
                                        ?>
                                        <?php
                                        $string = sanitize_title(get_sub_field('tab_title'));
                                        ?>
                                        <a class="nav-link tab-btns" id="<?php echo $string; ?>-tab" data-toggle="pill" href="#<?php echo $string; ?>" role="tab" href="#<?php echo $string ?>" aria-controls="<?php echo $string ?>" role="tab" data-toggle="tab"><?php the_sub_field('tab_title'); ?></a>
                                        <?php
                                        $i++;
                                    endwhile;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content tab-content-container" id="v-pills-tabContent">
                                <?php
                                $i = 0;
                                while (have_rows('tabs_and_content')) : the_row();
                                    ?>
                                    <?php
                                    $string = sanitize_title(get_sub_field('tab_title'));
                                    ?>
                                    <div show role="tabpanel" class="tab-pane fade show <?php if ($i == 0) { ?>in active<?php } ?>" id="<?php echo $string; ?>">
                                        <h2 class="m-b-20"><?php the_sub_field('tab_title'); ?></h2>
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </section>

    <script type="text/javascript">
    $(function(){
  var hash = window.location.hash;
  hash && $('a[href="' + hash + '"]').tab('show');
  $('a').click(function (e) {
     $(this).tab('show');
     var scrollmem = $('body').scrollTop();
     window.location.hash = this.hash;
  });
});
    </script>
</main>
<?php
    get_footer();
