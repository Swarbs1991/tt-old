<?php
/*
Template Name: IT Training
*/

get_header(); ?>
<!--IT-training-->
<?php get_template_part( 'open' ); ?>
 <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?> <h1><?php the_title(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
			  <?php if ( has_post_thumbnail() ) : ?>
              
               <?php $noshow = get_field('noshowFI'); ?>
     
    <?php if (empty($noshow)) : ?>
    <div class="res-page">
    <?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));?>
    
    </div>
     <?php endif; ?>
    <?php endif; ?> 
       </h1>
		
        
        
   

 

	
        
        
        
        
        	
              
			<?php the_content(); ?>
           
 <div class="col-holder">          
<?php
$post_object = get_field('right_column_page');
if( $post_object ): 
// override $post
$post = $post_object;
setup_postdata( $post ); ?>
<div class="column col-right">

<?php if ( has_post_thumbnail() ) : ?><div class="res-column"><a href="<?php the_permalink(); ?>"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></a></div><?php endif; ?>
<div class="col-inner"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> </div>

</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>



<?php
$post_object = get_field('left_column_page');
if( $post_object ): 
// override $post
$post = $post_object;
setup_postdata( $post ); ?>
<div class="column col-left">

<?php if ( has_post_thumbnail() ) : ?><div class="res-column"><a href="<?php the_permalink(); ?>"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></a></div><?php endif; ?>
<div class="col-inner"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> </div>

</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>


<?php
$post_object = get_field('Middle_column_page');
if( $post_object ): 
// override $post
$post = $post_object;
setup_postdata( $post ); ?>
<div class="column col-middle">


<?php if ( has_post_thumbnail() ) : ?><div class="res-column"><a href="<?php the_permalink(); ?>"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></a></div><?php endif; ?>
<div class="col-inner"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php  the_advanced_excerpt('length=30&length_type=sentence'); ?> </div>

</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

</div>
           
                

	
<?php echo do_shortcode('[download-attachments title="Downloads" style="list" display_size="0" display_date="0" display_icon="1" display_count="0" display_description="1" container_class="downloads"]'); ?>


<?php if(has_children()):?>
<div class="childpages">
<div>
<h2>In this section</h2>
<?php echo do_shortcode('[child-pages depth="1" sort_column="post_title"]'); ?>
</div>
</div>
<?php endif; ?>
	<p style="width:100%;margin-top:1em;float:left;clear:both;padding:1em 0;border-top:1px dotted silver;border-bottom:1px dotted silver;">Published: <?php the_date(); ?> | Last modified: <?php the_modified_date(); ?></p>	
	<?php endwhile; // end of the loop. ?>
</section>
</main>





<aside class="allside">
<?php get_sidebar('page'); ?>
</aside>


</div>


<?php get_footer(); ?>
	
