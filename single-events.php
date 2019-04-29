<?php 
/* Template Name: Events archive */
 get_header(); ?>
   <?php while ( have_posts() ) : the_post(); ?>

<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
	<div class="container inner-head">

	<h1>Events</h1>
        <ul>
        	<li><a href="<?=site_url();?>">Home</a></li><li>&gt;</li><li><a href="<?=site_url();?>/events">Events</a></li><li>&gt;</li>
            <li><?php echo get_the_title(); ?></li>
        </ul>
    </div>
    
    <!-- Inner Content Area Start -->
    <div class="container inner-content-box">    
    	<div class="inner-banner"><img src="<?php the_post_thumbnail_url(array(300, 100)); ?>" alt="" class="rounded img-fluid"></div>    	
    	<h2><?php the_title(); ?></h2>
    	
    		<ul class="recent-news">   
                    <li><?php the_content(); ?></li>      		
    		</ul>
		
    </div>
    <!-- Inner Content Area End -->
    
</div>
<?php endwhile; ?>
<?php get_footer(); ?>