function bezeroMapaErakutzi(){
	maparenDiv = document.getElementById("mapDiv");
	if(maparenDiv.style.display == "" || maparenDiv.style.display == "none"){
		maparenDiv.style = "display: block;";
		myMap();
	}
	else if(maparenDiv.style.display == "block"){
		maparenDiv.style = "display: none;"
	}
}
function myMap() {
	var mapCanvas = document.getElementById("map");
  	
  	var mapOptions = {
    	center: {lat: 43.26, lng: -2.935},
    	zoom: 13
  	}
  	var map = new google.maps.Map(mapCanvas, mapOptions);

  	var marker = new google.maps.Marker();
  	
  	if (navigator.geolocation) {
    	navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
            	lat: position.coords.latitude,
              	lng: position.coords.longitude
            };
            map.setCenter(pos);
            marker.setPosition(pos);
            marker.setMap(map);
        }, function() {
        	handleLocationError(true, infoWindow, map.getCenter());
        });
    }
    else {
        handleLocationError(false, infoWindow, map.getCenter());
    } 
}