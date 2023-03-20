<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spices_of_the_world
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>


    <header id="masthead" class="site-header">

        <div class="site-header-main">
            <div class="header-bottom">
                <a href="<?php echo site_url() ?>">
                    <div class="header-bottom-logo"
                        style="background-image: url(<?php echo get_theme_file_uri('/assets/logo.png') ?>)">
                    </div>
                </a>
                <div class="header-nav-bottom">
                    <ul class="menu-header-bottom-menu">

                        <li <?php if (is_page('kategorie')) echo 'class="active-page-color"' ?>><a
                                href="<?php echo site_url('/kategorie') ?>">Kategorie</a></li>

                        <li <?php if (is_page('przyprawy-swiata')) echo 'class="active-page-color"' ?>><a
                                href=" <?php echo site_url('/przyprawy-swiata') ?>">Przyprawy świata</a></li>

                        <li <?php if (is_page('zdrowa-zywnosc')) echo 'class="active-page-color"' ?>><a
                                href="<?php echo site_url('/zdrowa-zywnosc') ?>">Zdrowa żywność</a></li>

                        <li <?php if (is_page('zielarnia')) echo 'class="active-page-color"' ?>><a
                                href="<?php echo site_url('/zielarnia') ?>">Zielarnia</a></li>

                        <li <?php if (is_page('herbaty')) echo 'class="active-page-color"' ?>><a
                                href="<?php echo site_url('/herbaty') ?>">Herbaty</a></li>

                        <li <?php if (is_page('kuchnie-swiata')) echo 'class="active-page-color"' ?>><a
                                href="<?php echo site_url('/kuchnie-swiata') ?>">Kuchnie świata</a></li>
                    </ul>
                </div>






    </header><!-- #masthead -->