<?php
/**
 * Template Name: Map
 *
 * Displays Only comtact us template
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
    
    	<div class="inner-banner">
		<div id="map-canvas" style="width: 100%; height: 550px;">
			</div>
			</br>
		</br>
		
		</div>
    	
    	<?php echo the_content();?>
		
    </div>
    <!-- Inner Content Area End -->
    <?php endwhile; ?>
</div>
<?php
else :

             global $current_user, $wp_roles;
                $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri_segments = explode('/', $uri_path);      

                $user = get_userdata( $uri_segments[3] ); 
                //print_r($user);

                $value = get_user_meta ( $uri_segments[3]);
                // print_r( $value);die;
                $id =$list->ID;

            ?>
<title>meta</title>
            <div class="inner-area" style="background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner-background.jpg) center top no-repeat;">
            <div class="container inner-head">
               <h1>Details</h1>
               <ul>
                  <li><a href="<?=site_url();?>">Home</a></li>
                  <li>&gt;</li>
                  <li><?=$value['company'][0]?></li>
               </ul>
            </div>
           
         </div> 
<?php
endif;
		?>


<script>

 
	function initialize() {		
		var url = window.location.href.replace("map/","")+'wp-json/mapsApi/v2/';
		getData(url);
		$('form#searchApi').submit(function(e){
			e.preventDefault();
			$(this).find('.message').remove();
			$('form#searchApi').find('button').addClass('disabled');
		var query = encodeURIComponent($(this).find('input[name=query]').val().trim());
			var searchtype = encodeURIComponent($(this).find('input[name=type]:checked').val());
			console.log(searchtype);
			if(query){
				
				if(searchtype == 'postcode'){
					console.log('postcode');
					getData(url+'search/postcode?query='+query);
				}else if(searchtype == 'location'){
					console.log('location');
					getData(url+'search/location?query='+query);
				}else{
					console.log('searchsimple');
					getData(url+'search?query='+query);
				}
			
			}
		});
		
		
		function getData(url){
				$.getJSON(url,function(obj){
			  var points = [];
			  obj.items.forEach(function(item){
				  if(item.lat==""||item.lat==null|| item.long==""||item.long==null){
					$('form#searchApi').find('button').removeClass('disabled');
					  
				  }else{
					  $('form#searchApi').find('button').removeClass('disabled');
					  
					  console.log(points);
					  
					     points.push({lat:item.lat,long:item.long,company:item.company, user_id:item.user_id});
					  
					  
				  }
				 
			  });
		
			
		setMarkers(points);
		
		});
		}
	
		
		
          }
      
	

	
	function setMarkers(points) {
		
		if(points.length >0){
			
			
		var mapCanvas = document.getElementById('map-canvas');		
		var mapOptions = {
			center: new google.maps.LatLng(53.9406910783726, -2.054715552066586),
			zoom: 6
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
		
		points.forEach(function(point){
// 			if(point.lat == ""||point.lat == null){
// 				console.log("true");
// 			}
// 			
			
			var venueLatlng = new google.maps.LatLng(parseFloat(point.lat),parseFloat(point.long));
			
			var companyName = (point.company == null) ? '#' : point.company.replace(/\s+/g,"-");
		    
		var contentString = `<div id="content">
<div id="siteNotice">
</div>
<h3 id="firstHeading" class="firstHeading"> <b>${point.company}</b> </h3>
<div id="bodyContent">
<a href="${window.location.href.replace("map/","")}profile/details/${point.user_id}/name/${companyName}" target="_blank">View Profile</a>
</div>
</div>
`;	

				var marker = new google.maps.Marker({
					position: venueLatlng,
					map: map,
// 					label: {
//     color: 'gray',
//     fontWeight: 'bold',
//     text: 'Hello world',
//   },
					title: point.company,
					url: point.company,
				    content: contentString,
//      				zIndex: i,
				});
				
				
				var infowindow = new google.maps.InfoWindow({
					boxStyle: {
						width: "280px"
					},
				});
	
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(this.content);
					infowindow.setPosition(this.position);
					infowindow.open(map,this);
// 					infowindow.location.href = point.company;
				});
			
			
			google.maps.event.addListener(map, 'zoom_changed', function() {
    var z = map;
    console.log('Zoom is'+z.getZoom());
// 				console.log('Lat is'+z.getCenter().lat());
// 				console.log('Lon is'+z.getCenter().lng());
});
		});
		
	}else{
		$('form#searchApi').append('<div class="message">No results found</div>');
	}
	}



 // google.maps.event.addDomListener(window, 'load', initialize);
 function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC0vqo68jQozHaY7PgTL6Att5jPIeFMmvg&callback=initialize';
    document.body.appendChild(script);
}
  window.onload = loadScript;
  

</script>
                        	
                       
                       
<?php get_footer(); ?>