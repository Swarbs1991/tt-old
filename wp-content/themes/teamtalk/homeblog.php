<article class="homeblog"><div class="res-featured"><?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php the_date(); ?></p>

<?php the_excerpt(); ?>
<p><a href="<?php the_permalink(); ?>">Read the rest</a></p>
<?php
if(get_the_tag_list()) {
    echo get_the_tag_list(' <div class="tags"><p>Tagged with:</p><ul class="taglist"><li>','</li><li>','</li></ul></div>');
}
?>
</article>