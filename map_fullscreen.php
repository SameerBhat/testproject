<?php
/**
 * Template Name: Map Fullscreen
 *
 * Displays Only comtact us template
 *
 * @package iba
 * @subpackage iba_theme
 * @since iba 1.0
 */
 get_header(); ?>
                        <?php $args = array('order'        => 'ASC', ); 
$value = get_users( $args ); 

print_r($values);
?>
                        	
                        	<?php //print_r($venues); ?>
							<div id="map-canvas" style="width: 100%; height: 350px;"></div>
                
                       
<?php get_footer(); ?>

<script>
   
 	var venues = [{lat: 12, lng: 213}, {lat: 122, lng: 113}, {lat: 99, lng: 12}];
	
	function initialize() {
		
		  downloadUrl('https://dealquikr.com/IBANew/mapsApi/mapsApi.php', function(data) {
	
			  var obj = JSON.parse(data.response);
			  var points = [];
			  obj.items.forEach(function(item){
				 
				  points.push({lat:item.lat,long:item.long,username:item.user_name, userlink:item.user_link});
				  
			  });
			  console.log(points);
			  
		
		var uluru = {lat: 0, lng: 0};
		var mapCanvas = document.getElementById('map-canvas');		
		var mapOptions = {
			center: new google.maps.LatLng(0, 0),
			zoom: 1
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
		setMarkers(map, points);
		
				
            });
          }
		/////
     
      
	

	
	function setMarkers(map, points) {
		
		var i =0;
	
	  	for (i = 0; i < points.length; i++) {
				var venueLatlng = new google.maps.LatLng(parseFloat(points[i].lat),parseFloat(points[i].long));
		        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<span id="firstHeading" class="firstHeading"><a href="'+points[i].userlink+'">'+points[i].username+'</a></span>'+
            '<div id="bodyContent">'+
            '(lat: '+String(points[i].lat)+',</br>long: '+String(points[i].long)+').</p>'+
            '</div>'+
            '</div>';
				var marker = new google.maps.Marker({
					position: venueLatlng,
					map: map,
// 					label: {
//     color: 'gray',
//     fontWeight: 'bold',
//     text: 'Hello world',
//   },
					title: points[i].username,
					url: points[i].username,
				    content: contentString,
     				zIndex: i,
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
					infowindow.location.href = points[i].username;
				});
		}
	}
	function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
	
	 function doNothing() {}


  google.maps.event.addDomListener(window, 'load', initialize);


</script>