<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
?>
<--shuttle item-->
	<article class="single">
            <div class="shares"><?php echo do_shortcode("[ssba]"); ?></div>
                <h1>The Shuttle: <?php the_title(); ?></h1>
              
                <p><strong>Published on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></strong></p>
                 <?php if(get_the_tag_list()) {
				echo get_the_tag_list('<div class="taglist"> <p><strong>Filed under : </strong>',' | ','</div>');}?>
               
  <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-featured">
						<?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));?>
						
						   <?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) : ?>
						  <p class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
                        
			  <?php endif; ?>
			  </div>
                     <?php endif; ?>
                     
                 
                        
                <div class="the_content">
				<?php the_content(); ?>
				<?php $attachments = new Attachments( 'my-attachments' ); /* pass the instance name */ ?>
					<?php if( $attachments->exist() ) : ?>
 						<div class="downloads">
                            <h3>Downloads</h3>
                            <ul>
                                <?php  while( $attachments->get() ) : ?>
                                <li><a href="<?php echo $attachments->url(); ?>"> <?php echo $attachments->field( 'title' ); ?> (<?php echo $attachments->filesize(); ?>)</a></li>
                                <?php endwhile; ?>
                            </ul>
						</div>
					<?php endif; ?>
                    
                      <?php if ( comments_open()) : ?>
	<?php comments_template( '', true ); ?>
		<?php endif; // comments_open() ?>
				</div>
                
              

                
			<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link">', '</span>' ); ?>
			</article>