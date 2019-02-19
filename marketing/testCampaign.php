<?php
include '../assets/config/config.php';
include '../assets/config/functions.php';

global $connect;

$con=$connect;
if(isset($_POST['addCampBtn'])){ 
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $usertype=mysqli_real_escape_string($con,$_POST['userType']);
    $userInfo = "";
    $msgInfo = "";
    $schedule_date ="";
    $newUser="uploaded File";
    $type_of_notification ="";
    $existing_user=mysqli_real_escape_string($con,$_POST['select_passenger']);
    $notificationtype =mysqli_real_escape_string($con,$_POST['notificationtype']);
    $sms_template=mysqli_real_escape_string($con,$_POST['smstemplate']);
    $emailtype=mysqli_real_escape_string($con,$_POST['emailtemplatetype']);
    $default_email = mysqli_real_escape_string($con,$_POST['defaultemail']);
    $newuser_email = mysqli_real_escape_string($con,$_POST['newuseremail']);
    $promotional_email = mysqli_real_escape_string($con,$_POST['promotionalemail']);
    $promo_code=mysqli_real_escape_string($con,$_POST['promocode']);
    $promo_type=mysqli_real_escape_string($con,$_POST['promotype']);
    $discount_amt=mysqli_real_escape_string($con,$_POST['discountamt']);
    $promo_limit=mysqli_real_escape_string($con,$_POST['promolimit']);
    $start_date=mysqli_real_escape_string($con,$_POST['datepicker']);
    $end_date=mysqli_real_escape_string($con,$_POST['datepicker2']);
    $schedule=mysqli_real_escape_string($con,$_POST['schedule']);
    $future_date=mysqli_real_escape_string($con,$_POST['datepicker3']);
    
    switch($usertype){
        case 'newuser':
            $userInfo = "New User";
            break;
        case 'existinguser':
            $userInfo = "Existing User";
            break;
        case 'inactiveuser':
            $userInfo = "In-Active User";
            break;
    }
    
     switch($notificationtype){
        case 'smsnotify':
            $msgInfo = $sms_template;
            $type_of_notification = "SMS";
            break;
        case 'emailnotify':
            if($emailtype=="default"){
                $msgInfo = $default_email;
                $type_of_notification = "Default Email";
            }
            if($emailtype=="newuser"){
                $msgInfo = $newuser_email;
                $type_of_notification = "New User Email";

            }
            if($emailtype=="promotional"){
                $msgInfo = $promotional_email;
                $type_of_notification = "Promotional Email";

            }
            break;
    }
    
    switch ($schedule){
        case 'now':
            $schedule_date = "now ()";
            break;
        case 'later';
            $schedule_date = $future_date;
            break;
    }
    
        $sqlupdate="INSERT INTO tbl_campaign (title, userType, user_info, notification_type, notification_message, promo_code, promo_type, discount, promo_limit, startDate, endDate, schedule, schedule_date) VALUES ('$title','$usertype','$userInfo','$type_of_notification','$msgInfo','$promo_code','$promo_type','$discount_amt','$promo_limit','$start_date','$end_date','$schedule','$schedule_date')";

        $result_update=mysqli_query($con,$sqlupdate);
    if($result_update){
        echo '<script>alert("Campaign Added!")</script>';
        echo '<script>window.location.href="campaign.php"</script>';
    }
    else{
        echo '<script>alert("Update Failed: '. mysqli_error($con).'")</script>';
    }
}