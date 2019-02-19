<?php
       
      use PHPMailer\PHPMailer\PHPMailer;

require "vendor/autoload.php";
      $mail = new PHPMailer;

date_default_timezone_set('Etc/UTC');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta charset="UTF-8">
        	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/muvicon.JPG">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <title></title>
    </head>
<body>
    <div style="float: left; width: 30%; margin: 20px;">
        <form action="test2.php" method="post">
            <input class="form-control" type="email" id="email" name="email" placeholder="Email">
            <button class="btn btn-primary"  id="button_pressed" name="button_pressed" style="margin-top: 10px;">Send Email</button>
        </form>
    </div>
    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="assets/scripts/dataTables.bootstrap4.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
<?php
if(isset($_POST['button_pressed']))
{
    $email = $_POST['email'];
    
    $mail->IsSMTP();                                      
    $mail->Host = "smtp.gmail.com";  
    $mail->SMTPAuth = true;     
    $mail->Username = "jenniferejeme@gmail.com";  
    $mail->Password = "owanatemembere"; 
    $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;

    $mail->From = "jenniferejeme@gmail.com";
    $mail->FromName = "MUVNG Administrator";
    $mail->addAddress($email);
    $mail->isHTML(true);
    
    $mail->Subject = "Welcome to MUVNG";
    $mail->Body = "<h1>Welcome to MUV NG</h1>";
    $mail->AltBody="Plain welcome message";
    
    $mail->addAttachment('./fleet_tracking/img/userAvi.jpg');
    if(!$mail->send()){
           echo "Message could not be sent. 
";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
    }
    echo "Message has been sent";
}
?>