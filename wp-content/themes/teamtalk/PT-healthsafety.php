<?php
/*
Template Name: Health and Safety
*/
get_header(); ?>
<!--homepage-->

<div class="wrap content">
<div class="wrapper">

<main class="homemain">

<section class="homecontent">
<img src="<?php echo site_url(); ?>/wp-content/uploads/healthsafety-banner.png" alt="Information Technology" />

<!--s-->
<div class="hrsearch">
   <form role="search" method="get" class="search-form extrasearch" action="<?php echo site_url(); ?>/">	
		
     
        <div class="sfield"> 
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
      <div class="search-cats">  <label for "cat">Search in:</label> 
		<?php
    wp_dropdown_categories(array('taxonomy' => 'category','hierarchical' =>'1','hide_empty' => '1','include' => '306,630','order'=>'DESC')); ?></div>
    
   

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>
        
    </div>   <!--s-->
<!-- <div class="silverbox2"><div>
  <div class="res-sbox2"><img src="<?php echo site_url(); ?>/wp-content/uploads/wellbeing1.png" /></div><h2>Staff health and well being week</h2>
  <p>Welcome to Staff Health and Wellbeing Week 2017 - Find out about events and activities below
</p>
  
  </div></div> -->
  			
<div class="latest-news">


     
			<h2 class="latest">Latest Health and safety news</h2>
		<?php echo do_shortcode("[ic_add_posts category='health-and-safety-news' showposts='10'  template='small-sticky-list.php' ]"); ?>   
		<h2 class="morenews"><a href="/category/IT/">More Health and Safety news >>></a></h2>	
</div>
	
 <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>	

</section>

	
</main>

<aside class="homeaside">
<div class="homeaside-left">
<?php get_sidebar('healthsafetyleft'); ?>
</div>
<div class="homeaside-right">
<?php get_sidebar('healthsafetyright'); ?>
</div>
</aside>




</div>


<?php get_footer(); ?>
	
