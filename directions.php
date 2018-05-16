<script type="text/javascript">

			function directMe(lat,long){
	        var chicago = {'lat':lat,'long':long};
	         var endPoint  = new google.maps.LatLng(lat,long);

	        navigator.geolocation.getCurrentPosition(initMap);
	           var directionsService = new google.maps.DirectionsService();
	          var directionsDisplay = new google.maps.DirectionsRenderer();  

	        function initMap(location) {
	         
	          var S_lat = location.coords.latitude;
	          var S_long = location.coords.longitude;
	          var myLocation = new google.maps.LatLng(S_lat,S_long);

	          var mapOptions = {
	            zoom:20,
	            center: endPoint,
	          }
	          var map = new google.maps.Map(document.getElementById('map'), mapOptions);
	          directionsDisplay.setMap(map);
	          calcRoute(myLocation);
	        }

	        function calcRoute(myLocation) {
	          var start = myLocation;
	          var end = endPoint;
	          var request = {
	            origin: start,
	            destination: end,
	            travelMode: 'WALKING'
	          };
	          directionsService.route(request, function(result, status) {
	            if (status == 'OK') {
	              directionsDisplay.setDirections(result);
	            }
	          });
	        }
	}
		</script>
	  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2BcebWS9vgTszBmTpM4kY6kQDl8T91Ic&callback=initMap"
	    async defer></script>