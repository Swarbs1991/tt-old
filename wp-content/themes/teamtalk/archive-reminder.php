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
<!--remind-->
	<?php get_template_part( 'open' ); ?>


		<?php if ( have_posts() ) : ?>
				<h1>Reminders</h1>
			<!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            
				 <article class="single">
                 
                 
      <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>: <?php the_simdiaw_date(); if (has_simdiaw_start_time()) the_simdiaw_time();?></a> [<?php edit_post_link( __( '@', 'simdiaw' ), '<span class="edit-link">', '</span>' );
			?>]</h3>
    
         
    
	
  
                
                
			<?php endwhile; ?>

		<?php else : ?>
        
        
			<h3>There are no reminders at the moment</h3>
            
            </article>
		<?php endif; ?>

</section>
</main>

<aside class="allside">
<?php get_sidebar('reminder'); ?>
</aside>


</div>


<?php get_footer(); ?>