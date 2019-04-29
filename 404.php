<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * Displays Only Home template
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */

get_header(); ?>
<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
	
    <!-- Inner Content Area Start -->
    <div class="container inner-content-box">    
    <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'iba' ); ?></h1>
		
    </div>
    <!-- Inner Content Area End -->
    
</div>
<?php get_footer(); ?>
