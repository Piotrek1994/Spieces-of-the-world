<?php

get_header();

while(have_posts()){
    the_post();
    ?>


</div>

<div class="post-container">
    <div class="post-title">
        <p>BLOG</p>
        <?php if (!is_home()): ?>
        <div class="breadcrumb">
            <?php get_breadcrumb(); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="post-content">
        <div><?php the_title() ?>
            <span class="metabox__main">Opublikowany przez
                <?php the_author_posts_link(); ?> w <?php the_time('n.j.y'); ?> w
                <?php echo get_the_category_list(', ') ?></span>

        </div>
        <?php the_post_thumbnail('large_size'); ?>
        <div class="generic-content"><?php the_content(); ?></div>
    </div>
    <?php get_sidebar( ) ?>






</div>

<?php }

get_footer();

?>