<?php
/**
 * CookingWp functions and definitions
 * @package CookingWp
 */

// Admin Bar Disable
add_filter('show_admin_bar', '__return_false');

// Define template CSS/JS directory
define('THEMECSS', get_template_directory_uri().'/css/');
define('THEMEJS', get_template_directory_uri().'/js/');

// Themes Setup
if ( ! function_exists( 'cookingwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cookingwp_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on CookingWp, use a find and replace
   * to change 'cookingwp' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'cookingwp', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails', array( 'post' ) ); // Posts only
  add_image_size( 'blog-slide', 800, 500, true );

  // This theme uses wp_nav_menu() in two location.
  register_nav_menus( array(
    'main-menu' => __( 'Main Menu', 'cookingwp' ),
  ) );

  register_nav_menus( array(
    'footer-menu' => __( 'Footer Menu', 'cookingwp' ),
  ) );

  // Enable support for Post Formats.
  add_theme_support( 'post-formats', array( 'aside','audio','chat','gallery','image','link','quote','status','video' ) );

  // Enable support for HTML5 markup.
  add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
  ) );

  add_editor_style('');

    // Set the content width based on the theme's design and stylesheet.
    if ( ! isset( $content_width ) )
    $content_width = 1170;
  }

  add_action('after_setup_theme','cookingwp_setup');

endif;

// Register widgetized area and update sidebar with default widgets.
function cookingwp_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Sidebar'),
        'id' => 'sidebar',
        'description' => __('Appears on Sidebar'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'));

	register_sidebar(array(
        'name' => __('Footer Sidebar 1'),
        'id' => 'footer-1',
        'description' => __('Appears on Footer Sidebar'),
        'before_widget' => '<aside id="%1$s" class="f-widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'));

	register_sidebar(array(
        'name' => __('Footer Sidebar 2'),
        'id' => 'footer-2',
        'description' => __('Appears on Footer Sidebar'),
        'before_widget' => '<aside id="%1$s" class="f-widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'));

	register_sidebar(array(
        'name' => __('Footer Sidebar 3'),
        'id' => 'footer-3',
        'description' => __('Appears on Footer Sidebar'),
        'before_widget' => '<aside id="%1$s" class="f-widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2>',
        'after_title' => '</h2>')); 
}

add_action( 'init', 'cookingwp_widgets_init' );

// Enqueue scripts and styles.
if(!function_exists('cookingwp_script')):

    function cookingwp_script(){
        wp_enqueue_style('theme-style',get_stylesheet_uri());
        wp_enqueue_style('bootstrap',THEMECSS.'bootstrap.min.css');
        wp_enqueue_style('font-awesome',THEMECSS.'font-awesome.min.css');
        wp_enqueue_style( 'dashicons' );

        wp_deregister_script( 'jquery' );
        wp_register_script('jquery',THEMEJS.'jquery.min.js',array(),'1.10.2',false);
        wp_enqueue_script( 'jquery' );

        wp_enqueue_script('bootstrap',THEMEJS.'bootstrap.min.js',array(),'3.0.3',true);
        wp_enqueue_script('scroll',THEMEJS.'scroll.js',array(),'1.0',true);
        wp_enqueue_script('scrollbar',THEMEJS.'jquery.nicescroll.min.js',array(),'3.2.0',true);
        wp_enqueue_script('fitvids',THEMEJS.'jquery.fitvids.js',array(),'1.0',true);
        wp_enqueue_script('stuff',THEMEJS.'stuff.js',array(),'1.0',true);

    }

    add_action('wp_enqueue_scripts','cookingwp_script');

endif;

if(!function_exists('theme_post_format_sc')):

  function theme_post_format_sc()
  {
    if(is_admin())
    {
      wp_register_script('post-format_sc', get_template_directory_uri() .'/js/post-meta.js');
      wp_enqueue_script('post-format_sc');
    }
  }

  add_action('admin_enqueue_scripts','theme_post_format_sc');

endif;

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';