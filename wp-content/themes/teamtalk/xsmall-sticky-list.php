<article class="small-sticky-list">
<div class="sticky-inner">


<?php if ( has_post_thumbnail() ) : ?><div class="res-smallstickylist">

  <a href="<?php the_permalink(); ?>"  rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a> 

</div>

<?php endif; ?>


<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>
<h3 class="list-heading"><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h3>
 <p class="pubdate">Updated on <?php the_modified_time('l j F Y'); ?> at <?php the_modified_time('H:i'); ?></p>
  
               <?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> 
        
							
	</div>		
                    
		  </article>