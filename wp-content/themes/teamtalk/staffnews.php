<tr style="outline:1px solid silver">
  <td valign="top">
	<div style="width:200px;outline:1px solid red;float:left"><?php echo get_the_post_thumbnail(get_the_ID(),'large'); ?></div>
   </td>
  <td valign="top">
 <div style="width:330px;outline:1px solid red;float:right"> <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  <?php  the_advanced_excerpt('length=30&length_type=sentence'); ?></div>
</td></tr>