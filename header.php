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
            <div class="nav-top ">
                <div class="nav-top-info">
                    <div class="mail-info"><?php echo get_theme_mod( 'mail', 'brak maila' ); ?></div>
                    <div class="phone-info"><a
                            href="tel:<?php echo get_theme_mod( 'phone', 'brak telefonu' ); ?>"><?php echo get_theme_mod( 'phone', 'brak telefonu' ); ?></a>
                    </div>
                </div>
                <div class="icon-section">
                    <?php if ( get_theme_mod( 'facebook_url' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'facebook_url' ) ); ?>" target="_blank">
                        <div class="fa fa-facebook">
                            <?php echo file_get_contents( get_template_directory() . './assets/facebook.svg' ); ?>
                        </div>
                    </a>
                    <?php endif; ?>

                    <?php if ( get_theme_mod( 'linkedin_url' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'linkedin_url' ) ); ?>" target="_blank">
                        <div class="fa fa-linkedin">
                            <?php echo file_get_contents( get_template_directory() . './assets/linkedin.svg' ); ?>
                        </div>
                    </a>
                    <?php endif; ?>

                    <?php if ( get_theme_mod( 'instagram_url' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'instagram_url' ) ); ?>" target="_blank">
                        <div class="fa fa-instagram">
                            <?php echo file_get_contents( get_template_directory() . './assets/instagram.svg' ); ?>
                        </div>
                    </a>
                    <?php endif; ?>
                </div>
            </div>


            <nav id="site-navigation" class="main-navigation container">


                <?php if ( get_header_image() ) : ?>
                <div id="site-header">


                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">


                        <?php
$custom_image_id = get_theme_mod( 'mytheme_custom_image_setting' );
if ( $custom_image_id ) {
    $custom_image_src = wp_get_attachment_image_src( $custom_image_id, 'logo_size' );
    $custom_image_url = $custom_image_src[0];
    echo '<img class="header-logo" src="' . esc_url( $custom_image_url ) . '" alt="' . esc_attr__( 'Custom Image', 'mytheme' ) . '" width="' . esc_attr( $custom_image_src[1] ) . '" height="' . esc_attr( $custom_image_src[2] ) . '">';
}
?>

                    </a>


                </div>
                <?php endif; ?>


                <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul><a href="tel:' . get_theme_mod( 'mytheme_phone_number', '790248450' ) . '" class="menu-phone-icon"></a>'

    )
    );
    ?>
                <button class=" menu-toggle hamburger hamburger--collapse" aria-controls="primary-menu"
                    aria-expanded="false" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>

                </button>


            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->