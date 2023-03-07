<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Hub
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */

get_header(); ?>
<!--archive-->
	<?php get_template_part( 'open' ); ?>


		<?php if ( have_posts() ) : ?>
				<h2><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'hub' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'hub' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'hub' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'hub' ), get_the_date( _x( 'Y', 'yearly archives date format', 'hub' ) ) );
					else :
						printf( __( 'Tagged with: %s', 'hub' ), single_term_title( '', false ) ); 
					endif;
				?></h2>
			<!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

<?php wp_simple_pagination(); ?>	
  
</section>
</main>
<!--archive-->
<aside class="allside">
<?php get_sidebar('categoryright'); ?>
</aside>


</div>


<?php get_footer(); ?>
  
  