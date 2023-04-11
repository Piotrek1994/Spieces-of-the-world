<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spices_of_the_world
 */

get_header();
?>

<div class="archive-container container">
    <div class="archive-header">
        <p>BLOG</p>
        <?php if (!is_home()): ?>
        <div class="breadcrumb">
            <?php get_breadcrumb(); ?>
        </div>
        <?php endif; ?>
    </div>




    <div class="archive-container-post">
        <?php if ( have_posts() ) : ?>

        <?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_type() );

		endwhile;

		the_posts_pagination( array(
			'prev_text' =>  '<div class="icon"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></div>', 'text-domain',
			'next_text' => '<div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>', 'text-domain' ,
			'show_page_number</div>' => true,
			'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
   		 'format' => '?paged=%#%',
    		'current' => max( 1, get_query_var( 'paged' ) ),
    		'total' => $wp_query->max_num_pages,
		)	);
	
	else :
	
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

    </div>

    <?php get_sidebar(); ?>
</div>

<?php

get_footer();