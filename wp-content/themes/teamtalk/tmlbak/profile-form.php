<?php



/*



If you would like to edit this file, copy it to your current theme's directory and edit it there.



Theme My Login will always look in your theme's directory first, before using this default template.



*/







$GLOBALS['current_user'] = $current_user = wp_get_current_user();



$GLOBALS['profileuser'] = $profileuser = get_user_to_edit( $current_user->ID );







$user_can_edit = false;



foreach ( array( 'posts', 'pages' ) as $post_cap )



	$user_can_edit |= current_user_can( "edit_$post_cap" );



?>






<div class="login profile" id="theme-my-login<?php $template->the_instance(); ?>">



	<?php $template->the_action_template_message( 'profile' ); ?>



	<?php $template->the_errors(); ?>



	<form id="your-profile" action="" method="post">



		<?php wp_nonce_field( 'update-user_' . $current_user->ID ) ?>



		

<div class="account-fields">
			<input type="hidden" name="from" value="profile" />

			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" /></div>



	






<h2><?php echo esc_attr( $profileuser->user_login ); ?></h2>
<div class="account-fields">
<label for="first_name"><?php _e( 'First name', 'theme-my-login' ); ?></label>
<input type="text" name="first_name" id="first_name" size="16" value="<?php echo esc_attr( $profileuser->first_name ) ?>" autocomplete="off" /> 
</div>
<div class="account-fields">
<label for="last_name"><?php _e( 'Last name', 'theme-my-login' ); ?></label>
<input type="text" name="last_name" id="last_name" size="16" value="<?php echo esc_attr( $profileuser->last_name ) ?>" autocomplete="off" /> 
</div>



<div class="account-fields"><label for="nickname"><?php _e( 'Nickname - this will show on your comments instead of your username', 'theme-my-login' ); ?> <span class="description"><?php _e( '(required)', 'theme-my-login' ); ?></span></label></div>

<div class="account-fields"><input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ) ?>" class="regular-text" />
<label for="display_name"><?php _e( 'Display name publicly as', 'theme-my-login' ) ?></label></div>

<div class="account-fields"><select name="display_name" id="display_name">

<?php
$public_display = array();
$public_display['display_nickname']  = $profileuser->nickname;
$public_display['display_username']  = $profileuser->user_login;
if ( !empty( $profileuser->first_name ) )
$public_display['display_firstname'] = $profileuser->first_name;
if ( !empty( $profileuser->last_name ) )
$public_display['display_lastname'] = $profileuser->last_name;
if ( !empty( $profileuser->first_name ) && !empty( $profileuser->last_name ) ) {
$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;}
if ( !in_array( $profileuser->display_name, $public_display ) )// Only add this if it isn't duplicated elsewhere
$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;
$public_display = array_map( 'trim', $public_display );
foreach ( $public_display as $id => $item ) {
$selected = ( $profileuser->display_name == $item ) ? ' selected="selected"' : '';
?>
<option id="<?php echo $id; ?>" value="<?php echo esc_attr( $item ); ?>"<?php echo $selected; ?>><?php echo $item; ?></option>
<?php } ?>
</select></div>
<div class="account-fields">
<label for="email"><?php _e( 'E-mail', 'theme-my-login' ); ?> <span class="description"><?php _e( '(required)', 'theme-my-login' ); ?></span></label>
<input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ) ?>" class="regular-text" /></div>

<h3>Comment subscriptions</h3>
<p>If you have chosen to get updates about articles you have commented on you can <a href="http://theshuttle.org.uk/comment-subscriptions/">update your options</a>.</p>


<h3>Change your password</h3>

<?php
$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
if ( $show_password_fields ) :
?>

<div class="account-fields">
<p>You can change your password here. You will need to type it in both boxes below before using the "Update profile" button.</p>

<?php _e( '<p>Your password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp;.</p>', 'theme-my-login' ); ?>
<div id="pass-strength-result">
<?php _e( 'Strength indicator', 'theme-my-login' ); ?></div>
<label for="pass1"><?php _e( 'New Password', 'theme-my-login' ); ?></label>

<input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" />

</div>
<div class="account-fields">
<label for="pass2"><?php _e( 'Type your new password again.', 'theme-my-login' ); ?></label>
<input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" /> 
</div>

<?php endif; ?>

<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Update Profile', 'theme-my-login' ); ?>" name="submit" />
</form>

<h3>Delete account</h3>
<p>If you don't want to keep your Shuttle account you can delete it. This will remove all your details and comments from our database</p>
<?php echo do_shortcode( '[plugin_delete_me]Text inside Shortcode tags[/plugin_delete_me]' ); ?>
