<?php
/**
 * The template for displaying the footer
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 * */
?>


	<!-- Modal -->
	<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
       


		
				<form class="login-form form-row ml-auto" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
		
				
                       <input type="hidden" value="<?php echo get_permalink('140'); ?>" name="redirect_to">
					<input type="hidden" value="1" name="logincookie">
      						    <div class="col-sm-12 mb-2">
      						      <input type="text" name="log" class="form-control" placeholder="username">
      						    </div>
      						    <div class="col-sm-12 mb-2">
      						      <input type="password" name="pwd" class="form-control" placeholder="password">
      						    </div>
      						    <div class="col-sm-12 mb-2">
      						      <button  type="submit" class="btn btn-block login-button" style="background: linear-gradient(to bottom, #7a7a7a 0%,#3a393a 100%);color: #fff;"><span class="fa fa-lock"></span>  Login</button>
      						    </div>
						
      					</form> 
						
				
				






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>

  

<!-- Footer -->
<div class="footer">
	<div class="container">
		<div class="row">
		
		<div class="col-md-2">
				<div>
			<?php if ( of_get_option( 'logo_footer' ) ) { ?>
				<img src="<?php echo of_get_option( 'logo_footer' ); ?>" alt="" class="">
			<?php } 
			else { ?>
				<img src="https://via.placeholder.com/150" alt="" class="">
			<?php } ?>
					</div>
			</div>	
				
			<div class="col-md-3">
				<div>
					<h5>Corporate Office</h5>
					<p><?php echo of_get_option( 'office_textarea', 'iba' ); ?></p>
					<p>Phone : <?php echo of_get_option( 'phone', 'iba' ); ?></p>
					<p>Fax : <?php echo of_get_option( 'fax', 'iba' ); ?></p>
					<p>Email : <a href="mailto:<?php echo of_get_option( 'email', 'iba' ); ?>"><?php echo of_get_option( 'email', 'iba' ); ?></a></p>
				</div>
			</div>
			
			<div class="col-md-3">
				<div>
					<h5>FOLLOW US</h5>
					<p><?php echo of_get_option( 'follow_content', 'iba' ); ?></p>
					<ul>						
						<li><a href="<?php echo of_get_option( 'link', 'iba' ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/rss.png" alt="" class="mr-2"></a>RSS Feed</li>						
					</ul>
					<img src="<?php echo of_get_option( 'certificate_uploader', 'iba' ); ?>" alt="" class="mt-3">

				</div>
			</div>

			
			<div class="col-md-4">
				<div>
					<h5>COPYRIGHT</h5>
					<p><?php echo of_get_option( 'copyright_content', 'iba' ); ?></p>
					<ul>						
						<li><a href="<?php echo of_get_option( 'facebook', 'iba' ); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
						<li><a href="<?php echo of_get_option( 'twitter', 'iba' ); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
						<li><a href="<?php echo of_get_option( 'google', 'iba' ); ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
						<li><a href="<?php echo of_get_option( 'linkdin', 'iba' ); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->


<!-- JS Paths -->
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>

<!-- JS Paths End -->
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow/wow.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/superfish/superfish.min.js"></script>
<!-- Template Main Javascript File -->
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>


<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl/owl.carousel.js"></script>
<!-- Demo -->
<script type="text/javascript">
$(document).ready(function() {
  $("#owl-demo").owlCarousel({
	items : 3,
	lazyLoad : true,
	navigation : true
  });
  $("#owl-demo2").owlCarousel({
	items : 3,
	lazyLoad : true,
	navigation : true
  });
});
</script>


<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/news/jquery.li-scroller.1.0.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/news/li-scroller.css" type="text/css" media="screen" />

<script type="text/javascript">
$(function(){
	$("ul#ticker01").liScroll();
	$("ul#ticker02").liScroll({travelocity: 0.05});
});
</script>


</body>
</html>