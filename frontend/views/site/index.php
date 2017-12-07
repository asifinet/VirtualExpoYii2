<?php define('__ROOT__', str_replace('\frontend', '',dirname(dirname(__DIR__)))); 
require_once(__ROOT__.'\common\config\Mysql.php'); 

mysql_select_db($database_mysql, $mysql);
use backend\models\expoevent; 
$this->title = 'My Virtual Exposition Application';

?>




  
<!DOCTYPE html>
  <head>
<meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
   <script>
var app = angular.module('ExpoEvent', []);
app.controller('ExpoEvtCtl', function($scope) {
      
      
 $scope.BookYourPlace = function(event, e) {
  if ($(".btn-link").hasClass("logout")){
    console.log('You are loged in');
    var eventID2= $("#eventIDholder").val();
    var username= $(".logout").text();
    var len= username.indexOf(')')-1;

    username= username.substr(username.indexOf('(')+1).replace(")","");
    console.log("username -"+username);
      window.location ='index.php?r=site/stand&eventID='+eventID2+"&username="+username;
  }else{

      window.location ='index.php?r=site%2Fsignup';
    console.log('You are Not loged in');
  }
     
   
 }
});
 </script>

<script language="javascript" type="text/javascript">
 function showEventDetails(eventID){
     
      console.log(eventID+'This is my testing');
      var check="../frontend/views/site/map_cl_service.php?eventid="+eventID+"&action=listpoints";
              
              	$.getJSON(check, function(json) {
                          
					if (json.Locations.length > 0) {
						for (i=0; i<json.Locations.length; i++) {
							var location = json.Locations[i];
                            console.log(location);
          					
                              $("#eventIDholder").val(location.id);
                              $("#evntName").text(location.name);
                              $("#evnt_loc").text(location.loc);
                              $("#evnt_stdate").text(location.st_date+"  "+location.st_time);
                              $("#evnt_enddate").text(location.ed_date+"  "+location.ed_time);
                              $(".btn-primary").removeClass("disabled")
                     }        
					}
				})
 }

 function addLocation2() {	
     console.log("This is addLocation2");
	              var numMarkers=0;
				  var avg = {
                       lat: 0,
                       lng: 0
                             };
	                var marke=[];
					var myOptions = {
                         zoom: 12,
                         center: new google.maps.LatLng(3.1092905, 101.6719648),
                         mapTypeId: google.maps.MapTypeId.ROADMAP
                    
					};
                       var check="../frontend/views/site/map_service.php?action=listpoints";
                        console.log(check);
                    	$.getJSON(check, function(json) {
                          
					if (json.Locations.length > 0) {
                        
		                   var map = new google.maps.Map(document.getElementById("map"),myOptions);	
						
						for (i=0; i<json.Locations.length; i++) {
							 
						           	numMarkers++;
							      var location = json.Locations[i];
          					var contentString = location.loc;
                    var eventId = location.id;
                    var geocoder = new google.maps.Geocoder();
                               geocodeAddress(geocoder, map,eventId,contentString);
  						      var infowindow = new google.maps.InfoWindow({
                                         content: contentString
                                });
                   	var myLatlng = new google.maps.LatLng(location.lat, location.lng);	
					          		avg.lat += myLatlng.lat();
                        avg.lng += myLatlng.lng();             
							 marker= new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                title: "Event Location",
							    html: location.name
                                });
				}		
				            // Center map.
			//alert(avg.lat/numMarkers+'   '+avg.lng/numMarkers+"numMarkers"+numMarkers);
           map.setCenter(new google.maps.LatLng(avg.lat/numMarkers,avg.lng/numMarkers)); 
					}
				})
               }
				function zoomToBounds() {
					map.setCenter(bounds.getCenter());
					map.setZoom(map.getBoundsZoomLevel(bounds)-1);
				}
            </script>
  </head>
  <body>
  <h3>Exposition Events</h3>
    <div id="map"></div>
    <div class="site-index">
    <div class="EventDetails">
    <input type="hidden" id="eventIDholder" value="">
<p> <h3 id="evntName"></h3></p>
<p> <h4 id="evnt_stdate"></h4> 
 <h4 id="evnt_enddate"></h4></p>
<p> <h3 id="evnt_loc"></h3></p>
</div>
<div ng-app="ExpoEvent" ng-controller="ExpoEvtCtl">
        <button class="btn btn-primary start_btn disabled" type="Button"   ng-click="BookYourPlace()" href="#">Book your place</button>
</div>

<!--  Event Details: {{EventName + " " + EventStartDate +" "+ EventEndDate +" "+ EventLoction}}-->
 <script>
    
      function initMap() {
          
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
          addLocation2();
      }

      function geocodeAddress(geocoder, resultsMap,eventId,address) {
        //var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var infowindow = new google.maps.InfoWindow({
                                content: address
                                });
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
                        	//infowindow.setContent(this.html);
						  infowindow.open(map,this); 
                          showEventDetails(eventId);     
                    	  });	
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIHq46WW12Dmxlu7Q-ApW8w3AqYkXl_v8&callback=initMap">
  
    </script>
    
  </body>
  
</html>


