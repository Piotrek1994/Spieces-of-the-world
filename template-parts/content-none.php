<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spices_of_the_world
 */

?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nic nie znaleziono', 'spieces' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Gotowy do opublikowania pierwszego posta?? <a href="%1$s">Get started here</a>.', 'spieces' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

        <p><?php esc_html_e( 'Przepraszamy, ale nic nie pasowało do wyszukiwanych słów. Spróbuj ponownie z innymi słowami kluczowymi.', 'spieces' ); ?>
        </p>
        <?php
			get_search_form();

		else :
			?>

        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'spieces' ); ?>
        </p>
        <?php
			get_search_form();

		endif;
		?>
    </div><!-- .page-content -->
</section><!-- .no-results -->