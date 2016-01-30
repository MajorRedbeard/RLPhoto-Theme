<?php
/**
 * rlphoto functions and definitions
 *
 * @package rlphoto
 */

function add_google_fonts() {
wp_register_style('GoogleFonts', 'http://fonts.googleapis.com/css?family=Adamina|Open Sans');
wp_enqueue_style('GoogleFonts');
}
add_action('wp_print_styles', 'add_google_fonts');
  
 
if ( ! function_exists( 'rlphoto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rlphoto_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rlphoto, use a find and replace
	 * to change 'rlphoto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rlphoto', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'rlphoto' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rlphoto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rlphoto_setup
add_action( 'after_setup_theme', 'rlphoto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rlphoto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rlphoto_content_width', 640 );
}
add_action( 'after_setup_theme', 'rlphoto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rlphoto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar One', 'rlphoto' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Two', 'rlphoto' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Three', 'rlphoto' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Callout', 'rlphoto' ),
		'id'            => 'header-callout',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'rlphoto' ),
		'id'            => 'footer-widgets',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

add_action( 'widgets_init', 'rlphoto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rlphoto_scripts() {
	wp_enqueue_style( 'rlphoto-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rlphoto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rlphoto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rlphoto_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * 
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function example_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
}

function example_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
                return 1;
        } else {
                return '';
        }
}

function example_sanitize_logo_placement( $input ) {
        $valid = array(
                'left' => 'Left',
                'right' => 'Right',
                'center' => 'Center',
        );

        if ( array_key_exists( $input, $valid ) ) {
                return $input;
        } else {
                return '';
        }
}
 
function example_customizer( $wp_customize ) {
        $wp_customize->add_section(
                'theme_settings',
                array(
                        'title' => 'Theme Settings',
                        'description' => 'This is a settings section.',
                        'priority' => 35,
                )
        );
		
		$wp_customize->add_setting(
                'copyright_textbox',
                array(
                        'default' => 'Default copyright text',
                        'sanitize_callback' => 'example_sanitize_text'
                )
        );
		$wp_customize->add_control(
                'copyright_textbox',
                array(
                        'label' => 'Copyright text',
                        'section' => 'theme_settings',
                        'type' => 'text',
                )
        );

		$wp_customize->add_setting(
                'hide_copyright'
        );
		$wp_customize->add_control(
                'hide_copyright',
                array(
                        'type' => 'checkbox',
                        'label' => 'Hide copyright text',
                        'section' => 'theme_settings',
                )
        );

		$wp_customize->add_setting(
                'page_width',
                array(
                        'default' => '600',
                        'sanitize_callback' => 'example_sanitize_text'
                )
        );
		$wp_customize->add_control(
                'page_width',
                array(
                        'label' => 'Content Area Width',
                        'section' => 'theme_settings',
                        'type' => 'text',
                )
        );		
		
		$wp_customize->add_setting(
                'header_colour',
                array(
                        'default' => '#000000',
                        'sanitize_callback' => 'sanitize_hex_color',
                )
        );
		
		$wp_customize->add_control(
                new WP_Customize_Color_Control(
                        $wp_customize,
                        'header_colour',
                        array(
                                'label' => 'Header Colour',
                                'section' => 'theme_settings',
                                'settings' => 'header_colour',
                        )
                )
        );
		
		$wp_customize->add_setting( 'logo' );

        $wp_customize->add_control(
                new WP_Customize_Image_Control(
                        $wp_customize,
                        'logo',
                        array(
                                'label' => 'Logo Image',
                                'section' => 'theme_settings',
                                'settings' => 'logo'
                        )
                )
        );
		$wp_customize->add_setting('logo_width');
		$wp_customize->add_control( 'logo_width', array('label'=>'Logo Width (enter "px" or % after)','section'=>'theme_settings','type'=>'text') );
				
		$wp_customize->add_setting(
                'logo_placement',
                array(
                        'default' => 'left',
						'sanitize_callback' => 'example_sanitize_logo_placement'
                )
        );

        $wp_customize->add_control(
                'logo_placement',
                array(
                        'type' => 'radio',
                        'label' => 'Logo placement',
                        'section' => 'theme_settings',
                        'choices' => array(
                                'left' => 'Left',
                                'right' => 'Right',
                                'center' => 'Center',
                        ),
                )
        );
		
		}
add_action( 'customize_register', 'example_customizer' );