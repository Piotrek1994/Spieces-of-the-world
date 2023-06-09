<?php
/**
 * Spices of the world functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spices_of_the_world
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spieces_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Spices of the world, use a find and replace
		* to change 'spieces' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'spieces', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
    add_image_size('logo_size', 100, 100);
	add_image_size('small_size', 300, 260);
    add_image_size('medium_size', 455, 450);
    add_image_size('larg_size', 650, 650);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'spieces' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'spieces_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 350,
			'width'       => 350,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'spieces_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spieces_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spieces_content_width', 640 );
}
add_action( 'after_setup_theme', 'spieces_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spieces_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'spieces' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'spieces' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'spieces_widgets_init' );


 
function spieces_scripts() {
	wp_enqueue_style( 'monserat', '//fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800;900&display=swap');
	wp_enqueue_style( 'spieces-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'header_footer', get_template_directory_uri(). '/css/header_footer.css');
	wp_register_style( 'single', get_template_directory_uri(). '/css/single.css', 999);
	wp_register_style( 'archive', get_template_directory_uri(). '/css/archive.css');
	wp_register_style( '404', get_template_directory_uri() . '/css/404.css' );
	wp_enqueue_script( 'spieces-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
        
	}
    
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/menu-button.js', array(), '1.0', true);
    if (is_singular()){
        wp_enqueue_style( 'single' );
    }
    if (is_archive() || is_single() || is_search()){
        wp_enqueue_style( 'archive' );
    }
    if (is_404()){
        wp_enqueue_style('404');
    }
    
}
add_action( 'wp_enqueue_scripts', 'spieces_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



function get_breadcrumb() {

    echo '&#127962; <a href="'.home_url().'" rel="nofollow">Home</a>';

    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        the_category(' &#187; ');
        if (is_single()) {
            echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
            the_title();
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}






function my_menu(){
	register_nav_menu('headerMenuLocation', 'Header Menu Location');
	add_theme_support('title_tag');	

}

add_action('after_setup_theme', 'my_menu');


function mytheme_customize_register($wp_customize) {

    // Dodaj pierwszą sekcję
    $wp_customize->add_section('mytheme_new_section', array(
        'title'       => __('Wpisy na stronie głównej', 'mytheme'),
        'priority'    => 30,
    ));



    // Dodaj opcję (ustawienie) dla pierwszej sekcji
    $wp_customize->add_setting('mytheme_new_option', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla pierwszej sekcji
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'mytheme_new_control',
        array(
            'label'      => __('Wybierz kategorię', 'mytheme'),
            'section'    => 'mytheme_new_section',
            'settings'   => 'mytheme_new_option',
            'type'       => 'select',
            'choices'    => mytheme_get_categories_choices(),
        )
    ));

    // Dodaj drugą sekcję
    $wp_customize->add_section('mytheme_new_section2', array(
        'title'       => __('Wprowadź tekst', 'mytheme'),
        'priority'    => 30,
    ));

    // Dodaj opcję (ustawienie) dla drugiej sekcji
    $wp_customize->add_setting('mytheme_new_option2', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla drugiej sekcji
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'mytheme_new_control2',
        array(
            'label'      => __('Wpisz dowolne słowo', 'mytheme'),
            'section'    => 'mytheme_new_section',
            'settings'   => 'mytheme_new_option2',
            'type'       => 'text',
        )
    ));

    // Dodaj trzecią sekcję
    $wp_customize->add_section('mytheme_new_section3', array(
        'title'       => __('Wybierz liczbę wyświetlanych postów', 'mytheme'),
        'priority'    => 30,
    ));

    // Dodaj opcję (ustawienie) dla trzeciej sekcji
    $wp_customize->add_setting('mytheme_new_option3', array(
        'default'     => '6', // Domyślna wartość to 6
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla trzeciej sekcji
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'mytheme_new_control3',
        array(
            'label'      => __('Wybierz liczbę wyświetlanych postów', 'mytheme'),
            'section'    => 'mytheme_new_section',
            'settings'   => 'mytheme_new_option3',
            'type'       => 'select',
            'choices'    => array(
				'2' => __('2', 'mytheme'),
				'4' => __('4', 'mytheme'),
				'6' => __('6', 'mytheme'),
				'8' => __('8', 'mytheme'),
				'10' => __('10', 'mytheme'),
				'12' => __('12', 'mytheme'),
				'14' => __('14', 'mytheme'),
				'16' => __('16', 'mytheme'),
			),
		)
	));

}

add_action('customize_register', 'mytheme_customize_register');


function mytheme_get_categories_choices() {
    $categories_obj = get_categories();
    $categories = array();
    $categories[''] = __('Wybierz kategorię', 'mytheme');
    $categories['none'] = __('Nic', 'mytheme');// Dodaje nowa opcje nic

    foreach ($categories_obj as $category) {
        $categories[$category->term_id] = $category->name;
    }

    return $categories;
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function mytheme_customize_register2($wp_customize2) {

    // Dodaj pierwszą sekcję
    $wp_customize2->add_section('mytheme_new_section_second', array(
        'title'       => __('Wpisy na stronie głównej dwa', 'mytheme2'),
        'priority'    => 31,
    ));



    // Dodaj opcję (ustawienie) dla pierwszej sekcji
    $wp_customize2->add_setting('mytheme_new_option_second', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla pierwszej sekcji
    $wp_customize2->add_control(new WP_Customize_Control(
        $wp_customize2,
        'mytheme_second_control',
        array(
            'label'      => __('Wybierz kategorię', 'mytheme2'),
            'section'    => 'mytheme_new_section_second',
            'settings'   => 'mytheme_new_option_second',
            'type'       => 'select',
            'choices'    => mytheme_get_categories_choices(),
        )
    ));

    // Dodaj drugą sekcję
    $wp_customize2->add_section('mytheme_new_section_second', array(
        'title'       => __('Wpisy na stronie głównej dwa', 'mytheme2'),
        'priority'    => 30,
    ));

    // Dodaj opcję (ustawienie) dla drugiej sekcji
    $wp_customize2->add_setting('mytheme_new_option_second2', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla drugiej sekcji
    $wp_customize2->add_control(new WP_Customize_Control(
        $wp_customize2,
        'mytheme_second_control2',
        array(
            'label'      => __('Wpisz dowolne słowo', 'mytheme2'),
            'section'    => 'mytheme_new_section_second',
            'settings'   => 'mytheme_new_option_second2',
            'type'       => 'text',
        )
    ));

    // Dodaj trzecią sekcję
    $wp_customize2->add_section('mytheme_new_section_second3', array(
        'title'       => __('Wybierz liczbę wyświetlanych postów', 'mytheme2'),
        'priority'    => 30,
    ));

    // Dodaj opcję (ustawienie) dla trzeciej sekcji
    $wp_customize2->add_setting('mytheme_new_option_second3', array(
        'default'     => '6', // Domyślna wartość to 6
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla trzeciej sekcji
    $wp_customize2->add_control(new WP_Customize_Control(
        $wp_customize2,
        'mytheme_second_control3',
        array(
            'label'      => __('Wybierz liczbę wyświetlanych postów', 'mytheme2'),
            'section'    => 'mytheme_new_section_second',
            'settings'   => 'mytheme_new_option_second3',
            'type'       => 'select',
            'choices'    => array(
				'2' => __('2', 'mytheme2'),
				'4' => __('4', 'mytheme2'),
				'6' => __('6', 'mytheme2'),
				'8' => __('8', 'mytheme2'),
				'10' => __('10', 'mytheme2'),
				'12' => __('12', 'mytheme2'),
				'14' => __('14', 'mytheme2'),
				'16' => __('16', 'mytheme2'),
			),
		)
	));

}

add_action('customize_register', 'mytheme_customize_register2');



///////////////////////////////////////////////////////////////////////////


function mytheme_customize_register3($wp_customize3) {

    // Dodaj pierwszą sekcję
    $wp_customize3->add_section('mytheme_new_section_third', array(
        'title'       => __('Wpisy na stronie głównej trzy', 'mytheme3'),
        'priority'    => 32,
    ));



    // Dodaj opcję (ustawienie) dla pierwszej sekcji
    $wp_customize3->add_setting('mytheme_new_option_third', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla pierwszej sekcji
    $wp_customize3->add_control(new WP_Customize_Control(
        $wp_customize3,
        'mytheme_third_control',
        array(
            'label'      => __('Wybierz kategorię', 'mytheme3'),
            'section'    => 'mytheme_new_section_third',
            'settings'   => 'mytheme_new_option_third',
            'type'       => 'select',
            'choices'    => mytheme_get_categories_choices(),
        )
    ));

    // Dodaj drugą sekcję
    $wp_customize3->add_section('mytheme_new_section_third', array(
        'title'       => __('Wpisy na stronie głównej trzy', 'mytheme3'),
        'priority'    => 31,
    ));

    // Dodaj opcję (ustawienie) dla drugiej sekcji
    $wp_customize3->add_setting('mytheme_new_option_third2', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla drugiej sekcji
    $wp_customize3->add_control(new WP_Customize_Control(
        $wp_customize3,
        'mytheme_third_control2',
        array(
            'label'      => __('Wpisz dowolne słowo', 'mytheme3'),
            'section'    => 'mytheme_new_section_third',
            'settings'   => 'mytheme_new_option_third2',
            'type'       => 'text',
        )
    ));

    // Dodaj trzecią sekcję
    $wp_customize3->add_section('mytheme_new_section_third3', array(
        'title'       => __('Wybierz liczbę wyświetlanych postów', 'mytheme3'),
        'priority'    => 31,
    ));

    // Dodaj opcję (ustawienie) dla trzeciej sekcji
    $wp_customize3->add_setting('mytheme_new_option_third3', array(
        'default'     => '6', // Domyślna wartość to 6
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla trzeciej sekcji
    $wp_customize3->add_control(new WP_Customize_Control(
        $wp_customize3,
        'mytheme_third_control3',
        array(
            'label'      => __('Wybierz liczbę wyświetlanych postów', 'mytheme3'),
            'section'    => 'mytheme_new_section_third',
            'settings'   => 'mytheme_new_option_third3',
            'type'       => 'select',
            'choices'    => array(
				'2' => __('2', 'mytheme3'),
				'4' => __('4', 'mytheme3'),
				'6' => __('6', 'mytheme3'),
				'8' => __('8', 'mytheme3'),
				'10' => __('10', 'mytheme3'),
				'12' => __('12', 'mytheme3'),
				'14' => __('14', 'mytheme3'),
				'16' => __('16', 'mytheme3'),
			),
		)
	));

}

add_action('customize_register', 'mytheme_customize_register3');

///////////////////////////////////

function mytheme_customize_register4($wp_customize4) {

    // Dodaj pierwszą sekcję
    $wp_customize4->add_section('mytheme_new_section_fourth', array(
        'title'       => __('Wpisy na stronie głównej cztery', 'mytheme4'),
        'priority'    => 33,
    ));



    // Dodaj opcję (ustawienie) dla pierwszej sekcji
    $wp_customize4->add_setting('mytheme_new_option_fourth', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla pierwszej sekcji
    $wp_customize4->add_control(new WP_Customize_Control(
        $wp_customize4,
        'mytheme_fourth_control',
        array(
            'label'      => __('Wybierz kategorię', 'mytheme4'),
            'section'    => 'mytheme_new_section_fourth',
            'settings'   => 'mytheme_new_option_fourth',
            'type'       => 'select',
            'choices'    => mytheme_get_categories_choices(),
        )
    ));

    // Dodaj drugą sekcję
    $wp_customize4->add_section('mytheme_new_section_fourth', array(
        'title'       => __('Wpisy na stronie głównej cztery', 'mytheme4'),
        'priority'    => 32,
    ));

    // Dodaj opcję (ustawienie) dla drugiej sekcji
    $wp_customize4->add_setting('mytheme_new_option_fourth2', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla drugiej sekcji
    $wp_customize4->add_control(new WP_Customize_Control(
        $wp_customize4,
        'mytheme_fourth_control2',
        array(
            'label'      => __('Wpisz dowolne słowo', 'mytheme4'),
            'section'    => 'mytheme_new_section_fourth',
            'settings'   => 'mytheme_new_option_fourth2',
            'type'       => 'text',
        )
    ));

    // Dodaj trzecią sekcję
    $wp_customize4->add_section('mytheme_new_section_fourth3', array(
        'title'       => __('Wybierz liczbę wyświetlanych postów', 'mytheme4'),
        'priority'    => 32,
    ));

    // Dodaj opcję (ustawienie) dla trzeciej sekcji
    $wp_customize4->add_setting('mytheme_new_option_fourth3', array(
        'default'     => '6', // Domyślna wartość to 6
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla trzeciej sekcji
    $wp_customize4->add_control(new WP_Customize_Control(
        $wp_customize4,
        'mytheme_fourth_control3',
        array(
            'label'      => __('Wybierz liczbę wyświetlanych postów', 'mytheme4'),
            'section'    => 'mytheme_new_section_fourth',
            'settings'   => 'mytheme_new_option_fourth3',
            'type'       => 'select',
            'choices'    => array(
				'2' => __('2', 'mytheme4'),
				'4' => __('4', 'mytheme4'),
				'6' => __('6', 'mytheme4'),
				'8' => __('8', 'mytheme4'),
				'10' => __('10', 'mytheme4'),
				'12' => __('12', 'mytheme4'),
				'14' => __('14', 'mytheme4'),
				'16' => __('16', 'mytheme4'),
			),
		)
	));

}

add_action('customize_register', 'mytheme_customize_register4');


/////////////////////////////////

///////////////////////////////////

function mytheme_customize_register5($wp_customize5) {

    // Dodaj pierwszą sekcję
    $wp_customize5->add_section('mytheme_new_section_fifth', array(
        'title'       => __('Wpisy na stronie głównej pięc', 'mytheme5'),
        'priority'    => 34,
    ));



    // Dodaj opcję (ustawienie) dla pierwszej sekcji
    $wp_customize5->add_setting('mytheme_new_option_fifth', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla pierwszej sekcji
    $wp_customize5->add_control(new WP_Customize_Control(
        $wp_customize5,
        'mytheme_fifth_control',
        array(
            'label'      => __('Wybierz kategorię', 'mytheme5'),
            'section'    => 'mytheme_new_section_fifth',
            'settings'   => 'mytheme_new_option_fifth',
            'type'       => 'select',
            'choices'    => mytheme_get_categories_choices(),
        )
    ));

    // Dodaj drugą sekcję
    $wp_customize5->add_section('mytheme_new_section_fifth', array(
        'title'       => __('Wpisy na stronie głównej pięć', 'mytheme5'),
        'priority'    => 33,
    ));

    // Dodaj opcję (ustawienie) dla drugiej sekcji
    $wp_customize5->add_setting('mytheme_new_option_fifth2', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla drugiej sekcji
    $wp_customize5->add_control(new WP_Customize_Control(
        $wp_customize5,
        'mytheme_fifth_control2',
        array(
            'label'      => __('Wpisz dowolne słowo', 'mytheme5'),
            'section'    => 'mytheme_new_section_fifth',
            'settings'   => 'mytheme_new_option_fifth2',
            'type'       => 'text',
        )
    ));

    // Dodaj trzecią sekcję
    $wp_customize5->add_section('mytheme_new_section_fifth3', array(
        'title'       => __('Wybierz liczbę wyświetlanych postów', 'mytheme5'),
        'priority'    => 33,
    ));

    // Dodaj opcję (ustawienie) dla trzeciej sekcji
    $wp_customize5->add_setting('mytheme_new_option_fifth3', array(
        'default'     => '6', // Domyślna wartość to 6
        'transport'   => 'refresh',
    ));

    // Dodaj kontrolkę (pole) dla trzeciej sekcji
    $wp_customize5->add_control(new WP_Customize_Control(
        $wp_customize5,
        'mytheme_fifth_control3',
        array(
            'label'      => __('Wybierz liczbę wyświetlanych postów', 'mytheme5'),
            'section'    => 'mytheme_new_section_fifth',
            'settings'   => 'mytheme_new_option_fifth3',
            'type'       => 'select',
            'choices'    => array(
				'2' => __('2', 'mytheme5'),
				'4' => __('4', 'mytheme5'),
				'6' => __('6', 'mytheme5'),
				'8' => __('8', 'mytheme5'),
				'10' => __('10', 'mytheme5'),
				'12' => __('12', 'mytheme5'),
				'14' => __('14', 'mytheme5'),
				'16' => __('16', 'mytheme5'),
			),
		)
	));

}

add_action('customize_register', 'mytheme_customize_register5');


/////////////////////////////////


function mytheme_phone_number( $wp_customize_phone ) {
    $wp_customize_phone->add_section( 'mytheme_contact' , array(
        'title'      => __( 'Dane kontaktowe', 'mytheme' ),
        'priority'   => 38,
    ));

    $wp_customize_phone->add_setting( 'mytheme_phone_number' , array(
        'default'   => '790248450',
        'transport' => 'refresh',
    ));

    $wp_customize_phone->add_control( new WP_Customize_Control( $wp_customize_phone, 'mytheme_phone_number', array(
        'label'      => __( 'Numer telefonu', 'mytheme' ),
        'section'    => 'mytheme_contact',
        'settings'   => 'mytheme_phone_number',
    )));
}
add_action( 'customize_register', 'mytheme_phone_number' );



//background change function

function my_theme_customizer_settings($wp_customize) {
    // Ustawienie tła dla diva z klasą 'page-banner'
    $wp_customize->add_setting('page_banner_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Kontrolka do wyboru obrazka tła
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'page_banner_background_image', array(
        'label' => __('Obraz tła dla Page Banner', 'my_theme'),
        'section' => 'background_image',
        'settings' => 'page_banner_background_image',
    )));
}

add_action('customize_register', 'my_theme_customizer_settings');

function my_theme_banner_background_srcset() {
    $page_banner_background_image = get_theme_mod('page_banner_background_image', '');

    if ($page_banner_background_image) {
        $image_id = attachment_url_to_postid($page_banner_background_image);
        return wp_get_attachment_image_srcset($image_id);
    }
    return '';
}





// FOOTER widgets //


function my_theme_widgets_init() {
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(__('Footer Widget Area %d', 'my_theme'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(__('Add widgets here to appear in footer widget area %d.', 'my_theme'), $i),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'my_theme_widgets_init');








// Mail and phone 

function mytheme_mail_and_phone_register( $wp_customize ) {
    // Sekcja Mail
    $wp_customize->add_section( 'mail_section', array(
       'title' => __( 'Mail', 'mytheme' ),
       'priority' => 36
    ) );
    // Pole tekstowe dla maila
    $wp_customize->add_setting( 'mail', array(
       'default' => '',
       'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'mail', array(
       'label' => __( 'Mail', 'mytheme' ),
       'section' => 'mail_section',
       'type' => 'text'
    ) );
 
    // Sekcja Telefon
    $wp_customize->add_section( 'phone_section', array(
       'title' => __( 'Telefon', 'mytheme' ),
       'priority' => 39
    ) );
    // Pole tekstowe dla telefonu
    $wp_customize->add_setting( 'phone', array(
       'default' => '',
       'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'phone', array(
       'label' => __( 'Telefon', 'mytheme' ),
       'section' => 'phone_section',
       'type' => 'text'
    ) );
 }
 add_action( 'customize_register', 'mytheme_mail_and_phone_register' );
 



 



 // ICONS IN NAV


 function mytheme_nav_icon_register( $wp_customize ) {
    // Sekcja Ikony
    $wp_customize->add_section( 'icon_section', array(
       'title' => __( 'Ikony', 'mytheme' ),
       'priority' => 39
    ) );
    // Pole tekstowe dla Facebooka
    $wp_customize->add_setting( 'facebook_url', array(
       'default' => '',
       'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'facebook_url', array(
       'label' => __( 'Adres URL Facebooka', 'mytheme' ),
       'section' => 'icon_section',
       'type' => 'text'
    ) );
 
    // Pole tekstowe dla LinkedIn
    $wp_customize->add_setting( 'linkedin_url', array(
       'default' => '',
       'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'linkedin_url', array(
       'label' => __( 'Adres URL LinkedIn', 'mytheme' ),
       'section' => 'icon_section',
       'type' => 'text'
    ) );
 
    // Pole tekstowe dla Instagrama
    $wp_customize->add_setting( 'instagram_url', array(
       'default' => '',
       'transport' => 'postMessage'
    ) );
    $wp_customize->add_control( 'instagram_url', array(
       'label' => __( 'Adres URL Instagrama', 'mytheme' ),
       'section' => 'icon_section',
       'type' => 'text'
    ) );
 }
 add_action( 'customize_register', 'mytheme_nav_icon_register' );
 
 /// HEADER IMAGE SIZE 
 
 function header_customize_register( $wp_customize ) {
    // Dodaj sekcję 'mytheme_custom_image'
    $wp_customize->add_section( 'mytheme_custom_image', array(
        'title'          => __( 'Wstaw zdjęcie', 'mytheme' ),
        'description'    => __( 'Wybierz zdjęcie, które chcesz wstawić na stronę.', 'mytheme' ),
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
    ) );

    // Dodaj ustawienie 'mytheme_custom_image_setting'
    $wp_customize->add_setting( 'mytheme_custom_image_setting', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

    // Dodaj kontrolkę dla ustawienia 'mytheme_custom_image_setting'
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mytheme_custom_image_setting', array(
        'label'       => __( 'Wybierz zdjęcie', 'mytheme' ),
        'section'     => 'mytheme_custom_image',
        'settings'    => 'mytheme_custom_image_setting',
        'mime_type'   => 'image',
    ) ) );
}
add_action( 'customize_register', 'header_customize_register' );