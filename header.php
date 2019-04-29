<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <meta name="description" content="">
	<meta name="keywords" content="">
    <meta name="robots" content="index, follow"> 
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- Owl Carousel Assets -->
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl/owl.theme.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet" type="text/css"/> <!-- custom css -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" rel="stylesheet" type="text/css"/> <!-- custom css -->
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body id="top">
	<div class="header">
	
		
		<?php if(@$_GET['login']=='failed'){echo '<div class="alert col-7 ml-auto mr-auto alert-danger" role="alert">Username or password Failed!</div>';}?>
<nav class="navbar navbar-expand-lg iba-nav">
    <div class="container align-items-start">
        <h1>
			
        	<a href="<?=site_url();?>">
				
				<?php if ( of_get_option( 'logo_uploader' ) ) { ?>
				<img class="logo" src="<?php echo of_get_option( 'logo_uploader' ); ?>" alt="">
			<?php } 
			else { ?>
				<img class="logo" src="https://via.placeholder.com/150" alt="">
			<?php } ?>
			
			</a>
        </h1>
        <button class="navbar-toggler my-2 navbar-dark bg-dark" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
		
        <div class="collapse navbar-collapse flex-column align-items-start" id="navbarCollapse">
            <ul class="navbar-nav login-menu w-100">
				
      	
				
			<?php if ( is_user_logged_in() ) { ?>
				
				<div class="ml-auto" >
          		<?php $user = wp_get_current_user();?>
				
				<span class="userinfo">Welcome <strong>
				<?php
				if(!empty($user->user_firstname)){
				 echo $user->user_firstname.'&nbsp;'.$user->last_name;?>
				 |
				 <?php
				 echo '&nbsp;<a href="'.site_url().'/edit-profile/">Edit Profile</a>&nbsp;';
				}else{
					echo $user->display_name;
					echo '&nbsp;<a href="'.site_url().'/edit-profile/">Edit Profile</a>&nbsp;';
				}?>
				</strong> </span>
				<span class="userlogout"><?php wp_loginout( home_url() );?></span>
				</div>
				<? }else{

				?>


	                    <a data-toggle="modal" data-target="#loginModal" class="nav-link btn btn-block register-button offset-md-11 col-1" href="#">Login</a>
				

				<?php 
				
				}


				
				?>
			     </ul>
			
            <ul class="navbar-nav ml-auto navigation-menu">
				
				<?php

								$menuLocations = get_nav_menu_locations(); 
                                          

									$menuID = $menuLocations['primary']; 

									$primaryNav = wp_get_nav_menu_items($menuID);
				
								foreach ( $primaryNav as $navItem ) {

							//		print_r($navItem);
//     echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
									echo '<li class="nav-item '.($navItem->object_id == get_queried_object_id() ? 'active':'').'"><a class="nav-link" href="'.$navItem->url.'" >'.$navItem->title.'</a></li>';

}
										
										
							?> 
				
               
            </ul>
        </div>
    </div>
</nav>
	</div>



	
