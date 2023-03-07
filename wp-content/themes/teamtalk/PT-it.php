<?php
/*
Template Name: IT
*/
get_header(); ?>
<!--homepage-->

<div class="wrap content">
<div class="wrapper">



<main class="homemain">



<section class="homecontent">
<img src="<?php echo site_url(); ?>/wp-content/uploads/it-banner.png" alt="Information Technology" />


<!--s-->
<div class="hrsearch">
   <form role="search" method="get" class="search-form extrasearch" action="<?php echo site_url(); ?>/">
	
		
        
        <div class="sfield"> 
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
      <div class="search-cats">  <label for "cat">Search in:</label> 
		<?php
    wp_dropdown_categories(array('taxonomy' => 'category','hierarchical' =>'1','hide_empty' => '1','include' => '7,239','order'=>'DESC')); ?></div>
    
   

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>
        
    </div>   <!--s-->

  			
<div class="latest-news">




     
			<h2 class="latest">Latest IT news</h2>
		<?php echo do_shortcode("[ic_add_posts category='it-news' showposts='10'  template='small-sticky-list.php' ]"); ?>   
		<h2 class="morenews"><a href="<?php echo site_url(); ?>/category/it-news/">More IT news >>></a></h2>	
</div>
	
 <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>	

</section>

	
</main>

<aside class="homeaside">
<div class="homeaside-left">
<?php get_sidebar('itleft'); ?>
</div>
<div class="homeaside-right">
<?php get_sidebar('itright'); ?>
</div>
</aside>




</div>


<?php get_footer(); ?>
	
