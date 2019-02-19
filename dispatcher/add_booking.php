<?php
session_start();
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

if(isset($_SESSION['uEmail'])){    
?>
<head>

         <style>
             .modal-body {
            max-height: calc(100vh - 212px);
            overflow-y: auto;
            }
            .ui-datetimepicker{z-index:10000 !important;}
         </style>
            <style>
            .pac-container {
            z-index: 1051 !important;
            </style>
</head>
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Booking</h3>
            </div>
            <div class="modal-body" id="modalbody">
                <form class="form-horizontal" action="confirm_booking.php" method="post">
                                      <?php

                                        $sqlSel = "SELECT * FROM tbl_users WHERE userType='u'";
                                        $res = mysqli_query($connect, $sqlSel);
                                       ?>
                                <div id="home" class="tab-pane fade in active">
                                    <h4 style="font-weight: bold; ">Existing Passenger</h4>
                                    <input type="text" class="form-control" id="select_passenger" name="select_passenger" list="datalist">
                                        <datalist id="datalist">
                                        <?php
                                        while($row = mysqli_fetch_array($res))
                                            {
                                                $first_name = $row['firstName'];
                                                $last_name = $row['lastName'];

                                                echo "<option value=".$row['uId'].">$first_name".' '."$last_name</option>";
                                            }
                                        ?>
                                        </datalist>
                                    <br>

                                        <h4 style="font-weight: bold; ">New Passenger</h4>
                                    <div id="ajaxcontent">
                                        <input name="dname" id="txtPlaces" type="text" placeholder="Name" required="true">
                                        <input name="demail" id="demail" type="text" value="Email Id" required="true">
                                        <input name="dmobile" id="dmobile" type="text" value="Mobile Number" required="true">
                                    </div>
                                   <br>
                                   <h4 style="font-weight: bold; ">Booking Details</h4>
                                   <div class="">
                                       <input name="source" class="inputlocation" id="source" type="text" placeholder="Enter the Pickup Location" required="true">
                                   <input name="destination" class="inputlocation" id="destination" type="text" placeholder="Enter the Dropoff Location" required="true">
                                   </div>
                                    <h4 style="font-weight: bold; ">Car Model</h4>
                                    <select id="model" name="model" required="true">
                                        <option selected="" disabled="" value="">--Select Vehicle--</option>
                                        <?php getModels();?>
                                    </select>
                                    <div>
                                        <input type="text" id="booking_datetime" name="booking_datetime" placeholder="Schedule" required="true">
                                    </div>
                                    <input name="promo" id="promo" type="text" placeholder="Promo Code">
                                    <br>
                                    <div id="banner" style="color: red;"><b>Source</b> and <b>Destination</b> fields are required.</div>
                                    <button type="button" value="Get Route" onclick="return get_rout()">Calculate Trip Estimates</button>
                                    <table class="table-borderless table-responsive">
                                        <tr>
                                            <th>Distance :</th>
                                            <td><input class="distance" id="dist" name="dist" readonly="" style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <th>Time: </th>
                                            <td><input class="time"  id="time" name="time" readonly="" style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <th>Tax(12.5%): </th>
                                            <td><input class="tax"  id="tax" name="tax" readonly="" style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <th>Fare(₦): </th>
                                            <td><input class="fare"  id="fare" name="fare" readonly="" style="border:none;"></td>
                                        </tr>
                                    </table>
                                    <button type="submit" id="dispatch" class="btn disabled" name="dispatch" style="width: 100%;">Dispatch</button>
                                 </div>
                               </form>
            </div>
            <div class="modal-footer" style="height: 80px;">
                <button type="button" data-dismiss="modal" class="btn btn-danger" style="width: 100px;">Cancel</button>
            </div>
        </div>

<script>       
 $(function () {
                $('#booking_datetime').datetimepicker();
                 $('#banner').hide();
                $('#booking_datetime').click(function(){
                    var popup =$(this).offset();
                    var popupTop = popup.top - 90;
                    $('.ui-datetimepicker').css({
                      'top' : popupTop
                     });
                });
            });
</script>
 <script>
    $('#modalbody').slimscroll({
     height: '480px'
   });
</script>
<script type="text/javascript">

        var source, destination;
        var darection = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        
        var input = document.getElementById("source");
        var output = document.getElementById("destination");
        var autocomplete = new google.maps.places.Autocomplete(input);
        var autocomplete2 = new google.maps.places.Autocomplete(output);

function get_rout() {
            source = "";
            destination = "";
            
             if($('#source').val() && $('#destination').val())
            {
                source = document.getElementById("source").value;
                destination = document.getElementById("destination").value;
            }
            else
            {
                $("#banner").show();
                //setTimeout(function(){ $('#banner').fadeOut() }, 2000);
                return false;
            }
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
                if (status === google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var fare = 0;
                    var tax = (12/100)*fare;
                    
                    distancefinel = distance.split(" ");
                    $('.distance').val(distancefinel[0]+'km');
                    $('.time').val(duration);
                    $('.fare').val(fare);
                    $('.tax').val(tax);
                    
                    checkVal();

                } else {
                    alert("Unable to find the distance via road.");
                }
            });
            
            
        }
</script>
<script>
    function checkVal(){
        if($('.distance').val())
        {
            $("#dispatch").removeClass("disabled");
            $("#banner").hide();
        }
        else
        {}
    }
</script>
<script>
    $(document).on('input', '.inputlocation', function(){
        $('.distance').val("");
        $('.time').val("");
        $('.fare').val("");
        $('.tax').val("");
        
        $("#dispatch").addClass("disabled");
    });
</script>
<?php
}
else
{
    echo"<script>window.open('../login.php','_self')</script>";
}
?>