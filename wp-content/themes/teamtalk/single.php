<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress 
 * @subpackage Teamtalk
 * @since Teamtalk
 */

get_header(); ?>

<!--single-->
<?php get_template_part( 'open' ); ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
             
			<?php endwhile; ?>
            
           

</section>
</main>

<aside class="allside">
<?php get_sidebar('single'); ?>
</aside>


</div>


<?php get_footer(); ?>
