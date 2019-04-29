<?php
   /**
    * Template Name: User details
    *
    * Allow member to update their profiles from Frontend.
    *
    */
   /* Get user info. */
   get_header(); 

             global $current_user, $wp_roles;


if( array_key_exists( 'details' , $wp_query->query_vars )):
  // echo $wp_query->query_vars['details'];

                $uri_segments = explode('/', $wp_query->query_vars['details']);
				$cid = $uri_segments[0];
                $user = get_userdata( $cid ); 
                $value = get_user_meta ( $cid);
                // print_r( $value);die;
                $id =$list->ID;
					endif;
            ?>

            <div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
            <div class="container inner-head">
               <h1>Details</h1>
               <ul>
                  <li><a href="<?=site_url();?>">Home</a></li>
                  <li>&gt;</li>
                  <li><?=$value['company'][0]?></li>
               </ul>
            </div>
           <!-- Inner Content Area Start -->
          
            <div class="container inner-content-box">
            <div class="inner-banner"><img src="<?php

if(!empty(get_the_author_meta( 'banner',  $cid))){

  echo  get_the_author_meta( 'banner',  $cid );
}else{
	
	
  echo get_site_url().'/wp-content/uploads/logo/default_banner.jpg';
}

    ?>" alt="" class="rounded img-fluid"></div>
				
				
            <div class="logo-area-sp"><img src="<?php 
            if(!empty(get_the_author_meta( 'image',  $cid ))){
				$a = esc_attr( get_the_author_meta( 'image',  $cid ) );

if (\strpos($a, 'dealquikr') !== false) {
	echo esc_attr( get_the_author_meta( 'image',  $cid ) ); 
  
}else{
	      echo get_site_url().'/wp-content/uploads/members/'.esc_attr( get_the_author_meta( 'image',  $cid ) );
}
				
				
        
            }else{ echo 'https://via.placeholder.com/300x122?text=logo';}
            ?>" alt="" class="rounded img-fluid"></div>
            <div class="row">
               <div class="col-lg-9 profile-area-sp">
                	  <h2> Company Name </h2>
                      <p> <?=$value['company'][0];?> </p>
				 
				    <h2>Contact Person Name</h2>
                      <p><?=$user->user_nicename;?></p>
				   
				   
				  
		   
				   
				
			
				   
				    <h2>Job</h2>
                      <p><?= $value['job'][0]; ?></p>
				      
                 
                				   <?php 
				   
				   $user_url = trim($user->user_url);
				   
				  
				   if($user_url==null || $user_url =="0"){
	
	
								
	
											}else{
					   echo'<h2>Website</h2><p>'.$user->user_url.'</p>';
	
				   } ?>
		
				   
                  <h2>Email</h2>
                      <p><a href="mailto:<?=$user->user_email;?>"><?=$user->user_email;?></a></p>
				   
				   
                 <h2>About Company</h2>
                      <p><?=$value['description'][0];?></p>
				   
				    <h2>Address</h2>
                      <p><?=$value['address'][0];?></p>
				     <h2>Town</h2>
                      <p><?=$value['city'][0];?></p>
                 <h2>County</h2>
                      <p><?=$value['country'][0];?></p>
				   
               
                  <h2>Postcode</h2>
                      <p><?=$value['postalcode'][0];?></p>
                  <h2>Telephone</h2>
                      <p><?=$value['phone'][0];?></p>
                 
					  <br />
				     <br />
					  <span class="userlogout"><a href="<?=site_url();?>/map/">BACK TO MAP</a></span>
					  
               </div>
			   
               <?php 
               
               $current_user = wp_get_current_user();
               $user_roles = $current_user->roles;
                    // Check if the role you're interested in, is present in the array.
                    if ( in_array( 'subscriber', $user_roles, true ) ) {
                        ?>
                        <div class="col-lg-3 enquiry-area">
                            <h2>Supplier Information</h2>
                            <ul>
                                <li><i class="fas fa-edit"></i></li>
                                <li><a href="<?=site_url();?>/edit-profile/">Edit Profile</a></li>
                            </ul><br />
                            <ul>
                                <li><i class="fas fa-question-circle"></i></li>
                                <li><a href="http://bmtesting.co.uk/forum/" target="_blank">View Forum</a></li>
                            </ul>
                            <h2 class="mt-4">Supplier List</h2>
                            <ul>
                                <li><i class="fas fa-list"></i></li>
                                <li><a href="<?=site_url();?>/all-list/">View All Supplier List</a></li>
                            </ul>
                        <br />
                            <ul>
                                <li><i class="fas fa-file-pdf"></i></li>
                                <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Supplier-List.pdf" target="_blank">Download All Supplier List</a></li>
                            </ul>
                        </div>
                   <?php }elseif ( in_array( 'contributor', $user_roles, true ) ) {?>
                        <div class="col-lg-3 enquiry-area">
                        <h2>Member Information</h2>
                        <ul>
                            <li><i class="fas fa-edit"></i></li>
                            <li><a href="<?=site_url();?>/edit-profile/">Edit Profile</a></li>
                        </ul><br />
                        <ul>
                            <li><i class="fas fa-question-circle"></i></li>
                            <li><a href="http://bmtesting.co.uk/forum/" target="_blank">View Forum</a></li>
                        </ul>
                        <h2 class="mt-4">Member List</h2>
                        <ul>
                            <li><i class="fas fa-list"></i></li>
                            <li><a href="<?=site_url();?>/all-list/">View All Member List</a></li>
                        </ul>
                    <br />
                        <ul>
                            <li><i class="fas fa-file-pdf"></i></li>
                            <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Member-List.pdf" target="_blank">Download All Member List</a></li>
                        </ul>
                    </div>

            <?php
                   }
                   
                   ?>
               
            </div>
         </div>
            <!-- Inner Content Area End -->
         </div> 

<?php get_footer();?>