<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spices_of_the_world
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




    <div class="entry-thumbnail"><?php the_post_thumbnail('medium_size') ?></div>



    <div class="grid">
        <header class="entry-header">
            <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
            <div class="entry-meta">
                <?php
				spieces_posted_on();
				spieces_posted_by();
				?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
    $content = get_the_content();
    $trimmed_content = wp_trim_words($content, 50, '...');
    
    echo $trimmed_content;
    
    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'spieces'),
            'after' => '</div>',
        )
    );
    ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php spieces_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>


</article><!-- #post-<?php the_ID(); ?> -->