<?php
/**
 * The template for displaying the Default page
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */

 
get_header(); ?>
<?php if ( have_posts() ) : ?>
 <?php $image = get_field('add_background_image'); ?>
<div class="inner-area" style="background: url(<?php echo $image['url']; ?>) center top no-repeat;">
	<div class="container inner-head">

	<h1><?php single_post_title(); ?></h1>
        <ul>
        	<li><a href="<?=site_url();?>">Home</a></li><li>&gt;</li>
            <li><?php single_post_title(); ?></li>
        </ul>
    </div>
    <?php
			// Start the loop.
            while ( have_posts() ) : the_post();
            ?>
    <!-- Inner Content Area Start -->
    <div class="container inner-content-box" >
    
    	<div class="inner-banner"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" alt="" class="rounded img-fluid"></div>
    	
    	<?php echo the_content();?>
		
    </div>
    <!-- Inner Content Area End -->
    <?php endwhile; ?>
</div>

      
<?php
endif;
		?>

<?php get_footer(); ?>