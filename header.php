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
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'piotr' ); ?></a>

        <header id="masthead" class="site-header">


            <nav id="site-navigation" class="main-navigation">
                <a href="<?php echo site_url() ?>">
                    <div class="header-bottom-logo"
                        style="background-image: url(<?php echo get_theme_file_uri('/assets/logo.png') ?>)">
                    </div>
                </a>
                <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'piotr' ); ?></button>
                <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->