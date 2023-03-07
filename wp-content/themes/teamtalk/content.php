<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
?>
<!--content-->

<?php if ( is_single() ) : ?>
	<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>
<h1><?php the_title(); ?></h1>
    <article class="single">
    
    
     <?php if ( has_post_thumbnail() ) : ?>
     
     <?php $noshow = get_field('noshowFI'); ?>
     
    <?php if (empty($noshow)) : ?>

    <div class="res-featured">
    <?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));?>
     <?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) : ?>
     <p class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
    <?php endif; ?>
    </div>
    <?php endif; ?>
   
    
    
    <?php endif; ?>
    <p class="pubdate">Published <?php the_time('l j F Y'); ?> at <?php the_time('G:i '); ?></p>
    <div class="the_content">
    <?php the_content(); ?>
    
    
    
    <div class="downloads">
<?php echo do_shortcode('[download-attachments title="Downloads." style="list" display_icon="1" display_date="0" display_count="0" display_description="0" display_size="0"]'); ?>
</div>
 
  
     </div>

     <?php if ( comments_open() && is_user_logged_in()) : ?>
     <div class="comments">
		<h2>
			*
		 </h2>
			<?php comments_template(); ?></div>
		<?php endif; // comments_open() ?>
        

     
    </article>
          
		<?php else : ?>
		 <article class="listing">
		  <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?> 
		   <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
					   <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a> </div>
                     <?php endif; ?>
						
							<p class="pubdate">Published on  <?php the_time('l j F Y'); ?> at <?php the_time('g:i a'); ?></p>
                             
                            
							 <p><?php the_advanced_excerpt(); ?> </p>
                       
                            <p class="readmore catlist"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" >Read the full story</a></p>
                            
                            <p><?php comments_number( '', '1 comment', '% comments' ); ?></p>
                          
               
            	                
          
			</article>
	<?php endif; // is_single() ?>
		 	
