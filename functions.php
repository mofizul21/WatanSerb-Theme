<?php
/**
 * WatanSerb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WatanSerb
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'watanserb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function watanserb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WatanSerb, use a find and replace
		 * to change 'watanserb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'watanserb', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'watanserb' ),
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
				'watanserb_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support('post-formats', array('aside', 'gallery', 'audio', 'video', 'chat', 'image', 'link', 'quote', 'status'));

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
	}
endif;
add_action( 'after_setup_theme', 'watanserb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function watanserb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'watanserb_content_width', 640 );
}
add_action( 'after_setup_theme', 'watanserb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function watanserb_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'watanserb' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'watanserb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'watanserb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function watanserb_scripts() {
	wp_enqueue_style( 'watanserb-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'watanserb-style', 'rtl', 'replace' );

	wp_enqueue_script( 'watanserb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'watanserb_scripts' );

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


/************ Start TPN ************/

// SOCIAL BUTTONS
// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img){
    return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function wpvkp_social_buttons($content){
    global $post;
    if (is_singular() || is_home()) {

        // Get current page URL 
        $sb_url = urlencode(get_the_permalink());

        // Get current page title
        $sb_title = str_replace(' ', '%20', get_the_title());

        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text=' . $sb_title . '&amp;url=' . $sb_url . '&amp;via=watan_usa';
        //$link  = 'https://twitter.com/share?text=' . urlencode($page_title . $by) . '&url=' . $page_permalink;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $sb_url;
        $bufferURL = 'https://bufferapp.com/add?url=' . $sb_url . '&amp;text=' . $sb_title;
        $whatsappURL = 'whatsapp://send?text=' . $sb_title . ' ' . $sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $sb_url . '&amp;title=' . $sb_title;

        if (!empty($sb_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;
        } else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;description=' . $sb_title;
        }

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;

        // Add sharing button at the end of page/page content
        $content .= '<div class="social-box"><div class="social-btn">';
        $content .= '<span class="col-1 sbtn shareOn">شارك: </span>';
        $content .= '<a class="col-1 sbtn s-twitter" href="' . $twitterURL . '" target="_blank" rel="nofollow"><img src="/wp-content/uploads/2021/08/twitter-circle.png" alt="Twitter"></a>';
        $content .= '<a class="col-1 sbtn s-facebook" href="' . $facebookURL . '" target="_blank" rel="nofollow"><img src="/wp-content/uploads/2021/08/facebook-circle.png" alt="Facebook"></a>';
        $content .= '<a class="col-2 sbtn s-whatsapp" href="' . $whatsappURL . '" target="_blank" rel="nofollow"><img src="/wp-content/uploads/2021/08/whatsapp-circle.png" alt="WhatsApp"></a>';
        $content .= '<a class="col-2 sbtn s-linkedin" href="' . $linkedInURL . '" target="_blank" rel="nofollow"><img src="/wp-content/uploads/2021/08/linkedin-circle.png" alt="LinkedIn"></a>';
        $content .= '<a class="col-2 sbtn s-pinterest" href="' . $pinterestURL . '" data-pin-custom="true" target="_blank" rel="nofollow"><img src="/wp-content/uploads/2021/08/telegram-circle.png" alt="Telegram"></a>';
        $content .= '<a class="col-2 sbtn s-buffer" href="' . $bufferURL . '" target="_blank" rel="nofollow"><img src="/wp-content/uploads/2021/08/mail-circle.png" alt="Mail"></a>';
        $content .= '</div></div>';

        return $content;
    } else {
        return $content;
    }
};
add_shortcode('social', 'wpvkp_social_buttons');


// CUSTOM POST TYPE
function opinion_custom_post(){
    $labels = array(
        'name'                  => _x('Opinions', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Opinion', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Opinions', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Opinion', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Opinion', 'textdomain'),
        'new_item'              => __('New Opinion', 'textdomain'),
        'edit_item'             => __('Edit Opinion', 'textdomain'),
        'view_item'             => __('View Opinion', 'textdomain'),
        'all_items'             => __('All Opinions', 'textdomain'),
        'search_items'          => __('Search Opinions', 'textdomain'),
        'parent_item_colon'     => __('Parent Opinions:', 'textdomain'),
        'not_found'             => __('No opinions found.', 'textdomain'),
        'not_found_in_trash'    => __('No opinions found in Trash.', 'textdomain'),
        'featured_image'        => _x('Opinion Cover Image', 'Overrides the Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Opinion archives', 'The post type archive label used in nav menus. Default Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into opinion', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this opinion', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter opinions list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Opinions list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'textdomain'),
        'items_list'            => _x('Opinions list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'opinion'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('opinion', $args);
}
add_action('init', 'opinion_custom_post');

// DISPLAY MOST VIEWED POSTS
// detect post view counts and store it as a custom field for each post
function wpb_set_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// once you have placed this, every time a user visits the post, the custom field will be updated
function wpb_track_post_views($post_id){
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action('wp_head', 'wpb_track_post_views');

// display view count
function wpb_get_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

// CHECK IF INSTALL Simgple Local Avatars plugin
require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
if ( is_plugin_active('simple-local-avatars/simple-local-avatars.php' ) ){
    require_once ( WP_PLUGIN_DIR . '/simple-local-avatars/simple-local-avatars.php' );
} else {
    echo "<div class='error'><p><strong>WatanSerb requires the <a href='https://wordpress.org/plugins/simple-local-avatars'>Simple Local Avatars</a> Plugin</strong></p></div>";
}

// DISPLAY BIG AVATAR IMAGE for Simgple Local Avatars plugin
add_filter('pre_get_avatar_data', function ($args) {
    $args['size'] = 'full';
    return $args;
}, 5);
