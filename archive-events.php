<?php
   /**
    * Template Name: Events Archive
    *
    * 
    *
    */
   /* Get  info. */

 get_header(); ?>

<div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
	<div class="container inner-head">

	<h1>Events</h1>
        <ul>
        	<li><a href="<?=site_url();?>">Home</a></li><li>&gt;</li>
            <li>Events</li>
        </ul>
    </div>
    
    <!-- Inner Content Area Start -->
    <div class="container inner-content-box">    
    	<div class="inner-banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news-banner.png" alt="" class="rounded img-fluid"></div>    	
    	<h2>Recent Events</h2>
    	
    		<ul class="recent-news">   
              <?php
                  $per_page = 4;
                   $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                   
                   
                    $offset = ( $paged - 1 ) * $per_page;

                  $args = array(
                    'order' => 'ASC',
                    'paged' => $paged,
                    'offset' => $offset,
                    'orderby' => 'ID',
                    'post_type' => 'events',
                    'post_status' => 'publish',
                    'posts_per_page' => $per_page,
                    'ignore_sticky_posts' => 1
                  );

                  $query = new WP_Query($args);

                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                        </a>
                        <?php echo the_excerpt(); ?>
                        <?php the_author() ?><br>
                        <?php the_date(); ?><br />
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">View Event</a>
						
                    </li>

                     <?php endwhile;?>
<ul class= "pagination">
	<?php
	
	if ( $query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $query->max_num_pages,
        'type'  => 'array',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination-wrap"><ul class="pagination">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
        }
	?>
			
				</ul>

                        <?php 
                        
                       $starting = $offset+1;
    
                        $ending = $offset + $per_page;
                        
                        if($ending>=$query->found_posts){
                            $ending = $query->found_posts;
                        }
                       echo '<br> Showing ' . $starting . '-' . $ending . ' of ' . $query->found_posts . ' posts.';


                          wp_reset_postdata(); ?>
    		</ul>
		
    </div>
    <!-- Inner Content Area End -->
    
</div>
<?php get_footer(); ?>