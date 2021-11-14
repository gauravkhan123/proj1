<?php
/**
 * nutricareplus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nutricareplus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nutricareplus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nutricareplus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nutricareplus, use a find and replace
		 * to change 'nutricareplus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nutricareplus', get_template_directory() . '/languages' );

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
		add_image_size( 'blog-image', 800, 420, true );
		add_image_size( 'single-image', 1500, 500 , true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'nutricareplus' ),
				'menu-2' => esc_html__( 'Top', 'nutricareplus'),
				'menu-3' => esc_html__( 'Footer', 'nutricareplus')
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
				'nutricareplus_custom_background_args',
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
				'height'      => 110,
				'width'       => 110,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
	add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
endif;
add_action( 'after_setup_theme', 'nutricareplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nutricareplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nutricareplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'nutricareplus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nutricareplus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nutricareplus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nutricareplus' ),
			'before_widget' => '<div class="theme-card">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'nutricareplus' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'nutricareplus' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="collapse-block-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'nutricareplus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nutricareplus_scripts() {
	wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,900', null, null );
	wp_enqueue_style( 'google-fonts');
	//wp_register_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, null );
	//wp_enqueue_style( 'font-awesome');
	Wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/font-awesome/css/	font-awesome.min.css', array(), _S_VERSION );
	Wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css', array(), _S_VERSION );
	Wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/assets/css/slick-theme.css', array(), _S_VERSION );
	Wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css', array(), _S_VERSION );
	Wp_enqueue_style( 'themify-icons', get_template_directory_uri() .'/assets/css/themify-icons.css', array(), _S_VERSION );
	Wp_enqueue_style( 'color', get_template_directory_uri() .'/assets/css/color1.css', array(), _S_VERSION );
	Wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), _S_VERSION );
	//wp_register_style( 'bootstrap-min', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', null, null );
	//Wp_enqueue_style( 'bootstrap-min');
	wp_enqueue_script( 'jquery-3.3.1.min', get_template_directory_uri() .'/assets/js/jquery-3.3.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-ui.min', get_template_directory_uri() .'/assets/js/jquery-ui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	//wp_enqueue_script('bootstrap-min','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'jquery-exitintent', get_template_directory_uri() .'/assets/js/jquery.exitintent.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'exit', get_template_directory_uri() .'/assets/js/exit.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'popper-min', get_template_directory_uri() . '/assets/js/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/assets/js/menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lazysizes', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-notify', get_template_directory_uri() . '/assets/js/bootstrap-notify.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'fly-cart', get_template_directory_uri() . '/assets/js/fly-cart.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'nutricareplus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nutricareplus_scripts' );

/*
* Disable Gutenberg Editor
*/
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
return false;
}
// Add the page to admin menu
function add_site_settings_to_menu(){
    add_menu_page( 'Options Page', 'Options page', 'manage_options', 'post.php?post='.get_page_by_path("options-page",NULL,"page")->ID.'&action=edit', '', 'dashicons-admin-generic
	', 20);
}
add_action( 'admin_menu', 'add_site_settings_to_menu' );
// Change the active menu item

add_filter('parent_file', 'higlight_custom_settings_page');

function higlight_custom_settings_page($file) {
    global $parent_file;
    global $pagenow;
    global $typenow, $self;
    $settings_page = get_page_by_path("options-page",NULL,"page")->ID;
    $post = (int)$_GET["post"];
    if ($pagenow === "post.php" && $post === $settings_page) {
        $file = "post.php?post=$settings_page&action=edit";
    }
    return $file;
}
function edit_site_settings_title() {
    global $post, $title, $action, $current_screen;
    if( isset( $current_screen->post_type ) && $current_screen->post_type === 'page' && $action == 'edit' && $post->post_name === "options-page") {
        $title = $post->post_title.' - '.get_bloginfo('name');           
    }
    return $title;  
}

add_action( 'admin_title', 'edit_site_settings_title' );
/*generate Breadcrumbs*/
function get_breadcrumb() {
	echo '<ol class="breadcrumb"><li class="breadcrumb-item"><a href="'.home_url().'" rel="nofollow">Home</a></li>
	';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;    &#47;    &nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo "&nbsp;&nbsp;    &#47;    &nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;    &#47;    &nbsp;&nbsp;";
        echo the_title();
	} 
	elseif (is_woocommerce()) {
		echo "&nbsp;&nbsp;    &#47;    &nbsp;&nbsp;";
        echo woocommerce_page_title();
	}
	elseif (is_shop()) {
		echo "&nbsp;&nbsp;    &#47;    &nbsp;&nbsp;";
        echo woocommerce_page_title();
	}
	elseif (is_single( products )()) {
		echo "&nbsp;&nbsp;    &#47;    &nbsp;&nbsp;";
        echo woocommerce_page_title();
	}
	elseif (is_search()) {
        echo "&nbsp;&nbsp;    &#47;	   &nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
	}

}
class Child_Wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"onhover-show-div\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}
add_filter('get_custom_logo','change_logo_class');


function change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-fluid blur-up lazyloaded',  $html);
	$html = str_replace('class="custom-logo-link"', '', $html);
	return $html;
}
//excerpt limit
function custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



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

require get_template_directory() . '/inc/woocommerce-support.php';