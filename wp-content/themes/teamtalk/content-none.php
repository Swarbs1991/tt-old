<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
?>
	
				<h2><?php printf( __( 'Your staff news search for <span class="searchterm">%s</span> came up with no results. ', 'hub' ), get_search_query() ); ?></h2>
                
                  <div class="silverbox"><p>Search only looks at Teamtalk staff news archives. To find  departmental information for example forms, strategies, policies etc. <a href="http://intranet"> please use the search box on the departmental intranet.</a></p></div>
<h3>Search staff news again</h3>
	<?php get_search_form(); ?>


