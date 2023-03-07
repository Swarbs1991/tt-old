<?php
/*
Template Name: Old Home
*/
get_header(); ?>
<!--homepage-->

<div class="wrap content">
<div class="wrapper">
<main class="homemain">

<section class="homecontent">

<div class="key">
				<h2 class="slider">Key messages</h2> 
					 <div class="slider">
  						 <?php echo do_shortcode( '[advps-slideshow optset="3"]' ); ?>
</div>
  			
<div class="latest-news">     
			<h2 class="latest">Latest news</h2>
		<?php echo do_shortcode("[ic_add_posts category='news' showposts='10' exclude_category='key-messages' template='small-sticky-list.php' ]"); ?>   
		<h2 class="morenews"><a href="<?php echo site_url(); ?>/category/news/">More news >>></a></h2>	
</div>
	
   </div>     

<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>	
</section>
</main>

<aside class="homeaside">
<div class="homeaside-left">
<?php get_sidebar('homeleft'); ?>
</div>
<div class="homeaside-right">
<?php get_sidebar('homeright'); ?>
</div>
</aside>




</div>


<?php get_footer(); ?>
	
