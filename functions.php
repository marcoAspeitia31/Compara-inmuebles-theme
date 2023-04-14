<?php
/**
 * Compara inmuebles functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Compara_inmuebles
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
function compara_inmuebles_setup() {
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on Compara inmuebles, use a find and replace
	* to change 'compara-inmuebles' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'compara-inmuebles', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'compara-inmuebles' ),
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
			'compara_inmuebles_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Set custom images sizes:
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */
	add_image_size( 'grid-inmueble', 850, 650, true );
	add_image_size( 'inmueble-slider', 1904, 1006, true );
	add_image_size( 'inmueble-galeria-1', 740, 352, true );
	add_image_size( 'inmueble-galeria-2', 740, 834, true );
}
add_action( 'after_setup_theme', 'compara_inmuebles_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function compara_inmuebles_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'compara_inmuebles_content_width', 640 );
}
add_action( 'after_setup_theme', 'compara_inmuebles_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function compara_inmuebles_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'compara-inmuebles' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'compara-inmuebles' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Sidebar inmuebles',
			'id'            => 'sidebar-inmuebles',
			'description'   => 'Widgets para el sidebar de inmuebles',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title' => '<h4 class="ltn__widget-title ltn__widget-title-border-2">',
			'after_title' => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Sidebar inmuebles page',
			'id'            => 'sidebar-page-inmuebles',
			'description'   => 'Widgets para el sidebar de la pagina de inmuebles',
			'before_widget' => '',
			'after_widget'  => '<hr>',
			'before_title' => '<h4 class="ltn__widget-title">',
			'after_title' => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'compara_inmuebles_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function compara_inmuebles_scripts() {
	/** estilos*/
	wp_enqueue_style( 'font-icons', get_template_directory_uri() . '/assets/css/font-icons.css', array(), _S_VERSION );
	wp_enqueue_style( 'plugins', get_template_directory_uri() . '/assets/css/plugins.css', array(), _S_VERSION );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION );
	wp_enqueue_style( 'compara-inmuebles-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'jqueryfontselectormain', content_url() . '/plugins/cmb2-field-type-font-awesome/css/css/base/jquery.fonticonpicker.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'fontawesomeiselect', content_url() . '/plugins/cmb2-field-type-font-awesome/css/faws/css/font-awesome.min.css', array( 'jqueryfontselector' ), _S_VERSION );
	wp_enqueue_style( 'jqueryfontselector', content_url() . '/plugins/cmb2-field-type-font-awesome/css/css/themes/grey-theme/jquery.fonticonpicker.grey.min.css', array(), _S_VERSION );
	wp_style_add_data( 'compara-inmuebles-style', 'rtl', 'replace' );
	/** Scripts */
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);
	wp_register_script( 'pw-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key='.PW_GOOGLE_API_KEY.'&libraries=places', _S_VERSION, true );
	wp_enqueue_script( 'jqueryfontselector', content_url() . '/plugins/cmb2-field-type-font-awesome/js/jquery.fonticonpicker.min.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'mainjsiselect', content_url() . '/plugins/cmb2-field-type-font-awesome/js/main.js', array( 'jqueryfontselector' ), _S_VERSION, true );
	wp_localize_script( 'main', 'objecto_inmuebles', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'apiurl' => rest_url('compara-inmuebles/v1'),
	));
	wp_enqueue_script( 'compara-inmuebles-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'compara_inmuebles_scripts' );


function admin_style(){
	wp_enqueue_style( 'font-icons', get_template_directory_uri() . '/assets/css/font-icons.css', array(), _S_VERSION );
}
add_action('admin_enqueue_scripts', 'admin_style');
/**
 * Agregar clases para el menú principal
 */

//Funcion que modifica el css y agrega las clases del parametro 'add_li_class' en wp_nav_menu a los elementos li en caso de tener submenu
function compara_inmuebles_nav_menu_li_classes($atts, $item, $args) {
  if(isset($args->add_li_class) && in_array('menu-item-has-children',$item->classes)) {
    $atts[] = $args->add_li_class;
  }
  return $atts;
}
add_filter('nav_menu_css_class', 'compara_inmuebles_nav_menu_li_classes', 10, 3);
//Funcion que modifica el css de submenu y agrega clases del parametro 'add_ul_submenu_class' en wp_nav_menu
function compara_inmuebles_nav_menu_sub_menu_classes($atts, $args){
	if(isset($args->add_ul_submenu_class)){
		$atts[] = $args->add_ul_submenu_class;
	}
	return $atts;
}
add_filter( 'nav_menu_submenu_css_class', 'compara_inmuebles_nav_menu_sub_menu_classes', 10, 2 );
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

/**
 * Queries de inmuebles
 */
require_once dirname(__FILE__).'/inc/queries/query-inmuebles.php';
require_once dirname(__FILE__).'/inc/inmuebles-api-rest.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}