<article class="key-message">
 
  <div class="key-inner"><?php if ( has_post_thumbnail() ) : ?><div class="res-keymessage"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></div>
                     <?php endif; ?>

<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

 
 <p class="pubdate">Published on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
        <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>                         
							
	</div>		
                    
		  </article>