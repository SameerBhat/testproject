<?php
   /**
    * Template Name: Supplier Profile
    *
    * Allow Supplier to update their profiles from Frontend.
    *
    */
   /* Get user info. */
   get_header(); 
   global $current_user, $wp_roles;
  
   //echo 'Username: ' . $current_user->user_login . '<br />';
   // echo 'User email: ' . $current_user->user_email . '<br />';
   // echo 'User first name: ' . $current_user->user_firstname . '<br />';
   // echo 'User last name: ' . $current_user->user_lastname . '<br />';
   // echo 'User display name: ' . $current_user->display_name . '<br />';
   // echo 'User ID: ' . $current_user->ID . '<br />';
   
   $user = new WP_User(get_current_user_id());
   //echo $user->roles[0];
   if($user->roles[0] =="contributor"){
   // echo 'die';
   } else{
    //   echo 'ok';
   }

   if ( isset($_POST['submit'] ) ) {
    
   // sanitize user form input
   global $username,$email,$first_name,$password, $last_name,$company,$city,$phone,$postalcode;
   $username   =   sanitize_user( $_POST['username'] );
   $password =   esc_attr( $_POST['password'] );
   $email      =   sanitize_email( $_POST['email'] );
  // $website  =   esc_url( $_POST['website'] );
   $first_name =   sanitize_text_field( $_POST['first_name'] );
   $last_name  =   sanitize_text_field( $_POST['last_name'] );
   //$bio      =   esc_textarea( $_POST['bio'] );
   $company    =   sanitize_text_field( $_POST['company'] );
   $city       =   sanitize_text_field( $_POST['city'] );
   $phone      =   sanitize_text_field( $_POST['phone'] );
   $postalcode =   sanitize_text_field( $_POST['postalcode'] );

   global $reg_errors;
   $reg_errors = new WP_Error;
   if ( empty( $username ) || empty( $email )||empty( $password )|| empty( $company )|| empty( $city )|| empty( $phone )|| empty( $postalcode ) ) {
       $reg_errors->add('field', 'Required form field is missing');
   }
   if ( username_exists( $username ) ){
   $reg_errors->add('user_name', 'Sorry, that username already exists!');
   }
   if ( !is_email( $email ) ) {
       $reg_errors->add( 'email_invalid', 'Email is not valid' );
   }
   if ( email_exists( $email ) ) {
       $reg_errors->add( 'email', 'Email Already in use' );
   }

    global $reg_errors, $username, $password, $email, $first_name, $last_name;
   
   
}




if ( $user->roles[0] =="contributor") { 
   // die('dd');
?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1><?=$current_user->company;?></h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li><?=$current_user->company;?></li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo  get_the_author_meta( 'banner', $current_user->ID ); ?>" alt="" class="rounded img-fluid"></div>
      <div class="logo-area-sp"><img src="<?php 
      if(!empty(get_the_author_meta( 'image', $current_user->ID ))){
      echo esc_attr( get_the_author_meta( 'image', $current_user->ID ) ); 
      }else{ echo 'https://via.placeholder.com/300x122?text=logo';}
      ?>" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9 profile-area-sp">
            <h2>Company Name</h2>
                <p><?=$current_user->company;?></p>
            <h3>Address</h3>
                <p><?=$current_user->address;?></p>
            <h3>Town</h3>
                <p><?=$current_user->city;?></p>
            <h3>Postcode</h3>
                <p><?=$current_user->postalcode;?></p>
            <h3>Telephone</h3>
                <p><?=$current_user->phone;?></p>
            <h3>Email</h3>
                <p><a href="mailto:<?=$current_user->user_email;?>"><?=$current_user->user_email;?></a></p>
         </div>
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
                
               
            <h2 class="mt-4">Members List</h2>
            
            <ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/" target="_blank">View All Members List</a></li>
            </ul>
			<br />
			<ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Member-List.pdf" target="_blank">Download All Members List</a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- Inner Content Area End -->
</div>

<?php 
    } else {
    $all_meta_for_user = get_user_meta( $current_user->ID );
?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1>Supplier</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li>Supplier</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/next-banner.png" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9">
            <h2>Become a Supplier</h2>
            <p>A key element of the IBA Group’s strategy is to maximise support for our Preferred Suppliers. We, therefore, try not to proliferate the number of suppliers we have in any one product sector. We are, however, always happy to talk to potential new suppliers.</p>
            <p>You are very welcome to look at or download our current Supplier list and if you feel you can offer a better product, better service or overall better value for money, do please complete the form opposite or contact us by phone or e mail as per the details below. Equally if you have a product or service not covered at all by the current supplier portfolio, then again please get in touch.</p>
            <p>If you already trade with some of our Members, it is always useful to supply this information to us, in order that we can gain internal endorsement for your company.</p>

            <p>The process for becoming a Preferred Supplier is basically in 3 stages: first to formulate a deal with the Group’s Chief Operating Officer, Paul Jenner; second to gain approval for the deal by the IBA Management Committee of Members and finally, to gain approval from the whole Membership via a democratic vote.</p>
            </div>
        <div class="col-lg-3 enquiry-area">
			
			<?php
	   
	    if ( isset($_POST['submit'] ) ) {
	     if ( 1 > count( $reg_errors->get_error_messages() ) ) {
         $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $email,
            'user_pass'     =>   $password,
            'first_name'    =>   $first_name,
            'last_name'     =>   $last_name,
         );
         $user = wp_insert_user( $userdata );
            update_user_meta( $user, 'company', $company ); 
            update_user_meta( $user, 'city', $city ); 
            update_user_meta( $user, 'phone',  $phone); 
            update_user_meta( $user, 'postalcode', $postalcode ); 
            $user_role = new WP_User($user); 
            $user_role->set_role('subscriber');
            $user_role->roles; ?>
			
           <div class="alert alert-success"><strong>Success!</strong> Registration Success</div>
			
			<?php
     }
	   
	   ?>
			
			
			
			<?php
	 if (is_wp_error( $reg_errors )) :
        foreach ( $reg_errors->get_error_messages() as $error ) :?>
           
	   
			<div class="alert alert-danger">
  <strong>Error!</strong> <?php echo $error; ?>
</div>
			<?php
   endforeach; else:
	   ?>
		
       <div class="alert alert-success">
  <strong>Success!</strong> Sucessfully Sent Request.
</div>
    
			
			<?php endif;
			
			
			
		}?>
			
			
         <h2>Request Information</h2>
         <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
            <label>First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control mb-1 pb-1" value="<?=isset( $_POST['first_name']) ? $first_name : null?>" placeholder="First Name" />				
            <label>Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control mb-1 pb-1"  value="<?=isset( $_POST['last_name']) ? $last_name : null?>" placeholder="Last Name" />					
            <label>Company Name</label>
            <input type="text" name="company" id="company" class="form-control mb-1 pb-1" value="<?=isset( $_POST['company']) ? $company : null?>" placeholder="Company Name" />					
            <label>Telephone</label>
            <input type="text" name="phone" id="phone"  class="form-control mb-1 pb-1" value="<?=isset( $_POST['phone']) ? $phone : null?>" placeholder="Telephone" />					
            <label>Town</label>
            <input type="text" name="city" id="city" class="form-control mb-1 pb-1" value="<?=isset( $_POST['city']) ? $city : null?>" placeholder="Town" />					
            <label>Postcode</label>
            <input type="text" name="postalcode" id="postalcode" class="form-control mb-1 pb-1" value="<?=isset( $_POST['postalcode']) ? $postalcode : null?>" placeholder="Postalcode" />					
            <label>Email</label>
            <input type="text" name="email" id="email" class="form-control mb-1 pb-1" value="<?=isset( $_POST['email']) ? $email : null?>" placeholder="Email" />
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control mb-1 pb-1" value="<?=isset( $_POST['username']) ? $username : null?>" placeholder="UserName" />
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control mb-1 pb-1" value="<?=isset( $_POST['password']) ? $password : null?>" placeholder="Desire Password" />
            <input  type="submit" value="Send Your Request" name="submit" class="btn btn-bg  mb-1 pb-1" /> 
         </form>
         <h2 class="mt-4">Suppliers List</h2>
         <h5>Download a List of all our Suppliers</h5>
         <ul>
            <li><i class="fas fa-file-pdf"></i></li>
            <li><a href="<?=site_url();?>/wp-content/uploads/2019/01/IBA-Supplier-List.pdf" target="_blank">List of all Suppliers</a></li>
         </ul>
        </div>
    </div>
   </div>
</div>



<?php }
   ?>
<?php get_footer();
   ?>