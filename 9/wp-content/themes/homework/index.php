<?php get_header(); ?>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <?php
                if ($_SERVER['REQUEST_URI'] == '/') {
                    echo '<h1 class="title-page">Последние новости и акции из мира туризма</h1>';
                } else {
                    echo '<h1 class="title-page">' . category_description() . '</h1>';
                }
                ?>
                <div class="posts-list">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                    ?>
                            <div class="post-wrap">
                                <div class="post-thumbnail"><img src="<?php echo get_thumbnail() ?>" alt="Image поста" class="post-thumbnail__image"></div>
                                <div class="post-content">
                                    <div class="post-content__post-info">
                                        <div class="post-date"><?php echo the_time('F j, Y G:i') ?></div>
                                    </div>
                                    <div class="post-content__post-text">
                                        <?php if(in_category('special-offers')) : ?>
                                        <div class="offer-title">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="offer-desc">
                                            <?php echo get_field('shortdesc'); ?>
                                        </div>
                                        <?php else : ?>
                                        <div class="post-title">
                                            <?php the_title(); ?>
                                        </div>
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
                                </div>
                            </div>
                    <?php
                    endwhile;
                    endif;
                    ?>
                    <!-- post-mini-->

                    <!-- post-mini_end-->
                </div>
<!--                --><?php //my_pagenavi(); ?>
                <div class="pagenavi-post-wrap"><?php my_pagenavi(); ?></div>
            </div>
            <!-- sidebar-->
            <?php get_template_part('_parts/sidebar'); ?>
        </div>
    </div>
<?php get_footer(); ?>
    