<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cdhi_theme
 */

get_header();
$id = get_the_id();
$post_thumbnail = get_field('post_thumbnail', $id);
$post_date = get_the_date();
$date = date("F j, Y", strtotime($post_date));
$day = date("l", strtotime($post_date));
$post_content = get_field('post_content', $id);
$relatedposts = new WP_Query(array( 'post_type' => 'news-and-blog', 'posts_per_page' => 16));
$posts = $relatedposts->posts;
shuffle($posts);
$related = [];
$count = 0;
foreach($posts as $p):
    if($count < 3) :
        if($p->ID == $id) continue;
        $related[] = $p;
        $count++;
    endif;
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
                <a href="<?php echo get_home_url(); ?>/news-blog">News & Blog</a>
            </div>
        </div>
        <section class="news-and-blog-article-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="article-content-container">
                            <div class="article-details">
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                <div class="post-date">
                                    <p><?php echo $date; ?></p>
                                    <p><?php echo $day; ?></p>
                                </div>
                            </div>
                            <?php if($post_thumbnail) :  ?>
                                <div class="post-thumbnail-container">
                                    <picture>
                                        <source srcset="<?php echo $post_thumbnail['url']; ?>" media="(min-width: 1200px)" />
                                        <source srcset="<?php echo $$post_thumbnail['sizes']['large']; ?>" media="(min-width: 768px)" />
                                        <source srcset="<?php echo $$post_thumbnail['sizes']['medium_large']; ?>" media="(min-width: 0px)" />
                                        <img src="<?php echo $post_thumbnail['url']; ?>" />
                                    </picture>
                                </div>
                            <?php endif; ?>
                            <div class="post-content-container">
                                <?php echo $post_content ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="related-articles-container">
                            <h3 class="related-label">Related Articles</h3>
                            <?php 
                                foreach($related as $r): 
                                    $rId = $r->ID;
                                    $relatedImg = get_field('post_thumbnail', $rId) ? get_field('post_thumbnail', $rId)['sizes']['large'] : get_template_directory_uri().'/assets/images/banner-sample.png';
                                    $relatedDate = date("F j, Y", strtotime($r->post_date));
                            ?>
                                <a href="<?php echo get_post_permalink($rId); ?>" class="related-article">
                                    <div class="related-thumbnail">
                                        <img src="<?php echo $relatedImg; ?>" />
                                    </div>
                                    <div class="related-info">
                                        <p class="related-title"><?php echo $r->post_title; ?></p>
                                        <p class="related-date"><?php echo $relatedDate; ?></p>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
