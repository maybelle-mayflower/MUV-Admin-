
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calculate Distance between two points google maps javascript</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  <!------- for local server only --------->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH8TlxMrucCoApyot668dIApkq8jK_iiM&v=3.exp&sensor=false&libraries=places"></script>
 
 <!------------
 for live server only
   <script src="//maps.googleapis.com/maps/api/js?key=your-api-key&sensor=false&libraries=places" type="text/javascript"></script>
 ------------->
 
</head>
<body>


<div class="container">
  <h2>Calculate Distance between two points google maps javascript</h2>

  <form class="form-inline" action="">
    <div class="form-group">
      <label for="email">Source:</label>
      <input type="text" class="form-control" id="source" value="Benin, Nigeria" >
    </div>
    <div class="form-group">
      <label for="pwd">Destination:</label>
      <input type="text" class="form-control" id="destination" value="Lagos, Nigeria" >
    </div>

    <button type="button" value="Get Route" onclick="get_rout()" >Show Trip Estimates</button>
    
    <div class="form-group">
      <label for="pwd">Distance in km :</label>
      <input type="text" class="form-control distance" readonly >
    </div>
    <div class="form-group">
      <label for="pwd">Time :</label>
      <input type="text" class="form-control time" readonly >
    </div>
  </form>
 
  <div class="row" >
  <br /><br />
  <div class='col-md-6' id='maplocation' style="height: 450px;" ></div>
  <div class='col-md-6' id='panallocation' style="width: 500px; height: 500px" ></div>
  </div>
</div>

 

 

<script type="text/javascript">
        var source, destination;
        var darection = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('source'));
            new google.maps.places.SearchBox(document.getElementById('destination'));
            
        });
        function get_rout() {


            /* var mapOptions = {
                mapTypeControl: false,
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13
            };
            
            map = new google.maps.Map(document.getElementById('maplocation'), mapOptions);
            darection.setMap(map);
            darection.setPanel(document.getElementById('panallocation'));
            */

            source = document.getElementById("source").value;
            destination = document.getElementById("destination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    darection.setDirections(response);
                }
            });


            
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    
                    distancefinel = distance.split(" ");
                    $('.distance').val(distancefinel[0]);
                    $('.time').val(duration);
                    
                    
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
        
        
        
        
    </script>

 

</body>
</html>