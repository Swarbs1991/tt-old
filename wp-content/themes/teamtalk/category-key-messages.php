<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>

	<?php get_template_part( 'open' ); ?>

   <!--cat--> 
<h1><?php printf( __( '%s', 'teamtalk' ), single_cat_title( '', false ) ); ?></h1>
		<?php if ( have_posts() ) : ?>
       
				<?php if ( category_description() ) : // Show an optional category description ?>
				<div ><?php echo category_description(); ?></div>
				<?php endif; ?>

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
<!--cat-->
<aside class="allside">

<?php get_sidebar('keymessages'); ?>
</aside>


</div>


<?php get_footer(); ?>
  
  

	