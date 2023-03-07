<?php
/**
 * The template for displaying reminder
 *
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<!--reminder-->
<h1><?php the_title(); ?></h1>
    <article class="single">
     <?php if ( has_post_thumbnail() ) : ?>
    <div class="res-featured">
    <?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));?>
     <?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) : ?>
    
    <?php endif; ?>
    </div>
    <?php endif; ?>
   
    <div class="the_content">
    
    <h2><?php the_simdiaw_date(); if (has_simdiaw_start_time()) the_simdiaw_time();?></h2>
    
              <?php the_content(); ?>
    
	<?php 
			the_simdiaw_meta_date();
		    
		    
			
			edit_post_link( __( '@', 'simdiaw' ), '<br><span class="edit-link">', '</span>' );
			?>
    </div>
