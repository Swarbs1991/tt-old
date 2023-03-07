<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>

<!--404-->	
	<?php get_template_part( 'open' ); ?>

			
				<h1>Page not found</h1>
		
<p>Try a search or use the menu bar above to browse</p>
					<?php get_search_form(); ?>
			

	
	<?php get_template_part( 'close' ); ?>