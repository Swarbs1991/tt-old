<?php

/**

 * The template for displaying Comments.

 *

 * The area of the page that contains both current comments

 * and the comment form.  The actual display of comments is

 * handled by a callback to twentyten_comment which is

 * located in the functions.php file.

 *

 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0

 */

?>

<div id="comments">
<?php if ( post_password_required() ) : ?>
<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p></div>

<!-- #comments -->

<?php
/* Stop the rest of comments.php from being processed,
* but don't kill the script entirely -- we still have
* to fully load the template.
*/
return;
endif;
?>



<?php

	// You can start editing here -- including this comment!

?>



<?php if ( have_comments() ) : ?>
<h3 id="comments-title"><?php
printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'twentyten' ),
number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

<div class="navigation"><p><span class="nav-previous"><?php previous_comments_link( __( '< Older Comments', 'twentyten' ) ); ?></span> | <span class="nav-next"><?php next_comments_link( __( 'Newer Comments >', 'twentyten' ) ); ?></p></div> <!-- .navigation -->

<?php endif; // check for comment navigation ?>

<ol class="commentlist">
<?php
/* Loop through and list the comments. Tell wp_list_comments()
* to use twentyten_comment() to format the comments.
* If you want to overload this in a child theme then you can
* define twentyten_comment() and that will be used instead.
 * See twentyten_comment() in twentyten/functions.php for more.
 */

wp_list_comments( array( 'callback' => 'twentyten_comment' ) );
?>
</ol>

<?php else : // or, if we don't have comments:
/* If there are no comments and comments are closed,
 * let's leave a little note, shall we?
*/

if ( ! comments_open() ) :

?>
<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyten' ); ?></p>
<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>
<?php
 $req = get_option( 'require_name_email' );
 $fields =  array(
 // redefine author field
        
		'author' => '<div class="comment-fields"><div class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" aria-required="true" value="' . esc_attr( $commenter['comment_author'] ) . '" /></div>',
        
		'email'  => '<div class="comment-form-email"><label for="email">' . __( 'Email Address' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input required id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div>',
		
        'url'  => '</div>');
		
    $comments_args = array(
        'fields' => $fields,
		
            // redefine your own textarea (the comment body)
			
        'comment_field' => '<div class="comment-form-comment"><label for="comment">' . __( 'Comments:' ) .'</label><textarea id="comment" name="comment" aria-required="true"></textarea></div>',
		);
		
    comment_form( $comments_args );
?>

</div><!-- #comments -->
