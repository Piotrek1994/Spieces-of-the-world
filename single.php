<?php

get_header();

while(have_posts()){
    the_post();
    ?>


</div>

<div class="post-container">
    <div class="post-container2">
        <p>
            <a class="" href="<?php echo site_url('/'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home
            </a> <span class="metabox__main">Posted by
                <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in
                <?php echo get_the_category_list(', ') ?></span>
        </p>
    </div>



    <div class="generic-content"><?php the_content(); ?></div>


</div>

<?php }

get_footer();

?>