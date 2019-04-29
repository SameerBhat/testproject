<?php
/**
 * Template Name: Home 
 *
 * Displays Only Home template
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */
 get_header(); ?>
<!-- Header End -->

<!-- Slider --> 
<div class="project-slider">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		<?php $count=0;  $posts = new WP_Query( array( 'post_type' => 'slider' ,'category_name'=> 'main-slider', 'order' => 'ASC' ) );
               while($posts->have_posts()) : $posts->the_post();?>
			<li data-target="#carouselExampleIndicators" data-slide-to="<?=$count?>" class="<?php if($count==0){echo 'active';}?>"></li>
		<?php $count++; endwhile; ?>
		</ol>
		<div class="carousel-inner" role="listbox">
		<?php   $count=0; $posts = new WP_Query( array( 'post_type' => 'slider' , 'category_name'=> 'main-slider', 'order' => 'ASC' ) );
               while($posts->have_posts()) : $posts->the_post();?>
			
			<div class="carousel-item <?php if($count==0){echo 'active';}?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" alt="">
			<div class="carousel-caption">
					<?php the_content();?>
					<?php the_excerpt();?>
					<a href="<?php the_field('add_more'); ?>" >Read more</a>
				</div>
			</div>	
			<?php $count++; endwhile; ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<i class="fas fa-chevron-left"></i>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<i class="fas fa-chevron-right"></i>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<!-- Slider End -->


<!-- Logo Area -->
		<div class="container logos-area">
					<div class="row">
						<div class="col-md-6">							
							<fieldset>							
								<legend align="center"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/iba-icon.png" alt="" class="rounded">Suppliers</legend>							
								<div id="owl-demo" class="owl-carousel"> 
								<?php   $count=0; $posts = new WP_Query( array( 'post_type' => 'logo' , 'category_name'=> 'supplier', 'order' => 'ASC' ) );
				              		 	while($posts->have_posts()) : $posts->the_post();?>	
									<div class="item"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" class="rounded img-fluid"></div>
									<?php $count++; endwhile; ?>
								</div>							
							</fieldset>	
						</div>
						
						<div class="col-md-6">							
							<fieldset>
								<legend align="center"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/iba-icon.png" alt="" class="rounded">Members</legend>
								<div id="owl-demo2" class="owl-carousel">     
								<?php   $count=0; $posts = new WP_Query( array( 'post_type' => 'logo' , 'category_name'=> 'member', 'order' => 'ASC' ) );
				              		 	while($posts->have_posts()) : $posts->the_post();?>	
									<div class="item"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" class="rounded img-fluid"></div>
									<?php $count++; endwhile; ?> 
								</div>							
							</fieldset>	
						</div>
					</div>		
			</div>

<!-- Logo Area End -->

<!-- About Area  -->
<div class="abt-bg">
	<div class="container">	
		<div class="row">
			<div class="col-md-8 pb2 pt-2">
			<?php echo of_get_option( 'iba_editor' ); ?>
				<a href="<?php echo of_get_option( 'read_more_link' ); ?>" class="mb-3 pb-2">Read More</a>
			</div>				
			<div class="col-md-4">
			
			<div>
				<div id="abt-slider" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php   $count=0; $posts = new WP_Query( array( 'post_type' => 'slider' , 'category_name'=> 'sub-slider', 'order' => 'ASC' ) );
              		 	while($posts->have_posts()) : $posts->the_post();?>	
					<li data-target="#abt-slider" data-slide-to="<?=$count?>" class="<?php if($count==0){echo 'active';}?>"></li>
						<?php $count++; endwhile; ?>
					</ol>
					<div class="carousel-inner" role="listbox">
						<?php   $count=0; $posts = new WP_Query( array( 'post_type' => 'slider' , 'category_name'=> 'sub-slider', 'order' => 'ASC' ) );
              		 	while($posts->have_posts()) : $posts->the_post();?>
					<div class="carousel-item <?php if($count==0){echo 'active';}?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" alt=""  class="rounded img-fluid"></div>
						<?php $count++; endwhile; ?>
					</div>
				</div>
			</div>
			</div>	
		</div>
	</div>
</div>
<!-- About Area End -->	



<!-- News Area  -->
<div class="news-area">
	<div class="container">	
		<div class="row ">	
			<div class="col-md-1"><h2>News</h2></div>
			<div class="col-md-9">
			<ul id="ticker01" class="newshead">
			<?php  $posts = new WP_Query( array( 'post_type' => 'news' , 'order' => 'ASC' ) );
              	while($posts->have_posts()) : $posts->the_post();?>	
              <li><span><a href="<?php the_permalink();?>"><?php the_title();?></a></span> |&nbsp;&nbsp;&nbsp;</li>
			<?php endwhile; ?>
				</ul>
			</div>
			<div class="col-md-2" id="viewmorebutton"><a href="<?=site_url();?>/ibanews/">More News</a></div>		
		</div>	

	</div>
</div>
<!-- News Area End -->	


<div class="three-box-area">
	<div class="container">
		<div class="row ">
		<div class="col-md-4">
		<h3>IBA Interactive Catalogue</h3>
		<img src="<?php echo of_get_option( 'catelogue_image' ); ?>" alt="" class="rounded ">					
			<div>							
				<div><?php echo of_get_option( 'catalogue_content' ); ?>
				<a href="<?php echo of_get_option( 'catelogue_link' ); ?>" class="rounded text-center">View catalogue</a></div>	
			</div>			
		</div>
		
		<div class="col-md-4">
			<div  class="events">
			<h3>IBA Events</h3>			
				<ul>
				<?php  $posts = new WP_Query( array( 'post_type' => 'events' ,'posts_per_page'=>4, 'order' => 'ASC' ) );
              	while($posts->have_posts()) : $posts->the_post();?>
					<li class="events"><i class="fas fa-angle-right"></i> <a href="<?php the_permalink(); ?>"></a><?=get_the_title();?></li>
					<?php endwhile; ?> 
				</ul>
			<a href="<?=site_url();?>/ibaevents/" class="rounded text-center">View All Events</a>			
			
			</div>				
		</div>
		
		<div class="col-md-4">
		<h3>Celebrating 25 Years</h3>
		<img src="<?php echo of_get_option( 'celebrating_image' ); ?>" alt="" class="rounded mr-3">			
			<div>							
				<div><h4><?php echo of_get_option( 'celebrating_content' ); ?></h4></div>	
			</div>			
		</div>

	</div>
	</div>	
</div>

<!------------Become Member Area---------------->

<div class="two-box-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/bm-icon.png" alt="" class="">
					<div>
					<h2>Become a Member</h2>
					<?php echo of_get_option( 'iba_member_editor' ); ?>
					<a href="<?php echo of_get_option( 'member_page_link' ); ?>" class="rounded">Become an<br><b>IBA Member</b></a>
					<a href="<?php echo of_get_option( 'member_pdf_link' ); ?>" class="rounded">Download Our<br><b>Members List</b></a>
					</div>
					
				</div>
			
				<div class="col-lg-6">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/bm-icon.png" alt="" class="">
					<div>
					<h2>Become a Supplier</h2>
					<?php echo of_get_option( 'iba_supplier_editor' ); ?>
					<a href="<?php echo of_get_option( 'supplier_page_link' ); ?>" class="rounded">Become an<br><b>IBA Member</b></a>
					<a href="<?php echo of_get_option( 'supplier_pdf_link' ); ?>" class="rounded">Download Our<br><b>Members List</b></a>
					</div>
					
				</div>
			</div>		
		</div>
</div>

 <?php get_footer();?>