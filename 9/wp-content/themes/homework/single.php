<?php get_header(); ?>
    <div class="main-content">
        <div class="content-wrapper">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
            ?>
            <div class="content">
                <div class="article-title title-page">
                    <?php the_title(); ?>
                </div>
                <div class="article-image"><img src="<?php echo get_thumbnail() ?>" alt="Image поста"></div>
                <div class="article-info">
                    <div class="post-date"><?php echo the_time('G:i:s - F j, Y ') ?></div>
                </div>
                <div class="article-text">
                    <?php the_content(); ?>
                </div>
                    <?php $prev_post = get_previous_post();
                    if ($prev_post) : ?>
                <div class="article-pagination">
                    <div class="article-pagination__block pagination-prev-left"><a href="<?php echo get_permalink($prev_post->ID); ?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
                        <div class="wrap-pagination-preview pagination-prev-left">
                            <div class="preview-article__img"><?php echo get_the_post_thumbnail($prev_post->ID, array(130, 130)); ?></div>
                            <div class="preview-article__content">
                                <div class="preview-article__info"><a href="<?php echo get_permalink($prev_post->ID); ?>" class="post-date"><?php echo $prev_post->post_date; ?></a></div>
                                <div class="preview-article__text"><?php echo $prev_post->post_title; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php $next_post = get_next_post();
                    if ( $next_post ) : ?>
                    <div class="article-pagination__block pagination-prev-right"><a href="<?php echo get_permalink($next_post->ID); ?>" class="article-pagination__link">Следующая статья<i class="icon icon-angle-double-right"></i></a>
                        <div class="wrap-pagination-preview pagination-prev-right">
                            <div class="preview-article__img"><?php echo get_the_post_thumbnail($next_post->ID, array(130, 130)); ?></div>
                            <div class="preview-article__content">
                                <div class="preview-article__info"><a href="<?php echo get_permalink($next_post->ID); ?>" class="post-date"><?php echo $next_post->post_date; ?></a></div>
                                <div class="preview-article__text"><?php echo $next_post->post_title; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            endwhile;
            endif;
            ?>
            <!-- sidebar-->
            <?php get_template_part('_parts/sidebar'); ?>
        </div>
    </div>
<?php get_footer(); ?>