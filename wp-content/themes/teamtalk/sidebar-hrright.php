<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress * @subpackage cafehub
* @since cafehub 1.0

 */

?>
<div class="widget-area" role="complementary">

<ul class="xoxo">
<?php
/* When we call the dynamic_sidebar() function, it'll spit out
* the widgets for that widget area. If it instead returns false,
* then the sidebar simply doesn't exist, so we'll hard-code in
* some default sidebar stuff just in case.
*/
if ( ! dynamic_sidebar( 'sidebar-hrright' ) ) : ?>
<li id="archives" class="widget-container">
<h3 class="widget-title"><?php _e( 'Archives', 'hub' ); ?></h3>
<ul>
<?php wp_get_archives( 'type=monthly' ); ?>
</ul>
</li>
<li id="meta" class="widget-container">
<h3 class="widget-title"><?php _e( 'Meta', 'hub' ); ?></h3>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<?php wp_meta(); ?>
</ul>
</li>
<?php endif; // end primary widget area ?>
</ul>
<!-- #primary .widget-area -->

</div>