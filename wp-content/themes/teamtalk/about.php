<article class="listing">
<div class="shadowinner">
  <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-thumbnail">
						<?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
                        </div>
                     <?php endif; ?><span class="readmore"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Find out more >>></a></span>
 <?php the_excerpt(); ?>
 </div>
</article>