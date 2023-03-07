<?php
/*
Template Name: Home
*/
get_header(); ?>
<!--homepage dev-->

<div class="wrap content">
<div class="wrapper">
<main class="homemain">
	<h1 style="display:none">TeamTalk: Blackburn with Darwen Council staff news and information</h1>
<section class="homecontent">

<div class="homeslide" style="margin-bottom:1em;background-color:#000">
  
  	<h2 class="slider"><span class="morekeys"><a href="/category/ceo-updates/">Archive</a></span> Chief Executive Updates</h2> 
<?php echo do_shortcode("[metaslider id=15939]"); ?> 			
</div>
	

	
	
	
<div class="latest-news">     
			<h2 class="latest">Latest news</h2>

  
  	<?php echo do_shortcode("[ic_add_posts category='news' showposts='10' exclude_category='ceo-updates' template='small-sticky-list.php' ]"); ?>   

    <h2 class="morenews"><a href="/category/news/">More news >>></a></h2>	
  
  </div>
	
      


</section>
</main>

<aside class="homeaside">
  
 
 
<div class="homebutts">
<div class="homeaside-left">
<?php get_sidebar('homeleftbuttons'); ?>
</div>
<div class="homeaside-right">
<?php get_sidebar('homerightbuttons'); ?>
</div>
</div>

<div class="homeaside-left">
<?php get_sidebar('homeleft'); ?>
</div>
<div class="homeaside-right">
<?php get_sidebar('homeright'); ?>
</div>
</aside>

</div>


<?php get_footer(); ?>
	
