<article class="key-message">
 <?php if ( has_post_thumbnail() ) : ?>
  <div class="key-inner">
  <div class="res-keymessage"><a href="<?php the_permalink(); ?>" ); ?><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></a></div>
                     <?php endif; ?>
 <div class="keytext"><h2 class="keytitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div>
                                 
		<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>					
	</div>		
                    
		  </article>