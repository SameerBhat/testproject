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
	<div class="container">
		<div class="row">
		<div class="col-lg-12">
		<div class="header-top-up">
		<div  class="row no-gutters">
				
				
				<?php if ( is_user_logged_in() ) { ?>
				<div class="col-lg-9 form-area-bg1" >
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
				
				<?php 
				} else { ?>
				</strong> </span>
				<span class="userlogout"><a href="<?=site_url();?>/login/">login</a></span>
				<?php };?>
				</div>
				</div></div>
				</div>
				</div>
				
				
				
		<div class="container">
		<div class="row">
			<div class="col-lg"><a href="<?=site_url();?>">
			<?php if ( of_get_option( 'logo_uploader' ) ) { ?>
				<img src="<?php echo of_get_option( 'logo_uploader' ); ?>" alt="" class="">
			<?php } 
			else { ?>
				<img src="https://via.placeholder.com/150" alt="" class="">
			<?php } ?>
			</a></div>
			<div class="col-lg-10">
				<div class="header-top">
				<div  class="row no-gutters">
				
				
				<?php if ( is_user_logged_in() ) { ?>
				<div class="col-lg-9 form-area-bg1" >
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
				
				<?php 
				} else { ?>
				<div class="col-lg-9 form-area-bg" >
					<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">	
					<div class="row pl-2 pr-2">
						<div class="col-lg-4 mt-2"><input type="text" placeholder="username" id="user_login"  name="log" class="form-control"></div>
						<div class="col-lg-4 mt-2"><input type="password" placeholder="password" id="user_pass" name="pwd" class="form-control"></div>
						<div class="col-lg-4 mt-2"><input type="submit" name="wp-submit" id="wp-submit" value="Login" class="btn btn-block "><i class="icon fas fa-lock"></i></div>															
					</div>
					
                       <input type="hidden" value="<?php echo get_permalink('140'); ?>" name="redirect_to">
					<input type="hidden" value="1" name="logincookie">
					
				</form>	
				
				<?php }
				 ?>
				</div>
				<div class="col-lg-3 member-sp">
					<a href="<?php echo esc_url( get_permalink(136) ); ?>" >Became a Member</a>					
				</div>
				</div>
				</div>
				
				
				<div id="myHeader">
				    <header id="header">
				        <div class="wrap">
							<div class="nav-area-sp">
						<?php
								wp_nav_menu( array(
									'menu'              => 'primary',
									'theme_location'    => 'primary',
									'depth'             => 2,
									'container'         => 'nav',
									'container_id'   	=> 'nav-menu-container',
									'menu_class'        => 'nav-menu',
									'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
									'walker'            => new WP_Bootstrap_Navwalker())
								);
							?>        
				              </div>             
				        </div>
						
				    </header>
				</div>
				
								
			</div>
		</div>
	</div>
</div>
