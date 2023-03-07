<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>

<?php get_template_part( 'open' ); ?>


  
		<?php if ( have_posts() ) : ?>
 
		<?php echo "<h1>Search results for <strong>'$s'</strong></h1>"; ?>
  
  
<?php if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "</p>", 5);
}?>
    
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
		


<article class="listing">
			  <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-search">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a> </div>
                     <?php endif; ?>   
				     <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>		<h2 class="resulttitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				
                     
                           <p>	 <?php the_advanced_excerpt(); ?>   </p>
                       
                         
          <p class="published">Last updated: <?php the_modified_date(); ?></p>		                  
            
			</article>


			<?php endwhile; ?>
            
       
 
        
		<?php else : ?>
        
     	<?php echo "<h1>No search results for <strong>'$s'</strong></h1>."?>
        <p>You can try searching again using the box below using a different term. Alternatively, if the information you seek is also of interest to the public, you may <a href="http://www.blackburn.gov.uk">find it on the Council website</a> or on the Council's public news site, <a href="http://theshuttle.org.uk">The Shuttle.</a></p>  
	
<div class="searchheader" >   
  		<div class="sh-inner">		
  			<p class="search-result">       
 		

 <!--s-->
   <form role="search" method="get" class="search-form extrasearch" action="<?php echo site_url(); ?>/">

        
        <div class="sfield"> 
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
    
    
   

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>   <!--s-->

  
 
  
</div>
</div>
    
		<?php endif; ?>
 
</section>
</main>

<aside class="allside">

<?php get_sidebar('search'); ?>


</aside>


</div>


<?php get_footer(); ?>
