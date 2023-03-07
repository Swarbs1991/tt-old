<article class="idiscount-list"><div class="idiscount-inner">
<?php if ( has_post_thumbnail() ) : ?><div class="res-idiscount">
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a></div>
<?php endif; ?>


<h3 class="list-heading"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
  <?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> </div>
</article>