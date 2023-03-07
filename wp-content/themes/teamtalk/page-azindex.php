<?php
/**
* Template Name: A-Z page
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>
<!--page-->
<?php get_template_part( 'open' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
			   <h1><?php the_title(); ?></h1>
			
              
				<?php the_content(); ?>
            

                
                <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link">', '</span>' ); ?>
   
                
                
	<?php endwhile; // end of the loop. ?>
</section>
</main>

<aside class="allside">
<?php get_sidebar('azindex'); ?>
</aside>


</div>


<?php get_footer(); ?>
	
