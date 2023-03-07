<?php

/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/

$GLOBALS['current_user'] = $current_user = wp_get_current_user();
$GLOBALS['profileuser'] = $profileuser = get_user_to_edit( $current_user->ID );
$user_can_edit = false;
foreach ( array( 'posts', 'pages' ) as $post_cap )
$user_can_edit |= current_user_can( "edit_$post_cap" );?>
<div class="profile" id="theme-my-login<?php $template->the_instance(); ?>">
<?php $template->the_action_template_message( 'profile' ); ?>
<?php $template->the_errors(); ?>
<!--<form id="your-profile" action="" method="post">-->
 <form id="your-profile" action="<?php $template->the_action_url( 'profile' ); ?>" method="post" enctype="multipart/form-data">
<?php wp_nonce_field( 'update-user_' . $current_user->ID ) ?>

<h2><?php echo esc_attr( $profileuser->first_name ); ?> <?php echo esc_attr( $profileuser->last_name ); ?></h2>
<h3>Username: <?php echo ($profileuser->user_login) ?> </h3>

<p>You can edit your profile - change the text in the boxes and use the "update profile" button</p>	
<div class="account-fields">


<div class="fieldgroup">
<div class="fieldgroup-inner">
 <?php
$myAv = new simple_local_avatars();
$myAv->edit_user_profile($profileuser);
?>

<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Update Profile', 'theme-my-login' ); ?>" name="submit" />
</div>
</div>


<div class="fieldgroup">
<div class="fieldgroup-inner">
<input type="hidden" name="from" value="profile" />
<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />

<div class="pro_names firstname"><label for="first_name"><?php _e( 'First name', 'theme-my-login' ); ?></label>
	<input type="text" name="first_name" id="first_name" size="16" value="<?php echo esc_attr( $profileuser->first_name ) ?>" autocomplete="off" /> </div>

<div class="pro_names lastname"><label for="last_name"><?php _e( 'Last name', 'theme-my-login' ); ?></label>
<input type="text" name="last_name" id="last_name" size="16" value="<?php echo esc_attr( $profileuser->last_name ) ?>" autocomplete="off" />
</div>

<div class="pro_names email">
<label for="email"><?php _e( 'E-mail', 'theme-my-login' ); ?> <span class="description"><?php _e( '(required)', 'theme-my-login' ); ?></span></label>
<input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ) ?>" class="regular-text" />
</div>
<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Update Profile', 'theme-my-login' ); ?>" name="submit" />
</div>

</div>

<div class="fieldgroup">
<div class="fieldgroup-inner">
<h3>Change your password</h3>

<?php
$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
if ( $show_password_fields ) :
?>


<p>You can change your password here. You will need to type it in both boxes below before using the "Update profile" button.</p>

<div id="password-change">
<?php _e( '<p>Your password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp;.</p>', 'theme-my-login' ); ?>
	<div class="password-meter">
	<div id="pass-strength-result">
	<?php _e( 'Strength indicator', 'theme-my-login' ); ?></div>
	</div>

	<div class="password">
	<div class="pro_names pass1>
	<label for="pass1"><?php _e( 'New Password', 'theme-my-login' ); ?></label>
	<input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" />
	</div>

	<div class="pro_names pass2>
	<label for="pass2"><?php _e( 'Type your new password again.', 'theme-my-login' ); ?></label>
	<input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" /> 


</div>

</div>
</div>

<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Update Profile', 'theme-my-login' ); ?>" name="submit" />
<?php endif; ?>


</div>
</form>

</div>


<div style="clear:both">
<h3>Comment subscriptions</h3>
<p>If you have chosen to get updates about articles you have commented on you can <a href="http://theshuttle.org.uk/comment-subscriptions/">update your options</a>.</p>


<h3>Delete account</h3>
<p>If you want to delete your account please email <a href="mailto:webteam@blackburn.gov.uk">webteam@blackburn.gov.uk</a></p>

  
</div>







