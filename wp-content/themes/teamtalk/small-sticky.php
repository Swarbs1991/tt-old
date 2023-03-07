<article>
  <?php if ( has_post_thumbnail() ) : ?>
  <div class="sticky-inner">
<div class="res-smallsticky"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></div>
                     <?php endif; ?>

 <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 
 <p class="pubdate">Published on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
               <?php the_excerpt(); ?> 
                            
<p> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" >Read the full story >>></a></p>
							
   <?php if(get_the_tag_list()) {echo get_the_tag_list('<p><strong>Story filed under: </strong>',', ','');}?>	</div>		
                    
		  </article>