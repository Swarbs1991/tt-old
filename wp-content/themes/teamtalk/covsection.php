<?php
/**

 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
/*
Template Name: CV19 Home
*/
get_header();
?>
<!--page-->
<?php get_template_part( 'open' );
?>
<?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link right">', '</span>' );
?> <h1><?php the_title();
?></h1>
<?php while ( have_posts() ) : the_post();
?>
<?php if ( has_post_thumbnail() ) : ?>

<?php $noshow = get_field('noshowFI');
?>

<?php if (empty($noshow)) : ?>
<div class="res-page">
  <?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));
  ?>

</div>
<?php endif;
?>
<?php endif;
?> 


<?php the_content();
?>


<?php if( have_rows('documents') ): ?>
<div class="downloads">
  <div>
  <p class="download-title x">Documents</p>
  <ul>
<?php while( have_rows('documents') ): the_row(); 
// vars
$doctitle = get_sub_field('document_title');
$link = get_sub_field('document_url');?>
	<li><strong><a href="<?php echo $link; ?>"><?php echo $doctitle; ?></a></strong></li>

	<?php endwhile; ?>

	</ul>
  </div>
</div>
<?php endif; ?>



<?php echo do_shortcode('[download-attachments title="Downloads" style="list" display_size="0" display_date="0" display_icon="1" display_count="0" display_description="0" container_class="downloads"]');
?>



	<?php endwhile;
// end of the loop. ?>
  </section>
</main>





<aside class="allside">
  <?php get_sidebar('page');
  ?>
</aside>


</div>


<?php get_footer();
?>

