<?php
/**
 * Template Name: User Profile Edit
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
      <h1> Profile Edit</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li> Profile Edit</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo  get_the_author_meta( 'banner', $current_user->ID ); ?>" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9">
            <h2> Profile Edit</h2>
            <?php

//print_r($current_user);
$error = array();    
/* If profile was saved, update profile. */
 
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
    if ( !empty( $_POST['authorphoto'] ) )
        update_usermeta( $current_user->id, 'comp_logo', esc_attr($_POST['comp_logo']   ) ); 

    if ( count($error) == 0 ) {
        do_action('edit_user_profile_update', $current_user->ID);
        //wp_redirect( get_permalink() );
        //exit;
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
            <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
            <form method="post" id="adduser" action="<?php the_permalink(); ?>" enctype="multipart/form-data">
                
				<table class="form-table">
    <tr>
      <th><label for="first-name"><?php _e('First Name', 'profile'); ?></label></th>
      <td>
	  <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" /><br />
    </td>
    </tr> 
	 <tr>
	<th><label for="last-name"><?php _e('Last Name', 'profile'); ?></label></th>
      <td>
	  <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" /><br />
    </td>
    </tr>   
	<tr>
	<th><label for="email"><?php _e('E-mail *', 'profile'); ?></th>
      <td>
	 <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" /><br />
    </td>
    </tr>   
	<tr>
	<th><label for="url"><?php _e('Website', 'profile'); ?></label></th>
      <td>
	 <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" /><br />
    </td>
    </tr>  
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
	</table><br />
				
	<h3><label for="description"><?php _e('Biographical Information', 'profile') ?></label></h3>
                <p class="form-textarea">
                    
                    <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                </p>

                <?php  do_action('edit_user_profile',$current_user);  ?>
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
           <?php 
            $user = new WP_User(get_current_user_id()); 
            //echo $user->roles[0];die;
            if ($user->roles[0] =="subscriber"  ) { ?>
        <div class="col-lg-3 enquiry-area">
         <h2>Profile Edit Information</h2>
         <ul>
             
               <li><i class="fas fa-edit"></i></li>
               <li><a href="<?=site_url();?>/edit-profile/">Edit Profile</a></li>
            </ul><br />
			<ul>
               <li><i class="fas fa-question-circle"></i></li>
               <li><a href="http://bmtesting.co.uk/forum/" target="_blank">View Forum</a></li>
            </ul> <h2 class="mt-4">Suppliers List</h2><ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/">View All  List</a></li>
            </ul>
			<br />
			<ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Supplier-List.pdf" target="_blank">Download All  List</a></li>
            </ul>
        </div>
            <?php } ?>

            <?php  if ($user->roles[0] =="contributor") { ?>
        <div class="col-lg-3 enquiry-area">
         <h2>Profile Edit Information</h2>
         <ul>
             
               <li><i class="fas fa-edit"></i></li>
               <li><a href="<?=site_url();?>/edit-profile/">Edit Profile</a></li>
            </ul><br />
			<ul>
               <li><i class="fas fa-question-circle"></i></li>
               <li><a href="http://bmtesting.co.uk/forum/" target="_blank">View Forum</a></li>
            </ul> <h2 class="mt-4">Member List</h2><ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/">View All  List</a></li>
            </ul>
			<br />
			<ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Supplier-List.pdf" target="_blank">Download All  List</a></li>
            </ul>
        </div>
            <?php } ?>

            <?php  if ($user->roles[0] =="administrator") { ?>
        <div class="col-lg-3 enquiry-area">
         <h2>Profile Edit Information</h2>
         <ul>
             
               <li><i class="fas fa-edit"></i></li>
               <li><a href="<?=site_url();?>/edit-profile/">Edit Profile</a></li>
            </ul><br />
			<ul>
               <li><i class="fas fa-question-circle"></i></li>
               <li><a href="http://bmtesting.co.uk/forum/" target="_blank">View Forum</a></li>
            </ul> <h2 class="mt-4">All List</h2><ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/">View All  List</a></li>
            </ul>
			<br />

			
            <ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?php echo of_get_option( 'member_pdf_link' ); ?>" target="_blank">Download member  List</a></li>
            </ul>
            <ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?php echo of_get_option( 'supplier_pdf_link' ); ?>" target="_blank">Download Supplier  List</a></li>
            </ul>
        </div>
            <?php } ?>

    </div>
   </div>
</div>
<?php get_footer();?>


