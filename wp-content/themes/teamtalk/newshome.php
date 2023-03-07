<article id="home-news" class="listing">
<h3>Latest news</h3>
<div class="inner">
<div class="res-thumbnail"><?php if ( has_post_thumbnail() ) {echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));} ?></div>
<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
<?php the_excerpt(); ?>
</div>
</article>