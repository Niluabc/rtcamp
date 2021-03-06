<?php
/**
 * simple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package simple
 */

 require( trailingslashit( get_template_directory() ) . '/lib/option-tree/ot-loader.php' );
 /**
  * Theme Options
  */
 require( trailingslashit( get_template_directory() ) . '/lib/inc/theme-options.php' );

 require( trailingslashit( get_template_directory() ) . '/lib/inc/simple_html_dom.php' );

if ( ! function_exists( 'simple_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simple_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on simple, use a find and replace
	 * to change 'simple' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'simple', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'simple' ),
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
	add_theme_support( 'custom-background', apply_filters( 'simple_custom_background_args', array(
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
add_action( 'after_setup_theme', 'simple_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simple_content_width', 640 );
}
add_action( 'after_setup_theme', 'simple_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simple_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simple' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'simple' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simple_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 function my_scripts_enqueue() {
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NULL, true );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, NULL, 'all' );

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_style( 'bootstrap-css' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_enqueue' );

function simple_scripts() {
	wp_enqueue_style( 'simple-style', get_stylesheet_uri() );

	wp_enqueue_script( 'simple-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'simple-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_scripts' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode' , '__return_true' );

add_action( 'wp_ajax_nopriv_hover_post' , 'hover_posts' );
add_action( 'wp_ajax_hover_post' , 'hover_posts' );
function hover_posts()
{
global $post;
    $pagename=isset($_REQUEST['page_name']) ? $_REQUEST['page_name'] : 'ENVIRONMENT';
    $obj=get_page_by_title( $pagename, $output = OBJECT, $post_type = 'page' );
     $args = array ( 'orderby' => 'menu_order', // Allows users to set order of subpages //Enter code to display for each subpage here. For example, list items // containing featured thumbnails, page titles and permalinks to // the pages.
                        'order' => 'ASC',
                        'posts_per_page' => 3,
						'post_parent' => $obj->ID,
						'post_type' => 'page',
						'post_status' => 'publish' );
						$postslist = get_posts($args);
						foreach ( $postslist as $post ) : setup_postdata( $post );
						echo '<div class="col-md-4" id="featuredpage2">';
                        echo the_post_thumbnail( 'featured' );
                        echo '<p id="featuretitle">';
                        echo the_title();
                        echo '</p>';
                        echo '<p id="featuredesc">'.get_the_excerpt().'</p>';
                        echo '</div><!--End Featured-page 1-->';
						endforeach;
      die();

}
if( function_exists( 'register_sidebar' ) )
{
	register_sidebar( array(
	'name'=>'Footer Widgets 1',
	'id' => 'footer-widgets-1',
	'description'=>'place Widgets for the footer here.',
	) );
	register_sidebar( array(
	'name'=>'Footer Widgets 2',
	'id' => 'footer-widgets-2',
	'description'=>'place Widgets for the footer here.',
	) );
	register_sidebar( array(
	'name'=>'Footer Widgets 3',
	'id' => 'footer-widgets-3',
	'description'=>'place Widgets for the footer here.',
	) );
	register_sidebar( array(
	'name'=>'Footer Widgets 4',
	'id' => 'footer-widgets-4',
	'description'=>'place Widgets for the footer here.',
	) );

}
/*register menu */

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

if( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
	array(
	'primary' => 'Header Navigation',
	'secondary' => 'Footer Navigation'
	) );
}
if( function_exists( 'add_theme_support' ) )
{
	add_theme_support( 'post-thumbnails' );
}
if( function_exists( 'add_image_size' ) )
{
	add_image_size( 'featured' , 960 , 300 , true );

}

// Changing excerpt more
   function new_excerpt_more( $more ) {
   global $post;
   return '… <a href="'. get_permalink( $post->ID ) . '">' . 'Read More &raquo;' . '</a>';
   }
   add_filter( 'excerpt_more' , 'new_excerpt_more' );


function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}

/* Register slider custom post type */
 function create_post_types() {
  register_post_type('slider', array(
        'labels' => array(
            'name' => 'Slider',
            'slider_name' => 'Slider',
            'add_new' => 'Add Slider',
            'add_new_item' => 'Add New Slider',
            'edit' => 'Edit',
            'edit_item' => 'Edit Slider',
            'new_item' => 'New Slider',
            'view' => 'View',
            'view_item' => 'View Slider',
            'search_items' => 'Search Slider',
            'not_found' => 'No Slider Found',
            'not_found_in_trash' => 'No Slider Found In Trash',
            'parent' => 'Parent Slider'
        ),
        'public' => true,
        'menu_position' => 15,
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array(''),
        //'menu_icon' => get_template_directory_uri() . '/images/slider-icon.png',
        'has_archive' => true
            )
    );

}

add_action('init', 'create_post_types');

/* Custom Post Type For News */

function create_post_type() {
register_post_type( 'news',
	array(
  	'labels' => array(
   		'name' => __( 'news' ),
   		'singular_name' => __( 'News' )
  	),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'news'),
 )
);
}

add_action( 'init', 'create_post_type' );

/*create dynamic sidebar*/
function demo_widgets_security() {

		register_sidebar(array(
            'name' => __('security', 'demo'),
            'id' => 'security',
            'description' => __('security', 'demo'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ));
    }

 	add_action('widgets_init', 'demo_widgets_security');

	/**
	 * Implement the Custom Header feature.
	 */
	require get_template_directory() .'/inc/custom-header.php';

	/**
	 * Custom template tags for this theme.
	 */
	require get_template_directory() .'/inc/template-tags.php';

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
