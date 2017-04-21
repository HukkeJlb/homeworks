<?php get_header(); ?>
    <!--шаблон page.php -->
    <div class="main-content">
        <div class="content-wrapper">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :   the_post();
                    ?>
                    <div class="content">
                        <h1 class="title-page"><?php the_title(); ?></h1>
                        <?php echo the_content(); ?>
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