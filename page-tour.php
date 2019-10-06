<?php
/**
 * Template Name: Tour
 */

get_header();
$categories = get_field('categories');
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
        <section class="tour-section-container">
            <div class="container">
                <h2 class="header-title">See what's inside Catanduanes Doctor's Hospital Inc.</h2>
                <div class="tabs-btn-container">
                    <?php
                        if($categories):
                            foreach($categories as $key=>$f):
                                $text = $f['title'];
                                $text = preg_replace('~[^\pL\d]+~u', '-', $text);
                                $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
                                $text = preg_replace('~[^-\w]+~', '', $text);
                                $text = trim($text, '-');
                                $text = preg_replace('~-+~', '-', $text);
                                $text = strtolower($text);
                    ?>
                        <button class="tab-btn<?php echo $key==0 ? ' active': '' ?>" data-tab-target="#<?php echo $text ?>"><?php echo $f['title'] ?></button>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </div>
                <div class="tab-content-container">
                        <?php
                            if($categories):
                                foreach($categories as $key=>$c):
                                    $text = $c['title'];
                                    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
                                    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
                                    $text = preg_replace('~[^-\w]+~', '', $text);
                                    $text = trim($text, '-');
                                    $text = preg_replace('~-+~', '-', $text);
                                    $text = strtolower($text);
                        ?>
                                    <div class="tab-content <?php echo $key==0 ? 'active':'' ?>" id="<?php echo $text ?>">
                        <?php
                                    if($c['content']):
                                        foreach($c['content'] as $key=>$f):
                        ?>
                                            <h3 class="item-title"><?php echo $f['title']; ?></h3>
                                            <div class="tour-gallery-container" itemscope itemtype="http://schema.org/ImageGallery">
                                                <?php foreach($f['gallery'] as $key => $img): ?>
                                                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                        <a href="<?php echo $img['url']; ?>" itemprop="contentUrl" data-size="<?php echo $img['width']; ?>x<?php echo $img['height']; ?>" data-index="<?php echo $key; ?>">
                                                            <img src="<?php echo $img['sizes']['medium_large']; ?>" itemprop="thumbnail" alt="CDHI-<?php echo $f['title'] ?>-Images" />
                                                        </a>
                                                    </figure>
                                                <?php endforeach; ?>
                                            </div>
                        <?php
                                        endforeach;
                                    endif;
                        ?>
                                    </div>
                        <?php
                                endforeach;
                            endif;
                        ?>
                </div>
            </div>
        </section>
    </main>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
    
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
    
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
