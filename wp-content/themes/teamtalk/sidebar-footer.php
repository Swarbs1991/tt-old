<?php
/**
 * The sidebar containing the footer widget area.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */


	/* The footer widget area is triggered if any of the areas

	 * have widgets. So let's check that first.

	 *

	 * If none of the sidebars have widgets, then let's bail early.

	 */

	if (   ! is_active_sidebar( 'first-footer-widget-area'  )

		&& ! is_active_sidebar( 'second-footer-widget-area' )

		&& ! is_active_sidebar( 'third-footer-widget-area'  )

	

	)

		return;

	// If we get this far, we have widgets. Let do this.

?>

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
<div  class="footercol first">
<ul class="xoxo">
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
</ul>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
<div class="footercol second">
<ul class="xoxo">
<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
</ul>
</div><!-- #second .widget-area -->
<?php endif; ?>


<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
<div  class="footercol third">
<ul class="xoxo">
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
</ul>
</div>
<?php endif; ?>
