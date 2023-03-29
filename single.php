<?php

get_header();

while(have_posts()){
    the_post();
    ?>


</div>

<div class="post-container container">
    <div class="post-header">
        <p>BLOG</p>
        <?php if (!is_home()): ?>
        <div class="breadcrumb">
            <?php get_breadcrumb(); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="post-content">
        <div class="post-content-title"><?php the_title() ?>
            <div class="post-content-subtitle">Opublikowany przez
                <?php the_author_posts_link(); ?> w <?php the_time('n.j.y'); ?> w
                <?php echo get_the_category_list(', ') ?></div>

        </div>
        <?php the_post_thumbnail('large_size'); ?>
        <div class="generic-content"><?php the_content(); ?></div>
    </div>
    <?php get_sidebar( ) ?>
    <?php the_comment()?>






</div>

<?php }

get_footer();

?>