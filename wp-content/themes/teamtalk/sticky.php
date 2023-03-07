<article class="sticky">
  <div class="sticky-inner">

<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 
 <?php if ( has_post_thumbnail() ) : ?>
<div class="res-sticky"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></div>
                     <?php endif; ?>
                   
    <div class="excerpt">
	  
               <?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> 
                            
	  <p> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" >Read the full story >>></a></p></div>
							
 </div>
      </article>