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
    <div class="archive-user"><?php

$author_id = get_the_author_meta( 'ID' );
$avatar_url = get_avatar_url( $author_id, array( 'size' => 200 ) );

// Informacje o autorze
$author_name = get_the_author_meta( 'display_name' );
$author_bio = get_the_author_meta( 'description' );
$author_posts_url = get_author_posts_url( $author_id );

// Linki do LinkedIn i Facebook
$linkedin_url = 'https://pl.linkedin.com/';
$facebook_url = 'https://www.facebook.com/';


// Wyświetlanie informacji o autorze, zdjęcia oraz linków do LinkedIn i Facebook
echo '<div class="author-info">';
echo '<img src="' . esc_url( $avatar_url ) . '" alt="' . esc_attr( $author_name ) . '" class="author-avatar">';
echo '<div class="author-description"><h3 class="author-name"><a href="' . esc_url( $author_posts_url ) . '">' . esc_html( $author_name ) . '</a></h3>';
echo '<p class="author-bio">' . esc_html( $author_bio ) . '</p></div>';
echo '<div class="author-social-links">';

'<a href="' . esc_url($linkedin_url) . '" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin fa-2xl"></i></a>';
'<a href="' . esc_url( $facebook_url ) . '" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-square-facebook fa-2xl"></i></a>';

echo '</div>';
echo '</div>';
	
	?>
    </div>
    <div class="author-posts">
        <p>Posty użytkownika:
            <?php echo $author_name ?>
        </p>
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