        <article class="listing">
				<div class="shadowinner">
                <h2>Latest News</h2>
					   <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-thumbnail">
                        
                        
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a> 
                       </div>
                     <?php endif; ?>
						<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<p><strong>Published on <?php the_date(); ?></strong></p>
                <?php if(get_the_tag_list()) {echo get_the_tag_list('<div class="taglist"> <p><strong>Tags: </strong>',' | ','</div>');}?>
                <?php
				if(get_the_term_list($post->ID, 'grouptags')) {
   			 	echo get_the_term_list($post->ID, 'grouptags','<div class="tags"> <p><strong>Tags:</strong></p><ul class="taglist"><li>','</li><li>','</li></ul></div>');
				}?>
                 <?php the_excerpt(); ?>
                            
<div> <span class="readmore catlist"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" >Read the full story >>></a></span></div>
							
					
                    
			<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link">', '</span>' ); ?></div>
			</article>