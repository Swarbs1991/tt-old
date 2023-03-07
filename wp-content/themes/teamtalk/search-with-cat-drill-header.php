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


<h1>Search results</h1>
		<?php if ( have_posts() ) : ?>
  <div class="searchheader">   
  <div class="sh-inner">
 
<p class="search-result">
 <?php
    $cat = get_cat_name($wp_query->query_vars['cat']);
    $s = $wp_query->query_vars['s'];
	$found = $wp_query->found_posts;
	
	
		
		 if ($found != '1') {
       $result_txt = " results";
    }else{ $result_txt = " result";}
		
	
 if ($found >= '4') {$fathin="narrow";}else{$fathin="widen";}
		
	
	
    echo "<h3>Top results for <strong>'$s'</strong>";
    if ($cat != '') {
        echo " in '$cat'.</h3><p> Use the drop down box below to ".$fathin." your search to particular areas of interest.</p>";
    }else{echo " across the whole site</h3><p>This includes both information pages <strong>and</strong> news stories. </p>";}
	if ($found >='3'){echo"<p>Use the drop down box below to ".$fathin." your search to particular areas of interest.</p>";}?>   


 <!--s-->
   <form role="search" method="get" class="search-form extrasearch" action="<?php echo site_url(); ?>/">
	
		
        
        <div class="sfield"> 
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
      <div class="search-cats">  <label for "cat">Search in:</label> 
		<?php
    wp_dropdown_categories(array('show_option_all' => 'Whole site','taxonomy' => 'category','hierarchical' =>'1','hide_empty' => '1','include' => '9,2,4,5,151,240,238,239,247,242,244,243')); ?></div>
    
   

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>
        
           <p><a href="<?php echo site_url(); ?>/?p=2286">Didn't find what you were looking for?</a></p></div>   <!--s-->
        
     
</div>



    
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				


<article class="listing">
			  <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-search">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a> </div>
                     <?php endif; ?>   
				     <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' ); ?>		<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							<p><strong>Published on  <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></strong></p>
                             
                           <p><?php  the_advanced_excerpt('length=23&length_type=sentence'); ?>  </p>
                       
                         
                            
            
			</article>


			<?php endwhile; ?>
            
       


 <?php gravity_form( 2, true, true, false, '', false );   ?>     
        
		<?php else : ?>
        
        
	
<div class="searchheader" >   
  		<div class="sh-inner">		
  			<p class="search-result">       
 		<?php
    		$cat = get_cat_name($wp_query->query_vars['cat']);
   			 $s = $wp_query->query_vars['s'];
	
		
	
    echo "Nothing found for '$s'";
    if ($cat != '') {
        echo " in '$cat'. Try using the dropdown box in the search to widen the search. Choose 'Whole site' to search both information pages <strong>and</strong> news.";
    }else{echo " across the whole site (information <strong>and</strong> news). Search again for something else?";}
		
?>     

</p>

 <!--s-->
   <form role="search" method="get" class="search-form extrasearch" action="<?php echo site_url(); ?>/">

        
        <div class="sfield"> 
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
      <div class="search-cats">  <label for "cat">Search in:</label> 
		<?php
    wp_dropdown_categories(array('show_option_all' => 'Whole site','taxonomy' => 'category','hierarchical' =>'1','hide_empty' => '1','include' => '9,2,4,5,151,240,238,239,247,242,244,243')); ?></div>
    
   

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>   <!--s-->

  
 
  
</div>
</div>

    <?php gravity_form( 2, true, true, false, '', false );   ?>   
		<?php endif; ?>
 
</section>
</main>

<aside class="allside">

<?php get_sidebar('search'); ?>


</aside>


</div>


<?php get_footer(); ?>
