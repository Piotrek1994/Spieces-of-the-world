<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Spices_of_the_world
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Ups! Nie można znaleźć tej strony.', 'spieces' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e( 'Spróbuj jednego z poniższych linków lub wyszukiwania.', 'spieces' ); ?>
            </p>

            <?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

            <div class="widget widget_categories">
                <h2 class="widget-title"><?php esc_html_e( 'Najczęsciej używane kategorie', 'spieces' ); ?></h2>
                <ul>
                    <?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
                </ul>
            </div><!-- .widget -->

            <?php
					/* translators: %1$s: smiley */
					$spieces_archive_content = '<p>' . sprintf( esc_html__( 'Spróbuj przeszukać archiwum miesięczne. %1$s', 'spieces' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$spieces_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();