<?php
/**
 * Template Name: Change  Password
 *
 * Allow users to update their profiles from Frontend.
 *
 */
/* Get user info. */
get_header();
global $current_user, $wp_roles; 
//print_r($current_user);
?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      
     
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo  get_the_author_meta( 'banner', $current_user->ID ); ?>" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9">
            <h2> Change  Password</h2>
            <?php

//print_r($current_user);
$error = array();    
/* If profile was saved, update profile. */
 
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {



    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        
        if ( $_POST['pass1'] == $_POST['pass2'] ){

         $response = wp_update_user( array( 'ID' => $current_user->ID,  'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        update_user_meta( $current_user->ID, 'changed_password', 'true' );
           if ( is_wp_error( $response ) ) {
            _e('Something went wrong', 'profile'); 
        } else {
            _e('Password changed succesfully. Please login again with new password', 'profile'); 


            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Password Succesfully Updated, Please Login Again');
            window.location.href='".get_home_url()."';
            </script>");
            die();
          
        }
            
        }else{
   
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    
        }
        
    }else{
   
        $error[] = __('Please Enter The New Passwords', 'profile');

    }
}


if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>">
    <div class="entry-content entry">
        <?php the_content(); ?>
        <?php if ( !is_user_logged_in() ) : ?>
                <p class="warning">
                    <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                </p>
        <?php else : ?>
            <?php
            
            if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
            <form method="post" id="adduser" action="#" enctype="multipart/form-data">
                
				<table class="form-table">
  
	<tr>
	<th><label for="pass1"><?php _e('Password *', 'profile'); ?> </label></th>
      <td>
	 <input class="text-input" name="pass1" type="password" id="pass1" /><br />
    </td>
    </tr>  
	<tr>



	<th><label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label></th>
      <td>
	 <input class="text-input" name="pass2" type="password" id="pass2" /><br />
    </td>
    </tr> 


	</table>
    

                <p class="form-submit">
                    <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                    <?php wp_nonce_field( 'update-user' ) ?>
                    <input name="action" type="hidden" id="action" value="update-user" />
                </p>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php endwhile; ?>
<?php else: ?>
<p class="no-data">
    <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
</p>
<?php endif; ?>
            
            
            </div>
          

          

          
      
   </div>
</div>
<?php get_footer();?>


