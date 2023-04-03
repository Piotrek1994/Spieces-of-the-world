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

/**
 * Enqueue scripts and styles.
 */
function spieces_scripts() {
	wp_enqueue_style( 'monserat', '//fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800;900&display=swap');
	wp_enqueue_style( 'spieces-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'header', get_template_directory_uri(). '/css/header.css');
	wp_enqueue_style( 'page-banner', get_template_directory_uri(). '/css/page-banner.css');
	wp_enqueue_style( 'page-card', get_template_directory_uri(). '/css/page-card.css');
	wp_enqueue_style( 'blog-card', get_template_directory_uri(). '/css/blog-card.css');
	wp_enqueue_style( 'footer', get_template_directory_uri(). '/css/footer.css');
	wp_enqueue_style( 'post', get_template_directory_uri(). '/css/post.css');
	wp_enqueue_style( 'sidebar', get_template_directory_uri(). '/css/sidebar.css');
	wp_enqueue_style( 'archive', get_template_directory_uri(). '/css/archive.css');
	wp_enqueue_style( 'search', get_template_directory_uri(). '/css/search.css');
	wp_enqueue_style( 'hamburgers', get_template_directory_uri() . '/css/404.css' );
	wp_enqueue_style( 'author', get_template_directory_uri() . '/css/author.css' );
	wp_enqueue_style( '404', get_template_directory_uri() . '/css/hamburger.css' );
	wp_style_add_data( 'spieces-style', 'rtl', 'replace' );
	wp_enqueue_script( 'spieces-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/menu-button.js', array(), '1.0', true);
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

add_filter('show_admin_bar', '__return_false');

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


function cwpai_create_post_type() {
    register_post_type('herbaty', array(
		'public' => true,
		'show_in_rest' => true,
		'labels' => array(
		  'name' => 'Herbaty',
		  'add_new_item' => 'Add New herbaty',
		  'edit_item' => 'Edit herbaty',
		  'all_items' => 'All herbaty',
		  'singular_name' => 'herbaty'
		),
		'menu_icon' => 'dashicons-calendar'
	  ));
}
add_action('init', 'cwpai_create_post_type');

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