<?php

/*

If you would like to edit this file, copy it to your current theme's directory and edit it there.

Theme My Login will always look in your theme's directory first, before using this default template.

*/

?>

<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">


	<?php $template->the_errors(); ?>
    
     

	<form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register' ); ?>" method="post" enctype="multipart/form-data">

		
        	<div class="account-fields">

			<label for="first_name<?php $template->the_instance(); ?>"><?php _e( 'First name' ); ?></label>

			<input type="text" name="first_name" id="first_name<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'first_name' ); ?>" size="20" />

		</div>
        
        	<div class="account-fields">

			<label for="last_name<?php $template->the_instance(); ?>"><?php _e( 'Last name' ); ?></label>

			<input type="text" name="last_name" id="last_name<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'last_name' ); ?>" size="20" />

		</div>
        
    
        
        
        
        <div class="account-fields">

			<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username' ); ?></label>

			<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />

		</div>



		<div class="account-fields">

			<label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail' ); ?></label>

			<input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />

		</div>
        

    

		<p id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'A password will be e-mailed to you. You can change your password on your profile page, add more details and a profile picture when you have confirmed your account and logged in.' ) ); ?></p>


		<?php do_action( 'register_form' ); ?>






		<div class="submit">

			<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register' ); ?>" />

			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />

			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />

			<input type="hidden" name="action" value="register" />

		</div>

	</form>

	<div class="account-actions">
<p><a href="<?php echo site_url(); ?>/login/">Log in</a> | <a href="<?php echo site_url(); ?>/lostpassword/">I've lost my password!</a></p>
</div>
</div>

