<?php
   /**
    * Template Name: All List
    *
    * Allow member to update their profiles from Frontend.
    *
    */
   /* Get user info. */
   get_header(); 
echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">';
   global $current_user, $wp_roles;
  
$user = new WP_User(get_current_user_id()); 
//echo $user->roles[0];die;
if ($user->roles[0] =="subscriber" ) { 
    ?>

<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1>All Suppliers List</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li>All Suppliers List</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/next-banner.png" alt="" class="rounded img-fluid"></div>
      <div class="logo-area-sp"><img src="" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9 profile-area-sp">
		 
		 <div class="suplist">
         <h2>All Suppliers List</h2>
            <table id="suppliersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Suppliers List</th>
               
            </tr>
        </thead>
        <tbody>
         <?php
          
		$args = array(
    'role'    => 'contributor',
    'orderby' => 'ID',
    'order'   => 'ASC'
);
         $lists = get_users($args);
	
        
         foreach($lists as $list){
			 
			 
			 //
            if($list->pw_user_status =='approved'){
           
            $value = get_user_meta ( $list->ID);
         
           $id =$list->ID;
           $name= str_replace(' ', '-', $value['company'][0]);
			
				echo '  <tr><td><a href="'.site_url().'/profile/details/'.$id.'/'.$name.'" target="_blank">'. $value['company'][0].'</a></td></tr>';
            }
			 
			 //
        }
         ?>
        </tbody>
        
    </table>
		 </div>
            </div>
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
			
			<h2 class="mt-4">Suppliers List</h2>
            
            <ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/">View All  List</a></li>
            </ul>
			<br />
			<ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?php echo of_get_option( 'supplier_pdf_link' ); ?>" target="_blank">Download All List</a></li>
            </ul>
			
               
         </div>
      </div>
   </div>
   <!-- Inner Content Area End -->
</div>
<?php 
} 
if($user->roles[0] =="contributor") {
$all_meta_for_user = get_user_meta( $current_user->ID );
?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1>All Member List</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li>All Members List</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/next-banner.png" alt="" class="rounded img-fluid"></div>
      <div class="row">
     
         <div class="col-lg-9 profile-area-sp">
		 
		 <div class="suplist">
            <h2>All Member List</h2>
           <table id="membersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Member List</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            $args = array( 'role' => 'subscriber',
    'orderby' => 'ID',
    'order'   => 'ASC'); 
             wp_list_authors('exclude_subscriber=0');
             $lists = get_users( $args);
            
             foreach($lists as $list){
                 //echo $list->user_status;
                if($list->pw_user_status =='approved'){
                    $value = get_user_meta ( $list->ID);
                   
                    $id =$list->ID;
                    $name= str_replace(' ', '-', $value['company'][0]);
                    echo '<tr><td><a href="'.site_url().'/profile/details/'.$id.'/'.$name.'" target="_blank">'. $value['company'][0].'</a></td></tr>';
                     
                }
               
               
            }
			
             ?>
              </tbody>
        
    </table>
            </div>
			</div>
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
                
               
            <h2 class="mt-4">Members List</h2>
            
            <ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/" target="_blank">View All Members List</a></li>
            </ul>
			<br />
			<ul>
               <li><i class="fas fa-file-pdf"></i></li>
               <li><a href="<?php echo of_get_option( 'member_pdf_link' ); ?>" target="_blank">Download All List</a></li>
            </ul>
        </div>
    </div>
   </div>
</div>
<?php } ?>


<?php 
if($user->roles[0] =="administrator") {
$all_meta_for_user = get_user_meta( $current_user->ID );
?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
   <div class="container inner-head">
      <h1>All  List</h1>
      <ul>
         <li><a href="<?=site_url();?>">Home</a></li>
         <li>&gt;</li>
         <li>All  List</li>
      </ul>
   </div>
   <!-- Inner Content Area Start -->
   <div class="container inner-content-box">
      <div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/next-banner.png" alt="" class="rounded img-fluid"></div>
      <div class="row">
         <div class="col-lg-9">
		 <div class="suplist">
            <h2>All  List</h2>
             <table id="allListDataTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
           
             wp_list_authors('exclude_subscriber=0');
             $lists = get_users( );
            // print_r($lists);die;
             foreach($lists as $list){
                 //echo $list->user_status;
                if($list->pw_user_status =='approved'){
                    $value = get_user_meta ( $list->ID);
                    // print_r( $value);die;
                    $id =$list->ID;
                    $name= str_replace(' ', '-', $value['company'][0]);
                     echo '<tr><td><a href="'.site_url().'/profile/details/'.$id.'/'.$name.'" target="_blank">'. $value['company'][0].'</a></td></tr>';
                     
                }
                 // echo '<li><i class="fas fa-angle-right"></i>'.$list->first_name.'&nbsp'.$list->last_name.'</li>';
                // print_r( $lists);
               
            }
			
             ?>
             </tbody>
        
    </table>
            </div>
			</div>
        <div class="col-lg-3 enquiry-area">
         <h2>Administrator Information</h2>
			 <ul>
             
               <li><i class="fas fa-edit"></i></li>
               <li><a href="<?=site_url();?>/edit-profile/">Edit Profile</a></li>
            </ul><br />
			<ul>
               <li><i class="fas fa-question-circle"></i></li>
               <li><a href="http://bmtesting.co.uk/forum/" target="_blank">View Forum</a></li>
            </ul>
                
               
            <h2 class="mt-4">All List</h2>
            
            <ul>
             
               <li><i class="fas fa-list"></i></li>
               <li><a href="<?=site_url();?>/all-list/" target="_blank">View All List</a></li>
            </ul>
			<br />
			
        </div>
    </div>
   </div>
</div>
<?php } ?>



<?php get_footer();
   ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function() {
    $('#suppliersTable').DataTable( { } );
		$('#membersTable').DataTable( { } );
		$('#allListDataTable').DataTable( { } );

} );

</script>