<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spices_of_the_world
 */

get_header();
?>





<div class="page-banner" style="background-image: url(<?php echo get_theme_file_uri('./assets/background.jpg') ?>)">

    <div class="banner-container ">
        <div class="overlay">

            <?php
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
                );

                $recent_post = new WP_Query( $args );

                if ( $recent_post->have_posts() ) {
                while ( $recent_post->have_posts() ) {
                $recent_post->the_post();
                $title = get_the_title();
                $category = get_the_category_list(', ');
                $content = wp_trim_words( get_the_content(), 100 );
                echo '<div class="container container-height"><div class="banner-container-content">';
                echo '<h1 class="banner-title"><a href="' . get_permalink() . '">' . $title . '</a></h1>';
                echo '<h2 class="banner-recipe-category">Kategoria: ' . $category . '<h2>';
                echo '<div class="banner-recipe-content">' . $content . '</div></div></div>';
                
                }
                }
                wp_reset_postdata();
                ?>

        </div>

    </div>
</div>

<section class="category-section container">
    <h2 class="category-header">OSTATNIE PRZEPISY</h2>
    <div class="category-container">
        <?php
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => '_thumbnail_id',
    ),
  ),
);

$recent_posts = new WP_Query( $args );

if ( $recent_posts->have_posts() ) :
  while ( $recent_posts->have_posts() ) :
    $recent_posts->the_post();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium_size' );
?>

        <div class="recipe-card">


            <div class="recipe-card-image"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></div>
            <a href="<?php the_permalink() ?>">
                <h4 class="post-title"><?php echo wp_trim_words(get_the_title(), 7); ?></h4>
            </a>


        </div>

        <?php
  endwhile;
  wp_reset_postdata();
else :
  ?>
        <p><?php esc_html_e( 'Brak postów', 'textdomain' ); ?></p>
        <?php endif; ?>
    </div>
</section>


<section class="blog-section container">
    <h2 class="category-header">KATEGORIA ZIOŁA</h2>
    <div class="blog-container">

        <?php
$args = array(
  'post_type' => 'post',
  'category_name' => 'zioła',
  'posts_per_page' => 2
);
$posts = new WP_Query($args);
if ($posts->have_posts()) {
  while ($posts->have_posts()) {
    $posts->the_post();
    ?>

        <div class="blog-card">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('small_size'); ?>

            <?php endif; ?>

            <div class="blog-card-content">
                <p class="blog-card-date"><?php echo get_the_date('d/m/Y'); ?></p>
                <a href="<?php the_permalink() ?>">
                    <div class="blog-card-title"><?php echo wp_trim_words(get_the_title(), 5); ?></div>
                </a>
                <div class="blog-card-text"><?php echo wp_trim_words(get_the_content(), 25); ?></div>
            </div>

        </div>



        <?php
  }
}
?>








    </div>


</section>






<?php

get_footer();