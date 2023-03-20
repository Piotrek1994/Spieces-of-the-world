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

<footer id="colophon" class="site-footer">
    <div class="footer-info">
        <p>Kontakt</p>
        <p>Regulamin</p>
        <p>Polityka prywatności</p>
        <p>Polityka plików cookie</p>
        <p>Mapa witryny</p>
    </div>
    <div class="footer-apps">
        <div class="huawei-logo"
            style="background-image: url(<?php echo get_theme_file_uri('./assets/app_gallery.png') ?>)"></div>
        <div class="play-logo"
            style="background-image: url(<?php echo get_theme_file_uri('./assets/google_play.png') ?>)"></div>
        <div class="app-store-logo"
            style="background-image: url(<?php echo get_theme_file_uri('./assets/app_store.png') ?>)"></div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>




</body>

</html>