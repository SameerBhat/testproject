<?php
/**
 * Template Name: login 
 *
 * Displays Only login template
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */
 get_header(); ?>
<!-- Header End -->
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
	<div class="container inner-head">

	<h1>Login</h1>
        <ul>
        	<li><a href="<?=site_url();?>">Home</a></li><li>&gt;</li>
            <li>Login</li>
        </ul>
    </div>

    <!-- Inner Content Area Start -->
    <div class="container inner-content-box" >
    
    	<div class="inner-banner">
		
		
		</div>
    	
    	<div class="col-lg-12 form-area-bg" >
					<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">	
					<div class="row pl-2 pr-2">
						<div class="col-lg-4 mt-2"><input type="text" placeholder="username" id="user_login"  name="log" class="form-control"></div>
						<div class="col-lg-4 mt-2"><input type="password" placeholder="password" id="user_pass" name="pwd" class="form-control"></div>
						<div class="col-lg-4 mt-2"><input type="submit" name="wp-submit" id="wp-submit" value="Login" class="btn btn-block "><i class="icon fas fa-lock"></i></div>															
					</div>
					
                       <input type="hidden" value="<?php echo get_permalink('140'); ?>" name="redirect_to">
					<input type="hidden" value="1" name="logincookie">
				</form>	
				<span style="color: red;float: left;margin-left: 9px;"><?php if($_GET['login']=='failed'){echo 'Username or password Failed!';}?></span>			
				

		
    </div>
    <!-- Inner Content Area End -->
  
</div>

<?php  get_footer(); ?>