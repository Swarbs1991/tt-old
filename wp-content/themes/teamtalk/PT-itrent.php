<?php
/*
Template Name: iTrent
*/
get_header(); ?>
<!--homepage-->
<div class="wrap content">
<div class="wrapper">
<main style="width:100%">	
<?php the_content(); ?>
	
<div style="width:100%;margin:0;padding:0;padding-left:6px">	
<?php echo do_shortcode('[metaslider id="33586"]'); ?> 
<h2 style="text-align:right"><a href="/category/itrent/">More iTrent4U news >>></a></h2>
    
</div>
  




</section>
</main>

</div>
	<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>
<?php get_footer(); ?>