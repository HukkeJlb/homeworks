<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e('404 - Oops! That page can&rsquo;t be found.'); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'К сожалению данной страницы не существует. Попробуйте воспользоваться поиском!'); ?></p>
					<div class="search-form-wrap">
					<?php get_search_form(); ?>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
