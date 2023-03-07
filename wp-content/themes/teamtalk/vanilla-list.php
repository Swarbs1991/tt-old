<article class="small-sticky-list">
<div class="sticky-inner">

<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>
<h3 class="list-heading"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
             <p class="pubdate">Last updated on <?php the_modified_time('l F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></p> <?php  the_advanced_excerpt('length=23&length_type=sentence'); ?>  						
	</div>		
                    
		  </article>