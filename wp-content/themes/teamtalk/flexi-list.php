<article class="flexi-list" style="flex-basis:22%;border-bottom:none;padding:0.5em;outline:1px solid silver;margin:1%">
<?php if ( has_post_thumbnail() ) : ?><div class="imgholder">
  <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a></div>
<?php endif; ?>


<h3 class="list-heading"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
               <?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> 
</article>