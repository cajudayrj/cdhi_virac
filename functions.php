<?php
/**
 * cdhi_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cdhi_theme
 */

if ( ! function_exists( 'cdhi_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cdhi_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cdhi_theme, use a find and replace
		 * to change 'cdhi_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cdhi_theme', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cdhi_theme' ),
			'footer-primary' => esc_html__( 'Footer Primary', 'cdhi_theme' ),
			'footer-secondary' => esc_html__( 'Footer Secondary', 'cdhi_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cdhi_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cdhi_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cdhi_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cdhi_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'cdhi_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cdhi_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cdhi_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cdhi_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cdhi_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cdhi_theme_scripts() {
	wp_enqueue_style( 'cdhi_theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'cdhi_boostrap-css', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css' );
	wp_enqueue_style( 'cdhi_glide-css', get_template_directory_uri() . '/assets/glidejs/glide.core.min.css' );
	wp_enqueue_style( 'cdhi_custom-scss', get_template_directory_uri() . '/assets/scss/theme.css' );

	wp_enqueue_script( 'cdhi_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'cdhi_glide-js', get_template_directory_uri() . '/assets/glidejs/glide.min.js', array(), false );
	wp_enqueue_script( 'cdhi_jquery', get_template_directory_uri() . '/assets/bootstrap/jquery.min.js', array(), false );
	wp_enqueue_script( 'cdhi_popper-js', get_template_directory_uri() . '/assets/bootstrap/popper.min.js', array(), false, true );
	wp_enqueue_script( 'cdhi_bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'cdhi_custom-js', get_template_directory_uri() . '/assets/js/scripts.js', array(), false, true );

	wp_enqueue_script( 'cdhi_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cdhi_theme_scripts' );

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
 * =======================================
 *  CUSTOM FUNCTIONS IMPORT STARTS HERE
 * =======================================
 */

// DISABLE GUTTENBERG
 add_filter('use_block_editor_for_post', '__return_false');	
 add_action('admin_head', 'remove_content_editor');
 function remove_content_editor()
 { 
	 remove_post_type_support('page', 'editor');        
 }

// ADD ACTIVE CLASS ON ACTIVE MENU
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 4);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes)){
        $classes[] = 'menu-active ';
    }
    return $classes;
}

// ADD OPTIONS PAGE FOR GLOBAL ACF FIELDS
if (function_exists('acf_add_options_page')):

    $glob_opt = [
        'page_title' => 'Global Fields',
        'menu_slug' => 'cdhi_options',
        'redirect' => false,
    ];

    acf_add_options_page($glob_opt);

endif;

// ADD DOCTOR CUSTOM POST TYPE AND TAXONOMY
function create_doctors_posttype() {
 
    register_post_type( 'doctor',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Doctors' ),
                'singular_name' => __( 'Doctor' )
            ),
            'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
        )
    );
}
add_action( 'init', 'create_doctors_posttype' );
// CREATE DEPARTMENT, HMO TAXONOMY FOR DOCTORS CPT
add_action( 'init', 'create_doctors_tax');
function create_doctors_tax() {
	register_taxonomy(
		'department',
		'doctor',
		array(
			'label' => __( 'Department' ),
			'rewrite' => array( 'slug' => 'department' ),
			'hierarchical' => true,
			'labels' => array(
				'add_new_item' => __('Add new Department')
			)
		)
	);

	register_taxonomy(
		'hmo',
		'doctor',
		array(
			'label' => __( 'HMO' ),
			'rewrite' => array( 'slug' => 'hmo' ),
			'hierarchical' => true,
			'labels' => array(
				'add_new_item' => __('Add new HMO')
			)
		)
	);
}
//REMOVE POST TYPE ON DOCTORS EDITOR
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'doctor';
    remove_post_type_support( $post_type, 'editor');
}

//REDIRECT ALL DOCTORS TO DOCTOR PAGE
add_action( 'template_redirect', 'doctor_redirect_post' );

function doctor_redirect_post() {
  if ( is_single() && (get_post_type() == 'doctor') ) {
    wp_redirect( home_url().'/our-doctors', 301 );
    exit;
  }
}