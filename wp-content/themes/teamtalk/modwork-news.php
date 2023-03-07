<article class="modwork-news-item" style="width:25%">
<?php if ( has_post_thumbnail() ) : ?>
	 <a href="<?php the_permalink(); ?>">
	
<div class="modwork_imgholder" >
 <?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
</div>

		 <h2 class="modwork_title"><?php the_title(); ?></h2>
</a>
<?php endif; ?>           
</article>
