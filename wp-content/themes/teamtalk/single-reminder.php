<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>

<!--shuttle-->
<?php get_template_part( 'open' ); ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
                
                <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>

    <article class="single"> <?php if ( has_post_thumbnail() ) : ?>
 
     <?php $noshow = get_field('noshowFI'); ?>
     
    <?php if (empty($noshow)) : ?>

    <div class="res-featured">
    <?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));?>
     <?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) : ?>
     <p class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
    <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php endif; ?>	 <h1><?php the_title(); ?></h1>
         <h2><?php the_simdiaw_location() ?></h2>
 <h3> <?php the_simdiaw_date(); if (has_simdiaw_start_time()) the_simdiaw_time(); ?> </h3>

    
   
    <div class="the_content">
    <?php the_content(); ?>
    
  <?php the_simdiaw_link(); ?>
     </div>
     

     
    </article>
                
                

			<?php endwhile; ?>

</section>
</main>

<aside class="allside">
<?php get_sidebar('reminder'); ?>
</aside>


</div>


<?php get_footer(); ?>
