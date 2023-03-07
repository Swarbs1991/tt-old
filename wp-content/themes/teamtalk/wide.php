<?php
/*
Template Name: Wide
*/
get_header(); ?>
<!--homepage-->

<div class="wrap content">
<div class="wrapper">
<main class="widemain">

<section class="widecontent">
	<?php while ( have_posts() ) : the_post(); ?>
  
		<?php the_content(); ?>
<?php endwhile; // end of the loop. ?>
</section>
</main>



</div>


<?php get_footer(); ?>
	
