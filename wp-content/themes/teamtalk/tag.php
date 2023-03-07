<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>

	<?php get_template_part( 'open' ); ?>


		<?php if ( have_posts() ) : ?>
<h1>News filed under "<?php printf( __( '%s'), single_tag_title( '', false ) ); ?>"</h1>


<?php $image_id = apply_filters( 'taxonomy-images-queried-term-image-id', 0 ); ?>


<?php if ( !empty($image_id) ) : ?>

<div class="res-featured noborder"><?php do_action( 'taxonomy_image_plugin_print_image_html','large'); ?> 
				 		</div><?php endif; ?>

				
                

						

				<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
				<?php endif; ?>
		<!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
<?php wp_simple_pagination(); ?>	
  
</section>
</main>
<!--archive-->
<aside class="allside">
<?php get_sidebar('categoryright'); ?>
</aside>


</div>


<?php get_footer(); ?>
  
