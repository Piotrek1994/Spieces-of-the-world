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

<div class="archive-container">
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

		the_posts_navigation( array(
			'prev_text' =>  '<i class="fa-sharp fa-solid fa-circle-chevron-left fa-shake fa-2xl" style="color: #f15d09;"></i>', 'text-domain',
			'next_text' => '<i class="fa-sharp fa-solid fa-circle-chevron-right fa-shake fa-2xl" style="color: #f15d09;"></i>', 'text-domain' ,
			'show_page_number' => true,
			
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