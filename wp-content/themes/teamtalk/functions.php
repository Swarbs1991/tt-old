<?php
/**
 * Teamtalk functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress 
 * @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Sets up the content width value based on the theme's design.
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
 if ( ! isset( $content_width ) )
	$content_width = 960;

/**
 * Adds support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Hub only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Hub supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Teamtalk 1.0
 *
 * @return void
 */
function twentythirteen_setup() {
	/*
	 * Makes Hub available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Hub, use a find and
	 * replace to change 'id23' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'id23', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'id23' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Hub 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'id23' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'id23' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueues scripts and styles for front end.
 *
 * @since Hub 1.0
 *
 * @return void
 */
function twentythirteen_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Hub.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

	// Add Open Sans and Bitter fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Hub 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'id23' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Registers two widget areas.
 *
 * @since Teamtalk 1.0
 *
 * @return void
 */
function twentythirteen_widgets_init() {
	
	
	
	
	  register_sidebar( array(
		'name'          => __( 'Home buttons left widget area', 'id23' ),
		'id'            => 'sidebar-homeleftbuttons',
		'description'   => __( 'Appears on home page as left button sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	  register_sidebar( array(
		'name'          => __( 'Home buttons right widget area', 'id23' ),
		'id'            => 'sidebar-homerightbuttons',
		'description'   => __( 'Appears on home page as right button sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	  register_sidebar( array(
		'name'          => __( 'Home left widget area', 'id23' ),
		'id'            => 'sidebar-homeleft',
		'description'   => __( 'Appears on home page as left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
    register_sidebar( array(
		'name'          => __( 'Home right widget area', 'id23' ),
		'id'            => 'sidebar-homeright',
		'description'   => __( 'Appears on home page as right sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Key messages category', 'id23' ),
		'id'            => 'sidebar-keymessages',
		'description'   => __( 'Appears on key messages category', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'HR Category right', 'id23' ),
		'id'            => 'sidebar-hrcat',
		'description'   => __( 'Appears on HR news category', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'HR left', 'id23' ),
		'id'            => 'sidebar-hrleft',
		'description'   => __( 'Appears on HR home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'HR right', 'id23' ),
		'id'            => 'sidebar-hrright',
		'description'   => __( 'Appears on HR home page in the right sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
		register_sidebar( array(
		'name'          => __( 'Finance left', 'id23' ),
		'id'            => 'sidebar-financeleft',
		'description'   => __( 'Appears on Finance home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Finance right', 'id23' ),
		'id'            => 'sidebar-financeright',
		'description'   => __( 'Appears on Finance home page in the right sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Health & safety left', 'id23' ),
		'id'            => 'sidebar-healthsafetyleft',
		'description'   => __( 'Appears on Health and Safety home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'Health & safety right', 'id23' ),
		'id'            => 'sidebar-healthsafetyright',
		'description'   => __( 'Appears on Health and Safety home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'IT left', 'id23' ),
		'id'            => 'sidebar-itleft',
		'description'   => __( 'Appears on IT home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'IT right', 'id23' ),
		'id'            => 'sidebar-itright',
		'description'   => __( 'Appears on IT home page in the right sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
		register_sidebar( array(
		'name'          => __( 'MyView right', 'id23' ),
		'id'            => 'sidebar-myviewright',
		'description'   => __( 'Appears on MyView home page in the right sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
			register_sidebar( array(
		'name'          => __( 'MyView left', 'id23' ),
		'id'            => 'sidebar-myviewleft',
		'description'   => __( 'Appears on MyView home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
			register_sidebar( array(
		'name'          => __( 'Accomodation review  right', 'id23' ),
		'id'            => 'sidebar-accright',
		'description'   => __( 'Appears on ACCRev home page in the right sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
			register_sidebar( array(
		'name'          => __( 'Accomodation review left', 'id23' ),
		'id'            => 'sidebar-accleft',
		'description'   => __( 'Appears on ACCrev home page in the left sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	
	
	
		register_sidebar( array(
		'name'          => __( 'Search', 'id23' ),
		'id'            => 'sidebar-search',
		'description'   => __( 'Appears on Search results page.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'A-Z widgets', 'id23' ),
		'id'            => 'sidebar-azindex',
		'description'   => __( 'Appears on A-Z pages in the sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
register_sidebar( array(
		'name'          => __( 'Reminder widgets', 'id23' ),
		'id'            => 'sidebar-reminder',
		'description'   => __( 'Appears on reminders in the sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

register_sidebar( array(
		'name'          => __( 'Page widgets', 'id23' ),
		'id'            => 'sidebar-page',
		'description'   => __( 'Appears on pages in the sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

register_sidebar( array(
		'name'          => __( 'Category area widgets', 'id23' ),
		'id'            => 'sidebar-categoryright',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Widget Area', 'id23' ),
		'id'            => 'sidebar-single',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'id23' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	

  
	
	// Area 3, located in the footer. Empty by default
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Teamtalk 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'id23' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'id23' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'id23' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Teamtalk 1.0
*
* @return void
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'id23' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'id23' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'id23' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Teamtalk 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'id23' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'id23' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'id23' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'id23' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Teamtalk 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'id23' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'id23' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since Teamtalk 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Teamtalk 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extends the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Teamtalk 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjusts content_width value for video post formats and attachment templates.
 *
 * @since Teamtalk 1.0
 *
 * @return void
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Hub 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );


function remove_wp_width_height($string){
return preg_replace('/\\\\/i', "",$string);
}

//remove inline width and height added to images
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
	// Removes attached image sizes as well
	function remove_thumbnail_dimensions( $html ) {
    		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    		return $html;
	}




/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 *
 * @since Teamtalk 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );


function change_excerpt_more()
{
  function new_excerpt_more($more)
    {        
    // Use .read-more to style the link
      return '...<span class="continue-reading"> <a href="' . get_permalink() . '">'.'Read More »' . '</a></span>';
    }
  add_filter('excerpt_more', 'new_excerpt_more');
}
add_action('after_setup_theme', 'change_excerpt_more');



// Get post slug
function get_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return $slug;
}

// Echo post slug
function the_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return _e($slug);
}

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Teamtalk 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment">
        <div class="inner">
        <div class="comment-meta commentmetadata">
        
        <p><span class="author-link"><?php printf( __( '%s said:', 'twentyten' ), sprintf( '%s', get_comment_author_link() ) ); ?></span>
<span class="post-time"><?php
/* translators: 1: date, 2: time */
printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></span></p><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
?>
</div><!-- .comment-meta .commentmetadata -->
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 200 ); ?>
			
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p class="comment-awaiting-moderation"><?php _e( 'Thanks for your comment. We are reviewing it and it should be published shortly.', 'twentyten' ); ?></p>
		<?php endif; ?>
	
<div class="comment-body"><?php comment_text(); ?></div>
<div class="reply">
<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div><!-- .reply -->
</div>
</div><!-- #comment-##  -->
<?php
break;
case 'pingback'  :
case 'trackback' :
?>
<li class="post pingback">
<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
<?php
break;
endswitch;
}
endif;

add_filter('sp_template_image-widget_widget.php', 'my_template_filter');
function my_template_filter($template) {
	return get_template_directory() . '/image-widget/widget.php';
}



add_filter('relevanssi_search_ok', 'search_trigger');
function search_trigger($search_ok) {
	global $wp_query;
	if (!empty($wp_query->query_vars['Blackburn'])) {
		$search_ok = true;
	}
	return $search_ok;
}


add_theme_support('category-thumbnails');


//force display-name of users to Firstname Lastname
add_action('admin_head','force_pretty_displaynames');
function force_pretty_displaynames() {
	if (is_admin()) {
	   $current_user = wp_get_current_user();
	   if ($current_user->display_name != $current_user->first_name." ".$current_user->last_name) update_user_meta($current_user->ID, 'display_name', $current_user->first_name." ".$current_user->last_name);
	   echo '<style type="text/css">form#your-profile label[for="display_name"], form#your-profile select#display_name   { display:none;}</style>';
	}
}

function set_post_order_in_admin( $wp_query ) {
global $pagenow;
  if ( is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby'])) {
    $wp_query->set( 'orderby', 'date' );
    $wp_query->set( 'order', 'DSC' );
  }
}
add_filter('pre_get_posts', 'set_post_order_in_admin' );

add_action('wp_print_styles','lm_dequeue_header_styles');
function lm_dequeue_header_styles()
{
  wp_dequeue_style('yarppWidgetCss');
}

add_action('get_footer','lm_dequeue_footer_styles');
function lm_dequeue_footer_styles()
{
  wp_dequeue_style('yarppRelatedCss');
}

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function upload_size_limit_filterw( $size ) {
return 1024*1953125; //Your Size in kb 
}
add_filter( 'upload_size_limit', 'upload_size_limit_filterw',12 );

function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p>');
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '[...]');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

/**
* separate media categories from post categories
* use a custom category called 'category_media' for the categories in the media library
*/
add_filter( 'wpmediacategory_taxonomy', function(){ return 'category_media'; } ); //requires PHP 5.3 or newer

function has_children() {
    global $post;

    $children = get_pages( array( 'child_of' => $post->ID ) );
    if( count( $children ) == 0 ) {
        return false;
    } else {
        return true;
    }
}


function has_sibling() {
global $post;
if ( $post->post_parent ) {
$siblings = get_pages( 'child_of='.$post->post_parent );
if ( count($siblings) > 1 ) {
return true;
} else {
return false;
}
} else {
return false;
}
}
 
 
 add_filter('post_limits', 'postsperpage');
function postsperpage($limits) {
	if (is_search()) {
		global $wp_query;
		$wp_query->query_vars['posts_per_page'] = 15;
	}
	return $limits;
}


add_filter( 'gform_address_city', 'change_address_city', 10, 2 );
function change_address_city( $label, $form_id ) {
    return "Town/City";
}



add_filter("gform_address_types", "uk_address", 10, 2);
function uk_address($address_types, $form_id){
$address_types["uk"] = array(
"label" => "UK",
"country" => "United Kingdom",
"zip_label" => "Postcode",
"state_label" => "County",
"states" => array("Aberdeenshire"=>"Aberdeenshire","Angus/Forfarshire"=>"Angus/Forfarshire","Argyllshire"=>"Argyllshire","Ayrshire"=>"Ayrshire","Banffshire"=>"Banffshire","Bedfordshire"=>"Bedfordshire","Berkshire"=>"Berkshire",
"Berwickshire"=>"Berwickshire","Blaenau Gwent"=>"Blaenau Gwent","Bridgend"=>"Bridgend","Buckinghamshire"=>"Buckinghamshire","Buteshire"=>"Buteshire","Caerphilly"=>"Caerphilly","Caithness"=>"Caithness",
"Cambridgeshire"=>"Cambridgeshire","Cardiff"=>"Cardiff","Carmarthenshire"=>"Carmarthenshire","Ceredigion"=>"Ceredigion","Cheshire"=>"Cheshire","Clackmannanshire"=>"Clackmannanshire",
"Conwy"=>"Conwy","Cornwall"=>"Cornwall","Cromartyshire"=>"Cromartyshire","Cumberland"=>"Cumberland","Denbighshire"=>"Denbighshire","Derbyshire"=>"Derbyshire","Devon"=>"Devon","Dorset"=>"Dorset",
"Dumfriesshire"=>"Dumfriesshire","Dunbartonshire/Dumbartonshire"=>"Dunbartonshire/Dumbartonshire","Durham"=>"Durham","East Lothian/Haddingtonshire"=>"East Lothian/Haddingtonshire","Essex"=>"Essex","Fife"=>"Fife",
"Flintshire"=>"Flintshire","Gloucestershire"=>"Gloucestershire","Gwynedd"=>"Gwynedd","Hampshire"=>"Hampshire","Herefordshire"=>"Herefordshire","Hertfordshire"=>"Hertfordshire","Huntingdonshire"=>"Huntingdonshire",
"Inverness-shire"=>"Inverness-shire","Isle of Anglesey"=>"Isle of Anglesey","Kent"=>"Kent","Kincardineshire"=>"Kincardineshire","Kinross-shire"=>"Kinross-shire","Kirkcudbrightshire"=>"Kirkcudbrightshire",
"Lanarkshire"=>"Lanarkshire","Lancashire"=>"Lancashire","Leicestershire"=>"Leicestershire","Lincolnshire"=>"Lincolnshire","Merthyr Tydfil"=>"Merthyr Tydfil","Middlesex"=>"Middlesex",
"Midlothian/Edinburghshire"=>"Midlothian/Edinburghshire","Monmouthshire"=>"Monmouthshire","Morayshire"=>"Morayshire","Nairnshire"=>"Nairnshire","Neath Port Talbot"=>"Neath Port Talbot",
"Newport"=>"Newport","Norfolk"=>"Norfolk","Northamptonshire"=>"Northamptonshire","Northumberland"=>"Northumberland","Nottinghamshire"=>"Nottinghamshire","Orkney"=>"Orkney",
"Oxfordshire"=>"Oxfordshire","Peeblesshire"=>"Peeblesshire","Pembrokeshire"=>"Pembrokeshire","Perthshire"=>"Perthshire","Powys"=>"Powys","Renfrewshire"=>"Renfrewshire",
"Rhondda Cynon Taff"=>"Rhondda Cynon Taff","Ross-shire"=>"Ross-shire","Roxburghshire"=>"Roxburghshire","Rutland"=>"Rutland","Selkirkshire"=>"Selkirkshire","Shetland"=>"Shetland","Shropshire"=>"Shropshire",
"Somerset"=>"Somerset","Staffordshire"=>"Staffordshire","Stirlingshire"=>"Stirlingshire","Suffolk"=>"Suffolk","Surrey"=>"Surrey","Sussex"=>"Sussex","Sutherland"=>"Sutherland","Swansea"=>"Swansea","Torfaen"=>"Torfaen",
"Vale of Glamorgan"=>"Vale of Glamorgan","Warwickshire"=>"Warwickshire","West Lothian/Linlithgowshire"=>"West Lothian/Linlithgowshire","Westmorland"=>"Westmorland",
"Wigtownshire"=>"Wigtownshire","Wiltshire"=>"Wiltshire","Worcestershire"=>"Worcestershire","Wrexham"=>"Wrexham","Yorkshire"=>"Yorkshire")
);
return $address_types;
}




function rh_allow_file_protocol( $protocols ) {
	$protocols[] = 'file';
	return $protocols;
}

add_filter( 'kses_allowed_protocols', 'rh_allow_file_protocol' );





add_filter('relevanssi_hits_filter', 'pages_first');
function pages_first($hits) {
    $types = array();
 
    $types['page'] = array();
    $types['post'] = array();
 
    // Split the post types in array $types
    if (!empty($hits)) {
        foreach ($hits[0] as $hit) {
            array_push($types[$hit->post_type], $hit);
        }
    }
 
    // Merge back to $hits in the desired order
    $hits[0] = array_merge($types['page'], $types['post']);
    return $hits;
}


add_filter('relevanssi_30days', 'rlv_set_days');
function rlv_set_days($days) {
    return 365;
}

add_image_size('featuredImageCropped', 960, 600, true);


add_image_size( 'small', 240 );

// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'small' => __( 'Small' ),
    ) );
}



  // =========================================================================
    // REMOVE JUNK FROM HEAD
    // =========================================================================
    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version

    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
	
	
