<?php
/**
 * Template Name: FAQ
 */

get_header();
$fields = get_field('questions_and_answers');
$img = get_field('banner_image');
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
        <section class="faq-section-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <?php
                            foreach($fields as $f):
                        ?>
                            <h3 class="category-name"><?php echo $f['category']; ?></h3>
                            <div class="q-and-a-container">
                                <?php foreach($f['q_and_a'] as $key => $qa): ?>
                                    <button class="question-btn" data-question="qa-<?php echo $key; ?>"><?php echo $qa['question']; ?></button>
                                    <div class="answer-container qa-<?php echo $key; ?>">
                                        <p class="answer"><?php echo $qa['answer']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 col-sm-8 offset-2">
                        <img class="yhor-cdhi-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/yhor-cdhi.png" alt="Your Health Our Responsibility - CDHI">
                    </div>
                    <?php if($img): ?>
                        <div class="col-12">
                            <picture>
                                <source srcset="<?php echo $img['url'] ?>" media="(min-width: 1200px)" />
                                <source srcset="<?php echo $img['sizes']['large'] ?>" media="(min-width: 768px)" />
                                <source srcset="<?php echo $img['sizes']['medium_large'] ?>" media="(min-width: 0px)" />
                                <img src="<?php echo $img['url'] ?>" />
                            </picture>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
