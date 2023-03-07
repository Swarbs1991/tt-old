<?php
/**
 * Template Name: Marketlist
 */


get_header(); ?>
<!--archive-shuttle-->
	<?php get_template_part( 'open' ); ?>
<h1>Staff Marketplace</h1>

  <?php the_content(); ?>

<?php
/*
 * Loop through Categories and Display Posts within
 */
$post_type = 'marketplace';
 
// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
 
foreach( $taxonomies as $taxonomy ) :
 
    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( $taxonomy );
 
    foreach( $terms as $term ) : ?>
 
     <h2> <?php echo $term->name; ?></h2>
 
        <?php
        $args = array(
                'post_type' => $post_type,
                'posts_per_page' => -1,  //show all posts
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $term->slug,
                    )
                )
 
            );
        $posts = new WP_Query($args);
 
        if( $posts->have_posts() ): while( $posts->have_posts() ) : $posts->the_post(); ?>

<?php if ( get_post_status ( $ID ) == 'publish' ) : ?>
                    <article class="marketplace listing">
					  <div>
 <?php if ( has_post_thumbnail() ) : ?>
						<div class="res-thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo remove_wp_width_height(get_the_post_thumbnail(get_the_ID(),'large')); ?>
		   </a> </div>
                     <?php endif; ?>
                 <h3><?php  echo get_the_title(); ?></h3>
 
                        <?php the_content(); ?>
                        <p>Price: <?php the_field('price'); ?></p>
                        <p> Contact: <a href="mailto:<?php the_field('contact_email'); ?>"> <?php the_field('contact_name'); ?></a> <?php the_field('contact_number'); ?></p>
					  </div>
                   </article>

<?php endif; ?>
 
        <?php endwhile; endif; ?>
 
    <?php endforeach;
 
endforeach; ?>




<?php get_template_part( 'close' ); ?>



