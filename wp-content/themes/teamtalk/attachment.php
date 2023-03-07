<?php
/**
 * The Template for displaying attachments
 *
 * @package WordPress 
 * @subpackage Teamtalk
 * @since Teamtalk
 */

get_header(); ?>

<!--attachment-->
<?php get_template_part( 'open' ); ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>







<p><a href="<?php echo wp_get_attachment_url( $attachment_id); ?> ">Download this file</a></p>
				
             
			<?php endwhile; ?>
            
           

</section>
</main>

<aside class="allside">
<?php get_sidebar('single'); ?>
</aside>


</div>


<?php get_footer(); ?>


