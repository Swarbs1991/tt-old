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
<!--archive-shuttle-->
	<?php get_template_part( 'open' ); ?>
<h1>Staff Marketplace</h1>
<p>Staff Marketplace</p>
		<?php if ( have_posts() ) : ?>
				<h2>Items</h2>
			<!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
            
            <div class="marketplace">
             <article class="listing">
				<div class="shadowinner">
					   <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-thumbnail">
						<?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
                       </div>
                     <?php endif; ?>
						<h3><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?> 
                       
         <?php $attachments = new Attachments( 'my_attachments' ); /* pass the instance name */ ?>
			<?php if( $attachments->exist() ) : ?>
 		
              <?php  while( $attachments->get() ) : ?>
              <a href="<?php echo $attachments->url(); ?>"> <h4>Download the <?php the_title(); ?> Shuttle PDF (<?php echo $attachments->filesize(); ?>)</h4></a>
                                <?php endwhile; ?>
         <?php endif; ?>  
         
                            
                            
              <?php edit_post_link( __( '@', 'id23' ), '<span class="edit-link">', '</span>' ); ?></div>
			</article>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
</div>
</section>
</main>

<aside class="allside">
<?php get_sidebar('shuttle'); ?>
</aside>


</div>


<?php get_footer(); ?>
