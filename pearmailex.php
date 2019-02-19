
<?php
//require_once ("Mail.php");
//require_once ("Mail/mime.php"); 
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
        <form action="pearmailex.php" method="post">
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
    $message = "";
    $email = $_POST['email'];
    $message .= '<table cellpadding="0" cellspacing="0" style="width:600px; margin:0 auto; font-family:Arial, Helvetica, sans-serif; color:#696969; border:1px solid #d9d9d9;">
	<tbody>
		<tr style="margin-top:30px; padding:20px; border:1px solid #c8c8c8; border-bottom:none;">
			<td style="padding:20px; border-bottom:1px solid #d9d9d9;"><a href="http://app.muv.com.ng/"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><img alt="MUV LOGO" src="./assets/img/logo-dark2.jpg" width="160" /></font></a></td>
		</tr>
		<tr style="border:1px solid #c8c8c8; padding:20px 20px 20px 20px; border-bottom:none;">
			<td style="padding:20px;">
                            <div style="height: 30px; background: orange; text-align: center;">
                                <p><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Hi #greetings#,</font></p>
                            </div>
			<p>&nbsp;</p>

			<p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">We are delighted to have you as a member of our community..</font></p>
			<p>&nbsp;</p>
                        <p style="margin-top:15px; font-weight: bolder; font-size: 1.2em;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Back-end Login Credentials :</font></p>
                        
                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong>Login URL: &nbsp;<a href="http://muvng.fasta.ng/company/login">http://muvng.fasta.ng/company/login</a></strong></font></p>
                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong>Email: </strong> #Insert Email# </font></p>
                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong>Password: </strong> #Insert Password# </font></p>

                        <p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Once logged in, kindly fill in the company settings using the below url.</font></p>

			<p style="margin-top:15px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><strong><a href="#ACTIVATION_LINK#">Click Here</a></strong></font></p>

			<p style="margin-bottom:5px; margin-top:40px;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS">Regards,</font></p>

			<p style="color:#5b9bd5; font-size:20px; font-weight:bold; margin-top:0;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><span style="font-size: 13px; font-weight: normal;">MUVNG Aministrator</span></font></p>
			</td>
		</tr>
		<tr style="background:#f7f7f7; font-size:12px; padding:20px; border:1px solid #c8c8c8; text-align:center;">
			<td style="padding:20px 0;">
			
			<p style="margin-bottom:5px; margin-top:0;"><font color="#333333" face="sans-serif, Arial, Verdana, Trebuchet MS"><span style="font-size: 13px;">©2018 MUV. All rights reserved. Developed by Michrosys Technologies.</span></font></p>
			</td>
		</tr>
	</tbody>
</table>';
    
    sendMail($email, $message);    
}

function sendMail($email, $message){
    require_once ("Mail.php");
    require_once ("Mail/mime.php"); 

    $from = "Matha Sender <muvadmin@muvng.fasta.ng>";
    $to = "James Recipient <$email>";
    $subject = "Hi! This is the HTML Mail example";

    $host = "smtp.muvng.fasta.ng";
    $port = '25';
    $username = "muvadmin@muvng.fasta.ng";
    $password = "R3v3lat1on!";

    $text = "Hello, How are you doing?";

    $headers['From'] = $from;
    $headers['To'] = $to;
    $headers['Subject'] = $subject;
    $headers['Content-Type'] = 'text/html; charset=UTF-8';
    $headers['Content-Transfer-Encoding']= '8bit';

    $mime = new Mail_mime;
    $mime->setTXTBody($text);
    $mime->setHTMLBody($message);

    $mimeparams=array();
    $mimeparams['text_encoding']='8bit';
    $mimeparams['text_charset']='UTF-8';
    $mimeparams['html_charset']='UTF-8';
    $mimeparams['head_charset']='UTF-8';
    //$mimeparams['debug'] = 'True'; //Uncomment this if you want to view Debug information

    $body = $mime->get($mimeparams);
    $headers = $mime->headers($headers);

    $smtpinfo['host'] = $host;
    $smtpinfo['port'] = $port;
    $smtpinfo['auth'] = true;
    $smtpinfo['username'] = $username;
    $smtpinfo['password'] = $password;
   // $smtpinfo['debug'] = 'True'; //Uncomment this if you want to view Debug information

    $mail=& Mail::factory('smtp', $smtpinfo);
    $mail->send($to, $headers, $body);
   if (PEAR::isError($mail)) 
    {
       echo("Error " . $mail->getMessage() . "");
    } 
    else 
    {
       echo("Message successfully sent!");
    }
}
?>