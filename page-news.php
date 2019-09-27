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
        <!-- Initialize loop and store in a variable -->
        <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $newsloop = new WP_Query( array( 'post_type' => 'news-and-blog', 'posts_per_page' => 16, 'paged' => $paged) );
            $posts = $newsloop->posts;
        ?>
        <!-- END -->
        <section class="news-and-blog-section-container">
            <div class="container">
                <div class="row">
                    <?php 
                        foreach($posts as $p): 
                        $id = $p->ID;
                        $title= $p->post_title;
                        $post_date= $p->post_date;
                        $date = date("F j, Y", strtotime($post_date));
                        $post_thumbnail = get_field('post_thumbnail', $id);
                        $def_img = get_template_directory_uri().'/assets/images/banner-sample.png';
                        $imgMobile = $post_thumbnail ? $post_thumbnail['sizes']['medium_large'] : $def_img;
                        $imgTablet = $post_thumbnail ? $post_thumbnail['sizes']['large'] : $def_img;
                        $img = $post_thumbnail ? $post_thumbnail['url'] : $def_img;
                        
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-12 news-column">
                            <a class="news-link" href="<?php echo get_post_permalink($id); ?>">
                                <div class="news-info-container">
                                    <div class="news-thumbnail">
                                        <picture>
                                            <source srcset="<?php echo $img; ?>" media="(min-width: 1200px)" />
                                            <source srcset="<?php echo $imgTablet; ?>" media="(min-width: 768px)" />
                                            <source srcset="<?php echo $imgMobile; ?>" media="(min-width: 0px)" />
                                            <img src="<?php echo $img; ?>" />
                                        </picture>
                                    </div>
                                    <p class="news-title"><?php echo $title ?></p>
                                    <p class="news-date"><?php echo $date ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="container">
                <div class="pagination">
                    <?php
                        $big = 999999999;
                        echo paginate_links(array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $newsloop->max_num_pages,
                            'prev_next' => false
                        ) ); 
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
