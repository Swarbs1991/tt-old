<?php
/*
Template Name: MyView
*/
get_header(); ?>
<!--homepage-->

<div class="wrap content">
<div class="wrapper">



<main class="homemain">



<section class="homecontent">
<img src="/wp-content/uploads/myviewbanner.jpg" alt="MyView" />


<!--s-->
<div class="hrsearch">
   <form role="search" method="get" class="search-form extrasearch" action="<?php echo site_url(); ?>/">
	
		
        
        <div class="sfield"> 
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
      <div class="search-cats">  <label for "cat">Search in:</label> 
		<?php
    wp_dropdown_categories(array('taxonomy' => 'category','hierarchical' =>'1','hide_empty' => '1','include' => '718,719','order'=>'DESC')); ?></div>
    
   

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>
        
    </div>   <!--s-->

  			
<div class="latest-news">




     
			<h2 class="latest">Latest MyView news</h2>
		<?php echo do_shortcode("[ic_add_posts category='myview-news' showposts='10'  template='small-sticky-list.php' ]"); ?>   
		<h2 class="morenews"><a href="/category/myview-news/">More Myview news >>></a></h2>	
</div>
	


</section>
</main>

<aside class="homeaside">
<div class="homeaside-left">
<?php get_sidebar('myviewleft'); ?>
</div>
<div class="homeaside-right">
<?php get_sidebar('myviewright'); ?>
</div>
</aside>




</div>


<?php get_footer(); ?>
	
