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
$category_name = get_the_terms(the_post(), 'news-category');
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
				<span>/</span>
				<a class="blogtitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
        </div>
        <?php if(!post_password_required($post)): ?>
            <section class="news-and-blog-article-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div class="article-content-container">
                                <div class="article-details">
                                    <h1 class="post-title"><?php the_title(); ?></h1>
                                    <div class="post-date <?php echo $category_name ? 'has-category' : '' ?>">
                                        <p><?php echo $date; ?></p>
                                        <p><?php echo $day; ?></p>
                                        <?php if($category_name): ?>
                                            <p><a href="<?php echo get_term_link($category_name[0]->term_id) ?>"><?php echo $category_name[0]->name ?></a></p>
                                        <?php endif; ?>
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
                                    $relatedposts = new WP_Query(array( 
                                        'post_type' => 'news-and-blog', 
                                        'posts_per_page' => 16,
                                        'tax_query' => array(
                                                array (
                                                    'taxonomy' => 'news-category',
                                                    'field' => 'slug',
                                                    'terms' => $category_name[0]->slug,
                                                )
                                            )
                                        ));
                                    $posts = $relatedposts->posts;
                                    shuffle($posts);
                                    $related = [];
                                    $count = 0;
                                    if(count($posts) > 0) :
                                        foreach($posts as $p):
                                            if($count < 3) :
                                                if($p->ID == $id) continue;
                                                $related[] = $p;
                                                $count++;
                                            endif;
                                        endforeach;
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
                                <?php 
                                        endforeach;
                                    else:
                                ?>
                                    <div class="caution">
                                        <svg role="img" title="caution" class="caution-svg">
                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/assets/svg/stack/svg/sprite.stack.svg#caution-sign"/>
                                        </svg>
                                        <div class="caution-text">
                                            <p>No related articles on same category found.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
            else:
        ?>
            <div class="container">
                <div class="row">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php
            endif;
        ?>
    </main>

<?php
get_footer();
