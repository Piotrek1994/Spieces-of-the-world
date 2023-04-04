<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spices_of_the_world
 */

?>

<footer id="colophon" class="site-footer ">
    <div class="footer-widgets container">
        <div class="footer-widget-area">
            <?php dynamic_sidebar('footer-1'); ?>
        </div>
        <div class="footer-widget-area">
            <?php dynamic_sidebar('footer-2'); ?>
        </div>
        <div class="footer-widget-area">
            <?php dynamic_sidebar('footer-3'); ?>
        </div>
        <div class="footer-widget-area">
            <?php dynamic_sidebar('footer-4'); ?>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>




</body>

</html>