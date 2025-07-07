<?php
/**
 * PowerOn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PowerOn
 * @author Mohammad Deris
 * @version 1.0.0
 * @license GNU General Public License v2.0 or later
 * This theme is open for anyone to use without restriction.
 */

if ( ! function_exists( 'poweron_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     * This function is hooked into the after_setup_theme hook, which runs before the init hook.
     */
    function poweron_theme_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        // By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and
        // WordPress will provide it for us.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        // @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        add_theme_support( 'post-thumbnails' );

        // Register navigation menus.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary menu', 'poweron' ), // Changed text domain to 'poweron'
        ) );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'poweron_custom_background_args', array( // Changed filter hook to 'poweron_custom_background_args'
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'poweron_theme_setup' ); // Changed function name in hook

/**
 * Enqueue scripts and styles.
 * This function adds all necessary CSS and JavaScript files to the theme.
 */
function poweron_scripts() { // Changed function name
    // Enqueue Google Fonts (Vazirmatn for Persian, Outfit for general display).
    wp_enqueue_style('google-font-vazirmatn', 'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;700&display=swap', array(), null);
    wp_enqueue_style('google-font-outfit', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700&display=swap', array(), null);

    // Enqueue the main theme style.css.
    wp_enqueue_style( 'poweron-style', get_stylesheet_uri(), array('google-font-vazirmatn', 'google-font-outfit'), '1.0.0' ); // Changed handle to 'poweron-style'

    // Enqueue custom-single.css only on single post pages for specific styling.
    if ( is_single() && file_exists( get_template_directory() . '/assets/css/custom-single.css' ) ) {
        wp_enqueue_style( 'poweron-custom-single-style', get_template_directory_uri() . '/assets/css/custom-single.css', array('poweron-style'), '1.0.0' ); // Changed handle to 'poweron-custom-single-style'
    }

    // Enqueue blog.js for general blog functionalities.
    wp_enqueue_script( 'poweron-blog-script', get_template_directory_uri() . '/assets/js/blog.js', array('jquery'), '1.0.0', true ); // Changed handle to 'poweron-blog-script'

    // Enqueue custom JavaScript for the front-page only.
    if ( is_front_page() ) {
        // Enqueue custom-script.js for interactive elements on the front page.
        wp_enqueue_script( 'poweron-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery'), '1.0.0', true ); // Changed handle to 'poweron-custom-script'

        // Define the slug for the 'Industrial Training' category.
        $industrial_category_slug = 'اموزش صنعتی';
        // Get the category object by slug to retrieve its ID.
        $category_obj = get_term_by('slug', $industrial_category_slug, 'category');
        // Extract the category ID, defaulting to 0 if not found.
        $industrial_category_id = $category_obj ? $category_obj->term_id : 0;

        // Pass PHP variables to JavaScript using wp_localize_script.
        wp_localize_script( 'poweron-custom-script', 'poweronThemeData', array( // Changed handle and variable name for consistency
            'templateUri'          => get_template_directory_uri(),
            'onImage'              => get_template_directory_uri() . '/assets/images/on.png', // Path to 'on' state image
            'offImage'             => get_template_directory_uri() . '/assets/images/off.png', // Path to 'off' state image
            'powerOnAudio'         => get_template_directory_uri() . '/assets/audio/power-on.mp3', // Path to power on audio
            'powerOffAudio'        => get_template_directory_uri() . '/assets/audio/power-off.mp3', // Path to power off audio
            'noiseAudio'           => get_template_directory_uri() . '/assets/audio/noise.mp3', // Path to noise audio
            'ajaxUrl'              => admin_url('admin-ajax.php'), // WordPress AJAX URL
            'nonce'                => wp_create_nonce('load_more_posts_nonce'), // Nonce for AJAX security
            'industrialCategorySlug' => $industrial_category_slug, // Slug of the industrial category
            'industrialCategoryId' => $industrial_category_id, // ID of the industrial category
        ) );
    }
}
add_action( 'wp_enqueue_scripts', 'poweron_scripts' ); // Changed function name in hook

/**
 * AJAX handler for loading more industrial posts (for front-page footer).
 * This function handles the AJAX request to fetch more posts from a specific category.
 */
function load_industrial_posts_ajax_handler() {
    // Check for valid nonce for security.
    check_ajax_referer('load_more_posts_nonce', 'security');

    // Get current page number from POST data, default to 1.
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 2; // Number of posts to load per request.
    // Get category slug from POST data, sanitize it.
    $category_slug = isset($_POST['category_slug']) ? sanitize_text_field($_POST['category_slug']) : '';

    // Set a default category slug if it's empty.
    if (empty($category_slug)) {
        $category_slug = 'اموزش صنعتی'; // Default to 'اموزش صنعتی' if not provided.
    }

    // Arguments for WP_Query to fetch posts.
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page,
        'category_name'  => $category_slug,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged,
        'post_status'    => 'publish', // Only fetch published posts.
    );

    // Create a new WP_Query instance.
    $industrial_posts = new WP_Query($args);
    $response_posts = array(); // Array to store post data for JSON response.

    // Loop through posts if any are found.
    if ($industrial_posts->have_posts()) {
        while ($industrial_posts->have_posts()) {
            $industrial_posts->the_post();
            // Get post thumbnail URL, 'medium' size.
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            if (!$thumbnail_url) {
                // Fallback to a default image if no thumbnail is set.
                $thumbnail_url = get_template_directory_uri() . '/assets/images/default-post-thumbnail.png'; // Ensure this image exists in your assets/images directory.
            }

            // Add post data to the response array.
            $response_posts[] = array(
                'title'     => get_the_title(),
                'link'      => get_permalink(),
                'thumbnail' => esc_url($thumbnail_url),
                'excerpt'   => get_the_excerpt(),
            );
        }
    }

    // Send JSON response with posts and a flag indicating if more posts are available.
    wp_send_json_success(array(
        'posts'    => $response_posts,
        'has_more' => ($industrial_posts->max_num_pages > $paged), // Check if there are more pages.
        'message'  => 'Posts loaded successfully.'
    ));

    // Always use wp_die() at the end of an AJAX handler to terminate execution.
    wp_die();
}

// Hook the AJAX handler for logged-in and non-logged-in users.
add_action('wp_ajax_load_industrial_posts', 'load_industrial_posts_ajax_handler');
add_action('wp_ajax_nopriv_load_industrial_posts', 'load_industrial_posts_ajax_handler');