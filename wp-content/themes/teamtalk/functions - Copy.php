<?php
/** * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
add_post_type_support( 'page', 'excerpt' );
if ( ! isset( $content_width ) )
$content_width = 640;
/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):

function twentyten_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();
// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.

add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

//Shortcodes anywhere

add_filter( 'widget_text', 'shortcode_unautop');

add_filter( 'widget_text', 'do_shortcode');

// This theme uses post thumbnails

add_theme_support( 'post-thumbnails' );

// Add default posts and comments RSS feed links to head

add_theme_support( 'automatic-feed-links' );

// Make theme available for translation



// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
'primary' => __( 'Primary Navigation', 'twentyten' ),) );
}
endif;


/**

 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since LPHC 1.0
 */

function twentyten_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}

add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**

 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since LPHC 1.0
 * @return int
 */

function twentyten_excerpt_length( $length ) {
	return 100;
}

add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since LPHC 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <p><a href="'. get_permalink() . '">' . __( 'Continue reading &rarr;', 'twentyten' ) . '</a></p>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since LPHC 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}

add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );
/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since LPHC 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}

add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );
/**
 * Remove inline styles printed when the gallery shortcode is used.
 * Galleries are styled by the theme in Twenty Ten's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Twenty Ten 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );
/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since LPHC 1.0
 * @deprecated Deprecated in Twenty Ten 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );
if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since LPHC 1.0
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
        
        <p><span class="author-link"><?php printf( __( '%s', 'twentyten' ), sprintf( '%s', get_comment_author_link() ) ); ?></span>
<span  class="post-time"><?php
/* translators: 1: date, 2: time */
printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></span></p><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
?>
</div><!-- .comment-meta .commentmetadata -->
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 200 ); ?>
			
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></p>
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


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since LPHC 1.0
 * @uses register_sidebar
 */

function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',

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

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',

	) );

}

/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twenty Ten 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twenty Ten styling.
 * @since LPHC 1.0
*/

function twentyten_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}

add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * @since LPHC 1.0
 */

function twentyten_posted_on() {
	printf( __( '%2$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;


if ( ! function_exists( 'twentyten_posted_in' ) ) :

/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since LPHC 1.0
 */

function twentyten_posted_in() {

	// Retrieves tag list of current post, separated by commas.

	$tag_list = get_the_tag_list( '', ', ' );

	if ( $tag_list ) {

		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );

	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {

		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );

	} else {

		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );

	}

	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
 		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

add_filter('user_contactmethods','hide_profile_fields',10,1);

function hide_profile_fields( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['jabber']);
unset($contactmethods['yim']);
return $contactmethods;
}

function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}

add_action('init', 'removeHeadLinks');

add_filter( 'wppa_mask_url', '__return_false' );

function my_attachments( $attachments )
{
  $args = array(
 
    // title of the meta box (string)
    'label'         => 'My Attachments',
 
    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'page', 'download' ),
 
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit
 
    // include a note within the meta box (string)
    'note'          => 'Attach files here!',
 
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),
 
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
 
    /**
     * Fields for the instance are stored in an array. Each field consists of
     * an array with three keys: name, type, label.
     *
     * name  - (string) The field name used. No special characters.
     * type  - (string) The registered field type.
     *                  Fields available: text, textarea
     * label - (string) The label displayed for the field.
     */
 
    'fields'        => array(
      array(
        'name'  => 'title',                          // unique field name
        'type'  => 'text',                           // registered field type
        'label' => __( 'Title', 'attachments' ),     // label to display
      ),
      array(
        'name'  => 'caption',                        // unique field name
        'type'  => 'textarea',                       // registered field type
        'label' => __( 'Caption', 'attachments' ),   // label to display
      ),
      array(
        'name'  => 'copyright',                      // unique field name
        'type'  => 'text',                           // registered field type
        'label' => __( 'Copyright', 'attachments' ), // label to display
      ),
    ),
 
  );
 
  $attachments->register( 'my_attachments', $args ); // unique instance name
}
 
add_action( 'attachments_register', 'my_attachments' );

function remove_wp_width_height($string){
return preg_replace('/\\\\/i', "",$string);
}

//remove inline width and height added to images
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
	// Removes attached image sizes as well
	add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
    		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    		return $html;
	}



/**
 * Removes the option to even use the 'fullsize' image
 * on posts or pages.
 *
 * @param     array  $sizes  req  The array of sizes of images
 *
 * @return    array  The new set of available image sizes that we want our user to have
 *
 * @link      http://wp.me/p1Fud2-7d
 *
 * @author    WP Theme Tutorial, Curtis McHale
 * @since     Theme Name X.Y
 *
 */
function theme_t_wp_set_image_size_options( $sizes ){
 
  $sizes = array(
 
  );
 
  return $sizes;
 
}
add_filter( 'image_size_names_choose', 'theme_t_wp_set_image_size_options' );


if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'quarter', 620 ); 
	add_image_size( 'half', 620 ); 
	add_image_size( '3quarter', 620 ); 
	add_image_size( 'fullwidth', 620 );
}
 
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
        $addsizes = array(
                "quarter" => __( "Quarter"),
				"half" => __( "Half"),
				"3quarter" => __( "Three quarter"),
				"fullwidth" => __( "Full width")
				
                );
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
}


function sbt_auto_excerpt_more( $more ) {
return 'aaa';
}
add_filter( 'excerpt_more', 'sbt_auto_excerpt_more', 20 );

function sbt_custom_excerpt_more( $output ) {return preg_replace('/<a[^>]+>Continue reading.*?<\/a>/i','',$output);
}
add_filter( 'get_the_excerpt', 'sbt_custom_excerpt_more', 20 );

add_filter('wp_default_editor', create_function('', 'return "html";'));

// make TinyMCE allow iFrames
add_filter('tiny_mce_before_init', create_function( '$a',
'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );


//DEREGISTER CONTACT FORM 7 STYLES
add_action( 'wp_print_styles', 'voodoo_deregister_styles', 100 );

function voodoo_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}