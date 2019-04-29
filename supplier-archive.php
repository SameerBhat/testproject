<?php
   /**
    * Template Name: All Supplier
    *
    * Allow member to update their profiles from Frontend.
    *
    */
   /* Get user info. */
   get_header(); 
   global $current_user, $wp_roles;
   $user = new WP_User(get_current_user_id()); 
   if ($user->roles[0] =="subscriber" ) { 
    ?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1>All List</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li>All List</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/next-banner.png" alt="" class="rounded img-fluid"></div>
      <div class="logo-area-sp"><img src="" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9 profile-area-sp">
         <?php
         $args = array( 'role' => 'contributor'); 
         $lists = get_users( $args); 
         foreach($lists as $list){
            $value = get_user_meta ( $list->ID);
            //print_r( $value);
            echo '<a class="btn" href="'.site_url().'/all-supplier/">'. $value['company'][0].'</a>';
        }
         ?>
            </div>
         <div class="col-lg-3 enquiry-area">
            <h2>Member Information</h2>
                <a href="<?=site_url();?>/edit-profile/">Edit Profile</a><br/>
                <a href="<?=site_url();?>/all-supplier/">All Supplier</a>
            
            <h5>Download a List of all our Suppliers</h5>
            <ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Supplier-List.pdf" target="_blank">Download All Suppliers List</a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- Inner Content Area End -->
</div>



<?php } elseif($user->roles[0] =="contributor") {
     $all_meta_for_user = get_user_meta( $current_user->ID );
     ?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1>Member</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li>All List</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/next-banner.png" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9">
            <h2>All List</h2>
            <?php
            $args = array( 'role' => 'contributor'); 
            $lists = get_users( $args); 
            foreach($lists as $list){
                $value = get_user_meta ( $list->ID);
                //print_r( $value);
                echo '<a class="btn" href="'.site_url().'/all-supplier/">'. $value['company'][0].'</a>';
            }
         ?>
            </div>
        <div class="col-lg-3 enquiry-area">
         <h2>Request Information</h2>
         
         <h2 class="mt-4">Members List</h2>
         <h5>Download a List of all our members</h5>
         <ul>
            <li><i class="fas fa-file-pdf"></i></li>
            <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Member-List.pdf" target="_blank">List of all Members</a></li>
         </ul>
        </div>
    </div>
   </div>
</div>
<?php }
   ?>
<?php get_footer();
   ?>