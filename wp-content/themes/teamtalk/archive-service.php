<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Hub
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>
<!--archive-services-->
	<?php get_template_part( 'open' ); ?>


		<?php if ( have_posts() ) : ?>
				<h2>Services</h2>
			<!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
             <article class="listing">
				<div class="shadowinner">
					   <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-thumbnail">
						<?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
                       </div>
                     <?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
                             
                            
							<?php the_excerpt(); ?>
                       
                            <span class="readmore catlist"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" >Find out more >>></a></span>
                            <?php if(get_the_tag_list()) {
				echo get_the_tag_list('<div class="taglist"> <p><strong>Tags : </strong>',' | ','</div>');}?>
                <?php
				if(get_the_term_list($post->ID, 's_tags')) {
   			 	echo get_the_term_list($post->ID, 's_tags','<div class="taglist"> <p><strong>Tags : </strong>',' | ','</div>');
				}?>
                            
              <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link">', '</span>' ); ?></div>
			</article>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

<?php get_template_part( 'close' ); ?>
