<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
?>
<!--content-->
<?php if ( is_single() ) : ?>
     <article class="single">
		<h1>The Shuttle <?php the_title(); ?></h1>
           <p><strong>Published on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></strong></p>
              
			  <?php echo do_shortcode('[dpArticleShare]');?>
              <?php if ( has_post_thumbnail() ) : ?>
	<div class="res-featured">
	<?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large'));?>
	<?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) : ?>
	<p class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p><?php endif; ?>
			  </div>
			  <?php endif; ?>
            <?php $attachments = new Attachments( 'my_attachments' ); /* pass the instance name */ ?>
			<?php if( $attachments->exist() ) : ?>
 			<div class="shuttle-download">
              <?php  while( $attachments->get() ) : ?>
              <a href="<?php echo $attachments->url(); ?>"> <h3>Download the PDF (<?php echo $attachments->filesize(); ?>)</h3></a>
                                <?php endwhile; ?>
                           
						</div>
					<?php endif; ?>   
  <div class="the_content">
              <?php the_content(); ?>
			<?php if ( comments_open()) : ?>
	<?php comments_template( '', true ); ?>
		<?php endif; // comments_open() ?>
				</div>
           <?php edit_post_link( __( '@', 'hub' ), '<span class="edit-link">', '</span>' ); ?>
			</article>
      <?php else : ?>
		 <article class="listing">
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="res-thumbnail">
			<?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?></div>
			<?php endif; ?>
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<p><strong>Published on  <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></strong></p>
                 <?php guerrilla_excerpt('40','','all','p','no'); ?>
                <p class="readmore catlist"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" >Read the full story</a></p>
                            
                            <p><?php comments_number( '', '1 comment', '% comments' ); ?></p>
                         
                            
              <?php edit_post_link( __( '@', 'hub' ), '<p class="edit-link">', '</p>' ); ?>
			</article>
	<?php endif; // is_single() ?>
		 	
