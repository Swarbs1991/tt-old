<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>
<?php if ( ! empty( $preamble ) ) : ?><p class="tt-preamble"><?php echo $preamble; ?></p><?php endif; ?>

<?php foreach( $tweets AS $tweet ) : ?>
	<div class="tweet <?php echo esc_attr( $tweet->twit_uid ); ?>">
		<div class="res-avatar">
			<a target="_blank" href="<?php echo esc_url( $tweet->twit_link ); ?>"><img src="<?php echo esc_url( $tweet->twit_pic ); ?>" alt="<?php echo esc_attr( $tweet->twit_name ); ?>"/></a>
		</div>
		
			<h3><a target="_blank" href="<?php echo esc_url( $tweet->twit_link ); ?>"><?php echo esc_html( $tweet->twit_name ); ?></a>:</h3>
			<p><?php echo $tweet->content; ?></p>
	
	    <p class="info"><a target="_blank" class="tweet-link" href="<?php echo esc_url( $tweet->link ); ?>" title="<?php __( 'View tweet', 'twitter-tracker' ); ?>"><?php echo esc_html( $tweet->time_since() );  ?></a></p>
	</div>
<?php endforeach; ?>

<?php echo $html_after; ?>